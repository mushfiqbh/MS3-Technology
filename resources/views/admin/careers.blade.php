@extends('layout.admin')

@section('admin-content')
    <div class="container mx-auto py-4 sm:py-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 sm:mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-blue-700 dark:text-blue-300">Careers</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage job postings and career opportunities</p>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                <div class="bg-blue-50 dark:bg-blue-900 px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Total: {{ count($careers) }}</span>
                </div>
                <button onclick="openCreateModal()" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>
                    <span class="hidden sm:inline">Add New</span>
                    <span class="sm:hidden">New Career</span>
                </button>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <!-- Desktop Table View -->
            <div class="hidden lg:block">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900 dark:to-indigo-900">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">#</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Career Details</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($careers as $career)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-y-2">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $career->title }}</div>
                                        @if($career->location)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">📍 {{ $career->location }}</div>
                                        @endif
                                        @if($career->employment_type)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">💼 {{ $career->employment_type }}</div>
                                        @endif
                                        @if($career->description)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">📝 {{ \Illuminate\Support\Str::limit($career->description, 100) }}</div>
                                        @endif
                                        @if($career->requirements)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">📋 {{ \Illuminate\Support\Str::limit($career->requirements, 100) }}</div>
                                        @endif
                                        <div class="text-xs text-gray-500">📅 {{ \Carbon\Carbon::parse($career->created_at)->format('M d, Y H:i') }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                        {{ $career->status == 'Open' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' :
                                           'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                        {{ $career->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="openEditModal({{ $career->id }})" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.careers.delete', $career->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                                <i class="fas fa-trash mr-1"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Mobile Card View -->
            <div class="lg:hidden">
                <div class="space-y-4">
                    @foreach ($careers as $career)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                        <!-- Header -->
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $career->title }}</h3>
                                @if($career->location)
                                <p class="text-sm text-gray-600 dark:text-gray-400">📍 {{ $career->location }}</p>
                                @endif
                            </div>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full ml-2
                                {{ $career->status == 'Open' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' :
                                   'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                                {{ $career->status }}
                            </span>
                        </div>

                        <!-- Details -->
                        <div class="space-y-2 mb-4">
                            @if($career->employment_type)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-briefcase w-4 mr-2"></i>
                                {{ $career->employment_type }}
                            </div>
                            @endif
                            @if($career->description)
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i class="fas fa-file-text mr-2"></i>
                                {{ \Illuminate\Support\Str::limit($career->description, 80) }}
                            </div>
                            @endif
                            @if($career->requirements)
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i class="fas fa-list mr-2"></i>
                                {{ \Illuminate\Support\Str::limit($career->requirements, 80) }}
                            </div>
                            @endif
                            <div class="flex items-center text-xs text-gray-500 mt-2">
                                <i class="fas fa-calendar w-4 mr-2"></i>
                                {{ \Carbon\Carbon::parse($career->created_at)->format('M d, Y H:i') }}
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex space-x-3">
                            <button onclick="openEditModal({{ $career->id }})" class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <i class="fas fa-edit mr-2"></i>
                                Edit
                            </button>
                            <form action="{{ route('admin.careers.delete', $career->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
                                    <i class="fas fa-trash mr-2"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Create/Edit Modal -->
    <div id="careerModal" class="fixed inset-0 bg-transparent backdrop-blur-md hidden overflow-y-auto h-full w-full z-50 p-4" style="align-items: center; justify-content: center;">
        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white dark:bg-gray-800 rounded-xl shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-white">Add New Career</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <form id="careerForm" method="POST" class="px-6 py-4">
                @csrf
                <div id="methodField"></div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Job Title *</label>
                        <input type="text" id="form_title" name="title" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" required />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Location</label>
                        <input type="text" id="form_location" name="location" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Employment Type</label>
                        <select id="form_employment_type" name="employment_type" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <option value="">Select Employment Type</option>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Internship">Internship</option>
                            <option value="Contract">Contract</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Status</label>
                        <select id="form_status" name="status" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                        </select>
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="form_description" name="description" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Describe the job role and responsibilities..."></textarea>
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Requirements</label>
                        <textarea id="form_requirements" name="requirements" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="List the job requirements and qualifications..."></textarea>
                    </div>
                </div>
            </form>
            
            <!-- Modal Footer -->
            <div class="sticky bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-xl">
                <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-3">
                    <button type="button" onclick="closeModal()" class="w-full sm:w-auto px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" form="careerForm" id="submitBtn" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i>
                        Add Career
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const careers = @json($careers);

        function openCreateModal() {
            // Reset form for create
            document.getElementById('modalTitle').textContent = 'Add New Career';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Add Career';
            document.getElementById('methodField').innerHTML = '';
            document.getElementById('careerForm').action = '{{ route("admin.careers.create") }}';
            
            // Clear all form fields
            clearFormFields();
            
            // Set default values for create
            document.getElementById('form_status').value = 'Open';
            
            const modal = document.getElementById('careerModal');
            modal.classList.remove('hidden');
            modal.style.display = 'flex';
        }

        function openEditModal(id) {
            const career = careers.find(c => c.id === id);
            if (career) {
                // Set form for edit
                document.getElementById('modalTitle').textContent = 'Edit Career';
                document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Update Career';
                document.getElementById('methodField').innerHTML = '@method("PUT")';
                document.getElementById('careerForm').action = `/admin/careers/${id}`;
                
                // Populate form fields with existing data
                document.getElementById('form_title').value = career.title || '';
                document.getElementById('form_location').value = career.location || '';
                document.getElementById('form_employment_type').value = career.employment_type || '';
                document.getElementById('form_status').value = career.status || 'Open';
                document.getElementById('form_description').value = career.description || '';
                document.getElementById('form_requirements').value = career.requirements || '';
                
                const modal = document.getElementById('careerModal');
                modal.classList.remove('hidden');
                modal.style.display = 'flex';
            }
        }

        function closeModal() {
            const modal = document.getElementById('careerModal');
            modal.classList.add('hidden');
            modal.style.display = 'none';
        }

        function clearFormFields() {
            document.getElementById('form_title').value = '';
            document.getElementById('form_location').value = '';
            document.getElementById('form_employment_type').value = '';
            document.getElementById('form_status').value = 'Open';
            document.getElementById('form_description').value = '';
            document.getElementById('form_requirements').value = '';
        }

        // Close modal when clicking outside
        document.getElementById('careerModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
