<div>
    <form wire:submit.prevent='store'>
        @if ($current_step == 1)
        <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-one">
            <div class="flex justify-center bg-primary text-white py-0">
                <span class="btn btn-ghost normal-case text-lg">Profil Sekolah (1/6)</span>
            </div>
            <div class="card-body">
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">Nama Sekolah</span>
                    <select class="select select-bordered @error('school_id') select-error @enderror" wire:model="school_id">
                        <option value="" >Pilih salah satu</option>
                        @foreach($schools as $s)
                        <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                    @error('school_id')
                    <span class="invalid-feedback">
                        <strong class="text-error">{{ $message }}</strong>
                    </span>
                    @enderror
               </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">Alamat Sekolah</span>
                    <textarea class="textarea textarea-bordered @error('school_address') textarea-error @enderror" wire:model="school_address"></textarea>
                    @error('school_address')
                    <span class="invalid-feedback">
                        <strong class="text-error">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">Jenjang Pendidikan</span>
                    <select class="select select-bordered @error('school_bp') select-error @enderror" wire:model="school_bp">
                        <option value="" selected>Pilih salah satu</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                    </select>
                    @error('school_bp')
                    <span class="invalid-feedback">
                        <strong class="text-error">{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
        @endif

        @if ($current_step == 2)
        <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-two">
            <div class="flex justify-center bg-primary text-white py-0">
                <span class="btn btn-ghost normal-case text-lg">Fasilitas Sekolah (2/6)</span>
            </div>
            <div class="card-body">
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">1. {{ $question[0]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="A1" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_A1" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">2. {{ $question[1]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="A2" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_A2" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">3. {{ $question[2]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="A3" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_A3" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">4. {{ $question[3]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="A4" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_A4" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">5. {{ $question[4]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="A5" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_A5" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
            </div>
        </div>
        @endif

        @if ($current_step == 3)
        <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-three">
            <div class="flex justify-center bg-primary text-white py-0">
                <span class="btn btn-ghost normal-case text-lg">Sumber Daya Manusia (3/6)</span>
            </div>
            <div class="card-body">
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">1. {{ $question[5]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="B1" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_B1" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">2. {{ $question[6]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="B2" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_B2" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">3. {{ $question[7]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="B3" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_B3" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
            </div>
        </div>
        @endif

        @if ($current_step == 4)
        <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-four">
            <div class="flex justify-center bg-primary text-white py-0">
                <span class="btn btn-ghost normal-case text-lg">Sarana Sanitasi (4/6)</span>
            </div>
            <div class="card-body">
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">1. {{ $question[8]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="C1" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C1" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">2. {{ $question[9]->question }}</span>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="C2" value="Baik" class="radio"/>
                        <span class="label-text ml-3">Baik</span> 
                    </label>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="C2" value="Tidak Baik" class="radio"/>
                        <span class="label-text ml-3">Tidak Baik</span> 
                    </label>
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C2" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">3. {{ $question[10]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="C3" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C3" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">4. {{ $question[11]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="C4" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C4" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">5. {{ $question[12]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="C5" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C5" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">6. {{ $question[13]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="C6" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C6" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">7. {{ $question[14]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="C7" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C7" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">8. {{ $question[15]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="C8" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C8" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">9. {{ $question[16]->question }}</span>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="C9" value="Baik" class="radio" />
                        <span class="label-text ml-3">Baik</span> 
                    </label>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="C9" value="Tidak Baik" class="radio" />
                        <span class="label-text ml-3">Tidak Baik</span> 
                    </label>
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_C9" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
            </div>
        </div>
        @endif

        @if ($current_step == 5)
        <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-five">
            <div class="flex justify-center bg-primary text-white py-0">
                <span class="btn btn-ghost normal-case text-lg">Kebijakan Covid-19 (5/6)</span>
            </div>
            <div class="card-body">
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">1. {{ $question[17]->question }}</span>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D1" value="Ya" class="radio" />
                        <span class="label-text ml-3">Ya</span> 
                    </label>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D1" value="Tidak" class="radio" />
                        <span class="label-text ml-3">Tidak</span> 
                    </label>
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_D1" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">2. {{ $question[18]->question }}</span>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D2" value="Ya" class="radio" />
                        <span class="label-text ml-3">Ya</span> 
                    </label>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D2" value="Tidak" class="radio" />
                        <span class="label-text ml-3">Tidak</span> 
                    </label>
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_D2" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">3. {{ $question[19]->question }}</span>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D3" value="Ya" class="radio" />
                        <span class="label-text ml-3">Ya</span> 
                    </label>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D3" value="Tidak" class="radio" />
                        <span class="label-text ml-3">Tidak</span> 
                    </label>
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_D3" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">4. {{ $question[20]->question }}</span>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D4" value="Ya" class="radio" />
                        <span class="label-text ml-3">Ya</span> 
                    </label>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D4" value="Tidak" class="radio" />
                        <span class="label-text ml-3">Tidak</span> 
                    </label>
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_D4" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">5. {{ $question[21]->question }}</span>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D5" value="Ya" class="radio" />
                        <span class="label-text ml-3">Ya</span> 
                    </label>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D5" value="Tidak" class="radio" />
                        <span class="label-text ml-3">Tidak</span> 
                    </label>
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_D5" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">6. {{ $question[22]->question }}</span>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D6" value="Ya" class="radio" />
                        <span class="label-text ml-3">Ya</span> 
                    </label>
                    <label class="label justify-start cursor-pointer">
                        <input type="radio" wire:model="D6" value="Tidak" class="radio" />
                        <span class="label-text ml-3">Tidak</span> 
                    </label>
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_D6" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
            </div>
        </div>
        @endif

        @if ($current_step == 6)
        <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-six">
            <div class="flex justify-center bg-primary text-white py-0">
                <span class="btn btn-ghost normal-case text-lg">Data Covid-19 (6/6)</span>
            </div>
            <div class="card-body">
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">1. {{ $question[23]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="E1" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_E1" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">2. {{ $question[24]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="E2" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_E2" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">3. {{ $question[25]->question }}</span>
                    <input type="text" placeholder="Ketik disini" wire:model="E3" class="input input-bordered w-full" />
                    <label class="label">
                        <span class="label-text">Jumlah - Keterangan Data</span>
                    </label>
                    <textarea class="textarea textarea-bordered" wire:model="explanation_E3" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
                <div class="form-control w-full mb-3">
                    <span class="font-bold mb-2">4. {{ $question[26]->question }}</span>
                    <textarea class="textarea textarea-bordered" wire:model="notes" placeholder="Tambahkan Jumlah - Keterangan Data jika diperlukan"></textarea>
                </div>
            </div>
        </div>
        @endif

        <div class="flex btn-group justify-between mt-3">
            @if ($current_step == 1)
            <div></div>
            @endif
            
            @if ($current_step == 2 || $current_step == 3 || $current_step == 4 || $current_step == 5 || $current_step == 6)
            <button type="button" class="btn text-white btn-neutral-content" wire:click="decreaseStep()">Sebelumnya</button>
            @endif
            
            @if ($current_step == 1 || $current_step == 2 || $current_step == 3 || $current_step == 4 || $current_step == 5)
            <button type="button" class="btn text-white btn-accent" wire:click="increaseStep()">Selanjutnya</button>
            @endif

            @if ($current_step == 6)
            <button type="submit" class="btn text-white btn-primary">Simpan</button>
            @endif
        </div>
    </form>
</div>
