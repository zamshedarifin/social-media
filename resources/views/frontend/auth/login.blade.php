<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VloggerStudio Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex items-center justify-center h-screen">
    <div class="flex flex-col md:flex-row items-center md:items-start max-w-4xl w-full px-6">
        <!-- Left side: VloggerStudio info -->
        <div class="mb-10 md:mb-0 md:mr-10 md:w-1/2 text-center md:text-left">
            <h1 class="text-rose-600 text-5xl font-bold mb-4">vloggerstudio</h1>
            <p class="text-xl text-gray-700">Connect with friends and the world around you on vloggerstudio.</p>
        </div>

        <!-- Right side: Login form -->
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
            <form action="{{route('login')}}" method="POST" class="space-y-4">
                @csrf
                <input type="email" name="email" placeholder="Email address" required
                       class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-rose-500" />
                <input type="password" name="password" placeholder="Password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-rose-500" />
                <button type="submit"
                        class="w-full bg-rose-600 text-white font-bold py-3 rounded hover:bg-rose-700 transition duration-200">
                    Log In
                </button>
                <div class="text-center">
                    <a href="#" class="text-rose-600 text-sm hover:underline">Forgot password?</a>
                </div>
                <hr />
                <div class="text-center">
                    <a href="/register"
                       class="bg-amber-500 text-white font-bold py-2 px-4 rounded inline-block mt-4 hover:bg-amber-600 transition">
                        Create New Account
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
