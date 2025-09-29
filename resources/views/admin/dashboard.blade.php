@extends('layout.admin')

@section('admin-content')
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
            <!-- Example Table Cards: Replace with dynamic table list -->
            @foreach ([['name' => 'Experts', 'icon' => 'fas fa-user-tie', 'route' => 'admin.experts.index'], ['name' => 'Careers', 'icon' => 'fas fa-briefcase', 'route' => 'admin.careers.index'], ['name' => 'Clients', 'icon' => 'fas fa-user-friends', 'route' => 'admin.clients.index'], ['name' => 'Solutions', 'icon' => 'fas fa-lightbulb', 'route' => 'admin.solutions.index'], ['name' => 'Activities', 'icon' => 'fas fa-tasks', 'route' => 'admin.activities.index'], ['name' => 'Consultations', 'icon' => 'fas fa-comments', 'route' => 'admin.consultations.index']] as $table)
                <a href="{{ route($table['route']) }}"
                    class="block bg-white dark:bg-gray-800 rounded-xl shadow hover:shadow-lg transition p-6 group">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900">
                            <i class="{{ $table['icon'] }} text-blue-600 dark:text-blue-300 text-2xl"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 group-hover:text-blue-600">
                            {{ $table['name'] }}</h2>
                    </div>
                    <div class="flex gap-2">
                        <span
                            class="text-3xl font-bold text-gray-900 dark:text-white">{{ $records[Str::lower($table['name'])] ?? 0 }}</span>
                        <span class="text-sm text-gray-500 dark:text-gray-400 self-end">Total Records</span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
