<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin Dashboard') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Your existing content within the dashboard -->
            <!-- For demonstration, I'm adding a section below the header -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Content specific to admin dashboard -->
                    <p>Welcome to the Admin Dashboard!</p>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <form action="{{ route('admin.foodmenu') }}" method="GET">
                    <button type="submit" class="text-black-300 hover:bg-orange-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        {{ __('Check Products') }}
                    </button>
                </form>
            </div>
            </div>

           
        </div>
  
</div>



</body>
</html>


</x-app-layout>
