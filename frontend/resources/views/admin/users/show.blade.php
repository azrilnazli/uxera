@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="/users">{{ __('Users') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ __('Show') }}</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header" style="background-color: #dee2e6">{{ __('Show') }}</div>

                <div class="card-body">
        
                <dl class="row col-md-6">
                    <dt class="col-sm-3">Role</dt>
                    <dd class="col-sm-9">{{ ucfirst($data->role) }}</dd>
                    <dt class="col-sm-3">Name</dt>
                    <dd class="col-sm-9">{{ $data->name }}</dd>

                    <dt class="col-sm-3">Email</dt>
                    <dd class="col-sm-9">{{ $data->email }}</dd>

                    <dt class="col-sm-3">Registred On</dt>
                    <dd class="col-sm-9">{{ $data->created_at }}</dd>

                </dl>



                        <div class="form-group row mb-0">
                           
                             <a href="{{ route('users.index')}}" class="btn btn-dark ml-2">	&laquo; Back</a>
               
                        </div>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
