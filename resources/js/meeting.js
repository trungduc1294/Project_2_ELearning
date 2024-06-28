const API_KEY = "d2052066-ac61-4565-96b6-18a901ec6b1f";
const API_SECRET = "4d0b3d28805789f69fb07d08e7f0861b512c5e4ad0035277d1e7167e7e7cbff2";
const TOKEN = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcGlrZXkiOiJkMjA1MjA2Ni1hYzYxLTQ1NjUtOTZiNi0xOGE5MDFlYzZiMWYiLCJwZXJtaXNzaW9ucyI6WyJhbGxvd19qb2luIl0sImlhdCI6MTcxOTU0NTY2MCwiZXhwIjoxODc3MzMzNjYwfQ.7JYCTXB5MBGKv4v5pe-PNNfpcaxV2qLjYzWnQhOCrns";
let lobby = $('.meeting-lobby');
let calling = $('.meeting-calling')

let meetRoomInput = $('#meet-room');
let btnJoinMeet = $('#join-meet');
let btnNewMeet = $('#new-meet');
let roomName = $('.room-name');
let roomTimer = $('.room-timer');

let toggleMicButton = $('.audio-control');
let toggleVideoButton = $('.video-control');
let toggleShareButton = $('.share-control');
let toggleChatButton = $('.chat-control');
let toggleUsersButton = $('.users-control');
let endCallButton = $('.btn-end-call');

let sidebar = $('.right-sidebar');
let memberList = $('.member-list');
let chatList = $('.chat-list');

// const joinButton = document.getElementById("joinBtn");
// const leaveButton = document.getElementById("leaveBtn");
// const toggleMicButton = document.getElementById("toggleMicBtn");
// const toggleWebCamButton = document.getElementById("toggleWebCamBtn");
// const createButton = document.getElementById("createMeetingBtn");
const videoContainer = document.getElementById("videoContainer");
// const textDiv = document.getElementById("textDiv");

