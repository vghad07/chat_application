
@if($temp ?? '')

@foreach($temp as $t)

<section id="description" class="card">
    <div class="card-header">
        <div class="card-title">
            <h4 class="card-title">Description</h4>
         
              <div class="card-img-top img-fluid bg-cover height-100" style="background: url({{asset('images/template')}}/{{$t->tImage}}) 50%;"></div>

        </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <div class="card-text">
                <p>{{$t->tName}}<input type="hidden" name="tuid" value="{{auth()->user()->id}}"><input type="hidden" name="tid" value="{{$t->tId}}"></p>
            </div>
            <div class="alert bg-success alert-icon-left mb-2" role="alert">
              <span class="alert-icon"><i class="fa fa-pencil-square"></i></span>
              <strong>Experience it!</strong>
              <p>{{$t->tDescription}}</p>
            </div>
        </div>
    </div>
</section>
@endforeach
@endif
<script>
 $(document).on('click', '.card', function(event){
     var tuid =  $("input[name=tuid]").val();
     var tid =  $("input[name=tid]").val();
        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
            type: 'POST'
            , url: "{{route('ajaxchatRequest.temp')}}"
            , data: {
                tuid: tuid
            ,tid: tid

            }
            , success: function(data) {

          
         
            }
          });
 });
setTimeout(function() {
  
               $('.card').fadeOut('fast');
}, 7000);
                </script>