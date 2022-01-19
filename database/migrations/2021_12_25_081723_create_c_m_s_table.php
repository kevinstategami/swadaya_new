<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('path')->nullable();
            $table->timestamps();
        });

        DB::table('c_m_s')->insert([
            'code' => 'SU',
            'description' => 'Kumpulan individu atau badan usaha yang menjalankan kegiatan usaha dengan asas kekeluargaan dan bertujuan untuk mensejahterakan anggotanya.'
        ]);
        DB::table('c_m_s')->insert([
            'code' => 'SJRH',
            'title' => '1896',
            'description' => 'Koperasi dikenalkan di Indonesia oleh Patih R. Aria Wiria Atmaja di Purwokerto'
        ]);
        DB::table('c_m_s')->insert([
            'code' => 'SJRH',
            'title' => '1947',
            'description' => '12 Juli, pergerakan koperasi di Indonesia mengadakan kongres koperasi yang pertama di Tasikmalaya. Ditetapkan sebagai Hari Koperasi Indonesia.'
        ]);
        DB::table('c_m_s')->insert([
            'code' => 'TJK',
            'title' => 'Berdasarkan UU No 25 Tahun 1992',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'FP1',
            'title' => 'Pasal 3 UU No 25 Tahun 1992',
            'description' => 'Koperasi bertujuan memajukan kesejahteraan anggota pada khususnya dan masyarakat pada umumnya serta ikut membangun tatanan perekonomian nasional dalam mewujudkan masyarakat yang maju, adil, dan makmur berlandaskan Pancasila dan UUD 1945',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'FP2',
            'title' => 'Pasal 4 UU No 25 Tahun 1992',
            'description' => 'Membangun dan mengembangkan potensi dan kemampuan ekonomi anggota pada khususnya serta masyarakat pada umumnya untuk meningkatkan kesejahteraan ekonomi dan social.',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'BGAU',
            'title' => 'Tentang Kami',
            'description' => 'Koperasi Jasa Millenium.',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'IMGAU',
            'title' => '',
            'description' => '',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'BGHM',
            'title' => 'Swadaya Utama',
            'description' => 'Koperasi Jasa Millenium.',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'BGAUHM',
            'title' => 'Tentang Kami !',
            'description' => 'Apa itu Swadaya Utama?',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'LG',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'LLG',
        ]);

        DB::table('c_m_s')->insert([
            'code' => 'BGSK',
        ]);
    }

    // LIST KODE
    // SU = Secara Umum
    // SJRH = Sejarah
    // TJK = Title Jenis Koperasi
    // BGAU = Background About Us section 1
    // IMGAU = Image About Us
    // LG = Logo
    // LLG = Loading Logo
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_m_s');
    }
}
