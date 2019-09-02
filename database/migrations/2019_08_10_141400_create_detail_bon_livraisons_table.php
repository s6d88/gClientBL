<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailBonLivraisonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_bon_livraisons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bl')->unsigned();
            $table->foreign('id_bl')->references('id')->on('bon_livraisons')->onDelete('cascade');
            $table->string('product');
            $table->string('qte');
            $table->string('prix');
            $table->string('montant_ht');
            $table->string('montant_tva');
            $table->string('montant_ttc');
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
        Schema::dropIfExists('detail_bon_livraisons');
    }
}
