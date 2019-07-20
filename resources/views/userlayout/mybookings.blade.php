@extends('layouts.app')

@section('content')
<?php 
$i=0;

?>
@if($bookings!=null)
 <form action="{{--{{route('cancel',['id'=> $id=$booking[$i]->id])}}" " --}}" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('DELETE')}}
    My Bookings  <br>
<table>
@for ($i = 0; $i < count($proid); $i++)
<tr>
<td><a href="/show/{{$bookings[$i]->product_id}}"><img src="/storage/jewellers/{{$proid[$i]->image1}}" style="margin:auto;"  height="250px" width="250px"></a></td>
<div>
 <td><label>Product:</label><span>  </span><label>{{$proid[$i]->title}}</label><br/>
  <label>Discription:</label><span>  </span><label>{{$proid[$i]->discription}}</label><br/>
  <label>Price:</label><span>  </span><label>{{$proid[$i]->price}}</label><br/>
  <label>Discount:</label><span>  </span><label>{{$proid[$i]->discount_price}}</label><br/>
 <label>Quantities:</label><span></span><label>{{$bookings[$i]->qty}}</label><br/>
 <label>Total Price:</label><span></span><label>{{$bookings[$i]->total_price}}</label><br/>
 <label>Booking:</label><span></span><label>{{$bookings[$i]->status}}</label><br/>
<a href="{{url('cancel',[$bookings[$i]->id])}}" data-method="delete" button type="button" onclick="return confirm('do you really want to cancel your order')"name="cancel" class="btn btn-danger btn-xs delete-user">Cancel Booking</button></a>
</div> 
    
  <td>
</tr>
@endfor
</table>
</form>
@else
<img src="">
@endif
@endsection