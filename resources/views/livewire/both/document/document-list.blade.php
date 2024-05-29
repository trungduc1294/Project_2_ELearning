<div>
    <h1>Danh sách tài liệu {{ $course_id }} - {{ $lesson_id }}</h1>

    <ul>
        @foreach ($documents as $document)
            <li>
                <a href="{{ Storage::url($document->file_path) }}" target="_blank">{{ $document->title }}</a>
            </li>
        @endforeach
    </ul>
</div>
