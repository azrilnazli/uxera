@extends('layouts.app')

@section('content')
<div class="container">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-dark text-white">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Subscription</li>
        </ol>
    </nav>

    @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                 {{ $message }}
            </div>
    @endif

    <div class="justify-content-center">
    
        <div class="col-md-12">

          
            <h1>Subscription</h1>
            <table class="table-borderless">
            <tr>
                <td  scope="col"><strong>Status</strong></td>
                <td style="width:30px"></td>
                <td  scope="col">
                @if( auth()->user()->subscribed('main') )
                <span class="text-white btn btn-sm btn-success">subscribed</span> to  
                    @foreach (auth()->user()->subscriptions as $subscription)
                        {{ ucfirst($subscription->name) }}
                    @endforeach
                    plan
                    @if( Auth::user()->subscription('main')->ends_at)
                    but you already  <span class="text-white btn btn-sm btn-danger">cancelled</span> the plan. Your subscription will end in 
                    {{ \Carbon\Carbon::parse( Auth::user()->subscription('main')->ends_at->format('dS M Y') )->diffForHumans() }}
                    @endif
                @else 
                    Not subscribe to any plans. [ <a href="{{ route('payment.billing') }}">Click here to subscribe</a> ]
                @endif
                
                </td>
            </tr>

            <tr>
                <td  scope="col"><strong>Email</strong></td>
                <td  style="width:30px"></td>
                <td  scope="col"> {{ auth()->user()->email }}</td>
            </tr>

            <tr>
                <td  scope="col"><strong>End Date</strong></td>
                <td  style="width:30px"></td>
                <td  scope="col">
                @if( Auth::user()->subscription('main')->ends_at)
                {{ Auth::user()->subscription('main')->ends_at->format('dS M Y') }}
                @else
                {{ \Carbon\Carbon::parse( Auth::user()->subscription('main')->asStripeSubscription()->current_period_end)->diffForHumans() }}
                @endif 
                </td>
            </tr>

            @if( auth()->user()->subscribed('main')  && !(Auth::user()->subscription('main')->ends_at) )
            <tr>
                <td  scope="col"><strong>Cancel</strong></td>
                <td  style="width:30px"></td>
                <td  scope="col">
                
                        <form action="{{ route('payment.cancel')}}" method="post">
                                @csrf
                                <button onclick="return confirm('Are you sure?')" class="btn-sm btn-danger" type="submit"><i class="fas fa-times"></i> Cancel Subscription</button>
                        </form>
                </td>
            </tr>
            @else 
                @if (auth()->user()->subscription('main')->onGracePeriod()) 

            <tr>
                <td  scope="col"><strong>Resume</strong></td>
                <td  style="width:30px"></td>
                <td  scope="col">
                
                        <form action="{{ route('payment.resume')}}" method="post">
                                @csrf
                                <button onclick="return confirm('Are you sure?')" class="btn-sm btn-success" type="submit"><i class="fa fa-sign-in"></i> Click here to resume</button>
                        </form>
                </td>
            </tr>
                @endif

            @endif


  

            <tr>
            <td  scope="col"><strong>Member Since</strong></td>
            <td style="width:30px"></td>
            <td  scope="col">{{ \Carbon\Carbon::parse(auth()->user()->created_at)->diffForHumans() }}</td>
            </tr>

        </table>
        <hr />
        <h2>Invoices</h2>
        <table class="table table-light">
        <thead >
            <tr>
            <th scope="col">Date</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
  
            </tr>
     </thead>
            @foreach ($invoices as $invoice)
                <tr>
                    <td scope="row">{{ $invoice->date()->toFormattedDateString() }}</td>
                    <td>{{ $invoice->total() }}</td>
                    <td><a class="btn btn-success" href="/payment/invoice/{{ $invoice->id }}">Download</a></td>
                </tr>
            @endforeach
        </table>




        </div>
    </div>       
</div>   
@endsection    
