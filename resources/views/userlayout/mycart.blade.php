@extends('layouts.app')

@section('content')
<?php 
$i=0;
?>
@if($cart!=null)
<form action="{{--{{route('cancel',['id'=> $id=$booking[$i]->id])}}" " --}}"enctype="multipart/form-data">
    
    {{ csrf_field() }}
{{method_field('DELETE')}}
    My Cart  <br>
<table>
@for ($i = 0; $i < count($proid); $i++)
<tr>
<td><a href="/show/{{$proid[$i]->product_id}}"><img src="/storage/jewellers/{{$proid[$i]->image1}}" style="margin:auto;"  height="250px" width="250px"></a></td>
<div>
 <td><label>Product:</label><span>  </span><label>{{$proid[$i]->title}}</label><br/>
    <label>Discription:</label><span>  </span><label>{{$proid[$i]->discription}}</label><br/>
  <label>Price:</label><span>  </span><label>{{$proid[$i]->price}}</label><br/>
  <label>Discount:</label><span>  </span><label>{{$proid[$i]->discount_price}}</label><br/>
  <label>Quantity Avilable:</label><span>  </span><label>{{$proid[$i]->qty_avl}}</label><br/>
<a href="{{url('remove',[$proid[$i]->id])}}" data-method="delete" button type="button" onclick="return confirm('do you really want to remove')"name="remove" class="btn btn-danger btn-xs delete-user">Remove </button></a><span>      </span>
 <a href="{{url('payment',[$proid[$i]->id])}}" data-method="post" button type="button" name="book" class="btn btn-danger btn-xs delete-user">Book Now</button></a>
</div>    
  <td>
</tr>
@endfor
</table>
</form>
@else
   <img src="\storage\empty\emptycart.png" height="50%" width="100%">
@endif
@endsection