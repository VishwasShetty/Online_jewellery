<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.css" >
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Edit Product</title>
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
    #label{
        font-size:24px;
       
    }
    #label1{
        font-size:26px;
    }
    </style>
</head>
<body><form method="GET" action="{{route('update',$product->id)}}" enctype="multipart/form-data">
        <header class="header"> <label id="i">Admin Dashboard</label><a href="{{route('home')}}" style="float: right;text-decoration:none;"><label>Home</label></a></header><br>
    <table>
<tr><th><label id="label1">Current Detailes</label></th><th><label id="label1">Enter new Detailes</label></th></tr>
    <tr><td><label id="label" >{{_('Title : ')}}</label>&nbsp;&nbsp;<label id="label">{{$product->title}}</label><br/>
        <label id="label" >{{_('Discription : ')}}</label>&nbsp;&nbsp;<label id="label">{{$product->discription}}</label><br/>
        <label id="label">{{_('Price : ')}}</label>&nbsp;&nbsp;<label id="label">{{$product->price}}</label><br/>
        <label id="label" >{{_('Discount Price : ')}}</label>&nbsp;&nbsp;<label id="label">{{$product->discount_price}}</label><br/>
        <label id="label" >{{_('Quantity Available : ')}}</label>&nbsp;&nbsp;<label id="label">{{$product->qty_avl}}</label><br/>
    </td>
<td>
            <div class="col-md-6">
                <input type="text" id="title" name="title" class="form-control">
            </div>
   
   
        <div class="col-md-6">
            <textarea id="discription" name="discription" class="form-control"></textarea><br>
        </div>


    <div class="col-md-6">
        <input type="text" id="price" name="price" class="form-control">
    </div>

    <div class="col-md-6">
        <input type="text" id="discount_price" name="discount_price" class="form-control">
    </div>



    <div class="col-md-6">
        <input type="text" id="qty_avl" name="qty_avl" class="form-control">
    </div>
</td>
</tr>
</table>
<center><button type="subumit" class="btn btn-danger btn-xs delete-user" style="width:10em;height:4em;">Update</button></center>
</form>
</body>
</html>