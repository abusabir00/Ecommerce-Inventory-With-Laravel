@extends('admin.master')

@section('title')
Add Sider
@endsection

@section('content')

<!-- BEGIN SAMPLE FORM PORTLET-->
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-red-sunglo">
            <i class="icon-settings font-red-sunglo"></i>
            <span class="caption-subject bold uppercase">New Slider</span>
        </div>
    </div>
    
     @if(Session::get('message'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ Session::get('message') }}</strong>
    </div>
    @endif

    <div class="row">
        <?php foreach ($slider as $value) { ?>
           <div class="col-md-12"> <hr>
                <img style="width:1150px" src="<?php echo $value->photo; ?>" height="500" alt="">
                <hr>
                <!-- <a href="http://clix.thesoftking.com/slider-edit/2" class="btn btn-primary"><i class="entypo-pencil"></i> Edit Slider</a> -->

                <a href="{{ url('/delSlider/'.$value->id) }}" class="btn btn-danger btn-icon icon-left delete_button" onclick="return confirm('Are you sure to delete this');"> Delete Slider
                </a>

            </div>
        <?php } ?>
    </div>

</div>




@endsection