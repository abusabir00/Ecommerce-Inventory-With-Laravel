@extends('admin.master')

@section('title')
Manage Product
@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-globe"></i>PRODUCT LIST </div>
                <div class="tools"> </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_3" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                        <th class="all"> # </th>
                        <th class="desktop"> Product </th>
                        <th class="min-tablet"> Product Name </th>
                        <th class="desktop"> Product Stock</th>
                        <th class="desktop"> Status </th>
                        <th class="min-tablet"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $num = 1; ?>
                    @foreach($productValue as $value)
                        <tr>
                            <td><?php echo $num; $num++; ?></td>
                            <td>
                            <?php  $img = unserialize($value->photo); ?> 
                            <img src="{{asset('/public/admin/upload/product/'.$value->id  . '/'. $img[0])}}" alt="image description" height="55" width="75">
                            </td>
                            <td>{{$value->name}}</td>
                            <td><span class="badge badge-warning">{{$value->qty}}</span></td>
                            <td>
                            @if($value->status==1)
                            <span class="label label-sm label-success">Publish</span>
                            @else
                            <span class="label label-sm label-danger">Unpublish</span>
                            @endif
                            </td>
                            <td>
                                <span>
                                    <a href="{{ url('/singleProduct/'.$value->id) }}" class="btn btn-icon-only default" >
                                    <i class="fa fa-user"></i>
                                </a>
                                <a href="{{ url('/editProduct/'.$value->id) }}" class="btn btn-icon-only red" >
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ url('/delProduct/'.$value->id) }}" class="btn btn-icon-only purple" onclick="return confirm('Are you sure to delete this');" >
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