// Declare Variables
let meeting = null;
let meetingId = "";
let isMicOn = false;
let isWebCamOn = false;
let timerInterval = null;
let memberInRoom = {};
$(document).ready(function () {

    const userItemTemplate = `
        <div class="user-item">
            <div class="user-info">
                <div class="user-avatar">DU</div>
                <div class="user-detail">
                    <div class="user-name">Demo User</div>
                </div>
            </div>
            <div class="user-meeting-status">
                <div class="audio-control meeting-control disabled">
                    <div class="icon-enabled icon-content">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 15.5C14.21 15.5 16 13.71 16 11.5V6C16 3.79 14.21 2 12 2C9.79 2 8 3.79 8 6V11.5C8 13.71 9.79 15.5 12 15.5Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.3501 9.6499V11.3499C4.3501 15.5699 7.7801 18.9999 12.0001 18.9999C16.2201 18.9999 19.6501 15.5699 19.6501 11.3499V9.6499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.6101 6.43012C11.5101 6.10012 12.4901 6.10012 13.3901 6.43012" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11.2 8.55007C11.73 8.41007 12.28 8.41007 12.81 8.55007" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 19V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </div>
                    <div class="icon-disabled icon-content">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 6.3V6C16 3.79 14.21 2 12 2C9.79 2 8 3.79 8 6V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.04004 14.19C9.77004 15 10.83 15.5 12 15.5C14.21 15.5 16 13.71 16 11.5V11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.78003 16.9499C8.15003 18.2199 9.98003 18.9999 12 18.9999C16.22 18.9999 19.65 15.5699 19.65 11.3499V9.6499" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.34998 9.6499V11.3499C4.34998 12.4099 4.55998 13.4099 4.94998 14.3299" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.0701 2.84009L3.93005 18.9901" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M11 3V6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 19V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    </div>
                </div>
                <div class="video-control meeting-control">
                    <div class="icon-enabled icon-content">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.53 20.4201H6.21C3.05 20.4201 2 18.3201 2 16.2101V7.79008C2 4.63008 3.05 3.58008 6.21 3.58008H12.53C15.69 3.58008 16.74 4.63008 16.74 7.79008V16.2101C16.74 19.3701 15.68 20.4201 12.53 20.4201Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.52 17.0999L16.74 15.1499V8.83989L19.52 6.88989C20.88 5.93989 22 6.51989 22 8.18989V15.8099C22 17.4799 20.88 18.0599 19.52 17.0999Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11.5 11C12.3284 11 13 10.3284 13 9.5C13 8.67157 12.3284 8 11.5 8C10.6716 8 10 8.67157 10 9.5C10 10.3284 10.6716 11 11.5 11Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <div class="icon-disabled icon-content">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.63 7.58008C16.63 7.58008 16.66 6.63008 16.63 6.32008C16.46 4.28008 15.13 3.58008 12.52 3.58008H6.21C3.05 3.58008 2 4.63008 2 7.79008V16.2101C2 17.4701 2.38 18.7401 3.37 19.5501L4 20.0001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M16.74 10.95V16.21C16.74 19.37 15.69 20.42 12.53 20.42H7.26001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22 6.73999V15.81C22 17.48 20.88 18.06 19.52 17.1L16.74 15.15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M22.02 2.18994L2.02002 22.1899" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    `;


    const timer = () => {
        if (!timerInterval) {
            clearInterval(timerInterval);
        }

        timerInterval = setInterval(() => {
            let _date = new Date;
            roomTimer.html(`${_date.getHours()}:${_date.getMinutes()}:${_date.getSeconds()}`)
        }, 1000)
    }

    const createVideoElement = (pId, name) => {
        let videoFrame = document.createElement("div");
        videoFrame.setAttribute("id", `f-${pId}`);

        //create video
        let videoElement = document.createElement("video");
        videoElement.classList.add("video-frame");
        videoElement.setAttribute("id", `v-${pId}`);
        videoElement.setAttribute("playsinline", true);
        videoElement.setAttribute("width", "300");

        if (pId === meeting.localParticipant.id) {
            videoElement.style.transform = "scaleX(-1)";
            videoElement.style.WebkitTransform = "scaleX(-1)";
        }

        videoFrame.appendChild(videoElement);

        let displayName = document.createElement("div");
        displayName.innerHTML = `Name : ${name}`;

        videoFrame.appendChild(displayName);
        return videoFrame;
    }

    const createAudioElement = (pId) => {
        let audioElement = document.createElement("audio");
        audioElement.setAttribute("autoPlay", "false");
        audioElement.setAttribute("playsInline", "true");
        audioElement.setAttribute("controls", "false");
        audioElement.setAttribute("id", `a-${pId}`);
        audioElement.style.display = "none";
        return audioElement;
    }

    const setTrack = (stream, audioElement, participant, isLocal) => {
        if (stream.kind == "video") {
            isWebCamOn = true;
            const mediaStream = new MediaStream();
            mediaStream.addTrack(stream.track);
            let videoElm = document.getElementById(`v-${participant.id}`);
            videoElm.srcObject = mediaStream;
            videoElm
                .play()
                .catch((error) =>
                    console.error("videoElem.current.play() failed", error)
                );
        }
        if (stream.kind == "audio") {
            if (isLocal) {
                isMicOn = true;
            } else {
                const mediaStream = new MediaStream();
                mediaStream.addTrack(stream.track);
                audioElement.srcObject = mediaStream;
                audioElement
                    .play()
                    .catch((error) => console.error("audioElem.play() failed", error));
            }
        }
    }

    const createSidebarMemberItem = function (participant) {
        let template = $(userItemTemplate);
        let userList = $('.user-items');
        template.attr('id', 'sidebar-user-' + participant.id)
        if (participant?.local) {
            template.addClass('is-host')
        }
        
        // display user name
        template.find('.user-name').html(participant.displayName);
        template.find('.user-avatar').html(participant.displayName.split(" ").map((n)=>n[0]).join(""));
        
        // handle meet status
        userList.append(template);
    }

    const updateParticipantStatus = function (participant) {
        let userList = $('.user-items');
        let item = userList.find('#sidebar-user-' + participant.id);
        item.find('.audio-control').removeClass('disabled').addClass(participant?.micOn ? '' : 'disabled');
        item.find('.video-control').removeClass('disabled').addClass(participant?.webcamOn ? '' : 'disabled');
    }

    const handleOnParticipantJoin = function (participant) {
        if (!memberInRoom[participant.id]) {
            memberInRoom[participant.id] = participant.id
        }
        console.log('handleOnParticipantJoin', participant);
        // listen event when stream enabled
        participant.on("stream-enabled", (stream) => {
            let videoElement = createVideoElement(
                participant.id,
                participant.displayName
            );
            let audioElement = createAudioElement(participant.id);
            videoContainer.appendChild(videoElement);
            videoContainer.appendChild(audioElement);
            setTrack(stream, audioElement, participant, participant?.local);
            updateParticipantStatus(participant)
        });

        // add new member in sidebar section
        createSidebarMemberItem(participant)
    }

    const handleOnParticipantLeave = function (participant) {
        console.log('handleOnParticipantLeave', participant);
        // remove audio and video
        $(`#f-${participant.id}`).remove();
        $(`#a-${participant.id}`).remove();

        // remove user item
        $('.user-items').find('#sidebar-user-' + participant.id).remove();

        delete memberInRoom[participant.id];
        if (!Object.keys(memberInRoom)) {
            meeting?.end();
        }
    }

    // Initialize meeting
    const initializeMeeting = () => {
        window.VideoSDK.config(TOKEN);

        meeting = window.VideoSDK.initMeeting({
            meetingId: meetingId, // required
            name: "Thomas Edison " + (new Date).getTime(), // required
            micEnabled: true, // optional, default: true
            webcamEnabled: true, // optional, default: true
        });

        handleOnParticipantJoin(meeting.localParticipant)

        meeting.join();
        roomName.html(meetingId);

        // meeting joined event
        meeting.on("meeting-joined", function (participant) {
            console.log('meeting-joined', participant, $(lobby))
            $(lobby).addClass('hidden').removeClass('flex');
            $(calling).addClass('flex').removeClass('hidden');
            timer();

            // textDiv.style.display = "none";
            // document.getElementById("grid-screen").style.display = "block";
            // document.getElementById(
            //     "meetingIdHeading"
            // ).textContent = `Meeting Id: ${meetingId}`;
        });

        // meeting left event
        meeting.on("meeting-left", function (evt) {
            console.log('meeting-left', $(lobby), evt)
            console.log(meeting)
            $(lobby).removeClass('hidden').addClass('flex');
            $(calling).addClass('hidden').removeClass('flex');
            videoContainer.innerHTML = "";
        });

        // Remote participants Event
        // participant joined
        meeting.on("participant-joined", (participant) => {
            console.log('participant-joined', participant)

            // stream-enabled
            handleOnParticipantJoin(participant);
        });

        // participant left
        meeting.on("participant-left", (participant) => {
            console.log('participant-left', participant);
            handleOnParticipantLeave(participant);
        });
    }

    

    btnJoinMeet.on('click', function (evt) {
        evt.preventDefault();
        // document.getElementById("join-screen").style.display = "none";
        // textDiv.textContent = "Joining the meeting...";

        meetingId = meetRoomInput.val();

        initializeMeeting();
    })

    btnNewMeet.on('click', async function (evt) {
        evt.preventDefault();

        // document.getElementById("join-screen").style.display = "none";
        // textDiv.textContent = "Please wait, we are joining the meeting";

        // API call to create meeting
        const url = `https://api.videosdk.live/v2/rooms`;
        const options = {
            method: "POST",
            headers: { Authorization: TOKEN, "Content-Type": "application/json" },
        };

        const { roomId } = await fetch(url, options)
            .then((response) => response.json())
            .catch((error) => alert("error", error));
        meetingId = roomId;

        initializeMeeting();
    })

    $('.users-control, .chat-control').on('click', function (evt) {
        evt.preventDefault();
        let isActive = $(this).hasClass('active');
        let sidebar = $('.right-sidebar');
        let activeClass = $(this).is('.users-control') ? 'show-list-user' : 'show-list-chat';

        $('.users-control, .chat-control').removeClass('active');
        if (isActive) {
            sidebar.removeClass('active');
            return;
        }
        if (!isActive) {
            $(this).toggleClass('active');
            sidebar.addClass('active');
        }

        sidebar.removeClass('show-list-user show-list-chat').addClass(activeClass)
    });

    $('.right-sidebar .btn-close-sidebar').on('click', function (evt) {
        evt.preventDefault();
        $('.right-sidebar').removeClass('users-control show-list-chat active');
        $('.users-control, .chat-control').removeClass('active')
    })

    $('.btn-end-call').on('click', function () {
        meeting?.leave();
    })
});