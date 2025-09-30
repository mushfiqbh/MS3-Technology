@extends('layout.admin')

@section('admin-content')
    <div class="container mx-auto py-4 sm:py-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 sm:mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-blue-700 dark:text-blue-300">Experts</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage team members and expertise profiles</p>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                <div class="bg-blue-50 dark:bg-blue-900 px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Total: {{ count($experts) }}</span>
                </div>
                <button onclick="openCreateModal()" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>
                    <span class="hidden sm:inline">Add New</span>
                    <span class="sm:hidden">New Expert</span>
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
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Expert Details</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Photo</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($experts as $expert)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-y-2">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $expert->name }}</div>
                                        @if($expert->role)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-briefcase mr-2"></i>{{ $expert->role }}
                                        </div>
                                        @endif
                                        @if($expert->department)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-building mr-2"></i>{{ $expert->department }}
                                        </div>
                                        @endif
                                        @if($expert->bio)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-user-circle mr-2"></i>{{ \Illuminate\Support\Str::limit($expert->bio, 100) }}
                                        </div>
                                        @endif
                                        <div class="text-xs text-gray-500">📅 {{ \Carbon\Carbon::parse($expert->created_at)->format('M d, Y H:i') }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($expert->photo_url)
                                        <img src="{{ asset('storage/' . $expert->photo_url) }}" alt="{{ $expert->name }}" class="w-16 h-16 object-cover rounded-full border-2 border-gray-200 dark:border-gray-600">
                                    @else
                                        <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center border-2 border-gray-200 dark:border-gray-600">
                                            <span class="text-white font-semibold text-lg">{{ substr($expert->name, 0, 1) }}</span>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="openEditModal({{ $expert->id }})" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.experts.delete', $expert->id) }}" method="POST" class="inline">
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
                    @foreach ($experts as $expert)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                        <!-- Header -->
                        <div class="flex items-center space-x-4 mb-3">
                            @if($expert->photo)
                                <img src="{{ asset('storage/' . $expert->photo) }}" alt="{{ $expert->name }}" class="w-16 h-16 object-cover rounded-full border-2 border-gray-200 dark:border-gray-500">
                            @else
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center border-2 border-gray-200 dark:border-gray-500">
                                    <span class="text-white font-semibold text-lg">{{ substr($expert->name, 0, 1) }}</span>
                                </div>
                            @endif
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $expert->name }}</h3>
                                @if($expert->role)
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-briefcase mr-1"></i>{{ $expert->role }}
                                </p>
                                @endif
                                @if($expert->department)
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    <i class="fas fa-building mr-1"></i>{{ $expert->department }}
                                </p>
                                @endif
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="space-y-2 mb-4">
                            @if($expert->bio)
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i class="fas fa-user-circle mr-2"></i>
                                {{ \Illuminate\Support\Str::limit($expert->bio, 80) }}
                            </div>
                            @endif
                            <div class="flex items-center text-xs text-gray-500 mt-2">
                                <i class="fas fa-calendar w-4 mr-2"></i>
                                {{ \Carbon\Carbon::parse($expert->created_at)->format('M d, Y H:i') }}
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex space-x-3">
                            <button onclick="openEditModal({{ $expert->id }})" class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <i class="fas fa-edit mr-2"></i>
                                Edit
                            </button>
                            <form action="{{ route('admin.experts.delete', $expert->id) }}" method="POST" class="flex-1">
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
    <div id="expertModal" class="fixed inset-0 bg-transparent backdrop-blur-md hidden overflow-y-auto h-full w-full z-50 p-4" style="align-items: center; justify-content: center;">
        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white dark:bg-gray-800 rounded-xl shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-white">Add New Expert</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <form id="expertForm" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                @csrf
                <div id="methodField"></div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Full Name *</label>
                        <input type="text" id="form_name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" required />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Role/Position *</label>
                        <input type="text" id="form_role" name="role" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" required placeholder="e.g. Senior Developer, Project Manager" />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Department</label>
                        <select id="form_department" name="department" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <option value="">Select Department</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Design">Design</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Sales">Sales</option>
                            <option value="Operations">Operations</option>
                            <option value="Finance">Finance</option>
                            <option value="Human Resources">Human Resources</option>
                            <option value="Management">Management</option>
                            <option value="Consulting">Consulting</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Experience Level</label>
                        <select id="form_experience" name="experience" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <option value="">Select Experience Level</option>
                            <option value="Junior">Junior (0-2 years)</option>
                            <option value="Mid-Level">Mid-Level (3-5 years)</option>
                            <option value="Senior">Senior (6-10 years)</option>
                            <option value="Lead">Lead (10+ years)</option>
                            <option value="Expert">Expert (15+ years)</option>
                        </select>
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Biography</label>
                        <textarea id="form_bio" name="bio" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Brief description of expertise, achievements, and background..."></textarea>
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Profile Photo</label>
                        <div class="flex items-center space-x-4">
                            <div id="photoPreview" class="w-20 h-20 bg-gray-200 dark:bg-gray-600 rounded-full border-2 border-gray-300 dark:border-gray-500 items-center justify-center overflow-hidden" style="display: none;">
                                <img id="previewImage" src="" alt="Photo Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <input type="file" id="form_photo" name="photo" accept="image/*" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                                <p class="text-sm text-gray-500 mt-1">Upload profile photo (PNG, JPG, JPEG)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- Modal Footer -->
            <div class="sticky bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-xl">
                <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-3">
                    <button type="button" onclick="closeModal()" class="w-full sm:w-auto px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" form="expertForm" id="submitBtn" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i>
                        Add Expert
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const experts = @json($experts);

        function openCreateModal() {
            // Reset form for create
            document.getElementById('modalTitle').textContent = 'Add New Expert';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Add Expert';
            document.getElementById('methodField').innerHTML = '';
            document.getElementById('expertForm').action = '{{ route("admin.experts.create") }}';
            
            // Clear all form fields
            clearFormFields();
            
            const modal = document.getElementById('expertModal');
            modal.classList.remove('hidden');
            modal.style.display = 'flex';
        }

        function openEditModal(id) {
            const expert = experts.find(e => e.id === id);
            if (expert) {
                // Set form for edit
                document.getElementById('modalTitle').textContent = 'Edit Expert';
                document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Update Expert';
                document.getElementById('methodField').innerHTML = '@method("PUT")';
                document.getElementById('expertForm').action = `/admin/experts/${id}`;
                
                // Populate form fields with existing data
                document.getElementById('form_name').value = expert.name || '';
                document.getElementById('form_role').value = expert.role || '';
                document.getElementById('form_department').value = expert.department || '';
                document.getElementById('form_experience').value = expert.experience || '';
                document.getElementById('form_bio').value = expert.bio || '';
                
                // Show existing photo if available
                if (expert.photo) {
                    showPhotoPreview(`{{ asset('storage/') }}/${expert.photo}`);
                } else {
                    hidePhotoPreview();
                }
                
                const modal = document.getElementById('expertModal');
                modal.classList.remove('hidden');
                modal.style.display = 'flex';
            }
        }

        function closeModal() {
            const modal = document.getElementById('expertModal');
            modal.classList.add('hidden');
            modal.style.display = 'none';
            hidePhotoPreview();
        }

        function clearFormFields() {
            document.getElementById('form_name').value = '';
            document.getElementById('form_role').value = '';
            document.getElementById('form_department').value = '';
            document.getElementById('form_experience').value = '';
            document.getElementById('form_bio').value = '';
            document.getElementById('form_photo').value = '';
            hidePhotoPreview();
        }

        function showPhotoPreview(src) {
            const preview = document.getElementById('photoPreview');
            const image = document.getElementById('previewImage');
            image.src = src;
            preview.style.display = 'flex';
        }

        function hidePhotoPreview() {
            const preview = document.getElementById('photoPreview');
            preview.style.display = 'none';
        }

        // Photo preview on file selection
        document.getElementById('form_photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    showPhotoPreview(e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                hidePhotoPreview();
            }
        });

        // Close modal when clicking outside
        document.getElementById('expertModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
