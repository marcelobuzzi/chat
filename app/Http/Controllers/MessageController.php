<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use Illuminate\Http\Request;

class MessageController extends Controller {

  // ---------------------------------------------------------------------------------------
  public function __construct() {

    $this->middleware('auth');

  }

  // ---------------------------------------------------------------------------------------
  public function sent(Request $request) {
  
    $data = array(
      'content' => $request->message,
      'chat_id' => $request->chat_id,
    );
    $message = auth()->user()->messages()->create($data)->load('user');

    broadcast(new MessageSent($message))->toOthers();
  
    return $message;
  
  }

}
