@extends('layouts.sbadmin', ['background' => 'dark'])

@section('content')
<section class="mx-auto msger">
  <header class="msger-header">
    <div class="msger-header-title">
      <i class="fas fa-comment-alt"></i> SimpleChat
    </div>
    <div class="msger-header-options">
      <span><i class="fa-solid fa-circle"></i></span>
    </div>
  </header>

  <main class="msger-chat">
    <!-- Contenido del chat -->
  </main>

  <form class="msger-inputarea">
    <input type="hidden" id="chat-id" name="chat-id" value="{{$chat->id}}">
    <input type="text" class="msger-input" placeholder="Enter your message...">
    <button type="submit" class="msger-send-btn">Send</button>
  </form>
</section>
@endsection