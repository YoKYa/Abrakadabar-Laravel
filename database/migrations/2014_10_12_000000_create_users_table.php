<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username', 25)->unique();
            $table->string('password');
            $table->string('call_name', 25)->nullable();
            $table->string('tempat_lahir', 25)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan'])->nullable();
            $table->enum('status',['Guru', 'Siswa','Admin']);
            $table->string('detail')->nullable();
            $table->tinyInteger('cek')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
