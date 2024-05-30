<div class="document_upload mx-4">
    <h1 class="text-2xl font-bold mb-2">
        Tải lên tài liệu cho bài giảng : "{{ $lesson->name }}"
    </h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save" class="mt-6">
        <div class="form-input flex gap-4">
            <div class="form-group">
                <label for="title">Tiêu đề tài liệu:</label>
                <input type="text" id="title" class="bg-transparent border-b border-gray-300 w-[500px] outline-none text-white" wire:model="title">
                @error('title') <span class="error">{{ $message }}</span> @enderror
            </div>
    
            <div>
                <input type="file" id="file" wire:model="file">
                @error('file') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>

        <button type="submit" class="px-6 py-1 bg-blue-500 rounded-md mt-2">Tải lên</button>
    </form>
</div>
