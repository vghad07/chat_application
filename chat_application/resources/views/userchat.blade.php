 @extends('layouts.Users')

 @section('content')


  <div class="sidebar-left sidebar-fixed">
            <div class="sidebar">
                <div class="sidebar-content card d-none d-lg-block">
                    <div class="card-body chat-fixed-search">
                       <fieldset class="form-group position-relative has-icon-left m-0">
                           <input type="text" class="form-control" id="iconLeft4" placeholder="Search user">
                           <div class="form-control-position">
                               <i class="ft-search"></i>
                           </div>
                       </fieldset>     
            </div>
            <div id="users-list" class="list-group position-relative">
                <div class="users-list-padding media-list">
                    @if(count($users)>0)
                        @foreach($users as $user)
                            <form>
                            @csrf
                                
                        
                               <a href="#" class=" media border-0 btn-submit" data-id="{{$user->id}}">
                                   <div class="media-left pr-1">
                                       <span class="avatar avatar-md avatar-busy">
                                           <img class="media-object rounded-circle" src="{{asset('images')}}/{{$user->uImage}}" alt="Generic placeholder image">
                                           <i></i>
                                       </span>
                                       <input type="hidden" name="sen_id" value="{{session('user_id')}}">
                                <input type="hidden" name="rec_id"  value="{{$user->id}}">
                                   </div>
                                    <div class="media-body w-100">
                                       <h6 class="list-group-item-heading">{{$user->name}}
                                           <span class="font-small-3 float-right info">
                                          
                                           </span>
                                        </h6>
                                        <p class="list-group-item-text text-muted mb-0">
                                        <i class="ft-check primary font-small-2">

                                        </i> 
                                            <span class="float-right primary">
                                               <span class="badge badge-pill badge-danger"></span>
                                            </span>
                                        </p>
                                   </div>
                                </a>
                            </form>
                        @endforeach
                    @endif

                </div>
            </div>
           </div>
            </div>
        </div>
        <div class="content-right">
            <div class="content-wrapper">
                <div class="content-header row"></div>
                    <div class="content-body">
                        <section class="chat-app-window" >
                            <div class="badge badge-default  mb-1">Chat History</div>
                                <div class="chats" >
                                    <div class="chats" id="chats_box" >
                                       
                                    </div>
                            </div>
                        </section>
                        <section class="chat-app-form">
                            {{ Form::open(['action' => ['ChatController@insert'],'id'=>'uchatFrm','name'=>'uchatFrm','class'=>'chat-app-input d-flex','method'=>'POST','enctype'=>'multipart/form-data']) }}
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                                <div class="form-control-position">
                                    <i class="icon-emoticon-smile"></i>
                                </div>
                                <input type="text" class="form-control" id="message" name="message" placeholder="Type your message">
                                <input type="hidden" name="chat_sen_id" value="{{session('user_id')}}">
                                <input type="hidden" name="chat_rec_id">
                                    <div class="form-control-position control-position-right">
                                       <i><img src="https://img.icons8.com/office/16/000000/attach.png"/></i>
                                        <input type="file" name="cimage" id="cimage">
                                       
                                    </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left col-2 m-0">
                                <button type="button" class="btn btn-info send_frm "><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
                            </fieldset>
                          </form>
                        </section>
                    </div>
            </div>
        </div>  


@endsection

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript">  
      $(document).ready(function(){
       setTimeout(function() {
          var chat_sen_id = $("input[name=chat_sen_id]").val();
           var chat_rec_id = $("input[name=chat_rec_id]").val();
           LoadData(chat_rec_id,chat_sen_id);
            }, 1000);
             });
       
        $(document).on('click', 'i', function(event){
            $("input[type='file']").trigger('click');
        });


       $(document).on('click', '.send_frm', function(event) {
       
           //var message = $("input[name=message]").val();
           var chat_sen_id = $("input[name=chat_sen_id]").val();
           var chat_rec_id = $("input[name=chat_rec_id]").val();
         // var cimage = $("input[name=cimage]").val();          
            var form = $("#uchatFrm")[0];
          var formData = new FormData(form);
          formData.append('message', $("input[name=message]").val());
           formData.append('chat_sen_id', $("input[name=chat_sen_id]").val());
           formData.append('chat_rec_id', $("input[name=chat_rec_id]").val());
          $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
            type: 'POST'
            , url: "{{route('ajaxRequests.insertpost')}}"
            , data: formData
            ,  contentType: false
             ,  processData: false
            , success: function(data) {                
                $("#uchatFrm").trigger("reset");
                LoadData(chat_rec_id,chat_sen_id);
            }
        });
          return false;

       });
     
     
     
       $(document).on('click', '.btn-submit', function(event) {
          
           var rec = $(this).attr('data-id');
           var sen = $("input[name=sen_id]").val();             
           event.preventDefault();  
           LoadData(rec,sen);
           return false;
      });
       
      function LoadData(rec,sen){
                 $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
            type: 'POST'
            , url: "{{route('ajaxRequest.post')}}"
            , data: {
                rec: rec
                , sen: sen

            }
            , success: function(data) {

             $("input[name=chat_rec_id]").val(data.rid);
            
             var list ="";
            
           
           if(data.smsg.length == 0){
            $('#chats_box').html(list);
            
           }
           else{ 
                for(var i=0;i<data.smsg.length;i++){
                   if(data.smsg[i].senderId=={{session('user_id')}}){
                   list += '<div class="chat" id="chat_box"><div class="chat-avatar"><a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title=""><img src="{{asset('images')}}/{{session('pic')}}" style="height:25px;width:25px;" alt="avatar" /><span>Me</span></a></div><div class="chat-body"><div class="chat-content" id="chat_sen_msgs"><p class="chat_sen_msg">' + data.smsg[i].message + '</p></div></div></div>';                
                  if(data.smsg[i].chatImage !==null ){
                    list +='<img src="{{asset('images/chat/')}}/'+data.smsg[i].chatImage+'" style="width:25%;height:25%" />';
                     }
                   }
                   if(data.smsg[i].receiverId=={{session('user_id')}})
                   {
                   list += '<div class="chat chat-left" id="left_chat_box"><div class="chat-avatar"><a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title=""><img src="{{asset('images')}}/'+data.uimage+'" style="height:25px;width:25px; margin:2px" alt="avatar" /><span>{{session("name")}}</span></a></div><div class="chat-body"><div class="chat-content" id="chat_rec_msgs"><p class="chat_rec_msg">' + data.smsg[i].message + '</p></div></div></div>';
                    if(data.smsg[i].chatImage !==null ){
                    list +='<img src="{{asset('images/chat/')}}/'+data.smsg[i].chatImage+'" style="width:25%;height:25%" />';
                     }
                   }
             }
             
                 
           }
          $('#chats_box').html(list);
            }
          });
        }
</script>


 
