<div>
    <h3 class="font-bold text-lg">Edit Informasi Pengguna</h3>
    <form wire:submit.prevent='update'>
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Nama Lengkap</span>
            </label>
            <input type="text" wire:model='name' name="name" id="name" placeholder="Nama Lengkap"
                class="input input-bordered w-full @error('name') is-invalid input-error @enderror" />
            @error('name')
            <span class="invalid-feedback">
                <strong class="text-error">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Username</span>
            </label>
            <input type="text" wire:model='username' name="username" id="username" placeholder="Username"
                class="input input-bordered w-full @error('username') is-invalid input-error @enderror" />
            @error('username')
            <span class="invalid-feedback">
                <strong class="text-error">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-control w-full md:w-1/2">
            <label class="label">
                <span class="label-text">Role</span>
            </label>
            <select class="select select-bordered @error('role') select-error @enderror" wire:model='role' id="role"
                name="role">
                <option value="" selected>Pilih salah satu</option>
                <option value="1">Admin</option>
                <option value="2">Operator</option>
            </select>
            @error('role')
            <span class="invalid-feedback">
                <strong class="text-error">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-control w-full md:w-1/2">
            <label class="label">
                <span class="label-text">Status Akun</span>
            </label>
            <select class="select select-bordered @error('is_active') select-error @enderror" wire:model='is_active'
                id="is_active" name="is_active">
                <option value="" selected>Pilih salah satu</option>
                <option value="0">Tidak Aktif</option>
                <option value="1">Aktif</option>
            </select>
            @error('is_active')
            <span class="invalid-feedback">
                <strong class="text-error">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="btn btn-sm justify-end btn-primary text-white text-sm mt-2 md:btn-md md:text-md">Simpan</button>
        </div>
    </form>
</div>