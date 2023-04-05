@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex items-start flex-col-reverse justify-center mx-auto gap-3 px-4 py-4 md:flex-row">
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
                <div id="video-container">
                    <video id="qr-video" style="width: 100%; min-height: 300px; object-fit: cover;"></video>
                </div>
                <p class="text-sm text-center md:text-md">Arahkan kamera ke QR Code</p>
            </div>
        </div>
    </div>
    <script type="module">
        import QrScanner from "/js/qr-scanner.min.js";
    
        const video = document.getElementById('qr-video');
        const camQrResult = document.getElementById('cam-qr-result');
    
        function setResult(label, result) {
            console.log(result.data);
            window.location.href = result.data;
        }
        const scanner = new QrScanner(video, result => setResult(camQrResult, result), {
            highlightScanRegion: true,
            highlightCodeOutline: true,
        });
        scanner.start();
    </script>
</section>

@endsection