<div id="header">
    <h1><a href="#">Matrix Admin</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    @php
        $user = Auth::guard('crreAdmin')->user();
        $author = $user->author;
    @endphp
    <ul class="nav">
        <li class="dropdown" id="profile-messages"><a title="" href="#" data-toggle="dropdown"
                data-target="#profile-messages" class="dropdown-toggle"><i class="fa fa-user" aria-hidden="true"></i>
                <span class="text"><strong>Welcome
                        {{ $author->title ?? $user->admin_name }}</strong>
                    {{ ' (' . ucwords($user->admin_role) . ') ' }}</span></a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('crreAdmin.author.profile', ['id' => $author->author_id]) }}"><i
                            class="fa fa-user" aria-hidden="true"></i>
                        My Profile</a></li>
                {{-- <li class="divider"></li> --}}
                <li><a href="{{ route('crreAdmin.logout') }}"><i class="fas fa-sign-out-alt"></i>
                        Log Out</a>
                </li>
            </ul>
        </li>
        <li class=""><a title="" href="{{ route('crreAdmin.logout') }}"><i class="fas fa-sign-out-alt"></i>
                <span class="text">Logout</span></a></li>
    </ul>
</div>
