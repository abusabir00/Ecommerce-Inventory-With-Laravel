@extends('admin.master')

@section('title')
Report
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo col-md-4">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">Transaction Report</span>
        </div>

{!! Form::open(['url' => '/viewReport','method' => 'POST', 'class' => 'login-form']) !!}
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
        <div class="col-md-2 pull-right">
            <span class="input-group-btn">
               <button type="submit" class="btn red">
            <i class="fa fa-check"></i> GO</button>
            </span>
            </div>
{!! Form::close() !!}
    </div>

<?php $eamount[] = null;  foreach ($expence as $eval) { $eamount[] = $eval->amount;}?>
<?php $iamount[] = null;  foreach ($income as $ival) { $iamount[] = $ival->amount;}?>
<?php   foreach ($order as $or) { $ord[] = $or->id;}?>


<div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
            <div class="visual">
                <i class="fa fa-comments"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="{{number_format(array_sum($eamount),2)}} "></span> TK
                </div>
                <div class="desc">Total Expense</div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 red" href="#">
            <div class="visual">
                <i class="fa fa-bar-chart-o"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="@if(isset($income)) {{number_format(array_sum($iamount),2)}} @endif"></span> TK </div>
                <div class="desc"> Total Income </div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 green" href="#">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <span data-counter="counterup" data-value="@if(isset($expence)) {{number_format( (array_sum($iamount) - array_sum($eamount)),2)}} @endif"></span> TK
                </div>
                <div class="desc">Total Profit</div>
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-v2 purple" href="{{url('/viewOrder')}}">
            <div class="visual">
                <i class="fa fa-globe"></i>
            </div>
            <div class="details">
                <div class="number"> +
                    <span data-counter="counterup" data-value="@if(isset($ord)) {{sizeof($ord)}} @endif"></span></div>
                <div class="desc">Total Order</div>
            </div>
        </a>
    </div>
</div>

</div>

<div class="row">
    <div class="col-md-6">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>INCOME STATEMENT </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="all"> # Order ID</th>
                            <th class="desktop">Custome</th>
                            <th class="min-tablet">Date</th>
                            <th class="min-tablet">Amount</th>

                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($income))
                    @foreach($income as $inc)
                        <tr>
                            <td>#00{{$inc->orderId}}</td>
                            <td>{{$inc->fname}} {{$inc->lname}}</td>
                            <td>{{$inc->date}}</td>
                            <td>TK. {{$inc->amount}}</td>
                        </tr>
                    @endforeach
                    @else
                    No Income !!
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>

    <div class="col-md-6">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box red">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>PRODUCT RECIEVE STATEMENT </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                    <thead>
                        <tr>
                            <th class="all">Supplier</th>
                            <th class="min-phone-l">Date</th>
                            <th class="min-tablet">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($expence))
                        @foreach($expence as $exp)
                            <tr>
                                <td>{{$exp->comName}}</td>
                                <td>{{$exp->created_at}}</td>
                                <td>TK. {{$exp->amount}}</td>
                            </tr>
                        @endforeach
                        @else
                        No Receive !!
                        @endif
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