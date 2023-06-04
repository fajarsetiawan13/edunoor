@extends('layout.main')

@section('section')

<section id="articles-detail">
    <div class="container flex flex-col justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-3/4">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <select id="graphs" class="select select-bordered w-full max-w-xs mb-5" onchange="SelectedGraph()">
                    <option disabled selected>Pilih Grafik</option>
                    <option id="graph-0" value="0">Masa Pemantauan</option>
                    <option id="graph-1" value="1">Geografis Sekolah</option>
                    <option id="graph-2" value="2">Ruang Kelas</option>
                    <option id="graph-3" value="3">Sumber Daya Manusia</option>
                    <option id="graph-4" value="4">Sarana Sanitasi</option>
                    <option id="graph-5" value="5">Kebijakan Covid-19</option>
                    <option id="graph-6" value="6">Data Covid-19</option>
                    <option id="graph-7" value="7">Kepadatan Kelas</option>
                    <option id="graph-8" value="8">Kepadatan Populasi Sekolah</option>
                </select>
                <div class="" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Masa Pemantauan</span>
                    <div class="divider my-0 mx-32"></div>
                    <div>
                        <span class="flex justify-center text-lg md:text-xl">Masa Pemantauan Kasus</span>
                        <span class="flex justify-center text-lg md:text-xl mb-5"> @if($setting->count()) {{ $setting[0]->pemantauan_kasus }} @else - kosong - @endif</span>
                        <span class="flex justify-center text-lg md:text-xl">Masa Pemantauan Kontak Erat</span>
                        <span class="flex justify-center text-lg md:text-xl mb-5">@if($setting->count()) {{ $setting[0]->pemantauan_kontak_erat }} @else - kosong - @endif </span>
                    </div>                      
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Geografis Sekolah --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Geografis Sekolah</span>
                    <div class="divider my-0 mx-32"></div>
                    <div class="my-5">
                        <span class="flex justify-center font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                        <canvas id="chart_geografis_SD" class="w-full"></canvas>
                    </div>
                    <div class="my-5">
                        <span class="flex justify-center font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                        <canvas id="chart_geografis_SMP" class="w-full"></canvas>
                    </div>
                    <div class="my-5">
                        <span class="flex justify-center font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                        <canvas id="chart_geografis_SMA" class="w-full"></canvas>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Ruang Kelas --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ruang Kelas</span>
                    <div class="divider my-0 mx-32"></div>
                    <div class="my-5">
                        <span class="flex justify-center font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                        <canvas id="chart_ruang_kelas_SD" class="w-full"></canvas>
                    </div>
                    <div class="my-5">
                        <span class="flex justify-center font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                        <canvas id="chart_ruang_kelas_SMP" class="w-full"></canvas>
                    </div>
                    <div class="my-5">
                        <span class="flex justify-center font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                        <canvas id="chart_ruang_kelas_SMA" class="w-full"></canvas>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Sumber Daya Manusia --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Sumber Daya Manusia</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="SDM_Table_SD">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Sekolah</th>
                              <th>Guru</th>
                              <th>Siswa</th>
                              <th>Tenaga Administrasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($basis_data_sd as $sd)
                            <tr class="hover">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sd->school }}</td>
                                <td>{{ $sd->B1 }}</td>
                                <td>{{ $sd->B2 }}</td>
                                <td>{{ $sd->B3 }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="SDM_Table_SMP">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Sekolah</th>
                              <th>Guru</th>
                              <th>Siswa</th>
                              <th>Tenaga Administrasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($basis_data_smp as $smp)
                            <tr class="hover">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $smp->school }}</td>
                                <td>{{ $sd->B1 }}</td>
                                <td>{{ $sd->B2 }}</td>
                                <td>{{ $sd->B3 }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="SDM_Table_SMA">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Sekolah</th>
                              <th>Guru</th>
                              <th>Siswa</th>
                              <th>Tenaga Administrasi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($basis_data_sma as $sma)
                            <tr class="hover">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sma->school }}</td>
                                <td>{{ $sd->B1 }}</td>
                                <td>{{ $sd->B2 }}</td>
                                <td>{{ $sd->B3 }}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Sarana Sanitasi --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Sarana Sanitasi</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Sanitasi_SD" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Sanitasi_SMP" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Sanitasi_SMA" style="width:100%">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Kebijakan Covid-19 --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Kebijakan Covid-19</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Kebijakan_Covid_SD" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Kebijakan_Covid_SMP" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Kebijakan_Covid_SMA" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Data Covid-19 --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Data Covid-19</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Data_Covid_SD" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Data_Covid_SMP" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full" id="Data_Covid_SMA" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nama Sekolah</th>
                                    <th>Bidang Pendidikan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Kepadatan Siswa --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Kepadatan Kelas</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <div class="mb-3">
                        <canvas id="kepadatan_siswa_SD" class="w-full"></canvas>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="mb-3">
                        <canvas id="kepadatan_siswa_SMP" class="w-full"></canvas>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Atas</span>
                    <div class="mb-3">
                        <canvas id="kepadatan_siswa_SMA" class="w-full"></canvas>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Kepadatan Populasi Sekolah --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Kepadatan Populasi Sekolah</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <div class="mb-3">
                        <canvas id="kepadatan_populasi_SD" class="w-full"></canvas>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="mb-3">
                        <canvas id="kepadatan_populasi_SMP" class="w-full"></canvas>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Atas</span>
                    <div class="mb-3">
                        <canvas id="kepadatan_populasi_SMA" class="w-full"></canvas>
                    </div>
                    <div class="divider my-0"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/tabs.js') }}"></script>
