@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex justify-center mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
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
                    <div class="form-control">
                        <label class="label">
                          <span class="label-text">Masa Pemantauan Kontak Erat</span>
                        </label>
                        <input type="date" id="pemantauan_kontak_erat" name="pemantauan_kontak_erat" @if($setting->count()) value="{{ $setting[0]->pemantauan_kontak_erat }}" @endif  class="input input-bordered w-80" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection