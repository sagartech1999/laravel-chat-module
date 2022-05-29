<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('message');
            $table->integer('from_id')->unsigned();
            $table->integer('to_id')->unsigned();
            $table->text('last_message');
            $table->enum('is_last',['1','0'])->default('0')->comment("0=>not last message yet,1=>last message");
            $table->enum('is_read',['1','0'])->default('0')->comment("0=>not read message yet,1=>readed");
            $table->integer('delete_for')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('messages');
    }
}
