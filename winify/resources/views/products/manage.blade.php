<x-layout items="items-stretch text-center sm:text-start">
    <div class="flex flex-col gap-2">
        <h2 class="font-semibold text-2xl">Manage Products</h2>
        <h4 class="text-xl text-neutral-500">Manage the products you are selling</h4>
    </div>
    <div class="flex flex-col items-stretch gap-6">
        @unless ($products->isEmpty())
        
        @foreach ($products as $product)
            
        <div class="flex flex-col sm:flex-row items-center p-6 gap-6 border rounded-lg">
            <img 
                src="{{$product->photo ? asset('storage/' . $product->photo) : asset('images/logo.png')}}" 
                class="h-40 w-40 object-cover"
            >
            <div class="flex-1 flex flex-col gap-4">
                <a href="{{url('/products/' . $product->id)}}" class="flex flex-col gap-2">
                    <h2 class="font-semibold text-2xl">{{$product->title}}</h2>
                    <p class="overflow-hidden h-11">{{$product->description}}</p>
                </a>
                <div class="flex items-center justify-center sm:justify-start gap-4">
                    <x-button 
                        href="{{url('products/' . $product->id . '/edit')}}" 
                        {{-- href="{{url('/products/' . )}}" --}}
                        class="gap-1"
                    >
                        <x-svg-icon type="edit"/>
                        Edit
                    </x-button>
                    <form 
                        method="POST" 
                        action="{{url('/products' . '/' . $product->id)}}" 
                        class="flex"
                    >
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" class="flex-1 gap-1 text-textRed">
                            <x-svg-icon type="delete"/>
                            Delete
                        </x-button>
                    </form>
                </div>
            </div>
        </div>

        @endforeach

        @endunless
    </div>
</x-layout>





