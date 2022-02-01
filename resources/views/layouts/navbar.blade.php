<header class="page-topbar" id="header">
        <div class="navbar navbar-fixed">
            <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-amber-amber no-shadow">
                <div class="nav-wrapper">
                    <ul class="left">
                        <li>
                            <h1 class="logo-wrapper" ><a class="brand-logo darken-1" href="/reports"><img style="width:120%; height:30px" src="{{ asset('images/dcl_logo3.png')}}" alt="materialize logo"></a></h1>
                        </li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                        <input class="header-search-input z-depth-2" type="text" name="Search" placeholder="Search for products" data-search="template-list">
                        <ul class="search-list collection display-none"></ul>
                    </div>
                    <ul class="navbar-list right">
                        <li>{{Auth::user()->name}}</li>
                        <li><a class="waves-effect waves-block waves-light sidenav-trigger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="material-icons">power_settings_new</i></a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        
                    </ul>
                    <!-- translation-button-->
                    <!-- notifications-dropdown-->
                    
                    <!-- profile-dropdown-->
                    <ul class="dropdown-content" id="profile-dropdown">
                        <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>
                        <li><a class="grey-text text-darken-1" href="app-chat.html"><i class="material-icons">chat_bubble_outline</i> Chat</a></li>
                        <li><a class="grey-text text-darken-1" href="page-faq.html"><i class="material-icons">help_outline</i> Help</a></li>
                        <li class="divider"></li>
                        <li><a class="grey-text text-darken-1" href="user-lock-screen.html"><i class="material-icons">lock_outline</i> Lock</a></li>
                        <li><a class="grey-text text-darken-1" href="user-login.html"><i class="material-icons">keyboard_tab</i> Logout</a></li>
                    </ul>
                </div>
                <nav class="display-none search-sm">
                    <div class="nav-wrapper">
                        <form id="navbarForm">
                            <div class="input-field search-input-sm">
                                <input class="search-box-sm" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                                <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                                <ul class="search-list collection search-list-sm display-none"></ul>
                            </div>
                        </form>
                    </div>
                </nav>
            </nav>
            <!-- BEGIN: Horizontal nav start-->
            <nav class="white hide-on-med-and-down" id="horizontal-nav">
                <div class="nav-wrapper">
                    <ul class="left hide-on-med-and-down" id="ul-horizontal-nav" data-menu="menu-navigation">
                        <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="DashboardDropdown"><i class="material-icons">dashboard</i><span><span class="dropdown-title" data-i18n="Dashboard">Dashboard</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                            <ul class="dropdown-content dropdown-horizontal-list" id="DashboardDropdown">
                                <li data-menu=""><a href="/reports"><span data-i18n="Modern">Reports</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="formsTables"><i class="material-icons">group</i><span><span class="dropdown-title" data-i18n="Templates">User Management</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                            <ul class="dropdown-content dropdown-horizontal-list" id="formsTables">
                                <li><a href="{{ route('staff.index') }}"><span data-i18n="Modern Menu">Staff Management</span></a>
                                  </li>
                                  <li class=""><a class="" href="{{ route('client.index') }}"><span data-i18n="Analytics">Client Management</span></a>
                                  </li>
                                
                            </ul>
                        </li>
                        <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="AppsDropdown"><i class="material-icons">store_mall_directory</i><span><span class="dropdown-title" data-i18n="Apps">Inventory</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                            <ul class="dropdown-content dropdown-horizontal-list" id="AppsDropdown">
                                <li><a href="{{route('product.create')}}"><span data-i18n="Modern">Add Product Details</span></a>
                                </li>
                                <li class=""><a class="" href="{{route('product.index')}}"><span data-i18n="Analytics">Product Details</span></a>
                                </li>
                                <!-- a view of all products -->
                                <li class=""><a class="" href="{{route('products_list')}}"><span data-i18n="Analytics">List of Products</span></a>
                                </li>
                                <li class=""><a class="" href="{{route('dispatch')}}"><span data-i18n="Analytics">Dispatch Products</span></a>
                                </li>
                                <!-- a view where admins views all pending dispatches -->
                                <li class=""><a class="" href="{{route('pending_dispatches')}}"><span data-i18n="Analytics">Pending Dispatches</span></a>
                                </li>
                                <!-- a view for confirming all the dispatches from your store -->
                                <li class=""><a class="" href="{{route('confirm_dispatch')}}"><span data-i18n="Analytics">Confirm Dispatches</span></a>
                                </li>

                                
                            </ul>
                        </li>
                        
                        <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="PageDropdown"><i class="material-icons">attach_money</i><span><span class="dropdown-title" data-i18n="Pages">Sales</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                            <ul class="dropdown-content dropdown-horizontal-list" id="PageDropdown">
                                <li><a href="{{route('cash_sale')}}"><span data-i18n="Modern">Cashier Panel</span></a>
                                <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdownSub-menu" href="Javascript:void(0)" data-target="formsDropdown"><span data-i18n="Forms">Quotations</span><i class="material-icons right">chevron_right</i></a>
                                    <ul class="dropdown-content dropdown-horizontal-list" id="formsDropdown">
                                        <li><a href="{{  route('quot_page')}}"><span data-i18n="Modern">Create Quotations</span></a>
                                        <li data-menu=""><a href="{{  route('view_quots')}}"><span data-i18n="Form Select2">View Quotations</span></a></li>
                                        
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a class="dropdownSub-menu" href="Javascript:void(0)" data-target="formDropdown"><span data-i18n="Forms">Invoices</span><i class="material-icons right">chevron_right</i></a>
                                    <ul class="dropdown-content dropdown-horizontal-list" id="formDropdown">
                                        <li><a href="{{  route('create_invoices')}}"><span data-i18n="Modern">Create Invoices</span></a>
                                        <li data-menu=""><a href="{{  route('view_invoices')}}"><span data-i18n="Form Select2">View Invoices</span></a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="{{route('view_cashsale_rec')}}"><span data-i18n="Modern">View Cash Sale Receipts</span></a>
                              </li>
                                
                            </ul>
                        </li>
                        <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="TemplatesDropdown"><i class="material-icons">monetization_on</i><span><span class="dropdown-title" data-i18n="Templates">Finance</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                            <ul class="dropdown-content dropdown-horizontal-list" id="TemplatesDropdown">
                                <li><a href="{{ route('transaction.index') }}"><span data-i18n="Modern Menu">Cash Transactions</span></a>
                                </li>
                                <li class=""><a class="" href="{{ route('purchase.create') }}"><span data-i18n="Analytics">Make Purchases</span></a>
                                </li>
                                <li class=""><a class="" href="{{ route('view_lpo') }}"><span data-i18n="Analytics">View LPO's</span></a>
                                </li>
                                <li class=""><a class="" href="{{ route('imported_goods') }}"><span data-i18n="Analytics">Confirm Purchased Items</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- END: Horizontal nav start-->
            </nav>
        </div>
    </header>

    {{-- <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-fixed hide-on-large-only">
        <div class="brand-sidebar sidenav-light"></div>
        <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed hide-on-large-only menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
            <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="DashboardDropdown"><i class="material-icons">dashboard</i><span><span class="dropdown-title" data-i18n="Dashboard">Dashboard</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                <ul class="dropdown-content dropdown-horizontal-list" id="DashboardDropdown">
                    <li data-menu=""><a href="/reports"><span data-i18n="Modern">Reports</span></a>
                    </li>
                </ul>
            </li>

            <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="formsTables"><i class="material-icons">group</i><span><span class="dropdown-title" data-i18n="Templates">H. Resource</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                <ul class="dropdown-content dropdown-horizontal-list" id="formsTables">
                    <li><a href="{{ route('staff.index') }}"><span data-i18n="Modern Menu">Staff Management</span></a>
                      </li>
                      <li class=""><a class="" href="{{ route('client.index') }}"><span data-i18n="Analytics">Client Management</span></a>
                      </li>
                    
                </ul>
            </li>
            
            <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="AppsDropdown"><i class="material-icons">store_mall_directory</i><span><span class="dropdown-title" data-i18n="Apps">Inventory</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                <ul class="dropdown-content dropdown-horizontal-list" id="AppsDropdown">
                    <li><a href="{{route('product.create')}}"><span data-i18n="Modern">Add Product Details</span></a>
                    </li>
                    <li class=""><a class="" href="{{route('product.index')}}"><span data-i18n="Analytics">Product Details</span></a>
                    </li>
                    <!-- a view of all products -->
                    <li class=""><a class="" href="{{route('products_list')}}"><span data-i18n="Analytics">List of Products</span></a>
                    </li>
                    <li class=""><a class="" href="{{route('dispatch')}}"><span data-i18n="Analytics">Dispatch Products</span></a>
                    </li>
                    <!-- a view where admins views all pending dispatches -->
                    <li class=""><a class="" href="{{route('pending_dispatches')}}"><span data-i18n="Analytics">Pending Dispatches</span></a>
                    </li>
                    <!-- a view for confirming all the dispatches from your store -->
                    <li class=""><a class="" href="{{route('confirm_dispatch')}}"><span data-i18n="Analytics">Confirm Dispatches</span></a>
                    </li>                    
                </ul>
            </li>
            
            <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="PageDropdown"><i class="material-icons">attach_money</i><span><span class="dropdown-title" data-i18n="Pages">Sales</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                <ul class="dropdown-content dropdown-horizontal-list" id="PageDropdown">
                    <li><a href="{{route('cash_sale')}}"><span data-i18n="Modern">Cashier Panel</span></a>
                    <li><a href=""><span data-i18n="Modern">Manage Quotations</span></a>
                    <li><a href="{{route('view_cashsale_rec')}}"><span data-i18n="Modern">View Cash Sale Receipts</span></a>
                  </li>
                    
                </ul>
            </li>
            <li><a class="dropdown-menu" href="Javascript:void(0)" data-target="TemplatesDropdown"><i class="material-icons">monetization_on</i><span><span class="dropdown-title" data-i18n="Templates">Finance</span><i class="material-icons right">keyboard_arrow_down</i></span></a>
                <ul class="dropdown-content dropdown-horizontal-list" id="TemplatesDropdown">
                    <li><a href="{{ route('transaction.index') }}"><span data-i18n="Modern Menu">Cash Transactions</span></a>
                    </li>
                    <li class=""><a class="" href="{{ route('purchase.create') }}"><span data-i18n="Analytics">Make Purchases</span></a>
                    </li>
                    <li class=""><a class="" href="{{ route('view_lpo') }}"><span data-i18n="Analytics">View LPO's</span></a>
                    </li>
                    <li class=""><a class="" href="{{ route('imported_goods') }}"><span data-i18n="Analytics">Confirm Purchased Items</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="navigation-background"></div><a class="sidenav-trigger btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside> --}}