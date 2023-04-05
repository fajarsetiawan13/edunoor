<div>
    <div class="card flex flex-row align-items-center self-center w-[300px] h-[200px] rounded-none"
        id="student-card-print" style="background-image: url('/img/card-school.webp');">
        <figure class="bg-white w-1/2 my-3 ml-3 mr-0 w-100 h-100 rounded-r-none rounded-l-2xl">
            @if($this->qr_image)
            <img src="{{ asset('/' . $this->qr_image) }}" alt="QR Code Image for Student">
            @else
            <img src="" alt="QR Code Image for Student">
            @endif
        </figure>
        <div class="card-body pl-2 pr-0 gap-0 bg-white my-3 mr-3 rounded-r-2xl w-100 h-100">
            <h6 class="card-title text-xs">{{ $this->school }}</h6>
            <div class="divider my-0"></div>
            <p class="text-[10px]">Nama : {{ $this->name }}</p>
            <p class="text-[10px]">NISN : {{ $this->nisn }}</p>
            <p class="text-[10px]">Sekolah : {{ $this->school }}</p>
        </div>
    </div>
    <label for="download-qr-student" onclick="cetakStudentCard()"
        class="btn btn-sm btn-secondary self-center text-white text-sm w-1/3 mt-2">Cetak Kartu</label>
    <script>
        function cetakStudentCard(){
           html2canvas(document.querySelector("#student-card-print")).then(canvas => {
           document.querySelector("#resultStdCard").appendChild(canvas)
       });
    }
    function unduhKartu(){
        var canvas = document.querySelector("#resultStdCard canvas");
        var anchor = document.createElement('a');
        anchor.href = canvas.toDataURL('image/png');
        anchor.download = "Qr-Student.png";
        anchor.click();
        location.reload();
    }
    </script>
</div>