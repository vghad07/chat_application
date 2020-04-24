@extends('layouts.admin_chatlayout')
@section('content')

      <div class="sidebar-left sidebar-fixed">
        <div class="sidebar"><div class="sidebar-content card d-none d-lg-block">
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
                    <input type="hidden" name="sen_id" value="{{session('user_id')}}">
                        <input type="hidden" name="rec_id" class="rec"  value="{{$user->id}}">
                        
                        <a href="#" class=" media border-0 btn-submit" data-id="{{$user->id}}">

                            <div class="media-left pr-1">
                                <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{asset('app-assets/images/logo/user.png')}}" alt="Generic placeholder image">
                                    <i></i>
                                </span>
                            </div>
                            <div class="media-body w-100">
                                <h6 class="list-group-item-heading">{{$user->name}}
                                     <span class="font-small-3 float-right info">
                                         {{$last_msg ?? ''}}</span>
                                </h6>
                                <p class="list-group-item-text text-muted mb-0">
                                    <i class="ft-check primary font-small-2"></i> {{$last_msg ?? ''}} <span class="float-right primary"><i class="font-medium-1 icon-pin blue-grey lighten-3"></i></span></p>
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
          <div class="content-header row">
          </div>
          <div class="content-body"><section class="chat-app-window">
    <div class="badge badge-default mb-1">Chat History</div>
    <div class="chats">
        <div class="chats">
          <div class="chat">
            <div class="chat-avatar">
              <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="" data-original-title="">
                  <img src="{{asset('app-assets/images/logo/user.png')}}" alt="avatar" />
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
                <img src="{{asset('app-assets/images/logo/user2.png')}}" alt="avatar" />
              </a>
            </div>
            <div class="chat-body">
              <div class="chat-content">
                <p>Hey ,  I am looking for the best website.</p>
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
                <img src="{{asset('app-assets/images/logo/user.png')}}" alt="avatar" />
              </a>
            </div>
            <div class="chat-body">
              <div class="chat-content">
                <p>Great, Feel free to get in touch on</p>
              </div>
              <div class="chat-content">
                
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


