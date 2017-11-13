@extends('admin.master')

@section('title')
Manage Recieve
@endsection

@section('content')


<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo col-md-3">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">Transaction Report</span>
        </div>

{!! Form::open(['url' => '/advReceive','method' => 'POST', 'class' => 'login-form']) !!}
        <div class="col-md-6">
            <div class="input-group" id="defaultrange">
                <input type="text" name="dateRange" class="form-control">
                <span class="text-danger">{{ $errors->has('dateRange') ? $errors->first('dateRange') : '' }}</span>
                <span class="input-group-btn">
                    <button class="btn default date-range-toggle" type="button">
                        <i class="fa fa-calendar"></i>
                    </button>
                </span>
            </div> 
        </div>
        <div class="col-md-1">
        <span class="input-group-btn">
           <button type="submit" class="btn red">
        <i class="fa fa-check"></i> GO</button>
        </span>
        </div>

            <div class="caption font-red-sunglo col-md-2">
               <a href="{{ url('/addReceive') }}" class="btn default" > <i class="fa fa-edit"></i>New Receive</a>
            </div>
{!! Form::close() !!}
    </div>

<div class="row">
    <div class="col-md-12">
        
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box red">
        <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>MANAGE RECEIVE</div>
                <div class="tools"> </div>
            </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                <thead>
                    <tr>
                    <th class="desktop">#Recieve ID </th>
                    <th class="all">Supplier</th>
                    <th class="min-phone-l"> Product Name </th>
                    <th class="min-tablet"> Date </th>
                    <th class="min-tablet"> Quantity </th>
                    <th class="min-tablet">Size</th>
                    <th class="desktop"> Amount </th>
                    <th class="min-tablet"> Total </th>
                    <th class="desktop"> Action </th>  
                    </tr>
                </thead>
                <tbody>
                 <?php $num = 1; ?>
                @foreach($receiveValue as $value)
                    <tr>
                        <td><?php echo $num; $num++; ?></td>
                        <td>{{$value->comName}}</td>
                        <td>{{$value->name}} || <?php echo $value->code; ?></td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->qty}}</td>
                        <td>{{$value->size}}</td>
                        <td>{{$value->rate}}</td>
                        <td>{{$value->qty * $value->rate}}</td>

                        <td>
                            <span>
                            <a href="{{ url('/editReceive/'.$value->id) }}" class="btn btn-icon-only red" >
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ url('/delReceive/'.$value->id) }}" class="btn btn-icon-only purple" onclick="return confirm('Are you sure to delete this');" >
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


</div>
  
@endsection

@section('js')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('public/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin/pages/scripts/components-date-time-pickers.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{asset('public/admin/pages/scripts/table-datatables-responsive.min.js')}}" type="text/javascript"></script>

<script type="text/javascript">


</script>
@endsection

@section('pcss')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="{{asset('public/admin/custom/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('public/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('public/admin/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />

<!-- END PAGE LEVEL PLUGINS -->
@endsection