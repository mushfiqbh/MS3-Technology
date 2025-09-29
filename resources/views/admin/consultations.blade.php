@extends('layout.admin')

@section('admin-content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-blue-700 dark:text-blue-300">Consultations</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600 dark:text-gray-400">Total: {{ count($consultations) }}</span>
            </div>
        </div>

        <!-- Create Consultation Form -->
        <div class="mb-8 bg-white dark:bg-gray-800 rounded-xl shadow p-4">
            <form action="{{ route('admin.consultations.create') }}" method="POST" class="flex flex-wrap gap-4">
                @csrf
                <input type="text" name="name" placeholder="Name" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                <input type="email" name="email" placeholder="Email" required class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                <input type="text" name="phone" placeholder="Phone" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                <input type="text" name="company" placeholder="Company" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                <input type="text" name="project_type" placeholder="Project Type" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                <input type="text" name="budget_type" placeholder="Budget Type" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                <input type="text" name="timeline" placeholder="Timeline" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                <select name="preferred_contact_method" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                    <option value="">Preferred Contact</option>
                    <option value="Email">Email</option>
                    <option value="Phone">Phone</option>
                    <option value="WhatsApp">WhatsApp</option>
                    <option value="Other">Other</option>
                </select>
                <textarea name="project_description" placeholder="Project Description" rows="2" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white"></textarea>
                <select name="status" class="px-3 py-2 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Rejected">Rejected</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded font-semibold shadow hover:bg-blue-700 transition"><i class="fas fa-plus mr-2"></i> Add</button>
            </form>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow p-4 overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-200">
                        <th class="px-4 py-2 text-left font-semibold">#</th>
                        <th class="px-4 py-2 text-left font-semibold">Name</th>
                        <th class="px-4 py-2 text-left font-semibold">Email</th>
                        <th class="px-4 py-2 text-left font-semibold">Phone</th>
                        <th class="px-4 py-2 text-left font-semibold">Company</th>
                        <th class="px-4 py-2 text-left font-semibold">Project Type</th>
                        <th class="px-4 py-2 text-left font-semibold">Budget Type</th>
                        <th class="px-4 py-2 text-left font-semibold">Timeline</th>
                        <th class="px-4 py-2 text-left font-semibold">Preferred Contact</th>
                        <th class="px-4 py-2 text-left font-semibold">Project Description</th>
                        <th class="px-4 py-2 text-left font-semibold">Date</th>
                        <th class="px-4 py-2 text-left font-semibold">Status</th>
                        <th class="px-4 py-2 text-left font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultations as $consultation)
                        @if (request()->has('edit') && request('edit') == $consultation->id)
                            <!-- Edit Consultation Inline -->
                            <tr class="bg-blue-50 dark:bg-blue-900">
                                <form action="{{ route('admin.consultations.update', $consultation->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2"><input type="text" name="name"
                                            value="{{ $consultation->name }}"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                                    </td>
                                    <td class="px-4 py-2"><input type="text" name="email"
                                            value="{{ $consultation->email }}"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                                    </td>
                                    <td class="px-4 py-2"><input type="text" name="phone"
                                            value="{{ $consultation->phone }}"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                                    </td>
                                    <td class="px-4 py-2"><input type="text" name="company"
                                            value="{{ $consultation->company }}"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                                    </td>
                                    <td class="px-4 py-2"><input type="text" name="project_type"
                                            value="{{ $consultation->project_type }}"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                                    </td>
                                    <td class="px-4 py-2"><input type="text" name="budget_type"
                                            value="{{ $consultation->budget_type }}"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                                    </td>
                                    <td class="px-4 py-2"><input type="text" name="timeline"
                                            value="{{ $consultation->timeline }}"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white" />
                                    </td>
                                    <td class="px-4 py-2">
                                        <select name="preferred_contact_method"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                                            <option value="Email"
                                                {{ $consultation->preferred_contact_method == 'Email' ? 'selected' : '' }}>
                                                Email</option>
                                            <option value="Phone"
                                                {{ $consultation->preferred_contact_method == 'Phone' ? 'selected' : '' }}>
                                                Phone</option>
                                            <option value="WhatsApp"
                                                {{ $consultation->preferred_contact_method == 'WhatsApp' ? 'selected' : '' }}>
                                                WhatsApp</option>
                                            <option value="Other"
                                                {{ $consultation->preferred_contact_method == 'Other' ? 'selected' : '' }}>
                                                Other</option>
                                        </select>
                                    </td>
                                    <td class="px-4 py-2">
                                        <textarea name="project_description" rows="2"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">{{ $consultation->project_description }}</textarea>
                                    </td>
                                    <td class="px-4 py-2 text-gray-600 dark:text-gray-300">
                                        {{ \Carbon\Carbon::parse($consultation->created_at)->format('M d, Y') }}</td>
                                    <td class="px-4 py-2">
                                        <select name="status"
                                            class="px-2 py-1 rounded border border-gray-300 dark:bg-gray-700 dark:text-white">
                                            <option value="Pending"
                                                {{ $consultation->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="In Progress"
                                                {{ $consultation->status == 'In Progress' ? 'selected' : '' }}>In Progress
                                            </option>
                                            <option value="Completed"
                                                {{ $consultation->status == 'Completed' ? 'selected' : '' }}>Completed
                                            </option>
                                            <option value="Rejected"
                                                {{ $consultation->status == 'Rejected' ? 'selected' : '' }}>Rejected
                                            </option>
                                        </select>
                                    </td>
                                    <td class="px-4 py-2">
                                        <button type="submit" class="text-green-600 hover:text-green-800 mr-2"><i
                                                class="fas fa-save"></i></button>
                                        <a href="{{ route('admin.consultations.index') }}"
                                            class="text-gray-500 hover:text-gray-700"><i class="fas fa-times"></i></a>
                                    </td>
                                </form>
                            </tr>
                        @else
                            <tr
                                class="border-b border-gray-100 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 font-semibold text-gray-800 dark:text-gray-100">
                                    {{ $consultation->name }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $consultation->email }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $consultation->phone ?? 'N/A' }}
                                </td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">
                                    {{ $consultation->service ?? 'General' }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($consultation->created_at)->format('M d, Y') }}</td>
                                <td class="px-4 py-2">
                                    @php
                                    $status = $consultation->status ?? 'pending';
                                    $statusColors = [
                                    'pending' =>
                                    'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                                    'contacted' =>
                                    'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                                    'completed' =>
                                    'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                    'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200',
                                    ];
                                    @endphp
                            <tr
                                class="border-b border-gray-100 dark:border-gray-700 hover:bg-blue-50 dark:hover:bg-blue-900">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 font-semibold text-gray-800 dark:text-gray-100">
                                    {{ $consultation->name }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $consultation->email }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $consultation->phone }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $consultation->company }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $consultation->project_type }}
                                </td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $consultation->budget_type }}
                                </td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">{{ $consultation->timeline }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">
                                    {{ $consultation->preferred_contact_method }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">
                                    {{ \Illuminate\Support\Str::limit($consultation->project_description, 40) }}</td>
                                <td class="px-4 py-2 text-gray-600 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($consultation->created_at)->format('M d, Y') }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="inline-block px-2 py-1 text-xs rounded
                                                {{ $consultation->status == 'Pending'
                                                    ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200'
                                                    : ($consultation->status == 'Completed'
                                                        ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                                                        : ($consultation->status == 'In Progress'
                                                            ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200'
                                                            : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200')) }}">
                                        {{ $consultation->status }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <a href="{{ route('admin.consultations.index', ['edit' => $consultation->id]) }}"
                                        class="text-blue-600 hover:text-blue-800 mr-2"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.consultations.delete', $consultation->id) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800"
                                            onclick="return confirm('Are you sure?')"><i
                                                class="fas fa-trash"></i></button>
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
