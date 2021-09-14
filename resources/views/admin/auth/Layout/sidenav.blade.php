<!-- ! Sidebar -->
<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="{{url('/admin')}}" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Library</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="{{url('/admin')}}"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>Faculty
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{url('/admin/add-faculty')}}">ADD Faculty</a>
                            <a href="{{url('/admin/view-faculty')}}">View Faculty</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>Department
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{url('/admin/add-department')}}">ADD Department</a>
                            <a href="{{url('/admin/view-department')}}">View Department</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon folder" aria-hidden="true"></span>Books
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{url('/admin/add-books')}}">ADD Book</a>
                            <a href="{{url('/admin/view-books')}}">View Books</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon document" aria-hidden="true"></span>Publication
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{url('/admin/view-articles')}}">Add Publication</a>
                        </li>
                        <li>
                            <a href="{{url('/admin/create-article')}}">View Publication</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon image" aria-hidden="true"></span>Students
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="{{url('/admin/add-students')}}">Add</a>
                            <a href="{{url('/admin/view-students')}}">View</a>
                            <a href="{{url('/admin/view-pending-students')}}">Pendings</a>
                        </li>
                    </ul>
                </li>
                {{--
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon paper" aria-hidden="true"></span>Pages
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="pages.html">All pages</a>
                        </li>
                        <li>
                            <a href="new-page.html">Add new page</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="comments.html">
                        <span class="icon message" aria-hidden="true"></span>
                        Comments
                    </a>
                    <span class="msg-counter">7</span>
                </li>
            </ul>
            <span class="system-menu__title">system</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="appearance.html"><span class="icon edit" aria-hidden="true"></span>Appearance</a>
                </li>
                <li>
                    <a class="show-cat-btn" href="##">
                        <span class="icon category" aria-hidden="true"></span>Extentions
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="extention-01.html">Extentions-01</a>
                        </li>
                        <li>
                            <a href="extention-02.html">Extentions-02</a>
                        </li>
                    </ul>
                </li> --}}

                <li>
                    <a href="##"><span class="icon setting" aria-hidden="true"></span>Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture><source srcset="{{url('template/img/avatar/avatar-illustrated-01.webp')}}" type="image/webp"><img src="{{url('template/img/avatar/avatar-illustrated-01.png')}}" alt="User name"></picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Library</span>
                <span class="sidebar-user__subtitle">ADMIN</span>
            </div>
        </a>
    </div>
</aside>
