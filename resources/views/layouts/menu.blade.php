<li class="{{ActiveLink::checkDashboard() ? 'active' : ''}}">
    <a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>

<li class="{{ActiveLink::checkContent() ? 'active' : ''}}">
    <a href="{{route('content.index')}}"><i class="mdi mdi-book-open-page-variant"></i> <span>Terms & Conditions</span></a>
</li>
