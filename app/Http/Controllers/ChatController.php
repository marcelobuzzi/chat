<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class ChatController extends Controller {

  // ---------------------------------------------------------------------------------------
  public function __construct() {
  
    $this->middleware('auth');
  
  }

  // ---------------------------------------------------------------------------------------
  public function show(Chat $chat) {
  
    abort_unless($chat->users->contains(auth()->id()), 403);

    $data = array(
      'chat' => $chat,
    );
  
    return view('chat', $data);
  
  }

  // ---------------------------------------------------------------------------------------
  public function chat_with(User $user) {

    $user1 = auth()->user();
    $user2 = $user;

    $chat = $user1->chats()->wherehas('users', function($query) use ($user2) {
      $query->where('chat_user.user_id', $user2->id);
    })->first();

    if(!$chat) {
      $data = array(
        $user1->id,
        $user2->id,
      );
      $chat = Chat::create();
      $chat->users()->sync($data);
    }
  
    return redirect()->route('chat.show', $chat);
  
  }

}
