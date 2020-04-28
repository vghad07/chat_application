@extends ('layouts.admin')
@section('content')

<div class="content-wrapper">
     {{ Form::open(['action' => ['GroupController@addUserGroup'],'id'=>'ugFrm','name'=>'ugFrm','class'=>'form-inline d-flex','method'=>'POST']) }}
     @csrf
   
        
    
         <div class="row">
            <div class="form-group mb-2">                    
                <input type="text" class="form-control" id="iconLeft4" placeholder="Search user">
            </div>
            <div class="form-group  mb-2">
                <select name="gid" id="gid" onChange="getUsers()" class="form-control">
                <option value="">Select</option>
                @foreach($groups as $group)
                 <option value="{{$group->gId}}" >{{$group->gName}}</option>
                @endforeach
            </div>
            <div class="form-group mb-2">
                <input type="submit" class="btn btn-primary" value="Assign Group">
            </div>
         </div>
      
        <div class="row"> 
            <div class="col-md-6">   
            <span>All Users </span>  
            <table  class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" name="uid[]" value="{{$user->id}}" class="input-chk">
                        </td>
                        <td>
                            <div class="media">
                            <div class="media-left pr-1"></div>
                                <div class="media-body media-middle">
                                    <a href="#" class="media-heading">{{$user->name}}</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
           
            </div>
         
            <div class="col-md-6"> 
             <span>Group Users </span>     
                <table class="table table-white-space table-bordered row-grouping display no-wrap icheck table-middle" >
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody id="group_usr">
                </tbody>
                </table>
            </div>
        </div>
       
 {{Form::close()}}
</div>
@endsection
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script>
    function getUsers() {
        var gid = $("#gid option:selected").val();
    
        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
            type: 'POST'
            , url: "{{route('ajaxReq.getUsers')}}"
            , data: {
              gid: gid
                
                // ,cimage: cimage

            }
            , success: function(data) {                      
                var bd = "";
                if(data.resp.length == 0){
                    $('#group_usr').html(bd);
               }
               else {
                  for(var i=0;i<data.resp.length;i++){
                      bd +='<tr><td><input type="checkbox" name="uid[]" value="'+data.resp[i].uId+'" class="input-chk"></td><td><div class="media"><div class="media-left pr-1"></div<div class="media-body media-middle">'+data.resp[i].name+'</div></div></td></tr>';                
              }
           }
          $('#group_usr').html(bd);
             
            }
        });          
}
</script>