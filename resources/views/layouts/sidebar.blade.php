<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="index.html"><img class="hide-on-med-and-down" src="../../../app-assets/images/logo/materialize-logo-color.png" alt="materialize logo"/><img class="show-on-medium-and-down hide-on-med-and-up" src="../../../app-assets/images/logo/materialize-logo.png" alt="materialize logo"/><span class="logo-text hide-on-med-and-down">DCL ERP</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">dashboard</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="dashboard-modern.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Modern</span></a>
              </li>
              <li><a href="dashboard-ecommerce.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="eCommerce">eCommerce</span></a>
              </li>
              <li class="active"><a class="active" href="dashboard-analytics.html"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Analytics">Analytics</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="navigation-header"><a class="navigation-header-text">Applications</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <!-- <li class="bold"><a class="waves-effect waves-cyan " href="app-email.html"><i class="material-icons">mail_outline</i><span class="menu-title" data-i18n="Mail">Mail</span><span class="badge new badge pill pink accent-2 float-right mr-2">5</span></a>
        </li> -->
        <li class="bold"><a class="collapsible-header waves-effect" href="JavaScript:void(0)"><i class="material-icons">group</i><span class="menu-title" data-i18n="Dashboard">User Management</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{ route('staff.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Staff Management</span></a>
              </li>
              <li class="active"><a class="active" href="{{ route('client.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Analytics">Client Management</span></a>
              </li>

            </ul>
          </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect" href="JavaScript:void(0)"><i class="material-icons">store_mall_directory</i><span class="menu-title" data-i18n="Dashboard">Inventory</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{route('product.create')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Add Product Details</span></a>
              </li>
              <li><a href="{{route('stock.create')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Stock Products</span></a>
              </li>
              <li class=""><a class="" href="{{route('product.index')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Analytics">Product Details</span></a>
              </li>
               <li class=""><a class="" href="{{route('products_list')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Analytics">List of Products</span></a>
              </li>
              <li class=""><a class="" href="{{route('dispatch')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Analytics">Dispatch Products</span></a>
              </li>
              <li class=""><a class="" href="{{route('confirm_dispatch')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Analytics">Confirm Dispatch</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect" href="JavaScript:void(0)"><i class="material-icons">attach_money</i><span class="menu-title" data-i18n="Dashboard">Sales</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="{{route('cash_sale')}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Modern">Cash Sale</span></a>
              </li>
            </ul>
          </div>
        </li>
        <br>
        <br>
        <br>
        <li class="bold"><a class="waves-effect waves-cyan " href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                                     <i class="material-icons">power_settings_new</i><span class="menu-title" data-i18n="power_settings_new">Logout</span></a>
        </li>
      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
      
    </aside>