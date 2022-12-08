<span class="message-trigger"><i class="fa fa-message"></i></span>

<div class="message-box">
 <div class="message-actions">
         <span><i class="fa fa-trash"></i></span>
         <span class="move-box">Cancel</span>
 </div>
  {{-- @foreach ($messages as $message)
 <div class="message">{{$message->content}}</div>
 @endforeach  --}}


 <hr>
<div class="below">

<span class="message-icon"><i class="fa fa-message"></i></span>
 <form action="/send" method="post">
      <input type="text" class="message-input" name="content">
      {{-- <span ><i class="fa fa-paper-plane" type="submit"></i></span>
      <span> <input type="submit" value="SEND"></span>
 </form>

</div> 
    </div>