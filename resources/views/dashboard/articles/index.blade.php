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
                <a href="/dashboard/articles/create" class="btn btn-sm btn-primary w-full md:w-1/3 md:btn-md text-white mb-3">Tambah Artikel Baru</a>
                <table class="table table-fixed w-full" id="dataTables">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th class="w-1/12 text-left">No</th>
                            <th class="w-2/12 text-left">Gambar</th>
                            <th class="w-6/12 text-left">Judul</th>
                            <th class="w-3/12 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($articles->count())
                        @foreach($articles as $a)
                        <tr class="hover">
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="avatar">
                                    <div class="mask mask-squircle w-8 h-8 md:w-12 md:h-12">
                                    <img src="{{ asset('storage/' . $a->image) }}" alt="Avatar Tailwind CSS Component" />
                                    </div>
                                </div>
                            </td>
                            <td class="truncate">
                                <div class="font-bold truncate">{{ $a->title }}</div>
                                <div class="text-xs opacity-50 truncate">{!! $a->exerpt !!}</div>
                            </td>
                            <td>
                                <form action="/dashboard/articles/{{ $a->slug }}" method="POST">
                                    <div class="flex flex-col flex-1 md:flex-row gap-2">
                                        @method('delete')
                                        @csrf
                                        <a href="/dashboard/articles/{{ $a->slug }}" class="btn btn-xs text-xs md:btn-sm md:text-sm btn-primary tooltip inline-flex" data-tip="Lihat Artikel">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M20 3H4c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V5c0-1.103-.897-2-2-2zM4 19V5h16l.002 14H4z"></path><path d="M6 7h12v2H6zm0 4h12v2H6zm0 4h6v2H6z"></path></svg>
                                        </a>
                                        <a href="/dashboard/articles/{{ $a->slug }}/edit" class="btn btn-xs text-xs md:btn-sm md:text-sm btn-accent tooltip inline-flex" data-tip="Edit Artikel">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="m7 17.013 4.413-.015 9.632-9.54c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.756-.756-2.075-.752-2.825-.003L7 12.583v4.43zM18.045 4.458l1.589 1.583-1.597 1.582-1.586-1.585 1.594-1.58zM9 13.417l6.03-5.973 1.586 1.586-6.029 5.971L9 15.006v-1.589z"></path><path d="M5 21h14c1.103 0 2-.897 2-2v-8.668l-2 2V19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2z"></path></svg>
                                        </a>
                                        <button type="submit" class="btn btn-xs text-xs md:btn-sm md:text-sm btn-error tooltip inline-flex" data-tip="Hapus Artikel" onclick="return confirm('Anda yakin ingin menghapus Artikel ini?')">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" style="fill: rgba(255, 255, 255, 1);transform: ;msFilter:;"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="hover"><td>-- Tidak Ada Data Yang Ditemukan --</td></tr>
                        @endif
                    </tbody>
                    <!-- foot -->
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection