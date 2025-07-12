<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('perpustakaans', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nama_perpustakaan');
        $table->text('alamat');
        $table->string('no_telepon');
        $table->enum('tipe', ['Negeri', 'Swasta']);
        $table->double('latitude');
        $table->double('longitude');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perpustakaans');
    }
};
