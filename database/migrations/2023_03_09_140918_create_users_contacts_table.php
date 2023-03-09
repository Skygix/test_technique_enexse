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
        Schema::create('users_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('phonePrefix');
            $table->string('phoneNumber');
            $table->string('landlinePrefix')->nullable();
            $table->string('landlineNumber')->nullable();
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
        Schema::table('users_contacts', function (Blueprint $table) {
            $table->dropForeign('users_contacts_user_id_foreign');
        });
        Schema::dropIfExists('users_contacts');
    }
};
