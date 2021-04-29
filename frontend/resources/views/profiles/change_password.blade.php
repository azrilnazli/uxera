@extends('layouts.streamit')

@section('content-original')
<div class="container">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-dark text-white">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Change Password</li>
        </ol>
    </nav>

    <div class="justify-content-center">
    
        <div class="col-md-12">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
            <div class="card  bg-dark text-white">
                <div class="card-header ">Change Password</div>
                <div class="card-body col-md-8">
                @include('profiles.partials.change_password_form')
                </div>
            </div>
        </div>
    </div>       
</div>   
@endsection    

@section('content')

<section class="m-profile manage-p">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-lg-10">

                <div class="col-md-12">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                </div>
                
                    <div class="sign-user_card">
                    <h3 class="mb-3 text-center">Change Password</h3>
                         @include('profiles.partials.change_password_form')
                    </div>     
                </div>
            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
