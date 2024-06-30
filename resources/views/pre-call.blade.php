<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="cache-control" content="max-age=0">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="shortcut icon" href="assets/favicon.ico">
    <title>AgoraWeb</title>
    @vite(['resources/js/meet.js'])
</head>

<body>
<div class="wrapper" id="page-precall">
    <div class="ag-header">
        <div class="ag-header-lead">
            <img class="ag-header-logo" src="../../assets/images/ag-logo.png" alt="">
            <span></span>
        </div>
    </div>
    <div class="ag-main">
        <div class="columns ag-container">
            <div class="column">
                <div class="ag-info">
                    <p>Room Name:
                        <span id="channel"></span>
                    </p>
                    <p>Base Mode:
                        <span id="baseMode"></span>
                    </p>
                    <p>Attendee Mode:
                        <span id="attendeeMode"></span>
                    </p>
                    <p>Video Profile:
                        <span id="videoProfile"></span>
                    </p>
                    <p>Transcode:
                        <span id="transcode"></span>
                    </p>
                    <div class="ag-info-footer">
                        <a id="quickJoinBtn" class="ag-rounded button">
                            <span>Quick Join</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="column">
                <div class="ag-cards">
                    <section class="ag-cards-title">
                        <div class="ag-steps">
                            <div id="stepOne" class="step active">1</div>
                            <div id="stepTwo" class="step">2</div>
                        </div>
                    </section>

                    <section class="ag-card" id="videoCard">
                        <div class="ag-card-header">
                <span>
                  <i class="ag-icon ag-icon-video-24"></i>
                </span>
                            <span>Video</span>
                        </div>
                        <div class="ag-card-tip">
                            Move in front of the camera to check if it works.
                        </div>
                        <div class="ag-card-body">
                            <div class="initial">
                                <div class="select ag-select">
                                    <select class="is-clipped ag-rounded" id="videoDevice">

                                    </select>
                                </div>
                                <div class="ag-video-test">
                                    <div id="videoItem">
                                    </div>
                                    <div class="field" id="enableVideoSwitch">
                                        <input id="enableVideo" type="checkbox" name="enableVideo" class="switch is-rounded is-success">
                                        <label for="enableVideo"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="result"></div>

                        </div>
                    </section>
                    <section class="ag-card" id="audioCard">
                        <div class="ag-card-header">
                <span>
                  <i class="ag-icon ag-icon-audio-24"></i>
                </span>
                            <span>Audio</span>
                        </div>
                        <div class="ag-card-tip">
                            Produce sounds to check if the mic works.
                        </div>
                        <div class="ag-card-body">
                            <div class="initial">
                                <div class="select ag-select">
                                    <select class="is-clipped ag-rounded" id="audioDevice">

                                    </select>
                                </div>
                                <div class="ag-audio-test">
                    <span>
                      <i class="ag-icon ag-icon-audio-24"></i>
                    </span>
                                    <progress id="volume" class="progress is-small is-info" value="0" max="100"></progress>
                                </div>
                            </div>
                            <div class="result"></div>

                        </div>
                    </section>
                    <section class="ag-card" id="connectCard">
                        <div class="ag-card-header">
                <span>
                  <i class="ag-icon ag-icon-connect-24"></i>
                </span>
                            <span>Loss Measurement</span>
                        </div>
                        <div class="ag-card-body ag-connect-test">
                            <!-- <div id="testDuration"></div> -->
                            <!-- <progress id="testDuration" class="progress is-success" value="0" max="30"></progress> -->
                            <div class="ag-browser-test">
                                <img src="../../assets/images/ag-browser.png" alt="">
                                <p>Browser Compatibility:
                                    <span id="compatibility"></span>
                                </p>
                            </div>
                        </div>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <div class="ag-footer">
        <a class="ag-href" target="_blank" href="https://www.agora.io">
            <span>Powered By Agora</span>
        </a>
        <span>Talk to Support: 400 632 6626</span>
    </div>

    <!-- modal/messages/notifications -->

</div>
<!-- inject -->
</body>

</html>
