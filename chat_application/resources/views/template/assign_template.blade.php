@extends ('layouts.admin')
@section('content')

 
 
<div class="content-wrapper">
     {{ Form::open(['action' => ['TemplateController@addUserGroupTemplate'],'id'=>'utFrm','name'=>'utFrm','class'=>'form-inline d-flex','method'=>'POST']) }}
     @csrf
   
        
    
         <div class="row">
            <div class="form-group mb-2">                    
                <input type="text" class="form-control" id="iconLeft4" placeholder="Search user">
            </div>
            <div class="form-group  mb-2">
                <select name="gid" id="gid" onChange="getGUsers()" class="form-control">
                <option value="">Select</option>
                @foreach($groups as $group)
                 <option value="{{$group->gId}}" >{{$group->gName}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group  mb-2">
                <select name="tid" id="tid" onChange="getTUsers()" class="form-control">
                <option value="">Select</option>
                @foreach($templates as $temp)
                 <option value="{{$temp->tId}}" >{{$temp->tName}}</option>
                @endforeach
                </select>
            </div>
             <div class="form-group mb-2">
                <input type="date" name="displayDate" class="form-control" >
            </div>
            <div class="form-group mb-2">
                <input type="submit" class="btn btn-primary" value="Assign Template">
            </div>
     </div>
    <div class="row">
        <div class="col-md-3">
        <table class="table">
            <thead class="thead-dark">
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
        <div class="col-md-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody id="group_usr">
            </tbody>
        </table>
        </div>
    
        <div class="col-md-3">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th>Group Name</th>
            </tr>
            </thead>
             <tbody id="temp_group">
            </tbody>
        </table>
        </div>
        <div class="col-md-3">
        <table class="table">
            <thead class="thead-dark">
                <tr>                                               
                    <th>User Name</th>
                </tr>
            </thead>
            <tbody id="temp_user">
            </tbody>
        </table>
        </div>

            
            
    </div>
      
       
 {{Form::close()}}
</div>
@endsection
<script src="{{ asset('app-assets/js/jquery-2.2.4.min.js')}}"></script>

<script>
    function getGUsers() {
        var gid = $("#gid option:selected").val();
      
            $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
                type: 'POST'
                , url: "{{route('ajaxReq.getGUsers')}}"
                , data: {
                  gid: gid  
                }
                , success: function(data) {                      
                     var bd = "";
                    if(data.resp.length == 0){
                        $('#group_usr').html(bd);
                    }
                    else {
                        for(var i=0;i<data.resp.length;i++){
                            bd +='<tr><td><div class="media"><div class="media-left pr-1"></div<div class="media-body media-middle">'+data.resp[i].name+'</div></div></td></tr>';                
                        }
                    }
                   $('#group_usr').html(bd);
               }
          });          
    }

    function getTUsers() {
        var tid = $("#tid option:selected").val();
     
        $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
        });
        $.ajax({
            type: 'POST'
            , url: "{{route('ajaxReqs.getTUsers')}}"
            , data: {
                tid: tid             
            }
            , success: function(data) {                      
                var gd = "";
                var ud = "";
                
               
                if(data.temp_group.length == 0){
                    $('#temp_group').html(gd);
                }
                else {
                    for(var i=0;i<data.temp_group.length;i++){
                        gd +='<tr><td><div class="media"><div class="media-left pr-1"></div<div class="media-body media-middle">'+data.temp_group[i].gName+'</div></div></td></tr>';                
                    }
                }   
                 $('#temp_group').html(gd); 
                if(data.temp_user.length == 0){
                    $('#temp_user').html(ud);
                }
                else {
                    for(var j=0;j<data.temp_user.length;j++){
                       ud +='<tr><td><div class="media"><div class="media-left pr-1"></div<div class="media-body media-middle">'+data.temp_user[j].name+'</div></div></td></tr>';                
                    }
                }
            
             $('#temp_user').html(ud);  
            }
        });          
    }
  


</script>