<div id="sidebar"><a href="#" class="visible-phone"><i class="fa fa-tachometer-alt"
            aria-hidden="true"></i>Dashboard</a>
    <ul>
        <li class="@yield('DA')">
            <a href="{{ route('crreAdmin.dashboard') }}"><i class="fa fa-tachometer-alt"
                    aria-hidden="true"></i><span>Dashboard</span></a>
        </li>
        @php
            $author = Auth::guard('crreAdmin')->user()->author;
            $user = Auth::guard('crreAdmin')->user();
        @endphp
        @if (in_array($user->admin_role, ['admin', 'manager']) && $user->can_create_author == 1)
            <li class="submenu @yield('DAU')"> <a href="#"><i class="fa fa-users"
                        aria-hidden="true"></i><span>Manage Authors</span></a>
                <ul>
                    <li class="@yield('LA')"><a href="{{ route('crreAdmin.list.author') }}"><i
                                class="far fa-circle nav-icon"></i>&nbsp; Author List</a></li>
                </ul>
            </li>
        @endif

        <li class="submenu @yield('TAG')"> <a href="#"><i class="fa fa-tags" aria-hidden="true"></i>

                <span>Manage Tags</span></a>
            <ul>
                <li class="@yield('ATL')"><a href="{{ route('crreAdmin.tag.list', ['lang' => 'en']) }}"><i
                            class="far fa-circle nav-icon"></i>&nbsp; Associated Tags
                        List</a></li>
            </ul>
        </li>

        @if (in_array($user->admin_role, ['admin', 'manager']))
            <li class="submenu @yield('CAT')"> <a href="#"><i class="fa fa-cube" aria-hidden="true"></i>
                    <span>Manage Categories</span></a>
                <ul>
                    <li class="@yield('CATL')"><a href="{{ route('crreAdmin.cat.list', ['lang' => 'en']) }}"><i
                                class="far fa-circle nav-icon"></i>&nbsp; Main/Sub Category
                            List</a></li>
                </ul>
            </li>
        @endif
        <li class="submenu @yield('IN')"> <a href="#"><i class="fa fa-newspaper" aria-hidden="true"></i>
                <span>Manage Content</span></a>
            <ul>
                <li class="@yield('INL')"><a href="{{ route('crreAdmin.content.list', ['lang' => 'en']) }}"><i
                            class="far fa-circle nav-icon"></i>&nbsp; Content List</a>
                </li>
                @if (in_array($user->admin_role, ['admin']))
                    <li class="@yield('QEI')"><a href="{{ route('crreAdmin.content.quick', ['lang' => 'en']) }}"><i
                                class="far fa-circle nav-icon"></i>&nbsp; Quick-Edit</a>
                    </li>
                    <li class="@yield('SM')"><a href="{{ route('crreAdmin.content.stats') }}"><i
                                class="far fa-circle nav-icon" aria-hidden="true"></i>
                            <span>Content Statistics</span></a></li>
                @endif
            </ul>
        </li>

        {{-- <li class="submenu @yield('M-POD')"><a href="#"><i class="fa fa-podcast" aria-hidden="true"></i>
                <span>Manage Podcasts</span></a>
            <ul>
                <li class="@yield('POD-L')"><a href="{{ route('podcast.list', ['lang' => 'en']) }}"><i
                            class="far fa-circle nav-icon"></i>&nbsp;
                        Podcast List</a></li>
            </ul>
        </li>
        <li class="submenu @yield('VID')"><a href="#"><i class="fas fa-video"></i>
                <span>Manage Videos</span></a>
            <ul>
                <li class="@yield('VL')"><a href="{{ route('video.list', ['lang' => 'en']) }}"><i
                            class="far fa-circle nav-icon"></i>&nbsp; Video List</a></li>
            </ul>
        </li> --}}

        {{-- old articles and interviews and blow --}}
        {{-- @if ($user->admin_role === 'admin')
            <li class="submenu @yield('AA')"> <a href="#"><i class="icon icon-th-list"></i>
                    <span>Article/Interview</span></a>
                <ul>
                    <li><a href="/admin/create-article-interview">Create Article/Interview</a></li>
                    <li><a href="/admin/list-article-interview">List & Edit Article/Interview</a></li>
                </ul>
            </li>
            <li class="submenu @yield('NA')"> <a href="#"><i class="icon icon-th-list"></i>
                    <span>News</span></a>
                <ul>
                    <li><a href="/admin/create-news">Create News</a></li>
                    <li><a href="/admin/list-news">List & Edit News</a></li>
                </ul>
            </li>

            <li class="submenu @yield('MAG')"> <a href="#"><i class="icon icon-th-list"></i>
                    <span>Magazines</span></a>
                <ul>
                    <li><a href="/admin/create-magazine">Create Magazine</a></li>
                    <li><a href="/admin/list-magazine">List Magazines</a></li>
                </ul>
            </li>
            <li class="submenu @yield('COM')"> <a href="#"><i class="icon icon-th-list"></i>
                    <span>Comments</span></a>
                <ul @yield('displayComment')>
                    <li><a href="/admin/list-article-interview-comments">Article/interview comments</a></li>
                    @if (session()->get('role') != 'ga')
                        <li><a href="/admin/magazine-comment-list">Magazine Comments</a></li>
                        <li><a href="/admin/list-news-comments">News Comments</a></li>
                    @endif
                </ul>
            </li>
        @endif --}}

    </ul>
</div>
