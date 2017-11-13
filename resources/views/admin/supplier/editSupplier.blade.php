@extends('admin.master')

@section('title')
Edit Supplier
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">EDIT Supplier</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/updateSupplier','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">
        
        <div class="form-group">
            <label>Company Name*</label>
            {{ Form::text('comName',$supValue->comName, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('comName') ? $errors->first('comName') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Name</label>
            {{ Form::text('name',$supValue->name, array_merge(['class' => 'form-control'])) }}
        </div>

        <div class="form-group">
            <label>Contact*</label>
            {{ Form::number('phone',$supValue->phone, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Address</label>
            {{ Form::textarea('addr',$supValue->addr, array_merge(['class' => 'form-control'])) }}
        </div>
    
        {{ Form::textarea('supId',$supValue->id) }}
        

        
        
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">+ Add</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection


@section('js')


@endsection