<script src="{{ asset('/js/chart.js') }}"></script>

<script>
    // Geografis Sekolah //
    const ctx_geografis_sd = document.getElementById('chart_geografis_SD');
    const ctx_geografis_smp = document.getElementById('chart_geografis_SMP');
    const ctx_geografis_sma = document.getElementById('chart_geografis_SMA');
    var labels_luas_sd = {{ Js::from($labels_luas_sekolah_SD) }}, data_luas_sd = {{ Js::from($luas_SD) }};
    var labels_luas_smp = {{ Js::from($labels_luas_sekolah_SMP) }}, data_luas_smp = {{ Js::from($luas_SMP) }};
    var labels_luas_sma = {{ Js::from($labels_luas_sekolah_SMA) }}, data_luas_sma = {{ Js::from($luas_SMA) }};
    var labels_ruang_terbuka_sd = {{ Js::from($labels_ruang_terbuka_SD) }}, data_ruang_terbuka_sd = {{ Js::from($ruang_terbuka_SD) }};
    var labels_ruang_terbuka_smp = {{ Js::from($labels_ruang_terbuka_SMP) }}, data_ruang_terbuka_smp = {{ Js::from($ruang_terbuka_SMP) }};
    var labels_ruang_terbuka_sma = {{ Js::from($labels_ruang_terbuka_SMA) }}, data_ruang_terbuka_sma = {{ Js::from($ruang_terbuka_SMA) }};
    var colorBar = ['rgba(239, 68, 68, 0.5)', 'rgba(34, 197, 94, 0.5)','rgba(14, 165, 233, 0.5)'];
    var colorBorder = ['rgba(239, 68, 68, 0.5)', 'rgba(34, 197, 94, 0.5)','rgba(14, 165, 233, 0.5)'];

    new Chart(ctx_geografis_sd, {type: 'bar', data: {labels: labels_luas_sd,
        datasets:[
            {label: 'Luas Sekolah', data: data_luas_sd, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1)', borderWidth: 1},
            {label: 'Luas Ruang Terbuka', data: data_ruang_terbuka_sd, backgroundColor: 'rgba(34, 197, 94, 0.3)', borderColor: 'rgba(34, 197, 94, 1)', borderWidth: 1},
        ]
    }, options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_geografis_smp, {type: 'bar', data: {labels: labels_luas_smp,
        datasets:[
            {label: 'Luas Sekolah', data: data_luas_smp, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1)', borderWidth: 1},
            {label: 'Luas Ruang Terbuka', data: data_ruang_terbuka_smp, backgroundColor: 'rgba(34, 197, 94, 0.3)', borderColor: 'rgba(34, 197, 94, 1)', borderWidth: 1},
        ]
    }, options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_geografis_sma, {type: 'bar', data: {labels: labels_luas_sma,
        datasets:[
            {label: 'Luas Sekolah', data: data_luas_sma, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1},
            {label: 'Luas Ruang Terbuka', data: data_ruang_terbuka_sma, backgroundColor: 'rgba(34, 197, 94, 0.3)', borderColor: 'rgba(34, 197, 94, 1)', borderWidth: 1},
        ]
    }, options: {scales: {y: {beginAtZero: true}},}});
    
    // Ruang Kelas //
    const ctx_ruang_kelas_sd = document.getElementById('chart_ruang_kelas_SD');
    const ctx_ruang_kelas_smp = document.getElementById('chart_ruang_kelas_SMP');
    const ctx_ruang_kelas_sma = document.getElementById('chart_ruang_kelas_SMA');
    var labels_ruang_kelas_sd = {{ Js::from($labels_ruang_kelas_SD) }}, data_ruang_kelas_sd = {{ Js::from($ruang_kelas_SD) }};
    var labels_ruang_kelas_smp = {{ Js::from($labels_ruang_kelas_SMP) }}, data_ruang_kelas_smp = {{ Js::from($ruang_kelas_SMP) }};
    var labels_ruang_kelas_sma = {{ Js::from($labels_ruang_kelas_SMA) }}, data_ruang_kelas_sma = {{ Js::from($ruang_kelas_SMA) }};
    var labels_luas_kelas_sd = {{ Js::from($labels_luas_kelas_SD) }}, data_luas_kelas_sd = {{ Js::from($luas_kelas_SD) }};
    var labels_luas_kelas_smp = {{ Js::from($labels_luas_kelas_SMP) }}, data_luas_kelas_smp = {{ Js::from($luas_kelas_SMP) }};
    var labels_luas_kelas_sma = {{ Js::from($labels_luas_kelas_SMA) }}, data_luas_kelas_sma = {{ Js::from($luas_kelas_SMA) }};
    var labels_ventilasi_kelas_sd = {{ Js::from($labels_ventilasi_kelas_SD) }}, data_ventilasi_kelas_sd = {{ Js::from($ventilasi_kelas_SD) }};
    var labels_ventilasi_kelas_smp = {{ Js::from($labels_ventilasi_kelas_SMP) }}, data_ventilasi_kelas_smp = {{ Js::from($ventilasi_kelas_SMP) }};
    var labels_ventilasi_kelas_sma = {{ Js::from($labels_ventilasi_kelas_SMA) }}, data_ventilasi_kelas_sma = {{ Js::from($ventilasi_kelas_SMA) }};

    new Chart(ctx_ruang_kelas_sd, {type: 'bar', data: {labels: labels_ruang_kelas_sd,
        datasets:[
            {label: 'Jumlah Ruang Kelas', data: data_ruang_kelas_sd, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1)', borderWidth: 1},
            {label: 'Luas Ruang Kelas', data: data_luas_kelas_sd, backgroundColor: 'rgba(34, 197, 94, 0.3)', borderColor: 'rgba(34, 197, 94, 1)', borderWidth: 1},
            {label: 'Ventilasi Kelas', data: data_ventilasi_kelas_sd, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)', borderWidth: 1},
        ]
    }, options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_ruang_kelas_smp, {type: 'bar', data: {labels: labels_ruang_kelas_smp,
        datasets:[
            {label: 'Jumlah Ruang Kelas', data: data_ruang_kelas_smp, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1)', borderWidth: 1},
            {label: 'Luas Ruang Kelas', data: data_luas_kelas_smp, backgroundColor: 'rgba(34, 197, 94, 0.3)', borderColor: 'rgba(34, 197, 94, 1)', borderWidth: 1},
            {label: 'Ventilasi Kelas', data: data_ventilasi_kelas_smp, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)', borderWidth: 1},
        ]
    }, options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_ruang_kelas_sma, {type: 'bar', data: {labels: labels_ruang_kelas_sma,
        datasets:[
            {label: 'Jumlah Ruang Kelas', data: data_ruang_kelas_sma, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1},
            {label: 'Luas Ruang Kelas', data: data_luas_kelas_sma, backgroundColor: 'rgba(34, 197, 94, 0.3)', borderColor: 'rgba(34, 197, 94, 1)', borderWidth: 1},
            {label: 'Ventilasi Kelas', data: data_ventilasi_kelas_sma, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)', borderWidth: 1},
        ]
    }, options: {scales: {y: {beginAtZero: true}},}});
    
    // Kepadatan Kelas //
    const ctx_kepadatan_sd = document.getElementById('kepadatan_siswa_SD');
    const ctx_kepadatan_smp = document.getElementById('kepadatan_siswa_SMP');
    const ctx_kepadatan_sma = document.getElementById('kepadatan_siswa_SMA');
    var labels_sd = {{ Js::from($labels_kepadatan_SD) }}, data_kepadatan_sd = {{ Js::from($kepadatan_SD) }}, batas_sd = {{ Js::from($batas_SD) }};
    var labels_smp = {{ Js::from($labels_kepadatan_SMP) }}, data_kepadatan_smp = {{ Js::from($kepadatan_SMP) }}, batas_smp = {{ Js::from($batas_SMP) }};
    var labels_sma = {{ Js::from($labels_kepadatan_SMA) }}, data_kepadatan_sma = {{ Js::from($kepadatan_SMA) }}, batas_sma = {{ Js::from($batas_SMA) }};
   
    new Chart(ctx_kepadatan_sd, {type: 'bar', data: {labels: labels_sd, 
        datasets: [
            {label: 'Kepadatan Kelas SD', data: data_kepadatan_sd, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1}, 
            // {label: 'Batas', data: batas_sd, type: 'line', order: 1, fill: false, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)'}
        ]
    },options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_kepadatan_smp, {type: 'bar', data: {labels: labels_smp, 
        datasets: [
            {label: 'Kepadatan Kelas SMP', data: data_kepadatan_smp, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1}, 
            // {label: 'Batas', data: batas_smp, type: 'line', order: 1, fill: false, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)'}
        ]
    },options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_kepadatan_sma, {type: 'bar', data: {labels: labels_sma, 
        datasets: [
            {label: 'Kepadatan Kelas SMA', data: data_kepadatan_sma, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1}, 
            // {label: 'Batas', data: batas_sma, type: 'line', order: 1, fill: false, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)'}
        ]
    },options: {scales: {y: {beginAtZero: true}},}});
    
    // Kepadatan Populasi Sekolah //
    const ctx_kepadatan_populasi_sd = document.getElementById('kepadatan_populasi_SD');
    const ctx_kepadatan_populasi_smp = document.getElementById('kepadatan_populasi_SMP');
    const ctx_kepadatan_populasi_sma = document.getElementById('kepadatan_populasi_SMA');
    var labels_populasi_sd = {{ Js::from($labels_kepadatan_populasi_SD) }}, data_kepadatan_populasi_sd = {{ Js::from($kepadatan_populasi_SD) }};
    var labels_populasi_smp = {{ Js::from($labels_kepadatan_populasi_SMP) }}, data_kepadatan_populasi_smp = {{ Js::from($kepadatan_populasi_SMP) }};
    var labels_populasi_sma = {{ Js::from($labels_kepadatan_populasi_SMA) }}, data_kepadatan_populasi_sma = {{ Js::from($kepadatan_populasi_SMA) }};
   
    new Chart(ctx_kepadatan_populasi_sd, {type: 'bar', data: {labels: labels_populasi_sd, 
        datasets: [
            {label: 'Kepadatan Populasi SD', data: data_kepadatan_populasi_sd, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1},
        ]
    },options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_kepadatan_populasi_smp, {type: 'bar', data: {labels: labels_populasi_smp, 
        datasets: [
            {label: 'Kepadatan Populasi SMP', data: data_kepadatan_populasi_smp, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1},
        ]
    },options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_kepadatan_populasi_sma, {type: 'bar', data: {labels: labels_populasi_sma, 
        datasets: [
            {label: 'Kepadatan Populasi SMA', data: data_kepadatan_populasi_sma, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1},
        ]
    },options: {scales: {y: {beginAtZero: true}},}});
</script>

<script>
    $(document).ready( function () {
        $('#SDM_Table_SD').DataTable();
        $('#SDM_Table_SMP').DataTable();
        $('#SDM_Table_SMA').DataTable();
    } );
</script>

{{-- Sanitasi --}}
<script>
    function format_sanitasi(data_sanitasi){
        return (
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; style="width: 100%;"">' +
            '<tr>' + 
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300" style="border-bottom-left-radius: 0;">Variabel</th>' +
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300">Data</th>' + 
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300">Indikator</th>' + 
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300" style="border-bottom-right-radius: 0;">Jumlah - Keterangan Data</th>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Jumlah Toilet :</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_sanitasi.C1 + '</td>' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100"></td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_sanitasi.desc_C1 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersedian Air di Toilet:</td>' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100"></td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_sanitasi.C2 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_sanitasi.desc_C2 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Sabun Cuci Tangan di Depan Kelas:</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + (data_sanitasi.C3 / data_sanitasi.A3).toFixed(2) + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + 
                    ((data_sanitasi.C3 / data_sanitasi.A3) >= 1 ? 'Baik' : 'Tidak Baik') + 
                '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_sanitasi.desc_C3 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Disinfektan Toilet:</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_sanitasi.C4 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + 
                    (data_sanitasi.C4 > 0 ? 'Baik' : 'Tidak Baik') + 
                '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_sanitasi.desc_C4 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Tempat Cuci Tangan di Depan Kelas:</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + (data_sanitasi.C5 / data_sanitasi.A3).toFixed(2) + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + 
                    ((data_sanitasi.C5 / data_sanitasi.A3) >= 1 ? 'Baik' : 'Tidak Baik') + 
                '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_sanitasi.desc_C5 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Handsanitizer:</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + (data_sanitasi.C6 / data_sanitasi.A3).toFixed(2) + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + 
                    ((data_sanitasi.C6 / data_sanitasi.A3) >= 1 ? 'Baik' : 'Tidak Baik') + 
                '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_sanitasi.desc_C6 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Thermogun:</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_sanitasi.C7 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + (data_sanitasi.C7 >= 1 ? 'Baik' : 'Tidak Baik') + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_sanitasi.desc_C7 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Masker:</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + ((data_sanitasi.C8 / data_sanitasi.B2) * 100).toFixed(2) + ' % </td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + 
                    (((data_sanitasi.C8 / data_sanitasi.B2) * 100) >= 50 ? 'Baik' : 'Tidak Baik')+ 
                '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_sanitasi.desc_C8 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0" style="border-top-left-radius: 0;">Ketaatan Penggunaan Masker:</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0"></td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0">' + data_sanitasi.C9 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0" style="border-top-right-radius: 0;">' + data_sanitasi.desc_C9 + '</td>' + 
            '</tr>' +
            '</table>'
        );
    }
    
    $(document).ready(function () {
        var sanitasi_sd = $('#Sanitasi_SD').DataTable({
            data: {!! json_encode($basis_data_sd->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Sanitasi_SD tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = sanitasi_sd.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_sanitasi(row.data())).show();
                tr.addClass('shown');
            }
        });
        
        var sanitasi_smp = $('#Sanitasi_SMP').DataTable({
            data: {!! json_encode($basis_data_smp->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Sanitasi_SMP tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = sanitasi_smp.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_sanitasi(row.data())).show();
                tr.addClass('shown');
            }
        });

        var sanitasi_sma = $('#Sanitasi_SMA').DataTable({
            data: {!! json_encode($basis_data_sma->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Sanitasi_SMA tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = sanitasi_sma.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_sanitasi(row.data())).show();
                tr.addClass('shown');
            }
        });
    });
</script>

{{-- Kebijakan Covid-19 --}}
<script>
    function format_kebijakan_covid(data_kebijakan_covid){
        return (
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left: 50px;" style="width: 100%;">' +
            '<tr>' + 
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300" style="border-bottom-left-radius: 0;">Variabel</th>' +
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300">Data</th>' +  
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300" style="border-bottom-right-radius: 0;">Jumlah - Keterangan Data</th>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Satgas Covid-19</td>' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_kebijakan_covid.D1 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_kebijakan_covid.desc_D1 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Sosialisasi Protokol Kesehatan</td>' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_kebijakan_covid.D2 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_kebijakan_covid.desc_D2 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Prosedur Penanganan Covid-19</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_kebijakan_covid.D3 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_kebijakan_covid.desc_D3 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Media Informasi Covid-19</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_kebijakan_covid.D4 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_kebijakan_covid.desc_D4 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Ketersediaan Peraturan/Tata Tertib Covid-19</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_kebijakan_covid.D5 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_kebijakan_covid.desc_D5 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0" style="border-top-left-radius: 0;">Ketersediaan Kantin Sehat</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0">' + data_kebijakan_covid.D6 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0" style="border-top-right-radius: 0;">' + data_kebijakan_covid.desc_D6 + '</td>' + 
            '</tr>' +
            '</table>'
        );
    }
    
    $(document).ready(function () {
        var kebijakan_covid_sd = $('#Kebijakan_Covid_SD').DataTable({
            data: {!! json_encode($basis_data_sd->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Kebijakan_Covid_SD tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = kebijakan_covid_sd.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_kebijakan_covid(row.data())).show();
                tr.addClass('shown');
            }
        });
        
        var kebijakan_covid_smp = $('#Kebijakan_Covid_SMP').DataTable({
            data: {!! json_encode($basis_data_smp->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Kebijakan_Covid_SMP tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = kebijakan_covid_smp.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_kebijakan_covid(row.data())).show();
                tr.addClass('shown');
            }
        });

        var kebijakan_covid_sma = $('#Kebijakan_Covid_SMA').DataTable({
            data: {!! json_encode($basis_data_sma->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Kebijakan_Covid_SMA tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = kebijakan_covid_sma.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_kebijakan_covid(row.data())).show();
                tr.addClass('shown');
            }
        });
    });
</script>

{{-- Data Covid-19 --}}
<script>
    function format_data_covid(data_covid){
        return (
            '<table cellpadding="5" cellspacing="0" border="0" style="padding-left: 50px;  style="width: 100%;"">' +
            '<tr>' + 
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300" style="border-bottom-left-radius: 0;">Variabel</th>' +
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300">Data</th>' +  
                '<th class="text-left align-top whitespace-pre-line bg-zinc-300" style="border-bottom-right-radius: 0;">Jumlah - Keterangan Data</th>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Data Covid-19 Setahun Terakhir</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_covid.E1 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_covid.desc_E1 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">Jumlah dan Sebaran Kasus per Bulan</td>' +
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100">' + data_covid.E2 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100" style="border-radius: 0;">' + data_covid.desc_E2 + '</td>' + 
            '</tr>' +
            '<tr class="hover">' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0" style="border-top-left-radius: 0;">Pemusatan Covid-19 pada Kelas Tertentu</td>' + 
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0">' + data_covid.E3 + '</td>' +  
                '<td class="text-left align-top whitespace-pre-line bg-zinc-100 border-0" style="border-top-right-radius: 0;">' + data_covid.desc_E3 + '</td>' + 
            '</tr>' +
            '</table>'
        );
    }
    
    $(document).ready(function () {
        var data_covid_sd = $('#Data_Covid_SD').DataTable({
            data: {!! json_encode($basis_data_sd->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Data_Covid_SD tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = data_covid_sd.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_data_covid(row.data())).show();
                tr.addClass('shown');
            }
        });
        
        var data_covid_smp = $('#Data_Covid_SMP').DataTable({
            data: {!! json_encode($basis_data_smp->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Data_Covid_SMP tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = data_covid_smp.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_data_covid(row.data())).show();
                tr.addClass('shown');
            }
        });

        var data_covid_sma = $('#Data_Covid_SMA').DataTable({
            data: {!! json_encode($basis_data_sma->toArray(), JSON_HEX_TAG) !!},
            columns: [
                {
                    className: 'dt-control',
                    orderable: false,
                    data: null,
                    defaultContent: '',
                },
                { data: 'school' },
                { data: 'bp' },
            ],
            order: [[1, 'asc']],
        });
    
        $('#Data_Covid_SMA tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = data_covid_sma.row(tr);
    
            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            } else {
                // Open this row
                row.child(format_data_covid(row.data())).show();
                tr.addClass('shown');
            }
        });
    });
</script>

@endsection