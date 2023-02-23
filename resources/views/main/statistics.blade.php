@extends('layout.main')

@section('section')

<section id="articles-detail">
    <div class="container flex flex-col justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-3/4">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <div class="tabs flex justify-center my-6">
                    <a id="select-tab" class="tab tab-lifted">Luas Sekolah</a> 
                    <a id="select-tab" class="tab tab-lifted">Ruang Terbuka</a> 
                    <a id="select-tab" class="tab tab-lifted">Kepadatan Siswa</a>
                    <a id="select-tab" class="tab tab-lifted">Ventilasi</a>
                    <a id="select-tab" class="tab tab-lifted">Toilet</a>
                    <a id="select-tab" class="tab tab-lifted">Lain-lain</a>
                </div>
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Luas Sekolah</span>
                    <div class="divider my-0 mx-32"></div>
                    <div>
                        <canvas id="chart_3a" class="w-full"></canvas>
                    </div>                      
                    <div class="divider my-0 mb-6"></div>
                </div>
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Luas Ruang Terbuka</span>
                    <div class="divider my-0 mx-32"></div>
                    <div>
                        <canvas id="chart_3b" class="w-full"></canvas>
                    </div>                      
                    <div class="divider my-0"></div>
                </div>
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Kepadatan Siswa</span>
                    <div class="divider my-0 mx-32"></div>
                    <div>
                        <canvas id="chart_3c" class="w-full"></canvas>
                    </div>                      
                    <div class="divider my-0"></div>
                </div>
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Ventilasi Udara</span>
                    <div class="divider my-0 mx-32"></div>
                    <div>
                        <canvas id="chart_3d" class="w-full"></canvas>
                    </div>                      
                    <div class="divider my-0"></div>
                </div>
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Toilet</span>
                    <div class="divider my-0 mx-32"></div>
                    <div>
                        <canvas id="chart_3e" class="w-full"></canvas>
                    </div>                      
                    <div class="divider my-0"></div>
                </div>
                <div class="hidden" id="select-content">
                    <span class="flex justify-center font-semibold text-lg md:text-xl">Lain-lain</span>
                    <div class="divider my-0 mx-32"></div>
                    <div class="overflow-x-auto">
                        <table class="table w-full">
                            <thead>
                                <tr>
                                    <th rowspan="2">#</th>
                                    <th rowspan="2">Sekolah</th>
                                    <th rowspan="1" colspan="2" class="text-left">Aspek</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($infrastructures as $is)
                                <tr class="hover">
                                    <td rowspan="15">{{ $loop->iteration }}</td>
                                    <td rowspan="15">{{ $is->school->name }}</td>
                                    <tr class="hover">
                                        <td>Air di Toilet</th>
                                        <td>{!! ($is->answer_10 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Disinfektan Toilet</td>
                                        <td>{!! ($is->answer_12 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Sabun Cuci Tangan Di Toilet</td>
                                        <td>{!! ($is->answer_11 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Tempat Cuci Tangan</td>
                                        <td>{!! ($is->answer_13 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Sabun Cuci Tangan Di Tempat Cuci Tangan</td>
                                        <td>{!! ($is->answer_14 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Hand sanitizer di setiap kelas</td>
                                        <td>{!! ($is->answer_15 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>thermogun</td>
                                        <td>{!! ($is->answer_16 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Masker</td>
                                        <td>{!! ($is->answer_18 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Ketaatan Masker</td>
                                        <td>{!! ($is->answer_17 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Protokol Kesehatan</td>
                                        <td>{!! ($is->answer_26 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Sosialisasi Protokol Kesehatan</td>
                                        <td>{!! ($is->answer_19 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Satgas Covid-19</td>
                                        <td>{!! ($is->answer_24 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Prosedur penanganan Covid-19</td>
                                        <td>{!! ($is->answer_25 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                    <tr class="hover">
                                        <td>Kantin sehat</td>
                                        <td>{!! ($is->answer_27 == 'Ya') ? '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(34, 197, 94, 1);transform: ;msFilter:;"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm-1.999 14.413-3.713-3.705L7.7 11.292l2.299 2.295 5.294-5.294 1.414 1.414-6.706 6.706z"></path></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(239, 68, 68, 1);transform: ;msFilter:;"><path d="M9.172 16.242 12 13.414l2.828 2.828 1.414-1.414L13.414 12l2.828-2.828-1.414-1.414L12 10.586 9.172 7.758 7.758 9.172 10.586 12l-2.828 2.828z"></path><path d="M12 22c5.514 0 10-4.486 10-10S17.514 2 12 2 2 6.486 2 12s4.486 10 10 10zm0-18c4.411 0 8 3.589 8 8s-3.589 8-8 8-8-3.589-8-8 3.589-8 8-8z"></path></svg>' !!}</td>
                                    </tr>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>                   
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
    const ctx_a = document.getElementById('chart_3a');
    const ctx_b = document.getElementById('chart_3b');
    const ctx_c = document.getElementById('chart_3c');
    const ctx_d = document.getElementById('chart_3d');
    const ctx_e = document.getElementById('chart_3e');
    var labels_a = {{ Js::from($labels_a) }}, data_a = {{ Js::from($data_a) }};
    var labels_b = {{ Js::from($labels_b) }}, data_b = {{ Js::from($data_b) }};
    var labels_c = {{ Js::from($labels_c) }}, data_c = {{ Js::from($data_c) }};
    var labels_d = {{ Js::from($labels_d) }}, data_d = {{ Js::from($data_d) }};
    var labels_e = {{ Js::from($labels_e) }}, data_e = {{ Js::from($data_e) }};
    var colorBar = ['rgba(255, 99, 132, 0.2)','rgba(255, 159, 64, 0.2)','rgba(255, 205, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(54, 162, 235, 0.2)','rgba(153, 102, 255, 0.2)','rgba(201, 203, 207, 0.2)'];
    var colorBorder = ['rgb(255, 99, 132)','rgb(255, 159, 64)','rgb(255, 205, 86)','rgb(75, 192, 192)','rgb(54, 162, 235)','rgb(153, 102, 255)','rgb(201, 203, 207)'];

    new Chart(ctx_a, {type: 'bar', data: {labels: labels_a, datasets: [{label: 'Luas Sekolah', data: data_a, backgroundColor: colorBar, borderColor: colorBorder,borderWidth: 1}]},options: {scales: {y: {beginAtZero: true}},}});
    new Chart(ctx_b, {type: 'bar', data: {labels: labels_b, datasets: [{label: 'Luas Ruang Terbuka', data: data_b, backgroundColor: colorBar, borderColor: colorBorder,borderWidth: 1}]},options: {scales: {y: {beginAtZero: true}},}});
    new Chart(ctx_c, {type: 'bar', data: {labels: labels_c, datasets: [{label: 'Kepadatan Siswa', data: data_c, backgroundColor: colorBar, borderColor: colorBorder,borderWidth: 1}]},options: {scales: {y: {beginAtZero: true}},}});
    new Chart(ctx_d, {type: 'bar', data: {labels: labels_d, datasets: [{label: 'Ventilasi Udara', data: data_d, backgroundColor: colorBar, borderColor: colorBorder,borderWidth: 1}]},options: {scales: {y: {beginAtZero: true}},}});
    new Chart(ctx_e, {type: 'bar', data: {labels: labels_e, datasets: [{label: 'Toilet', data: data_e, backgroundColor: colorBar, borderColor: colorBorder,borderWidth: 1}]},options: {scales: {y: {beginAtZero: true}},}});

</script>
      
@endsection