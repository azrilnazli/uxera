<script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
    <div id="playerElement" style="width:100%; height:0; padding:0 0 56.25% 0"></div>
    <script type="text/javascript">
    WowzaPlayer.create("playerElement",
            {
                "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
                "sources":[
                            {
                                "sourceURL":"http://localhost:8081/vod/{{ $data->id }}/videos/smil:stream.smil/playlist.m3u8"
                            },
                        ],

                "title":"",
                "description":"",
                "autoPlay":false,
                "mute":false,
                "volume":75,
                @if (file_exists(public_path('/uploads/' .$data->id. '/images/file-2-small.png')))
                    "posterFrameURL":"/uploads/{{ $data->id }}/images/file-2-small.png",
                    "endPosterFrameURL":"/uploads/{{ $data->id }}/images/file-2-small.png",
                    "uiPosterFrameFillMode":"fit"
                @else 
                    "posterFrameURL":"/src/poster/trailer.png",
                    "endPosterFrameURL":"/src/poster/trailer.png",
                    "uiPosterFrameFillMode":"fit"
                @endif   
            }
    );
</script>