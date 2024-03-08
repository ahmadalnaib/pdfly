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
            'paid_at' => $payload['data']['object']['payment_status'] === 'paid' ? now() : null,
        ]);
    
        $user = User::find($payload['data']['object']['metadata']['user_id']);
    
        if ($user) {
            $user->credits += $product->credits;
            $user->save();
        } else {
            Log::info('User not found');
        }

        
        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('mail.purchase-confirmation', ['sale' => $sale])->render());
        $dompdf->render();
        $pdfContents = $dompdf->output();

        $pdfPath = storage_path('app/tmp/Buchung.pdf');
        file_put_contents($pdfPath, $pdfContents);
    
        Mail::to($sale->email)->send(new PurchaseConfirmation($sale));
    }
}
