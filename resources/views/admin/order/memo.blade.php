<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PDF HeronZ</title>
    <style type="text/css">
@font-face {
  font-family: SourceSansPro;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 100%;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #0087C3;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #57B223;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background: #57B223;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color: #57B223;
  font-size: 1.4em;
  border-top: 1px solid #57B223; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 2em;
  margin-bottom: 50px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #0087C3;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}
<?php $terms = DB::table('comsetting')->select('terms')->first(); 
$vat = DB::table('comsetting')->select('vat')->first(); 
$vat = $vat->vat; 
$subTot = $allValue->orderTotal;
$vatAmount = ($subTot*$vat)/100;
$ship = $allValue->trCost;
$total = ($subTot+$vatAmount+$ship);
?>
    	
    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{url('/public/admin/upload/logo/bgLogo.jpg')}}">
      </div>
      <div style="float: right;">
        <h2 class="name">{{$com->name}}</h2>
        <div><?php echo $com->addr; ?></div>
        <div>{{$com->phone}}</div>
        <div><a href="mailto:company@example.com">{{$com->email}}</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">INVOICE TO:</div>
          <h2 class="name">{{$allValue->fname}} {{$allValue->lname}}</h2>
          <div class="address">{{$allValue->phone}}</div>
          <div class="email"><a href="mailto:{{$allValue->email}}">{{$allValue->email}}</a></div>
        </div>

        <div style="float: right;" >
          <h3>Order #:00{{$allValue->orderID}}</h3>
          <div class="date">Date of Invoice: {{$allValue->orderDate}}</div>
          <div class="date">Due Date: {{$allValue->deliveryDate}}</div>
        </div>

      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">PRODUCT NAME</th>
            <th class="unit">UNIT PRICE</th>
            <th class="qty">QUANTITY</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
        @foreach($orderProduct as $value)
          <tr>
            <td class="no">01</td>
            <td class="desc"><h3>{{$value->productName}}</h3></td>
            <td class="unit">TK. {{number_format($value->productPrice,2)}}</td>
            <td class="qty">{{$value->productQuantity}}</td>
            <td class="total">TK. {{number_format(($value->productPrice*$value->productQuantity),2) }}</td>
          </tr>
        @endforeach  
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SUBTOTAL</td>
            <td>TK. {{number_format($subTot,2)}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">SHIPPING</td>
            <td>{{number_format($ship,2)}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">VAT %</td>
            <td>{{$vat}}%  ({{$vatAmount}})tk</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">GRAND TOTAL</td>
            <td>TK. {{number_format($total,2)}}</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">Thank you!</div>
    </main>
    <footer>
      <?php echo $terms->terms; ?>.
    </footer>
  </body>
</html>