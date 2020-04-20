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
                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-3.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Elizabeth Elliott <span class="font-small-3 float-right info">4:14 AM</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Okay <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span></p>
                         </div>
                     </a>
                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-busy"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-7.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Kristopher Candy <span class="font-small-3 float-right info">9:04 PM</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Thank you <span class="float-right primary"><span class="badge badge-pill badge-danger">12</span></span></p>
                         </div>
                     </a>
                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-away"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-8.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Sarah Woods <span class="font-small-3 float-right info">2:14 AM</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Hello krish! <span class="float-right primary"><i class="font-medium-1 icon-volume-off blue-grey lighten-3 mr-1"></i> <span class="badge badge-pill badge-danger">3</span></span></p>
                         </div>
                     </a>
                     <a href="#" class="media bg-blue-grey bg-lighten-5 border-right-info border-right-2">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('')}}app-assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Wayne Burton <span class="font-small-3 float-right info">Today</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Can we connect?</p>
                         </div>
                     </a>

                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-away"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-5.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Sarah Montgomery <span class="font-small-3 float-right info">Yesterday</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Will connect you</p>
                         </div>
                     </a>
                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-9.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Heather Howell <span class="font-small-3 float-right info">Friday</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Thank you <span class="float-right primary"><span class="badge badge-pill badge-danger">4</span></span></p>
                         </div>
                     </a>
                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-busy"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-7.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Kelly Reyes <span class="font-small-3 float-right info">Thrusday</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> I love you </p>
                         </div>
                     </a>
                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-14.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Vincent Nelson</h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Who you are?</p>
                         </div>
                     </a>
                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-3.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Elizabeth Elliott <span class="font-small-3 float-right info">4:14 AM</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check font-small-2"></i> Okay <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span></p>
                         </div>
                     </a>
                     <a href="#" class="media border-0">
                         <div class="media-left pr-1">
                             <span class="avatar avatar-md avatar-busy"><img class="media-object rounded-circle" src="{{asset('app-assets/images/portrait/small/avatar-s-7.png')}}" alt="Generic placeholder image">
                                 <i></i>
                             </span>
                         </div>
                         <div class="media-body w-100">
                             <h6 class="list-group-item-heading">Kristopher Candy <span class="font-small-3 float-right info">9:04 PM</span></h6>
                             <p class="list-group-item-text text-muted mb-0"><i class="ft-check primary font-small-2"></i> Thank you <span class="float-right primary"><span class="badge badge-pill badge-danger">12</span></span></p>
                         </div>
                     </a>
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
                 <form class="chat-app-input d-flex">
                     <fieldset class="form-group position-relative has-icon-left col-10 m-0">
                         <div class="form-control-position">
                             <i class="icon-emoticon-smile"></i>
                         </div>
                         <input type="text" class="form-control" id="iconLeft4-message" placeholder="Type your message">
                         <div class="form-control-position control-position-right">
                             <i class="ft-image"></i>
                         </div>
                     </fieldset>
                     <fieldset class="form-group position-relative has-icon-left col-2 m-0">
                         <button type="button" class="btn btn-info"><i class="fa fa-paper-plane-o d-lg-none"></i> <span class="d-none d-lg-block">Send</span></button>
                     </fieldset>
                 </form>
             </section>
         </div>
     </div>
 </div>

 @endsection
