<?php

namespace Database\Seeders;

use App\Models\School;
use App\Models\Students;
use App\Models\Questionnaire;
use App\Models\Infrastructure;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Articles;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create(['name' => 'admin', 'username' => 'admin', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 1, 'is_active' => 1]);
        User::create(['name' => 'admin2', 'username' => 'admin2', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 1, 'is_active' => 2]);
        User::create(['name' => 'admin3', 'username' => 'admin3', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 1, 'is_active' => 2]);
        User::create(['name' => 'admin4', 'username' => 'admin4', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 1, 'is_active' => 2]);
        User::create(['name' => 'admin5', 'username' => 'admin5', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 1, 'is_active' => 2]);
        User::create(['name' => 'user', 'username' => 'user', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 2, 'is_active' => 1]);
        User::create(['name' => 'user2', 'username' => 'user2', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 2, 'is_active' => 2]);
        User::create(['name' => 'user3', 'username' => 'user3', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 2, 'is_active' => 2]);
        User::create(['name' => 'user4', 'username' => 'user4', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 2, 'is_active' => 2]);
        User::create(['name' => 'user5', 'username' => 'user5', 'password' => bcrypt('password'), 'image' => 'default.webp', 'role' => 2, 'is_active' => 2]);

        Students::create(['name' => 'Siswa 1 SMA N 12', 'nisn' => '11223344', 'school_id' => '1']);
        Students::create(['name' => 'Siswa 2 SMA N 12', 'nisn' => '22334455', 'school_id' => '1']);
        Students::create(['name' => 'Siswa 3 SMA N 12', 'nisn' => '33445566', 'school_id' => '1']);
        Students::create(['name' => 'Siswa 1 SMA N 1', 'nisn' => '11223344', 'school_id' => '2']);
        Students::create(['name' => 'Siswa 1 SMA N 1', 'nisn' => '22334455', 'school_id' => '2']);
        Students::create(['name' => 'Siswa 2 SMA N 1', 'nisn' => '33445566', 'school_id' => '2']);
        Students::create(['name' => 'Siswa 2 SMA N 3', 'nisn' => '11223344', 'school_id' => '3']);
        Students::create(['name' => 'Siswa 3 SMA N 3', 'nisn' => '22334455', 'school_id' => '3']);
        Students::create(['name' => 'Siswa 3 SMA N 3', 'nisn' => '33445566', 'school_id' => '3']);
        Students::create(['name' => 'Siswa 1 SMP IT Insan Cendekia', 'nisn' => '11223344', 'school_id' => '4']);
        Students::create(['name' => 'Siswa 2 SMP IT Insan Cendekia', 'nisn' => '22334455', 'school_id' => '4']);
        Students::create(['name' => 'Siswa 3 SMP IT Insan Cendekia', 'nisn' => '33445566', 'school_id' => '4']);
        Students::create(['name' => 'Siswa 1 SMP N 13', 'nisn' => '11223344', 'school_id' => '5']);
        Students::create(['name' => 'Siswa 2 SMP N 13', 'nisn' => '22334455', 'school_id' => '5']);
        Students::create(['name' => 'Siswa 3 SMP N 13', 'nisn' => '33445566', 'school_id' => '5']);
        Students::create(['name' => 'Siswa 1 MTs Al Asror', 'nisn' => '11223344', 'school_id' => '6']);
        Students::create(['name' => 'Siswa 2 MTs Al Asror', 'nisn' => '22334455', 'school_id' => '6']);
        Students::create(['name' => 'Siswa 3 MTs Al Asror', 'nisn' => '33445566', 'school_id' => '6']);
        Students::create(['name' => 'Siswa 1 SDN Bendan Ngisor', 'nisn' => '11223344', 'school_id' => '7']);
        Students::create(['name' => 'Siswa 2 SDN Bendan Ngisor', 'nisn' => '22334455', 'school_id' => '7']);
        Students::create(['name' => 'Siswa 3 SDN Bendan Ngisor', 'nisn' => '33445566', 'school_id' => '7']);
        Students::create(['name' => 'Siswa 1 SDN Petompon 2', 'nisn' => '11223344', 'school_id' => '8']);
        Students::create(['name' => 'Siswa 2 SDN Petompon 2', 'nisn' => '22334455', 'school_id' => '8']);
        Students::create(['name' => 'Siswa 3 SDN Petompon 2', 'nisn' => '33445566', 'school_id' => '8']);
        Students::create(['name' => 'Siswa 1 SDN Sukorejo 2', 'nisn' => '11223344', 'school_id' => '9']);
        Students::create(['name' => 'Siswa 2 SDN Sukorejo 2', 'nisn' => '22334455', 'school_id' => '9']);
        Students::create(['name' => 'Siswa 3 SDN Sukorejo 2', 'nisn' => '33445566', 'school_id' => '9']);

        School::create([
            'name' => 'SMA NEGERI 12',
            'npsn' => '20328911',
            'bp' => 'SMA',
            'status' => 'Negeri',
            'status_kepemilikan' => 'Pemerintah Daerah',
            'sk_pendirian' => '-',
            'sk_pendirian_tanggal' => '-',
            'sk_ijin_operasional' => '-',
            'sk_ijin_operasional_tanggal' => '-',
            'kepsek' => 'Endah Dyah Wardani',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        School::create([
            'name' => 'SMA NEGERI 01',
            'npsn' => '20328867',
            'bp' => 'SMA',
            'status' => 'Negeri',
            'status_kepemilikan' => 'Pemerintah Daerah',
            'sk_pendirian' => '3412/B/III',
            'sk_pendirian_tanggal' => '1955-07-01',
            'sk_ijin_operasional' => '035/0/1997',
            'sk_ijin_operasional_tanggal' => '1997-03-07',
            'kepsek' => 'Kusno',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        School::create([
            'name' => 'SMA NEGERI 03',
            'npsn' => '20328895',
            'bp' => 'SMA',
            'status' => 'Negeri',
            'status_kepemilikan' => 'Pemerintah Daerah',
            'sk_pendirian' => '035/0/197',
            'sk_pendirian_tanggal' => '1997-03-07',
            'sk_ijin_operasional' => '035/0/197',
            'sk_ijin_operasional_tanggal' => '1997-03-07',
            'kepsek' => 'Yuwana',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        School::create([
            'name' => 'SMP IT INSAN CENDEKIA',
            'npsn' => '69828771',
            'bp' => 'SMP',
            'status' => 'Swasta',
            'status_kepemilikan' => 'Yayasan',
            'sk_pendirian' => '421.7/1044/2014',
            'sk_pendirian_tanggal' => '2014-02-27',
            'sk_ijin_operasional' => '421.7/1044/2014',
            'sk_ijin_operasional_tanggal' => '2014-02-27',
            'kepsek' => 'Aproni',
            'akreditasi' => 'B',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        School::create([
            'name' => 'SMP NEGERI 13',
            'npsn' => '20328824',
            'bp' => 'SMP',
            'status' => 'Negeri',
            'status_kepemilikan' => 'Pemerintah Daerah',
            'sk_pendirian' => '030/U/1979',
            'sk_pendirian_tanggal' => '1979-04-01',
            'sk_ijin_operasional' => '480/C/1992',
            'sk_ijin_operasional_tanggal' => '1992-12-15',
            'kepsek' => 'Sri Wasetyastuti',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        School::create([
            'name' => 'MTs AL ASROR',
            'npsn' => '20364826',
            'bp' => 'SMP',
            'status' => 'Swasta',
            'status_kepemilikan' => '-',
            'sk_pendirian' => '-',
            'sk_pendirian_tanggal' => '-',
            'sk_ijin_operasional' => '-',
            'sk_ijin_operasional_tanggal' => '-',
            'kepsek' => 'Agung Sudaryanto,S.Pd',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        School::create([
            'name' => 'SD NEGERI BENDAN NGISOR',
            'npsn' => '20329403',
            'bp' => 'SD',
            'status' => 'Negeri',
            'status_kepemilikan' => 'Pemerintah Daerah',
            'sk_pendirian' => '421.2/001/IV/92/85',
            'sk_pendirian_tanggal' => '1985-10-01',
            'sk_ijin_operasional' => '-',
            'sk_ijin_operasional_tanggal' => '-',
            'kepsek' => 'Kapuranti, S. Pd',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        School::create([
            'name' => 'SD NEGERI PETOMPON 02',
            'npsn' => '20328751',
            'bp' => 'SD',
            'status' => 'Negeri',
            'status_kepemilikan' => 'Pemerintah Daerah',
            'sk_pendirian' => '420/4610',
            'sk_pendirian_tanggal' => '2010-08-25',
            'sk_ijin_operasional' => '420/4610',
            'sk_ijin_operasional_tanggal' => '2010-08-25',
            'kepsek' => 'Suwiji',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        School::create([
            'name' => 'SD NEGERI SUKOREJO 02',
            'npsn' => '20328565',
            'bp' => 'SD',
            'status' => 'Negeri',
            'status_kepemilikan' => 'Pemerintah Daerah',
            'sk_pendirian' => '-',
            'sk_pendirian_tanggal' => '-',
            'sk_ijin_operasional' => '-',
            'sk_ijin_operasional_tanggal' => '-',
            'kepsek' => 'Ary Sotyarini',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
        ]);

        Questionnaire::create(['question' => 'Berapa luas sekolah?']);
        Questionnaire::create(['question' => 'Berapa luas ruang terbukanya?']);
        Questionnaire::create(['question' => 'Berapa jumlah kelasnya?']);
        Questionnaire::create(['question' => 'Berapa luasan setiap kelasnya?']);
        Questionnaire::create(['question' => 'Berapa jumlah guru?']);
        Questionnaire::create(['question' => 'Berapa jumlah siswa?']);
        Questionnaire::create(['question' => 'Berapa jumlah tenaga administrasi?']);
        Questionnaire::create(['question' => 'Ada berapa jumlah ventilasi di setiap kelas?']);
        Questionnaire::create(['question' => 'Berapa jumlah toilet dalam lingkungan sekolah?']);
        Questionnaire::create(['question' => 'Apakah air di toilet sekolah selalu tersedia dan lancar?']);
        Questionnaire::create(['question' => 'Apakah tersedia sabun cuci tangan di setiap toilet?']);
        Questionnaire::create(['question' => 'Apakah toilet selalu dibersihkan menggunakan disinfektan?']);
        Questionnaire::create(['question' => 'Apakah tersedia tempat cuci tangan di setiap depan kelas?']);
        Questionnaire::create(['question' => 'Apakah tersedia <em>hand sanitizer</em> yang cukup di sekolah?']);
        Questionnaire::create(['question' => 'Apakah di setiap teras sekolah tersedia <em> hand sanitizer</em>?']);
        Questionnaire::create(['question' => 'Apakah sekolah menggunakan thermo gun untuk mengukur suhu tubuh guru, karyawan, dan siswa?']);
        Questionnaire::create(['question' => 'Bagaimana ketaatan penggunaan masker di sekolah?']);
        Questionnaire::create(['question' => 'Apakah sekolah selalu menyediakan masker bagi yang terlupa memakainya dari rumah?']);
        Questionnaire::create(['question' => 'Apakah dilakukan sosialisasi untuk penerapan protokol kesehatan Covid-19?']);
        Questionnaire::create(['question' => 'Apakah tersedia media informasi, komunikasi, dan edukasi terhadap penerapan protokol kesehatan Covid-19?]']);
        Questionnaire::create(['question' => 'Apakah terdapat Covid-19 selama setahun terakhir?']);
        Questionnaire::create(['question' => 'Jika ada yang terkena Covid-19, berapa jumlahnya dan bagaimana sebaran per bulannya?']);
        Questionnaire::create(['question' => 'Apakah terjadi pemusatan pada kelas tertentu ketika ada yang terkena Covid-19?']);
        Questionnaire::create(['question' => 'Apakah ada satgas Covid-19 di sekolah?']);
        Questionnaire::create(['question' => 'Jika ada warga sekolah yang terkena Covid-19 bagaimana prosedur penanganannya?']);
        Questionnaire::create(['question' => 'Apakah dibuat peraturan/tata-tertib tentang Covid-19 di sekolah?']);
        Questionnaire::create(['question' => 'Apakah sekolah menerapkan kantin sehat?']);
        Questionnaire::create(['question' => 'Informasi Tambahan']);

        Articles::create([
            'user_id' => 1, 'title' => 'artikel pertama', 'slug' => 'artikel-pertama',
            'exerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Nemo cumque temporibus dolor voluptates perspiciatis a in voluptatum impedit quibusdam, nobis nisi expedita quidem. Qui maxime aliquid nam, harum perspiciatis, nobis accusantium similique explicabo facere repellendus illum quas dignissimos alias dolores voluptatibus sequi assumenda facilis consequatur nostrum sit autem voluptate. <br>Ratione recusandae ipsum veniam nemo reprehenderit vero vel aliquam dolores quaerat.'
        ]);
        Articles::create([
            'user_id' => 1, 'title' => 'artikel kedua', 'slug' => 'artikel-kedua',
            'exerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Nemo cumque temporibus dolor voluptates perspiciatis a in voluptatum impedit quibusdam, nobis nisi expedita quidem. Qui maxime aliquid nam, harum perspiciatis, nobis accusantium similique explicabo facere repellendus illum quas dignissimos alias dolores voluptatibus sequi assumenda facilis consequatur nostrum sit autem voluptate. <br>Ratione recusandae ipsum veniam nemo reprehenderit vero vel aliquam dolores quaerat.'
        ]);
        Articles::create([
            'user_id' => 1, 'title' => 'artikel ketiga', 'slug' => 'artikel-ketiga',
            'exerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Nemo cumque temporibus dolor voluptates perspiciatis a in voluptatum impedit quibusdam, nobis nisi expedita quidem. Qui maxime aliquid nam, harum perspiciatis, nobis accusantium similique explicabo facere repellendus illum quas dignissimos alias dolores voluptatibus sequi assumenda facilis consequatur nostrum sit autem voluptate. <br>Ratione recusandae ipsum veniam nemo reprehenderit vero vel aliquam dolores quaerat.'
        ]);
        Articles::create([
            'user_id' => 1, 'title' => 'artikel keempat', 'slug' => 'artikel-keempat',
            'exerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Nemo cumque temporibus dolor voluptates perspiciatis a in voluptatum impedit quibusdam, nobis nisi expedita quidem. Qui maxime aliquid nam, harum perspiciatis, nobis accusantium similique explicabo facere repellendus illum quas dignissimos alias dolores voluptatibus sequi assumenda facilis consequatur nostrum sit autem voluptate. <br>Ratione recusandae ipsum veniam nemo reprehenderit vero vel aliquam dolores quaerat.'
        ]);
        Articles::create([
            'user_id' => 1, 'title' => 'artikel kelima', 'slug' => 'artikel-kelima',
            'exerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Nemo cumque temporibus dolor voluptates perspiciatis a in voluptatum impedit quibusdam, nobis nisi expedita quidem. Qui maxime aliquid nam, harum perspiciatis, nobis accusantium similique explicabo facere repellendus illum quas dignissimos alias dolores voluptatibus sequi assumenda facilis consequatur nostrum sit autem voluptate. <br>Ratione recusandae ipsum veniam nemo reprehenderit vero vel aliquam dolores quaerat.'
        ]);
        Articles::create([
            'user_id' => 1, 'title' => 'artikel keenam', 'slug' => 'artikel-keenam',
            'exerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit',
            'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Nemo cumque temporibus dolor voluptates perspiciatis a in voluptatum impedit quibusdam, nobis nisi expedita quidem. Qui maxime aliquid nam, harum perspiciatis, nobis accusantium similique explicabo facere repellendus illum quas dignissimos alias dolores voluptatibus sequi assumenda facilis consequatur nostrum sit autem voluptate. <br>Ratione recusandae ipsum veniam nemo reprehenderit vero vel aliquam dolores quaerat.'
        ]);
    }
}
