@extends('admin.master')

@section('title')
Add Supplier
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">NEW Supplier</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/storeSupplier','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">
        
        <div class="form-group">
            <label>Company Name*</label>
            {{ Form::text('comName',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('comName') ? $errors->first('comName') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Name</label>
            {{ Form::text('name',null, array_merge(['class' => 'form-control'])) }}
        </div>

        <div class="form-group">
            <label>Contact*</label>
            {{ Form::number('phone',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Address</label>
            {{ Form::textarea('addr',null, array_merge(['class' => 'form-control'])) }}
        </div>
    
        
        

        
        
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">+ Add</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection


@section('js')


@endsection