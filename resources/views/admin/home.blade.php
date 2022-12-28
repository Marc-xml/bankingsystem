<x-admin-layout>
    <link rel="stylesheet" href="{{ asset('invoice_2.0\View\css\edit_home.css') }}">

<x-flash-message />
    <div class="home-title">
        <span>Edit Home page</span>
        <span><i class="fa fa-pen"></i></span>
    </div>
    <br>
  
    <hr>
    <div class="accounts">
        <p>Welcome section </p>
        <hr class="main-line">
    </div>


    <div class="review-form" style="max-width:30rem;">
     

        @php
            $welcome = session()->get('welcome');
        @endphp
        <form action="/add-message/{{$id = 1}}"  method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
              <div class="row">
              <div class="text_field" >
                <input type="text" required name="title" value="{{$welcome->title}}" />
                <label for="">Main title</label>
                
            </div>
            <div class="text_field">
                <input type="text" required name="sub_title" value="{{$welcome->sub_title}}" />
                <label for="">sub title</label>
                
            </div>
          </div>
           <div class="row">
            <div class="text_field">
              <input type="text" required name="content" value="{{$welcome->content}}" />
              <label for="">Content</label>
              @error('account')
        <p style="color:red"></p>
        @enderror
          </div>
       
           </div>
          
           
          
            <div class="text_field">
              <input type="file"  name="background" value="" required/>
              <label for="">Welcome background</label>
            <img  src="{{$welcome->background ? asset('storage/' .$welcome->background) : asset('/images/no-image.png')}}" >
            @error('addressproof')
            <p style="color:red">{{$message}}</p>
            @enderror
              
            </div>
          
         
          
         
        
          <div class="bottom" style="">
          <input type="submit" value="SUBMIT" class="loan-button" style="width:5rem;">
          <span style="margin-top:20px;">reset</span>
          </div>
       
          
           
          </form>
                
    </div>
  

    <div class="accounts">
        <p>Top news section</p>
    </div>
        <hr class="main-line">
        <div class="banner-blog">
            @foreach ($news as $news)
            <div class="info">
                <div class="box"  >
                    <img  src="{{$news->image ? asset('storage/' .$news->image) : asset('/images/no-image.png')}}"  class="box-image">

                    
                </div>
                <span class="ad-title">Contact us: Help and customer support</span>
                   <br>
                        <div>
                            {{$news->content}}
                    </div>
                    <div class="icons" style="text-align:center;margin-bottom:10px;">
                        <span ><a href="/edit-news/{{$id = $news->id}}"><i class="fa fa-pen"></i></a></span>
                        <span ><a href="/delete-news/{{$id = $news->id}}"><i class="fa fa-trash"></i></a></span>
                    </div>
            </div>
            @endforeach

            

           
            <span><a href="/news"><i class="fa fa-plus add-item"></i></a></span>
        </div>
    <br>
    <div class="accounts">
        <p>insights section <span><i class="fa fa-plus"></i></span></p>
        <hr class="main-line">

        <div class="cards">

            @foreach ($insights as $insight)
            <div class="card">
                <img  src="{{$insight->image ? asset('storage/' .$insight->image) : asset('/images/no-image.png')}}"  class="card-image">
                                   

                    
                        <div class="card-content">
                            <div class="card-title">{{$insight->title}}</div>
                            {{$insight->content}}
                        </div>
                        <button class="card-button">Read more <span><i class="fa fa-arrow-right"></i></span></button>
                        <div class="icons" style="text-align:center;margin-bottom:10px;">
                         <span ><a href="/edit-insight/{{$id = $insight->id}}"><i class="fa fa-pen"></i></a></span>
                         <span ><a href="/delete-insight/{{$id = $insight->id}}"><i class="fa fa-trash"></i></a></span>
                        </div>
                    </div>
            @endforeach
            @unless (count($insights) != 0)
                {{"No insight added"}}
            @endunless
            <span><a href="/insight-form"><i class="fa fa-plus add-item"></i></a></span>
        </div>
    </div>
</x-admin-layout>