<style>

    .profile-image {
        height: 60px;
        width: 60px;
        border-radius: 50%;
        border: 4px solid #d6d8db;
    }
    .profile-icon {
        border: 3px #d6d8db solid;
        border-radius: 50%;
        padding: 2px;
    }
    .dashboard {
        border-left: 5px solid transparent;
    }
    .dashboard:hover {
        border-left: 5px solid #d6d8db;
    }
    .dropdown {
        position: relative;
        display: inline-block;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        z-index: 1;
        margin-left: 100%;
        top: 0;
        box-shadow: #6e707e 3px 4px 5px;
    }
    .dropdown:hover .dropdown-content {display: block;}

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;

    }
    .dropdown-button {
        border-left: 5px solid transparent;
        color: #ffffff;
        /*font-size: 14px;*/
        font-weight: bold;
    }
    .dropdown-button:hover {
        border-left: 5px solid #d6d8db;
    }
    .main-active {
        color: #ffffff !important;
        border-left: 5px solid #d6d8db;
    }
    .main-active i {
        color: #ffffff !important;
    }
    .sub-menu-item {
        border-left: 5px solid transparent;
        font-size: 14px;
        font-weight: bold;
        margin: 0;
    }
    .sub-menu-item:hover {
        border-left: 5px solid #d6d8db;
    }

    .sub-active {
        color: #ffffff !important;
        border-left: 5px solid #d6d8db;
    }
    .sub-active i {
        color: #ffffff !important;
    }

    .sidebar #sidebarToggle::after {
        content: '\f359';
        font-size: xx-large;
    }

    .sidebar.toggled #sidebarToggle::after {
        content: '\f35a';
        font-size: xx-large;
    }
    .more-item-icon {
        transform: rotate(90deg);
        padding-left: 5px;
    }
    /*.active {*/
        /*color: white;*/
        /*border-left: 5px solid #d6d8db;*/
    /*}*/
    /*.dropdown.active .dropdown-button {*/
        /*background: #DA55AA;*/
    /*}*/

    /*.dropdown.active:nth-child(1) a.active {*/
        /*color: #DAD555;*/
    /*}*/


    /*!* job info*!*/

    /*.dropdown.active:nth-child(2) {*/
        /*background: #bada55;*/
    /*}*/

    /*.dropdown.active:nth-child(2) a.active {*/
        /*color: #000000;*/
    /*}*/


</style>



