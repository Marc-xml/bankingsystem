
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   

    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\all.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.2.1-web\css\fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\bills.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\home.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\loans.css') }}">
 
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\teller.css') }}">   
     <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\admmain.css') }}">


</head>
<body>
    <div class="loader_bg">
        <div class="loader"></div>
    </div>
    <div class="header" style="z-index:30;">
      <span class="logo">INVOICE <span style="color:grey">TELLER <i class="fa fa-feather"></i></span></span>
          <div class="icons">
           {{-- <span>{{Auth::user()->name}}</span> --}}
          <span style="color:grey"><a href="{{url('/user/profile')}}" style="color:grey"><i class="fa fa-user {{ 'user/profile' == request()->path() ? 'active' : ''}}"></i></a></span>
          {{-- <span><i class="fa fa-bell"></i></span> --}}
          <span><i class="fa fa-globe"></i></span>
          <span><a href="/logout"><i class="fa-solid fa-right-from-bracket"></i></a></span>
          </div>
      </div>



     
      <input type="checkbox" name="" id="open" style="z-index:50">
      <label for="open" class="sidebarIcon" style="z-index:50">
          <div class="wrapper first"></div>
          <div class="wrapper second"></div>
          <div class="wrapper third"></div>
      </label>

      {{-- navigation bar  --}}
      <div class="navigation">
        <div class="{{ '/' == request()->path() ? 'active' : ''}}{{ 'filter-accounts-teller' == request()->path() ? 'active' : ''}}"><a href="/" ><span><i class="fa fa-book "></i><span class="stat" id="active-tab" >  {{session()->get('countAcc')}}</span></span></a></div>
        <div class="{{ 'teller/users' == request()->path() ? 'active-1' : ''}}"><a href="/teller/users" ><span><i class="fa fa-users"></i><span class="stat" >  {{session()->get('countUsers')}}</span></span></a></div>
        <div class="{{ 'teller/transactions' == request()->path() ? 'active-1' : ''}}"><a href="/teller/transactions" ><span><i class="fa fa-exchange"></i><span class="stat" >  {{session()->get('countTransactions')}}</span></a></div>
        <div class="{{ 'teller/loans' == request()->path() ? 'active-2' : ''}}"><a href="/teller/loans" ><span><i class="fa fa-dollar"></i><span class="stat" >  {{session()->get('countLoans    ')}}</span></span></a></div>
      </div>
  
      <div class="main">
        <x-flash-message />
        
  
    {{$slot}}
   
   
  <span class="message-trigger"><i class="fa fa-message"></i></span>

  <div class="message-box" style="background: #fff;z-index:50;height: 500px;">
   <div class="message-actions">
           <span><i class="fa fa-trash"></i></span>
           <span class="move-box">Cancel</span>
   </div>

   @php
       $messages = session()->get('mss');
   @endphp

     {{-- <div style="height:20rem;overflow;scroll;"> --}}
 <div style="height:400px;overflow:scroll">
@isset($messages)
@foreach ($messages as $message)
<div class="message" style="box-shadow:2px 2px 2px 2px #2d87ef2d;z-index:50">
    {{$message->content}}
   {{-- <span style="font-size:10px;">sender:{{auth()->user()->name}} at {{$message->created_at->Carbon::format('H:i:s')}}</span> --}}
   </div>
   
   <div class="message-1" style="box-shadow:2px 2px 2px 2px #2d87ef2d;padding:10px;">
       {{$message->reply}}
   </div>
@endforeach 
@endisset
    


 </div>
    



 <hr>
  <div class="below">
  
  <span class="message-icon"><i class="fa fa-message"></i></span>
   <form action="/send-message" method="post">
    @csrf
        <input type="text" class="message-input" name="content">
       <span type="submit"><input type="submit" value="send"><i class="fa fa-paper-plane" ></i></span>
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
     }, 1500);
      setTimeout(function(){
        $('#notif').fadeToggle();
      },4000);
      
      </script>
    @stack('scripts')
    </body>
    </html>
    