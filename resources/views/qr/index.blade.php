@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex justify-center mx-auto px-4 py-4 md:flex-row">
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