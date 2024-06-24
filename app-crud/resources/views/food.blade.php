<link rel="stylesheet" href="/css/foodlist.css">

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h2 class="text-2xl font-bold text-center mb-6">MENU</h2>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
                    @foreach($data as $item)
                    <!-- Product -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg w-full sm:w-1/2 md:w-1/3 lg:w-1/4">
                        <div style="background-image: url('/foodimage/{{$item->image}}'); height: 200px; background-size: cover; background-position: center;" class='card'></div>
                        <div class="p-6 text-gray-900">
                            <h3 class="font-semibold text-lg">{{ $item->title }}</h3>
                            <p class="mt-2">{{ $item->price }}</p>
                            <p class="mt-2">{{ $item->description }}</p>
                            <!-- Form for adding to cart -->
                            <form action="{{url('/addcart',$item->id)}}" method="POST">
                                @csrf
                                <input type="hidden" name="item_id" value="{{ $item->id }}">
                                <input type="number" name="quantity" min="1" value='1' style="width: 80px;">
                                <button type="submit">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
