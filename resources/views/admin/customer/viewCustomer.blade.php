@extends('admin.master')

@section('title')
Manage Customer
@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>MANAGE CUSTOMER</div>
                <div class="tools"> </div>
            </div>

                @if(Session::get('message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                        <strong>{{ Session::get('message') }}</strong>
                </div>
                @endif


            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th class="desktop"> # </th>
                        <th class="all"> Customer </th>
                        <th class="min-tablet"> Phone Number </th>
                        <th class="min-tablet"> Email </th>
                        <th class="min-tablet"> Action </th>    
                        </tr>
                    </thead>
                    <tbody>
                   <?php $num = 1; ?>
                    @foreach($customerValue as $value)
                        <tr>
                            <td><?php echo $num; $num++; ?></td>
                            <td>{{$value->fname}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->email}}</td>
                            <td>
                                <span>
                                    <a href="{{ url('/singleCustomer/'.$value->id) }}" class="btn btn-icon-only default" >
                                    <i class="fa fa-user"></i>
                                </a>
                                <a href="{{ url('/editCustomer/'.$value->id) }}" class="btn btn-icon-only red" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ url('/delCustomer/'.$value->id) }}" class="btn btn-icon-only purple" onclick="return confirm('Are you sure to delete this');" >
                                    <i class="fa fa-times"></i>
                                </a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

@endsection


@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('public/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{asset('public/admin/pages/scripts/table-datatables-responsive.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">


</script>
@endsection

@section('pcss')
<link href="{{asset('public/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endsection
