<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuruuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guruu', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id');
            $table->string('nip', 30)->nullable();
            $table->string('nama_guru', 50);
            $table->string('avatar')->nullable();
            $table->enum('jk', ['L', 'P']);
            $table->string('telp', 15)->nullable();
            $table->string('tmp_lahir', 50)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('agama');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guruu');
    }
}
