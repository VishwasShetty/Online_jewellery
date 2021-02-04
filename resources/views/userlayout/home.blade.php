
@extends('layouts.app')

@section('content')
<style>
        .thumbnail{
            display: block;
            margin-left: auto;
            margin-right: auto;
            height:250px;
            width:250px;
            
           -webkit-filter: grayscale(0.1%);
        }
        .thumbnail:hover{
            opacity:0.7;
        }

        .button-like{
            border:2px solid #8a8a8a;
            background-color:transparent;
            text-decoration:none;
            padding:1rem;
            position:relative;
            vertical-align: middle;
            text-align: center;
            display: inline-block;
            border-radius: 3rem;
            color:#8a8a8a;
            transition: all ease 0.4s;
        }
        .button-like span{
            margin-left: 0.5rem;
        }
        .button-like .fa,.button-like span{
            transition: all ease 0.4s;
        }
        .button-like:focus{
            background-color: transparent;
        }
        .button-like:focus .fa,.button-like:focus span{
            color:#8a8a8a;
        }
        .button-like:hover{
            border-color:#cc4b37;
            background-color:transparent;
        }
 .button-like:hover .fa,
 button-like:hover span{
     color:#cc4b37;
 }
 .liked{
     background-color:#cc4b37;
     border-color:#cc43b7;
 }

 .liked .fa,
 .liked span{
     color:#fefefe;
 }
 .liked:focus{
     background-color: #cc4b37;
 }

 .liked:focus .fa,.liked:focus span{
            color:#fefefe;
        }
        .liked:hover{
            border-color:#cc4b37;
            background-color:#cc4b37;
        }

        .liked:hover .fa,.liked:hover span{
            color:#fefefe;
        }

        .button-like{
            border:2px solid $dark-gray;
            background
        }
        </style> 
@if(count($products)>0)
<?php
$colcount=count($products);
$i=1;
?>
<center>
<div id="albums"  style="margin-top:20px;">
    <div class="row text-center">
        @foreach ($products as $product)
        @if($i == $colcount)
        <div class='medium-4 columns end' >
                <h4>{{$product->title}}</h4>
        <a href="/show/{{$product->id}}">
            <img class="thumbnail" src="/storage/jewellers/{{$product->image1}}" alt="{{$product->title}}">
        </a>
        @if (Route::has('login'))
        @auth
      <a href="wishlist/{{$product->id}}" data-method="delete"><button class="button button-like" onclick="fun()" >
              <i class="fa fa-heart"></i>
              <span id="span">Like</span></button></a>
              @else
      <a href="{{route('login')}}" ><button class="button button-like" >
                  <i class="fa fa-heart"></i>
                  <span id="span">Like</span></button></a>
                  @endauth
                  @endif
                <br> 
                @else
                <div class="medium-4 columns">
                    <h4>{{$product->title}}</h4>   
                <a href="/show/{{$product->id}}">
                      <img class="thumbnail" src="/storage/jewellers/{{$product->image1}}" alt="{{$product->title}}">
                            </a>
                            @if (Route::has('login'))
                              @auth
                            <a href="wishlist/{{$product->id}}" data-method="delete"><button class="button button-like" onclick="fun()" >
                                    <i class="fa fa-heart"></i>
                                    <span id="span">Like</span></button></a>
                                    @else
                            <a href="{{route('login')}}" ><button class="button button-like" >
                                        <i class="fa fa-heart"></i>
                                        <span id="span">Like</span></button></a>
                                        @endauth
                                        @endif
                            <br>
                @endif
            @if($i % 3==0)
            </div></div><div class="row text-center">
                @else
            </div>
            @endif
            <?php
             $i++;
            ?>
            @endforeach
        </div>
</div>
</center>
@else
<p>NO Product DISPLAY</p>
@endif
   {{-- <p>{{$user->name}}</p>    --}}
   <script>

    function fun()
    {
        alert('Product Added To Wishlist');
 
    } 
       </script>

  @endsection