<ul class=" navbar-nav bg-gradient-info sidebar sidebar-dark accordion mb-0" id="accordionSidebar" style="box-shadow: 8px 0 8px -5px #333; z-index: 10;">

    <!-- Sidebar - Brand -->
    {{--<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">--}}
        {{--<div class="sidebar-brand-icon rotate-n-15">--}}
            {{--<i class="fas fa-laugh-wink"></i>--}}
        {{--</div>--}}
        {{--<div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>--}}
    {{--</a>--}}

    <div class="card bg-gradient-info border-top-0 border-left-0 border-right-0 mb-0" style="border-bottom: #d6d8db 8px solid;">
        <div class="sidebar-brand d-flex align-items-center justify-content-center mt-3">
            <div class="sidebar-brand-icon">
                @if(Auth::user()->image == null)
                    <img src="{{ asset('/') }}user-images/bg_user.jpg" alt="Profile Picture" class="profile-image"/>
                @else
                    <img src="{{ asset('/') }}{{ Auth::user()->image }}" alt="Profile Picture" class="profile-image"/>
                @endif
            </div>
        </div>
        <div class="text-center">
            <h5 class="text-white"><i>{{ Auth::user()->name }}</i></h5>
            <p class="text-white mt-0"><i>{{ Auth::user()->designation }}</i></p>
        </div>
        <div class="row mx-auto mb-3">
            <a href="{{ route('profile') }}" title="Profile"><i class="fas fa-user-circle mr-1 profile-icon text-white"></i></a>
            <a href="{{ route('setting') }}" title="Setting"><i class="fas fa-cog mx-1 profile-icon text-white"></i></a>
            <a title="Logout" style="cursor: pointer;" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"><i class="fas fa-power-off ml-1 profile-icon text-white"></i></a>
            {{ Form::open(['route'=>'logout', 'method'=>'post', 'id'=>'logoutForm']) }}
            {{ Form::close() }}
        </div>
    </div>

    <!-- Divider -->
    {{--<hr class="sidebar-divider my-0">--}}

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link dropdown-button {{ request()->is('home') ? 'main-active' : '' }}" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-button py-3 {{ request()->is('add-category') || request()->is('manage-category') || request()->is('edit-category/*') ? 'main-active' : '' }}" href="#">
            <i class="fas fa-sitemap"></i>
            <span>Category</span>
            <span style="padding-right: 82px;"></span>
            <i class="fas fa-level-up-alt more-item-icon"></i>
        </a>
        <div class="navbar-nav dropdown-content bg-gradient-info">
            <a class="nav-link sub-menu-item pl-3 {{ request()->is('add-category') ? 'sub-active' : '' }}" href="{{ route('add-category') }}">Add Category</a>
            <hr class="sidebar-divider my-0">
            <a class="nav-link sub-menu-item pl-3 {{ request()->is('manage-category') || request()->is('edit-category/*') ? 'sub-active' : '' }}" href="{{ route('manage-category') }}">Manage Category</a>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-button py-3 {{ request()->is('add-brand') || request()->is('manage-brand') || request()->is('edit-brand/*') ? 'main-active' : '' }}" href="#">
            <i class="fas fa-award" style="font-size: 17px;"></i>
            <span style="padding-right: 5px;"></span>
            <span>Brand</span>
            <span style="padding-left: 101px;"></span>
            <i class="fas fa-level-up-alt more-item-icon"></i>
        </a>
        <div class="dropdown-content bg-gradient-info">
            <a class="nav-link sub-menu-item pl-3 {{ request()->is('add-brand') ? 'sub-active' : '' }}" href="{{ route('add-brand') }}">Add Brand</a>
            <hr class="sidebar-divider my-0">
            <a class="nav-link sub-menu-item pl-3 {{ request()->is('manage-brand') || request()->is('edit-brand/*') ? 'sub-active' : '' }}" href="{{ route('manage-brand') }}">Manage Brand</a>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-button py-3 {{ request()->is('add-product') || request()->is('manage-product') || request()->is('edit-product/*')|| request()->is('product-details/*') ? 'main-active' : '' }}" href="#">
            <i class="fas fa-tshirt"></i>
            <span style=""></span>
            <span>Product</span>
            <span style="padding-left: 90px;"></span>
            <i class="fas fa-level-up-alt more-item-icon"></i>
        </a>
        <div class="dropdown-content bg-gradient-info">
            <a class="nav-link sub-menu-item pl-3 {{ request()->is('add-product') ? 'sub-active' : '' }}" href="{{ route('add-product') }}">Add Product</a>
            <hr class="sidebar-divider my-0">
            <a class="nav-link sub-menu-item pl-3 {{ request()->is('manage-product') || request()->is('edit-product/*') || request()->is('product-details/*') ? 'sub-active' : '' }}" href="{{ route('manage-product') }}">Manage Product</a>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link dropdown-button {{ request()->is('manage-order') || request()->is('order-detail/*') || request()->is('order-invoice/*') || request()->is('edit-order/*') ? 'main-active' : '' }}" href="{{ route('manage-orders') }}">
            <i class="far fa-calendar-check"></i>
            <span>Manage Order</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link dropdown-button {{ request()->is('manage-customer') || request()->is('edit-customer/*') ? 'main-active' : '' }}" href="{{ route('manage-customers') }}">
            <i class="fas fa-users"></i>
            <span>Manage Customer</span></a>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link dropdown-button {{ request()->is('manage-customer-review') ? 'main-active' : '' }}" href="{{ route('manage-review') }}">
            <i class="far fa-comment-dots"></i>
            <span>Manage Customer Review</span></a>
    </li>


    <hr class="sidebar-divider my-0">

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-button py-3 {{ request()->is('add-slider') || request()->is('manage-slider') ? 'main-active' : '' }}" href="#">
            <i class="fab fa-slideshare"></i>
            <span style="padding-right: 5px;"></span>
            <span>Slider</span>
            <span style="padding-left: 102px;"></span>
            <i class="fas fa-level-up-alt more-item-icon"></i>
        </a>
        <div class="dropdown-content bg-gradient-info">
            <a class="nav-link sub-menu-item pl-3 {{ request()->is('add-slider') ? 'sub-active' : '' }}" href="{{ route('add-slider') }}">Add Slider</a>
            <hr class="sidebar-divider my-0">
            <a class="nav-link sub-menu-item pl-3 {{ request()->is('manage-slider') ? 'sub-active' : '' }}" href="{{ route('manage-slider') }}">Manage Slider</a>
        </div>
    </li>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link dropdown-button {{ request()->is('manage-user') || request()->is('view-profile/*') ? 'main-active' : '' }}" href="{{ route('manage-user') }}">
            <i class="fas fa-user-shield"></i>
            <span>User List</span></a>
    </li>






    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Utilities Collapse Menu -->
    {{--<li class="nav-item">--}}
        {{--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">--}}
            {{--<i class="fas fa-fw fa-wrench"></i>--}}
            {{--<span>Utilities</span>--}}
        {{--</a>--}}
        {{--<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">--}}
            {{--<div class="bg-white py-2 collapse-inner rounded">--}}
                {{--<a class="collapse-item" href="utilities-color.html">Colors</a>--}}
                {{--<a class="collapse-item" href="utilities-border.html">Borders</a>--}}
                {{--<a class="collapse-item" href="utilities-animation.html">Animations</a>--}}
                {{--<a class="collapse-item" href="utilities-other.html">Other</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</li>--}}

    {{--<!-- Divider -->--}}
    {{--<hr class="sidebar-divider my-0">--}}

    {{--<!-- Nav Item - Pages Collapse Menu -->--}}
    {{--<li class="nav-item">--}}
        {{--<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">--}}
            {{--<i class="fas fa-fw fa-folder"></i>--}}
            {{--<span>Pages</span>--}}
        {{--</a>--}}
        {{--<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">--}}
            {{--<div class="bg-white py-2 collapse-inner rounded">--}}
                {{--<h6 class="collapse-header">Login Screens:</h6>--}}
                {{--<a class="collapse-item" href="login.html">Login</a>--}}
                {{--<a class="collapse-item" href="register.html">Register</a>--}}
                {{--<a class="collapse-item" href="forgot-password.html">Forgot Password</a>--}}
                {{--<div class="collapse-divider"></div>--}}
                {{--<h6 class="collapse-header">Other Pages:</h6>--}}
                {{--<a class="collapse-item" href="404.html">404 Page</a>--}}
                {{--<a class="collapse-item" href="blank.html">Blank Page</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</li>--}}
    {{--<hr class="sidebar-divider my-0">--}}
    {{--<!-- Nav Item - Charts -->--}}
    {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="charts.html">--}}
            {{--<i class="fas fa-fw fa-chart-area"></i>--}}
            {{--<span>Charts</span></a>--}}
    {{--</li>--}}
    {{--<hr class="sidebar-divider my-0">--}}
    {{--<!-- Nav Item - Tables -->--}}
    {{--<li class="nav-item">--}}
        {{--<a class="nav-link" href="tables.html">--}}
            {{--<i class="fas fa-fw fa-table"></i>--}}
            {{--<span>Tables</span></a>--}}
    {{--</li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="border-0 bg-transparent" id="sidebarToggle"></button>
    </div>

</ul>

{{--<script type="text/javascript">--}}
    {{--$(document).ready(function () {--}}
        {{--var homeUrl = '{{ route('home') }}';--}}
        {{--$('.dropdown a').filter(function(){--}}

            {{--return $(this).attr('href') == homeUrl--}}
            {{--// this.href == homeUrl;--}}

        {{--}).addClass('active').closest('ul').parent().addClass('active');--}}

    {{--});--}}
{{--</script>--}}

{{--<script type="text/javascript">--}}
    {{--$(".dropdown a").each(function() {--}}
        {{--if (this.href == window.location.href) {--}}
            {{--$(this).addClass('active');--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}
{{--<script type="text/javascript">--}}
    {{--$(document).ready(function () {--}}
        {{--var url = window.location;--}}
        {{--$('ul.nav li a[href="'+ url +'"]').parent().addClass('active');--}}
        {{--$('ul.nav li a').filter(function() {--}}
            {{--return this.href == url;--}}
        {{--}).parent().addClass('active');--}}
    {{--});--}}
{{--</script>--}}

{{--<script>--}}
    {{--$(document).ready(function(){--}}
        {{--$('.sidebar').on("click", ".nav-item", function(){--}}
            {{--$('.sidebar .nav-item .active').removeClass('active');--}}
            {{--// $('.subMenuList').removeClass('active');--}}
            {{--// $(this).closest('.nav-item').find('.nav-item').addClass('.dropdown-button');--}}
            {{--// $(this).closest('.nav-item').find('.nav-link').removeClass('active');--}}
            {{--$(this).addClass('active');--}}
        {{--})--}}
    {{--})--}}
{{--</script>--}}