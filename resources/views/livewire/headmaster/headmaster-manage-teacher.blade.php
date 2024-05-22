<div class="headmaster_manage_teacher">
    <div class="nav">
        <div class="nav_item"  wire:click='changeNavIndex({{0}})'>
            <div class="{{ $currentNavIndex == 0 ? 'tag active' : 'tag' }}">
                Người Dùng
            </div>
        </div>
        <div class="nav_item" wire:click='changeNavIndex({{1}})'>
            <div class="{{ $currentNavIndex == 1 ? 'tag active' : 'tag' }}">
                Giáo Viên
            </div>
        </div>
    </div>

    <div class="search_box">
        <input type="text" placeholder="Search" wire:model="searchText" wire:keypress='search'>
        <i wire:click='search' class="fa-solid fa-magnifying-glass"></i>
    </div>
    <div class="table_of_user">
        <table class="user_table">
            <tr>
                <th>STT</th>
                <th>Tên đăng nhập</th>
                <th>Email</th>
                <th>Chức vụ</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Thao tác</th>
            </tr>
            @if ($currentNavIndex == 0)
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <button class="edit_button" wire:click='changeRole({{ $user->id }})'>Áp dụng chức vụ GV</button>
                        </td>
                    </tr>
                @endforeach
            @endif

            @if ($currentNavIndex == 1)
                @foreach ($teachers as $user)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td>
                            <button class="delete_button" wire:click='changeRole({{ $user->id }})'>Xoá bỏ chức vụ GV</button>
                        </td>
                    </tr>
                @endforeach
            @endif

        </table>
    </div>
</div>
