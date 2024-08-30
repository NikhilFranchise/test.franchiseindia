<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
    <ul>
        <li class="@yield('DA')">
            <a href="/admin/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a>
        </li>

        @if (session()->get('role') != 'ga' && session()->get('author_creation_capability') == 1)
            <li class="submenu @yield('DAU')"> <a href="#"><i class="icon icon-th-list"></i>
                    <span>Author</span></a>
                <ul>
                    <li><a href="/admin/create-author">Create Author</a></li>
                    <li><a href="/admin/list-author">List & Edit Author</a></li>
                </ul>
            </li>
        @endif

        <li class="submenu @yield('KICK')"> <a href="#"><i class="icon icon-th-list"></i>
                <span>Kickers</span></a>
            <ul>
                <li><a href="/admin/kicker/create/english">Create English Kicker</a></li>
                <li><a href="/admin/kickers/list/english">List English Kicker</a></li>
                <li><a href="/admin/kicker/create/hindi">Create Hindi Kicker</a></li>
                <li><a href="/admin/kickers/list/hindi">List Hindi Kicker</a></li>
            </ul>
        </li>

        @if (session()->get('role') != 'ga' && session()->get('adminEmail') == 'techsupport@franchiseindia.net' || session()->get('role') != 'ga' && session()->get('adminEmail') == 'pganesh@franchiseindia.net')
            <li class="submenu @yield('CAT')"> <a href="#"><i class="icon icon-th-list"></i> <span>Main
                        Category/Sub Category</span></a>
                <ul>
                    <li><a href="/admin/cat/create">Create Main Category</a></li>
                    <li><a href="/admin/cat/list">List Main Category</a></li>
                    <li><a href="/admin/subcat/create">Create Sub Category</a></li>
                    <li><a href="/admin/subcat/list">List Sub Category</a></li>
                </ul>
            </li>
        @endif
        @if (session()->get('adminEmail') == 'techsupport@franchiseindia.net' || session()->get('adminEmail') == 'pganesh@franchiseindia.net')
            <li class="submenu @yield('AA')"> <a href="#"><i class="icon icon-th-list"></i>
                    <span>Article/Interview</span></a>
                <ul>
                    <li><a href="/admin/create-article-interview">Create Article/Interview</a></li>
                    <li><a href="/admin/list-article-interview">List & Edit Article/Interview</a></li>
                </ul>
            </li>

            @if (session()->get('role') != 'ga')
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
            @endif

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
        @endif
        @if (session()->get('role') != 'ga')
            <li class="submenu @yield('IN')"> <a href="#"><i class="icon icon-th-list"></i>
                    <span>Insights</span></a>
                <ul>
                    <li><a href="/admin/create-insights">Create Insights</a></li>
                    <li><a href="/admin/list-insights">List & Edit Insights</a></li>
                </ul>
            </li>
        @endif

    </ul>
</div>
