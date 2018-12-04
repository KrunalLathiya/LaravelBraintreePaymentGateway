<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree_ClientToken;

class BraintreeTokenController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => [
                'token' => Braintree_ClientToken::generate()
            ]
        ]);
    }
}
