<x-layout justify="justify-center">
    <div class="flex flex-col gap-6">
        <h1 class="text-7xl font-bold">Welcome to Winify</h1>
        <p class="text-3xl text-gray-500">
            Step into a world of fantastic items to buy and sell, all in one place
        </p>
    </div>
    <div class="flex gap-5 justify-center">
        <x-button href="{{url('/login')}}" variant="subtle">Log in for Winify</x-button>
        <x-button href="{{url('/signup')}}" variant="primary">Sign Up for Winify</x-button>
    </div>
</x-layout>