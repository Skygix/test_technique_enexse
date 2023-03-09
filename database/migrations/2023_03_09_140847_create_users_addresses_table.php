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
        Schema::create('users_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('state')->nullable();
            $table->string('addressLine')->nullable();
            $table->string('zipCode')->default('0');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users_adresses', function (Blueprint $table){
            $table->dropForeign('users_adresses_user_id_foreign');
        });
        Schema::dropIfExists('users_addresses');
    }
};
