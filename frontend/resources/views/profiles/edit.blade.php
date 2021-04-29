@extends('layouts.streamit')

@section('content-original')
<div class="container">
    
    <nav class="navbar " aria-label="breadcrumb">
        <ol class="breadcrumb  bg-dark text-white">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">My Profile</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update</li>
        </ol>
    </nav>

    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card  bg-dark text-white">
                <div class="card-header">My Profile</div>
                <div class="card-body">
                @include('profiles.partials.edit_form')
                </div>
            </div>
        </div>
    </div>       
</div>   
@endsection    

@section('content')
<!-- MainContent -->
<form action="{{ route('profile.update', auth()->user()->id ) }}" enctype="multipart/form-data" method="post">
@method('PUT')
@csrf

<section class="m-profile manage-p">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-lg-10">
                    <div class="sign-user_card">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="upload_profile d-inline-block">
                        

                                @if(file_exists( public_path().'/thumbnails/avatar-'. auth()->user()->id . '.png' ))
                                    <img src="{{ '/thumbnails/avatar-'. auth()->user()->id . '.png?id=' . microtime() }}" class="profile-pic rounded-circle img-fluid" alt="user">
                                @else
                                    <img src="/images/user/user.jpg" class="profile-pic rounded-circle img-fluid" alt="user">
                                @endif

                                <div class="p-image">
                                    <i class="ri-pencil-line upload-button"></i>
                                    <input name="avatar" class="file-upload" type="file" accept="image/*">
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-10 device-margin">
                                <div class="profile-from">
                                     @include('profiles.partials.edit_form')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</form>
@endSection