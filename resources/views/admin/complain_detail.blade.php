<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complain details</title>
    <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\E_statement.css")}}">
    <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\admmain.css")}}">
    <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\loans.css")}}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\all.css') }}">

</head>
<body >
    <x-flash-message />
    <h3>INVOICE </h3>
    <div class="main">
        <p class="top-stat">CLIENT COMPLAIN DETAILS</p>
<!-- account details  -->
        <p class="account-details">
   <P>COMPLAINER: <span style="color:#2D89EF">{{$complain->complainer}}</span></P>
   <P>EMAIL OF USER: <span style="color:#2D89EF">{{$complain->email}}</span></P>
   <P>TITLE: <span style="color:#2D89EF">{{$complain->title}}</span></P>
  

        <!--  info  -->
        <div class="client-info">
   <P>Complain subject: <b>{{$complain->content}}</b></P>
            
            <p><span>Reply <i class="fa fa-reply"></i></span></p>
            <form action="/reply-complain/{{$id = $complain->id}}" method="POST">
                @method('PUT')
                @csrf
                <div class="text_field">
                    <input type="text" name="reply">
                    <button type="submit" class="action" >Reply <i class="fa fa-reply"></i></button>
                </div>
            </form>
            
        </div>

      
    </div>
    <script src="{{ asset('invoice_2.0\View\assets\jquery\jquery-3.6.0.min.js') }}"></script>
    <script >
        setTimeout(function(){
      $('.loader_bg').fadeToggle();
     }, 1500);
      setTimeout(function(){
        $('#notif').fadeToggle();
      },4000);
      
      </script>
</body>
</html>