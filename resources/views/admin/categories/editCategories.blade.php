@extends('admin.master')

@section('title')
Edit Categorie
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">Edit CATEGORIE</span>
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    {!! Form::open(['url' => '/updateCategorie','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data']) !!}
    <div class="portlet-body form">
        
        <div class="form-group">
            <label>Categorie Name*</label>
            {{ Form::text('name',$cat->name, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('name') ? $errors->first('name') : '' }}</span>
        </div>
    
        
        <div class="form-group">
            <label> Categorie Description</label>
            {{ Form::textarea('description',$cat->description, array_merge(['class' => 'form-control'])) }}
            <span class="text-danger">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
        </div>
        
        
        <div class="form-group">
            <label>Parent Categorie</label>
           <select class="form-control" name="parentCat">
                <option value="0">Parent Categorie</option>
                @foreach($catValue as $value)
                <option value="{{$value->id }}" @if($cat->parent == $value->id) selected @endif>{{$value->name}}</option>
                @endforeach
            </select>
             <span class="text-danger">{{ $errors->has('parentCat') ? $errors->first('parentCat') : '' }}</span>
        </div>
        
         <div class="form-group">
            <label>Publish</label>
            {{ Form::radio('status',1,true) }}

            <label>Unpublish</label>
            {{ Form::radio('status',0) }}
            <span class="text-danger">{{ $errors->has('status') ? $errors->first('status') : '' }}</span>
        </div>
        {{ Form::hidden('catId',$cat->id) }}
        
        
        <div class="form-group">
            <button type="submit" class="btn green-meadow">+ Add</button>
        </div>
    </div>
    {!! Form::close() !!}
</div>     
@endsection