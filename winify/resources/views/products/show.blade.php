<x-layout>
    <div class="flex flex-col md:flex-row gap-16">
        <div class="flex-1">
            <img 
                src="{{$product->photo ? asset('storage/' . $product->photo) : asset('images/logo.png')}}"
            >
        </div>
        <div class="flex-1 flex flex-col text-start gap-4">
            <h2 class="text-2xl font-semibold">{{$product->title}}</h2>

            @php $mytime = Carbon\Carbon::now(); @endphp

            @if ($product->ending_datetime > $product->starting_datetime)

                @if (($mytime > $product->starting_datetime) && ($mytime < $product->ending_datetime))

                    <x-tag variant="green">On auction till {{$product->ending_datetime}}</x-tag>

                @elseif ($mytime < $product->starting_datetime)

                    <x-tag variant="yellow">Auction starts on {{$product->starting_datetime}}</x-tag>

                @elseif ($mytime > $product->ending_datetime)

                    <x-tag variant="red">Auction ended on {{$product->ending_datetime}}</x-tag>

                @endif

            @endif
            
            <div class="flex justify-between items-center">
                <div class="flex flex-row items-start">
                    <div class="text-2xl font-bold">$</div>
                    <div class="text-5xl font-bold">{{$product->current_bid ? $product->current_bid : $product->min_bid}}</div>
                </div>
                <div class="flex items-center gap-1"><x-svg-icon type="location"></x-svg-icon><div>{{$product->location}}</div></div>
            </div>
            <p>{{$product->description}}</p>
            <x-tag >{{$product->condition}}</x-tag>
            <form method="POST" action="{{url('/products')}}" class="flex flex-col gap-6">
                <x-input 
                    type="number" 
                    name="bid" 
                    id="bid" 
                    min="{{$product->min_bid}}" 
                    step="{{$product->bid_step}}" 
                    value="{{$product->min_bid}}"
                >Bid</x-input>
                <x-button type="submit" variant="primary">Place Bid</x-button>
            </form>

            <x-button href="{{url('products/' . $product->id . '/edit')}}" class="gap-1">
                <x-svg-icon type="edit"></x-svg-icon>
                Edit
            </x-button>
            <form method="POST" action="{{url('/products' . '/' . $product->id)}}" class="flex">
                @csrf
                @method('DELETE')
                <x-button type="submit" class="flex-1 gap-1 text-textRed">
                    <x-svg-icon type="delete"></x-svg-icon>
                    Delete
                </x-button>
            </form>

        </div>
    </div>
</x-layout>



