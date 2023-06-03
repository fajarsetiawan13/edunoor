<div>
    <h3 class="font-bold text-lg">Edit Informasi Sekolah</h3>
    <form wire:submit.prevent='update'>
        <label class="label">
            <span class="label-text text-muted">**Isian Dapat Dikosongkan</span>
        </label>
        {{-- <div class="form-control">
            <input type="hidden" wire:model='schoolId' id="id" name="id" hidden>
        </div> --}}
        <div class="flex flex-col gap-2 md:flex-row">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Nama Sekolah</span>
                </label>
                <input type="text" wire:model='name' name="name" id="name" placeholder="Nama Sekolah"
                    class="input input-bordered w-full @error('name') is-invalid input-error @enderror" />
                @error('name')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Nomor Pokok Sekolah Nasional</span>
                </label>
                <input type="text" wire:model='npsn' name="npsn" id="npsn" placeholder="NPSN"
                    class="input input-bordered w-full @error('npsn') is-invalid input-error @enderror" />
                @error('npsn')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Bidang Pendidikan</span>
                </label>
                <select class="select select-bordered @error('bp') select-error @enderror" wire:model='bp' id="bp"
                    name="bp">
                    <option value="" selected>Pilih salah satu</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    {{-- <option value="SMK">SMK</option>
                    <option value="SLB">SLB</option> --}}
                </select>
                @error('bp')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Status</span>
                </label>
                <select class="select select-bordered @error('status') select-error @enderror" wire:model='status'
                    id="status" name="status">
                    <option value="" selected>Pilih salah satu</option>
                    <option value="Negeri">Negeri</option>
                    <option value="Swasta">Swasta</option>
                </select>
                @error('status')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Status Kepemilikan</span>
                </label>
                <input type="text" wire:model='status_kepemilikan' name="status_kepemilikan" id="status_kepemilikan"
                    placeholder="Status Kepemilikan"
                    class="input input-bordered w-full @error('status_kepemilikan') is-invalid input-error @enderror" />
                @error('status_kepemilikan')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Kepala Sekolah</span>
                </label>
                <input type="text" wire:model='kepsek' name="kepsek" id="kepsek" placeholder="Kepala Sekolah"
                    class="input input-bordered w-full @error('kepsek') is-invalid input-error @enderror" />
                @error('kepsek')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Akreditasi</span>
                </label>
                <input type="text" wire:model='akreditasi' name="akreditasi" id="akreditasi" placeholder="Akreditasi"
                    class="input input-bordered w-full @error('akreditasi') is-invalid input-error @enderror" />
                @error('akreditasi')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">Kurikulum</span>
                </label>
                <input type="text" wire:model='kurikulum' name="kurikulum" id="kurikulum" placeholder="Kurikulum"
                    class="input input-bordered w-full @error('kurikulum') is-invalid input-error @enderror" />
                @error('kurikulum')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">**SK Pendirian</span>
                </label>
                <input type="text" wire:model='sk_pendirian' name="sk_pendirian" id="sk_pendirian"
                    placeholder="SK Pendirian"
                    class="input input-bordered w-full @error('sk_pendirian') is-invalid input-error @enderror" />
                @error('sk_pendirian')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">**SK Tanggal Pendirian</span>
                </label>
                <input type="date" wire:model='sk_pendirian_tanggal' name="sk_pendirian_tanggal"
                    id="sk_pendirian_tanggal" placeholder="SK Tanggal Pendirian"
                    class="input input-bordered w-full @error('sk_pendirian_tanggal') is-invalid input-error @enderror" />
                @error('sk_pendirian_tanggal')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="flex flex-col gap-2 md:flex-row">
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">**SK Ijin Operasional</span>
                </label>
                <input type="text" wire:model='sk_ijin_operasional' name="sk_ijin_operasional" id="sk_ijin_operasional"
                    placeholder="SK Ijin Operasional"
                    class="input input-bordered w-full @error('sk_ijin_operasional') is-invalid input-error @enderror" />
                @error('sk_ijin_operasional')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-control w-full">
                <label class="label">
                    <span class="label-text">**SK Tanggal Ijin Operasional</span>
                </label>
                <input type="date" wire:model='sk_ijin_operasional_tanggal' name="sk_ijin_operasional_tanggal"
                    id="sk_ijin_operasional_tanggal" placeholder="SK Tanggal Ijin Operasional"
                    class="input input-bordered w-full @error('sk_ijin_operasional_tanggal') is-invalid input-error @enderror" />
                @error('sk_ijin_operasional_tanggal')
                <span class="invalid-feedback">
                    <strong class="text-error">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit"
                class="btn btn-sm justify-end btn-primary text-white text-sm mt-2 md:btn-md md:text-md">Simpan</button>
        </div>
    </form>
</div>