<div>
    @if(session()->has('success'))
    <div class="alert alert-success shadow-lg mb-3">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm md:text-md">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    <label class="btn btn-sm btn-primary w-full md:w-1/3 md:btn-md text-white mb-3" for="user-create">Tambah
        Pengguna Baru</label>
    <div class="flex flex-row gap-2 justify-between mb-3">
        <select wire:model='paginate' class="select select-sm select-bordered w-full max-w-[75px] md:select-md">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="20">20</option>
        </select>
        <input wire:model='search' type="text" placeholder="Kolom Pencarian…"
            class="input input-sm input-bordered w-full max-w-sm md:max-w-md md:input-md" />
    </div>

    <table class="table w-full table-fixed mb-3">
        <thead>
            <tr>
                <th scope="col" class="w-1/12 text-left">#</th>
                <th scope="col" class="w-2/12 truncate text-left">Nama</th>
                <th scope="col" class="w-2/12 truncate text-left">Username</th>
                <th scope="col" class="w-2/12 truncate text-left">Status</th>
                <th scope="col" class="w-2/12 truncate text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
            <tr class="hover">
                <td>{{ $loop->iteration }}</td>
                <td class="truncate">{{ $u->name }}</td>
                <td class="truncate">{{ $u->username }}</td>
                <td>{{ ($u->is_active == 1) ? 'aktif' : 'tidak aktif' }}</td>
                <td>
                    <div class="dropdown dropdown-left">
                        <label tabindex="0" class="btn btn-xs md:btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" width="20" height="20" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;">
                                <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                            </svg>
                        </label>
                        <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                            <li>
                                <label wire:click='getUser({{ $u->id }})' class="modal-btn" for="user-update">Edit Pengguna</label>
                            </li>
                            <li>
                                <a onclick="return confirm('Anda ingin menghapus pengguna?')  || event.stopImmediatePropagation()" wire:click='destroy({{ $u->id }})'>Hapus Pengguna
                                </a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links() }}

    <input type="checkbox" id="user-update" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <label for="user-update" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            @livewire('users-update')
        </div>
    </div>

    <input type="checkbox" id="user-create" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <label for="user-create" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            @livewire('users-create')
        </div>
    </div>
</div>