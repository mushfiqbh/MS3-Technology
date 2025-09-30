@extends('layout.admin')

@section('admin-content')
    <div class="container mx-auto py-4 sm:py-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 sm:mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-blue-700 dark:text-blue-300">Clients</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage client portfolio and partnerships</p>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                <div class="bg-blue-50 dark:bg-blue-900 px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Total: {{ count($clients) }}</span>
                </div>
                <button onclick="openCreateModal()" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>
                    <span class="hidden sm:inline">Add New</span>
                    <span class="sm:hidden">New Client</span>
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
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Client Details</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Logo</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($clients as $client)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="space-y-2">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">{{ $client->name }}</div>
                                        @if($client->url)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-globe mr-2"></i>
                                            <a href="{{ $client->url }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">{{ $client->url }}</a>
                                        </div>
                                        @endif
                                        @if($client->note)
                                        <div class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-sticky-note mr-2"></i>
                                            {{ \Illuminate\Support\Str::limit($client->note, 100) }}
                                        </div>
                                        @endif
                                        <div class="text-xs text-gray-500">📅 {{ \Carbon\Carbon::parse($client->created_at)->format('M d, Y H:i') }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($client->logo)
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="w-16 h-16 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-600">
                                    @else
                                        <div class="w-16 h-16 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400 text-xl"></i>
                                        </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2">
                                        <button onclick="openEditModal({{ $client->id }})" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                            <i class="fas fa-edit mr-1"></i>
                                            Edit
                                        </button>
                                        <form action="{{ route('admin.clients.delete', $client->id) }}" method="POST" class="inline">
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
                    @foreach ($clients as $client)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                        <!-- Header -->
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex-1">
                                <div class="flex items-center space-x-3 mb-2">
                                    @if($client->logo)
                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="w-12 h-12 object-cover rounded-lg border-2 border-gray-200 dark:border-gray-500">
                                    @else
                                        <div class="w-12 h-12 bg-gray-200 dark:bg-gray-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-image text-gray-400"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $client->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="space-y-2 mb-4">
                            @if($client->url)
                            <div class="flex items-center text-sm text-gray-600 dark:text-gray-400">
                                <i class="fas fa-globe w-4 mr-2"></i>
                                <a href="{{ $client->url }}" target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline break-all">{{ $client->url }}</a>
                            </div>
                            @endif
                            @if($client->note)
                            <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                <i class="fas fa-sticky-note mr-2"></i>
                                {{ \Illuminate\Support\Str::limit($client->note, 80) }}
                            </div>
                            @endif
                            <div class="flex items-center text-xs text-gray-500 mt-2">
                                <i class="fas fa-calendar w-4 mr-2"></i>
                                {{ \Carbon\Carbon::parse($client->created_at)->format('M d, Y H:i') }}
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex space-x-3">
                            <button onclick="openEditModal({{ $client->id }})" class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <i class="fas fa-edit mr-2"></i>
                                Edit
                            </button>
                            <form action="{{ route('admin.clients.delete', $client->id) }}" method="POST" class="flex-1">
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
    <div id="clientModal" class="fixed inset-0 bg-transparent backdrop-blur-md hidden overflow-y-auto h-full w-full z-50 p-4" style="align-items: center; justify-content: center;">
        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white dark:bg-gray-800 rounded-xl shadow-2xl">
            <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-white">Add New Client</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <form id="clientForm" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                @csrf
                <div id="methodField"></div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Client Name *</label>
                        <input type="text" id="form_name" name="name" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" required />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Website URL</label>
                        <input type="url" id="form_url" name="url" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="https://example.com" />
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Notes</label>
                        <textarea id="form_note" name="note" rows="3" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" placeholder="Add any additional notes about the client..."></textarea>
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Client Logo</label>
                        <div class="flex items-center space-x-4">
                            <div id="logoPreview" class="w-20 h-20 bg-gray-200 dark:bg-gray-600 rounded-lg border-2 border-gray-300 dark:border-gray-500 items-center justify-center overflow-hidden" style="display: none;">
                                <img id="previewImage" src="" alt="Logo Preview" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <input type="file" id="form_logo" name="logo" accept="image/*" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200" />
                                <p class="text-sm text-gray-500 mt-1">Upload client logo (PNG, JPG, JPEG)</p>
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
                    <button type="submit" form="clientForm" id="submitBtn" class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i>
                        Add Client
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const clients = @json($clients);

        function openCreateModal() {
            // Reset form for create
            document.getElementById('modalTitle').textContent = 'Add New Client';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Add Client';
            document.getElementById('methodField').innerHTML = '';
            document.getElementById('clientForm').action = '{{ route("admin.clients.create") }}';
            
            // Clear all form fields
            clearFormFields();
            
            const modal = document.getElementById('clientModal');
            modal.classList.remove('hidden');
            modal.style.display = 'flex';
        }

        function openEditModal(id) {
            const client = clients.find(c => c.id === id);
            if (client) {
                // Set form for edit
                document.getElementById('modalTitle').textContent = 'Edit Client';
                document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Update Client';
                document.getElementById('methodField').innerHTML = '@method("PUT")';
                document.getElementById('clientForm').action = `/admin/clients/${id}`;
                
                // Populate form fields with existing data
                document.getElementById('form_name').value = client.name || '';
                document.getElementById('form_url').value = client.url || '';
                document.getElementById('form_note').value = client.note || '';
                
                // Show existing logo if available
                if (client.logo) {
                    showLogoPreview(`{{ asset('storage/') }}/${client.logo}`);
                } else {
                    hideLogoPreview();
                }
                
                const modal = document.getElementById('clientModal');
                modal.classList.remove('hidden');
                modal.style.display = 'flex';
            }
        }

        function closeModal() {
            const modal = document.getElementById('clientModal');
            modal.classList.add('hidden');
            modal.style.display = 'none';
            hideLogoPreview();
        }

        function clearFormFields() {
            document.getElementById('form_name').value = '';
            document.getElementById('form_url').value = '';
            document.getElementById('form_note').value = '';
            document.getElementById('form_logo').value = '';
            hideLogoPreview();
        }

        function showLogoPreview(src) {
            const preview = document.getElementById('logoPreview');
            const image = document.getElementById('previewImage');
            image.src = src;
            preview.style.display = 'flex';
        }

        function hideLogoPreview() {
            const preview = document.getElementById('logoPreview');
            preview.style.display = 'none';
        }

        // Logo preview on file selection
        document.getElementById('form_logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    showLogoPreview(e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                hideLogoPreview();
            }
        });

        // Close modal when clicking outside
        document.getElementById('clientModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
