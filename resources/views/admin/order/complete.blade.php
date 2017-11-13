@extends('admin.master')

@section('title')
Order Confirmation
@endsection

@section('content')

<style type="text/css">
   .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }    
</style>
<?php $vat = DB::table('comsetting')->select('vat')->first(); 
$vat = $vat->vat; 
$subTot = $allValue->orderTotal;
$vatAmount = ($subTot*$vat)/100;
$ship = $allValue->trCost;
$total = ($subTot+$vatAmount+$ship);
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
                <div class="actions">

                    <div class="btn-group btn-group-devided">
                        <a href="{{url('/pdf/' . $allValue->orderID)}}" class="btn green btn-success btn-circle btn-sm" onclick="return confirm('Are you sure to Download Memo');" >
                            <span>PDF Memo</span>
                        </a>
                        @if($allValue->orderStatus != 'Completed')
                        <a href="{{url('/completed/' . $allValue->orderID)}}" class="btn btn-danger btn-circle btn-sm" onclick="return confirm('Are you sure to Confirm Order');">
                            <span> Confirm Order </span>
                        </a>
                        @endif  
                    </div>

                </div>
            </div>


            <div class="invoice-box" style="margin-bottom: 10px;">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img src="{{asset('/public/admin/upload/logo/bgLogo.jpg')}}" style="width:100%; max-width:300px;">
                                </td>
                                
                                <td>
                                    Order #:00{{$allValue->orderID}}<br>
                                    Order Date: {{$allValue->orderDate}}<br>
                                    Due Date: {{$allValue->deliveryDate}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                
                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    {{$com->name}}
                                    <?php echo $com->addr; ?>
                                    {{$com->phone}}</br>
                                    {{$com->email}}
                                </td>
                                
                                <td>
                                Customer: {{$allValue->fname}} {{$allValue->lname}}<br>
                                Phone: {{$allValue->phone}}<br>
                                Email: {{$allValue->email}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>




<div class="row">
<div class="col-md-12 col-sm-12">
         <div class="portlet-body">
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th> Product </th>

                    <th> Price </th>
                    <th> Quantity </th>
                    <th> Total </th>
                </tr>
            </thead>
            <tbody>
            @foreach($orderProduct as $value)
                <tr>
                    <td>
                        <a>{{$value->productName}}</a>
                    </td>
                    <td>TK. {{number_format($value->productPrice,2)}}</td>
                    <td>{{$value->productQuantity}}</td>
                    <td>TK. {{number_format(($value->productPrice*$value->productQuantity),2) }}</td>
                </tr>
            @endforeach    
            </tbody>
        </table>
    </div>


</div>
</div>
</div>


    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Sub Total: </div>
                    <div class="col-md-3 value">TK. {{number_format($subTot,2)}}</div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Shipping: </div>
                    <div class="col-md-3 value">{{number_format($ship,2)}}</div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Vat %: </div>
                    <div class="col-md-3 value">{{$vat}}%  ({{$vatAmount}})tk</div>
                </div>
                <div class="row static-info align-reverse">
                    <div class="col-md-8 name"> Grand Total: </div>
                    <div class="col-md-3 value">TK. {{number_format($total,2)}}</div>
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