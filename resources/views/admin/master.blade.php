<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->

<!-- Head Section here -->
@include('admin.includes.head')


    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">

<!-- BEGIN HEADER SeCTION -->
@include('admin.includes.header')




            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->



            <!-- BEGIN CONTAINER -->
            <div class="page-container">


<!-- Sitebar SeCTION -->
@include('admin.includes.sitebar')



<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <div class="page-content">

<!-- Main Content  SeCTION -->
@yield('content')

    </div>
</div>
<!-- END CONTENT -->


<!-- Main Content  SeCTION -->


                
            </div>
            <!-- END CONTAINER -->




<!-- Footer Content  SeCTION -->
@include('admin.includes.footer')



        </div>


<!-- Quick Nav Bar Content  SeCTION 
@include('admin.includes.quickNav')

-->


        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('public/admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->

<!--
|========================================================
| Page Level Plagins JS
|========================================================
-->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{asset('public/admin/global/plugins/moment.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

@yield('pjs')        
<!--
|========================================================
| Page Level Script JS
|========================================================
-->
        
        <!-- BEGIN Tynimcre Text editor -->
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea', branding: false });</script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('public/admin/global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{asset('public/admin/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('public/admin/layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('public/admin/layouts/global/scripts/quick-nav.min.js')}}" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->

@yield('js')

        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>