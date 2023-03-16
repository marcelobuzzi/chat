<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration {

  public function up() {
    Schema::create('conversations', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('contact_id');
      $table->string('message');
      $table->date('send');
      $table->date('recieve');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('conversations');
  }

}
