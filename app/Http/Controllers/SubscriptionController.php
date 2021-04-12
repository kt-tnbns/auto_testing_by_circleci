<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Subscription;

class SubscriptionController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email'=>['required']
        ]);
        $subscription = new Subscription;
        Subscription::create([
            'email'=>$request->get('email')
        ]);
        return redirect('/')->with('subscribed', 'Thank you for subscribing to our newsletter!');
    }

    public function index(){
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.index', compact('subscriptions'));
        
    }
}
