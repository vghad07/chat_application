 @extends('layouts.Users')

 @section('content')
  @include('inc.template_message')

  <div class="sidebar-left sidebar-fixed">
            <div class="sidebar">
                <div class="sidebar-content card d-none d-lg-block">
                    <div class="card-body chat-fixed-search">
                       <fieldset class="form-group position-relative has-icon-left m-0">
                           <input type="hidden" class="form-control" id="usersearch" placeholder="Search user">
                           <div class="form-control-position">
                              <!-- <i class="ft-search"></i>-->
                           </div>
                       </fieldset>     
            </div>
            <div id="users-list" class="list-group position-relative">
                <div class="users-list-padding media-list">
                    @if(count($users) >0)
                        @foreach($users as $user)
                            <form>
                            @csrf
                                
                        
                               <a href="{{url('/chat/index')}}/{{$user->id}}/ch" class=" media border-0 " data-id="{{$user->id}}">
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
                                    <div class="chats" >
                                     @if(count($chats)>0)
                                       @foreach($chats as $c)
                                          @if($c->senderId === auth()->user()->id)
                                       <div class="chat">
                                            <div class="chat-avatar">
                                               <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                                   <img src="{{asset('images')}}/{{auth()->user()->uImage}}" style="height:25px;width:25px;" alt="avatar" />
                                                   <span>{{auth()->user()->name}}</span>
                                               </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content" id="chat_sen_msgs">
                                                   @if($c->chatImage) <img src="{{asset('images/chat')}}/{{$c->chatImage}}" style="height:105px;width:125px;" alt="avatar" />
                                                   @endif <p class="chat_sen_msg">{{$c->message}}</p>
                                                </div>
                                            </div>
                                        </div>

                                         @else 

                                        <div class="chat chat-left" id="left_chat_box">
                                            <div class="chat-avatar">
                                                <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                                  
                                                    <img src="{{asset('images')}}/{{$usr->uImage}}" style="height:25px;width:25px; margin:2px" alt="avatar" />
                                                   
                                                    <span>{{$usr->name}}</span>
                                                </a>
                                            </div>
                                            <div class="chat-body">
                                                <div class="chat-content" id="chat_rec_msgs">
                                                @if($c->chatImage)    <img src="{{asset('images/chat')}}/{{$c->chatImage}}" style="height:105px;width:125px;" alt="avatar" />
                                                  @endif  <p class="chat_rec_msg">{{$c->message}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                       @endforeach
                                     @endif
                                    </div>
                               </div>
                        </section>
                         @if(count($chats)>0)
                        {{$chats->links()}}
                        @endif
                        <section class="chat-app-form">
                            {{ Form::open(['action' => ['ChatController@insert'],'id'=>'uchatFrm','name'=>'uchatFrm','class'=>'chat-app-input d-flex','method'=>'POST','enctype'=>'multipart/form-data']) }}
                            @csrf
                            <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                                <div class="form-control-position">
                                    <i class="icon-emoticon-smile"></i>
                                </div>
                                <input type="text" class="form-control" id="message" name="message" placeholder="Type your message">
                                <input type="hidden" name="chat_sen_id" value="{{session('user_id')}}">
                                <input type="hidden" name="chat_rec_id" value="{{session('srec_id')}}">
                                    <div class="form-control-position control-position-right">
                                       <i><img src="{{asset('images')}}/attach.png" /></i>
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
    $(document).on('click', 'i', function(event){
            $("input[type='file']").trigger('click');
        });
        
    setTimeout(function() {
                $("#tmp_msg").hide('blind', {}, 500)
                }, 5000);
   $(document).on('click', '.send_frm', function(event) {
       
                    
            var form = $("#uchatFrm")[0];
          var formData = new FormData(form);
          formData.append('message', $("input[name=message]").val());
           
           formData.append('chat_rec_id', $("input[name=chat_rec_id]").val());
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
            , url: "{{route('ajaxRequests.insertpost')}}"
            , data: formData
            ,  contentType: false
             ,  processData: false
            , success: function(data) {                
                $("#uchatFrm").trigger("reset");
                location.reload();
              //  LoadData(chat_rec_id,chat_sen_id);
            }
        });
          return false;

       });
       


</script>
 
