<div>
    <h3 class="font-bold text-lg">Tambah Pertanyaan Baru</h3>
    <form wire:submit.prevent='store'>
        <div class="form-control w-full">
            <label class="label">
                <span class="label-text">Pertanyaan</span>
            </label>
            <input type="text" wire:model='question' name="question" id="question" placeholder="Teks Pertanyaan"
                class="input input-bordered w-full @error('question') is-invalid input-error @enderror" />
            @error('question')
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