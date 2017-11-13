@extends('admin.master')

@section('title')
Add Product
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
            <span class="caption-subject bold uppercase">ADD PRODUCT</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/storeProduct','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">

        <div class="form-group">
            <label>Product Code*</label>
            {{ Form::textarea('code',null, array_merge(['class' => 'form-control','rows'=>'2'])) }}
            <span class="text-danger">{{ $errors->has('code') ? $errors->first('code') : '' }}</span>
        </div>
        
        <div class="form-group">
            <label>Product Name*</label>
            {{ Form::text('name',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
    
        
        <div class="form-group">
            <label> Short Description</label>
            {{ Form::textarea('description',null, array_merge(['class' => 'form-control'])) }}
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
            <label>Initial Quantity</label>
            {{ Form::number('qty',0, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('qty') ? $errors->first('qty') : '' }}</span>
        </div>


        <div class="form-group">
            <label>Product Size</label></br>
            {{ Form::text('size','Standerd', array_merge(['class' => 'form-control','data-role'=>'tagsinput','placeholder'=>'Example: Size1,Size2,..'])) }}
            <span class="text-danger">{{ $errors->has('size') ? $errors->first('size') : '' }}</span>
        </div>

        <div class="form-group">
            <label>New Price* </label></br>
            {{ Form::text('newPrice',null, array_merge(['class' => 'form-control','data-role'=>'tagsinput','placeholder'=>'Example:100,200'])) }}
            <span class="text-danger">{{ $errors->has('newPrice') ? $errors->first('newPrice') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Old Price</label></br>
            {{ Form::text('oldPrice',null, array_merge(['class' => 'form-control','data-role'=>'tagsinput','placeholder'=>'Example:100,200'])) }}
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
            Publish {{ Form::radio('status', 1) }}
            Unpublish {{ Form::radio('status', 0) }}
            <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
        </div>
         
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">+ Add</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>

<script type="text/javascript">
    function bs_input_file() {
    $(".input-file").before(
        function() {
            if ( ! $(this).prev().hasClass('input-ghost') ) {
                var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                element.attr("name",$(this).attr("name"));
                element.change(function(){
                    element.next(element).find('input').val((element.val()).split('\\').pop());
                });
                $(this).find("button.btn-choose").click(function(){
                    element.click();
                });
                $(this).find("button.btn-reset").click(function(){
                    element.val(null);
                    $(this).parents(".input-file").find('input').val('');
                });
                $(this).find('input').css("cursor","pointer");
                $(this).find('input').mousedown(function() {
                    $(this).parents('.input-file').prev().click();
                    return false;
                });
                return element;
            }
        }
    );
}


</script>

@endsection


@section('pjs')
<script src="{{asset('public/admin/custom/bootstrap-tagsinput.js')}}" type="text/javascript"></script>
@endsection