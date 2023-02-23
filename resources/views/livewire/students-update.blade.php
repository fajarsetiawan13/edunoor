<div>
    <h3 class="font-bold text-lg">Edit Siswa</h3>
    <form wire:submit.prevent='update'>
        <div class="form-control w-full">
            
            <input type="text" wire:model='student_id' id="id" name="id" value="">
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
                <span class="label-text">Nomor Induk Siswa Nasional</span>
            </label>
            <input type="text" wire:model='nisn' name="nisn" id="nisn" placeholder="NISN"
                class="input input-bordered w-full @error('nisn') is-invalid input-error @enderror" />
            @error('nisn')
            <span class="invalid-feedback">
                <strong class="text-error">{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-control w-full md:w-1/2">
            <label class="label">
                <span class="label-text">Asal Sekolah</span>
            </label>
            <select class="select select-bordered @error('school_id') select-error @enderror" wire:model='school_id'
                id="school_id" name="school_id">
                <option value="" selected>Pilih salah satu</option>
                @foreach ($schools as $sch)
                <option value="{{ $sch->id }}">{{ $sch->name }}</option>
                @endforeach
            </select>
            @error('school_id')
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