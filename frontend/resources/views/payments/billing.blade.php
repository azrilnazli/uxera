@extends('layouts.app')

@section('head')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-dark text-white">
                <div class="card-header"><h1>Choose Subscription Plan</h2></div>

                <div class="card-body text-dark" style="background-color:#999999">
                <img class="img-thumbnail" src="/src/poster/credit_cards.png" />
                </div>
           

                <div class="card-body text-dark" style="background-color:#999999">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="" >Choose plan</span>
                        </div>
                        <select name="plan" class="bg-dark text-white form-control" id="subscription-plan">
                            @foreach($plans as $key=>$plan)
                                <option value="{{$key}}">{{$plan}}</option>
                            @endforeach
                        </select>
                    </div>    

                    <div class="input-group mt-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="">Card Holder</span>
                        </div>
                        <input placeholder="" class="form-control bg-dark text-white " id="card-holder-name" type="text">
                        </div>
                    <!-- Stripe Elements Placeholder -->
                    <div class="mt-2" id="card-element"></div>
                    <div class="bg-dark text-white text-md mt-1" ><p class="ml-2" id="error"></p></div>

                    <button  class="mt-2 btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                        Subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        window.addEventListener('load', function() {


            const stripe = Stripe('{{env('STRIPE_KEY')}}');

            const elements = stripe.elements();
            const cardElement = elements.create('card');

            cardElement.mount('#card-element');

            const cardHolderName = document.getElementById('card-holder-name');
            const cardButton = document.getElementById('card-button');
            const clientSecret = cardButton.dataset.secret;


            var e = document.getElementById("subscription-plan");
            var value = e.options[e.selectedIndex].value;
            //var text = e.options[e.selectedIndex].text;

            const plan = e.options[e.selectedIndex].value;
            //const plan = document.getElementById('subscription-plan').value;

            cardButton.addEventListener('click', async (e) => {
                cardButton.disabled = true;
                const { setupIntent, error } = await stripe.handleCardSetup(
                    clientSecret, cardElement, {
                        payment_method_data: {
                            billing_details: { name: cardHolderName.value }
                        }
                    }
                );


                if (error) {
                    cardButton.disabled = false;
                    // Display "error.message" to the user...
                    console.log(error.message);
                    document.getElementById('error').innerHTML = error.message;
        

                } else {

                    // The card has been verified successfully...
                    console.log('handling success', setupIntent.payment_method);

                    axios.post('/subscribe',{
                        payment_method: setupIntent.payment_method,
                        plan : plan
                    }).then((data)=>{
                        location.replace(data.data.success_url)
                    });
                }
            });
        })
    </script>
@endsection
