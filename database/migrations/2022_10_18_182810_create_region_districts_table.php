<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('region_districts', function (Blueprint $table) {
            $table->id();

            $table->foreignId('city_id')
            ->constrained('shipping_cities')
            ->onDelete('cascade');

            $table->foreignId('region_id')
            ->constrained('city_regions')
            ->onDelete('cascade');

            $table->string('district_name');
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
        Schema::dropIfExists('region_districts');
    }
};
