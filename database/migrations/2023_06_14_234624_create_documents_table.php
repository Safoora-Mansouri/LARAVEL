<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titre')->nullable();
            $table->string('titre_fr')->nullable();
            $table->string('titre_en')->nullable();
            $table->date('date')->nullable();
            $table->string('file')->nullable();
            $table->unsignedBigInteger('etudient_id');
            $table->foreign('etudient_id')->references('id')->on('etudients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
