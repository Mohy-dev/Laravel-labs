<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * instruct the database how to create your table
     * @return void
     */

    // table creation method
    public function up()
    {
        // table name
        Schema::create('posts', function (Blueprint $table) {
            // table definations
            $table->id();
            $table->string("title", 100);
            $table->text("description")->nullable();
            $table->string("info")->default("blog_post");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    // rollback method (must have it, to roll back the excution if you will)
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
