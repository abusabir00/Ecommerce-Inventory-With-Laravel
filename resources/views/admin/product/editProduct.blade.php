@extends('admin.master')

@section('title')
Edit Product
@endsection

@section('pcss')
<link href="{{asset('public/admin/custom/bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">EDIT PRODUCT</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif


    {!! Form::open(['url' => '/updateProduct','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data','name'=>'editProductForm']) !!}
    <div class="portlet-body form">

        <div class="form-group">
            <label>Product Code*</label>
            {{ Form::textarea('code',$product->code, array_merge(['class' => 'form-control','row'=>'3'])) }}
            <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
        </div>
        
        <div class="form-group">
            <label>Product Name*</label>
            {{ Form::text('name',$product->name, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
    
        
        <div class="form-group">
            <label> Short Description</label>
            {{ Form::textarea('description',$product->description, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
        </div>
        
        
        <div class="form-group">
            <label>Categorie*</label>
           <select class="form-control" name="cat">

                @foreach($catValue as $value)
                <optgroup label="{{$value->name}}">
<?php $subCat = DB::table('categorie')->where('parent',$value->id)->select('name','parent','id')->get(); ?>
                @foreach($subCat as $subVal)
                <option value="{{$subVal->id}}">--{{ $subVal->name}}</option>
                @endforeach 
                @endforeach
                
            </select>
             <span class="text-danger">{{ $errors->has('cat') ? $errors->first('cat') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Product Size</label></br>
            {{ Form::text('size',$product->size, array_merge(['class' => 'form-control','data-role'=>'tagsinput','placeholder'=>'Example: Size1,Size2,..'])) }}
            <span class="text-danger">{{ $errors->has('oldPrice') ? $errors->first('oldPrice') : '' }}</span>
        </div>

        <div class="form-group">
            <label>New Price* </label></br>
            {{ Form::text('newPrice',$product->newPrice, array_merge(['class' => 'form-control','data-role'=>'tagsinput','placeholder'=>'Example:100,200'])) }}
            <span class="text-danger">{{ $errors->has('newPrice') ? $errors->first('newPrice') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Old Price</label></br>
            {{ Form::text('oldPrice',$product->oldPrice, array_merge(['class' => 'form-control','data-role'=>'tagsinput','placeholder'=>'Example:100,200'])) }}
            <span class="text-danger">{{ $errors->has('oldPrice') ? $errors->first('oldPrice') : '' }}</span>
        </div>


        <div class="form-group">
            <label>Product Image*</label>
            {{ Form::file('photo[]', null, array_merge(['class' => 'btn btn-success' ])) }}
            {{ Form::file('photo[]', null, array_merge(['class' => 'form-control' ])) }}
            {{ Form::file('photo[]', null, array_merge(['class' => 'form-control' ])) }}
            {{ Form::file('photo[]', null, array_merge(['class' => 'form-control' ])) }}
            {{ Form::file('photo[]', null, array_merge(['class' => 'form-control' ])) }}
            <b style="color:red; margin-top:10px; font-weight: bold; float: right;margin-right: 10px">Image Must be PNG,JPEG,JPG &amp; Size:600 X 600</b>
            <span class="text-danger">{{ $errors->has('photo') ? $errors->first('photo') : '' }}</span>
        </div>
        

         <div class="form-group">
            <label>Is Featured</label>
           <?php ($product->feture == 1 ? $select = true : $select = false ); ?> 
            {{ Form::checkbox('feture',1,$select)}}
            <span class="text-danger">{{ $errors->has('feture') ? $errors->first('feture') : '' }}</span>
        </div>

        <div class="form-group">
Publish {{ Form::radio('status', 1,($product->status == 1 ?  'true' : 'false' )) }}
Unpublish {{ Form::radio('status',0) }}
            <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
        </div>
         
        
        <div class="form-group">
        	 {{ Form::hidden('pId',$product->id) }}
            <button type="submit" class="btn green-meadow">Update</button>
        </div>
    </div>
    {!! Form::close() !!}


</div>

<script>
document.forms['editProductForm'].elements['cat'].value={{ $product->cat }}
</script>


@endsection

@section('pjs')
<script src="{{asset('public/admin/custom/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
@endsection