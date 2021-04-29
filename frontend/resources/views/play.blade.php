@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-center">
<div class="row col-sm-9">
    <script type="text/javascript" src="//player.wowza.com/player/latest/wowzaplayer.min.js"></script>
    <div id="playerElement" style="width:100%; height:0; padding:0 0 56.25% 0"></div>
    <script type="text/javascript">
        WowzaPlayer.create("playerElement",
            {
                "license":"PLAY1-hZeDc-CnBKQ-PM8MY-C9QkZ-cu899",
                "sources":[
                            {
                                "sourceURL":"{{ config('settings.streaming_server') . $video->id }}/videos/smil:stream.smil/playlist.m3u8"
                            },
                        ],

                "title":"",
                "description":"",
                "autoPlay":false,
                "mute":false,
                "volume":75,
                "posterFrameURL":"{{ config('settings.asset_server') . $video->id }}/images/file-2.png",
                "endPosterFrameURL":"{{ config('settings.asset_server') . $video->id }}/images/file-2.png",
                "uiPosterFrameFillMode":"fit"   
            }
        );
    </script>
</div>

</div>

@endsection 