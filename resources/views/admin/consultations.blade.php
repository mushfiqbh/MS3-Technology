@extends('layout.admin')

@section('admin-content')
    <div class="container mx-auto py-4 sm:py-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 sm:mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-blue-700 dark:text-blue-300">Consultations</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage consultation requests and inquiries</p>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                <div class="bg-blue-50 dark:bg-blue-900 px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Total: {{ count($consultations) }}</span>
                </div>
                <button onclick="openCreateModal()" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>
                    <span class="hidden sm:inline">Add New</span>
                    <span class="sm:hidden">New Consultation</span>
                </button>
            </div>
        </div>

        <!-- Consultation Cards/Table -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
            <!-- Desktop Table View -->
            <div class="hidden lg:block">
                <div class="overflow-x-auto">
                    <table class="min-w-full">
                        <thead class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900 dark:to-indigo-900">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">#</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Consultation Details</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($consultations as $consultation)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-y-2">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $consultation->name }}</div>
                                        <div class="text-sm text-gray-600 dark:text-gray-400">{{ $consultation->email }}</div>
                                        @if($consultation->phone)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">📞 {{ $consultation->phone }}</div>
                                        @endif
                                        @if($consultation->company)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">🏢 {{ $consultation->company }}</div>
                                        @endif
                                        @if($consultation->project_type)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">📋 {{ $consultation->project_type }}</div>
                                        @endif
                                        @if($consultation->budget_type)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">💰 {{ $consultation->budget_type }}</div>
                                        @endif
                                        @if($consultation->timeline)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">⏱️ {{ $consultation->timeline }}</div>
                                        @endif
                                        @if($consultation->preferred_contact_method)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">📞 Contact: {{ $consultation->preferred_contact_method }}</div>
                                        @endif
                                        @if($consultation->project_description)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">💬 {{ \Illuminate\Support\Str::limit($consultation->project_description, 100) }}</div>
                                        @endif
                                        <div class="text-xs text-gray-500">📅 {{ \Carbon\Carbon::parse($consultation->created_at)->format('M d, Y H:i') }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full
                                        {{ $consultation->status == 'Pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' :
                                           ($consultation->status == 'Completed' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' :
                                           ($consultation->status == 'In Progress' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' :
                                           'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200')) }}">
                                        {{ $consultation->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="openEditModal({{ $consultation->id }})" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.consultations.delete', $consultation->id) }}" method="POST" class="inline">
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
                    @foreach ($consultations as $consultation)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                        <!-- Header -->
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $consultation->name }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400">{{ $consultation->email }}</p>
                            </div>
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full ml-2
                                {{ $consultation->status == 'Pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' :
                                   ($consultation->status == 'Completed' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' :
                                   ($consultation->status == 'In Progress' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' :
                                   'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200')) }}">
                                {{ $consultation->status }}
                            </span>
                        </div>

                        <!-- Details -->
                        <div class="space-y-2 mb-4">
                            @if($consultation->phone)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-phone w-4 mr-2"></i>
                                {{ $consultation->phone }}
                            </div>
                            @endif
                            @if($consultation->company)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-building w-4 mr-2"></i>
                                {{ $consultation->company }}
                            </div>
                            @endif
                            @if($consultation->project_type)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-clipboard w-4 mr-2"></i>
                                {{ $consultation->project_type }}
                            </div>
                            @endif
                            @if($consultation->budget_type)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-dollar-sign w-4 mr-2"></i>
                                {{ $consultation->budget_type }}
                            </div>
                            @endif
                            @if($consultation->timeline)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-clock w-4 mr-2"></i>
                                {{ $consultation->timeline }}
                            </div>
                            @endif
                            @if($consultation->preferred_contact_method)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-envelope w-4 mr-2"></i>
                                Preferred: {{ $consultation->preferred_contact_method }}
                            </div>
                            @endif
                            @if($consultation->project_description)
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i class="fas fa-comment mr-2"></i>
                                {{ \Illuminate\Support\Str::limit($consultation->project_description, 80) }}
                            </div>
                            @endif
                            <div class="flex items-center text-xs text-gray-500 mt-2">
                                <i class="fas fa-calendar w-4 mr-2"></i>
                                {{ \Carbon\Carbon::parse($consultation->created_at)->format('M d, Y H:i') }}
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex space-x-3">
                            <button onclick="openEditModal({{ $consultation->id }})" class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <i class="fas fa-edit mr-2"></i>
                                Edit
                            </button>
                            <form action="{{ route('admin.consultations.delete', $consultation->id) }}" method="POST" class="flex-1">
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
    <div id="consultationModal" class="fixed inset-0 bg-transparent backdrop-blur-md hidden overflow-y-auto h-full w-full z-50 p-4" style="align-items: center; justify-content: center;">
        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white dark:bg-gray-800 rounded-xl shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-white">Add New Consultation</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
                <form id="consultationForm" method="POST" class="px-6 py-4">
                    @csrf
                    <div id="methodField"></div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Name *</label>
                            <input type="text" id="form_name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" required />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Email *</label>
                            <input type="email" id="form_email" name="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" required />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Phone</label>
                            <input type="text" id="form_phone" name="phone" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Company</label>
                            <input type="text" id="form_company" name="company" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Project Type</label>
                            <input type="text" id="form_project_type" name="project_type" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Budget Type</label>
                            <input type="text" id="form_budget_type" name="budget_type" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Timeline</label>
                            <input type="text" id="form_timeline" name="timeline" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Preferred Contact</label>
                            <select id="form_preferred_contact_method" name="preferred_contact_method" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="">Select Contact Method</option>
                                <option value="Email">Email</option>
                                <option value="Phone">Phone</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="lg:col-span-2 space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Project Description</label>
                            <textarea id="form_project_description" name="project_description" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Describe the project requirements..."></textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Status</label>
                            <select id="form_status" name="status" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                                <option value="Pending">Pending</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                </form>
                
                <!-- Modal Footer -->
                <div class="sticky bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-xl">
                    <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-3">
                        <button type="button" onclick="closeModal()" class="w-full sm:w-auto px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                            Cancel
                        </button>
                        <button type="submit" form="consultationForm" id="submitBtn" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                            <i class="fas fa-save mr-2"></i>
                            Add Consultation
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const consultations = @json($consultations);

        function openCreateModal() {
            // Reset form for create
            document.getElementById('modalTitle').textContent = 'Add New Consultation';
            document.getElementById('submitBtn').textContent = 'Add Consultation';
            document.getElementById('methodField').innerHTML = '';
            document.getElementById('consultationForm').action = '{{ route("admin.consultations.create") }}';
            
            // Clear all form fields
            clearFormFields();
            
            // Set default values for create
            document.getElementById('form_status').value = 'Pending';
            
            const modal = document.getElementById('consultationModal');
            modal.classList.remove('hidden');
            modal.style.display = 'flex';
        }

        function openEditModal(id) {
            const consultation = consultations.find(c => c.id === id);
            if (consultation) {
                // Set form for edit
                document.getElementById('modalTitle').textContent = 'Edit Consultation';
                document.getElementById('submitBtn').textContent = 'Update Consultation';
                document.getElementById('methodField').innerHTML = '@method("PUT")';
                document.getElementById('consultationForm').action = `/admin/consultations/${id}`;
                
                // Populate form fields with existing data
                document.getElementById('form_name').value = consultation.name || '';
                document.getElementById('form_email').value = consultation.email || '';
                document.getElementById('form_phone').value = consultation.phone || '';
                document.getElementById('form_company').value = consultation.company || '';
                document.getElementById('form_project_type').value = consultation.project_type || '';
                document.getElementById('form_budget_type').value = consultation.budget_type || '';
                document.getElementById('form_timeline').value = consultation.timeline || '';
                document.getElementById('form_preferred_contact_method').value = consultation.preferred_contact_method || '';
                document.getElementById('form_project_description').value = consultation.project_description || '';
                document.getElementById('form_status').value = consultation.status || 'Pending';
                
                const modal = document.getElementById('consultationModal');
                modal.classList.remove('hidden');
                modal.style.display = 'flex';
            }
        }

        function closeModal() {
            const modal = document.getElementById('consultationModal');
            modal.classList.add('hidden');
            modal.style.display = 'none';
        }

        function clearFormFields() {
            document.getElementById('form_name').value = '';
            document.getElementById('form_email').value = '';
            document.getElementById('form_phone').value = '';
            document.getElementById('form_company').value = '';
            document.getElementById('form_project_type').value = '';
            document.getElementById('form_budget_type').value = '';
            document.getElementById('form_timeline').value = '';
            document.getElementById('form_preferred_contact_method').value = '';
            document.getElementById('form_project_description').value = '';
            document.getElementById('form_status').value = 'Pending';
        }

        // Close modal when clicking outside
        document.getElementById('consultationModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
