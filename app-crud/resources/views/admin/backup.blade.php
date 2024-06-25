<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Backup & Recovery') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Database Backup</h2>
                    <form method="post" action="{{ route('admin.backup.database') }}">
                        @csrf
                        <button type="submit">Download Backup</button>
                    </form>

                    <h2>Database Restore</h2>
                    <form method="post" action="{{ route('admin.restore.database') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="restore_file" accept=".sql">
                        <button type="submit">Restore</button>
                    </form>

                    <h2>Database Management</h2>
                    <form method="post" action="{{ route('admin.drop.database') }}">
                        @csrf
                        <button type="submit">Drop Database</button>
                    </form>
                    <form method="post" action="{{ route('admin.create.database') }}">
                        @csrf
                        <button type="submit">Create Database</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
