@extends('admin.master')

@section('title')
Manage Supplier
@endsection

@section('content')

<div class="col-md-12">
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">MANAGE SUPPLIER</span>
        </div>

        <div class="caption font-red-sunglo pull-right">
           <a href="{{ url('/addSupplier') }}" class="btn default" > <i class="fa fa-edit"></i>New Supplier</a>
        </div>
    </div>

    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box red">
        <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>MANAGE RECEIVE </div>
                <div class="tools"> </div>
            </div>

        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                <thead>
                    <tr>
                    <th class="desktop">#Serial No.</th>
                    <th class="all">Company Name</th>
                    <th class="desktop">Owner</th>
                    <th class="min-tablet">Contact</th>
                    <th class="desktop">Address</th>
                    <th class="min-tablet"> Action </th> 
                    </tr>
                </thead>
                <tbody>
                <?php $num = 1; ?>
                @foreach($receiveValue as $value)
                    <tr>
                        <td><?php echo $num; $num++; ?></td>
                        <td>{{$value->comName}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->addr}}</td>
                        <td>
                            <span>
                            <a href="{{ url('/editSupplier/'.$value->id) }}" class="btn btn-icon-only red" >
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ url('/delSupplier/'.$value->id) }}" class="btn btn-icon-only purple" onclick="return confirm('Are you sure to delete this');" >
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

