<section id="iq-favorites">
         <div class="container-fluid">
            <div class="block-space">
               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">&nbsp;</h4>
                        {{-- <a href="show-single.html" class="text-primary">View all</a> --}}
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-sm-12 overflow-hidden">
                     <div class="iq-main-header d-flex align-items-center justify-content-between">
                        <h4 class="main-title">Latest Episodes</h4>
                        {{-- <a href="show-single.html" class="text-primary">View all</a> --}}
                     </div>
                  </div>
               </div>


               <div class="row">
                   
                    @foreach($latest as $video)
                    <div class="col-1-5 col-md-6 iq-mb-30">
                            <div class="epi-box">
                                <div class="epi-img position-relative">
                                <img src="{{ config('settings.asset_server') . $video->id }}/images/video-poster.png" class="img-fluid img-zoom" alt="">
                                <div class="episode-number">1</div>
                                <div class="episode-play-info">
                                    <div class="episode-play">
                                        <a href="{{ route('show_details',  $video->id) }}">
                                            <i class="ri-play-fill"></i>
                                        </a>
                                    </div>
                                </div>
                                </div>
                                <div class="epi-desc p-3">
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="text-white">{{ $video->category->title }}</span>
                                    <span class="text-primary">{{-- 30m  --}}</span>
                                </div>
                                <a href="show-details.html">
                                    <h6 class="epi-name text-white mb-0">{{ $video->description }}
                                    </h6>
                                </a>
                                </div>
                            </div>
                    </div>
                    @endforeach

               </div>
            </div>
         </div>
      </section>
