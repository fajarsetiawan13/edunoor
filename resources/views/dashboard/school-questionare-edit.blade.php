@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex flex-col justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <form action="/sch/{{ $qr_page }}" method="POST">
                    @csrf
                    @method('put')
                    
                    <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-one">
                        <div class="flex justify-center bg-primary text-white py-0">
                            <span class="btn btn-ghost normal-case text-lg">Profil Sekolah (1/6)</span>
                        </div>
                        <div class="card-body">
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">Nama Sekolah</span>
                                <select class="select select-bordered @error('school_id') select-error @enderror" name="school_id">
                                    <option value="{{ $infrastructure[0]->school_id }}" selected>{{ $infrastructure[0]->school->name }} (sekarang)</option>
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
                                <textarea class="textarea textarea-bordered @error('school_address') textarea-error @enderror" name="school_address">{{ $infrastructure[0]->school_address }}</textarea>
                                @error('school_address')
                                <span class="invalid-feedback">
                                    <strong class="text-error">{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">Jenjang Pendidikan</span>
                                <select class="select select-bordered @error('school_bp') select-error @enderror" name="school_bp">
                                    <option value="{{ $infrastructure[0]->school_bp }}" selected>{{ $infrastructure[0]->school_bp }} (sekarang)</option>
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
                    
                    <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-two">
                        <div class="flex justify-center bg-primary text-white py-0">
                            <span class="btn btn-ghost normal-case text-lg">Fasilitas Sekolah (2/6)</span>
                        </div>
                        <div class="card-body">
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">1. {{ $question[0]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="A1" value="{{ $infrastructure[0]->A1 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_A1" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_A1 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">2. {{ $question[1]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="A2" value="{{ $infrastructure[0]->A2 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_A2" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_A2 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">3. {{ $question[2]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="A3" value="{{ $infrastructure[0]->A3 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label> --}}
                                <textarea class="textarea textarea-bordered" name="explanation_A3" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_A3 }}</textarea>
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">4. {{ $question[3]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="A4" value="{{ $infrastructure[0]->A4 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_A4" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_A4 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">5. {{ $question[4]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="A5" value="{{ $infrastructure[0]->A5 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_A5" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_A5 }}</textarea> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-three">
                        <div class="flex justify-center bg-primary text-white py-0">
                            <span class="btn btn-ghost normal-case text-lg">Sumber Daya Manusia (3/6)</span>
                        </div>
                        <div class="card-body">
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">1. {{ $question[5]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="B1" value="{{ $infrastructure[0]->B1 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_B1" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_B1 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">2. {{ $question[6]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="B2" value="{{ $infrastructure[0]->B2 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_B2" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_B2 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">3. {{ $question[7]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="B3" value="{{ $infrastructure[0]->B3 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_B3" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_B3 }}</textarea> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-four">
                        <div class="flex justify-center bg-primary text-white py-0">
                            <span class="btn btn-ghost normal-case text-lg">Sarana Sanitasi (4/6)</span>
                        </div>
                        <div class="card-body">
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">1. {{ $question[8]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="C1" value="{{ $infrastructure[0]->C1 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C1" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C1 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">2. {{ $question[9]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C2" value="Ya" class="radio" {{ ($infrastructure[0]->C2 == 'Ya') ? 'checked' : '' }}/>
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C2" value="Tidak" class="radio" {{ ($infrastructure[0]->C2 == 'Tidak') ? 'checked' : '' }}/>
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C2" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C2 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">3. {{ $question[10]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C3" value="Ya" class="radio" {{ ($infrastructure[0]->C3 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C3" value="Tidak" class="radio" {{ ($infrastructure[0]->C3 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C3" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C3 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">4. {{ $question[11]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C4" value="Ya" class="radio" {{ ($infrastructure[0]->C4 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C4" value="Tidak" class="radio" {{ ($infrastructure[0]->C4 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C4" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C4 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">5. {{ $question[12]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C5" value="Ya" class="radio" {{ ($infrastructure[0]->C5 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C5" value="Tidak" class="radio" {{ ($infrastructure[0]->C5 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C5" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C5 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">6. {{ $question[13]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C6" value="Ya" class="radio" {{ ($infrastructure[0]->C6 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C6" value="Tidak" class="radio" {{ ($infrastructure[0]->C6 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C6" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C6 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">7. {{ $question[14]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C7" value="Ya" class="radio" {{ ($infrastructure[0]->C7 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C7" value="Tidak" class="radio"{{ ($infrastructure[0]->C7 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C7" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C7 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">8. {{ $question[15]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C8" value="Ya" class="radio" {{ ($infrastructure[0]->C8 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C8" value="Tidak" class="radio" {{ ($infrastructure[0]->C8 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C8" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C8 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">9. {{ $question[16]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C9" value="Ya" class="radio" {{ ($infrastructure[0]->C9 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="C9" value="Tidak" class="radio" {{ ($infrastructure[0]->C9 == 'Tidak') ? 'checked' : '' }}/>
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_C9" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_C9 }}</textarea> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-five">
                        <div class="flex justify-center bg-primary text-white py-0">
                            <span class="btn btn-ghost normal-case text-lg">Kebijakan Covid-19 (5/6)</span>
                        </div>
                        <div class="card-body">
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">1. {{ $question[17]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D1" value="Ya" class="radio" {{ ($infrastructure[0]->D1 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D1" value="Tidak" class="radio" {{ ($infrastructure[0]->D1 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_D1" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_D1 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">2. {{ $question[18]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D2" value="Ya" class="radio" {{ ($infrastructure[0]->D2 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D2" value="Tidak" class="radio" {{ ($infrastructure[0]->D2 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_D2" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_D2 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">3. {{ $question[19]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D3" value="Ya" class="radio" {{ ($infrastructure[0]->D3 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D3" value="Tidak" class="radio" {{ ($infrastructure[0]->D3 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_D3" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_D3 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">4. {{ $question[20]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D4" value="Ya" class="radio" {{ ($infrastructure[0]->D4 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D4" value="Tidak" class="radio" {{ ($infrastructure[0]->D4 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_D4" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_D4 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">5. {{ $question[21]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D5" value="Ya" class="radio" {{ ($infrastructure[0]->D5 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D5" value="Tidak" class="radio" {{ ($infrastructure[0]->D5 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_D5" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_D5 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">6. {{ $question[22]->question }}</span>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D6" value="Ya" class="radio" {{ ($infrastructure[0]->D6 == 'Ya') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Ya</span> 
                                </label>
                                <label class="label justify-start cursor-pointer">
                                    <input type="radio" name="D6" value="Tidak" class="radio" {{ ($infrastructure[0]->D6 == 'Tidak') ? 'checked' : '' }} />
                                    <span class="label-text ml-3">Tidak</span> 
                                </label>
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_D6" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_D6 }}</textarea> --}}
                            </div>
                        </div>
                    </div>
                    
                    <div class="card w-full lg:w-3/4 mx-auto bg-base-100 shadow-lg" id="step-six">
                        <div class="flex justify-center bg-primary text-white py-0">
                            <span class="btn btn-ghost normal-case text-lg">Data Covid-19 (6/6)</span>
                        </div>
                        <div class="card-body">
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">1. {{ $question[23]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="E1" value="{{ $infrastructure[0]->E1 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_E1" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_E1 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">2. {{ $question[24]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="E2" value="{{ $infrastructure[0]->E2 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_E2" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_E2 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">3. {{ $question[25]->question }}</span>
                                <input type="text" placeholder="Ketik disini" name="E3" value="{{ $infrastructure[0]->E3 }}" class="input input-bordered w-full" />
                                {{-- <label class="label">
                                    <span class="label-text">Keterangan</span>
                                </label>
                                <textarea class="textarea textarea-bordered" name="explanation_E3" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->explanation_E3 }}</textarea> --}}
                            </div>
                            <div class="form-control w-full mb-3">
                                <span class="font-bold mb-2">4. {{ $question[26]->question }}</span>
                                <textarea class="textarea textarea-bordered" name="notes" placeholder="Tambahkan keterangan jika diperlukan">{{ $infrastructure[0]->notes }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex btn-group justify-between mt-3">
                        <button type="submit" class="btn text-white btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection