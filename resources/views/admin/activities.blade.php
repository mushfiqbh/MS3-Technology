@extends('layout.admin')

@section('admin-content')
    <div class="container mx-auto py-4 sm:py-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 sm:mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-blue-700 dark:text-blue-300">Activities</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage company activities and events</p>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                <div class="bg-blue-50 dark:bg-blue-900 px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Total: {{ count($activities) }}</span>
                </div>
                <button onclick="openCreateModal()" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>
                    <span class="hidden sm:inline">Add New</span>
                    <span class="sm:hidden">New Activity</span>
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
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Activity Details</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Image</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($activities as $activity)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-y-2">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $activity->title }}</div>
                                        @if($activity->category)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-tag mr-2"></i>{{ $activity->category }}
                                        </div>
                                        @endif
                                        @if($activity->activity_date)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-calendar mr-2"></i>{{ \Carbon\Carbon::parse($activity->activity_date)->format('M d, Y') }}
                                        </div>
                                        @endif
                                        @if($activity->description)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-file-text mr-2"></i>{{ \Illuminate\Support\Str::limit($activity->description, 100) }}
                                        </div>
                                        @endif
                                        <div class="text-xs text-gray-500">📅 {{ \Carbon\Carbon::parse($activity->created_at)->format('M d, Y H:i') }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $status = $activity->status ?? 'upcoming';
                                        $statusColors = [
                                            'upcoming' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                                            'ongoing' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                                            'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                            'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'
                                        ];
                                    @endphp
                                    <span class="inline-flex px-3 py-1 text-xs font-semibold rounded-full {{ $statusColors[$status] ?? $statusColors['upcoming'] }}">
                                        {{ ucfirst($status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($activity->images->count() > 0)
                                        <div class="flex -space-x-2 overflow-hidden">
                                            @foreach($activity->images->take(3) as $image)
                                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $activity->title }}" class="w-16 h-16 object-cover rounded-lg border-2 border-white dark:border-gray-800">
                                            @endforeach
                                            @if($activity->images->count() > 3)
                                                <div class="w-16 h-16 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center border-2 border-white dark:border-gray-800">
                                                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-300">+{{ $activity->images->count() - 3 }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-xl"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="openEditModal({{ $activity->id }})" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.activities.delete', $activity->id) }}" method="POST" class="inline">
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
                    @foreach ($activities as $activity)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                        <!-- Header -->
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    @if($activity->images->count() > 0)
                                        <div class="flex -space-x-1 overflow-hidden">
                                            @foreach($activity->images->take(2) as $image)
                                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $activity->title }}" class="w-8 h-8 object-cover rounded-lg border border-white dark:border-gray-700">
                                            @endforeach
                                            @if($activity->images->count() > 2)
                                                <div class="w-8 h-8 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center border border-white dark:border-gray-700">
                                                    <span class="text-xs font-semibold text-gray-600 dark:text-gray-300">+{{ $activity->images->count() - 2 }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="w-12 h-12 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $activity->title }}</h3>
                                        @if($activity->category)
                                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ $activity->category }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @php
                                $status = $activity->status ?? 'upcoming';
                                $statusColors = [
                                    'upcoming' => 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200',
                                    'ongoing' => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200',
                                    'completed' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200',
                                    'cancelled' => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200'
                                ];
                            @endphp
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full ml-2 {{ $statusColors[$status] ?? $statusColors['upcoming'] }}">
                                {{ ucfirst($status) }}
                            </span>
                        </div>

                        <!-- Details -->
                        <div class="space-y-2 mb-4">
                            @if($activity->activity_date)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-calendar w-4 mr-2"></i>
                                {{ \Carbon\Carbon::parse($activity->activity_date)->format('M d, Y') }}
                            </div>
                            @endif
                            @if($activity->description)
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i class="fas fa-file-text mr-2"></i>
                                {{ \Illuminate\Support\Str::limit($activity->description, 80) }}
                            </div>
                            @endif
                            <div class="flex items-center text-xs text-gray-500 mt-2">
                                <i class="fas fa-clock w-4 mr-2"></i>
                                {{ \Carbon\Carbon::parse($activity->created_at)->format('M d, Y H:i') }}
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex space-x-3">
                            <button onclick="openEditModal({{ $activity->id }})" class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <i class="fas fa-edit mr-2"></i>
                                Edit
                            </button>
                            <form action="{{ route('admin.activities.delete', $activity->id) }}" method="POST" class="flex-1">
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
    <div id="activityModal" class="fixed inset-0 bg-transparent backdrop-blur-md hidden overflow-y-auto h-full w-full z-50 p-4" style="align-items: center; justify-content: center;">
        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white dark:bg-gray-800 rounded-xl shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-white">Add New Activity</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <form id="activityForm" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                @csrf
                <div id="methodField"></div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Activity Title *</label>
                        <input type="text" id="form_title" name="title" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" required />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Category</label>
                        <input type="text" id="form_category" name="category" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="e.g. Workshop, Meeting, Event" />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Activity Date</label>
                        <input type="date" id="form_activity_date" name="activity_date" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Status</label>
                        <select id="form_status" name="status" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <option value="upcoming">Upcoming</option>
                            <option value="ongoing">Ongoing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="form_description" name="description" rows="4" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Describe the activity..."></textarea>
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Activity Images</label>
                        @include('components.admin.activities.image-upload')
                    </div>
                </div>
            </form>
            
            <!-- Modal Footer -->
            <div class="sticky bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-xl">
                <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-3">
                    <button type="button" onclick="closeModal()" class="w-full sm:w-auto px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" form="activityForm" id="submitBtn" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i>
                        Add Activity
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const activities = @json($activities);
        let selectedImages = [];
        let currentActivityId = null;
        let isEditMode = false;

        function openCreateModal() {
            // Reset form for create
            isEditMode = false;
            currentActivityId = null;
            document.getElementById('modalTitle').textContent = 'Add New Activity';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Add Activity';
            document.getElementById('methodField').innerHTML = '';
            
            // Clear all form fields
            clearFormFields();
            
            // Set default values for create
            document.getElementById('form_status').value = 'upcoming';
            
            const modal = document.getElementById('activityModal');
            modal.classList.remove('hidden');
            modal.style.display = 'flex';
        }

        function openEditModal(id) {
            const activity = activities.find(a => a.id === id);
            if (activity) {
                // Set form for edit
                isEditMode = true;
                currentActivityId = id;
                document.getElementById('modalTitle').textContent = 'Edit Activity';
                document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Update Activity';
                document.getElementById('methodField').innerHTML = '@method("PUT")';
                
                // Populate form fields with existing data
                document.getElementById('form_title').value = activity.title || '';
                document.getElementById('form_category').value = activity.category || '';
                document.getElementById('form_activity_date').value = activity.activity_date || '';
                document.getElementById('form_status').value = activity.status || 'upcoming';
                document.getElementById('form_description').value = activity.description || '';
                
                // Show existing images
                clearImagePreviews();
                if (activity.images && activity.images.length > 0) {
                    showExistingImages(activity.images);
                }
                
                const modal = document.getElementById('activityModal');
                modal.classList.remove('hidden');
                modal.style.display = 'flex';
            }
        }

        function closeModal() {
            const modal = document.getElementById('activityModal');
            modal.classList.add('hidden');
            modal.style.display = 'none';
            clearImagePreviews();
            selectedImages = [];
            currentActivityId = null;
            isEditMode = false;
        }

        function clearFormFields() {
            document.getElementById('form_title').value = '';
            document.getElementById('form_category').value = '';
            document.getElementById('form_activity_date').value = '';
            document.getElementById('form_status').value = 'upcoming';
            document.getElementById('form_description').value = '';
            document.getElementById('form_images').value = '';
            clearImagePreviews();
            selectedImages = [];
        }

        function clearImagePreviews() {
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = '';
            container.style.display = 'none';
            hideUploadProgress();
        }

        function showImagePreviews() {
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = '';
            
            selectedImages.forEach((file, index) => {
                const previewDiv = document.createElement('div');
                previewDiv.className = 'relative';
                previewDiv.innerHTML = `
                    <div class="aspect-square bg-gray-200 dark:bg-gray-600 rounded-lg overflow-hidden border border-gray-300 dark:border-gray-500">
                        <img src="${file.url}" alt="Preview ${index + 1}" class="w-full h-full object-cover">
                    </div>
                    <button type="button" onclick="removeImage(${index})" 
                            class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm hover:bg-red-600 shadow-lg transition-colors">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="absolute bottom-1 left-1 right-1">
                        <div class="bg-black bg-opacity-60 text-white text-xs px-2 py-1 rounded text-center truncate">
                            ${file.file.name.length > 15 ? file.file.name.substring(0, 15) + '...' : file.file.name}
                        </div>
                    </div>
                `;
                container.appendChild(previewDiv);
            });
            
            if (selectedImages.length > 0) {
                container.style.display = 'block';
            }
        }

        function showExistingImages(images) {
            const container = document.getElementById('imagePreviewContainer');
            container.innerHTML = '';
            
            images.forEach((image, index) => {
                const previewDiv = document.createElement('div');
                previewDiv.className = 'relative';
                previewDiv.innerHTML = `
                    <div class="aspect-square bg-gray-200 dark:bg-gray-600 rounded-lg overflow-hidden border border-gray-300 dark:border-gray-500">
                        <img src="{{ asset('storage/') }}/${image.image_path}" alt="Existing ${index + 1}" class="w-full h-full object-cover">
                    </div>
                    <button type="button" onclick="deleteExistingImage(${image.id})" 
                            class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-8 h-8 flex items-center justify-center text-sm hover:bg-red-600 shadow-lg transition-colors">
                        <i class="fas fa-trash"></i>
                    </button>
                    <div class="absolute bottom-1 left-1 right-1">
                        <div class="bg-blue-500 bg-opacity-80 text-white text-xs px-2 py-1 rounded text-center">
                            Saved
                        </div>
                    </div>
                `;
                container.appendChild(previewDiv);
            });
            
            if (images.length > 0) {
                container.style.display = 'block';
            }
        }

        async function deleteExistingImage(imageId) {
            if (!confirm('Are you sure you want to delete this image?')) {
                return;
            }

            try {
                const response = await fetch(`/admin/activities/delete-image/${imageId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                });

                if (response.ok) {
                    // Refresh the existing images display
                    const activity = activities.find(a => a.id === currentActivityId);
                    if (activity) {
                        // Remove the deleted image from the activity data
                        activity.images = activity.images.filter(img => img.id !== imageId);
                        showExistingImages(activity.images);
                    }
                } else {
                    alert('Failed to delete image. Please try again.');
                }
            } catch (error) {
                console.error('Error deleting image:', error);
                alert('An error occurred while deleting the image.');
            }
        }

        function removeImage(index) {
            selectedImages.splice(index, 1);
            if (selectedImages.length === 0) {
                clearImagePreviews();
            } else {
                showImagePreviews();
            }
        }

        function showUploadProgress() {
            document.getElementById('uploadProgress').style.display = 'block';
        }

        function hideUploadProgress() {
            document.getElementById('uploadProgress').style.display = 'none';
            document.getElementById('uploadProgressBar').style.width = '0%';
            document.getElementById('uploadPercentage').textContent = '0%';
        }

        function updateUploadProgress(percentage) {
            document.getElementById('uploadProgressBar').style.width = percentage + '%';
            document.getElementById('uploadPercentage').textContent = percentage + '%';
        }

        // Handle image selection
        document.getElementById('form_images').addEventListener('change', function(e) {
            const files = Array.from(e.target.files);
            
            files.forEach(file => {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        selectedImages.push({
                            file: file,
                            url: e.target.result
                        });
                        showImagePreviews();
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

        // Handle form submission
        document.getElementById('activityForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const submitBtn = document.getElementById('submitBtn');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Processing...';
            try {
                if (isEditMode) {
                    // For edit mode, update activity first
                    const formData = new FormData(this);
                    const response = await fetch(`/admin/activities/${currentActivityId}`, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    });
                    if (!response.ok) {
                        throw new Error('Failed to update activity');
                    }
                    // If there are new images, upload them
                    if (selectedImages.length > 0) {
                        showUploadProgress();
                        for (let i = 0; i < selectedImages.length; i++) {
                            const imageData = new FormData();
                            imageData.append('image', selectedImages[i].file);
                            imageData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                            const uploadResponse = await fetch(`/admin/activities/${currentActivityId}/upload-image`, {
                                method: 'POST',
                                body: imageData
                            });
                            // Update progress
                            const progress = Math.round(((i + 1) / selectedImages.length) * 100);
                            updateUploadProgress(progress);
                        }
                    }
                    location.reload();
                } else {
                    // For create mode, first create activity then upload images
                    const basicData = new FormData();
                    basicData.append('title', document.getElementById('form_title').value);
                    basicData.append('category', document.getElementById('form_category').value);
                    basicData.append('activity_date', document.getElementById('form_activity_date').value);
                    basicData.append('status', document.getElementById('form_status').value);
                    basicData.append('description', document.getElementById('form_description').value);
                    basicData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                    // Create activity first
                    const createResponse = await fetch('/admin/activities', {
                        method: 'POST',
                        body: basicData
                    });
                    
                    if (!createResponse.ok) {
                        throw new Error('Failed to create activity');
                    }
                    
                    const createResult = await createResponse.json();
                    const activityId = createResult.activity_id;
                    
                    // Upload images if any
                    if (selectedImages.length > 0) {
                        showUploadProgress();
                        
                        for (let i = 0; i < selectedImages.length; i++) {
                            const imageData = new FormData();
                            imageData.append('image', selectedImages[i].file);
                            imageData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
                            
                            const uploadResponse = await fetch(`/admin/activities/${activityId}/upload-image`, {
                                method: 'POST',
                                body: imageData
                            });
                            
                            if (!uploadResponse.ok) {
                                console.error(`Failed to upload image ${i + 1}`);
                            }
                            
                            // Update progress
                            const progress = Math.round(((i + 1) / selectedImages.length) * 100);
                            updateUploadProgress(progress);
                        }
                    }
                    
                    // Reload page to show updated data
                    location.reload();
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalBtnText;
                hideUploadProgress();
            }
        });

        // Drag and drop functionality
        const uploadArea = document.getElementById('uploadArea');
        
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });
        
        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }
        
        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });
        
        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });
        
        function highlight(e) {
            uploadArea.classList.add('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900');
        }
        
        function unhighlight(e) {
            uploadArea.classList.remove('border-blue-500', 'bg-blue-50', 'dark:bg-blue-900');
        }
        
        uploadArea.addEventListener('drop', handleDrop, false);
        
        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = Array.from(dt.files);
            
            files.forEach(file => {
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        selectedImages.push({
                            file: file,
                            url: e.target.result
                        });
                        showImagePreviews();
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        // Close modal when clicking outside
        document.getElementById('activityModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
