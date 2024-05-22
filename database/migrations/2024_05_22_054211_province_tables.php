<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('area_provinces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code_bps');
            $table->string('code_dagri');
            $table->timestamp('last_sync')->nullable();
            $table->timestamps();
        });

        Schema::create('area_cities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('code_bps')->index();
            $table->string('code_dagri')->index();
            $table->unsignedBigInteger('province_id');
            $table->timestamp('last_sync')->nullable();
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('province_id')->references('id')->on('area_provinces')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });

        Schema::create('area_districts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->index();
            $table->string('code_bps')->index();
            $table->string('code_dagri')->index();
            $table->unsignedBigInteger('city_id')->index();
            $table->unsignedBigInteger('province_id')->index();
            $table->timestamp('last_sync')->nullable();
            $table->timestamps();

            // Add foreign key constraint
            $table->foreign('city_id')->references('id')->on('area_cities')->onDelete('RESTRICT')->onUpdate('RESTRICT');
            $table->foreign('province_id')->references('id')->on('area_provinces')->onDelete('RESTRICT')->onUpdate('RESTRICT');
        });

        Schema::create('area_subdistricts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code_bps')->nullable();
            $table->string('postal_code')->nullable();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('jne_origin_id')->nullable();
            $table->unsignedBigInteger('jne_branch_id')->nullable();
            $table->unsignedBigInteger('jne_destination_id')->nullable();
            $table->unsignedBigInteger('sicepat_origin_id')->nullable();
            $table->unsignedBigInteger('sicepat_destination_id')->nullable();
            $table->unsignedBigInteger('ninja_id')->nullable();
            $table->unsignedBigInteger('sap_id')->nullable();
            $table->unsignedBigInteger('idexpress_id')->nullable();
            $table->timestamps();

            // Add foreign key constraints
            $table->foreign('district_id')->references('id')->on('area_districts')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('city_id')->references('id')->on('area_cities')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('province_id')->references('id')->on('area_provinces')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_provinces');
        Schema::dropIfExists('area_cities');
        Schema::dropIfExists('area_districts');
        Schema::dropIfExists('area_subdistricts');
    }
};
