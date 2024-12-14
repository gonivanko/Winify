@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 mt-1 transform -translate-x-1/2 flex items-center p-4 gap-3 border rounded-lg bg-backgroundGreen text-textGreen">
        <div class="flex items-start gap-3">
            <img src="{{asset('icons/info.svg')}}">
            <div class="flex flex-col items-start gap-1">
                <h3 class="font-semibold">
                    {{session('message')}}
                </h3>
            </div>
        </div>
    </div>
@endif


