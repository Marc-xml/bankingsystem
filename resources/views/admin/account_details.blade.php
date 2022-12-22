<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_statement</title>
    <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\E_statement.css")}}">
    <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\admmain.css")}}">
</head>
<body >
    <h3>INVOICE </h3>
    <div class="main">
        <p class="top-stat">BANK ACCOUNT DETAILS</p>
<!-- account details  -->
        <p class="account-details">
   <P>ACCOUNT ID: <span style="color:#2D89EF">{{$account->id}}</span></P>
   <P>ACCOUNT ALIAS: <span style="color:#2D89EF">{{$account->alias}}</span></P>
   <P>BALANCE: <span style="color:#2D89EF">{{$account->balance}}</span></P>
    <P>OPENING DATE: {{$account->created_at}}</P>
    <P>OVERDRAFT: {{$account->overdraft}}</P>
    {{-- <P>AMOUNT:<span style="color:#2D89EF;font-weight:600">{</span></P> --}}
        </p>

        <!--  info  -->
        <div class="client-info">
   <P>upcoming_balance: <span style="color:#2D89EF">{{$account->upcoming_balance}}</span></P>
   <P>total_balance: <span style="color:#2D89EF">{{$account->total_balance}}</span></P>
            
            <p>Action: <button class="action">Print Account info</button>
            
                </p>
            
        </div>

      
    </div>
</body>
</html>