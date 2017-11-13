@extends('admin.master')

@section('title')
General Setting
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">GENERAL SETTING</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/storeAbout','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">


        <div class="form-group">
            <label>About Us*</label>
            {{ Form::textarea('about',$about->aboutUs, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('about') ? $errors->first('about') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Vission & Mission</label>
            {{ Form::textarea('misVis',$about->misVis, array_merge(['class' => 'form-control'])) }}
        </div>

        <div class="form-group">
            <label>Message</label>
            {{ Form::textarea('message',$about->message, array_merge(['class' => 'form-control'])) }}
        </div>
        
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">Save Change</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection