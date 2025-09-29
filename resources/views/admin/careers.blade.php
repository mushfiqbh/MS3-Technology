@extends('layout.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-300">Careers</h1>
    </div>
    <!-- Create Career Form -->
    <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow p-4">
        <form action="{{ route('admin.careers.create') }}" method="POST" class="flex flex-col md:flex-row gap-4 items-center">
            @csrf
            <input type="text" name="title" placeholder="Job Title" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <textarea name="description" placeholder="Description" rows="2" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
            <textarea name="requirements" placeholder="Requirements" rows="2" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
            <input type="text" name="location" placeholder="Location" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <select name="employment_type" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                <option value="">Employment Type</option>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Internship">Internship</option>
                <option value="Contract">Contract</option>
            </select>
            <select name="status" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                <option value="Open">Open</option>
                <option value="Closed">Closed</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded font-semibold shadow hover:bg-blue-700 transition"><i class="fas fa-plus mr-2"></i> Add</button>
        </form>
    </div>
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 overflow-x-auto">
        <table class="min-w-full text-sm">
            <thead>
                <tr class="bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200">
                    <th class="px-4 py-2 text-left font-semibold">#</th>
                    <th class="px-4 py-2 text-left font-semibold">Job Title</th>
                    <th class="px-4 py-2 text-left font-semibold">Description</th>
                    <th class="px-4 py-2 text-left font-semibold">Requirements</th>
                    <th class="px-4 py-2 text-left font-semibold">Location</th>
                    <th class="px-4 py-2 text-left font-semibold">Employment Type</th>
                    <th class="px-4 py-2 text-left font-semibold">Status</th>
                    <th class="px-4 py-2 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($careers as $career)
                @if(request()->has('edit') && request('edit') == $career->id)
                <!-- Edit Career Form Inline -->
                <tr class="bg-blue-50 dark:bg-blue-900">
                    <form action="{{ route('admin.careers.update', $career->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2"><input type="text" name="title" value="{{ $career->title }}" required class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" /></td>
                        <td class="px-4 py-2"><textarea name="description" rows="2" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">{{ $career->description }}</textarea></td>
                        <td class="px-4 py-2"><textarea name="requirements" rows="2" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">{{ $career->requirements }}</textarea></td>
                        <td class="px-4 py-2"><input type="text" name="location" value="{{ $career->location }}" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" /></td>
                        <td class="px-4 py-2">
                            <select name="employment_type" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                                <option value="Full-time" {{ $career->employment_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
                                <option value="Part-time" {{ $career->employment_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
                                <option value="Internship" {{ $career->employment_type == 'Internship' ? 'selected' : '' }}>Internship</option>
                                <option value="Contract" {{ $career->employment_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                            </select>
                        </td>
                        <td class="px-4 py-2">
                            <select name="status" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                                <option value="Open" {{ $career->status == 'Open' ? 'selected' : '' }}>Open</option>
                                <option value="Closed" {{ $career->status == 'Closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                        </td>
                        <td class="px-4 py-2">
                            <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-save"></i></button>
                            <a href="{{ route('admin.careers.index') }}" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></a>
                        </td>
                    </form>
                </tr>
                @else
                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 font-semibold text-gray-800 dark:text-gray-100">{{ $career->title }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ \Illuminate\Support\Str::limit($career->description, 40) }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ \Illuminate\Support\Str::limit($career->requirements, 40) }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $career->location }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $career->employment_type }}</td>
                    <td class="px-4 py-2">
                        <span class="inline-block px-2 py-1 text-xs rounded {{ $career->status == 'Open' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                            {{ $career->status }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.careers.index', ['edit' => $career->id]) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.careers.delete', $career->id) }}" method="POST" class="inline">
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
