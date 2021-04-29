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
      
      <!-- Banner Start -->
      @include('play/player')
      <!-- Banner End -->

      <!-- MainContent -->
      <div class="main-content">
         @include('play/details')
         @include('play/videos')
      </div>
      <!-- MainContent End-->

      <!-- Footer -->
      @include('parts/footer')
      <!-- Footer End --> 


   </body>
</html>