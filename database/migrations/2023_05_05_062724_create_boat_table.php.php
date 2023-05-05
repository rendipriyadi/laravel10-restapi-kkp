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
        Schema::create('boat', function (Blueprint $table) {
            $table->id();
            $table->string('boat_code');
            $table->string('boat_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('owner_address')->nullable();
            $table->string('boat_size')->nullable();
            $table->string('captain')->nullable();
            $table->string('member_amount')->nullable();
            $table->string('boat_photo')->nullable();
            $table->string('license_number')->nullable();
            $table->string('license_document')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('boat');
    }
};
