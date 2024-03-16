<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Mail\PurchaseConfirmation;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use App\Http\Middleware\VerifyStripeWebhook;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StripeWebhookController extends Controller
{
    public function __construct()
    {
       $this->middleware(VerifyStripeWebhook::class);
    }
    //

    public function __invoke(Request $request)
    {
        // Handle the Stripe webhook
        $payload = json_decode($request->getContent(), true);

        $method = 'handle' . Str::studly(str_replace('.', '_', $payload['type']));

        if (method_exists($this, $method)) {
            $response = $this->{$method}($payload);
        }

        return new Response('');
    }

    protected function handleCheckoutSessionCompleted(array $payload)
    {

        try {
            $product = Plan::findOrFail($payload['data']['object']['metadata']['product_id']);
        } catch (ModelNotFoundException $e) {
            Log::error('Product not found');
            return;
        }
    
        $sale = $product->sales()->create([
            'email' => $payload['data']['object']['customer_details']['email'],
            'price' => $payload['data']['object']['amount_subtotal'],
            'stripe_id' => $payload['data']['object']['payment_intent'],
            'paid_at' => $payload['data']['object']['payment_status'] === 'paid' ? now() : null, 'email_sent' => false,

        ]);
    
        $user = User::find($payload['data']['object']['metadata']['user_id']);
    
        if ($user) {
            $user->credits += $product->credits;
            $user->save();
        } else {
            Log::info('User not found');
        }

        $view = View::make('mail.purchase-confirmation', ['sale' => $sale])->render();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);
        $dompdf->render();
        $pdfContents = $dompdf->output();
    
        // Define PDF path in a more Laravel way
        $pdfPath = 'public/tmp/Buchung.pdf'; // This path is within the "storage/app/public/tmp" directory
        Storage::put($pdfPath, $pdfContents);
    
        // Adjust the path for Attachment::fromPath
        $fullPdfPath = storage_path('app/public/tmp/Buchung.pdf');
    
        // Send email with the attached PDF
        if (!$sale->email_sent) {
            // Send email with the attached PDF
            Mail::to($sale->email)->send(new PurchaseConfirmation($sale, $fullPdfPath));
            $sale->email_sent = true;
            $sale->save();
        }
    
        unlink($pdfPath);
    }
}
