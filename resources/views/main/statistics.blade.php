@extends('layout.main')

@section('section')

<section id="articles-detail">
    <div class="container flex flex-col justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-3/4">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <select id="graphs" class="select select-bordered w-full max-w-xs" onchange="SelectedGraph()">
                    <option disabled selected>Pilih Grafik</option>
                    <option id="graph-0" value="0">Data Statistik</option>
                    <option id="graph-1" value="1">Kepadatan Siswa</option>
                    <option id="graph-2" value="2">Ketersediaan Ventilasi</option>
                    <option id="graph-3" value="3">Ketersediaan Tempat Cuci Tangan</option>
                    <option id="graph-4" value="4">Ketersediaan Sabun Cuci Tangan</option>
                    <option id="graph-5" value="5">Ketersediaan Air di Toilet</option>
                    <option id="graph-6" value="6">Ketersediaan Handsanitizer</option>
                    <option id="graph-7" value="7">Ketersediaan Masker</option>
                    <option id="graph-8" value="8">Ketaatan Penggunaan Masker</option>
                    <option id="graph-9" value="9">Ketersediaan Thermogun</option>
                    <option id="graph-10" value="10">Ketersediaan Satgas Covid-19</option>
                    <option id="graph-11" value="11">Ketersediaan Protokol Kesehatan</option>
                    <option id="graph-12" value="12">Ketersediaan Prosedur Penanganan Covid-19</option>
                    <option id="graph-13" value="13">Ketersediaan Media Informasi Covid-19</option>
                </select>
                <div class="" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Data Statistik</span>
                    <div class="divider my-0 mx-32"></div>
                    <div>
                        <span class="flex justify-start text-lg md:text-xl">Masa Pemantauan Kasus : @if($setting->count()) {{ $setting[0]->pemantauan_kasus }} @endif </span>
                        <span class="flex justify-start text-lg md:text-xl">Masa Pemantauan Kontak Erat : @if($setting->count()) {{ $setting[0]->pemantauan_kontak_erat }} @endif </span>
                    </div>                      
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Kepadatan Siswa --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Kepadatan Siswa</span>
                    <div class="divider my-0 mx-32"></div>
                    <div class="mb-3">
                        <canvas id="chart_kepadatan_siswa_SD" class="w-full"></canvas>
                    </div>
                    <div class="mb-3">
                        <canvas id="chart_kepadatan_siswa_SMP" class="w-full"></canvas>
                    </div>
                    <div class="mb-3">
                        <canvas id="chart_kepadatan_siswa_SMA" class="w-full"></canvas>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Ketersediaan Ventilasi --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Ventilasi</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Sekolah</th>
                                <th>Ventilasi (tiap kelas)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventilasi_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>{{ $v->answer }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Sekolah</th>
                                <th>Ventilasi (tiap kelas)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventilasi_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>{{ $v->answer }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Sekolah</th>
                                <th>Ventilasi (tiap kelas)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ventilasi_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>{{ $v->answer }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>                
                    <div class="divider my-0"></div>
                </div>

                {{-- Ketersediaan Tempat Cuci Tangan --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Tempat Cuci Tangan</span>
                    <div class="divider my-0 mx-32"></div>   
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Tempat Cuci Tangan</th></tr></thead>
                        <tbody>
                            @foreach($tempat_cuci_tangan_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-flex" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-flex" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                    {{ $v->description }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Tempat Cuci Tangan</th></tr></thead>
                        <tbody>
                            @foreach($tempat_cuci_tangan_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-flex" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-flex" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                    {{ $v->description }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Tempat Cuci Tangan</th></tr></thead>
                        <tbody>
                            @foreach($tempat_cuci_tangan_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-flex" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 inline-flex" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                    {{ $v->description }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>      
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketersediaan Sabun Cuci Tangan --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Sabun Cuci Tangan</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Sabun Cuci Tangan</th></tr></thead>
                        <tbody>
                            @foreach($sabun_cuci_tangan_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Sabun Cuci Tangan</th></tr></thead>
                        <tbody>
                            @foreach($sabun_cuci_tangan_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Sabun Cuci Tangan</th></tr></thead>
                        <tbody>
                            @foreach($sabun_cuci_tangan_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>   
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketersediaan Air di Toilet --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Air di Toilet</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Air di Toilet</th></tr></thead>
                        <tbody>
                            @foreach($air_toilet_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Air di Toilet</th></tr></thead>
                        <tbody>
                            @foreach($air_toilet_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Air di Toilet</th></tr></thead>
                        <tbody>
                            @foreach($air_toilet_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                </div>

                {{-- Ketersediaan Handsanitizer --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Handsanitizer</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Handsanitizer</th></tr></thead>
                        <tbody>
                            @foreach($handsanitizer_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Handsanitizer</th></tr></thead>
                        <tbody>
                            @foreach($handsanitizer_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Handsanitizer</th></tr></thead>
                        <tbody>
                            @foreach($handsanitizer_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketersediaan Masker --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Masker</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Masker</th></tr></thead>
                        <tbody>
                            @foreach($masker_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Masker</th></tr></thead>
                        <tbody>
                            @foreach($masker_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Masker</th></tr></thead>
                        <tbody>
                            @foreach($masker_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketaatan Penggunaan Masker --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketaatan Penggunaan Masker</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketaatan Penggunaan Masker</th></tr></thead>
                        <tbody>
                            @foreach($ketaatan_masker_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketaatan Penggunaan Masker</th></tr></thead>
                        <tbody>
                            @foreach($ketaatan_masker_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketaatan Penggunaan Masker</th></tr></thead>
                        <tbody>
                            @foreach($ketaatan_masker_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>      
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketersediaan Thermogun --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Thermogun</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Thermogun</th></tr></thead>
                        <tbody>
                            @foreach($thermogun_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Thermogun</th></tr></thead>
                        <tbody>
                            @foreach($thermogun_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Thermogun</th></tr></thead>
                        <tbody>
                            @foreach($thermogun_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketersediaan Satgas Covid-19 --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Satgas Covid-19</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Satgas Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($satgas_covid_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Satgas Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($satgas_covid_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Satgas Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($satgas_covid_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketersediaan Protokol Kesehatan --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Protokol Kesehatan</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Protokol Kesehatan</th></tr></thead>
                        <tbody>
                            @foreach($protokol_kesehatan_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Protokol Kesehatan</th></tr></thead>
                        <tbody>
                            @foreach($protokol_kesehatan_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Protokol Kesehatan</th></tr></thead>
                        <tbody>
                            @foreach($protokol_kesehatan_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketersediaan Prosedur Penanganan Covid-19 --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Prosedur Penanganan Covid-19</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Prosedur Penanganan Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($prosedur_covid_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Prosedur Penanganan Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($prosedur_covid_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Prosedur Penanganan Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($prosedur_covid_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="divider my-0 mb-6"></div>
                </div>

                {{-- Ketersediaan Media Informasi Covid-19 --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ketersediaan Media Informasi Covid-19</span>
                    <div class="divider my-0 mx-32"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Dasar</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Media Informasi Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($media_informasi_SD as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Pertama</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Media Informasi Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($media_informasi_SMP as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> 
                    <div class="divider my-0"></div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <table class="table w-full">
                        <thead><tr><th>No</th><th>Nama Sekolah</th><th>Ketersediaan Media Informasi Covid-19</th></tr></thead>
                        <tbody>
                            @foreach($media_informasi_SMA as $v)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $v->school }}</td>
                                <td>
                                    @if($v->answer == 'Ya')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #22c55e;transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" viewBox="0 0 24 24" style="fill: #ef4444;transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="divider my-0 mb-6"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/tabs.js') }}"></script>
<script src="{{ asset('/js/chart.js') }}"></script>
<script>
    const ctx_a = document.getElementById('chart_kepadatan_siswa_SD');
    const ctx_b = document.getElementById('chart_kepadatan_siswa_SMP');
    const ctx_c = document.getElementById('chart_kepadatan_siswa_SMA');
    var labels_a = {{ Js::from($labels_kepadatan_siswa_SD) }}, data_a = {{ Js::from($data_SD) }}, batas_a = {{ Js::from($batas_SD) }};
    var labels_b = {{ Js::from($labels_kepadatan_siswa_SMP) }}, data_b = {{ Js::from($data_SMP) }}, batas_b = {{ Js::from($batas_SMP) }};
    var labels_c = {{ Js::from($labels_kepadatan_siswa_SMA) }}, data_c = {{ Js::from($data_SMA) }}, batas_c = {{ Js::from($batas_SMA) }};
    var colorBar = ['rgba(255, 99, 132, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 205, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(54, 162, 235, 0.2)','rgba(153, 102, 255, 0.2)','rgba(201, 203, 207, 0.2)'];
    var colorBorder = ['rgb(255, 99, 132)','rgb(255, 159, 64)','rgb(255, 205, 86)','rgb(75, 192, 192)','rgb(54, 162, 235)','rgb(153, 102, 255)','rgb(201, 203, 207)'];

    new Chart(ctx_a, {type: 'bar', data: {labels: labels_a, datasets: [{label: 'Kepadatan Siswa SD', data: data_a, backgroundColor: colorBar, borderColor: colorBorder,borderWidth: 1}, {label: 'Batas', data: batas_a, type: 'line', order: 1, fill: false, borderColor: 'rgb(54, 162, 235)'}]},options: {scales: {y: {beginAtZero: true}},}});
    new Chart(ctx_b, {type: 'bar', data: {labels: labels_b, datasets: [{label: 'Kepadatan Siswa SMP', data: data_b, backgroundColor: colorBar, borderColor: colorBorder,borderWidth: 1}, {label: 'Batas', data: batas_b, type: 'line', order: 1, fill: false, borderColor: 'rgb(54, 162, 235)'}]},options: {scales: {y: {beginAtZero: true}},}});
    new Chart(ctx_c, {type: 'bar', data: {labels: labels_c, datasets: [{label: 'Kepadatan Siswa SMA', data: data_c, backgroundColor: colorBar, borderColor: colorBorder,borderWidth: 1}, {label: 'Batas', data: batas_c, type: 'line', order: 1, fill: false, borderColor: 'rgb(54, 162, 235)'}]},options: {scales: {y: {beginAtZero: true}},}});

</script>
      
@endsection