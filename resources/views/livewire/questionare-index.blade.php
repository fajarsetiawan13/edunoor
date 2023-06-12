<div>
    @if(session()->has('success'))
    <div class="alert alert-success shadow-lg mb-3">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm md:text-md">{{ session('success') }}</span>
        </div>
    </div>
    @endif

    <div class="flex flex-row gap-2 justify-between mb-3">
        <select wire:model='paginate' class="select select-sm select-bordered w-full max-w-[75px] md:select-md">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
        </select>
        <select wire:model='filter' class="select select-sm select-bordered w-full max-w-[100px] md:select-md">
            <option value="SD" selected>SD</option>
            <option value="SMP">SMP</option>
            <option value="SMA">SMA</option>
        </select>
        {{-- <input wire:model='search' type="text" placeholder="Kolom Pencarian…" class="input input-sm input-bordered w-full max-w-sm md:max-w-md md:input-md" /> --}}
    </div>
    <table class="table w-full table-fixed mb-3">
        <thead>
            <tr>
                <th scope="col" class="w-[5%] text-left">#</th>
                <th scope="col" class="w-[35%] truncate text-left">Sekolah</th>
                <th scope="col" class="w-[35%] truncate text-left">Tanggal Wawancara</th>
                <th scope="col" class="w-[25%] truncate text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($questionnaire as $q)
            <tr class="hover">
                <td>{{ $loop->iteration }}</td>
                <td class="whitespace-pre-line">{!! $q->school->name !!}</td>
                <td class="whitespace-pre-line">{!! $q->created_at !!}</td>
                <td>
                    <a href="{{ $q->school->qr->qr_url }}" class="btn btn-xs md:btn-sm btn-accent tooltip inline-flex" data-tip="Lihat Kuesioner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="M19.903 8.586a.997.997 0 0 0-.196-.293l-6-6a.997.997 0 0 0-.293-.196c-.03-.014-.062-.022-.094-.033a.991.991 0 0 0-.259-.051C13.04 2.011 13.021 2 13 2H6c-1.103 0-2 .897-2 2v16c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2V9c0-.021-.011-.04-.013-.062a.952.952 0 0 0-.051-.259c-.01-.032-.019-.063-.033-.093zM16.586 8H14V5.414L16.586 8zM6 20V4h6v5a1 1 0 0 0 1 1h5l.002 10H6z"></path><path d="M8 12h8v2H8zm0 4h8v2H8zm0-8h2v2H8z"></path></svg>    
                    </a>
                    <a href="{{ $q->school->qr->qr_url }}/edit" class="btn btn-xs md:btn-sm btn-primary tooltip inline-flex" data-tip="Edit Kuesioner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 md:w-6 md:h-6" viewBox="0 0 24 24" style="fill: rgb(255, 255, 255);transform: ;msFilter:;"><path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path><path d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z"></path></svg>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $questionnaire->links() }}
    <input type="checkbox" id="questionare-update" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <label for="questionare-update" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            @livewire('questionare-update')
        </div>
    </div>
    <input type="checkbox" id="questionare-create" class="modal-toggle" />
    <div class="modal modal-bottom sm:modal-middle">
        <div class="modal-box">
            <label for="questionare-create" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
            @livewire('questionare-create')
        </div>
    </div>
</div>