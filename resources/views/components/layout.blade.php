
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
    <div class="header">
      <span class="logo">INVOICE</span>
          <div class="icons">
           <span>{{Auth::user()->name}}</span>
          <span style="color:grey"><a href="{{url('/user/profile')}}" style="color:grey"><i class="fa fa-user {{ 'user/profile' == request()->path() ? 'active' : ''}}"></i></a></span>
          <span><i class="fa fa-bell"></i></span>
          {{-- <span><i class="fa fa-globe"></i></span> --}}
          <span><a href="/logout">Logout</a></span>
          </div>
      </div>
  <x-flash-message />

     
      <input type="checkbox" name="" id="open">
      <label for="open" class="sidebarIcon">
          <div class="wrapper first"></div>
          <div class="wrapper second"></div>
          <div class="wrapper third"></div>
      </label>

      <!-- mobile screen sidebar  -->
      <div id="sidebarMenu">
          <ul class="menu">
          <li><a href="accounts.php"> <i class="fa fa-user-circle side-icon"></i>Accounts</a></li>
          <hr class="line">
          <li><a href="transfer.php"><i class="fa fa-exchange side-icon" id="side-icon"></i>Transactions</a></li>
          <hr class="line">
          <li><a href="card.php"><i class="fa fa-credit-card side-icon"></i>cards</a></li>
          <hr class="line">
          <li><a href="loans.php"><i class="fa fa-dollar side-icon"></i>Loans</a></li>
          <hr class="line">
          <li><a href="E_statement.php"><i class="fa fa-file side-icon"></i>E-statement</a></li>
          <hr class="line">
          <li><a href=""><i class="fa fa-person side-icon"></i>Other services</a></li>
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
                  <a href="/"><i class="fa fa-user-circle fac {{ '/' == request()->path() ? 'active' : ''}}"></i>
                  <span class="nav-item"></span>
                </a>
              </li>
  
              <li>
                  <a href="/transactions"><i class="fa fa-exchange fac{{ '/transactions' == request()->path() ? 'active' : ''}}"></i>
                  <span class="nav-item"></span>
                </a>
              </li>
  
              <li>
                  <a href="/checkbook"><i class="fa fa-book fac {{'checkbook' == request()->path() ? 'active' : ''}}"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li>
                  <a href="/loans"><i class="fa fa-dollar fac {{'loans' == request()->path() ? 'active' : ''}}"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li>
                  <a href="/statement"><i class="fa fa-file fac {{'statement' == request()->path() ? 'active' : ''}}"></i></a>
                  <span class="nav-item"></span>
              </li>
  
              <li>
                  <a href="/wire"><i class="fa fa-tasks fac {{'wire' == request()->path() ? 'active' : ''}}"></i></a>
                  <span class="nav-item"></span>
              </li>

              
              <li>
                <a href="/bill"><i class="fa fa-gear fac {{'bill' == request()->path() ? 'active' : ''}}"></i></a>
                <span class="nav-item"></span>
            </li>
          </ul>
      </nav>
  
      <div class="main">
        <x-flash-message />
  
    {{$slot}}
   
   
  <span class="message-trigger"><i class="fa fa-message"></i></span>

  <div class="message-box">
   <div class="message-actions">
           <span><i class="fa fa-trash"></i></span>
           <span class="move-box">Cancel</span>
   </div>

   @php
       $messages = session()->get('mss');
   @endphp

     @foreach ($messages as $message)
     <div class="message">
         {{$message->content}}
        </div>
     @endforeach



 <hr>
  <div class="below">
  
  <span class="message-icon"><i class="fa fa-message"></i></span>
   <form action="/send-message" method="post">
    @csrf
        <input type="text" class="message-input" name="content">
       <span ><i class="fa fa-paper-plane" type="submit"></i></span>
        <span> <input type="submit" value="SEND"></span>
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
      </script>
    </body>
    </html>