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
                     <h3 class="mb-3 text-center">Sign in</h3>

                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                            <div class="form-group">                                 
                                    
                                    <input 
                                        type="text" 
                                        class="form-control mb-0 @error('email') is-invalid @enderror" 
                                        id="email" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        placeholder="Email"
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
                                        placeholder="Password"
                                        required>

                                        @error('password')
                                            <p class="text-warning">{{ $message }}</p>
                                        @enderror
                                </div>


                                <div class="sign-info">
                                    <button type="submit" class="btn btn-hover">Sign in</button>
                                    <div class="custom-control custom-checkbox d-inline-block">
                                        <input name="remember" type="checkbox" class="custom-control-input" id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>                                
                                </div>    


                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="d-flex justify-content-center links">
                        Don't have an account? <a href="{{ route('register') }}" class="text-primary ml-2">Sign Up</a>
                    </div>
                    <div class="d-flex justify-content-center links">
                        <a href="{{ route('password.request') }}" class="f-link">Forgot your password?</a>
                    </div>
                </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- MainContent End-->


@endSection
