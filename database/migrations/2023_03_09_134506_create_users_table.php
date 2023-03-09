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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('userId', 7);
            $table->string('username');
            $table->string('fullname');
            $table->foreignId('gender_id')
                ->constrained('genders')
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->string('email');
            $table->string('emailPec')->nullable();
            $table->date('dateOfBirth');
            $table->datetime('lastLogin')->nullable();
            $table->timestamps();
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_gender_id_foreign');
        });
        Schema::dropIfExists('users');
    }
};
