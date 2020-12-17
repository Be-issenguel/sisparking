<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCajonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajones', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->enum('status',['DISPONIVEL','OCUPADO'])->default('OCUPADO');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')
            ->references('id')
            ->on('tipos')
            ->onDelete('cascade');
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
        Schema::dropIfExists('cajones');
    }
}
