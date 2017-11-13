@extends('admin.master')

@section('title')
Single Order
@endsection

@section('content')
<?php $vat = DB::table('comsetting')->select('vat')->first(); 
$vatAmount = (($allValue->orderTotal*$vat->vat)/100);
$total = ($allValue->orderTotal+$vatAmount);
?>

<div class="row">
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light portlet-fit portlet-datatable bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-dark"></i>
                    <span class="caption-subject font-dark sbold uppercase"> Order #00{{$allValue->orderID}}
                        <span class="hidden-xs">| {{$allValue->orderDate}} </span>
                    </span>
                </div>
                
            </div>
            <div class="portlet-body">
                <div class="tabbable-line">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1">
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet yellow-crusta box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Order Details </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> Order #: </div>
                                                <div class="col-md-7 value"> #00{{$allValue->orderID}}   
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> Order Date: </div>
                                                <div class="col-md-7 value">{{$allValue->orderDate}} </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name">Delivery Date: </div>
                                                <div class="col-md-7 value">{{$allValue->deliveryDate}} </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> Order Status: </div>
                                                <div class="col-md-7 value">
                                                    <span class="label label-success">{{$allValue->orderStatus}}</span>
                                                </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> Grand Total: </div>
                                                <div class="col-md-7 value"> TK. {{number_format($allValue->orderTotal,2)}}</div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> Payment Information: </div>
                                                <div class="col-md-7 value">Cash In Hand </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet blue-hoki box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Customer Information </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> Customer Name: </div>
                                                <div class="col-md-7 value">{{$allValue->fname}}  {{$allValue->lname}}  </div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> Email: </div>
                                                <div class="col-md-7 value">{{$allValue->cusEmail}}</div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> State: </div>
                                                <div class="col-md-7 value">{{$allValue->cusCity}}</div>
                                            </div>
                                            <div class="row static-info">
                                                <div class="col-md-5 name"> Phone Number: </div>
                                                <div class="col-md-7 value"> {{$allValue->cusPhone}} </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet green-meadow box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Billing Address </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-12 value">{{$allValue->fname}} {{$allValue->lname}}
                                                    <br>{{$allValue->cusAddr1}}
                                                    <br>OR
                                                    <br> {{$allValue->cusAddr2}}
                                                    <br> {{$allValue->cusEmail}}
                                                    <br> {{$allValue->cusPhone}}
                                                    <br> {{$allValue->cusCity}}
                                                    <br> {{$allValue->country}}
                                                    <br> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="portlet red-sunglo box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Shipping Address </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row static-info">
                                                <div class="col-md-12 value"> {{$allValue->fname}} {{$allValue->lname}}
                                                    <br> {{$allValue->addr1}}
                                                    <br>OR
                                                    <br> {{$allValue->addr2}}
                                                    <br> {{$allValue->email}}
                                                    <br> {{$allValue->phone}}
                                                    <br> {{$allValue->city}}
                                                    <br> {{$allValue->country}}
                                                    <br> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="portlet grey-cascade box">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-cogs"></i>Shopping Cart </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th> Product </th>
                                                            <th> Size </th>
                                                            <th> Color </th>
                                                            <th> Price </th>
                                                            <th> Quantity </th>
                                                            <th> Total </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($orderProduct as $value)
                                                        <tr>
                                                            <td>
                                                                <a href="javascript:;">{{$value->productName}}</a>
                                                            </td>
                                                            <td>{{$value->productSize}}</td>
                                                            <td>{{$value->productColor}}</td>   
                                                            <td>TK. {{$value->productPrice}}</td>
                                                            <td>{{$value->productQuantity}}</td>
                                                            <td>TK. {{(number_format($value->productPrice*$value->productQuantity,2)) }}</td>
                                                        </tr>    
                                                    @endforeach    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6"> </div>
                                {!! Form::open(['url' => '/acceptOrder','method' => 'POST', 'class' => 'login-form','enctype'=>'multipart/form-data','name'=>'editProductForm']) !!}
                                <div class="col-md-6">
                                    <div class="well">
                                        <div class="row static-info align-reverse">
                                            <div class="col-md-8 name"> Sub Total: </div>
                                            <div class="col-md-3 value">TK. {{number_format($allValue->orderTotal,2)}}</div>
                                        </div>
                                        <div class="row static-info align-reverse">
                                            <div class="col-md-8 name"> Shipping: </div>
                                            <div class="col-md-3 value">
                                                <div class="form-group">
                                                @if($allValue->trCost == 0)    
                                                    {{ Form::number('trCost',0, array_merge(['class' => 'form-control','onkeyup'=>'getSum(this.value)'])) }}
                                                    <span class="text-danger">{{ $errors->has('trCost') ? $errors->first('trCost') : '' }}</span>
                                                    {{ Form::hidden('orderId',$allValue->orderID, array_merge(['class' => 'form-control'])) }}
                                                @else
                                                    {{ Form::number('trCost',$allValue->trCost, array_merge(['class' => 'form-control','readonly'])) }}
                                                   <?php $total += $allValue->trCost ?>
                                                @endif       
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row static-info align-reverse">
                                            <div class="col-md-8 name"> Vat: </div>
                                            <div class="col-md-3 value">{{$vat->vat}} % ({{$vatAmount}}tk)</div>
                                        </div>
                                        <div class="row static-info align-reverse">
                                            <div class="col-md-8 name"> Total Due: </div>
                                            <div class="col-md-3 value">TK. <span id="totVal">{{number_format($total,2)}}</span></div>
                                        </div>
                                    </div>

                                    <div class="actions pull-right">
                                    <div class="btn-group btn-group-devided">
                                    @if($allValue->orderStatus == 'Delivery')
                                        <a href="{{url('/pdf/' . $allValue->orderID)}}" class="btn green btn-success btn-circle btn-sm" onclick="return confirm('Are you sure to Download Memo');" >
                                                <span>PDF Memo</span>
                                        </a>
                                    @elseif($allValue->orderStatus == 'Completed')
                                        
                                    @else
                                        <button type="submit" class="btn green btn-success btn-circle btn-sm" onclick="return confirm('Are you sure to Accept Order');">
                                        <span>Accept</span>
                                        </button>
                                    @endif


                                    @if($allValue->orderStatus == 'Completed')
                                        
                                    @elseif($allValue->orderStatus == 'Canceled')
                                        
                                    @else 
                                            <a href="{{url('/cancelOrder/' . $allValue->orderID)}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to Cancel Order');">
                                                <span> Cancel </span>
                                            </a>
                                    @endif    
                                        </div>

                                </div>    
                                {!! Form::close() !!}    
    



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
</div>

@endsection

@section('pjs')
<script type="text/javascript">
    function getSum(a){
        var subTot = parseInt(<?php echo $total; ?>);
        var gTotal = parseInt(Number(subTot)+Number(a));
        document.getElementById("totVal").innerHTML="";
        document.getElementById("totVal").innerHTML= gTotal;
    }
</script>

@endsection