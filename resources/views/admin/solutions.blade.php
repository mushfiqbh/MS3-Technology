@extends('layout.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-300">Solutions</h1>
    </div>
    <!-- Create Solution Form -->
    <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow p-4">
        <form action="{{ route('admin.solutions.create') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-center">
            @csrf
            <input type="text" name="title" placeholder="Solution Title" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="text" name="category" placeholder="Category" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="text" name="price" placeholder="Price (optional)" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <textarea name="description" placeholder="Description" rows="2" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded font-semibold shadow hover:bg-blue-700 transition"><i class="fas fa-plus mr-2"></i> Add</button>
        </form>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200">
                    <th class="px-4 py-2 text-left font-semibold">#</th>
                    <th class="px-4 py-2 text-left font-semibold">Title</th>
                    <th class="px-4 py-2 text-left font-semibold">Category</th>
                    <th class="px-4 py-2 text-left font-semibold">Price</th>
                    <th class="px-4 py-2 text-left font-semibold">Description</th>
                    <th class="px-4 py-2 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solutions as $solution)
                @if(request()->has('edit') && request('edit') == $solution->id)
                <!-- Edit Solution Form Inline -->
                <tr class="bg-blue-50 dark:bg-blue-900">
                    <form action="{{ route('admin.solutions.update', $solution->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2"><input type="text" name="title" value="{{ $solution->title }}" required class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white w-full" /></td>
                        <td class="px-4 py-2"><input type="text" name="category" value="{{ $solution->category }}" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white w-full" /></td>
                        <td class="px-4 py-2"><input type="text" name="price" value="{{ $solution->price }}" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white w-full" /></td>
                        <td class="px-4 py-2"><textarea name="description" rows="2" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white w-full">{{ $solution->description }}</textarea></td>
                        <td class="px-4 py-2">
                            <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-save"></i></button>
                            <a href="{{ route('admin.solutions.index') }}" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></a>
                        </td>
                    </form>
                </tr>
                @else
                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 font-semibold text-gray-800 dark:text-gray-100">{{ $solution->title }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $solution->category ?? 'General' }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $solution->price ? '$' . $solution->price : 'Quote' }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ \Illuminate\Support\Str::limit($solution->description, 50) }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.solutions.index', ['edit' => $solution->id]) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.solutions.delete', $solution->id) }}" method="POST" class="inline">
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
