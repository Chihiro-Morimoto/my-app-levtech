<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title', 50);
            $table->string('body', 500);
            $table->date('created_at')->nullable();
            $table->date('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memories');
    }
};
