@extends('layouts.streamit')

@section('content-original')
<div class="container">
    
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb  bg-dark text-white">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
    </nav>

    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="card bg-dark text-white">
                <div class="card-header"><h2>{{ auth()->user()->name }}</h2></div>
                <div class="card-body">
                @include('profiles.partials.show_table')
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary mt-2" href="{{ route('profile.edit',  auth()->user()->id  ) }}">Update</a>
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
                    <div class="sign-user_card">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="upload_profile d-inline-block">
                                    @if(file_exists( public_path().'/thumbnails/avatar-'. auth()->user()->id . '.png' ))
                                    <img src="{{ '/thumbnails/avatar-'. auth()->user()->id . '.png?id=' . microtime()  }}" class="profile-pic rounded-circle img-fluid" alt="user">
                                    @else
                                    <img src="/images/user/user.jpg" class="profile-pic rounded-circle img-fluid" alt="user">
                                    @endif


                            
                                </div>
                            </div>
                            <div class="col-lg-10 device-margin">
                                <div class="profile-from">
                                    <h4 class="mb-3">Profile for  {{ auth()->user()->name }}</h4>
                                    
                                    <table class="table-borderless">
                                        <tr>
                                            <td  scope="col"><strong>User Level</strong></td>
                                            <td style="width:30px"></td>
                                            <td  scope="col"> {{ auth()->user()->role }}</td>
                                        </tr>

                                        <tr>
                                            <td  scope="col"><strong>Email</strong></td>
                                            <td  style="width:30px"></td>
                                            <td  scope="col"> {{ auth()->user()->email }}</td>
                                        </tr>

                                        <tr>
                                            <td  scope="col"><strong>Address</strong></td>
                                            <td  style="width:30px"></td>
                                            <td  scope="col">{!! nl2br(e($profile->address)) !!}</td>
                                        </tr>

                                        <tr>
                                        <td  scope="col"><strong>Member Since</strong></td>
                                        <td style="width:30px"></td>
                                        <td  scope="col">{{ \Carbon\Carbon::parse(auth()->user()->created_at)->diffForHumans() }}</td>
                                        </tr>

                                    </table>

                                    <a href="{{ route('profile.edit',  auth()->user()->id  ) }}"  class="btn btn-hover">Edit</a>                                                            
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endSection
