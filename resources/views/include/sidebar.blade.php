<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{route('dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>
                @can('announcement-list')
                <li class="submenu">
                    @php
                    $categories= App\Models\Announcement_Category::get();
                    @endphp
                    <a href="#"><i class="fe fe-layout"></i> <span> البلاغات</span> <span class="menu-arrow"></span></a>
                    <ul  style="display: none;">
                        @foreach( $categories as $key => $category)
                        <li class="{{ Request::is('announcements/category/') ? 'active' : '' }}">
                            <a href="{{route('annoucements.get',$category->id)}}"><i class="fe fe-document"></i> <span>{{$category->name}}</span></a>
                        </li>
                        @endforeach
                    </ul>

                </li>
                @endcan
                @can('announcement-list')
                <li class="submenu">
                    @php
                    $categories= App\Models\Announcement_Category::get();
                    @endphp
                    <a href="#"><i class="fe fe-layout"></i> <span>   بلاغات تعدت فترة زمنية</span> <span class="menu-arrow"></span></a>
                    <ul  style="display: none;">
                        @foreach( $categories as $key => $category)
                        <li class="{{ Request::is('announcements/expired/') ? 'active' : '' }}">
                            <a href="{{route('annoucements.expired.get',$category->id)}}"><i class="fe fe-document"></i> <span>{{$category->name}}</span></a>
                        </li>
                        @endforeach
                    </ul>

                </li>
                @endcan
                @can('user-list')
                <li class="submenu ">

                    <a href="#"><i class="fe fe-users"></i> <span>المستخدمين</span> <span class="menu-arrow"></span></a>
                    <ul >
                        <li class="{{ Request::is('users') ? 'active' : '' }}">
                            <a href="{{route('users.index')}}"><i class="fe fe-users"></i> <span>All</span></a>
                        </li>
                        <li class="{{ Request::is('admins') ? 'active' : '' }}">
                            <a href="{{route('admins')}}"><i class="fe fe-user-plus"></i> <span>Admins</span></a>
                        </li>
                    </ul>

                </li>
                @endcan
                @can('role-list')
                <li class="{{ Request::is('roles') ? 'active' : '' }}">
                    <a href="{{ route('roles.index') }}"><i class="fa fa-tag"></i><span>الصلاحيات</span> </a>
                </li>
                @endcan
                @can('compliant-list')
                <li class="{{ Request::is('compliants') ? 'active' : '' }}">
                    <a href="{{route('compliants.index')}}"><i class="fe fe-document"></i> <span>الشكاوي</span></a>
                </li>
                @endcan

                <li class="{{ Request::is('settings') ? 'active' : '' }}">
                    <a href="{{route('settings')}}"><i class="fe fe-vector"></i> <span>Settings</span></a>
                </li>

                <li class="menu-title">
                    <span>Pages</span>
                </li>
                <li>
                    <a href="{{route('user.profile',Auth::user()->id)}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
                </li>


            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
