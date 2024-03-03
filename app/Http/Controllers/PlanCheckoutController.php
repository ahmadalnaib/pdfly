<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;

class PlanCheckoutController extends Controller
{
    
    public function __invoke(Plan $plan, User $user)
    {

        $user = auth()->user();
        if (!$user) {
            return abort(401);
        }
        
        $response = app('stripe')->checkout->sessions->create([
            'customer_email' => $user->email,
            'success_url' => route('pdf.index'),
            'cancel_url' => route('welcome'),
            'payment_method_types' => ['card'],
        
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => $plan->name,
                        ],
                        'unit_amount' => $plan->price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'metadata' => [
                'user_id' => auth()->id(),
                'product_id' => $plan->id,
            ],
        ]);
       return redirect($response->url);
    }
}
