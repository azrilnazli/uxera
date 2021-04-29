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



      <!-- MainContent -->
      @if(!empty($latest))
        @include('play/videos')
      @else 
        <p>No results</p>
      @endif
      <!-- MainContent End-->

      <!-- Footer -->
      @include('parts/footer')
      <!-- Footer End --> 

   </body>
</html>