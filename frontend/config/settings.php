<?php

return [

    // Web Server for serving assets from backend
    //'asset_server' => 'http://backend.test/uploads/',
    'asset_server' => 'https://admin.nurflixtv.com/uploads/',


    // HLS Streaming server
    // "http://localhost:8081/vod/26/videos/smil:stream.smil/playlist.m3u8
    //'streaming_server' => 'http://localhost:8081/vod/',
    'streaming_server' => 'http://stream.nurflixtv.com/vod/',


    // stripe subscription plan
    'subscription_plan' => [
        'price_1HlxukHhfm2rhIO6bBm0grBZ' => "Monthly [ RM5 ]",
        'price_1HlxukHhfm2rhIO6o5KUBIWU' => "Yearly [ RM50 ]",
    ],
];
