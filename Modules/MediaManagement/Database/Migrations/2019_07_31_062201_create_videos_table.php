<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable()->default(null);
            $table->string('video_url')->nullable()->default(null);
            $table->string('slug')->unique();
            $table->string('meta_title')->nullable()->default(null);
            $table->string('meta_tags')->nullable()->default(null);
            $table->string('meta_description')->nullable()->default(null);
            $table->enum('is_active', [0,1])->default(0);
            $table->integer('created_by')->unsigned()->nullable()->default(null);
            $table->integer('updated_by')->unsigned()->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
