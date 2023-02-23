@extends('layout.dashboard')

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

<section id="dashboard" class="py-16">
    <div class="container flex flex-col justify-center gap-3 mx-auto px-4 py-4 md:flex-row">
        <div class="card w-full bg-base-100 shadow-lg md:w-2/3">
            <div class="card-body">
                <h2 class="card-title">{{ $title }}</h2>
                <div class="divider my-0"></div>
                <table class="table w-full mb-2">
                    <thead>
                        <tr class="hover">
                            <th class="text-center" colspan="3">{{ $school[0]->school->name }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="hover">
                            <td class="w-2/12">Nama Sekolah</td>
                            <td class="w-1/12">:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->school->name }}</td>
                        </tr>
                        <tr class="hover">
                            <td class="w-2/12">Bidang Pendidikan</td>
                            <td class="w-1/12">:</td>
                            <td class="whitespace-pre-line">{{ $school[0]->school->bp }}</td>
                        </tr>
                        <tr class="hover">
                            <td class="w-2/12">Tanggal Wawancara</td>
                            <td class="w-1/12">:</td>
                            @if(!empty($infrastructure))
                            <td class="whitespace-pre-line">{{ ($infrastructure[0]['date_created']) ? $infrastructure[0]['date_created'] : '-' }}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>
                <form action="/sch-infrastructure" method="POST">
                    @if(!empty($infrastructure))
                    @method('put')
                    @endif
                    @csrf
                    <table class="table table-fixed w-full">
                        <thead>
                            <tr>
                                <th class="w-3/12">Pertanyaan</th>
                                <th class="w-3/12">Jawaban</th>
                                <th class="w-6/12">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;?>
                            @foreach($question as $q)
                            <tr class="hover">
                                <td class="text-left whitespace-pre-line">{!! $q->question !!}</td>
                                @if(!empty($infrastructure))
                                <td class="text-left whitespace-pre-line"><input id="{{ 'answer_' . $i }}" name="{{ 'answer_' . $i }}" type="text" class="input input-xs md:input-sm input-ghost w-full" value="{{ ($infrastructure[0]['answer_' . $i]) ? $infrastructure[0]['answer_' . $i] : '-' }}"></td>
                                <td class="text-left whitespace-pre-line"><input id="{{ 'explanation_' . $i }}" name="{{ 'explanation_' . $i }}" type="text" class="input input-xs md:input-sm input-ghost w-full" value="{{ ($infrastructure[0]['explanation_' . $i]) ? $infrastructure[0]['explanation_' . $i] : '-' }}"></td>
                                @else
                                <td class="text-left whitespace-pre-line"><input id="{{ 'answer_' . $i }}" name="{{ 'answer_' . $i }}" type="text" class="input input-xs md:input-sm input-ghost w-full"></td>
                                <td class="text-left whitespace-pre-line"><input id="{{ 'explanation_' . $i }}" name="{{ 'explanation_' . $i }}" type="text" class="input input-xs md:input-sm input-ghost w-full"></td>
                                @endif
                            </tr>
                            <?php $i++;?>
                            @endforeach
                        </tbody>
                    </table>
                    <input type="text" id="school_id" name="school_id" value="{{ $school[0]->school->id }}" hidden>
                    <div class="flex justify-start my-2">
                        <button type="submit" class="btn btn-xs text-xs md:btn-sm md:text-sm btn-primary text-white">Simpan Data</button >
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection