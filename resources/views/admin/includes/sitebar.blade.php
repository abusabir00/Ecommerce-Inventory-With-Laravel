<div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->

                            <li class="nav-item start">
                                <a href="{{ url('/admin') }}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>


                            <li class="heading">
                                <h3 class="uppercase">Features</h3>
                            </li>

                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Categories</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('/viewCategorie') }}" class="nav-link ">
                                            <span class="title">Manage Categories</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ url('/addCategories') }}" class="nav-link ">
                                            <span class="title">Add Categories</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="title">Product</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ url('/viewProduct') }}" class="nav-link ">
                                            <span class="title">Manage Product</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ url('/addProduct') }}" class="nav-link ">
                                            <span class="title">Add Product</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ url('/viewCustomer') }}" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">Customer</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ url('/viewOrder') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-send-o"></i>
                                    <span class="title">Manage Order</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ url('/delivered') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-truck"></i>
                                    <span class="title">Delivered Order</span>
                                </a>
                            </li>

                             <li class="nav-item  ">
                                <a href="{{ url('/viewReceive') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-get-pocket"></i>
                                    <span class="title">Recieved Product</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ url('/viewSupplier') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-building-o"></i>
                                    <span class="title">Supplier</span>
                                </a>
                            </li>

                            <li class="nav-item  ">
                                <a href="{{ url('/report') }}" class="nav-link nav-toggle">
                                    <i class="fa fa-bar-chart"></i>
                                    <span class="title">Report</span>
                                </a>
                            </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Web Settings</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                
                                <li class="nav-item  ">
                                    <a href="{{url('/general')}}" class="nav-link " >
                                        <span class="nav-item">General Setting</span>
                                    </a>
                                </li>
                                
                                
                                <li class="nav-item  ">
                                    <a href="{{url('/about')}}" class="nav-link " >
                                        <span class="nav-item">About Page Setting</span>
                                    </a>
                                </li>

                                <li class="nav-item  ">
                                    <a href="{{url('/change')}}" class="nav-link " >
                                        <span class="nav-item">Change Password</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="javascript:;" class="nav-link nav-toggle">
                                        <i class="icon-notebook"></i>
                                        <span class="title">Slider Image Setting</span>
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li class="nav-item ">
                                            <a href="{{url('/viewSlider')}}" class="nav-link ">Manage Images</a>
                                        </li>
                                        <li class="nav-item ">
                                            <a href="{{url('/addSlider')}}" class="nav-link ">Add New Sider</a>
                                        </li>
                                        
                                    </ul>
                                </li>
                                
                            </ul>
                        </li>


                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>