<span class="message-trigger"><i class="fa fa-message"></i></span>

  <div class="message-box" style="background: #fff;z-index:50;height: 500px;">
   <div class="message-actions">
           <a href="/delete/messages"><span><i class="fa fa-trash"></i></span></a>
           <span class="move-box">Cancel</span>
   </div>

 
     {{-- <div style="height:20rem;overflow;scroll;"> --}}
 <div style="height:400px;overflow:scroll">
  @foreach ($messages as $message)
  <div class="message" style="box-shadow:2px 2px 2px 2px #2d87ef2d;z-index:50">
      {{$message->content}}
     {{-- <span style="font-size:10px;">sender:{{auth()->user()->name}} at {{$message->created_at->Carbon::format('H:i:s')}}</span> --}}
     </div>
     
     <div class="message-1" style="box-shadow:2px 2px 2px 2px #2d87ef2d;padding:10px;">
         {{$message->reply}}
     </div>
  @endforeach
  @unless (count($messages) !== 0)
      <p style="text-align:center">{{"NO NEW MESSAGE"}}</p>
  @endunless
 

 </div>
    



 <hr>
  <div class="below">
  
  <span class="message-icon"><i class="fa fa-message"></i></span>
   <form action="/send-message" method="post">
    @csrf
        <input type="text" class="message-input" name="content" required>
       <button type="submit" style="color:inherit;background:transparent;border:none"><i class="fa fa-paper-plane" ></i><button>
        {{-- <span> type="submit"</span> --}}
   </form>
 
  </div> 
      </div>  