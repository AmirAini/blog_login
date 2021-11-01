<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="bg-gray-200">
    <nav class="p-6 bg-white flex justify-between mb-6">
        <ul class="flex item-center">
            <li>
                <a href="" class="p-3">Home</a>
            </li>
            <li>
                <a href="" class="p-3">About</a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
            </li>
        </ul>

        {{-- signed in --}}
        <ul class="flex item-center">
            {{-- if signed in --}}
            @if (auth()->check())
                <li>
                    <a href="" class="p-3">Amir Aini</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}" class="p-3">Logout</a>
                </li>
                
            {{-- if not signed in --}}
            @else
                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            @endif
           
            
            
        </ul>

    </nav>
    {{-- inject content --}}
    @yield('content')
</body>
</html>