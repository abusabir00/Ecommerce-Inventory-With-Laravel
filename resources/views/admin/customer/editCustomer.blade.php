@extends('admin.master')

@section('title')
Edit Customer
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">EDIT CUSTOMER</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/updateCustomer','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">

	  <fieldset>
	    <div class="form-group">
	    <label>Country</label>
	      {{ Form::text('country',$cusVal->country, array_merge(['class' => 'form-control','readonly'])) }}
	      <span class="text-danger">{{ $errors->has('fname') ? $errors->first('fname') : '' }}</span>
	    </div>
	    <div class="form-group">
	    <label>Frist Name*</label>
	        {{ Form::text('fname',$cusVal->fname, array_merge(['class' => 'form-control'])) }}
	        <span class="text-danger">{{ $errors->has('fname') ? $errors->first('fname') : '' }}</span>
	      </div>
	      <div class="form-group">
	      <label>Last Name*</label>
	        {{ Form::text('lname',$cusVal->lname, array_merge(['class' => 'form-control'])) }}
	        <span class="text-danger">{{ $errors->has('lname') ? $errors->first('lname') : '' }}</span>
	      </div>

	    <div class="form-group">
	    <label>Company Name</label>
	      {{ Form::text('cname',$cusVal->cname, array_merge(['class' => 'form-control'])) }}
	      <span class="text-danger">{{ $errors->has('cname') ? $errors->first('cname') : '' }}</span>
	    </div>
	    <div class="form-group">
	    <label>Address</label>
	      {{ Form::textarea('addr1',$cusVal->addr1, array_merge(['class' => 'form-control'])) }}
	      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
	    </div>
	    <div class="form-group">
	    <label>Another Address</label>
	      {{ Form::textarea('addr2',$cusVal->addr2, array_merge(['class' => 'form-control'])) }}
	      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
	    </div>
	    <div class="form-group">
	    <label>City*</label>
	      {{ Form::text('city',$cusVal->city, array_merge(['class' => 'form-control'])) }}
	      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
	    </div>
	    <div class="form-group">
	    <label>Post Code*</label>
	      {{ Form::text('postCode',$cusVal->postCode, array_merge(['class' => 'form-control'])) }}
	      <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
	    </div>
	    <div class="form-group">
	    <label>Email*</label>
	        {{ Form::email('email',$cusVal->email, array_merge(['class' => 'form-control'])) }}
	        <span class="text-danger">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
	      </div>
	    <div class="form-group">
	    <label>Phone Number*</label>
	        {{ Form::number('phone',$cusVal->phone, array_merge(['class' => 'form-control'])) }}
	        <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
	      </div>
	    {{ Form::hidden('cusId',$cusVal->id) }}  
	    <button type="submit" class="btn green-meadow">Update Customer<i class="fa fa-check"></i></button>
	  </fieldset>

    </div>
    {!! Form::close() !!}




</div>

<script type="text/javascript">
   
</script>

@endsection