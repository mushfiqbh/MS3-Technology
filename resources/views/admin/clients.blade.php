@extends('layout.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-300">Clients</h1>
    </div>
    <!-- Create Client Form -->
    <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow p-4">
        <form action="{{ route('admin.clients.create') }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-4 items-center">
            @csrf
            <input type="text" name="name" placeholder="Client Name" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="text" name="url" placeholder="url" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="text" name="note" placeholder="Note" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="file" name="logo" accept="image/*" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded font-semibold shadow hover:bg-blue-700 transition"><i class="fas fa-plus mr-2"></i> Add</button>
        </form>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200">
                    <th class="px-4 py-2 text-left font-semibold">#</th>
                    <th class="px-4 py-2 text-left font-semibold">Name</th>
                    <th class="px-4 py-2 text-left font-semibold">URL</th>
                    <th class="px-4 py-2 text-left font-semibold">Note</th>
                    <th class="px-4 py-2 text-left font-semibold">Logo</th>
                    <th class="px-4 py-2 text-left font-semibold">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                @if(request()->has('edit') && request('edit') == $client->id)
                <!-- Edit Client Form Inline -->
                <tr class="bg-blue-50 dark:bg-blue-900">
                    <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2"><input type="text" name="name" value="{{ $client->name }}" required class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" /></td>
                        <td class="px-4 py-2"><input type="text" name="url" value="{{ $client->url }}" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" /></td>
                        <td class="px-4 py-2"><input type="text" name="note" value="{{ $client->note }}" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" /></td>
                        <td class="px-4 py-2">
                            @if($client->logo)
                            <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="w-16 h-16 object-cover">
                            @endif
                        </td>
                        <td class="px-4 py-2">
                            <input type="file" name="logo" accept="image/*" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white mb-2" />
                            <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-save"></i></button>
                            <a href="{{ route('admin.clients.index') }}" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></a>
                        </td>
                    </form>
                </tr>
                @else
                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 font-semibold text-gray-800 dark:text-gray-100">{{ $client->name }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $client->url }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $client->note }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.clients.index', ['edit' => $client->id]) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.clients.delete', $client->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
