<?php

return [
    // HandBrake location for video encoding
    // windows : d:\bin\HandBrakeCLI.exe
    // linux : /usr/local/bin/HandBrakeCLI
    //'HandBrakeCLI' => 'd:\bin\HandBrakeCLI.exe',
    'HandBrakeCLI' => '/usr/bin/HandBrakeCLI',

    // HLS Streaming server
    // "http://localhost:8081/vod/26/videos/smil:stream.smil/playlist.m3u8
    //'streaming_server' => 'http://localhost:8081/vod/',
    'streaming_server' => 'https://stream.nurflixtv.com/vod/',
];
