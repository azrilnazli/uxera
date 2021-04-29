@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/categories">{{ __('Categories') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Show') }}</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header" style="background-color: #dee2e6"><h2>{{ $data->title }}</h2></div>
                <div class="card-header" style="background-color: #eaeaea">
              
                <dl class="row col-md-6">
                    <dt class="col-sm-3">Description</dt>
                    <dd class="col-sm-9"> {{ $data->description }}</dd>
                    <dt class="col-sm-3">Time Taken</dt>
                    <dd class="col-sm-9">  {{ $data->time_taken }} seconds</dd>

                    <dt class="col-sm-3">Created On</dt>
                    <dd class="col-sm-9">  {{ $data->created_at }}</dd>

                </dl>
                </div>

                <div class="card-body">


                    <div class="form-group row mb-0 mt-2">
                            
                            <a href="{{ route('categories.index')}}" class="btn btn-dark ml-2">	&laquo; Back</a>
                
                    </div>
                  
                </div>

                
      
            </div>
        </div>
    </div>
</div>
@endsection
