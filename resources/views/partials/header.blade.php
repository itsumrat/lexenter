<!-- Start of Header Section -->
<div class="dashboard-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="header-left">
                    <span class="material-icons">search</span>
                    <input type="search" placeholder="Search anything">
                </div>
                <div class="header-right">
                    <div class="navbar-profile">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{\Auth::user()->name}}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{route('user.profile')}}">My Profile</a>
                                <a class="dropdown-item" href="{{route('password.index')}}">Change Password</a>
                                <a class="dropdown-item" href="{{route('bookmark.index')}}">Bookmarks</a>
                                <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </div>
                        </div>
                        <img class="profile-pic" src="{{asset(Storage::url('app/public/avatars/'.\Auth::user()->image))}}" alt="profile pic">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Header Section -->
