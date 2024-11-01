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
        if(!Schema::hasTable('cms_currencies'))
        {
            Schema::create('cms_currencies', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('symbol', 10);
                $table->tinyInteger('is_prefix_symbol')->unsigned()->default(0);
                $table->tinyInteger('decimals')->unsigned()->default(0)->nullable();
                $table->integer('order')->default(0)->unsigned()->nullable();
                $table->tinyInteger('is_default')->default(0);
                $table->double('exchange_rate')->default(1);
                $table->timestamps();
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cms_currencies');
    }
};
