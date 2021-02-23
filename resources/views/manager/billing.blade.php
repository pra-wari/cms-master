<!-- @extends('manager.layouts.backend') -->
@section('title', 'Billing')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light header">
        <div class="content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Billing</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="/{{session()->get('client-slug')}}/manager/billing">Billing</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
   
    <div class="content">
        <div class="content-full">
            <div class="row">
                <div class="col-sm-8 block block-rounded content-full">
                    <!-- <div class="block-title">Bar Billing - Counter 1
                        <div style="float:right;margin-left:5px;"><input type="date" class="form-control"></div><div style="float:right;">Day Opened</div>
                    </div><br> -->
                    
                    <div class="table-bordered table-striped table-vcenter content-full">
                        <div class="row">
                        <div class="col-sm-4">
                                Member No<input type="text" name="member_id" value="{{$member[0]->id}}" class="form-control" readonly>
                                Orders<input type="text" name="order" value="{{$orders[0]->order_no}}" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4">
                                Name <input type="text" name="member_name" value="{{$member[0]->name}}" class="form-control" readonly>
                                
                            </div>
                            <div class="col-sm-4">
                                <!-- Bill No <input type="text" name="order" value="25674" class="form-control" readonly> -->
                                Waiter <input type="text" name="waiter" value="{{$waiter[0]->name}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div role="separator" class="divider-hor"></div>
                        <!-- <div class="row">
                            <div class="col-sm-2">
                                Item No
                            </div>
                            <div class="col-sm-3">
                                <select name="itemno" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="555">555</option>
                                    <option value="BLW23">BLW23</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div><br> -->
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">SI No</th>
                                    <th class="text-center">Item No</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price (Rs.)</th>
                                    <th class="text-center">Total Value (Rs.)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">{{$count++}}</td>
                                    <td class="text-center">{{$order->id}}</td>
                                    <td class="text-center">{{$order->product_name}}</td>
                                    <td class="text-center qty">{{$order->product_qty}}</td>
                                    <td class="text-center">{{$order->product_price}}</td>
                                    <td class="text-center price">{{$order->total_price}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-right" colspan="3">Grand Total</td>
                                    <td class="text-center total">120.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    
                    {{--<div class="table-bordered table-striped table-vcenter content-full">
                        <div class="row">
                            <div class="col-sm-4">
                                Member No <input type="text" name="member_id" value="{{$member[0]->id}}" class="form-control" readonly>
                                Orders <input type="text" name="order" value="{{$orders[0]->order_no}}" class="form-control" readonly>
                            </div>
                            <div class="col-sm-4">
                                Name <input type="text" name="member_name" value="{{$member[0]->name}}" class="form-control" readonly>
                                
                            </div>
                            <div class="col-sm-4">
                                <!-- Bill No <input type="text" name="order" value="25674" class="form-control" readonly> -->
                                Waiter <input type="text" name="waiter" value="{{$waiter[0]->name}}" class="form-control" readonly>
                            </div>
                        </div>
                        <div role="separator" class="divider-hor"></div>
                        <!-- <div class="row">
                            <div class="col-sm-2">
                                Item No
                            </div>
                            <div class="col-sm-3">
                                <select name="itemno" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="555">555</option>
                                    <option value="BLW23">BLW23</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </div><br> -->
                        <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center">SI No</th>
                                    <th class="text-center">Item No</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price (Rs.)</th>
                                    <th class="text-center">Total Value (Rs.)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td class="text-center">{{$count++}}</td>
                                    <td class="text-center">{{$order->id}}</td>
                                    <td class="text-center">{{$order->product_name}}</td>
                                    <td class="text-center qty">{{$order->product_qty}}</td>
                                    <td class="text-center">{{$order->product_price}}</td>
                                    <td class="text-center price">{{$order->total_price}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="text-center"></td>
                                    <td class="text-right" colspan="3">Grand Total</td>
                                    <td class="text-center total">120.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>--}} 
                    <div class="content-full btn-spacing text-center">
                        <!-- <button class="btn btn-primary">Update Payment</button>
                    
                        <button class="btn btn-primary">Hold Bill</button>
                    
                        <button class="btn btn-primary">Release Bill</button>
                    
                        <button class="btn btn-primary">Reprint Bill</button>
                    
                        <button class="btn btn-primary">Cancel Bill</button> -->
                    </div>
                </div>
                <div class="col-sm-4 block block-rounded content-full">
                    <table class="table table-bordered table-striped table-vcenter">
                        <tr>
                            <th colspan="2" style="text-align:center;">Bill Summary</th>
                        </tr>
                        <tr>
                            <td>Total Pcs</td>
                            <td class="pcs">1</td>
                        </tr>
                        <tr>
                            <td>Gross Amount</td>
                            <td class="gross">Rs. 120.00</td>
                        </tr>
                        <tr>
                            <td>Bill Discount</td>
                            <td>Rs. 00.00</td>
                        </tr>
                        <tr>
                            <td>Sub Total</td>
                            <td class="sub">Rs. 120.00</td>
                        </tr>
                        <tr>
                            <td>Service Charges</td>
                            <td>Rs. 00.00</td>
                        </tr>
                        <tr>
                            <td>Net Amount</td>
                            <td class="net">Rs. 120.00</td>
                        </tr>
                    </table>
                        <div class="row">
                            <div class="col-sm-6 text-center">
                                <button class="btn btn-success print">SAVE & PRINT</button>
                            </div>
                            <div class="col-sm-6 text-center">
                                <button class="btn btn-danger exit" style="padding-left:30px; padding-right:30px;">Exit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- END Page Content -->
    <script type="text/javascript">
        $(document).ready(function(){
            var total=0;
            var qty=0;
            $(".price").each(function(){
                var price=$(this).text();
                price=price.replace(/[_\W]+/g, "");
                var total_price=parseInt(price);
                total+=total_price;
            });
            $(".total").text(total);
            $(".gross").text("Rs "+total);
            $(".sub").text("Rs "+total);
            $(".net").text("Rs "+total);

            $(".qty").each(function(){
                var quantity=$(this).text();
                quantity=parseInt(quantity);
                qty+=quantity;
            });
            $(".pcs").text(qty);

            $(".print").click(function(){
                $(this).hide();
                $(".exit").hide();
                $(".header").hide();
                window.print();
                $(this).show();
                $(".exit").show();
                $(".header").show();
            });
        });

    </script>
@endsection

