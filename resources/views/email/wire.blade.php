<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice email</title>
</head>
<body>
    <h1>Invoice mail</h1>
  <p>confirm the transaction of {{session()->get('amount')}} to{{session()->get('receiver')}} using the code below</p>
  <p>Your otp is {{session()->get('otp')}}</p>
</body>
</html>