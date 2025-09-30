@extends('layout.admin')

@section('admin-content')
    <div class="container mx-auto py-4 sm:py-8">
        <!-- Header Section -->
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-6 sm:mb-8 space-y-4 sm:space-y-0">
            <div>
                <h1 class="text-xl sm:text-2xl lg:text-3xl font-bold text-blue-700 dark:text-blue-300">Solutions</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Manage service solutions and offerings</p>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3 sm:gap-4">
                <div class="bg-blue-50 dark:bg-blue-900 px-3 py-2 rounded-lg">
                    <span class="text-sm font-medium text-blue-700 dark:text-blue-300">Total: {{ count($solutions) }}</span>
                </div>
                <button onclick="openCreateModal()"
                    class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-semibold shadow-lg hover:from-blue-700 hover:to-blue-800 transition-all duration-200 transform hover:scale-105">
                    <i class="fas fa-plus mr-2"></i>
                    <span class="hidden sm:inline">Add New</span>
                    <span class="sm:hidden">New Solution</span>
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
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">
                                    #</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">
                                    Solution Details</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">
                                    Pricing</th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-blue-700 dark:text-blue-300 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($solutions as $solution)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-100">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="space-y-2">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                                {{ $solution->title }}</div>
                                            @if ($solution->category)
                                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                                    <i class="fas fa-tag mr-2"></i>{{ $solution->category }}
                                                </div>
                                            @endif
                                            @if ($solution->description)
                                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                                    <i
                                                        class="fas fa-file-text mr-2"></i>{{ \Illuminate\Support\Str::limit($solution->description, 100) }}
                                                </div>
                                            @endif
                                            <div class="text-xs text-gray-500">📅
                                                {{ \Carbon\Carbon::parse($solution->created_at)->format('M d, Y H:i') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($solution->price)
                                            <div class="flex items-center">
                                                <i class="fas fa-dollar-sign text-green-600 mr-2"></i>
                                                <span
                                                    class="text-lg font-semibold text-green-600 dark:text-green-400">${{ number_format($solution->price, 2) }}</span>
                                            </div>
                                        @else
                                            <div class="flex items-center">
                                                <i class="fas fa-handshake text-blue-600 mr-2"></i>
                                                <span
                                                    class="text-sm font-medium text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900 px-2 py-1 rounded">Quote</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <button onclick="openEditModal({{ $solution->id }})"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                                <i class="fas fa-edit mr-1"></i>
                                                Edit
                                            </button>
                                            <form action="{{ route('admin.solutions.delete', $solution->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Are you sure?')"
                                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
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
                    @foreach ($solutions as $solution)
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 border border-gray-200 dark:border-gray-600">
                            <!-- Header -->
                            <div class="flex justify-between items-start mb-3">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                                        {{ $solution->title }}</h3>
                                    @if ($solution->category)
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            <i class="fas fa-tag mr-1"></i>{{ $solution->category }}
                                        </p>
                                    @endif
                                </div>
                                <div class="ml-3">
                                    @if ($solution->price)
                                        <div class="flex items-center">
                                            <i class="fas fa-dollar-sign text-green-600 mr-1"></i>
                                            <span
                                                class="text-lg font-semibold text-green-600 dark:text-green-400">${{ number_format($solution->price, 2) }}</span>
                                        </div>
                                    @else
                                        <div class="flex items-center">
                                            <i class="fas fa-handshake text-blue-600 mr-1"></i>
                                            <span
                                                class="text-sm font-medium text-blue-600 dark:text-blue-400 bg-blue-100 dark:bg-blue-900 px-2 py-1 rounded">Quote</span>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Details -->
                            <div class="space-y-2 mb-4">
                                @if ($solution->description)
                                    <div class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                                        <i class="fas fa-file-text mr-2"></i>
                                        {{ \Illuminate\Support\Str::limit($solution->description, 80) }}
                                    </div>
                                @endif
                                <div class="flex items-center text-xs text-gray-500 mt-2">
                                    <i class="fas fa-calendar w-4 mr-2"></i>
                                    {{ \Carbon\Carbon::parse($solution->created_at)->format('M d, Y H:i') }}
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex space-x-3">
                                <button onclick="openEditModal({{ $solution->id }})"
                                    class="flex-1 inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                    <i class="fas fa-edit mr-2"></i>
                                    Edit
                                </button>
                                <form action="{{ route('admin.solutions.delete', $solution->id) }}" method="POST"
                                    class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')"
                                        class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors duration-200">
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
    <div id="solutionModal"
        class="fixed inset-0 bg-transparent backdrop-blur-md hidden overflow-y-auto h-full w-full z-50 p-4"
        style="align-items: center; justify-content: center;">
        <div class="relative w-full max-w-4xl max-h-[90vh] overflow-y-auto bg-white dark:bg-gray-800 rounded-xl shadow-2xl">
            <div
                class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 px-6 py-4 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <h3 id="modalTitle" class="text-xl font-semibold text-gray-900 dark:text-white">Add New Solution</h3>
                    <button onclick="closeModal()"
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-200">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <form id="solutionForm" method="POST" class="px-6 py-4">
                @csrf
                <div id="methodField"></div>
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Solution Title *</label>
                        <input type="text" id="form_title" name="title"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            required />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Category</label>
                        <input type="text" id="form_category" name="category"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            placeholder="e.g. Web Development, Consulting, Support" />
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Price</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input type="number" id="form_price" name="price" step="0.01" min="0"
                                class="w-full pl-8 pr-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                placeholder="0.00" />
                        </div>
                        <p class="text-xs text-gray-500">Leave empty to show "Quote" instead of price</p>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Service Type</label>
                        <select id="form_service_type" name="service_type"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200">
                            <option value="">Select Service Type</option>
                            <option value="One-time">One-time Service</option>
                            <option value="Subscription">Subscription</option>
                            <option value="Contract">Contract Based</option>
                            <option value="Custom">Custom Solution</option>
                        </select>
                    </div>
                    <div class="lg:col-span-2 space-y-2">
                        <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300">Description</label>
                        <textarea id="form_description" name="description" rows="4"
                            class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            placeholder="Describe the solution, features, benefits..."></textarea>
                    </div>
                </div>
            </form>

            <!-- Modal Footer -->
            <div
                class="sticky bottom-0 bg-gray-50 dark:bg-gray-700 px-6 py-4 border-t border-gray-200 dark:border-gray-600 rounded-b-xl">
                <div class="flex flex-col sm:flex-row justify-end space-y-2 sm:space-y-0 sm:space-x-3">
                    <button type="button" onclick="closeModal()"
                        class="w-full sm:w-auto px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-400 dark:hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" form="solutionForm" id="submitBtn"
                        class="w-full sm:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white rounded-lg font-medium hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i>
                        Add Solution
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const solutions = @json($solutions);

        function openCreateModal() {
            // Reset form for create
            document.getElementById('modalTitle').textContent = 'Add New Solution';
            document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Add Solution';
            document.getElementById('methodField').innerHTML = '';
            document.getElementById('solutionForm').action = '{{ route('admin.solutions.create') }}';

            // Clear all form fields
            clearFormFields();

            const modal = document.getElementById('solutionModal');
            modal.classList.remove('hidden');
            modal.style.display = 'flex';
        }

        function openEditModal(id) {
            const solution = solutions.find(s => s.id === id);
            if (solution) {
                // Set form for edit
                document.getElementById('modalTitle').textContent = 'Edit Solution';
                document.getElementById('submitBtn').innerHTML = '<i class="fas fa-save mr-2"></i>Update Solution';
                document.getElementById('methodField').innerHTML = '@method('PUT')';
                document.getElementById('solutionForm').action = `/admin/solutions/${id}`;

                // Populate form fields with existing data
                document.getElementById('form_title').value = solution.title || '';
                document.getElementById('form_category').value = solution.category || '';
                document.getElementById('form_price').value = solution.price || '';
                document.getElementById('form_service_type').value = solution.service_type || '';
                document.getElementById('form_description').value = solution.description || '';

                const modal = document.getElementById('solutionModal');
                modal.classList.remove('hidden');
                modal.style.display = 'flex';
            }
        }

        function closeModal() {
            const modal = document.getElementById('solutionModal');
            modal.classList.add('hidden');
            modal.style.display = 'none';
        }

        function clearFormFields() {
            document.getElementById('form_title').value = '';
            document.getElementById('form_category').value = '';
            document.getElementById('form_price').value = '';
            document.getElementById('form_service_type').value = '';
            document.getElementById('form_description').value = '';
        }

        // Close modal when clicking outside
        document.getElementById('solutionModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
@endsection
