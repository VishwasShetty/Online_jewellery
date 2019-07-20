<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
    .header{
        background-color: beige;
        padding:16px 32px 16px 32px;
    }
    #i{
        font:bold;
    }
    .button{
        text-decoration: none;
        font:bold 13px Arial;
        background-color:#ff0000;
        color:black;
        padding: 12px 24px 12px 24px;
        border-top: 1px solid #cccccc;
        border-right: 1px solid #333333;
        border-bottom: 1px solid #333333;
        border-left: #cccccc;
        border-radius: 15%;
    }
    </style>

    <title>Admin Dashboard</title>
</head>
<body>
<header class="header"> <label id="i">Admin Dashboard</label><a href="{{route('home')}}" style="float: right;text-decoration:none;"><label>Home</label></a></header><br>
<form method="GET" action="{{route('add')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
<input type="submit" value="add product" style="background-color:cadetblue;"class="button"><br><br>

<table>
        @foreach($products as $product)
        <tr>
        <td><img src="/storage/jewellers/{{$product->image1}}" style="margin:auto;"  height="250px" width="250px"></td>
        <div>
         <td ><label style="margin-left: 150px; font-weight:bold;">Product:</label><span>  </span><label>{{$product->title}}</label><br/><br/>
            <label style="margin-left: 150px; font-weight:bold; ">Discription:</label><span>  </span><label>{{$product->discription}}</label><br/><br/>
          <label style="margin-left: 150px; font-weight:bold; ">Price:</label><span>  </span><label>{{$product->price}}</label><br/><br/>
          <label style="margin-left: 150px; font-weight:bold; ">Discount:</label><span>  </span><label>{{$product->discount_price}}</label><br/><br/>
          <label style="margin-left: 150px;font-weight:bold;">Quantity Left:</label><span>  </span><label>{{$product->qty_avl}}</label><br/><br/>
        <a style="margin-left: 150px;background-color:#FA8072;"  href="{{route('edit',[$product->id])}}" data-method="post" button type="button" name="remove" class="button">Edit</button></a><span>      </span>
         <a  style="margin-left: 10px;" href="{{route('remove',[$product->id])}}" data-method="post" button type="button" onclick="return confirm('do you really want to remove')" name="book" class="button">Remove</button></a>
        </div>    
          <td>
        </tr>
        @endforeach
        </table>

</form>
</body>
</html>

