<a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
    <div class="notify"> <span class="heartbit"></span> <span class="point">{{ count(auth()->user()->unreadNotifications) }}</span> </div>
</a>
<div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
    <ul>
        <li>
            <div class="drop-title">{{ count(auth()->user()->unreadNotifications)}} New Notifications</div>
        </li>
        <a>            
            <div class="message-center">
                @forelse(auth()->user()->unreadNotifications as $notification)
                    <a href="{{ URL::route('read',$notification->id) }}">
                        @include('admin.partials.notifications.'. snake_case(class_basename($notification->type)))
                    </a>
                @empty
                    <a></a>
                @endforelse
                <!-- Message -->
                
            </div>
        </li>
        <li>
            <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
        </li>
    </ul>
</div>