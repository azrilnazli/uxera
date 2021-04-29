<script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
    <div id="playerElementVideo" style="width:100%; height:0; padding:0 0 56.25% 0"></div>
    <script type="text/javascript">
    WowzaPlayer.create("playerElementVideo",
            {
                "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
                "sources":[
                            {
                                "sourceURL":"{{ config('settings.streaming_server') . $data->id }}/videos/smil:stream.smil/playlist.m3u8"
                            },
                        ],

                "title":"",
                "description":"",
                "autoPlay":false,
                "mute":false,
                "volume":75,

                @if (file_exists(public_path('/uploads/' .$data->id. '/images/video-poster.png')))
                    "posterFrameURL":"/uploads/{{ $data->id }}/images/video-poster.png",
                    "endPosterFrameURL":"/uploads/{{ $data->id }}/images/video-poster.png",
                    "uiPosterFrameFillMode":"fit"
                @else 
                    "posterFrameURL":"/src/poster/video-poster.png",
                    "endPosterFrameURL":"/src/poster/video-poster.png",
                    "uiPosterFrameFillMode":"fit"

                @endif    
            }
    );
</script>