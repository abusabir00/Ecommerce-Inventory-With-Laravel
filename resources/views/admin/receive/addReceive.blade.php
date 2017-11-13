@extends('admin.master')

@section('title')
Add Categorie
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">NEW RECEIVE PRODUCT</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/storeReceive','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">

        <div class="form-group">
        <label>Supplier*</label>
       <select class="form-control" name="supplier">
            @foreach($supVal as $val)
            <option value="{{$val->id}}">{{ $val->comName}}</option>
            @endforeach
        </select>
         <span class="text-danger">{{ $errors->has('Cat') ? $errors->first('Cat') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Categorie</label>
           <select class="form-control" name="Cat" onchange="catPro(this.value,0);">
                <option value="0">--Select--</option>
                @foreach($catValue as $value)
                <optgroup label="{{$value->name}}">
<?php $subCat = DB::table('categorie')->where('parent',$value->id)->select('name','parent','id')->get(); ?>
                @foreach($subCat as $subVal)
                <option value="{{$subVal->id}}">{{ $subVal->name}}</option>
                @endforeach 
                @endforeach

            </select>
             <span class="text-danger">{{ $errors->has('Cat') ? $errors->first('Cat') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Product</label>
           <select class="form-control" name="proId" id="product" onchange="sizeByPro(this.value,0);">
                

            </select>
             <span class="text-danger">{{ $errors->has('product') ? $errors->first('product') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Product Size</label>
           <select class="form-control" name="proSize" id="size">
                
            </select>
             <span class="text-danger">{{ $errors->has('product') ? $errors->first('product') : '' }}</span>
        </div>
        
        <div class="form-group">
            <label>Product Quantity*</label>
            {{ Form::number('qty',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('qty') ? $errors->first('qty') : '' }}</span>
        </div>

        <div class="form-group">
            <label>Product Rate*</label>
            {{ Form::text('rate',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('rate') ? $errors->first('rate') : '' }}</span>
        </div>      
        
        

        
        
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">+ Add</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection


@section('js')
<script type="text/javascript">
function catPro(a,b){
    $.ajax({
        url: '{{ url("/proByCat") }}',
        type: 'GET',
        dataType: 'html',
        data: 'itemId=' + a,
        success: function(data) {
             $('#product').empty();
             $('#product').append(data);
        },  
    });              
}
function sizeByPro(a,b){
    $.ajax({
        url: '{{ url("/sizeByPro") }}',
        type: 'GET',
        dataType: 'html',
        data: 'itemId=' + a,
        success: function(data) {
             $('#size').empty();
             $('#size').append(data);
        },  
    });              
} 

</script>

@endsection

