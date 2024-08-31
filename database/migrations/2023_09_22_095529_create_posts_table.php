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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug")->unique();
            $table->unsignedBigInteger("admin_id");
            $table->unsignedBigInteger("category_id");
            $table->string("image");
            $table->unsignedBigInteger("content_type_id");
            $table->integer("status")->default(1)->comment("1 Active | 0 deActive");
            $table->text("excerpt")->nullable();
            $table->longText("description");
            $table->string('read_time')->nullable();
            $table->timestamps();

            $table->foreign("admin_id")->on("admins")->references("id")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign("category_id")->on("categories")->references("id")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->foreign("content_type_id")->on("content_types")->references("id")
                ->onDelete("cascade")
                ->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
