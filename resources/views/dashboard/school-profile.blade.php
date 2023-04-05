@extends('layout.dashboard')

@section('section')

<section id="dashboard" class="py-16">
    <div class="container flex items-start flex-col justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-1/3">
            <div class="card-body">
                <h2 class="card-title">Informasi Sekolah</h2>
                <div class="divider my-0"></div>
                <div class="flex justify-center">
                    <img class="mask mask-circle mb-2" width="100" height="100" src="/img/menu-schools.webp"
                        alt="Icon Menu Article" />
                </div>
                <table class="table w-full">
                    <thead>
                        <tr class="hover">
                            <th class="text-center" colspan="3">{{ $school[0]->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover">
                            <td>Kepala Sekolah</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->kepsek }}</td>
                        </tr>
                        <tr class="hover">
                            <td>Akreditasi</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->akreditasi }}</td>
                        </tr>
                        <tr class="hover">
                            <td>Kurikulum</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->kurikulum }}</td>
                        </tr>
                        <tr class="hover">
                            <td>NPSN</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->npsn }}</td>
                        </tr>
                        <tr class="hover">
                            <td>Status</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->status }}</td>
                        </tr>
                        <tr class="hover">
                            <td>Bentuk Pendidikian</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->bp }}</td>
                        </tr>
                        <tr class="hover">
                            <td>Status Kepemilikan</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->status_kepemilikan }}</td>
                        </tr>
                        <tr class="hover">
                            <td>SK Pendirian</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->sk_pendirian }}</td>
                        </tr>
                        <tr class="hover">
                            <td>SK Tanggal Pendirian</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->sk_pendirian_tanggal }}</td>
                        </tr>
                        <tr class="hover">
                            <td>SK Ijin Operasional</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->sk_ijin_operasional }}</td>
                        </tr>
                        <tr class="hover">
                            <td>SK Tanggal Ijin Operasional</td>
                            <td>:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->sk_ijin_operasional_tanggal }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="divider my-0"></div>
                <div class="flex flex-col gap-2">
                    <span class="text-sm font-bold text-center">Generate QR Code</span>
                    <a href="/gen-qr-school/{{ $school[0]->id }}" class="btn btn-sm btn-primary self-center text-white text-sm w-2/3" onclick="return confirm('Generate QR Code?')">For School</a>
                    {{-- <a href="/gen-qr-students/{{ $school[0]->id }}" class="btn btn-sm btn-info self-center text-white text-sm w-2/3" onclick="return confirm('Generate QR Code?')">For All Students</a> --}}
                </div>
                <div class="divider my-0"></div>
                <div class="card flex flex-row align-items-center self-center w-[300px] h-[200px] rounded-none" id="school-card" style="background-image: url('/img/card-school.webp');">
                    <figure class="bg-white w-1/2 my-3 ml-3 mr-0 w-100 h-100 rounded-r-none rounded-l-2xl">
                        @if($qrcode->count())
                        <img src="{{ asset('/' . $qrcode[0]->qr_image) }}" alt="QR Code Image for School">
                        @else
                        <img src="" alt="QR Code Image for School">
                        @endif
                    </figure>
                    <div class="card-body pl-2 pr-0 gap-0 bg-white my-3 mr-3 rounded-r-2xl w-100 h-100">
                        <h6 class="card-title text-xs">{{ $school[0]->name }}</h6>
                        <p class="text-[10px]">{{ $school[0]->npsn }}</p>
                        <div class="divider my-0"></div>
                        <p class="text-[10px]">Bidang Pendidikan : {{ $school[0]->bp }}</p>
                        <p class="text-[10px]">Akreditasi : {{ $school[0]->akreditasi }}</p>
                    </div>
                </div>
                <label for="download-qr-school" onclick="cetakCard()" class="btn btn-sm btn-secondary self-center text-white text-sm w-2/3">Cetak Kartu</label>
            </div>
        </div>
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3 mb-3">
            <div class="card-body">
                <h2 class="card-title">Daftar Siswa</h2>
                <div class="divider my-0"></div>
                @livewire('students-index')
            </div>
        </div>
    </div>
</section>

<input type="checkbox" id="download-qr-school" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-md mb-3 md:text-lg">Selamat! Kartu QR Sekolah Anda siap diunduh.</h3>
        <label for="download-qr-school" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <div id="result" class="flex justify-center"></div>
        <div class="modal-action">
            <button onclick="unduh()" class="btn btn-sm btn-secondary self-center text-white text-sm w-1/3">Unduh!</button>
        </div>
    </div>
</div>

<input type="checkbox" id="download-qr-student" class="modal-toggle" />
<div class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
        <h3 class="font-bold text-md mb-3 md:text-lg">Selamat! Kartu QR Anda siap diunduh.</h3>
        <label for="download-qr-student" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        <div id="resultStdCard" class="flex justify-center"></div>
        <div class="modal-action">
            <button onclick="unduhKartu()" class="btn btn-sm btn-secondary self-center text-white text-sm w-1/3">Unduh!</button>
        </div>
    </div>
</div>

<script type="text/javascript" src="/js/html2canvas.min.js"></script>
<script type="text/javascript">
    function cetakCard(){
            html2canvas(document.querySelector("#school-card")).then(canvas => {
            document.querySelector("#result").appendChild(canvas)
        });
    }
    function unduh(){
        var canvas = document.querySelector("#result canvas");
        var anchor = document.createElement('a');
        anchor.href = canvas.toDataURL('image/png');
        anchor.download = "Qr-School.png";
        anchor.click();
    }
</script>

@endsection