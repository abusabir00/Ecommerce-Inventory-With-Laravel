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
            <span class="caption-subject bold uppercase">ADD CATEGORIE</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/storeCategorie','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">
        
        <div class="form-group">
            <label>Categorie Name*</label>
            {{ Form::text('name',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
    
        
        <div class="form-group">
            <label> Categorie Description</label>
            {{ Form::textarea('description',null, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
        </div>
        
        
        <div class="form-group">
            <label>Parent Categorie</label>
           <select class="form-control" name="parentCat">
                <option value="0">Parent Categorie</option>
                @foreach($catValue as $value)
                <option value="{{$value->id }}">{{$value->name}}</option>
                @endforeach
            </select>
             <span class="text-danger">{{ $errors->has('parentCat') ? $errors->first('parentCat') : '' }}</span>
        </div>
        
         <div class="form-group">
            <label>Publish</label>
            {{ Form::radio('status',1) }}

            <label>Unpublish</label>
            {{ Form::radio('status',0) }}
            <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
        </div>
        
        
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">+ Add</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection