<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
  return (int) $user->id === (int) $id;
});

Broadcast::channel('chatroom.{chatrrom_id}', function ($user, $chatroom_id) {
  if($user->chatroom->contains($chatroom_id)) {
    return $user;
  }
});