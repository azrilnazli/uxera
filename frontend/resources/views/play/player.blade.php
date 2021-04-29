<div class="video-container iq-main-slider" id="playerElement"></div>

<script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
<script type="text/javascript">
    WowzaPlayer.create("playerElement",
            {
                "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
                "sources":[
                            {
                            //"sourceURL":"{{ config('settings.streaming_server') . $video->id }}/videos/smil:stream.smil/playlist.m3u8"
                            "sourceURL":"{{ config('settings.streaming_server') . $video->id }}/videos/mp4:1080p.mp4/playlist.m3u8"
                            },
                        ],

                "title":"",
                "description":"",
                "autoPlay":false,
                "mute":false,
                "volume":75,
                "posterFrameURL":"{{ config('settings.asset_server') . $video->id }}/images/video-poster.png",
                "endPosterFrameURL":"{{ config('settings.asset_server') . $video->id }}/images/video-poster.png",
                "uiPosterFrameFillMode":"fit"   
            }
    );
</script>
