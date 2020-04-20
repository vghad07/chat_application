 @extends('layouts.admin')

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
                     <a href="{{url('/chat/index/uid')}}/{{$user->id}}" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-3.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">{{$user->name}} <span class="font-small-3 float-right info">4:14 AM</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Okay <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span></p>
                         </div>
                     </a>
                     @endforeach
                     @endif

                 </div>
             </div>
         </div>

     </div>
 </div>
 <div class="content-right">
     <div class="content-wrapper">
         <div class="content-header row">
         </div>
         <div class="content-body">
             <section class="chat-app-window">
                 <div class="badge badge-default mb-1">Chat History</div>
                 <div class="chats">
                     <div class="chats">
                         <div class="chat">
                             <div class="chat-avatar">
                                 <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                     <img src="{{asset('app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar" />
                                 </a>
                             </div>
                             <div class="chat-body">
                                 <div class="chat-content">
                                     <p>How can we help? We're here for you!</p>
                                 </div>
                             </div>
                         </div>
                         <div class="chat chat-left">
                             <div class="chat-avatar">
                                 <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                     <img src="{{asset('app-assets/images/portrait/small/avatar-s-7.png')}}" alt="avatar" />
                                 </a>
                             </div>
                             <div class="chat-body">
                                 <div class="chat-content">
                                     <p>Hey John, I am looking for the best admin template.</p>
                                     <p>Could you please help me to find it out?</p>
                                 </div>
                                 <div class="chat-content">
                                     <p>It should be Bootstrap 4 compatible.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="chat">
                             <div class="chat-avatar">
                                 <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                     <img src="{{asset('app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar" />
                                 </a>
                             </div>
                             <div class="chat-body">
                                 <div class="chat-content">
                                     <p>Absolutely!</p>
                                 </div>
                                 <div class="chat-content">
                                     <p>Robust admin is the responsive bootstrap 4 admin template.</p>
                                 </div>
                             </div>
                         </div>
                         <p class="time">1 hours ago</p>
                         <div class="chat chat-left">
                             <div class="chat-avatar">
                                 <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                     <img src="{{asset('app-assets/images/portrait/small/avatar-s-7.png')}}" alt="avatar" />
                                 </a>
                             </div>
                             <div class="chat-body">
                                 <div class="chat-content">
                                     <p>Looks clean and fresh UI.</p>
                                 </div>
                                 <div class="chat-content">
                                     <p>It's perfect for my next project.</p>
                                 </div>
                                 <div class="chat-content">
                                     <p>How can I purchase it?</p>
                                 </div>
                             </div>
                         </div>
                         <div class="chat">
                             <div class="chat-avatar">
                                 <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                     <img src="{{asset('app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar" />
                                 </a>
                             </div>
                             <div class="chat-body">
                                 <div class="chat-content">
                                     <p>Thanks, from ThemeForest.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="chat chat-left">
                             <div class="chat-avatar">
                                 <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="" data-original-title="">
                                     <img src="{{asset('app-assets/images/portrait/small/avatar-s-7.png')}}" alt="avatar" />
                                 </a>
                             </div>
                             <div class="chat-body">
                                 <div class="chat-content">
                                     <p>I will purchase it for sure.</p>
                                 </div>
                                 <div class="chat-content">
                                     <p>Thanks.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="chat">
                             <div class="chat-avatar">
                                 <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                                     <img src="{{asset('app-assets/images/portrait/small/avatar-s-1.png')}}" alt="avatar" />
                                 </a>
                             </div>
                             <div class="chat-body">
                                 <div class="chat-content">
                                     <p>Great, Feel free to get in touch on</p>
                                 </div>

                             </div>
                         </div>
                     </div>
                 </div>
             </section>
             <section class="chat-app-form">
                 {{ Form::open(['action' => ['ChatController@insert'],'class'=>'chat-app-input d-flex','method'=>'POST','enctype'=>'multipart/form-data']) }}

                 <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                     <div class="form-control-position">
                         <i class="icon-emoticon-smile"></i>
                     </div>
                     <input type="text" class="form-control" id="iconLeft4-message" name="message" placeholder="Type your message">
                     <div class="form-control-position control-position-right">
                         <i class="ft-image"></i>
                     </div>
                 </fieldset>
                 <fieldset class="form-group position-relative has-icon-left col-2 m-0">
                     <button type="submit" class="btn btn-info"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
                 </fieldset>
                 </form>
             </section>
         </div>
     </div>
 </div>

 @endsection
