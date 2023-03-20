<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration {

  public function up() {
    Schema::create('messages', function (Blueprint $table) {
      $table->id();
      $table->text('content');
      $table->foreignId('user_id');
      $table->foreignId('chatroom_id');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('messages');
  }

}
