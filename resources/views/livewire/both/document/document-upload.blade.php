<div>
    Livewire upload file {{ $course_id }} - {{ $lesson_id }}
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="save">
        <div>
            <label for="title">Tiêu đề:</label>
            <input type="text" id="title" wire:model="title">
            @error('title') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="file">Chọn tệp:</label>
            <input type="file" id="file" wire:model="file">
            @error('file') <span class="error">{{ $message }}</span> @enderror
        </div>

        <button type="submit">Tải lên</button>
    </form>
</div>
