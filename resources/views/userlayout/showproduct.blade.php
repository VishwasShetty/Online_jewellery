@extends('layouts.app')

@section('content')
<style>
        .form-control{
        width:300px;
        }

        #comment{
            /* display:inline-block;
            margin-right: 10px; */
            float: left;
            margin-left: 10px;
        }
        #comment1{
            /* display: inline-block; */
            margin-top: 20px;
           margin-left:20px;
            float: left;
        }
        #stars{
            width:80px;
            margin-top: 20px;
           margin-left:85px;
            float: left;
        }
        #i1{
            margin-left: 10px;
        }
        #i2{
            margin-left: 330px;
        }
        .mySlides{
            display: none;
        }
        #i{
            background-color: cyan;
            opacity: 0.9;
        }
        #img{
            border-radius: 100%;
            max-width: 150px;
            max-height: 150px;
            width: 50px;
            height: 50px;
        }
        .label
        {
        font-family:"palatino","book antiqua","platino",serif;
        font-size: 15px;
        color: black;
        background-color: transparent;
        }
        </style>
<form Method="GET" action="{{route('comment',['id'=>$product->id])}}" enctype="multipart/form-data">
{{ csrf_field() }}
<table>
<tr><td>
    
<img src="/storage/jewellers/{{$product->image1}}" alt="{{$product->title}}" height="300px" width="300px"> 

</td>

    <td>@if($product->qty_avl==0)
   <label class="label">{{$product->title}}</label><br>
<label class="label">{{$product->discription}}</label><br>
<label class="label">{{number_format($product->price)}}</label><br>
<label class="label">{{$product->discount_price}}</label><br>
<label class="label">Price Soon</label><br>
<label class="label" id="i">Out of Stock</label><br>
   @else
   <label class="label">{{$product->title}}</label><br>
<label class="label">{{$product->discription}}</label><br>
<label class="label">{{number_format($product->price)}}</label><br>
<label class="label">{{$product->discount_price}}</label><br>
<label class="label">Price Soon</label><br>
<label class="label">Hurry Only Few Left</label><br>
@endif



    @if (Route::has('login'))
    @auth
    @if($product->qty_avl==0)
    <a href="{{route('payment',['id'=>$product->id])}}" data-method="post" button type="button" style="display:none;" name="book" class="btn btn-danger btn-xs delete-user">Book Now</button></a>
    <a href="{{route('cart',['id'=>$product->id])}}" data-method="post" button type="button" name="cart" class="btn btn-danger btn-xs delete-user">Add To Cart</button></a>
     @else
     <a href="{{route('payment',['id'=>$product->id])}}" data-method="post" button type="button"  name="book" class="btn btn-danger btn-xs delete-user">Book Now</button></a>
     <a href="{{route('cart',['id'=>$product->id])}}" data-method="post" button type="button" name="cart" class="btn btn-danger btn-xs delete-user">Add To Cart</button></a>
     @endif
    @else
   <a href="{{route('login')}}" data-method="post" button type="button" name="nobook" class="btn btn-danger btn-xs delete-user">Book Now</button></a>
<a href="{{route('login')}}" data-method="post" button type="button" name="nocart" class="btn btn-danger btn-xs delete-user">Add To Cart</button></a>
@endauth
@endif
    </td></tr>
</table>

@if (Route::has('login'))
@auth
<label id="i1" class="label">Your Comment Here</label><label id="i2">Stars Out Of 5</label><br>
<textarea class="form-control"  name="comment" id="comment"></textarea><input value="Post" type="submit" id="comment1" name="nocart" class="btn btn-danger btn-xs delete-user"></button></a>
<input type="number" name="stars" id="stars" max="5">
@else 
<label class="label" id="i1">Your Comment Here</label><label class="label" id="i2">Stars Out Of 5</label><br>
<textarea class="form-control"  name="comment" id="comment"></textarea><a href="{{route('login')}}" data-method="post" button type="button" name="nocart" id="comment1" class="btn btn-danger btn-xs delete-user">Post</button></a>
<input type="number" name="stars" id="stars" max="5">
    @endauth
@endif
<br><br><br><br>
@if($posts!=null)
<label class="label" style="margin-left: 10px;">Ratings and Reviews</label><br>
<table>
    <tr><th>Profile_image</th><th>User</th><th>Comment</th><th>Stars</th></tr>
    @for ($i = 0; $i < count($posts); $i++)
    <tr>
    <td><img src="/storage/profiles/{{$userid[$i]->profile_image}}" id="img"></td>
    <td><label class="label">{{$userid[$i]->name}}</label></td>
    <td><label class="label">{{$posts[$i]->comment}}</label></td>
    <td><label class="label">{{$posts[$i]->stars}}</label></td>    
</tr>
@endfor
</table>
   
@else
<label class="label">No Reviews Yet</label>
@endif
</form>


@endsection
