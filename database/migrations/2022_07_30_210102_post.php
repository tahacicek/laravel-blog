<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
class Post extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("category_id");//ilişkisel tablaolarda kullanılır. integer -'li değer almasın diye kullandık.
            $table->string("title");
            $table->longText("descr");
            $table->string("image");
            $table->string("author");
            $table->string("slug");
            $table->integer("hit")->default(0);
            $table->integer("status")->default(0)->comment("0:pasif 1:aktif");
            $table->foreign("category_id")
            ->references("id")
            ->on("categories");
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
        Schema::dropIfExists('post');
    }
}
