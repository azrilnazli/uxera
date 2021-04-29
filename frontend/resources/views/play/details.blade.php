<section class="movie-detail container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="trending-info season-info g-border">
                <h4 class="trending-text big-title text-uppercase mt-0">{{ $video->category->title }}</h4>
                <div class="d-flex align-items-center text-white text-detail episode-name mb-0">
                <span>S1E01</span>
                <span class="trending-year">{{ $video->title }}</span>
                </div>
                <p class="trending-dec w-100 mb-0">{{ $video->description }}</p>
                <ul class="list-inline p-0 mt-4 share-icons music-play-lists">
                {{--
                <li><span><i class="ri-add-line"></i></span></li>
                <li><span><i class="ri-heart-fill"></i></span></li>
                --}}
                <li class="share">
                    <span><i class="ri-share-fill"></i></span>
                    <div class="share-box">
                        <div class="d-flex align-items-center">
                            <a href="#" class="share-ico"><i class="ri-facebook-fill"></i></a>
                            <a href="#" class="share-ico"><i class="ri-twitter-fill"></i></a>
                            <a href="#" class="share-ico"><i class="ri-links-fill"></i></a>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
        </div>
    </div>
</section>