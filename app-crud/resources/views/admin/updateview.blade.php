<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('') }}
            </h2>
            <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">UPDATE ITEMS</h2>

    <form action="{{ url('/update', $data->id) }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{$data->title}}" class="w-full mt-2 p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" id="price" name="price" value="{{$data->price}}" class="w-full mt-2 p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <input type="text" id="description" name="description" value="{{$data->description}}" class="w-full mt-2 p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Old Image</label>
            <img height="150px" width="150px" src="/foodimage/{{$data->image}}">
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">New Image</label>
            <input type="file" id="image" name="image" class="w-full mt-2 p-2 border rounded-lg" required>
        </div>

        <div class="text-center">
            <input style="color: white; background-color: #8b5e3c; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" type="submit" value="Save a new product" />
        </div>
    </form>
</div>
        </div>


</x-app-layout>        