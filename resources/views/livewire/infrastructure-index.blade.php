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
    
    @if(!empty($infrastructure->count()))
    <table class="table table-fixed mb-3">
        <thead><tr><th colspan="2">Profil Sekolah</th></tr></thead>
        <tbody>
            <tr class="hover">
                <td class="w-[20%] text-left align-middle">Nama Sekolah</td>
                <td class="w-[80%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->school_id == null) ? '-' : $infrastructure[0]->school->name}}</td>
            </tr>
            <tr class="hover">
                <td class="w-[20%] text-left align-middle">Alamat</td>
                <td class="w-[80%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->school_address == null) ? '-' : $infrastructure[0]->school_address }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[20%] text-left align-middle">Jenjang Pendidikan</td>
                <td class="w-[80%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->school_bp == null) ? '-' : $infrastructure[0]->school_bp }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-fixed mb-3">
        <thead><tr><th colspan="4">Fasilitas Sekolah</th></tr></thead>
        <tbody>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">No</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Variabel</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">Data</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">Jumlah - Keterangan Data</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">1.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Luas Sekolah</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->A1 == null) ? '-' : $infrastructure[0]->A1 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_A1 == null) ? '-' : $infrastructure[0]->explanation_A1 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">2.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Luas Ruang Terbuka</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->A2 == null) ? '-' : $infrastructure[0]->A2 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_A2 == null) ? '-' : $infrastructure[0]->explanation_A2 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">3.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Jumlah Kelas</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->A3 == null) ? '-' : $infrastructure[0]->A3 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_A3 == null) ? '-' : $infrastructure[0]->explanation_A3 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">4.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Luas Ruang Kelas</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->A4 == null) ? '-' : $infrastructure[0]->A4 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_A4 == null) ? '-' : $infrastructure[0]->explanation_A4 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">5.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ventilasi</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->A5 == null) ? '-' : $infrastructure[0]->A5 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_A5 == null) ? '-' : $infrastructure[0]->explanation_A5 }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-fixed mb-3">
        <thead><tr><th colspan="4">Profil Sumber Daya Manusia</th></tr></thead>
        <tbody>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">No</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Variabel</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">Data</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">Jumlah - Keterangan Data</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">1.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Jumlah Guru</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->B1 == null) ? '-' : $infrastructure[0]->B1 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_B1 == null) ? '-' : $infrastructure[0]->explanation_B1 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">2.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Total Jumlah Siswa</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->B2 == null) ? '-' : $infrastructure[0]->B2 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_B2 == null) ? '-' : $infrastructure[0]->explanation_B2 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line"></td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Siswa Laki-laki</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->B3 == null) ? '-' : $infrastructure[0]->B3 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_B3 == null) ? '-' : $infrastructure[0]->explanation_B3 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line"></td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Siswa Perempuan</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->B4 == null) ? '-' : $infrastructure[0]->B4 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_B4 == null) ? '-' : $infrastructure[0]->explanation_B4 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">3.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Jumlah Tenaga Administrasi</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->B5 == null) ? '-' : $infrastructure[0]->B5 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_B5 == null) ? '-' : $infrastructure[0]->explanation_B5 }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-fixed mb-3">
        <thead><tr><th colspan="4">Sarana Sanitasi</th></tr></thead>
        <tbody>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">No</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Variabel</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">Data</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">Jumlah - Keterangan Data</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">1.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Total Jumlah Toilet</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C1 + $infrastructure[0]->C2) }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line"></td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line"></td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Toilet Laki-laki</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C1 == null) ? '-' : $infrastructure[0]->C1 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C1 == null) ? '-' : $infrastructure[0]->explanation_C1 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line"></td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Toilet Perempuan</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C2 == null) ? '-' : $infrastructure[0]->C2 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C2 == null) ? '-' : $infrastructure[0]->explanation_C2 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">2.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersedian Air di Toilet</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C3 == null) ? '-' : $infrastructure[0]->C3 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C3 == null) ? '-' : $infrastructure[0]->explanation_C3 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">3.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Sabun Cuci Tangan di Depan Kelas</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C4 == null) ? '-' : $infrastructure[0]->C4 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C4 == null) ? '-' : $infrastructure[0]->explanation_C4 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">4.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Disinfektan Toilet</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C5 == null) ? '-' : $infrastructure[0]->C5 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C5 == null) ? '-' : $infrastructure[0]->explanation_C5 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">5.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Tempat Cuci Tangan di Depan Kelas</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C6 == null) ? '-' : $infrastructure[0]->C6 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C6 == null) ? '-' : $infrastructure[0]->explanation_C6 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">6.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Handsanitizer</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C7 == null) ? '-' : $infrastructure[0]->C7 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C7 == null) ? '-' : $infrastructure[0]->explanation_C7 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">7.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Thermogun</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C8 == null) ? '-' : $infrastructure[0]->C8 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C8 == null) ? '-' : $infrastructure[0]->explanation_C8 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">8.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Masker</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C9 == null) ? '-' : $infrastructure[0]->C9 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C9 == null) ? '-' : $infrastructure[0]->explanation_C9 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">9.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketaatan Penggunaan Masker</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->C10 == null) ? '-' : $infrastructure[0]->C10 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_C10 == null) ? '-' : $infrastructure[0]->explanation_C10 }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-fixed mb-3">
        <thead><tr><th colspan="4">Kebijakan Covid-19</th></tr></thead>
        <tbody>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">No</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Variabel</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">Data</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">Jumlah - Keterangan Data</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">1.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Satgas Covid-19</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->D1 == null) ? '-' : $infrastructure[0]->D1 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_D1 == null) ? '-' : $infrastructure[0]->explanation_D1 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">2.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Sosialisasi Protokol Kesehatan</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->D2 == null) ? '-' : $infrastructure[0]->D2 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_D2 == null) ? '-' : $infrastructure[0]->explanation_D2 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">3.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Prosedur Penanganan Covid-19</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->D3 == null) ? '-' : $infrastructure[0]->D3 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_D3 == null) ? '-' : $infrastructure[0]->explanation_D3 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">4.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Media Informasi Covid-19</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->D4 == null) ? '-' : $infrastructure[0]->D4 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_D4 == null) ? '-' : $infrastructure[0]->explanation_D4 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">5.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Peraturan/Tata Tertib Covid-19</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->D5 == null) ? '-' : $infrastructure[0]->D5 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_D5 == null) ? '-' : $infrastructure[0]->explanation_D5 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">6.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Ketersediaan Kantin Sehat</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->D6 == null) ? '-' : $infrastructure[0]->D6 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_D6 == null) ? '-' : $infrastructure[0]->explanation_D6 }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table table-fixed mb-3">
        <thead><tr><th colspan="4">Data Covid-19</th></tr></thead>
        <tbody>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">No</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Variabel</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">Data</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">Jumlah - Keterangan Data</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">1.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Data Covid-19 Tahunan</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->E1 == null) ? '-' : $infrastructure[0]->E1 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_E1 == null) ? '-' : $infrastructure[0]->explanation_E1 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">2.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Data Covid-19 Per Bulan</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->E2 == null) ? '-' : $infrastructure[0]->E2 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_E2 == null) ? '-' : $infrastructure[0]->explanation_E2 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">3.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Pemusatan Covid-19 pada Kelas Tertentu</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->E3 == null) ? '-' : $infrastructure[0]->E3 }}</td>
                <td class="w-[50%] text-left align-middle whitespace-pre-line">{{ ($infrastructure[0]->explanation_E3 == null) ? '-' : $infrastructure[0]->explanation_E3 }}</td>
            </tr>
            <tr class="hover">
                <td class="w-[5%] text-left align-middle whitespace-pre-line">4.</td>
                <td class="w-[30%] text-left align-middle whitespace-pre-line">Catatan</td>
                <td class="w-[15%] text-left align-middle whitespace-pre-line" colspan="2">{{ ($infrastructure[0]->notes == null) ? '-' : $infrastructure[0]->notes }}</td>
            </tr>
        </tbody>
    </table>

    <a href="/sch/{{ $qr_page }}/edit" class="btn w-full md:w-1/4">Edit Data</a>
    @else
    @livewire('infrastructure-create')
    @endif
    
    <script>
        window.addEventListener('refresh-page', event => {
           window.location.reload(false); 
        })
    </script>
</div>