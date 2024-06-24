<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Edit')}}
            </h2>
            <a href="{{ url('/admin/admindashboard') }}" class="px-3 py-2 bg-pink-300 text-black rounded-md hover:bg-pink-400 transition">Back</a>
        </div>
    </x-slot>
        <div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">ADD MORE ITEMS</h2>
    
    <form action="{{ url('/uploadfood') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-gray-700">Title</label>
            <input type="text" id="title" name="title" placeholder="Write a Title" class="w-full mt-2 p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700">Price</label>
            <input type="number" id="price" name="price" placeholder="Price" class="w-full mt-2 p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-gray-700">Image</label>
            <input type="file" id="image" name="image" class="w-full mt-2 p-2 border rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-gray-700">Description</label>
            <input type="text" id="description" name="description" placeholder="Write a Description" class="w-full mt-2 p-2 border rounded-lg" required>
        </div>

        <div class="text-center">
            <input style="color: white; background-color: #8b5e3c; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;" type="submit" value="Save a new product" />
        </div>
    </form>
</div>


    <div>
    <table class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Food Name</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @foreach($data as $item)
        <tr>
            <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $item->price }}</td>
            <td class="px-6 py-4 whitespace-nowrap">{{ $item->description }}</td>
            <td class="px-6 py-4 whitespace-nowrap"><img src="/foodimage/{{ $item->image }}" alt="{{ $item->title }}" class="h-16 w-16 object-cover"></td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ url('/deletemenu', $item->id) }}" class="text-red-500 hover:text-red-700">Delete</a>
            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <a href="{{ url('/updateview', $item->id) }}" class="text-indigo-500 hover:text-indigo-700">Update</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
    
</x-app-layout>