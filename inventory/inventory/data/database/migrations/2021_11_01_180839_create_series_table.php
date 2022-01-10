<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->integer('volume')->nullable();
            $table->integer('year')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['title', 'volume']);
            $table->index('title');
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}
