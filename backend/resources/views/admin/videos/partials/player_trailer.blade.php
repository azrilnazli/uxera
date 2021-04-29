<script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
    <div id="playerElementTrailer" style="width:100%; height:0; padding:0 0 56.25% 0"></div>
    <script type="text/javascript">
    WowzaPlayer.create("playerElementTrailer",
            {
                "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
                "sources":[
                            {
                                "sourceURL":"{{ config('settings.streaming_server') . $data->id }}/trailer/smil:stream.smil/playlist.m3u8"
                            },
                        ],

                "title":"",
                "description":"",
                "autoPlay":false,
                "mute":false,
                "volume":75,

                @if (file_exists(public_path('/uploads/' .$data->id. '/images/trailer-poster.png')))
                    "posterFrameURL":"/uploads/{{ $data->id }}/images/trailer-poster.png",
                    "endPosterFrameURL":"/uploads/{{ $data->id }}/images/trailer-poster.png",
                    "uiPosterFrameFillMode":"fit"
                @else 
                    "posterFrameURL":"/src/poster/trailer-poster.png",
                    "endPosterFrameURL":"/src/poster/trailer-posdter.png",
                    "uiPosterFrameFillMode":"fit"

                @endif    
            }
    );
</script>