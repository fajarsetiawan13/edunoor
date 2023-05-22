@extends('layout.main')

@section('section')

@if(session()->has('success'))
<script type="text/javascript">
    $(window).on('load', function(){
        $('#success-modal').modal('show');
    });
</script>
<input type="checkbox" id="success-modal" class="modal-toggle" checked />
<div class="modal modal-bottom sm:modal-middle" id="success-modal">
    <div class="modal-box">
        <label for="success-modal" class="btn btn-sm text-sm btn-circle absolute right-2 top-2">✕</label>
        <figure class="flex justify-center">
            <img src="{{ asset('/img/icon-check.webp') }}" alt="icon-check-webp">
        </figure>
        <p class="mx-auto text-center">{{ session('success') }}</p>
        <div class="modal-action justify-center">
            <label for="success-modal"
                class="btn btn-primary btn-sm text-sm lg:btn-md lg:text-md text-white">Oke!</label>
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
<input type="checkbox" id="error-modal" class="modal-toggle" checked />
<div class="modal modal-bottom sm:modal-middle" id="error-modal">
    <div class="modal-box">
        <label for="error-modal" class="btn btn-sm text-sm btn-circle absolute right-2 top-2">✕</label>
        <figure class="flex justify-center">
            <img src="{{ asset('/img/icon-error.webp') }}" alt="icon-error-webp">
        </figure>
        <p class="mx-auto text-center">{{ session('error') }}</p>
        <div class="modal-action justify-center">
            <label for="error-modal" class="btn btn-primary btn-sm text-sm lg:btn-md lg:text-md text-white">Oke!</label>
        </div>
    </div>
</div>
@endif

<div class="carousel w-full max-h-[420px]">
    <div id="slide1" class="carousel-item relative w-full">
        <img src="{{ asset('/img/slide-1.jpg') }}" class="w-full object-cover" />
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide3" class="btn btn-circle">❮</a> 
            <a href="#slide2" class="btn btn-circle">❯</a>
        </div>
    </div> 
    <div id="slide2" class="carousel-item relative w-full">
        <img src="{{ asset('/img/slide-2.jpg') }}" class="w-full object-cover" />
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide1" class="btn btn-circle">❮</a> 
            <a href="#slide3" class="btn btn-circle">❯</a>
        </div>
    </div> 
    <div id="slide3" class="carousel-item relative w-full">
        <img src="{{ asset('/img/slide-3.jpg') }}" class="w-full object-cover" />
        <div class="absolute flex justify-between transform -translate-y-1/2 left-5 right-5 top-1/2">
            <a href="#slide2" class="btn btn-circle">❮</a> 
            <a href="#slide1" class="btn btn-circle">❯</a>
        </div>
    </div>
</div>

<section id="articles-newest">
    <div class="text-2xl font-semibold text-center text-slate-800 px-8 pt-6 pb-2">Dokumentasi Kegiatan</div>
    <div class="divider my-0 w-[300px] mx-auto"></div>
    <div class="flex flex-wrap justify-center md:justify-center gap-3 px-8 pb-8 pt-4">
        <div class="card card-compact w-96 bg-base-100 shadow-lg mb-4">
            <figure><img src="{{ asset('/img/slide-1.jpg') }}" alt="" /></figure>
            <div class="card-body items-center text-center">
              <h2 class="card-title">Judul</h2>
            </div>
        </div>
        <div class="card card-compact w-96 bg-base-100 shadow-lg mb-4">
            <figure><img src="{{ asset('/img/slide-2.jpg') }}" alt="" /></figure>
            <div class="card-body items-center text-center">
              <h2 class="card-title">Judul</h2>
            </div>
        </div>
        <div class="card card-compact w-96 bg-base-100 shadow-lg mb-4">
            <figure><img src="{{ asset('/img/slide-3.jpg') }}" alt="" /></figure>
            <div class="card-body items-center text-center">
              <h2 class="card-title">Judul</h2>
            </div>
        </div>
        <div class="card card-compact w-96 bg-base-100 shadow-lg mb-4">
            <figure><img src="{{ asset('/img/slide-4.jpg') }}" alt="" /></figure>
            <div class="card-body items-center text-center">
              <h2 class="card-title">Judul</h2>
            </div>
        </div>
    </div>
</section>

{{-- <section id="articles-newest">
    <div class="text-2xl font-semibold text-center text-slate-800 px-8 pt-6 pb-2">Artikel Terbaru</div>
    <div class="divider my-0 w-[300px] mx-auto"></div>
    <div class="flex flex-wrap justify-center md:justify-center gap-3 px-8 pb-8 pt-4">
        <?php $i = 0; ?>
        @if(!empty($articles->count()))
        @foreach($articles as $a)
        <div class="card card-compact w-96 bg-base-100 shadow-lg mb-4">
            <figure><img src="{{ asset('storage/' . $a->image) }}" alt="{{ $a->title }}" /></figure>
            <div class="card-body">
              <h2 class="card-title">{{ $a->title }}</h2>
              <p>{{ $a->exerpt }}</p>
              <div class="card-actions justify-end">
                <a href="/articles/{{ $a->slug }}" class="btn btn-xs text-xs md:btn-sm md:text-sm text-white btn-primary">Baca Selengkapnya</a>
              </div>
            </div>
        </div>
        <?php if(++$i == 3) break; ?>
        @endforeach
        @else
        <p class="py-5 self-center">- Data Tidak Ditemukan! -</p>
        @endif
    </div>
    <div class="flex justify-center">
        <a href="/articles" class="btn btn-xs text-xs md:btn-sm md:text-sm btn-primary text-slate-50 px-5 mt-5 hover:opacity-70 mb-4">Lihat Artikel Lebih Banyak</a>
    </div>
</section> --}}

@endsection