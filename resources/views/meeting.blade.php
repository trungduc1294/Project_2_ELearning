<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://sdk.videosdk.live/js-sdk/0.0.86/videosdk.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css" />
    @vite(['resources/js/meet.js', 'resources/scss/meeting.scss',])
</head>
<body>

    <div class="meeting-workspace w-screen h-screen">
        <div class="main-video-call"></div>
        <div class="sidebar"></div>
        <div class="bottom-bar">
            <div class="bar-wrapper">
                <div class="room-info">
                    <span class="timer">14:04</span> | <span class="room-name">yak-vjho-ifo</span>
                </div>
                <div class="center-actions">
                    <div class="audio-control meeting-control">
                        <i class="ri-mic-off-line off"></i>
                        <i class="ri-mic-line on"></i>
                    </div>
                    <div class="video-control meeting-control">
                        <i class="ri-video-on-line on"></i>
                        <i class="ri-video-off-line off"></i>
                    </div>
                    <div class="share-control meeting-control">
                        <i class="ri-tv-2-line"></i>
                    </div>
                    <div class="raise-control meeting-control">
                        <i class="ri-hand"></i>
                    </div>
                    <div class="end-call-control meeting-control">
                        <i class="ri-phone-line"></i>
                    </div>
                </div>

                <div class="right-controls">
                    <div class="member-control meeting-control"><i class="ri-group-line"></i></div>
                    <div class="chat-control meeting-control">
                        <i class="ri-message-line"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
