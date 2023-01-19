<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_statement</title>
    <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\E_statement.css")}}">
    <link rel="stylesheet" href="{{asset("invoice_2.0\View\css\admmain.css")}}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\all.css') }}">

</head>
<body >
    <h3>INVOICE </h3>
    <div class="main">
        <p class="top-stat">LOAN DETAILS</p>
<!-- account details  -->
<x-flash-message/>
        <p class="account-details">
   <P>LOAN ID: <span style="color:#2D89EF">{{$loan->id}}</span></P>
   <P>ACCOUNT NUMBER CONCERNED: <span style="color:#2D89EF">{{$loan->account_concerned}}</span></P>
    <P>REQUEST  DATE: {{$loan->created_at}}</P>
    <P>AMOUNT:<span style="color:#2D89EF;font-weight:600">{{$loan->amount}}</span></P>
    <P>MONTHLY PAYEMENT:<span style="color:#2D89EF;font-weight:600">{{$loan->monthly_payement}}</span></P>
        </p>

        <!--  info  -->
        <div class="client-info">
            @if ($loan->status == "granted")
            <p>Status <span class="complete">{{$loan->status}}</span></p>
            @elseif($loan->status == "pending")
            <p>Status <span class="pending">{{$loan->status}}</span></p>
            @else
            <p>Status <span class="pending">{{$loan->status}}</span></p>
                
            @endif
            <p>Requested by: {{$loan->name}}</p>
            <p>address:{{$loan->address}}</p>
            <p>phone: {{$loan->phone}}</p>
            <p>Date of birth: {{$loan->dob}}</p>
     
            <p> <button class="action">Print <i class="fa fa-download"></i></button></p>
            @if ($loan->status == "pending" || $loan->status == "uncompleted")
            <p> <button class="denied">Delete <i class="fa fa-trash" style="color:#fff"></i></button></p>
            @endif
        </div>
        <div class="client-info">
            <p>Identitty proof: <span >
            <img width="900" src="{{$loan->identity_proof ? asset('storage/' . $loan->identity_proof) : asset('/images/no-image.png')}}" >
            </span></p>
            <p>Address proof: <span>
            <img width="900" src="{{$loan->address_proof ? asset('storage/' . $loan->identity_proof) : asset('/images/no-image.png')}}" >
            </span></p>
            <p>Income proof: <span>
            <img width="900"  src="{{$loan->income_proof ? asset('storage/' . $loan->identity_proof) : asset('/images/no-image.png')}}" >
            </span></p>
            <p>purpose: {{$loan->purpose}}</p>
        </div>

      
    </div>
 @if($loan->status == "complete")
 <div style="float:right">
    <p>Action:
     <a href="/grant/{{$id = $loan->id}}">
        <button class="complete">Grant</button>
    </a>
    <a href="/revoke/{{$id = $loan->id}}">
        <button class="denied">Revoke</button>
    </a>
       </p>
 </div>
 @endif
 
</body>
</html>