
@if($temp ?? '')
<div class="row">
 <div class="col-md-12">
  <div class="table-responsive">
@foreach($temp as $t)

 <div>{{$t->tName}}</div>
 <div><img src="{{asset('images/template')}}/{{$t->tImage}}" style="width=125px;height=105px" /></div>
  <div>{{$t->tDescription}}</div>

@endforeach
 </div>
</div>
</div>

@else

@endif

