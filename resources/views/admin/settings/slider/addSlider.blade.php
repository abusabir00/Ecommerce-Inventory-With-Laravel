@extends('admin.master')

@section('title')
Add Sider
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">ADD SLIDER</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/storeSlider','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">

        
        <div class="form-group">
            <label>Slider Name*</label>
            {{ Form::text('name',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
    
        
      
        <div class="form-group">
            <label>Slider Image*</label>
            {{ Form::file('photo', null, array_merge(['class' => 'form-control' ])) }}
            <b style="color:red; margin-top:10px; font-weight: bold; float: right;margin-right: 10px">Image Must be PNG,JPEG,JPG &amp; Size: min 1150x500</b>
            <span class="text-danger">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</span>
        </div>
        
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">+ Add</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection