<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;

class SubscriptionController extends Controller
{
    public function create(Request $request, Plan $plan)
    {
        if($request->user()->subscribedToPlan($plan->braintree_plan, 'main')) {
            return redirect()->route('home');
        }

        $plan = Plan::findOrFail($request->get('plan'));
        
        $request->user()
            ->newSubscription('main', $plan->braintree_plan)
            ->create($request->payment_method_nonce);
        
        return redirect()->route('home')->with('success', 'Your plan subscribed successfully');
    }
}
