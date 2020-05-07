@if(count($res)>0)
@foreach($res as $r)
   {{$r->name}}
@endforeach
@endif