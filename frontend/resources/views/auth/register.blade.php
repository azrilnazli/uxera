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
                     <h3 class="mb-3 text-center">Sign Up</h3>
                     <form method="POST" action="{{ route('register') }}">
                     @csrf
                        
                        <div class="form-group">                                 
                           <input 
                              type="text" 
                              class="form-control mb-0 @error('name') is-invalid @enderror" 
                              id="name" 
                              name="name" 
                              value="{{ old('name') }}" 
                              placeholder="Enter Full Name"
                              required autocomplete="off">

                              @error('name')
                                    <p class="text-warning">{{ $message }}</p>
                              @enderror
                        </div>

                        <div class="form-group">                                 
              
                           <input 
                              type="text" 
                              class="form-control mb-0 @error('email') is-invalid @enderror" 
                              id="email" 
                              name="email" 
                              value="{{ old('email') }}" 
                              placeholder="Enter Valid Email"
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
                        
                        <div class="custom-control custom-checkbox mb-3">
                           <input type="checkbox" name="terms" class="custom-control-input" id="customCheck">
                           <label class="custom-control-label" for="customCheck">I accept <a href="#" class="text-primary"> Terms and Conditions</a></label>
                           @error('terms')
                                 <p class="text-warning">{{ $message }}</p>
                           @enderror
                        </div>                      
                           
                        <button type="submit" class="btn btn-hover">Sign Up</button>
                                                         
                     </form>

                  </div>
               </div>    
               <div class="mt-3">
                  <div class="d-flex justify-content-center links">
                     Already have an account? <a href="{{ route('login') }}" class="text-primary ml-2">Sign In</a>
                  </div>                        
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- MainContent End-->
@endSection
