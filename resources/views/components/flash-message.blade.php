@if(session()->has('message'))
<div style="position:fixed;text-align:center;background-color:#fff;font-weight:600;width:15rem;left:43%;z-index:20;padding:20px;border-radius:25px">
  <p>
    {{session('message')}}
  </p>
</div>
@endif