<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('The Savory Bliss') }}
            </h2>
            <a href="{{ url('/user/userdashboard') }}" class="px-3 py-2 bg-pink-300 text-black rounded-md hover:bg-pink-400 transition">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Your user-specific content -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p>Please Check if your orders are correct!</p>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900">
                    <table align="center" class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th style="padding: 15px; border: 1px solid #ddd;">Food Name</th>
                                <th style="padding: 15px; border: 1px solid #ddd;">Price</th>
                                <th style="padding: 15px; border: 1px solid #ddd;">Quantity</th>
                                <th style="padding: 15px; border: 1px solid #ddd;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td style="padding: 15px; border: 1px solid #ddd;">{{ $item->title }}</td>
                                    <td style="padding: 15px; border: 1px solid #ddd;">{{ $item->price }}</td>
                                    <td style="padding: 15px; border: 1px solid #ddd;">{{ $item->quantity }}</td>
                                    <td style="padding: 15px; border: 1px solid #ddd;"></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    @foreach($data2 as $item)
                                    <a href="{{url('/remove', $item->id)}}" class="btn btn-warning">Remove</a>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
