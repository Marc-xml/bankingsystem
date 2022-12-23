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
        <p class="top-stat">USER ACCOUNT DETAILS</p>
<!-- account details  -->
        <p class="account-details">
   <P>USER ID: <span style="color:#2D89EF">{{$user->id}}</span></P>
   <P>NAME: <span style="color:#2D89EF">{{$user->name}}</span></P>
   <P>EMAIL: <span style="color:#2D89EF">{{$user->email}}</span></P>
    <P>REGISTRATION DATE DATE: {{$user->created_at}}</P>
    {{-- <P>AMOUNT:<span style="color:#2D89EF;font-weight:600">{</span></P> --}}
        </p>

        <!--  info  -->
        <div class="client-info">
   <P>Phone: <span style="color:#2D89EF">{{$user->Phone}}</span></P>
   <P>address: <span style="color:#2D89EF">{{$user->address}}</span></P>
    <p>status:     @if ($user->usertype == '0')
        <span class="pending">{{"Client"}}</span>
       @elseif($user->usertype == '1')
        <span class="complete"><i class="fa fa-medal    "></i>{{"Admin"}}</span>
       @else
       <span class="super">{{"Super Admin"}}</span>
       @endif</p>
            <p>Action: <button class="action">Print user info</button>
                 <a href="/review-user/{{$id = $user->id}}"><button style="background:rgba(77, 153, 77, 0.781)" class="action">Edit user info</button></a>
                 <a href="/delete-user/{{$id= $user->id}}"><button style="background:rgba(240, 52, 28, 0.781)" class="action">delete user </button></a>
            
                </p>
            
        </div>

      
    </div>
</body>
</html>