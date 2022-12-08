@if(session()->has('message'))
<div class="background-color:blue;padding:50px;display:flex;justify-content;center;">
  <p>
    {{session('message')}}
  </p>
</div>
@endif