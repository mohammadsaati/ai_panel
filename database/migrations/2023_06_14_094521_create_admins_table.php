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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->date('birth_day');
            $table->string('email')->unique()->index();
            $table->string('phone_number')->unique()->index();
            $table->string('password');
            $table->string('status')->default(\App\Enums\Admin\AdminStatus::ACTIVE->value);
            $table->string('gender');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
