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

    {!! Form::open(['url' => '/addGeneral','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">

        
        <div class="form-group">
            <label>Name*</label>
            {{ Form::text('name',$com->name, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Phone</label>
            {{ Form::text('phone',$com->phone, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Email</label>
            {{ Form::email('email',$com->email, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Address</label>
            {{ Form::textarea('addr',$com->addr, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>New Offer</label>
            {{ Form::textarea('offer',$com->offer, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('offer') ? $errors->first('offer') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Download</label>
            {{ Form::file('download', null, array_merge(['class' => 'btn btn-success' ])) }}
            <span class="text-danger">{{ $errors->has('download') ? $errors->first('download') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Facebook</label>
            {{ Form::text('facebook',$com->facebook, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Google</label>
            {{ Form::text('google',$com->google, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Twitter</label>
            {{ Form::text('twitter',$com->twitter, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Product Vat %</label>
            {{ Form::number('vat',$com->vat, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Company Terms & Conditions </label>
            {{ Form::textarea('terms',$com->terms, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Environment Policy </label>
            {{ Form::textarea('envPolicy',$com->envPolicy, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Quality policy</label>
            {{ Form::textarea('quaPlicy',$com->quaPlicy, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Interior</label>
            {{ Form::textarea('message',$com->message, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
        
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">Save Change</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection