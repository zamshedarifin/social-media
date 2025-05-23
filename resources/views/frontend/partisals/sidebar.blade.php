<div id="sidebar" class="fixed top-0 left-0 z-40 max-md:top-auto max-md:bottom-0">

    <div id="sidebar__inner" class="flex sside md:flex-col justify-between md:h-screen md:p-2 p-1 transition-all duration-500 bg-white shadow dark:bg-dark2 2xl:w-72 xl:w-60 max-xl:w-[73px] max-md:w-screen max-md:border-t max-md:dark:border-slate-700">

        <!-- logo -->
        <div class="flex h-20 px-2 max-md:fixed max-md:top-0 max-md:w-full max-md:bg-white/80 max-md:left-0 max-md:px-4 max-md:h-14 max-md:shadow-sm max-md:dark:bg-slate-900/80 backdrop-blur-xl">
            <a href="{{route('homepage')}}" id="logo" class="flex items-center gap-3">

                <!-- logo icon -->
                <img id="logo__icon" src="{{asset('front')}}/images/logo-icon.png" alt="" class="md:w-8 hidden text-2xl max-xl:!block max-md:!hidden shrink-0 uk-animation-scale-up">

                <!-- text logo -->
                <img id="logo__text" src="{{asset('front')}}/images/logo.svg" alt="" class="w-full h-6 ml-1 max-xl:hidden max-md:block dark:!hidden">
                <img id="logo__text" src="{{asset('front')}}/images/logo-dark.svg" alt="" class="w-full h-6 ml-1 !hidden max-xl:!hidden max-md:block dark:max-md:!block dark:!block">

            </a>
        </div>

        <!-- nav -->
        <nav class="flex-1 max-md:flex max-md:justify-around md:space-y-2">

            <!-- Home -->
            <a href="{{route('homepage')}}" class="active">
                <svg id="icon__outline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <svg id="icon__solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="hidden">
                    <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd" />
                </svg>
                <span class="max-xl:hidden"> Home </span>
            </a>

            <!-- Search -->
            <a href="#!">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <span class="max-xl:hidden"> Search </span>
            </a>
            <div class="sm:w-[397px] w-full bg-white shadow-lg md:!left-[73px] hidden !left-0 dark:bg-dark2 dark:border1 max-md:bottom-[57px]" uk-drop="animation: uk-animation-slide-left-small , uk-transform-origin-center-left ;animate-out: true; pos: left ; mode:click; offset: 9">
                <div class="md:h-screen overflow-y-auto h-[calc(100vh-120px)]">

                    <!-- header -->
                    <div class="px-5 py-4 space-y-5 border-b border-gray-100 dark:border-slate-700">
                        <h3 class="md:text-xl text-lg font-medium mt-3 text-black dark:text-white">Search</h3>

                        <div class="relative -mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 absolute left-3 bottom-1/2 translate-y-1/2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                            <input type="text" placeholder="Search" class="bg-transparen w-full !pl-10 !py-2 !rounded-lg">
                        </div>

                    </div>

                    <!-- contents list -->
                    <div class="p-2 space-y-2 dark:text-white">

                        <div class="flex items-center justify-between py-2.5 px-3 font-semibold">
                            <h4>Recent</h4>
                            <button type="button" class="text-blue-500 text-sm">Clear all</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Explore -->
            <a href="#" class="max-md:!hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-camera-reels" viewBox="0 0 16 16">
                    <path d="M6 3a3 3 0 1 1-6 0 3 3 0 0 1 6 0M1 3a2 2 0 1 0 4 0 2 2 0 0 0-4 0"/>
                    <path d="M9 6h.5a2 2 0 0 1 1.983 1.738l3.11-1.382A1 1 0 0 1 16 7.269v7.462a1 1 0 0 1-1.406.913l-3.111-1.382A2 2 0 0 1 9.5 16H2a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2zm6 8.73V7.27l-3.5 1.555v4.35zM1 8v6a1 1 0 0 0 1 1h7.5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1"/>
                    <path d="M9 6a3 3 0 1 0 0-6 3 3 0 0 0 0 6M7 3a2 2 0 1 1 4 0 2 2 0 0 1-4 0"/>
                </svg>
                <span  class="max-xl:hidden"> Videos </span>
            </a>

            <a href="#"  class="max-md:!fixed max-md:top-2 max-md:right-2">
                <svg id="icon__outline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                </svg>
                <svg id="icon__solid" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="hidden">
                    <path fill-rule="evenodd" d="M4.848 2.771A49.144 49.144 0 0112 2.25c2.43 0 4.817.178 7.152.52 1.978.292 3.348 2.024 3.348 3.97v6.02c0 1.946-1.37 3.678-3.348 3.97a48.901 48.901 0 01-3.476.383.39.39 0 00-.297.17l-2.755 4.133a.75.75 0 01-1.248 0l-2.755-4.133a.39.39 0 00-.297-.17 48.9 48.9 0 01-3.476-.384c-1.978-.29-3.348-2.024-3.348-3.97V6.741c0-1.946 1.37-3.68 3.348-3.97zM6.75 8.25a.75.75 0 01.75-.75h9a.75.75 0 010 1.5h-9a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5H12a.75.75 0 000-1.5H7.5z" clip-rule="evenodd"></path>
                </svg>
                <span  class="max-xl:hidden"> Messages </span>
            </a>

            <!-- reels -->
            <a href="#">
               <i class="fa fa-users"></i>
                <span  class="max-xl:hidden"> Find Friends </span>
            </a>

            <!-- Notification -->
            <a href="#!" class="max-md:!fixed max-md:top-2 max-md:right-14 relative">
             <i class=" fa fa-bell"></i>
                <span  class="max-xl:hidden"> Notifications </span>
                <div class="w-2 h-2 bg-red-600 rounded-full absolute left-7 top-2.5"></div>
            </a>
            <div class="sm:w-[397px] w-full bg-white shadow-lg md:!left-[73px] hidden !left-0 dark:bg-dark2 dark:border1 max-md:bottom-[57px]" uk-drop="pos: left-center;animate-out: true; animation: uk-animation-slide-left-medium ; mode:click">
                <div class="md:h-screen overflow-y-auto h-[calc(100vh-120px)]">

                    <!-- header -->
                    <div class="flex items-center justify-between px-5 py-4 mt-3">
                        <h3 class="md:text-xl text-lg font-medium mt-3 text-black dark:text-white">Notification</h3>

                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>

                    <!-- contents list -->
                    <div class="px-2 -mt-2 text-sm font-normal">

                        <div class="px-5 py-3 -mx-2">
                            <h4 class="font-semibold">New</h4>
                        </div>

                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-2.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> John Michael</b> who you might know,  is on Instello.</p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 2 hours ago </div>
                            </div>
                            <button type="button" class="button text-white bg-primary">fallow</button>
                        </a>
                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl pr-10 hover:bg-secondery bg-teal-500/5">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-3.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> Alexa Gray</b> started following you. Welcome him to your profile. 👋 </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 4 hours ago </div>
                                <div class="w-2.5 h-2.5 bg-teal-600 rounded-full absolute right-3 top-5"></div>
                            </div>
                        </a>
                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl pr-10 hover:bg-secondery">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-7.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1">Jesse Steeve</b> mentioned you in a story. Check it out and reply. 📣 </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 8 hours ago </div>
                            </div>
                        </a>


                        <div class="border-t px-5 py-3 -mx-2 mt-4 dark:border-slate-700/40">
                            <h4 class="font-semibold">This Week</h4>
                        </div>


                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-4.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> Jesse Steeve</b> sarah tagged you <br> in a photo of your birthday party. 📸 </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 8 hours ago </div>
                            </div>
                        </a>
                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl pr-10 hover:bg-secondery bg-teal-500/5">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-3.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> Sarah Gray</b> sent you a message. He wants to chat with you. 💖 </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 4 hours ago </div>
                                <div class="w-2.5 h-2.5 bg-teal-600 rounded-full absolute right-3 top-5"></div>
                            </div>
                        </a>
                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-4.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> James Lewis</b> Start following you on instello </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 8 hours ago </div>
                            </div>
                            <button type="button" class="button bg-primary-soft text-primary">fallowing</button>
                        </a>
                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl pr-10 hover:bg-secondery">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-6.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> Alexa stella</b> commented on your photo  “Wow, stunning shot!” 💬 </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 8 hours ago </div>
                            </div>
                        </a>
                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl pr-10 hover:bg-secondery">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-2.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> John Michael</b> mentioned you in a story. Check it out and reply. 📣 </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 8 hours ago </div>
                            </div>
                        </a>
                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl hover:bg-secondery">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-5.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> Jesse Steeve</b> who you might know,  is on Instello. </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 8 hours ago </div>
                            </div>
                            <button type="button" class="button text-white bg-primary">fallow</button>
                        </a>
                        <a href="#" class="relative flex items-center gap-3 p-2 duration-200 rounded-xl pr-10 hover:bg-secondery">
                            <div class="relative w-12 h-12 shrink-0"> <img src="{{asset('front')}}/images/avatars/avatar-7.jpg" alt="" class="object-cover w-full h-full rounded-full"></div>
                            <div class="flex-1 ">
                                <p> <b class="font-bold mr-1"> Martin Gray</b> liked your photo of the Eiffel Tower. 😍 </p>
                                <div class="text-xs text-gray-500 mt-1.5 dark:text-white/80"> 8 hours ago </div>
                            </div>
                        </a>

                    </div>

                </div>
            </div>

            <a href="{{route('profile')}}" class="max-md:!hidden">
                <i class=" fa fa-user"></i>
                <span  class="max-xl:hidden"> Profile </span>
            </a>


            <!-- components -->
            <a href="#" class="max-md:!hidden">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0"/>
                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z"/>
                </svg>
                <span  class="max-xl:hidden"> Settings </span>
            </a>

        </nav>


    </div>

</div>
