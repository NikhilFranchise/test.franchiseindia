@php
    $user = Auth::guard('crreAdmin')->user();
    $author = $user->author;

    // Role helpers
    $isSuperAdmin = $user->admin_role === 'superadmin';
    $isAdmin = $user->admin_role === 'admin';
    $isManager = $user->admin_role === 'manager';

    // Combined permissions
    $canManageAll = $isSuperAdmin || $isAdmin;
    $canManageAuthors = $isSuperAdmin || $isAdmin || ($isManager && $user->can_create_author == 1);
    $canManageCategory = $isSuperAdmin || $isAdmin || $isManager;
@endphp

<div id="sidebar">
    <a href="#" class="visible-phone"><i class="fa fa-tachometer-alt"></i>Dashboard</a>

    <ul>
        {{-- Dashboard --}}
        <li class="@yield('DA')">
            <a href="{{ route('crreAdmin.dashboard') }}">
                <i class="fa fa-tachometer-alt"></i><span>Dashboard</span>
            </a>
        </li>

        {{-- Manage Authors --}}
        @if ($canManageAuthors)
            <li class="submenu @yield('DAU')">
                <a href="#"><i class="fa fa-users"></i><span>Manage Authors</span></a>
                <ul>
                    <li class="@yield('LA')">
                        <a href="{{ route('crreAdmin.list.author') }}">
                            <i class="far fa-circle nav-icon"></i> Author List
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        {{-- Manage Tags --}}
        <li class="submenu @yield('TAG')">
            <a href="#"><i class="fa fa-tags"></i><span>Manage Tags</span></a>
            <ul>
                <li class="@yield('ATL')">
                    <a href="{{ route('crreAdmin.tag.list', ['lang' => 'en']) }}">
                        <i class="far fa-circle nav-icon"></i> Associated Tags List
                    </a>
                </li>
            </ul>
        </li>

        {{-- Manage Categories --}}
        @if ($canManageCategory)
            <li class="submenu @yield('CAT')">
                <a href="#"><i class="fa fa-cube"></i><span>Manage Categories</span></a>
                <ul>
                    <li class="@yield('CATL')">
                        <a href="{{ route('crreAdmin.cat.list', ['lang' => 'en']) }}">
                            <i class="far fa-circle nav-icon"></i> Main/Sub Category List
                        </a>
                    </li>
                </ul>
            </li>
        @endif

        {{-- Manage Content --}}
        <li class="submenu @yield('IN')">
            <a href="#"><i class="fa fa-newspaper"></i><span>Manage Content</span></a>
            <ul>
                <li class="@yield('INL')">
                    <a href="{{ route('crreAdmin.content.list', ['lang' => 'en']) }}">
                        <i class="far fa-circle nav-icon"></i> Content List
                    </a>
                </li>

                {{-- Quick Edit & Stats available only for admin + superadmin --}}
                @if ($canManageAll)
                    <li class="@yield('QEI')">
                        <a href="{{ route('crreAdmin.content.quick', ['lang' => 'en']) }}">
                            <i class="far fa-circle nav-icon"></i> Quick-Edit
                        </a>
                    </li>
                    <li class="@yield('SM')">
                        <a href="{{ route('crreAdmin.content.stats') }}">
                            <i class="far fa-circle nav-icon"></i> Content Statistics
                        </a>
                    </li>
                @endif
            </ul>
        </li>
    </ul>
</div>
