<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.css" >
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Add product</title>
    <style>
        .header{
        background-color: beige;
        padding:16px 32px 16px 32px;
    }
    
        </style>
</head>
<body>
<form method="POST" action="{{route('store')}}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <header class="header"> <label id="i">Admin Dashboard</label><a href="{{route('home')}}" style="float: right;text-decoration:none;"><label>Home</label></a></header><br>
 <div class="form-group row">
        <label class="col-md-4 col-form-label text-md-right">{{__('Jewllary Type')}}</label>
        <div class="col-md-6">
                
                <select id="type" name="type">
                    <option value="Earrings" selected>{{__('Earrings')}}</option>
                    <option value="Necklace">{{__('Necklace')}}</option>
                    <option value="Pendent">{{__('Pendent')}} </option>
                    <option value="Bangle">{{__('Bangle')}} </option>
                <option value="Bracelet"> {{__('Bracelet')}}</option>
                <option value="Cuff links"> {{__('Cuff links')}}</option>
                    <option value="Ring"> {{__('Ring')}} </option>
                    <option value="Anklet"> {{__('Anklet(Ankle Bracelets)')}} </option>
                    <option value="Toe Rings"> {{__('Toe Rings')}} </option>
                </select></div></div>
                <div class="form-group row">
     <label class="col-md-4 col-form-label text-md-right"> {{__('Title')}} </label>
     <div class="col-md-6">
     <input type="text" id="title" name="title"></div></div>

 <div class="form-group row"><label class="col-md-4 col-form-label text-md-right">{{__('Description')}} </label>
    <div class="col-md-6">
     <textarea id="discription" name="discription"></textarea>
 </div></div>
 <div class="form-group row">
 <label class="col-md-4 col-form-label text-md-right"> {{__('Price')}}</label><div class="col-md-6">
        <input type="text" id="price" name="price"></div></div>
        
        <div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('Discount')}} </label><div class="col-md-6">
                <select id="discount" name="discount">
                    <option value="Yes" selected> {{__('Yes')}} </option>
                    <option value="No">{{__('No')}} </option>
                </select></div></div>
<div class="form-group row">
                <label class="col-md-4 col-form-label text-md-right">{{__('DISCOUNT PRICE')}} </label><div class="col-md-6">
                <input type="text" id="discount_price" name="discount_price"></div>
                </div>
                <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">{{__('Image1')}} </label><div class="col-md-6">
                        <input type="file" id="image1" name="image1"></div></div>
                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{__('Image2')}} </label><div class="col-md-6">
                                <input type="file" id="image2" name="image2"></div></div>
                                <div class="form-group row">
                                        <label class="col-md-4 col-form-label text-md-right">{{__('Image3')}} </label><div class="col-md-6">
                                        <input type="file" id="image3" name="image3"></div></div>
                                        <div class="form-group row">
                                                <label class="col-md-4 col-form-label text-md-right">{{__('Image4')}} </label><div class="col-md-6">
                                                <input type="file" id="image4" name="image4"></div></div>
                                                <div class="form-group row">
                                                <label class="col-md-4 col-form-label text-md-right">{{__('Quantity')}}</label><div class="col-md-6">
                                                        <input type="text" id="qty_avl" name="qty_avl"></div></div>
                                                       
                                                                
                                                            <div>
                                                             <center>   <input type="submit" class="btn btn-primary" value="Add Product" style="margin-bottom:20px;"></center>
                                                            </div>
                                                        </form>

    
</body>
</html>