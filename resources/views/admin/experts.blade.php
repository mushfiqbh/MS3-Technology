@extends('layout.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-300">Experts</h1>
    </div>
    <!-- Create Expert Form -->
    <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow p-4">
        <form action="{{ route('admin.experts.create') }}" method="POST" enctype="multipart/form-data" class="flex flex-wrap gap-4 items-center">
            @csrf
            <input type="text" name="name" placeholder="Name" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="text" name="role" placeholder="Role" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="text" name="department" placeholder="Department" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <textarea name="bio" placeholder="Bio" rows="2" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
            <input type="file" name="photo" accept="image/*" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded font-semibold shadow hover:bg-blue-700 transition"><i class="fas fa-plus mr-2"></i> Add</button>
        </form>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200">
                    <th class="px-4 py-2 text-left font-semibold">#</th>
                    <th class="px-4 py-2 text-left font-semibold">Name</th>
                    <th class="px-4 py-2 text-left font-semibold">Role</th>
                    <th class="px-4 py-2 text-left font-semibold">Department</th>
                    <th class="px-4 py-2 text-left font-semibold">Bio</th>
                    <th class="px-4 py-2 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($experts as $expert)
                    @if(!(request()->has('edit') && request('edit') == $expert->id))
                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 font-semibold text-gray-800 dark:text-gray-100">{{ $expert->name }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $expert->role }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $expert->department }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.experts.index', ['edit' => $expert->id]) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.experts.delete', $expert->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
                    <!-- Fixed Edit Form Modal -->
                    @if(request()->has('edit'))
                    @php $editExpert = $experts->where('id', request('edit'))->first(); @endphp
                    @if($editExpert)
                    <div class="fixed top-0 right-0 w-1/2 h-full bg-white dark:bg-gray-900 bg-opacity-95 shadow-2xl z-50 border-t border-blue-300 dark:border-blue-800">
                        <form action="{{ route('admin.experts.update', $editExpert->id) }}" method="POST" enctype="multipart/form-data" class="py-6">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" value="{{ $editExpert->name }}" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                            <input type="text" name="role" value="{{ $editExpert->role }}" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                            <input type="text" name="department" value="{{ $editExpert->department }}" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                            <textarea name="bio" rows="2" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">{{ $editExpert->bio }}</textarea>
                            <input type="file" name="photo" accept="image/*" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded font-semibold shadow hover:bg-green-700 transition"><i class="fas fa-save mr-2"></i> Save</button>
                            <a href="{{ route('admin.experts.index') }}" class="px-4 py-2 bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded font-semibold shadow hover:bg-gray-400 dark:hover:bg-gray-600 transition ml-2"><i class="fas fa-times mr-2"></i> Cancel</a>
                        </form>
                    </div>
                    @endif
                    @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
