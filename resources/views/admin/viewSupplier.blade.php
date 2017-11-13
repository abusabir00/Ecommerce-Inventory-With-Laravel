@extends('admin.master')

@section('title')
Manage Supplier
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
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

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

   <div class="table-scrollable">
    <table class="table table-hover table-light">
        <thead>
            <tr>
                <th>#Serial No.</th>
                <th>Company Name</th>
                <th>Owner</th>
                <th>Contact</th>
                <th>Address</th>
                <th> Action </th>

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
                        <a href="{{ url('/singleCategorie/'.$value->id) }}" class="btn btn-icon-only default" >
                        <i class="fa fa-user"></i>
                    </a>
                    <a href="{{ url('/editCategorie/'.$value->id) }}" class="btn btn-icon-only red" >
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="{{ url('/delCategorie/'.$value->id) }}" class="btn btn-icon-only purple" onclick="return confirm('Are you sure to delete this');" >
                        <i class="fa fa-times"></i>
                    </a>
                    </span>
                </td>
            </tr>
        @endforeach    
        </tbody>
    </table>
</div>


{{$receiveValue->links()}}




</div>     
@endsection