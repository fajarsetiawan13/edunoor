@extends('layout.dashboard')

@section('section')

@if(session()->has('success'))
<script type="text/javascript">
    $(window).on('load', function(){
        $('#success-modal').modal('show');
    });
</script>
<input type="checkbox" id="success-modal" class="modal-toggle" checked/>
<div class="modal modal-bottom sm:modal-middle" id="success-modal">
    <div class="modal-box">
        <label for="success-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <figure class="flex justify-center">
            <img src="{{ asset('/img/icon-check.webp') }}" alt="icon-check-webp">
        </figure>
        <p class="mx-auto text-center">{{ session('success') }}</p>
        <div class="modal-action justify-center">
            <label for="success-modal" class="btn btn-primary btn-md text-md text-white">Oke!</label>
        </div>
    </div>
</div>
@endif

@if(session()->has('error'))
<script type="text/javascript">
    $(window).on('load', function(){
        $('#error-modal').modal('show');
    });
</script>
<input type="checkbox" id="error-modal" class="modal-toggle" checked/>
<div class="modal modal-bottom sm:modal-middle" id="error-modal">
    <div class="modal-box">
        <label for="error-modal" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <figure class="flex justify-center">
            <img src="{{ asset('/img/icon-error.webp') }}" alt="icon-error-webp">
        </figure>
        <p class="mx-auto text-center">{{ session('error') }}</p>
        <div class="modal-action justify-center">
            <label for="error-modal" class="btn btn-primary btn-xs text-xs lg:btn-sm lg:text-sm text-white">Oke!</label>
        </div>
    </div>
</div>
@endif

<section id="dashboard" class="py-16">
    <div class="container flex items-start flex-col-reverse justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 invisible md:visible shadow-lg md:w-1/3">
            <div class="card-body">
                <h2 class="card-title">Menu</h2>
                <div class="divider my-0"></div>
                @include('layout.dashboard-sidebar')
            </div>
        </div>
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                {{-- @can('admin') --}}
                <form action="/setting" method="POST">
                    @csrf
                    @if($setting->count())
                    @method('PUT')
                    @endif
                    <button type="submit" class="btn btn-sm btn-primary md:btn-md text-white mb-3">Simpan Data</button type="submit">
                    <div class="form-control">
                        <label class="label">
                          <span class="label-text">Masa Pemauntauan Kasus</span>
                        </label>
                        <input type="date" id="pemantauan_kasus" name="pemantauan_kasus" @if($setting->count()) value="{{ $setting[0]->pemantauan_kasus }}" @endif class="input input-bordered w-80" />
                    </div>
                    <div class="form-control mb-5">
                        <label class="label">
                          <span class="label-text">Masa Pemantauan Kontak Erat</span>
                        </label>
                        <input type="date" id="pemantauan_kontak_erat" name="pemantauan_kontak_erat" @if($setting->count()) value="{{ $setting[0]->pemantauan_kontak_erat }}" @endif  class="input input-bordered w-80" />
                    </div>
                </form>
                {{-- @endcan --}}
                
                <h2 class="card-title">Ubah Password</h2>
                <form action="/password" method="POST">
                    @csrf
                    <div class="form-control">
                        @error('password')
                        <label class="label">
                            <span class="label-text-alt text-red-600">{{ $message }}</span>
                        </label>
                        @enderror
                        <label class="label">
                            <span class="label-text">Password Lama</span>
                        </label>
                        <input type="password" id="password" name="password" class="input input-bordered w-80 @error('password') input-error @enderror" required/>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Password Baru</span>
                        </label>
                        <input type="password" id="password_baru" name="password_baru" class="input input-bordered w-80" />
                    </div>
                    <div class="form-control">
                        <label class="label cursor-pointer justify-start gap-2">
                            <input type="checkbox" class="checkbox" id="show_password"/>
                            <span class="label-text">lihat password</span> 
                        </label>
                      </div>
                    <button type="submit" class="btn btn-sm btn-primary md:btn-md text-white mt-3">Simpan Password</button type="submit">
                </form>
            </div>
        </div>
    </div>
</section>

<script>
    document.querySelector("#show_password").onclick = function() {
        if(this.checked) {
            document.querySelector("#password").type = "text";
            document.querySelector("#password_baru").type = "text";
        }
        else {
            document.querySelector("#password").type = "password";
            document.querySelector("#password_baru").type = "password";
        }
    }
</script>

@endsection