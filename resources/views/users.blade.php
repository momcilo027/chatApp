@include('navbar')
<div class="container">
    <div class="users">
      <h1>KORISNICI</h1>
      <form method="GET">
        <ul>
          @foreach($users as $user)
            @if((auth()->user()->id) !== $user->id)
              <li><button type="submit" name="chatWith" value="{{$user->id}}">{{$user->username}}</button></li>
            @endif
          @endforeach
        </ul>
      </form>
    </div>
    <div class="msgs">
      @if($chatId)
        <div class="info">
          <h1>{{$chatWith->last_name}} {{$chatWith->first_name}}</h1>
          <form action="/chat" method="POST">
            @csrf
            <input type="text" name="msg_text" value="" placeholder="Unesite Poruku..." autocomplete="off">
            <input type="hidden" name="sent_id" value="{{auth()->user()->id}}">
            <input type="hidden" name="rec_id" value="{{$chatId}}">
          </form>
        </div>
        <div class="showMsgs">
          @foreach($chatInfo as $msgInfo)
            @if($msgInfo->sent_id == auth()->user()->id)
              <div class="sent">
                <strong>{{$msgInfo->msg_text}}</strong>
              </div>
            @else
              <div class="recived">
                <strong>{{$msgInfo->msg_text}}</strong>
              </div>
            @endif
          @endforeach
      @else 
        <div class="info">
          <h1>N/A</h1>
        </div>
      @endif
    </div>
  </div>
  @include('includes.footer')