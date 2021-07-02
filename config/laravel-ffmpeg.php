<?php

return [
    'default_disk' => 'local',

    'ffmpeg' => [
        // 'binaries' => env('FFMPEG_BINARIES', 'ffmpeg'),
        'FFMPEG' => 'C:/ffmpeg/bin/ffmpeg.exe',
        'threads' => 12,
    ],

    'ffprobe' => [
        // 'binaries' => env('FFPROBE_BINARIES', 'ffprobe'),
        'FFPROBE' => 'C:/ffmpeg/bin/ffprob.exe'

    ],

    'timeout' => 3600,
];
