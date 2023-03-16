<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restricted</title>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\restricted.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\all.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.2.1-web\css\all.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.2.1-web\css\fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.2.1-web\css\fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\bills.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\home.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\admmain.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\transfer.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\edit_home.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
</head>
<body>
    <main>
        <span class="title">INVOICE <span><i class="fa fa-feather"></i></span></span><br>
        <span>Your Account Has been Restricted, Please Contact the support for help  </span><br>
            <span><i class="fa fa-warning"></i></span><br>
            <div class="res">
                <span class="support" >Contact support</span>
                <span><a href="/logout">Logout <span><i class="fa fa-arrow-right"></i></span></a></span>
            </div>
    </main>
    <span class="message-trigger" style="color:rgb(0, 102, 255);"><i class="fa fa-message"></i></span>

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
    <script src="{{ asset('invoice_2.0\View\assets\jquery\jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('invoice_2.0\View\assets\swiper.js') }}"></script>
    <script src="{{ asset('invoice_2.0\View\assets\script.js') }}"></script>
    <script src="{{ asset('invoice_2.0\View\js\loan.js') }}"></script>
   
    <script src="{{ asset('invoice_2.0\View\js\account.js') }}"></script>
   
    <script src="{{ asset('invoice_2.0\View\assets\package\dist\chart.js') }}"></script>
    <script src="{{ asset('invoice_2.0\View\assets\package\dist\chart.min.js') }}"></script>
   
    <script src="{{ asset('invoice_2.0\View\js\loan-calculator.js') }}"></script>
    <script src="{{ asset('invoice_2.0\View\js\loanmodal.js') }}"></script>
    
    <script >
      setTimeout(function(){
    $('.loader_bg').fadeToggle();
   }, 1500);8
   setTimeout(function(){
      $('#notif').fadeToggle();
    },4000);
    </script>
     @stack('scripts')
</body>
</html>