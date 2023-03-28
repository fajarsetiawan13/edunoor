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

<section id="hero">
    <div class="hero min-h-screen" style="background-image: url('{{ asset('/img/unair-1.jpg') }}');">
        <div class="hero-overlay bg-opacity-60"></div>
        <div class=" lex justify-items-center hero-content text-neutral-content">
            <div class="card w-96 bg-base-100 shadow-xl">
                <figure class="px-10 pt-10">
                  <img src="{{ asset('/img/default.webp') }}" alt="Image" class="rounded-xl" />
                </figure>
                <div class="card-body items-center text-center">
                  <h2 class="card-title text-slate-800 text-center">NAJLA SALSABILA NOOR</h2>
                  <p class="text-slate-800 text-center">IMAHASISWA S-2 PASCASARJANA ILMU KESEHATAN MASYARAKAT</p>
                  <p class="text-slate-800 text-center">UNIVERSITAS AIRLANGGA</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection