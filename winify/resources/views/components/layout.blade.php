<!DOCTYPE html>
<html lang="en" class="min-h-full flex flex-col">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Курсач Тест</title>
    <link rel="icon" href="images/logo.png" type="image/png"/>
    <style>
        {!! Vite::content('resources/css/app.css') !!}
    </style>
    <script>
        {!! Vite::content('resources/js/app.js') !!}
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex-1 box-border flex flex-col justify-center text-defaultText">
    <header class="flex flex-col md:flex-row justify-around md:justify-between items-center px-12 py-6">
        <a href="{{url('/')}}"><h1 class="header-title text-5xl font-bold text-defaultText">Winify</h1></a>
        <nav class="header-nav flex flex-col md:flex-row text-center gap-2 md:gap-4" id="header-nav">
            <x-button href="{{url('/')}}">Buy</x-button>
            <x-button href="{{url('/products/create')}}">Sell</x-button>
            <x-button href="{{url('/about')}}">About</x-button>

            @auth
                <x-button href="{{url('/products/manage')}}">Manage products</x-button>
                <x-button href="{{url('/users/profile')}}">Profile</x-button> 
                <form action="{{url('/logout')}}" method="POST" class="flex justify-center">
                    @csrf
                    <x-button type="submit">Log Out</x-button>
                </form>
            @else
                <x-button href="{{url('/login')}}">Log In</x-button>
                <x-button href="{{url('/register')}}" variant="primary">Sign Up</x-button>
            @endauth
            
        </nav>
        
        <x-button type="button" onclick="handleMenuClick()" class="md:hidden"><img src="{{asset('icons/menu.svg')}}" class="text-base w-6 h-6"></x-button>
    </header>
    <main 
        class="
            flex-1 flex flex-col 
            @if ($attributes->has('items')) {{$items}} @else items-stretch @endif 
            @if ($attributes->has('justify')) {{$justify}} @else justify-start @endif 
            text-center gap-12 px-12 py-6">
        {{$slot}}
    </main>
    
    <script>
        const headernav = document.getElementById("header-nav");

        function handleMenuClick() {
            headernav.classList.toggle('hidden');
        }

    </script>
    <x-flash-message/>
    <!-- <footer>Made by @gonivanko in 2024</footer> -->
</body>
</html>