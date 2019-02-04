@if(Auth::user()->is_admin)
    <li>
        <a class="" href="{{route('users.index')}}">
            <i class="fa fa-users"></i>
            <span>Users</span>
        </a>
    </li>
@else
    <li>
        <a class="" href="{{route('events.index')}}">
            <i class="fa fa-calendar-o"></i>
            <span>Events</span>
        </a>
    </li>

    <li>
        <a class="" href="{{route('events.create')}}">
            <i class="fa fa-plus-square-o"></i>
            <span>Create Event</span>
        </a>
    </li>

    <li>
        <a class="" href="№">
            <i class="fa fa-tablet"></i>
            <span>Devices</span>
        </a>
    </li>
@endif
