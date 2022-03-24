<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript">	
 		
        window.print();
     setTimeout(function(){
       window.close()
     },750)
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DalandanStore</title>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">DALANDAN Store</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">Nasugbu</p>
                        <p class="text-white">Batangas</p>
                        <p class="text-white">09876543218</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="heading">Invoice No.: {{$inv->invoice_no}}</h2>
                    <p class="sub-heading">Tracking No. dalandanstore2022 </p>
                    <p class="sub-heading">Order Date: {{$inv->created_at}} </p>
                    <p class="sub-heading">Email Address: dalandanstore@gmail.com </p>
                </div>
                <div class="col-6">
                    <p class="sub-heading float-right">Cashier:  {{$inv->from}}</p>
                </div>
            </div>
        </div>

        <div class="body-section">
            <h3 class="heading">Receipt</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Grandtotal</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                        {{-- 'invoice_no', 'from', 'to', 'invoice_type', 'total_amount', 'amount_paid', 'amount_due', 'status' --}}
                    @foreach($specitem as $specitems)
                        @foreach($cart as $carts)
                        @if($carts->item_id==$specitems->id)
                        <tr>
                            <td>{{$carts->item_id}}</td>
                           
                            <td>{{$specitems->name}}</td>
                           
                            <td>{{$carts->quantity}}</td>
                            <td>{{$specitems->retail_price + $specitems->vat}}</td>
                            @endif
                            
                        </tr>
                        @endforeach
                    @endforeach
                    <tr>
                        <td colspan="3" class="text-right">Payment</td>
                        <td> {{$inv->amount_paid}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Grand Total</td>
                        <td> {{$inv->total_amount}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Change</td>
                        <td> {{$inv->amount_paid-$inv->total_amount}}</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Note: {{$inv->status}}</h3>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash</h3>
        </div>

        <div class="body-section">
            <p>&copy; Copyright 2022 - Dalandan Store. All rights reserved. 
              
            </p>
        </div>      
    </div>      

</body>
</html>