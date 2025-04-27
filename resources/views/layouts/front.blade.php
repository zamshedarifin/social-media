<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link href="{{asset('front')}}/images/favicon.png" rel="icon" type="image/png">
    <title>@yield('title')</title>
    <meta name="description" content="Instello - Sharing Photos platform HTML Template">

    <!-- css files -->
    <link rel="stylesheet" href="{{asset('front')}}/css/tailwind.css">
    <link rel="stylesheet" href="{{asset('front')}}/css/style.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">

</head>
<body>


<div id="wrapper">

    <!-- sidebar -->
    @include('frontend.partisals.sidebar')
    @yield('content')


</div>


<!-- create status -->
<div class="hidden lg:p-20" id="create-status" uk-modal="">

    <div class="uk-modal-dialog tt relative overflow-hidden mx-auto bg-white p-7 shadow-xl rounded-lg md:w-[520px] w-full dark:bg-dark2">

        <div class="text-center py-3 border-b -m-7 mb-0 dark:border-slate-700">
            <h2 class="text-sm font-medium"> Create Status </h2>

            <!-- close button -->
            <button type="button" class="button__ico absolute top-0 right-0 m-2.5 uk-modal-close">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>

        <div class="space-y-5 mt-7">

            <div>
                <label for="" class="text-base">What do you have in mind? </label>
                <input type="text"  class="w-full mt-3">
            </div>

            <div>
                <div class="w-full h-72 relative border1 rounded-lg overflow-hidden bg-[url('../images/ad_pattern.html')] bg-repeat">

                    <label for="createStatusUrl" class="flex flex-col justify-center items-center absolute -translate-x-1/2 left-1/2 bottom-0 z-10 w-full pb-6 pt-10 cursor-pointer bg-gradient-to-t from-gray-700/60">
                        <input id="createStatusUrl" type="file" class="hidden" />
                        <ion-icon name="image" class="text-3xl text-teal-600"></ion-icon>
                        <span class="text-white mt-2">Browse to Upload image </span>
                    </label>

                    <img id="createStatusImage" src="#" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;" class="w-full h-full absolute object-cover">

                </div>

            </div>

            <div class="flex justify-between items-center">

                <div class="flex items-start gap-2">
                    <ion-icon name="time-outline" class="text-3xl text-sky-600  rounded-full bg-blue-50 dark:bg-transparent"></ion-icon>
                    <p class="text-sm text-gray-500 font-medium"> Your Status will be available <br> for <span class="text-gray-800"> 24 Hours</span> </p>
                </div>

                <button type="button" class="button bg-blue-500 text-white px-8"> Create</button>

            </div>

        </div>

    </div>

</div>

<script src="{{asset('front')}}/js/uikit.min.js"></script>
<script src="{{asset('front')}}/js/script.js"></script>

<!-- Ion icon -->
<script type="module" src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="../../unpkg.com/ionicons%405.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
