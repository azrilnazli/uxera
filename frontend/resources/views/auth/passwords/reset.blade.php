@extends('auth.app')

@section('content')
<!-- MainContent -->
<section class="sign-in-page">
   <div class="container">
      <div class="row justify-content-center align-items-center height-self-center">
         <div class="col-lg-5 col-md-12 align-self-center">
            <div class="sign-user_card ">                    
               <div class="sign-in-page-data">
                  <div class="sign-in-from w-100 m-auto">
                    <h3 class="mb-3 text-center">Reset Password</h3>
                    <p class="text-body">Enter your email address and we'll send you an email with instructions to reset your password.</p>
                
                    <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">                                 
              
                           <input 
                              type="text" 
                              class="form-control mb-0 @error('email') is-invalid @enderror text-primary" 
                              id="email" 
                              name="email" 
                              
                              value="{{ $email ?? old('email') }}"
                              placeholder="Enter Valid Email"
                              readonly 
                              required autocomplete="off">

                              @error('email')
                                    <p class="text-warning">{{ $message }}</p>
                              @enderror
                        </div>

                        <div class="form-group">                                 
               
                           <input 
                              type="password" 
                              class="form-control mb-0 @error('password') is-invalid @enderror" 
                              id="password" 
                              name="password" 
                              placeholder="Enter Your Password"
                              required>

                              @error('password')
                                    <p class="text-warning">{{ $message }}</p>
                              @enderror
                        </div>

                        <div class="form-group">                                 
               
                           <input 
                              type="password" 
                              class="form-control mb-0 @error('password') is-invalid @enderror" 
                              id="password-confirm" 
                              name="password_confirmation" 
                              placeholder="Confirm Password"
                              required>
                        </div>

                        <button type="submit" class="btn btn-hover">Reset Password</button>

                    </form>

                  </div>
               </div>                    
            </div>
         </div>
      </div>
      <!-- Sign in END -->
      <!-- color-customizer -->
   </div>
</section>
<!-- MainContent End-->

@endsection
