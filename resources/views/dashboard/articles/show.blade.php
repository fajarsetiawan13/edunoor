@extends('layout.dashboard')

@section('section')

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
                <form action="/dashboard/articles/{{ $article->slug }}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/dashboard/articles/{{ $article->slug }}/edit" class="btn btn-xs text-xs text-white md:text-sm md:btn-sm btn-accent tooltip inline-flex" data-tip="Edit Artikel">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg>
                        Edit Artikel
                    </a>
                    <button class="btn btn-xs text-xs text-white md:text-sm md:btn-sm btn-error tooltip inline-flex" data-tip="Hapus Artikel" onclick="return confirm('Anda yakin ingin menghapus Artikel ini?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                        Hapus Artikel
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection