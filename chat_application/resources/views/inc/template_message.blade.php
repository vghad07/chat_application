
@if($temp ?? '')
<div class="row">
 <div class="col-md-12">
  <div class="table-responsive">
@foreach($temp as $t)

 <div>{{$t->tNmae}}</div>
 <div><img src="{{asset('images/template')}}/{{$t->tImage}}" /></div>
  <div>{{$t->tDesription}}</div>

@endforeach
 </div>
</div>
</div>

@else

@endif

