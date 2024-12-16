@props(['product'])

@php $mytime = Carbon\Carbon::now(); @endphp

<a class="p-5 rounded-xl border flex flex-col items-center gap-4" href="{{url('/products' . '/' . $product->id)}}">
    <img 
        src={{$product->photo ? asset('storage/' . $product->photo) : asset('images/logo.png')}}
        class="w-full object-cover" 
        style="aspect-ratio: 1 / 1;"
    >
    <div class="flex-1 flex flex-col justify-between text-left gap-2 w-full">
        <h3 class="text-base">{{$product->title}}</h3>
            @if ($product->ending_datetime > $product->starting_datetime)

                @if (($mytime > $product->starting_datetime) && ($mytime < $product->ending_datetime))
                    @if ($product->current_bid)
                    <x-tag variant="green" weight="font-semibold">Current bid: ${{$product->current_bid}}</x-tag>
                    @else
                    <x-tag variant="green" weight="font-semibold">Min bid: ${{$product->min_bid}}</x-tag>
                    @endif
            
                @elseif ($mytime < $product->starting_datetime)
            
                <x-tag variant="yellow" weight="font-semibold">Min bid: ${{$product->min_bid}}</x-tag>
            
                @elseif ($mytime > $product->ending_datetime)
                    @if ($product->current_bid)
                    <x-tag variant="red" weight="font-semibold">Closing bid: ${{$product->current_bid}}</x-tag>
                    @else
                    <x-tag variant="red" weight="font-semibold">Not sold</x-tag>
                    @endif
            
                @endif
                
            @endif
            
        <div class="flex items-center gap-1">
            <x-svg-icon type="location"/><div>{{$product->location}}</div>
        </div>
    </div>
</a>


{{-- <a class="rounded-xl border flex flex-col items-center" href="{{url('/products' . '/' . $product->id)}}">
    <img 
        src={{asset('/images/vintage_coca_cola_machine.webp')}}
        class="w-full object-cover rounded-t-xl" 
        style="aspect-ratio: 1 / 1;"
    >
    <div class="flex-1 flex flex-col justify-between text-left gap-2 w-full p-5">
        <h3 class="text-base">{{$product->title}}</h3>
        <p class="font-semibold ">Current bid: ${{$product->min_bid}}</p>
        <div class="flex items-center gap-1"><img src="{{asset('icons/location.svg')}}" class="h-4"><div>{{$product->location}}</div></div>
    </div>
</a> --}}