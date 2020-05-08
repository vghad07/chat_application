

@extends('layouts.admin')

@section('content')


        

        <div class="sidebar-left sidebar-fixed">
            <div class="sidebar">
                <div class="sidebar-content card d-none d-lg-block">
                    <div class="card-body chat-fixed-search">
                       <fieldset class="form-group position-relative has-icon-left m-0">
                           <input type="hidden" class="form-control" id="usergroup" placeholder="Search Group">
                           <div class="form-control-position">
                        <!--      <i class="ft-search"></i>-->
                           </div>
                       </fieldset>     
            </div>
            <div id="users-list" class="list-group position-relative">
                <div class="users-list-padding media-list">
                 
                    @if(count($groups)>0)
                        @foreach($groups as $group)
                            <form>
                            @csrf
                                <input type="hidden" name="sen_id" value="{{session('user_id')}}">
                                <input type="hidden" name="rec_id"   value="{{$group->gId}}">
                        
                               <a href="{{url('/groupchat/index')}}/{{$group->gId}}/gch" class=" media border-0 " data-id="{{$group->gId}}">

                                <div class="media-left pr-1">
                                    <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('images')}}/{{session('pic')}}" alt="Generic placeholder image">
                                        <i></i>
                                    </span>
                                </div>
                                <div class="media-body w-100">
                                    <h6 class="list-group-item-heading">{{$group->gName}}
                                    <span class="font-small-3 float-right info">
                                         </span>
                                    </h6>
                                    <p class="list-group-item-text text-muted mb-0">
                                        <i class="ft-check primary font-small-2"></i> 
                                        <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span>
                                    </p>
                                </div>
                               </a>
                            </form>
                        @endforeach
                        @else
                        <div>No Groups are Available</div>
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
                                    <div class="chats" >
                                    <div class="chats" >
                                     @if(count($chats)>0)
                                       @foreach($chats as $c)
                                          @if($c->uId === auth()->user()->id)
                                       <div class="chat">
                                            <div class="chat-avatar">
                                               <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                   <img src="{{asset('images')}}/{{auth()->user()->uImage}}" style="height:25px;width:25px;" alt="avatar" />
                                                   <span>{{auth()->user()->name}}</span>
                                               </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content" id="chat_sen_msgs">
                                                   @if($c->chatImage) <img src="{{asset('images/groupchat')}}/{{$c->chatImage}}" style="height:105px;width:125px;" alt="avatar" />
                                                   @endif <p class="chat_sen_msg">{{$c->chatMessage}}</p>
                                                </div>
                                            </div>
                                        </div>

                                         @else 

                                        <div class="chat chat-left" id="left_chat_box">
                                            <div class="chat-avatar">
                                                <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                                  
                                             @if($c->uImage)       <img src="{{asset('images')}}/{{$c->uImage}}" style="height:25px;width:25px; margin:2px" alt="avatar" />
                                                @endif   
                                                @if($c->name)    <span>{{$c->name}}</span>  @endif  
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content" id="chat_rec_msgs">
                                                @if($c->chatImage)    <img src="{{asset('images/groupchat')}}/{{$c->chatImage}}" style="height:105px;width:125px;" alt="avatar" />
                                                  @endif  <p class="chat_rec_msg">{{$c->chatMessage}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                       @endforeach
                                 
                                     @endif

                                    </div>
                               </div>
                               </div>
                        </section>
                        <section class="chat-app-form">
                            {{ Form::open(['action' => ['GroupchatController@groupChatInsert'],'id'=>'ugchatFrm','name'=>'ugchatFrm','class'=>' d-flex','method'=>'POST','enctype'=>'multipart/form-data']) }}
                             @csrf
                            <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                                <div class="form-control-position">
                                    <i class="icon-emoticon-smile"></i>
                                </div>
                                <input type="text" class="form-control" id="message" name="message" placeholder="Type your message">
                                <input type="hidden" name="chat_sen_id" value="{{session('user_id')}}">
                                <input type="hidden" name="sgid" value="{{session('sgid')}}">
                                    <div class="form-control-position control-position-right">
                                       <i><imgc class="fl" src="{{asset('images')}}/attach.png" /></i>
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

<script src="{{ asset('app-assets/js/jquery-2.2.4.min.js')}}"></script>
    
<script type="text/javascript">  
       $(document).ready(function(){
           setTimeout(function() {
          var chat_sen_id = $("input[name=chat_sen_id]").val();
           var gid = $("input[name=gid]").val();
         //  LoadData(gid,chat_sen_id);
            }, 2000);
       });
     
       
        $(document).on('click', '.fl', function(event){
            $("input[type='file']").trigger('click');
        });


       $(document).on('click', '.send_frm', function(event) {
       
          // var message = $("input[name=message]").val();
          
           var sgid = $("input[name=sgid]").val();
         // var cimage = $("input[name=cimage]").val();          
            var form = $("#ugchatFrm")[0];
          var formData = new FormData(form);
          formData.append('message', $("input[name=message]").val());
           
           formData.append('sgid',$("input[name=sgid]").val());
           if( document.getElementById("cimage").files.length > 0 ){
             formData.append('cimage', $('input[type=file]')[0].files[0]);
          }
          $.ajaxSetup({
               headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           });
           $.ajax({
            type: 'POST'
            , url: "{{route('groupChatRequests.insertpost')}}"
            , data: formData
            ,  contentType: false
             ,  processData: false
            , success: function(data) {                
                $("#ugchatFrm").trigger("reset");
               location.reload();
            }
        });
          return false;

       });
     
     
     
       
</script>
