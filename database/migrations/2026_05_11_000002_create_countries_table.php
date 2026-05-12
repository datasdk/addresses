<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('countries')) {
            Schema::create('countries', function (Blueprint $table) {
                $table->unsignedInteger('id')->primary();
                $table->string('capital')->nullable();
                $table->string('citizenship')->nullable();
                $table->string('country_code')->nullable();
                $table->string('currency')->nullable();
                $table->string('currency_code')->nullable();
                $table->string('currency_sub_unit')->nullable();
                $table->unsignedTinyInteger('currency_decimals')->nullable();
                $table->string('full_name')->nullable();
                $table->string('iso_3166_2', 2)->nullable();
                $table->string('iso_3166_3', 3)->nullable();
                $table->string('name');
                $table->string('region_code')->nullable();
                $table->string('sub_region_code')->nullable();
                $table->boolean('eea')->default(false);
                $table->string('calling_code')->nullable();
                $table->string('currency_symbol')->nullable();
                $table->string('flag')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
