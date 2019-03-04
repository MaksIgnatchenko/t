<li class="{{ActiveLink::checkDashboard() ? 'active' : ''}}">
    <a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
</li>

<li class="{{ActiveLink::checkUser() ? 'active' : ''}}">
    <a href="{{route('users.index')}}"><i class="fa fa-user"></i> <span>Users</span></a>
</li>

<li class="{{ActiveLink::checkChallenge() ? 'active' : ''}}">
    <a href="{{route('challenge.index')}}"><i class="fa fa-globe"></i> <span>Challenges</span></a>
</li>

<li class="{{ActiveLink::checkCompany() ? 'active' : ''}}">
    <a href="{{route('company.index')}}"><i class="fa fa-building"></i> <span>Companies</span></a></li>


<li class="{{ActiveLink::checkContent() ? 'active' : ''}}">
    <a href="{{route('content.index')}}"><i class="mdi mdi-book-open-page-variant"></i> <span>Terms & Conditions</span></a>
</li>

