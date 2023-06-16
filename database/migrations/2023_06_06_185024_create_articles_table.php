<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('titre_fr');
            $table->string('titre_en');
            $table->text('contenu');
            $table->text('contenu_fr');
            $table->text('contenu_en');
            $table->date('date_de_creation');
            $table->unsignedBigInteger('etudient_id');
            $table->foreign('etudient_id')->references('id')->on('etudients');
     
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
        Schema::dropIfExists('articles');
    }
}
