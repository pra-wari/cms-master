@extends('manager.layouts.backend')
@section('title', 'Order-Info')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <!-- <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <button class="btn btn-secondary">In Progress</button>
                    <button class="btn btn-secondary" >Completed</button>
                    <button class="btn btn-secondary" >Cancelled</button>
                    <button class="btn btn-secondary" >Choose Filters</button>
                </nav> -->
                <div class="flex-sm-00-auto col-sm-6" aria-label="breadcrumb">
                    <div class="row">
                        <div class="col-sm-6">
                            <input type="search" name="search" placeholder="Enter order number to search" class="form-control search">
                        </div>
                        <div class="col-sm-6" aria-label="breadcrumb">
                            <input type="button" class="btn btn-primary" id="search" value="Search">
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm-6 text-right">
                    <a href="/{{session()->get('client-slug')}}/manager/billing/{{request()->orderid}}" class="btn btn-primary">Final Bill</a>
                </div>

            </div>
       </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="content-full" style="margin-right:-400px">
        @foreach($orders as $order)
                <div class="col-sm-3 kot" id = "kot_{{$order[0]->order_no}}" style="float:left;margin:10px;">
                    <div class="row bg-white" style="height: 439px;overflow-y: scroll;overflow-x: hidden;">
                       @if(isset($order)) 
                        <div class="col-sm-12 red-bg p-2">
                            Order no. #{{$order[0]->order_no}}
                        </div>
                        <div class="col-sm-12 p-2">
                            <h6>Dishes <hr></h6>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Name</strong>
                                </div>
                                <div class="col-sm-4">
                                    <strong>Quantity</strong>
                                </div>
                                <div class="col-sm-4">
                                    <strong>Price</strong>
                                </div>
                                <hr>
                                @foreach($order as $dishes)
                                    @if($dishes->product_type=="Dishes")
                                        <div class="col-sm-4">
                                            {{$dishes->product_name}}
                                        </div>
                                        <div class="col-sm-4">
                                            {{$dishes->product_qty}}
                                        </div>
                                        <div class="col-sm-4 price">
                                            {{$dishes->total_price}}
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-12 p-2">
                            <h6><hr>Drinks <hr></h6>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Name</strong>
                                </div>
                                <div class="col-sm-4">
                                    <strong>Quantity</strong>
                                </div>
                                <div class="col-sm-4">
                                    <strong>Price</strong>
                                </div>
                                <hr>
                                @foreach($order as $drinks)
                                    @if($drinks->product_type=="Drinks")
                                        <div class="col-sm-4">
                                            {{$drinks->product_name}}
                                        </div>
                                        <div class="col-sm-4">
                                            {{$drinks->product_qty}}
                                        </div>
                                        <div class="col-sm-4 price">
                                            {{$drinks->total_price}}
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-8 text-center">
                            <br>
                            <button class="btn btn-success print" value="{{$order[0]->order_no}}">SAVE & PRINT</button>
                        </div>
                        <div class="col-sm-4 p-2">
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <strong>Total: </strong>
                                    <span>{{$order[0]->total}}</span>
                                </div>
                            </div>
                            
                        </div>
                        @elseif(isset($result))
                        <div class="col-sm-12 red-bg p-2">
                            {{$result}}
                        </div>
                        @endif
                    </div>
                </div>
           
        @endforeach
        {{--
            <div class="row"> 
                <div class="col-sm-8 mx-auto content-full">
                    <div class="row bg-white">
                       @if(isset($orders)) 
                        <div class="col-sm-12 red-bg p-2">
                            Order no. #{{request()->orderid}}
                        </div>
                        <div class="col-sm-12 p-2">
                            <h6>Dishes <hr></h6>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Name</strong>
                                </div>
                                <div class="col-sm-4">
                                    <strong>Quantity</strong>
                                </div>
                                <div class="col-sm-4">
                                    <strong>Price</strong>
                                </div>
                                <hr>
                                @foreach($orders as $dishes)
                                    @if($dishes->product_type=="Dishes")
                                        <div class="col-sm-4">
                                            {{$dishes->product_name}}
                                        </div>
                                        <div class="col-sm-4">
                                            {{$dishes->product_qty}}
                                        </div>
                                        <div class="col-sm-4 price">
                                            {{$dishes->total_price}}
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-12 p-2">
                            <h6><hr>Drinks <hr></h6>
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Name</strong>
                                </div>
                                <div class="col-sm-4">
                                    <strong>Quantity</strong>
                                </div>
                                <div class="col-sm-4">
                                    <strong>Price</strong>
                                </div>
                                <hr>
                                @foreach($orders as $drinks)
                                    @if($drinks->product_type=="Drinks")
                                        <div class="col-sm-4">
                                            {{$drinks->product_name}}
                                        </div>
                                        <div class="col-sm-4">
                                            {{$drinks->product_qty}}
                                        </div>
                                        <div class="col-sm-4 price">
                                            {{$drinks->total_price}}
                                        </div>
                                        <hr>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <hr>
                        <div class="col-sm-8">
                            
                        </div>
                        <div class="col-sm-4 p-2">
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <strong>Total: </strong>
                                    <span class="total"></span>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="/{{session()->get('client-slug')}}/manager/billing/{{request()->orderid}}" class="btn btn-primary">Final Bill</a>
                                </div>
                            </div>
                        </div>
                        @elseif(isset($result))
                        <div class="col-sm-12 red-bg p-2">
                            {{$result}}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        --}}   
        </div>
    </div>
    <!-- END Page Content -->
    <script type="text/javascript">
        $(document).ready(function(){
            // function calc(x){
            //    $(this).each(function(){
            //     alert("skldfj");
            //    });
            // }
            // var total=0;
            // $(".price").each(function(){
            //     var price=$(this).text();
            //     price=price.replace(/[_\W]+/g, "");
            //     var total_price=parseInt(price);
            //     total+=total_price;
            // });
            // $(".total").text("₹ "+total);

            $("#search").click(function(){
                window.location.href="/{{session()->get('client-slug')}}/manager/order-info/"+$(".search").val();
            });

            $(".print").click(function(){
                var x = $(this).val();

                $(this).hide();
                $(".bg-body-light").hide();
                $(".exit").hide();
                $(".header").hide();
                $(".kot").hide();
                $("#kot_"+x).show();
                
                window.print();
                $(this).show();
                $(".exit").show();
                $(".header").show();
                $(".kot").show();
                $(".bg-body-light").show();

            });
        });
    </script>
@endsection
