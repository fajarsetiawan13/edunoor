@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex justify-center mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                @livewire('questionare-index')
            </div>
        </div>
    </div>
</section>

@endsection