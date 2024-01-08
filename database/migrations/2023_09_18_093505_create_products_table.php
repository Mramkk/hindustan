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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('aid');
            $table->string('pid');
            $table->string('title');
            $table->string('slug');
            $table->string('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->float('regular_price');
            $table->float('selling_price');
            $table->float('discount');
            $table->integer('current_stock')->default(0);
            $table->string('category')->nullable();
            $table->string('brand')->nullable();
            $table->string('unit');
            $table->enum('status', ['0', '1']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
