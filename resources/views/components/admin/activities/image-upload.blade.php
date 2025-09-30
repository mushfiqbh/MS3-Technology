<div class="space-y-4">
    <!-- Image Upload Area -->
    <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center">
        <input type="file" id="form_images" name="images[]" accept="image/*" multiple class="hidden" />
        <div id="uploadArea" class="cursor-pointer" onclick="document.getElementById('form_images').click()">
            <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
            <p class="text-lg font-medium text-gray-700 dark:text-gray-300 mb-2">Upload Activity Images</p>
            <p class="text-sm text-gray-500">Click to select multiple images or drag and drop</p>
            <p class="text-xs text-gray-400 mt-1">PNG, JPG, JPEG, GIF, WEBP (Max 5MB each)</p>
        </div>
    </div>
    <!-- Image Previews -->
    <div id="imagePreviewContainer" class="grid grid-cols-2 sm:grid-cols-3 gap-3" style="display: none;">
        <!-- Image previews will be dynamically added here -->
    </div>
    <!-- Upload Progress -->
    <div id="uploadProgress" class="space-y-2" style="display: none;">
        <div class="flex justify-between items-center">
            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Uploading Images...</span>
            <span id="uploadPercentage" class="text-sm text-gray-500">0%</span>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div id="uploadProgressBar" class="bg-blue-600 h-2 rounded-full transition-all duration-300" style="width: 0%"></div>
        </div>
    </div>
</div>
