
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
   

    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\all.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\bills.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\accounts.css') }}">

</head>
<body>
    <div class="loader_bg">
        <div class="loader"></div>
    </div>
    <div class="header" style="z-index:30;">
      <span class="logo">INVOICE <span><i class="fa fa-feather"></i></span></span>
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

      <!-- mobile screen sidebar  -->
      <div id="sidebarMenu">
          <ul class="menu">
          <li><a href="/"> <i class="fa fa-user-circle side-icon"></i>Accounts </a></li>
          <hr class="line">
          <li><a href="/transactions"><i class="fa fa-exchange side-icon" id="side-icon"></i>Transactions</a></li>
          <hr class="line">
          <li><a href="/checkbook"><i class="fa fa-book side-icon"></i>Checkbook request</a></li>
          <hr class="line">
          <li><a href="/loans"><i class="fa fa-dollar side-icon"></i>Loans</a></li>
          <hr class="line">
          <li><a href="/statement"><i class="fa fa-file side-icon"></i>E-statement</a></li>
          <hr class="line">
          <li><a href="/wire"><i class="fa fa-person side-icon"></i>inter-bank transfer</a></li>
          <hr class="line">
          </ul>
          <div class="info-sidebar">
              <span>Invoice 2023</span>
              <span><i class="fa fa-user side-icon"></i></span>
          </div>
      </div>
      <!-- desktop screen sidebar  -->
      <nav>
          <ul>
              
          <li>
                  <a href="/"><i class="fa fa-user-circle fac {{ '/' == request()->path() ? 'active' : ''}}" id="show-account"> </i>
                  <span class="nav-item"></span>
                </a>
              </li>
                
              <li>
                  <a href="/transactions"><i class="fa fa-exchange fac {{ 'transactions' == request()->path() ? 'active' : ''}}" id="show-transaction"></i>
                  <span class="nav-item"></span>
                </a>
              </li>
  
              <li>
                  <a href="/checkbook"><i class="fa fa-book fac {{'checkbook' == request()->path() ? 'active' : ''}}"  id="show-checkbook"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li>
                  <a href="/loans"><i class="fa fa-dollar fac {{'loans' == request()->path() ? 'active' : ''}}"  id="show-loan"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li>
                  <a href="/statement"><i class="fa fa-file fac {{'statement' == request()->path() ? 'active' : ''}}" id="show-statement"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li>
                  <a href="/wire"><i class="fa fa-tasks fac {{'wire' == request()->path() ? 'active' : ''}}"  id="show-transfer"></i></a>
                  <span class="nav-item"></span>
              </li>

              
              <li>
                <a href="/complain"><i class="fa fa-triangle-exclamation fac {{'complain' == request()->path() ? 'active' : ''}}"  id="show-complain"></i></a>
                <span class="nav-item"></span>
            </li>
          </ul>
      </nav>
      <nav style="position: absolute;left:65px;top:4%;width:15rem; background:transparent;">
        <span class="hidden-name" id="hidden-account">Accounts</span>
        <br><br><br><br>
        <span class="hidden-name" id="hidden-transaction">Transactions</span>
        <br><br><br><br><br>
        <span class="hidden-name" id="hidden-checkbook">Checkbook Request</span>
        <br><br><br><br>
        <span class="hidden-name" id="hidden-loan">My laons</span>
        <br><br><br><br>
        <span class="hidden-name" id="hidden-statement">E-statement</span>
        <br><br><br><br><br>
        <span class="hidden-name" id="hidden-transfer">Wire transfer</span>
        <br><br><br><br>
        <span class="hidden-name" id="hidden-complain">Complains</span>
      </nav>
  
      <div class="main">
        <x-flash-message />
        <x-current-account />
      
    {{$slot}}
   
   
  <span class="message-trigger"><i class="fa fa-message"></i></span>

  <div class="message-box" style="background: #fff;z-index:50;height: 500px;">
   <div class="message-actions">
           <a href="/delete/messages"><span><i class="fa fa-trash"></i></span></a>
           <span class="move-box">Cancel</span>
   </div>

   @php
       $messages = session()->get('mss');
   @endphp

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
     }, 1500);
      setTimeout(function(){
        $('#notif').fadeToggle();
      },4000);
      </script>
    @stack('scripts')
    </body>
    </html>