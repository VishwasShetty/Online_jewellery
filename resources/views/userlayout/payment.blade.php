@extends('layouts.app')
@section('content')
<style>
    .label
        {
        font-family:"palatino","book antiqua","platino",serif;
        font-size: 15px;
        color: black;
        background-color: transparent;
        }
        #qty{
            width:80px;
        }
    </style>
<form method="POST" action="{{route('confirm',['id'=>$product->id])}}" enctype="multipart/form-data">
    {{ csrf_field() }}
  <table>
    <tr><td><img src="/storage/jewellers/{{$product->image1}}"></td>
        
     <td>
            <label class="label">{{$product->title}}</label><br>
            <label class="label">{{$product->discription}}</label><br>
              <label class="label">{{number_format($product->price)}}</label><br>
               <label class="label">{{$product->discount_price}}</label><br>
     </td></tr>  </table>
    <label class="label" style="margin-left:600px;">Quantity</label>
        <select id="qty" name="qty"  >
            <option value="1" selected>1</option>
            <option value="2" >2</option>
            <option value="3" >3</option>
            <option value="4" >4</option>
            <option value="5">5</option>
        </select><br>
        <label class="label" style="margin-left:600px;" >Payment</label>
            <input type="radio"  checked name="payment" value="Cash">Cash<br/>
            <input type="radio"  style="margin-left:680px;" name="payment" value="Card">Credit/Debit Card<br/>
            <input type="submit" class="btn btn-danger btn-xs delete-user" style="margin-left:640px;" value="Confirm Booking">      
       <div></div>
</form>
@endsection