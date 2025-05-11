<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VloggerStudio Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col md:flex-row items-center md:items-start max-w-4xl w-full px-6">
        <!-- Left side: Welcome text -->
        <div class="mb-10 md:mb-0 md:mr-10 md:w-1/2 text-center md:text-left">
            <h1 class="text-rose-600 text-5xl font-bold mb-4">vloggerstudio</h1>
            <p class="text-xl text-gray-700">Create an account to share and explore with the world.</p>
        </div>

        <!-- Right side: Register form -->
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
            <form action="{{route('register')}}" method="POST" class="space-y-4">
                @csrf
                <input type="text" name="name" placeholder="Full Name" required
                       class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-rose-500" />
                <input type="email" name="email" placeholder="Email address" required
                       class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-rose-500" />
                <input type="password" name="password" placeholder="Password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-rose-500" />
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                       class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-rose-500" />
                <button type="submit"
                        class="w-full bg-amber-500 text-white font-bold py-3 rounded hover:bg-amber-600 transition duration-200">
                    Sign Up
                </button>
                <div class="text-center">
                    <p class="text-sm text-gray-600 mt-2">
                        Already have an account?
                        <a href="/login" class="text-rose-600 hover:underline">Log In</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
