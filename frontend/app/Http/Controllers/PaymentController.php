<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

use View;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        // menu
        $categories = $this->getCategories();
        View::share('categories', $categories);
    }

    private function getCategories()
    {
        return Category::orderBy('title','ASC')->pluck('title', 'id');
    }   

    public function status()
    {
        $user = auth()->user();
        if ($user->subscribed('main')) 
        {
            // view subscriber view
            //$invoices = $user->invoices();

            $data = [
                'invoices' =>  $user->invoices()
            ];

            return view('payments.status')->with($data);
            
        } else {
            // view non-subscriber view
        }

        
    }

    public function billing()
    {

        if ( auth()->user()->subscribed('main')) {
            // redirect to home
            return redirect( route('home') );
        }

        $availablePlans =[
           'price_1HlxukHhfm2rhIO6bBm0grBZ' => "Yearly [ RM50.00 ]",
           //'price_1HniPsHhfm2rhIO66TDeNjrN' => "Monthly [ RM5.00 ]",
        ];
        $data = [
            'intent' => auth()->user()->createSetupIntent(),
            'plans'=> $availablePlans
        ];
        return view('payments.billing')->with($data);
    }

    public function subscribe(Request $request)
    {
        $user = auth()->user();
        //$user->createAsStripeCustomer();
        
        $paymentMethod = $request->payment_method;

        $planId = $request->plan;
        
        $user->newSubscription('main', $planId)->create($paymentMethod);

        return response([
            'success_url'=> redirect()->intended('/')->getTargetUrl(),
            'message'=> 'Your subscription is success'
        ]);

    }    

    public function cancel(Request $request)
    {
        $user = auth()->user();
        $user->subscription('main')->cancel();
   
        return redirect()->route('payment.status')->with('success','Subscription cancelled.');
    }

    public function resume(Request $request)
    {
        $user = auth()->user();
        $user->subscription('main')->resume();
        return redirect()->route('payment.status')->with('success','Subscription resumed.');
    }

}
