@extends('layout.admin')

@section('admin-content')
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-300">Activities</h1>
    </div>
    <!-- Create Activity Form -->
    <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow p-4">
        <form action="{{ route('admin.activities.create') }}" method="POST" enctype="multipart/form-data" class="flex flex-col md:flex-row gap-4 items-center">
            @csrf
            <input type="text" name="title" placeholder="Activity Title" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="text" name="category" placeholder="Category" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="date" name="activity_date" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
            <input type="file" name="image" accept="image/*" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
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
                    <th class="px-4 py-2 text-left font-semibold">Date</th>
                    <th class="px-4 py-2 text-left font-semibold">Description</th>
                    <th class="px-4 py-2 text-left font-semibold">Status</th>
                    <th class="px-4 py-2 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                @if(request()->has('edit') && request('edit') == $activity->id)
                <!-- Edit Activity Form Inline -->
                <tr class="bg-blue-50 dark:bg-blue-900">
                    <form action="{{ route('admin.activities.update', $activity->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2"><input type="text" name="title" value="{{ $activity->title }}" required class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white w-full" /></td>
                        <td class="px-4 py-2"><input type="text" name="category" value="{{ $activity->category }}" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white w-full" /></td>
                        <td class="px-4 py-2"><input type="date" name="activity_date" value="{{ $activity->activity_date }}" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white w-full" /></td>
                        <td class="px-4 py-2"><textarea name="description" rows="2" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white w-full">{{ $activity->description }}</textarea></td>
                        <td class="px-4 py-2">
                            <select name="status" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                                <option value="upcoming" {{ ($activity->status ?? 'upcoming') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                                <option value="ongoing" {{ ($activity->status ?? 'upcoming') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                                <option value="completed" {{ ($activity->status ?? 'upcoming') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ ($activity->status ?? 'upcoming') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </td>
                        <td class="px-4 py-2">
                            <input type="file" name="image" accept="image/*" class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white mb-2" />
                            <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i class="fas fa-save"></i></button>
                            <a href="{{ route('admin.activities.index') }}" class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></a>
                        </td>
                    </form>
                </tr>
                @else
                <tr class="border-b border-gray-100 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 font-semibold text-gray-800 dark:text-gray-100">{{ $activity->title }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $activity->category ?? 'General' }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $activity->activity_date ? \Carbon\Carbon::parse($activity->activity_date)->format('M d, Y') : 'TBD' }}</td>
                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ \Illuminate\Support\Str::limit($activity->description, 40) }}</td>
                    <td class="px-4 py-2">
                        @php
                            $status = $activity->status ?? 'upcoming';
                            $statusColors = [
                                'upcoming' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                                'ongoing' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                                'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'
                            ];
                        @endphp
                        <span class="inline-block px-2 py-1 text-xs rounded {{ $statusColors[$status] ?? $statusColors['upcoming'] }}">
                            {{ ucfirst($status) }}
                        </span>
                    </td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.activities.index', ['edit' => $activity->id]) }}" class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.activities.delete', $activity->id) }}" method="POST" class="inline">
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
