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
                    <option id="graph-7" value="7">Kepadatan Siswa</option>
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
                        <table class="table table-compact w-full">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Sekolah</th>
                              <th>Guru</th>
                              <th>Siswa</th>
                              <th>Tenada Administrasi</th>
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
                        <table class="table table-compact w-full">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Sekolah</th>
                              <th>Guru</th>
                              <th>Siswa</th>
                              <th>Tenada Administrasi</th>
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
                        <table class="table table-compact w-full">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama Sekolah</th>
                              <th>Guru</th>
                              <th>Siswa</th>
                              <th>Tenada Administrasi</th>
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
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_sd as $sd)
                                <tr class="hover">
                                    <td rowspan="10" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="10" class="text-left align-top whitespace-pre-line">{{ $sd->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Jumlah Toilet</td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->C1 }}</td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_C1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersedian Air di Toilet</td>
                                    <td class="text-left align-top">
                                        @if($sd->C2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->C2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_C2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Sabun Cuci Tangan di Toilet</td>
                                    <td class="text-left align-top">
                                        @if($sd->C3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->C3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_C3 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Disinfektan Toilet</td>
                                    <td class="text-left align-top">
                                        @if($sd->C4 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->C4 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_C4 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Tempat Cuci Tangan di Depan Kelas</td>
                                    <td class="text-left align-top">
                                        @if($sd->C5 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->C5 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_C5 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Handsanitizer</td>
                                    <td class="text-left align-top">
                                        @if($sd->C6 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->C6 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_C6 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Thermogun</td>
                                    <td class="text-left align-top">
                                        @if($sd->C7 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->C7 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_C7 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Masker</td>
                                    <td class="text-left align-top">
                                        @if($sd->C8 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->C8 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_C8 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-left-radius: 0">Ketaatan Penggunaan Masker</td>
                                    <td class="text-left align-top border-b">
                                        @if($sd->C9 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->C9 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $sd->desc_C9 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_smp as $smp)
                                <tr class="hover">
                                    <td rowspan="10" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="10" class="text-left align-top whitespace-pre-line">{{ $smp->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Jumlah Toilet</td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->C1 }}</td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_C1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersedian Air di Toilet</td>
                                    <td class="text-left align-top">
                                        @if($smp->C2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->C2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_C2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Sabun Cuci Tangan di Toilet</td>
                                    <td class="text-left align-top">
                                        @if($smp->C3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->C3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_C3 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Disinfektan Toilet</td>
                                    <td class="text-left align-top">
                                        @if($smp->C4 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->C4 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_C4 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Tempat Cuci Tangan di Depan Kelas</td>
                                    <td class="text-left align-top">
                                        @if($smp->C5 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->C5 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_C5 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Handsanitizer</td>
                                    <td class="text-left align-top">
                                        @if($smp->C6 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->C6 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_C6 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Thermogun</td>
                                    <td class="text-left align-top">
                                        @if($smp->C7 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->C7 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_C7 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Masker</td>
                                    <td class="text-left align-top">
                                        @if($smp->C8 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->C8 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_C8 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-left-radius: 0">Ketaatan Penggunaan Masker</td>
                                    <td class="text-left align-top border-b">
                                        @if($smp->C9 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->C9 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $smp->desc_C9 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_sma as $sma)
                                <tr class="hover">
                                    <td rowspan="10" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="10" class="text-left align-top whitespace-pre-line">{{ $sma->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Jumlah Toilet</td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->C1 }}</td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_C1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersedian Air di Toilet</td>
                                    <td class="text-left align-top">
                                        @if($sma->C2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->C2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_C2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Sabun Cuci Tangan di Toilet</td>
                                    <td class="text-left align-top">
                                        @if($sma->C3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->C3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_C3 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Disinfektan Toilet</td>
                                    <td class="text-left align-top">
                                        @if($sma->C4 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->C4 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_C4 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Tempat Cuci Tangan di Depan Kelas</td>
                                    <td class="text-left align-top">
                                        @if($sma->C5 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->C5 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_C5 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Handsanitizer</td>
                                    <td class="text-left align-top">
                                        @if($sma->C6 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->C6 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_C6 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Thermogun</td>
                                    <td class="text-left align-top">
                                        @if($sma->C7 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->C7 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_C7 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Masker</td>
                                    <td class="text-left align-top">
                                        @if($sma->C8 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->C8 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_C8 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-left-radius: 0">Ketaatan Penggunaan Masker</td>
                                    <td class="text-left align-top border-b">
                                        @if($sma->C9 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->C9 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $sma->desc_C9 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
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
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_sd as $sd)
                                <tr class="hover">
                                    <td rowspan="7" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="7" class="text-left align-top whitespace-pre-line">{{ $sd->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Satgas Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($sd->D1 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->D1 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_D1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Sosialisasi Protokol Kesehatan</td>
                                    <td class="text-left align-top">
                                        @if($sd->D2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->D2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_D2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Prosedur Penanganan Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($sd->D3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->D3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_D3 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Media Informasi Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($sd->D4 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->D4 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_D4 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Peraturan/Tata Tertib Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($sd->D5 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->D5 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_D5 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-left-radius: 0">Ketersediaan Kantin Sehat</td>
                                    <td class="text-left align-top border-b">
                                        @if($sd->D6 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->D6 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $sd->desc_D6 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_smp as $smp)
                                <tr class="hover">
                                    <td rowspan="7" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="7" class="text-left align-top whitespace-pre-line">{{ $smp->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Satgas Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($smp->D1 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->D1 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_D1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Sosialisasi Protokol Kesehatan</td>
                                    <td class="text-left align-top">
                                        @if($smp->D2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->D2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_D2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Prosedur Penanganan Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($smp->D3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->D3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_D3 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Media Informasi Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($smp->D4 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->D4 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_D4 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Peraturan/Tata Tertib Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($smp->D5 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->D5 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_D5 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-left-radius: 0">Ketersediaan Kantin Sehat</td>
                                    <td class="text-left align-top border-b">
                                        @if($smp->D6 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->D6 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $smp->desc_D6 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_sma as $sma)
                                <tr class="hover">
                                    <td rowspan="7" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="7" class="text-left align-top whitespace-pre-line">{{ $sma->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Satgas Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($sma->D1 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->D1 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_D1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Sosialisasi Protokol Kesehatan</td>
                                    <td class="text-left align-top">
                                        @if($sma->D2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->D2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_D2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Prosedur Penanganan Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($sma->D3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->D3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_D3 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Media Informasi Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($sma->D4 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->D4 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_D4 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Ketersediaan Peraturan/Tata Tertib Covid-19</td>
                                    <td class="text-left align-top">
                                        @if($sma->D5 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->D5 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_D5 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-left-radius: 0">Ketersediaan Kantin Sehat</td>
                                    <td class="text-left align-top border-b">
                                        @if($sma->D6 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->D6 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $sma->desc_D6 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
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
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_sd as $sd)
                                <tr class="hover">
                                    <td rowspan="4" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="4" class="text-left align-top whitespace-pre-line">{{ $sd->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Data Covid-19 Setahun Terakhir</td>
                                    <td class="text-left align-top">
                                        @if($sd->E1 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->E1 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_E1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Jumlah dan Sebaran Kasus per Bulan</td>
                                    <td class="text-left align-top">
                                        @if($sd->E2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->E2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sd->desc_E2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-left-radius: 0">Pemusatan Covid-19 pada Kelas Tertentu</td>
                                    <td class="text-left align-top border-b">
                                        @if($sd->E3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sd->E3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $sd->desc_E3 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Mengegah Pertama</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_smp as $smp)
                                <tr class="hover">
                                    <td rowspan="4" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="4" class="text-left align-top whitespace-pre-line">{{ $smp->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Data Covid-19 Setahun Terakhir</td>
                                    <td class="text-left align-top">
                                        @if($smp->E1 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->E1 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_E1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Jumlah dan Sebaran Kasus per Bulan</td>
                                    <td class="text-left align-top">
                                        @if($smp->E2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->E2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $smp->desc_E2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-left-radius: 0">Pemusatan Covid-19 pada Kelas Tertentu</td>
                                    <td class="text-left align-top border-b">
                                        @if($smp->E3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($smp->E3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $smp->desc_E3 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span class="flex justify-start font-semibold text-lg md:text-xl mt-5 mb-3">Sekolah Menengah Atas</span>
                    <div class="overflow-x-auto">
                        <table class="table table-compact w-full">
                            <thead>
                                <tr>
                                    <th class="w-[5%]">No</th>
                                    <th class="w-[15%]">Nama Sekolah</th>
                                    <th class="w-[20%]">Variabel</th>
                                    <th class="w-[10%]">Data</th>
                                    <th class="w-[50%]">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($basis_data_sma as $sma)
                                <tr class="hover">
                                    <td rowspan="4" class="text-left align-top whitespace-pre-line">{{ $loop->iteration }}</td>
                                    <td rowspan="4" class="text-left align-top whitespace-pre-line">{{ $sma->school }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Data Covid-19 Setahun Terakhir</td>
                                    <td class="text-left align-top">
                                        @if($sma->E1 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->E1 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_E1 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line">Jumlah dan Sebaran Kasus per Bulan</td>
                                    <td class="text-left align-top">
                                        @if($sma->E2 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->E2 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line">{{ $sma->desc_E2 }}</td>
                                </tr>
                                <tr class="hover">
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">Pemusatan Covid-19 pada Kelas Tertentu</td>
                                    <td class="text-left align-top border-b">
                                        @if($sma->E3 == 'Ya')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>
                                        @elseif($sma->E3 == 'Tidak')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm4.207 12.793-1.414 1.414L12 13.414l-2.793 2.793-1.414-1.414L10.586 12 7.793 9.207l1.414-1.414L12 10.586l2.793-2.793 1.414 1.414L13.414 12l2.793 2.793z"></path></svg>
                                        @endif
                                    </td>
                                    <td class="text-left align-top whitespace-pre-line border-b" style="border-bottom-right-radius: 0">{{ $sma->desc_E3 }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="divider my-0"></div>
                </div>

                {{-- Kepadatan Siswa --}}
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Kepadatan Siswa</span>
                    <div class="divider my-0 mx-32"></div>
                    <div class="mb-3">
                        <canvas id="kepadatan_siswa_SD" class="w-full"></canvas>
                    </div>
                    <div class="mb-3">
                        <canvas id="kepadatan_siswa_SMP" class="w-full"></canvas>
                    </div>
                    <div class="mb-3">
                        <canvas id="kepadatan_siswa_SMA" class="w-full"></canvas>
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
    
    const ctx_kepadatan_sd = document.getElementById('kepadatan_siswa_SD');
    const ctx_kepadatan_smp = document.getElementById('kepadatan_siswa_SMP');
    const ctx_kepadatan_sma = document.getElementById('kepadatan_siswa_SMA');
    var labels_sd = {{ Js::from($labels_kepadatan_SD) }}, data_kepadatan_sd = {{ Js::from($kepadatan_SD) }}, batas_sd = {{ Js::from($batas_SD) }};
    var labels_smp = {{ Js::from($labels_kepadatan_SMP) }}, data_kepadatan_smp = {{ Js::from($kepadatan_SMP) }}, batas_smp = {{ Js::from($batas_SMP) }};
    var labels_sma = {{ Js::from($labels_kepadatan_SMA) }}, data_kepadatan_sma = {{ Js::from($kepadatan_SMA) }}, batas_sma = {{ Js::from($batas_SMA) }};
   
    new Chart(ctx_kepadatan_sd, {type: 'bar', data: {labels: labels_sd, 
        datasets: [
            {label: 'Kepadatan Siswa SD', data: data_kepadatan_sd, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1}, 
            {label: 'Batas', data: batas_sd, type: 'line', order: 1, fill: false, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)'}
        ]
    },options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_kepadatan_smp, {type: 'bar', data: {labels: labels_smp, 
        datasets: [
            {label: 'Kepadatan Siswa SMP', data: data_kepadatan_smp, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1}, 
            {label: 'Batas', data: batas_smp, type: 'line', order: 1, fill: false, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)'}
        ]
    },options: {scales: {y: {beginAtZero: true}},}});

    new Chart(ctx_kepadatan_sma, {type: 'bar', data: {labels: labels_sma, 
        datasets: [
            {label: 'Kepadatan Siswa SMA', data: data_kepadatan_sma, backgroundColor: 'rgba(14, 165, 233, 0.3)', borderColor: 'rgba(14, 165, 233, 1', borderWidth: 1}, 
            {label: 'Batas', data: batas_sma, type: 'line', order: 1, fill: false, backgroundColor: 'rgba(239, 68, 68, 0.3)', borderColor: 'rgba(239, 68, 68, 1)'}
        ]
    },options: {scales: {y: {beginAtZero: true}},}});
</script>

@endsection