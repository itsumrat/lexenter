<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->integer('article_code');
            $table->string('title_en');
            $table->string('source_en')->nullable();
            $table->text('content_en')->nullable();
            $table->mediumText('note_en')->nullable();
            $table->string('title_cn');
            $table->string('source_cn')->nullable();
            $table->text('content_cn')->nullable();
            $table->mediumText('note_cn')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
