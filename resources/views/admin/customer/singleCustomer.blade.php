@extends('admin.master')

@section('title')
Single Customer
@endsection

@section('content')

<!-- BEGIN CONTENT -->
	<div class="pages-content">
	    <!-- BEGIN PAGE HEADER-->

	    <!-- BEGIN PAGE TITLE-->
	    <h1 class="page-title"> Customer Profile</h1>
	    <!-- END PAGE TITLE-->
	    <!-- END PAGE HEADER-->
	    <div class="profile">
	        <div class="tabbable-line tabbable-full-width">
	            <div class="tab-content">
	                <div class="tab-pane active" id="tab_1_1">
	                    <div class="row">
	                        <div class="col-md-12">
	                            <div class="row">
	                                <div class="col-md-8 profile-info">
	                                    <h4 class="font-green sbold uppercase">{{$customerVal->fname}} {{$customerVal->lname}}</h4>
	                                    <p>{{$customerVal->addr1}}</p>OR
	                                    <p>{{$customerVal->addr2}}</p>
	                                    <ul class="list-inline">
	                                        <li>
	                                            <i class="fa fa-map-marker"></i> {{$customerVal->country}} </li>
	                                        
	                                        <li>
	                                            <i class="fa fa-building"></i>{{$customerVal->city}}</li>
	                                        <li>

	                                            <i class="fa fa-calendar"></i>{{$customerVal->created_at}}</li>    
	                                        <li>
	                                            <i class="fa fa-briefcase"></i>{{$customerVal->email}}</li>
	                                        <li>
	                                            <i class="fa fa-phone"></i>{{$customerVal->phone}}</li>
	                                        
	                                    </ul>
	                                </div>
	                                <!--end col-md-8-->
	                            </div>
	                            <!--end row-->
	                            <div class="tabbable-line tabbable-custom-profile">
	                                <div class="tab-content">
	                                    <div class="tab-pane active" id="tab_1_11">
	                                        <div class="portlet-body">
	                                            <table class="table table-striped table-bordered table-advance table-hover">
	                                                <thead>
	                                                    <tr>
	                                                        <th>
	                                                            <i class="fa fa-briefcase"></i> Order ID </th>
	                                                        <th class="hidden-xs">
	                                                            <i class="fa fa-question"></i> Order Date </th>
	                                                        <th>
	                                                            <i class="fa fa-bookmark"></i> Delivery Date </th>
	                                                        <th>
	                                                        	<i class="fa fa-bookmark"></i> Amount</th>
	                                                        <th>
	                                                        	<i class="fa fa-bookmark"></i> Action</th>	
	                                                    </tr>
	                                                </thead>
	                                                <tbody>
	                                                @foreach($orderVal as $value)
	                                                    <tr>
	                                                        <td>
	                                                            <a href="javascript:;">#00{{$value->id}}</a>
	                                                        </td>
	                                                        <td class="hidden-xs">{{$value->orderDate}} </td>
	                                                        <td> {{$value->deliveryDate}}</td>
	                                                        <td>TK. {{$value->orderTotal}}
	                                                           <span class="label label-success label-sm">{{$value->orderStatus }}</span>
	                                                        </td>
	                                                        <td>
	                                                            <a class="btn btn-sm grey-salsa btn-outline" href="{{ url('/singleOrder/'.$value->id) }}"> View </a>
	                                                        </td>
	                                                    </tr>
	              									@endforeach
	                                                </tbody>
	                                            </table>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	                <!--end tab-pane-->
	            </div>
	        </div>
	    </div>
  
	</div>
<!-- END CONTENT -->
@endsection