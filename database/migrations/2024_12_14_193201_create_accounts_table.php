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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name_fr', 100);
            $table->string('last_name_fr', 100);
            $table->string('first_name_ar', 100);
            $table->string('last_name_ar', 100);
            $table->enum('sex', ['male', 'female', 'other']);
            $table->string('cin', 20)->unique();
            $table->string('nationality', 50);
            $table->date('birth_date');
            $table->string('place_of_birth_fr', 100);
            $table->string('place_of_birth_ar', 100);
            $table->text('address_fr');
            $table->text('address_ar');
            $table->string('email_address')->unique();
            $table->enum('family_situation', ['single', 'married', 'divorced', 'widowed']);
            $table->string('mobile_phone', 20)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
