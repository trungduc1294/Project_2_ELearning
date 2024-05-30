<div class="document_list mx-4 mt-10 text-2xl font-bold border-t-2 border-dashed border-gray-400">
    <h1 class="py-4">Danh sách tài liệu :</h1>

    {{-- <ul>
        @foreach ($documents as $document)
            <li>
                <a href="{{ Storage::url($document->file_path) }}" target="_blank">{{ $document->title }}</a>
            </li>
        @endforeach
    </ul> --}}

    <table class="w-full text-lg">
        <thead class="border border-gray-400">
            <tr class="">
                <th class="py-2">STT</th>
                <th>Tiêu đề</th>
                <th>File</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody class="border border-gray-400 text-sm text-center">
            @foreach ($documents as $document)
                <tr class="">
                    <td class="py-2">{{ $loop->index + 1 }}</td>
                    <td>{{ $document->title }}</td>
                    <td>
                        <a href="{{ Storage::url($document->file_path) }}" target="_blank">{{ $document->file_path }}</a>
                    </td>
                    <td>
                        <button wire:click="delete({{ $document->id }})" class="px-6 py-1 bg-red-500 rounded-md">Xóa</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
