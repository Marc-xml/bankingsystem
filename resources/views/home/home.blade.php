<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice home</title>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\home.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\login.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\all.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\assets\fontawesome-free-6.1.1-web\css\fontawesome.min.css') }}">

  
</head>
<body>
    <a name="home"></a>

        {{-- top navbar  --}}
        <nav class="top-nav" style="z-index:50">
            <div class="nav-items">
                <div style="margin-right:auto;color:#fff;padding:10px;font-size:15px;font-weight:700;">INVOICE <i class="fa fa-feather"></i></div>

                <div><a href="{{url('/login')}}">My online banking</a></div>
              
            </div>
@php
    $welcome = session()->get('welcome');
    
@endphp
            <div class="bottom-nav">
                <div><a href="#home">Home</a></div>
                <div><a href="#in">Insights</a></div>
                <div><a href="#services">Services</a></div>
                <div><a href="#contact">Contact us</a></div>
                {{-- <div>FAQ</div> --}}
                {{-- <div><i class="fa fa-search"></i></div> --}}
            </div>
        </nav>{{-- <img src="{{ asset('invoice_2.0\View\Images\old-1130734.jpg') }}" alt=""> --}}
        <div class="loader_bg">
            <div class="loader"></div>
        </div>
            
            <img  src="{{$welcome->background ? asset('storage/' .$welcome->background) : asset('/images/no-image.png')}}" class="banner-image" >
                  <div class="banner">
                    <div class="banner-title">
                {{$welcome->title}}
                    </div>
                <div class='sub-title'>
                   {{$welcome->sub_title}}
                </div>
                <button>    
                    Find out more <span><i class="fa fa-arrow-right"></i></span>
                </button>
            </div>

                <div class="banner-blog">
                    @foreach ($news as $news)
                    <div class="info">
                        <div class="box"  >
                            <img  src="{{$news->image ? asset('storage/' .$news->image) : asset('/images/no-image.png')}}"  class="box-image">
        
                            
                        </div>
                        <span class="ad-title">Contact us: Help and customer support</span>
                           <br>
                            
                          
                    </div>
                    @endforeach
                </div>
        <a name="in"></a>
        <br>
        <div class="services-title">
            INSIGHTS
        </div>
        <div class="cards">
            <div class="card">
        <img src="{{asset('invoice_2.0\View\Images\old-1130739.jpg')}}" class="card-image" />
                
                <div class="card-content">
                    <div class="card-title">Be fraud alert</div>
                    We are aware of a number of scams and attempted frauds, including by companies posing as us, or individuals impersonating our staff
                </div>
                <button class="card-button">Read more <span><i class="fa fa-arrow-right"></i></span></button>
            </div>

            <div class="card">
        <img src="{{asset('invoice_2.0\View\Images\old-1130739.jpg')}}" class="card-image" />
                
                <div class="card-content">
                    <div class="card-title">Be fraud alert</div>
                    We are aware of a number of scams and attempted frauds, including by companies posing as us, or individuals impersonating our staff
                </div>
                <button class="card-button">Read more <span><i class="fa fa-arrow-right"></i></span></button>
            </div>

            <div class="card">
        <img src="{{asset('invoice_2.0\View\Images\old-1130739.jpg')}}" class="card-image" />
            
                <div class="card-content">
                    <div class="card-title">Be fraud alert</div>
                    We are aware of a number of scams and attempted frauds, including by companies posing as us, or individuals impersonating our staff
                </div>
                <button class="card-button">Read more <span><i class="fa fa-arrow-right"></i></span></button>
            </div>
        </div>
        
        {{-- invitatio --}}
    <div class="package">
        <div class="invitation">
            <div class="invitation-content">
                <div class="invitation-title">
                    Interested in joining us?
                </div>
                If you're looking for a career with purpose and want to work for a bank making a difference, we'd love to hear from you.
            </div>
            <button class="invitation-button">
                Know more <span><i class="fa fa-arrow-right"></i></span>
            </button>

        </div>
    </div>
    {{-- services  --}}
    <br>
    <div class="services-title">
        SERVICES
    </div>
    <br>
    <a name="services"></a>
    <div class="services" >
        <div class="service">
            <span class="service-icon">
            <i class="fa fa-user"></i>
            </span>
            <span>Access to accout information from anywhere</span>
        </div>

        <div class="service">
            <span class="service-icon">
            <i class="fa fa-dollar"></i>
            </span>
            <span>Request loan directly online </span>
        </div>

        <div class="service">
            <span class="service-icon">
            <i class="fa fa-exchange"></i>
            </span>
            <span>Keep track of account information and transactions</span>
        </div>

        <div class="service">
            <span class="service-icon">
            <i class="fa fa-book"></i>
            </span>
            <span>Never stand in a que again with our new online banking services</span>
        </div>
        
    </div>

    <br>
    <div class="services-title">
        CONTACT US
    </div>
    <br>    
    <a name="contact"></a>
    {{-- <div class="center">
        <form action="">
            <div class="text_field">
                <label for="">Enter message</label>
                <input type="text" name="message">
            </div>
            <button class="send-button" type="submit">SEND <span><i class="fa fa-paper-plane"></i></span></button>
        </form>
    </div> --}}
    <br>
    <br>
  <div class="to-top">
   
    <i class="fa fa-arrow-up" type="button" onclick="topFunction()" id="myBtn" title="Go to top">
   
        </i>
  </div>
    <footer>
       <div class="logo">
        <span>© INVOICE 2022</span>
        <div class="items">
            <div>Terms and conditions</div>
            <div>About us</div>
            <div>FAQ</div>
            <div>Insights</div>
        </div>
       </div>
    </footer>
   <script src="{{ asset('invoice_2.0\View\assets\jquery\jquery-3.6.0.min.js') }}"></script>
<script >
    setTimeout(function(){
  $('.loader_bg').fadeToggle();
 }, 1500);8
  </script> 
  <script>
    // Get the button:
let mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}</script>
</body>

</html>