@extends('admin.master')

@section('title')
Delivered Order
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>DELIVERED ORDER</div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th class="desktop"> # Serial No. </th>
                        <th class="desktop"> # Order Id </th>
                        <th class="all"> Customer </th>
                        <th class="min-tablet">Contact</th>
                        <th class="desktop"> Delivery Date</th>
                        <th class="min-tablet">Order Amount</th>
                        <th class="min-tablet"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $num = 1; ?>
                    @foreach($orderValue as $value)
                        <tr>
                            <td><?php echo $num; $num++; ?></td>
                            <td>#00{{$value->id}}</td>
                            <td>{{$value->fname}} {{$value->lname}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->deliveryDate}}</td>
                            <td> TK. {{$value->orderTotal}}
                            <span class="label label-success label-sm">{{$value->orderStatus }}</span>    
                            </td>
                            <td>
                                <span>
                                    <a href="{{ url('/confirmation/'.$value->id) }}" class="btn btn-icon-only default" >
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ url('/delOrder/'.$value->id.'/'.$value->shippingId) }}" class="btn btn-icon-only purple" onclick="return confirm('Are you sure to Complite Delivery');" >
                                    <i class="fa fa-check"></i>
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