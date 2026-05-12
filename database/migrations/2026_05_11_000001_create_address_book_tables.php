<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('addresses')) {
            Schema::create('addresses', function (Blueprint $table) {
                $table->id();
                $table->string('street')->nullable();
                $table->string('street_extra')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('post_code')->nullable();
                $table->unsignedBigInteger('country_id')->nullable();
                $table->text('note')->nullable();
                $table->text('notes')->nullable();
                $table->json('properties')->nullable();
                $table->decimal('lat', 10, 7)->nullable();
                $table->decimal('lng', 10, 7)->nullable();
                $table->nullableMorphs('addressable');
                $table->unsignedBigInteger('user_id')->nullable();
                $table->boolean('is_public')->default(false);
                $table->boolean('is_primary')->default(false);
                $table->boolean('is_billing')->default(false);
                $table->boolean('is_shipping')->default(false);
                $table->softDeletes();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('contacts')) {
            Schema::create('contacts', function (Blueprint $table) {
                $table->id();
                $table->string('type')->default('default');
                $table->string('gender')->nullable();
                $table->string('title')->nullable();
                $table->string('first_name')->nullable();
                $table->string('middle_name')->nullable();
                $table->string('last_name')->nullable();
                $table->string('company')->nullable();
                $table->string('extra')->nullable();
                $table->string('vat_id')->nullable();
                $table->string('position')->nullable();
                $table->string('phone')->nullable();
                $table->string('mobile')->nullable();
                $table->string('fax')->nullable();
                $table->string('email')->nullable();
                $table->string('email_invoice')->nullable();
                $table->string('website')->nullable();
                $table->unsignedBigInteger('address_id')->nullable();
                $table->json('properties')->nullable();
                $table->nullableMorphs('contactable');
                $table->boolean('is_public')->default(false);
                $table->boolean('is_primary')->default(false);
                $table->text('notes')->nullable();
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
        Schema::dropIfExists('addresses');
    }
};
