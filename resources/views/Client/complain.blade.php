<x-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
    <p class="account">We are here to assist you</p>
    <hr class="main-line">
 <div class="review-info"  >Please fill the form below to file your complain</div>
    <div class="review-form"   style="margin-left:auto;margin-right:auto;" >
    
            

        <form action="/new-complain"  method="POST"  enctype="multipart/form-data">
            @csrf
        
           
              <div class="row">
              <div class="text_field" >
                <input type="text" required name="title"  />
                <label for="">Complain name</label>
                
            </div>
              <div class="text_field" >
                <input type="email" required name="email"  />
                <label for="">Email</label>
                
            </div>
            {{-- <div class="text_field">
                <input type="text" required name="address" value="{{$loan->address}}" />
                <label for="">address</label>
                
            </div> --}}
            <div class="text_field">
                <label for="">The complain is regrading:</label>
                <br>
                <br>
                <textarea name="content" id="" cols="80" rows="10"></textarea>
            </div>
          </div>
          <div class="bottom">
          </div>
          <div>
            {{-- Please check your inbox for response --}}
          </div>
          <div class="bottom" style="">
          <input type="submit" value="SUBMIT" class="loan-button" style="width:5rem;">
          <span style="margin-top:20px;">reset</span>
          </div>
          <div class="bottom">
          </div>
          
           
          </form>
                
    </div>
    <br>
    <p class="account">Replies</p>
    <hr class="main-line">
  
    <div class="replies" style="margin-left:auto;margin-right:auto">
        @foreach ($complains as $complain)
        <div class="send">{{$complain->content}}</div>
         @if ($complain->reply == null)
             <div class="reply">Please be patient, you will soon receive an answer</div>
         @else
        <div class="reply">{{$complain->reply}}</div>
             
         @endif
        @endforeach
     </div>
  
</x-layout>