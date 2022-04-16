<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="mainColor py-5">
        <div class="flex flex-wrap items-center text-white font-bold justify-between w-10/12 mx-auto">
            <div class="space-x-20 w-8/12 flex items-center">
                <a href="/" class="text-2xl">OnlineLearning</a>
                <div class="py-3 px-2 w-5/12 searchColor rounded space-x-3 flex items-center">
                    <form method="get" class="w-full">
                        {{-- <% if(typeof(q) != 'undefined'){ %> --}}
                            <i class="fas fa-search"></i>  
                            <input type="text" value="<%= q? q:'' %>" class="bg-transparent w-10/12 focus:outline-none" placeholder="search" name="q" id="">
                        {{-- <% }else{ %> --}}
                            {{-- <i class="fas fa-search"></i>  
                            <input type="text" class="bg-transparent w-10/12 focus:outline-none" placeholder="search" name="q" id=""> --}}
                        {{-- <% } %> --}}

                    </form>
                </div>
            </div>
            <div class="relative">
                @guest    
                    <a href="/login"> <i class="fas fa-user"></i> Login</a>
                @endguest               
                
                @auth
                <button onclick="modalFun()" class="flex focus:outline-none font-bold items-center space-x-3">
                    <img style="background-image:url('/images/{{ Auth::user()->image }}')" class="w-10 h-10 coverImg rounded-full" alt="">
                    <p class="text-sm">{{ Auth::user()->name }}</p>
                </button>
                <div class="w-40 py-5 shadow-xl hidden absolute top-14 p-2 rounded text-center grid gap-y-3 color text-xs" id="modal">
                    
                    <a href="/profile/<%= user.id %>" >Profile</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button >logout</button>
                    </form>
                    
                </div>
                @endauth
            </div>
        </div>
    
    </div>

    <div>
        @yield('content')
    </div>

</body>


<script>
    let modalFun = ()=>{
        document.getElementById('modal').classList.toggle('hidden')
    };
</script>
</html>
