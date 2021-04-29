<!doctype html>
<html lang="en-US">
@include('parts/head')
   <body>
      <!-- loader Start -->
      <div id="loading">
         <div id="loading-center">
         </div>
      </div>
      <!-- loader END -->
      
      <!-- Header -->
      @include('parts/header')
      <!-- Header End -->

      <!-- Slider Start -->
      @include('parts/slider')
      <!-- Slider End -->

      <!-- MainContent -->
      {{-- @include('home/videos') --}}
      @include('play/videos')
      <!-- MainContent End-->

      <!-- Footer -->
      @include('parts/footer')
      <!-- Footer End --> 

   </body>
</html>