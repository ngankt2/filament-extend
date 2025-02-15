<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Administrative Regions
        Schema::create('zi_vn_administrative_regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_en');
            $table->string('code_name')->nullable();
            $table->string('code_name_en')->nullable();
            $table->timestamps();
            $table->primary('id');
        });

        // Administrative Units
        Schema::create('zi_vn_administrative_units', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('full_name_en')->nullable();
            $table->string('short_name')->nullable();
            $table->string('short_name_en')->nullable();
            $table->string('code_name')->nullable();
            $table->string('code_name_en')->nullable();
            $table->timestamps();
            $table->primary('id');
        });

        // Provinces
        Schema::create('zi_vn_provinces', function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->string('full_name');
            $table->string('full_name_en')->nullable();
            $table->string('code_name')->nullable();
            $table->unsignedBigInteger('administrative_unit_id')->nullable();
            $table->unsignedBigInteger('administrative_region_id')->nullable();
            $table->timestamps();

            $table->foreign('administrative_unit_id')->references('id')->on('zi_vn_administrative_units');
            $table->foreign('administrative_region_id')->references('id')->on('zi_vn_administrative_regions');
        });

        // Districts
        Schema::create('zi_vn_districts', function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->string('full_name')->nullable();
            $table->string('full_name_en')->nullable();
            $table->string('code_name')->nullable();
            $table->string('province_code', 20)->nullable();
            $table->unsignedBigInteger('administrative_unit_id')->nullable();
            $table->timestamps();

            $table->foreign('province_code')->references('code')->on('zi_vn_provinces');
            $table->foreign('administrative_unit_id')->references('id')->on('zi_vn_administrative_units');
        });

        // Wards
        Schema::create('zi_vn_wards', function (Blueprint $table) {
            $table->string('code', 20)->primary();
            $table->string('name');
            $table->string('name_en')->nullable();
            $table->string('full_name')->nullable();
            $table->string('full_name_en')->nullable();
            $table->string('code_name')->nullable();
            $table->string('district_code', 20)->nullable();
            $table->unsignedBigInteger('administrative_unit_id')->nullable();
            $table->timestamps();

            $table->foreign('district_code')->references('code')->on('zi_vn_districts');
            $table->foreign('administrative_unit_id')->references('id')->on('zi_vn_administrative_units');
        });

        $sqlFile = __DIR__ . '/_zi_vn_location_import.sql';
        if (file_exists($sqlFile)) {
            DB::unprepared(file_get_contents($sqlFile));
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zi_vn_wards');
        Schema::dropIfExists('zi_vn_districts');
        Schema::dropIfExists('zi_vn_provinces');
        Schema::dropIfExists('zi_vn_administrative_units');
        Schema::dropIfExists('zi_vn_administrative_regions');
    }
};
