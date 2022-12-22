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
        <p class="top-stat">MONEY TRANSFER DETAILS</p>
<!-- account details  -->
        <p class="account-details">
   <P>ACCOUNT NUMBER OF SENDER: <span style="color:#2D89EF">{{$transaction->sender_account}}</span></P>
   <P>ACCOUNT NUMBER OF RECEIVER: <span style="color:#2D89EF">{{$transaction->receiver_account}}</span></P>
    <P>TRANSACTION DATE: {{$transaction->created_at}}</P>
    <P>AMOUNT:<span style="color:#2D89EF;font-weight:600">{{$transaction->amount}}</span></P>
        </p>

        <!--  info  -->
        <div class="client-info">
            @if ($transaction->status == "complete")
            <p>Status <span class="complete">{{$transaction->status}}</span></p>
                
            @else
            <p>Status <span class="pending">{{$transaction->status}}</span></p>
                
            @endif
            <p>Action: <button class="action">Print</button></p>
            
        </div>

      
    </div>
</body>
</html>