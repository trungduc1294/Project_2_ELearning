<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/scss/meeting.scss', 'resources/js/meeting.js',])
</head>
<body>

{{-- lobby --}}
<div class="meeting-lobby flex flex-col">

        <div class="wrapper w-full flex justify-around items-center">

            <div class="left">
                <div class="text mb-20">
                    <h1 class="text-4xl text-yellow-200 font-extrabold">Học tập và phát triển</h1>
                    <h1 class="text-4xl text-yellow-400 font-extrabold">Môi trường trực tuyến</h1>
                    <h1 class="text-4xl text-yellow-600 font-extrabold">Năng động & Sáng tạo</h1>

                </div>
                <div class="join-room">
                    @if (session('role') == 'teacher')
                        <button type="button" id="new-meet" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 transform transition duration-300 ease-linear">Tạo phòng học mới</button>
                    @endif
    
                    <div class="form-group">
                        <input type="text" id="meet-room" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Mã code phòng học" />
                        <button type="button" id="join-meet" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tham gia</button>
                    </div>
                </div>
            </div>

            <div class="right">
                <img class="w-60 h-60" src="{{asset("/images/meeting/meeting.png")}}" alt="">
            </div>
        </div>
</div>

{{-- room --}}
<div class="meeting-calling hidden bg-[#151f32] h-full">
    <div class="" id="videoContainer"></div>
    <div class="bottom-toolbar">
        <div class="room-info">
            <span class="room-timer"></span>
            <span class="room-name text-red-400"></span>
        </div>
        <div class="meeting-controls">
            <div class="audio-control meeting-control">
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

            <div class="share-control meeting-control">
                <div class="icon-content">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 9.51001L12 6.51001L15 9.51001" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 6.51001V14.51" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6 16.51C9.89 17.81 14.11 17.81 18 16.51" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <div class="chat-control meeting-control">
                <div class="icon-content">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.98 10.79V14.79C17.98 15.05 17.97 15.3 17.94 15.54C17.71 18.24 16.12 19.58 13.19 19.58H12.79C12.54 19.58 12.3 19.7 12.15 19.9L10.95 21.5C10.42 22.21 9.56 22.21 9.03 21.5L7.82999 19.9C7.69999 19.73 7.41 19.58 7.19 19.58H6.79001C3.60001 19.58 2 18.79 2 14.79V10.79C2 7.86001 3.35001 6.27001 6.04001 6.04001C6.28001 6.01001 6.53001 6 6.79001 6H13.19C16.38 6 17.98 7.60001 17.98 10.79Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21.98 6.79001V10.79C21.98 13.73 20.63 15.31 17.94 15.54C17.97 15.3 17.98 15.05 17.98 14.79V10.79C17.98 7.60001 16.38 6 13.19 6H6.79004C6.53004 6 6.28004 6.01001 6.04004 6.04001C6.27004 3.35001 7.86004 2 10.79 2H17.19C20.38 2 21.98 3.60001 21.98 6.79001Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13.4955 13.25H13.5045" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.9955 13.25H10.0045" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.4955 13.25H6.5045" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>

            <div class="users-control meeting-control">
                <div class="icon-content">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.16006 10.87C9.06006 10.86 8.94006 10.86 8.83006 10.87C6.45006 10.79 4.56006 8.84 4.56006 6.44C4.56006 3.99 6.54006 2 9.00006 2C11.4501 2 13.4401 3.99 13.4401 6.44C13.4301 8.84 11.5401 10.79 9.16006 10.87Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M16.41 4C18.35 4 19.91 5.57 19.91 7.5C19.91 9.39 18.41 10.93 16.54 11C16.46 10.99 16.37 10.99 16.28 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M4.15997 14.56C1.73997 16.18 1.73997 18.82 4.15997 20.43C6.90997 22.27 11.42 22.27 14.17 20.43C16.59 18.81 16.59 16.17 14.17 14.56C11.43 12.73 6.91997 12.73 4.15997 14.56Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M18.3401 20C19.0601 19.85 19.7401 19.56 20.3001 19.13C21.8601 17.96 21.8601 16.03 20.3001 14.86C19.7501 14.44 19.0801 14.16 18.3701 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>

        <div class="right-actions">
            <div class="end-call btn-end-call">End Call</div>
        </div>
    </div>
    <div class="right-sidebar">
        <div class="member-list">
            <div class="list-head">
                <span>Mọi người</span>
                <div class="btn-close-sidebar">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.7573 12.7576L21.2426 21.2428" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.7574 21.2428L21.2427 12.7576" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div class="user-items">
            </div>
        </div>
        <div class="chat-list">
            <div class="list-head">
                <span>Tin nhắn trong cuộc gọi</span>
                <div class="btn-close-sidebar">
                    <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.7573 12.7576L21.2426 21.2428" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12.7574 21.2428L21.2427 12.7576" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/libs/jquery/jquery.min.js"></script>
<script src="https://sdk.videosdk.live/js-sdk/0.0.86/videosdk.js"></script>
</body>
</html>
