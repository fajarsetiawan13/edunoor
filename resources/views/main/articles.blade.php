@extends('layout.main')

@section('section')

<section id="articles-newest">
    <div class="text-2xl font-semibold text-center text-slate-800 px-8 pt-6 pb-2">Artikel Terbaru</div>
    <div class="divider my-0 w-[300px] mx-auto"></div>
    <div class="flex flex-wrap justify-center md:justify-center gap-3 px-8 pb-8 pt-4">
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
        @endforeach
        @else
        <p class="py-5 self-center">- Data Tidak Ditemukan! -</p>
        @endif
    </div>
    <div class="flex justify-center mb-4">
        {{ $articles->links() }}
    </div>
</section>

@endsection