@extends('admin.master')

@section('title')
Admin Change
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">Admin Setting</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/adminChange','method' => 'POST', 'class' => 'login-form']) !!}
    <div class="portlet-body form">
        
        <div class="form-group">
            <label>User Name*</label>
            {{ Form::text('uname',$user->email, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('uname') ? $errors->first('uname') : '' }}</span>
        </div>
    
        
        <div class="form-group">
            <label>Old Password</label>
            {{ Form::text('oldPass',null,array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('oldPass') ? $errors->first('oldPass') : '' }}</span>
        </div>

        <div class="form-group">
            <label>New Password</label>
            {{ Form::text('pass',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('pass') ? $errors->first('pass') : '' }}</span>
        </div>
        
        

        <div class="form-group">
            <button type="submit" class="btn green-meadow">SAVE CHANGE</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection