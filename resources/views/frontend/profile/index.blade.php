@extends('layouts.front')
@section('title','Profile')
@section('content')
    <main class="2xl:ml-[--w-side] xl:ml-[--w-side-md] md:ml-[--w-side-small]">

        <div class="main__inner">

            <!-- profile  -->
            <div class="py-6 relative">

                <div class="flex md:gap-16 gap-4 max-md:flex-col">
                    <div class="relative md:p-1 rounded-full h-full max-md:w-16 bg-gradient-to-tr from-pink-400 to-pink-600 shadow-md hover:scale-110 duration-500 uk-animation-scale-up">
                        <div class="relative md:w-40 md:h-40 h-16 w-16 rounded-full overflow-hidden md:border-[6px] border-gray-100 shrink-0 dark:border-slate-900">
                            <img src="{{asset('front')}}//images/avatars/avatar-6.jpg" alt="" class="w-full h-full absolute object-cover">
                        </div>
                        <button type="button" class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-white shadow p-1.5 rounded-full sm:flex hidden"> <ion-icon name="camera" class="text-2xl"></ion-icon></button>
                    </div>
                    <div class="max-w-2x flex-1">
                        <h3 class="md:text-xl text-base font-semibold text-black dark:text-white"> Monroe Parker </h3>

                        <p class="sm:text-sm text-blue-600 mt-1 font-normal text-xs">@Monroepak</p>

                        <p class="text-sm mt-2 md:font-normal font-light"> I love beauty and emotion. 🥰 I’m passionate about photography and learning. 📚 I explore genres and styles. 🌈 I think photography is storytelling. 📖 I hope you like and feel my photos. 😊</p>

                        <p class="mt-2 space-x-2 text-gray-500 text-sm hidden" style="margin-top: 11px; "><a href="#" class="inline-block">Travel</a> . <a href="#" class="inline-block">Business</a> . <a href="#" class="inline-block">Technolgy</a>  </p>

                        <div class="flex md:items-end justify-between md:mt-8 mt-4 max-md:flex-col gap-4">
                            <div class="flex sm:gap-10 gap-6 sm:text-sm text-xs max-sm:absolute max-sm:top-10 max-sm:left-36">
                                <div>
                                    <p>Posts</p>
                                    <h3 class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal">162</h3>
                                </div>
                                <div>
                                     <p>Following</p>
                                    <h3 class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal">14,260</h3>
                                </div>
                                <div>
                                    <p>Followers</p>
                                    <h3 class="sm:text-xl sm:font-bold mt-1 text-black dark:text-white text-base font-normal">8,542</h3>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 text-sm">
                                <button type="submit" class="button text-gray-600 bg-slate-200 hidden">Follow</button>
                                <button type="button" class="button bg-pink-100 text-pink-600 border border-pink-200">Unfallow</button>
                                <button type="submit" class="button bg-pink-600 text-white">Message</button>
                                <div>
                                    <button type="submit" class="rounded-lg bg-slate-200/60 flex px-2 py-1.5 dark:bg-dark2" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon></button>
                                    <div class="w-[240px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click;offset:10">
                                        <nav>
                                            <a href="#"> <ion-icon class="text-xl" name="pricetags-outline"></ion-icon> Unfollow </a>
                                            <a href="#"> <ion-icon class="text-xl" name="time-outline"></ion-icon>  Mute story </a>
                                            <a href="#"> <ion-icon class="text-xl" name="flag-outline"></ion-icon>  Report </a>
                                            <a href="#"> <ion-icon class="text-xl" name="share-outline"></ion-icon> Share profile </a>
                                            <hr>
                                            <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl" name="stop-circle-outline"></ion-icon>  Block </a>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="mt-10">

                <!-- sticky tabs -->

                <div uk-sticky="cls-active: bg-slate-100/60 z-30 backdrop-blur-lg px-4 dark:bg-slate-800/60; start: 500; animation: uk-animation-slide-top" class="uk-sticky">

                    <nav class="text-sm text-center text-gray-500 capitalize font-semibold dark:text-white">
                        <ul class="flex gap-2 justify-center border-t dark:border-slate-700" uk-switcher="connect: #story_tab ; animation: uk-animation-fade, uk-animation-slide-left-medium">

                            <li class="uk-active"> <a href="#" class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white" aria-expanded="true"> <ion-icon class="mr-2 text-2xl" name="camera-outline"></ion-icon> Posts  </a> </li>
                            <li> <a href="#" class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white" aria-expanded="false"> <ion-icon class="mr-2 text-2xl" name="play-outline"></ion-icon> Reels </a> </li>
                            <li> <a href="#" class="flex items-center p-4 py-2.5 -mb-px border-t-2 border-transparent aria-expanded:text-black aria-expanded:border-black aria-expanded:dark:text-white aria-expanded:dark:border-white" aria-expanded="false"> <ion-icon class="mr-2 text-2xl" name="pricetags-outline"></ion-icon> Tagged </a> </li>
                        </ul>
                    </nav>

                </div><div class="uk-sticky-placeholder" hidden="" style="height: 42px; width: 895px; margin: 0px;"></div>

                <div id="story_tab" class="uk-switcher" style="touch-action: pan-y pinch-zoom;">
                    <div class="flex max-lg:flex-col xl:gap-10 md:gap-3 md:mt-10" id="js-oversized">

                        <!-- right sidebar -->
                        <div class="lg:max-w-[370px] md:max-w-[510px] mx-auto">

                            <div class="xl:space-y-6 space-y-3 md:pb-12"  uk-sticky="end: #js-oversized; offset: 50; media:992">

                                <!-- peaple you might know -->
                                <!-- Intro Card -->
                                <div class="bg-white dark:bg-dark2 shadow rounded-xl p-4">
                                    <h2 class="text-lg font-semibold mb-2 text-black dark:text-white">Intro</h2>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 mt-2">🎓 Studied Computer Science and Engineering at Daffodil International University</p>
                                </div>

                                <!-- Photos Card -->
                                <div class="bg-white dark:bg-dark2 shadow rounded-xl p-4">
                                    <div class="flex justify-between items-center mb-2">
                                        <h2 class="text-lg font-semibold text-black dark:text-white">Photos</h2>
                                        <a href="#" class="text-blue-500 text-sm">See All</a>
                                    </div>
                                    <div class="grid grid-cols-3 gap-2">
                                        <img src="photo1.jpg" alt="" class="w-full h-20 object-cover rounded">
                                        <img src="photo2.jpg" alt="" class="w-full h-20 object-cover rounded">
                                        <img src="photo3.jpg" alt="" class="w-full h-20 object-cover rounded">
                                        <img src="photo4.jpg" alt="" class="w-full h-20 object-cover rounded">
                                        <img src="photo5.jpg" alt="" class="w-full h-20 object-cover rounded">
                                        <img src="photo6.jpg" alt="" class="w-full h-20 object-cover rounded">
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- feed story -->
                        <div class="md:max-w-[510px] mx-auto flex-1 xl:space-y-6 space-y-3">


                            <!-- add story -->
                            <div class="bg-white rounded-xl shadow-sm p-4 space-y-4 text-sm font-medium border1 dark:bg-dark2">

                                <div class="flex items-center gap-3">
                                    <div class="flex-1 bg-slate-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer dark:bg-dark3" uk-toggle="target: #create-status">
                                        <div class="py-2.5 text-center dark:text-white"> What do you have in mind? </div>
                                    </div>
                                    <div class="p-2 bg-sky-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer" uk-toggle="target: #create-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="p-2 bg-pink-100 hover:bg-opacity-80 transition-all rounded-lg cursor-pointer" uk-toggle="target: #create-status">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                            <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                        </svg>
                                    </div>
                                </div>

                            </div>


                            <!--  post image-->
                            <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                                <!-- post heading -->
                                <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                                    <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-3.jpg" alt="" class="w-9 h-9 rounded-full"> </a>
                                    <div class="flex-1">
                                        <a href="#"> <h4 class="text-black dark:text-white"> Monroe Parker </h4> </a>
                                        <div class="text-xs text-gray-500 dark:text-white/80"> 2 hours ago</div>
                                    </div>

                                    <div class="-mr-1">
                                        <button type="button" class="button__ico w-8 h-8"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div  class="w-[245px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon>  Add to favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="notifications-off-outline"></ion-icon> Mute Notification </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report this post </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share your profile </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon>  Unfollow </a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                                <!-- post image -->
                                <div class="relative w-full lg:h-72 h-full sm:px-4">
                                    <img src="{{asset('front')}}/images/avatars/avatar-lg-4.jpg" alt="" class="sm:rounded-lg w-full h-full object-cover">
                                </div>

                                <!-- post icons -->
                                <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                                    <div class="flex items-center gap-2.5">
                                        <button type="button" class="button__ico text-red-500 bg-red-100 dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                                        <a href="#">1,380</a>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <button type="button" class="button__ico bg-slate-200/70 dark:bg-slate-700"> <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                                        <span>260</span>
                                    </div>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="text-xl" name="paper-plane-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="text-xl" name="share-outline"></ion-icon> </button>
                                </div>

                                <!-- comments -->
                                <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">

                                    <div class="flex items-start gap-3 relative">
                                        <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                        <div class="flex-1">
                                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                                            <p class="mt-0.5">What a beautiful photo! I love it. 😍 </p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 relative">
                                        <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                        <div class="flex-1">
                                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                                            <p class="mt-0.5">   You captured the moment.😎 </p>
                                        </div>
                                    </div>

                                    <button type="button" class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                                        <ion-icon name="chevron-down-outline" class="ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>
                                        More Comment
                                    </button>

                                </div>

                                <!-- add comment -->
                                <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">

                                    <img src="{{asset('front')}}/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">

                                    <div class="flex-1 relative overflow-hidden h-10">
                                        <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>

                                        <div class="!top-2 pr-2" uk-drop="pos: bottom-right; mode: click">
                                            <div class="flex items-center gap-2" uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100 ;repeat: true">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                                    <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                                </svg>
                                            </div>
                                        </div>


                                    </div>


                                    <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery"> Replay</button>
                                </div>

                            </div>


                            <!-- post slide image-->
                            <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                                <!-- post heading -->
                                <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                                    <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-2.jpg" alt="" class="w-9 h-9 rounded-full"> </a>
                                    <div class="flex-1">
                                        <a href="#"> <h4 class="text-black dark:text-white"> Martin Gray </h4> </a>
                                        <div class="text-xs text-gray-500 dark:text-white/80"> 2 hours ago</div>
                                    </div>

                                    <div class="-mr-1">
                                        <button type="button" class="button__ico w-8 h-8"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div  class="w-[245px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon>  Add to favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="notifications-off-outline"></ion-icon> Mute Notification </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report this post </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share your profile </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon>  Unfollow </a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                                <!-- slide images -->
                                <div class="relative uk-visible-toggle sm:px-4" tabindex="-1" uk-slideshow="animation: push;finite: true;min-height: 200; max-height: 250">

                                    <ul class="uk-slideshow-items" uk-lightbox="">
                                        <li class="w-full overflow-hidden sm:rounded-md">
                                            <a href="{{asset('front')}}/images/avatars/avatar-lg-3.jpg"  data-caption="Caption">
                                                <img src="{{asset('front')}}/images/avatars/avatar-lg-2.jpg" class="w-full h-full object-cover inset-0" alt="">
                                            </a>
                                        </li>
                                        <li class="w-full overflow-hidden sm:rounded-md">
                                            <a href="{{asset('front')}}/images/avatars/avatar-lg-3.jpg"  data-caption="Caption">
                                                <img src="{{asset('front')}}/images/avatars/avatar-lg-3.jpg" class="w-full h-full object-cover inset-0" alt="">
                                            </a>
                                        </li>

                                    </ul>

                                    <!-- navigation -->
                                    <button type="button" class="absolute left-2 -translate-y-1/2 bg-black/40 backdrop-blur-3xl rounded-full top-1/2 grid w-7 h-7 place-items-center shadow" uk-slideshow-item="previous"> <ion-icon name="chevron-back" class="text-xl text-white"></ion-icon></button>
                                    <button type="button" class="absolute right-2 -translate-y-1/2 bg-black/40 backdrop-blur-3xl rounded-full top-1/2 grid w-7 h-7 place-items-center shadow" uk-slideshow-item="next"> <ion-icon name="chevron-forward" class="text-xl text-white"></ion-icon></button>

                                </div>

                                <!-- post icons -->
                                <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                                    <div class="flex items-center gap-2.5">
                                        <button type="button" class="button__ico text-red-500 bg-red-100 dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                                        <a href="#">1,280</a>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <button type="button" class="button__ico bg-slate-200/70 dark:bg-slate-700"> <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                                        <span>638</span>
                                    </div>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="text-xl" name="paper-plane-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="text-xl" name="share-outline"></ion-icon> </button>
                                </div>

                                <!-- comments -->
                                <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">

                                    <div class="flex items-start gap-3 relative">
                                        <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                        <div class="flex-1">
                                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                                            <p class="mt-0.5"> Wow, You are so talented and creative. 😍 </p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 relative">
                                        <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                        <div class="flex-1">
                                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                                            <p class="mt-0.5"> This photo is amazing! 😍 </p>
                                        </div>
                                    </div>

                                    <button type="button" class="flex items-center gap-1.5 text-gray-500 hover:text-blue-500 mt-2">
                                        <ion-icon name="chevron-down-outline" class="ml-auto duration-200 group-aria-expanded:rotate-180"></ion-icon>
                                        More Comment
                                    </button>

                                </div>

                                <!-- add comment -->
                                <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">

                                    <img src="{{asset('front')}}/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">

                                    <div class="flex-1 relative overflow-hidden h-10">
                                        <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>

                                        <div class="!top-2 pr-2" uk-drop="pos: bottom-right; mode: click">
                                            <div class="flex items-center gap-2" uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100 ;repeat: true">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                                    <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                                </svg>
                                            </div>
                                        </div>


                                    </div>


                                    <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery"> Replay</button>
                                </div>

                            </div>


                            <!-- post text-->
                            <div class="bg-white rounded-xl shadow-sm text-sm font-medium border1 dark:bg-dark2">

                                <!-- post heading -->
                                <div class="flex gap-3 sm:p-4 p-2.5 text-sm font-medium">
                                    <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-5.jpg" alt="" class="w-9 h-9 rounded-full"> </a>
                                    <div class="flex-1">
                                        <a href="#"> <h4 class="text-black dark:text-white"> John Michael </h4> </a>
                                        <div class="text-xs text-gray-500 dark:text-white/80"> 2 hours ago</div>
                                    </div>

                                    <div class="-mr-1">
                                        <button type="button" class="button__ico w-8 h-8"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div  class="w-[245px]" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon>  Add to favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="notifications-off-outline"></ion-icon> Mute Notification </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report this post </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share your profile </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon>  Unfollow </a>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                                <!-- slide images -->
                                <div class="sm:px-4 p-2.5 pt-0">
                                    <p class="font-normal"> Photography is the art of capturing light with a camera. It can be used to create images that tell stories, express emotions, or document reality. it can be fun, challenging, or rewarding. It can also be a hobby, a profession, or a passion. 📷 </p>
                                </div>


                                <!-- post icons -->
                                <div class="sm:p-4 p-2.5 flex items-center gap-4 text-xs font-semibold">
                                    <div class="flex items-center gap-2.5">
                                        <button type="button" class="button__ico text-red-500 bg-red-100 dark:bg-slate-700"> <ion-icon class="text-lg" name="heart"></ion-icon> </button>
                                        <a href="#">1,300</a>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <button type="button" class="button__ico bg-slate-200/70 dark:bg-slate-700"> <ion-icon class="text-lg" name="chatbubble-ellipses"></ion-icon> </button>
                                        <span>260</span>
                                    </div>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="text-xl" name="paper-plane-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="text-xl" name="share-outline"></ion-icon> </button>
                                </div>

                                <!-- comments -->
                                <div class="sm:p-4 p-2.5 border-t border-gray-100 font-normal space-y-3 relative dark:border-slate-700/40">

                                    <div class="flex items-start gap-3 relative">
                                        <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                        <div class="flex-1">
                                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Steeve </a>
                                            <p class="mt-0.5"> I love taking photos of nature and animals. 🌳🐶</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 relative">
                                        <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                        <div class="flex-1">
                                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Monroe </a>
                                            <p class="mt-0.5">  I enjoy people and emotions. 😊😢 </p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 relative">
                                        <a href="#"> <img src="{{asset('front')}}/images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 mt-1 rounded-full"> </a>
                                        <div class="flex-1">
                                            <a href="#" class="text-black font-medium inline-block dark:text-white"> Jesse </a>
                                            <p class="mt-0.5">  Photography is my passion. 🎨📸   </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- add comment -->
                                <div class="sm:px-4 sm:py-3 p-2.5 border-t border-gray-100 flex items-center gap-1 dark:border-slate-700/40">

                                    <img src="{{asset('front')}}/images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">

                                    <div class="flex-1 relative overflow-hidden h-10">
                                        <textarea placeholder="Add Comment...." rows="1" class="w-full resize-none !bg-transparent px-4 py-2 focus:!border-transparent focus:!ring-transparent"></textarea>

                                        <div class="!top-2 pr-2" uk-drop="pos: bottom-right; mode: click">
                                            <div class="flex items-center gap-2" uk-scrollspy="target: > svg; cls: uk-animation-slide-right-small; delay: 100 ;repeat: true">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 fill-sky-600">
                                                    <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z" clip-rule="evenodd" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 fill-pink-600">
                                                    <path d="M3.25 4A2.25 2.25 0 001 6.25v7.5A2.25 2.25 0 003.25 16h7.5A2.25 2.25 0 0013 13.75v-7.5A2.25 2.25 0 0010.75 4h-7.5zM19 4.75a.75.75 0 00-1.28-.53l-3 3a.75.75 0 00-.22.53v4.5c0 .199.079.39.22.53l3 3a.75.75 0 001.28-.53V4.75z" />
                                                </svg>
                                            </div>
                                        </div>


                                    </div>


                                    <button type="submit" class="text-sm rounded-full py-1.5 px-3.5 bg-secondery"> Replay</button>
                                </div>

                            </div>

                            <!-- placeholder -->
                            <div class="rounded-xl shadow-sm p-4 space-y-4 bg-slate-200/40 animate-pulse border1 dark:bg-dark2">

                                <div class="flex gap-3">
                                    <div class="w-9 h-9 rounded-full bg-slate-300/20"></div>
                                    <div class="flex-1 space-y-3">
                                        <div class="w-40 h-5 rounded-md bg-slate-300/20"></div>
                                        <div class="w-24 h-4 rounded-md bg-slate-300/20"></div>
                                    </div>
                                    <div class="w-6 h-6 rounded-full bg-slate-300/20"></div>
                                </div>

                                <div class="w-full h-52 rounded-lg bg-slate-300/10 my-3"> </div>

                                <div class="flex gap-3">

                                    <div class="w-16 h-5 rounded-md bg-slate-300/20"></div>

                                    <div class="w-14 h-5 rounded-md bg-slate-300/20"></div>

                                    <div class="w-6 h-6 rounded-full bg-slate-300/20 ml-auto"></div>
                                    <div class="w-6 h-6 rounded-full bg-slate-300/20  "></div>
                                </div>

                            </div>
                        </div>



                    </div>





                    <!-- Reels  list -->
                    <div class="pt-16">


                        <div class="grid gap-3 lg:gap-4 lg:grid-cols-4 md:grid-cols-5 sm:grid-cols-3 grid-cols-2" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100;repeat:true">

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-1.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 14
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-2.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 24
                                            </div>
                                        </div>

                                    </div>
                                </a>
                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-3.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 32
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-4.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 46
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-3.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon>16
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-4.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 24
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-5.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 38
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-1.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 33
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-1.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 62
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-2.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 42
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-3.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 18
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>

                            <!-- single reels -->
                            <div class="lg:hover:scale-105 hover:shadow-lg hover:z-10 duration-500 delay-100" style="opacity: 0;">

                                <a href="#">
                                    <div class="relative w-full lg:h-[270px] aspect-[2.5/4] overflow-hidden rounded-lg shrink-0">

                                        <img class="object-cover w-full h-full" src="{{asset('front')}}//images/reels/reels-4.jpg" alt="">

                                        <div class="w-full bottom-0 absolute left-0 bg-gradient-to-t from-black/60 pt-20">
                                            <div class="flex items-center gap-2.5 text-white p-3">
                                                <ion-icon class="text-2xl" name="play-outline"></ion-icon> 29
                                            </div>
                                        </div>

                                    </div>
                                </a>

                            </div>


                            <!-- placeholders -->
                            <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse" style="opacity: 0;"></div>
                            <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse" style="opacity: 0;"></div>
                            <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse" style="opacity: 0;"></div>
                            <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse" style="opacity: 0;"></div>

                        </div>

                        <!-- load more -->
                        <div class="flex justify-center my-6">
                            <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
                        </div>


                    </div>





                    <!-- short list -->
                    <div class="pt-16">


                        <div class="grid lg:grid-cols-3 grid-cols-2 gap-4" uk-scrollspy="target: > div; cls: uk-animation-scale-up; delay: 100;repeat:true">


                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">
                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white"> Monroe Parker </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 md:m-2.5 m-1">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-1.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>

                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">
                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white">  Jesse Steeve </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 m-2.5">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-2.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>

                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">

                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white"> Martin Gray </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 m-2.5">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-3.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>

                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">

                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white"> John Michael </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 m-2.5">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-4.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>

                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">

                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-7.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white"> Alexa stella </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 m-2.5">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-5.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>

                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">
                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-5.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white"> Monroe Parker </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 m-2.5">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-1.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>

                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">
                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-2.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white">  Jesse Steeve </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 m-2.5">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-2.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>

                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">

                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-3.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white"> Martin Gray </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 m-2.5">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-3.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>

                            <div class="relative lg:rounded-xl rounded-md overflow-hidden shadow bg-white dark:bg-dark2" style="opacity: 0;">

                                <!-- heading -->
                                <div class="flex items-center gap-3 sm:px-4 py-3 p-2 text-sm font-normal">

                                    <a href="profile.html" class="max-md:hidden">
                                        <img src="{{asset('front')}}//images/avatars/avatar-4.jpg" alt="" class="w-6 h-6 rounded-full">
                                    </a>
                                    <div class="flex-1">
                                        <a href="profile.html"><h4 class="text-black dark:text-white"> John Michael </h4></a>
                                    </div>

                                    <!-- dropdown options -->
                                    <div class="absolute top-0.5 right-0 m-2.5">
                                        <button type="button" class="button__ico w-8 h-8" aria-haspopup="true" aria-expanded="false"> <ion-icon class="text-xl" name="ellipsis-horizontal"></ion-icon> </button>
                                        <div class="w-[232px] uk-dropdown" uk-dropdown="pos: bottom-right; animation: uk-animation-scale-up uk-transform-origin-top-right; animate-out: true; mode: click">
                                            <nav>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="bookmark-outline"></ion-icon> Add favorites </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="flag-outline"></ion-icon>  Report </a>
                                                <a href="#"> <ion-icon class="text-xl shrink-0" name="share-outline"></ion-icon>  Share </a>
                                                <hr>
                                                <a href="#" class="text-red-400 hover:!bg-red-50 dark:hover:!bg-red-500/50"> <ion-icon class="text-xl shrink-0" name="stop-circle-outline"></ion-icon> Remove </a>
                                            </nav>
                                        </div>
                                    </div>

                                </div>

                                <!-- post image -->
                                <a href="#preview_modal" uk-toggle="" aria-expanded="false">
                                    <div class="relative w-full h-48">
                                        <img src="{{asset('front')}}//images/post/post-4.jpg" alt="" class="w-full h-full object-cover inset-0">
                                    </div>
                                </a>

                                <!-- post icons -->
                                <div class="flex items-center md:gap-3 gap-1 md:py-2.5 md:px-3 p-1.5">
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="heart-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico"> <ion-icon class="md:text-2xl text-lg" name="chatbubble-ellipses-outline"></ion-icon> </button>
                                    <button type="button" class="button__ico ml-auto"> <ion-icon class="md:text-2xl text-lg" name="bookmark-outline"></ion-icon> </button>
                                </div>

                            </div>


                            <!-- placeholders -->
                            <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse" style="opacity: 0;"></div>
                            <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse" style="opacity: 0;"></div>
                            <div class="w-full lg:h-60 h-full aspect-[3/3] bg-slate-200/60 rounded-lg dark:bg-dark2 animate-pulse" style="opacity: 0;"></div>

                        </div>

                        <!-- load more -->
                        <div class="flex justify-center my-6">
                            <button type="button" class="bg-white py-2 px-5 rounded-full shadow-md font-semibold text-sm dark:bg-dark2">Load more...</button>
                        </div>

                    </div>


                </div>

            </div>

        </div>


    </main>
@endsection
