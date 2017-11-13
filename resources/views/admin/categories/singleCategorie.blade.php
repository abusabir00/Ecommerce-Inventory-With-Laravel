@extends('admin.master')

@section('title')
Single Categorie
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
@foreach($catValue as $value)
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-present font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">{{$value->name}}</span>
            
        </div>
    </div>

    @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    @if($value->name == 1) 
    <i class="fa fa-check font-red-sunglo"></i><span class="caption-subject bold"> Published</span>
    @else
    <i class="fa fa-close font-red-sunglo"></i><span class="caption-subject bold"> Unpublished</span>
    @endif

    <p>{{$value->description}}</p>
@endforeach


</div>     
@endsection