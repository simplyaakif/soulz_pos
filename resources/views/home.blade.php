<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Soulz Point of Sale</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100 inset-0 h-screen  flex items-center justify-center">
    <div class="bg-white  rounded-lg">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="pb-5 pt-8 px-8 border-b border-gray-200">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Go To</h3>
        </div>
<div class="p-8">

        <a href="{{route('pos.order')}}" class="inline-flex items-center px-4 py-2 border border-transparent text-base
        font-medium rounded-md text-orange-700 bg-orange-100 hover:bg-orange-200 focus:outline-none focus:ring-2
        focus:ring-offset-2 focus:ring-orange-500">POS Order Screen</a>

        <a href="{{route('pos.history')}}"  class="inline-flex items-center px-4 py-2 border border-transparent text-base
        font-medium rounded-md text-orange-700 bg-orange-100 hover:bg-orange-200 focus:outline-none focus:ring-2
        focus:ring-offset-2 focus:ring-orange-500">Today History</a>

        <a href="{{route('filament.auth.login')}}"  class="inline-flex items-center px-4 py-2 border border-transparent text-base
        font-medium rounded-md text-orange-700 bg-orange-100 hover:bg-orange-200 focus:outline-none focus:ring-2
        focus:ring-offset-2 focus:ring-orange-500">Dashboard</a>
</div>
        <div class="px-8 py-2 pb-8 text-sm text-gray-400">
            Made with Love by
            <a href="https://appsoulz.com">
            AppSoulz.
            </a>
        </div>

    </div>
</body>
</html>
