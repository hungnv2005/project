<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng
            $table->string('name'); // Tạo cột name
            $table->timestamps(); // Tạo cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}