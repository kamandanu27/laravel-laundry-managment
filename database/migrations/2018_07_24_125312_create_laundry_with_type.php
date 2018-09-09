<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaundryWithType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('laundrywithtype', function (Blueprint $table) {
            $table->integer('laundryid')->unsigned()->nullable();
            $table->foreign('laundryid')->references('id')
                ->on('laundries')->onDelete('cascade');

            $table->integer('typeid')->unsigned()->nullable();
            $table->foreign('typeid')->references('id')
                ->on('laundry_types')->onDelete('cascade');
                 $table->integer('number_of_item');

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
        Schema::dropIfExists('laundrywithtype');
    }
}
