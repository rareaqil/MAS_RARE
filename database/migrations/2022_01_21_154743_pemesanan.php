<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pemesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_user')->unique();
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->integer('jumlah_orang')->nullable();            
        });

        Schema::table('pemesanan', function($table)
        {
            $table->foreign(['id_user'],'fk_id_user')->references('id')->on('user_test');

        });
            
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pemesanan', function($table)
        {
        Schema::dropIfExists('pemesanan');
        $table->dropForeign('id_user');

        });
    }
}
