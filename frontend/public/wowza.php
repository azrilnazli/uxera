<script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
<div id="playerElement" style="width:100%; height:0; padding:0 0 56.25% 0"></div>
<script type="text/javascript">
WowzaPlayer.create("playerElement",
	    {
	        "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
	        "sources":[
                        {
                            "sourceURL":"http://localhost:8081/vod/1/videos/smil:stream.smil/playlist.m3u8"
	                    },
                    ],

            "title":"",
            "description":"",
            "autoPlay":false,
            "mute":false,
            "volume":75
		}
);
</script>
