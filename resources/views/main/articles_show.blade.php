@extends('layout.main')

@section('section')

<section id="articles-detail">
    <div class="container flex flex-col justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-3/4">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <div class="flex flex-col justify-center">
                    <span class="text-center font-semibold text-xl md:text-2xl">{{ $article->title }}</span>
                    <span class="text-center label-text mb-2">Dibuat oleh {{ $article->user->name }}</span>
                    <figure class="flex justify-center mx-auto max-w-[150px] md:max-w-[300px] mb-2">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="Gambar Sampul">
                    </figure>
                    <div class="divider my-0"></div>
                    <p class="">{!! $article->body !!}</p>
                    <div class="divider my-0"></div>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center items-center gap-3 md:w-1/4">
            <?php $i = 0; ?>
            @if(!empty($articles->count()))
            @foreach($articles as $a)
            <div class="card card-compact w-52 bg-base-100 shadow-lg mb-4">
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
    </div>
</section>

@endsection