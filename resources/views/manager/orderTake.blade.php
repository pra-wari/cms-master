@extends('manager.layouts.backend')
@section('title', 'Order-Take')
@section('content')
<style>
.sidebar-full{
    width: 100%;
}
.sidebar{
    width:150px;
    height: 100%;
    position: absolute;
}
.sidebar a{
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    display: block;
}
.sidebar a:hover{
    background-color:gray;
}
.sidebar-content{
    margin-left: 170px;
    height: 100%;
    padding: 0px 10px;
}
.side-style a{
    margin-left:3px;
    padding: 16px 18px 16px 16px;
    text-decoration: none;
    font-size: 20px;
    display: block;
    border-right: 1px solid #F5F5F5;
    border-bottom: 1px solid #F5F5F5;
    color: black;
}
.side-style a:hover{
    background-color:#F5F5F5;
    color: black;
}
.side-style .active{
    background-color:#F5F5F5;
    color: black;
}

.square {
  width: 220px;
  height: 125px;
  position: relative;
  background-color: #F5F5F5;
  border-bottom: 5px solid gray;
  margin-right: 10px;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}
/*
.square:after {
  content: "";
  display: block;
  padding-bottom: 100%;
}*/
.square:hover {
  background-color: white;
  border-top: 1px solid #F5F5F5;
  border-right: 1px solid #F5F5F5;
  border-left: 1px solid #F5F5F5;
}
.square2 {
  width: 170px;
  height: 125px;
  position: relative;
  background-color: #F5F5F5;
  border-bottom: 5px solid #20B2AA;
  margin-right: 10px;
  margin-bottom: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.square2:hover {
  background-color: white;
  border-top: 1px solid #F5F5F5;
  border-right: 1px solid #F5F5F5;
  border-left: 1px solid #F5F5F5;
}
.tableshow{
  
}
.button_top{
    background-color:#F0F0F0;
    border: none;
    padding: 15px;
    font-size:18px;
    outline: none !important;
}
.button_top:hover{
    background-color:#C8C8C8;
}
.btns .active{
    background-color:white;
}
.btns{
    background-color: #F0F0F0;
}
.per60{
    width: 59%;
    height: 100%;
    position: absolute;
}
.per40{
    border-left: 2px solid #20B2AA;
    margin-left: 61%;
    height: 100%;
}
#client_pub_section{
    width: 15%;
}
#item_search{
    display:none;
}
.drinks, .dishes, .take_away, .delivery, .tableshow, .free, .occupied, .unpaid
{
    display: none;
}
th{
      border-top: 0 !important;
      border-bottom: 2px solid grey !important;
  }
@media screen and (max-width: 650px) {
  .square {
      width: 170px;
    }
  #client_pub_section{
      width: 200px;
    }
  .square2 {
      width: 170px;
    }
  .per60{
      display:none;
  }
  .per40{
      border-left: none;
      margin-left: 0;
      width: 100%;
  }
  #item_search{
    display:block;
  }
}
</style>

    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">Order Take</h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">App</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="/{{session()->get('client-slug')}}/manager/order-take">Order Take</a>
                        </li>
                    </ol>
                </nav>
            </div>
       </div>
    </div>
    <!-- END Hero -->
    <div class="content-full2">
        <div class="block">
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                
                <div class="current">
                    <div class="per60">
                        <div class="form-group content-full">
                            <input type="search" name="search" class="form-control" placeholder="Search items">
                        </div>
                        <div class="sidebar side-style">
                            <a id="allc" style="cursor: pointer;">All</a>
                            <a id="drinks" style="cursor: pointer;">Drinks</a>
                            <a id="dishes" style="cursor: pointer;">Dishes</a>
                        </div>
                        <div class="sidebar-content">
                            <div class="allc">
                                <div class="row">
                                    <div class="square2" name="Dishes" style="cursor: pointer;">
                                        Burger <br>
                                        &#8377; 100
                                    </div>
                                    <div class="square2" name="Dishes" style="cursor: pointer;">
                                        Snack <br>
                                        &#8377; 75
                                    </div>
                                </div>
                            </div>
                            <div class="drinks">
                                <div class="row">
                                    <div class="square2" name="Drinks" style="cursor: pointer;">
                                        Beer <br>
                                        &#8377; 250
                                    </div>
                                    <div class="square2" name="Drinks" style="cursor: pointer;">
                                        Vodka <br>
                                        &#8377; 350
                                    </div>
                                    <div class="square2" name="Drinks" style="cursor: pointer;">
                                        Coco-Cola <br>
                                        &#8377; 50
                                    </div>
                                    <div class="square2" name="Drinks" style="cursor: pointer;">
                                        Brandy <br>
                                        &#8377; 700
                                    </div>
                                    <div class="square2" name="Drinks" style="cursor: pointer;">
                                        Wishky <br>
                                        &#8377; 550
                                    </div>
                                    <div class="square2" name="Drinks" style="cursor: pointer;">
                                        Wine <br>
                                        &#8377; 450
                                    </div>
                                </div>
                            </div>
                            <div class="dishes">
                                <div class="row">
                                    <div class="square2" name="Dishes" style="cursor: pointer;">
                                        Chicken Tikka <br>
                                        &#8377; 250
                                    </div>
                                    <div class="square2" name="Dishes" style="cursor: pointer;">
                                        Panner Tikka <br>
                                        &#8377; 200
                                    </div>
                                    <div class="square2" name="Dishes" style="cursor: pointer;">
                                        Chinese Soup <br>
                                        &#8377; 100
                                    </div>
                                    <div class="square2" name="Dishes" style="cursor: pointer;">
                                        Chicken Soup <br>
                                        &#8377; 150
                                    </div>
                                    <div class="square2" name="Dishes" style="cursor: pointer;">
                                        Manchow Soup <br>
                                        &#8377; 120
                                    </div>
                                    <div class="square2" name="Dishes" style="cursor: pointer;">
                                        Pizza <br>
                                        &#8377; 250
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="per40">
                        <div class="content-full">
                            <div class="block">
                                <div class="block-content" style="background-color:#F0F0F0">
                                    <div class="block-title">
                                        <!-- <h5>Table 1 | <a href="" data-toggle="modal" data-target="#add-member">Add Customer</a> -->
                                        <button id="clear" style="float:right; border: none; outline: none !important;">Clear</button>
                                        </h5>
                                    </div>
                                    <div class="form-group content-full">
                                        <input type="search" name="search" id="item_search" class="form-control" placeholder="Search items">
                                    </div>
                                    <div class="block-content">
                                        <table class="table" id="kot_mini">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($orders))
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>
                                                            <span class="product_name"> {{$order->product_name}}</span>
                                                        </td>
                                                        <td>
                                                            <i class="fas fa-minus-circle minus" id="{{$order->id}}" style="cursor: pointer;"></i> &nbsp;
                                                            <span class="product_qty" id="qty_{{$order->id}}"> {{$order->product_qty}} </span>
                                                            &nbsp; <i class="fas fa-plus-circle plus" id="{{$order->id}}" style="cursor: pointer;"></i>
                                                        </td>
                                                        <td> <span class="product_price" id="price_{{$order->id}}">{{$order->total_price}}</span>
                                                            <span class="total_price"  id="base_price_{{$order->id}}" style="display: none;">{{$order->product_price}}</span></td>
                                                        <td>
                                                            <!-- <i class="fas fa-highlighter"></i>  &nbsp;  &nbsp;  &nbsp;  -->
                                                            <i class="fas fa-trash-alt delete" id="{{$order->id}}" style="cursor: pointer;"></i>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @else
                                                <tr class="hints">
                                                    <td colspan="4" style="font-size:15px;">Add items by selecting from the list. If you want to remove this saved draft, click clear.</td>
                                                </tr> 
                                                @endif   
                                            </tbody>
                                        </table>
                                        <button class="btn btn-primary order-ticket" style="width:49%">Order Ticket</button>
                                        <!-- <button class="btn btn-success total" style="width:49%">Charge &#8377; 0.00</button> -->
                                        <button class="btn btn-success" style="width:49%">Total &#8377; <span class="total">0.00</span></button> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div style="margin-bottom:100px;"></div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- END Page Content -->
   
<script type="text/javascript">
$(document).ready(function(){
    $(".orders").show();
    $("#orders").addClass("active");
    $(".current").show();
    $("#current").removeClass("active");
    $(".allc").show();
    $("#allc").addClass("active");
    $(".drinks").hide();
    $(".dishes").hide();
    $(".all").show();
    $("#all").addClass("active");
    $(".take_away").hide();
    $(".delivery").hide();
    $(".tableshow").hide();
    $(".free").hide();
    $(".occupied").hide();
    $(".unpaid").hide();
    
    

    $("#orders").click(function(){
        $(".orders").show();
        $("#orders").addClass("active");
        $(".current").hide();
        $("#current").removeClass("active");
    });
    $("#current").click(function(){
        $(".orders").hide();
        $("#orders").removeClass("active");
        $(".current").show();
        $("#current").addClass("active");
    });
    $("#allc").click(function(){
        $(".allc").show();
        $("#allc").addClass("active");
        $(".drinks").hide();
        $("#drinks").removeClass("active");
        $(".dishes").hide();
        $("#dishes").removeClass("active");
    })
    $("#drinks").click(function(){
        $(".allc").hide();
        $("#allc").removeClass("active");
        $(".drinks").show();
        $("#drinks").addClass("active");
        $(".dishes").hide();
        $("#dishes").removeClass("active");
    })
    $("#dishes").click(function(){
        $(".allc").hide();
        $("#allc").removeClass("active");
        $(".drinks").hide();
        $("#drinks").removeClass("active");
        $(".dishes").show();
        $("#dishes").addClass("active");
    })
    
    $(".square2").click(function (e){
        e.preventDefault();
        var text = $(this).text();
        // console.log(text);
        var arr = text.split('\n');
        // console.log(arr);
        $(".hints").hide();

        var markup='';
        $.ajax({
            type: "POST",
            url: "{{url('/{slug}/manager/save-order/')}}/{{request()->id}}",
            data: 
            {
                _token:"{{csrf_token()}}",
                table_no:localStorage.getItem('table'),
                product_name:arr[1],
                product_price:arr[2],
                product_type:$(this).attr('name'),
            },
            success: function(data){
                // location.reload();
                for(var i=0;i<=data.length-1;i++)
                {
                    markup+='<tr><td><span class="product_name">'+ data[i]['product_name'] +'</span></td><td><i class="fas fa-minus-circle minus" id="'+data[i]['id']+'" style="cursor:pointer"></i> &nbsp; <span class="product_qty" id="qty_'+data[i]['id']+'">'+data[i]['product_qty']+'</span> &nbsp; <i class="fas fa-plus-circle plus" id="'+data[i]['id']+'" style="cursor:pointer"></i></td><td><span class="product_price" id="price_'+data[i]['id']+'">'+data[i]['total_price']+'</span><span class="total_price" id="base_price_'+data[i]['id']+'" style="display: none;">'+data[i]['product_price']+'</span></td><td><i class="fas fa-trash-alt delete" id="'+data[i]['id']+'" style="cursor:pointer"></i></td></tr>';
                }
                $("#kot_mini tbody").html(markup);
                $(".delete").click(function(){
                     $.ajax({
                        type: "POST",
                        url: "{{url('/{slug}/manager/delete-product/')}}",
                        data: 
                        {
                            _token:"{{csrf_token()}}",
                            id:$(this).attr('id'),
                            table_id:"{{request()->id}}",
                        },
                        success: function(data){
                            if(data=="No data")
                            {
                                $("#kot_mini tbody").html("");
                                $("#kot_mini tbody").append('<tr class="hints"><td colspan="4" style="font-size:15px;">Add items by selecting from the list. If you want to remove this saved draft, click clear.</td></tr>');
                            }
                            else
                            {
                                // for(var i=0;i<=data.length-1;i++)
                                // {
                                //     markup+='<tr><td><span class="product_name">'+ data[i]['product_name'] +'</span></td><td><i class="fas fa-minus-circle" id="'+data[i]['id']+'" style="cursor:pointer"></i> &nbsp; <span class="product_qty">'+ data[i]['product_qty']+'</span> &nbsp; <i class="fas fa-plus-circle" id="'+data[i]['id']+'" style="cursor:pointer"></i></td><td><span class="product_price"> '+ data[i]['product_price']+'</span></td><td><i class="fas fa-trash-alt delete" id="'+data[i]['id']+'" style="cursor:pointer"></i></td></tr>';
                                // }
                                // $("#kot_mini tbody").html(markup);
                                location.reload();
                            }
                            
                        },
                    });
                    
                });
                $(".plus").click(function(){
                    var qty=$("#qty_"+$(this).attr('id')).text();
                    var added_qty=parseInt(qty)+1;
                    var price=$("#base_price_"+$(this).attr('id')).text();
                    price=price.replace(/[_\W]+/g, "");
                    var total_price=parseInt(price)*added_qty;
                    $("#qty_"+$(this).attr('id')).text(added_qty);
                    $("#price_"+$(this).attr('id')).text("₹ "+total_price);
                    $.ajax({
                        type: "POST",
                        url: "{{url('/{slug}/manager/plus-qty/')}}",
                        data: 
                        {
                            _token:"{{csrf_token()}}",
                            id:$(this).attr('id'),
                            qty:added_qty,
                            price:"₹ "+total_price,
                        },
                        success: function(data){
                            var total=0;
                            $(".product_price").each(function(){
                                var price=$(this).text();
                                price=price.replace(/[_\W]+/g, "");
                                var total_price=parseInt(price);
                                total+=total_price;
                            });
                            $(".total").text(total);
                        },
                    });
                });


                $(".minus").click(function(){
                    var qty=$("#qty_"+$(this).attr('id')).text();
                    var added_qty=parseInt(qty)-1;
                    var price=$("#base_price_"+$(this).attr('id')).text();
                    price=price.replace(/[_\W]+/g, "");
                    var total_price=parseInt(price)*added_qty;
                    if(added_qty>=1)
                    {
                        $("#qty_"+$(this).attr('id')).text(added_qty);
                        $("#price_"+$(this).attr('id')).text("₹ "+total_price);
                        $.ajax({
                            type: "POST",
                            url: "{{url('/{slug}/manager/plus-qty/')}}",
                            data: 
                            {
                                _token:"{{csrf_token()}}",
                                id:$(this).attr('id'),
                                qty:added_qty,
                                price:"₹ "+total_price,
                            },
                            success: function(data){
                                var total=0;
                                $(".product_price").each(function(){
                                    var price=$(this).text();
                                    price=price.replace(/[_\W]+/g, "");
                                    var total_price=parseInt(price);
                                    total+=total_price;
                                });
                                $(".total").text(total);
                            },
                        });
                    }
                    
                });
                var total=0;
                $(".product_price").each(function(){
                    var price=$(this).text();
                    price=price.replace(/[_\W]+/g, "");
                    var total_price=parseInt(price);
                    total+=total_price;
                });
                $(".total").text(total);
                // alert(data);
            },
        });
    });
    
    var total=0;
    $(".product_price").each(function(){
        var price=$(this).text();
        price=price.replace(/[_\W]+/g, "");
        var total_price=parseInt(price);
        total+=total_price;
    });
    $(".total").text(total);

    $("#clear").click(function(){
         $.ajax({
            type: "POST",
            url: "{{url('/{slug}/manager/clear-order/')}}",
            data: 
            {
                _token:"{{csrf_token()}}",
                id:"{{request()->id}}",
            },
            success: function(data){
                $("#kot_mini tbody").html("");
                $("#kot_mini tbody").append('<tr class="hints"><td colspan="4" style="font-size:15px;">Add items by selecting from the list. If you want to remove this saved draft, click clear.</td></tr>');
                console.log(data);
            },
        });
        
    });

    $(".delete").click(function(){
        var markup='';
         $.ajax({
            type: "POST",
            url: "{{url('/{slug}/manager/delete-product/')}}",
            data: 
            {
                _token:"{{csrf_token()}}",
                id:$(this).attr('id'),
                table_id:"{{request()->id}}",
            },
            success: function(data){
                if(data=="No data")
                {
                    $("#kot_mini tbody").html("");
                    $("#kot_mini tbody").append('<tr class="hints"><td colspan="4" style="font-size:15px;">Add items by selecting from the list. If you want to remove this saved draft, click clear.</td></tr>');
                }
                else
                {
                    // for(var i=0;i<=data.length-1;i++)
                    // {
                    //     markup+='<tr><td><span class="product_name">'+ data[i]['product_name'] +'</span></td><td><i class="fas fa-minus-circle" id="'+data[i]['id']+'" style="cursor:pointer"></i> &nbsp; <span class="product_qty">'+ data[i]['product_qty']+'</span> &nbsp; <i class="fas fa-plus-circle" id="'+data[i]['id']+'" style="cursor:pointer"></i></td><td><span class="product_price"> '+ data[i]['product_price']+'</span></td><td><i class="fas fa-trash-alt delete" id="'+data[i]['id']+'" style="cursor:pointer"></i></td></tr>';
                    // }
                    // $("#kot_mini tbody").html(markup);
                    location.reload();
                }
                
            },
        });
        
    });

    $(".plus").click(function(){
        var qty=$("#qty_"+$(this).attr('id')).text();
        var added_qty=parseInt(qty)+1;
        var price=$("#base_price_"+$(this).attr('id')).text();
        price=price.replace(/[_\W]+/g, "");
        var total_price=parseInt(price)*added_qty;
        $("#qty_"+$(this).attr('id')).text(added_qty);
        $("#price_"+$(this).attr('id')).text("₹ "+total_price);
        $.ajax({
            type: "POST",
            url: "{{url('/{slug}/manager/plus-qty/')}}",
            data: 
            {
                _token:"{{csrf_token()}}",
                id:$(this).attr('id'),
                qty:added_qty,
                price:"₹ "+total_price,
            },
            success: function(data){
                var total=0;
                $(".product_price").each(function(){
                    var price=$(this).text();
                    price=price.replace(/[_\W]+/g, "");
                    var total_price=parseInt(price);
                    total+=total_price;
                });
                $(".total").text(total);
            },
        });
    });


    $(".minus").click(function(){
        var qty=$("#qty_"+$(this).attr('id')).text();
        var added_qty=parseInt(qty)-1;
        var price=$("#base_price_"+$(this).attr('id')).text();
        price=price.replace(/[_\W]+/g, "");
        var total_price=parseInt(price)*added_qty;
        if(added_qty>=1)
        {
            $("#qty_"+$(this).attr('id')).text(added_qty);
            $("#price_"+$(this).attr('id')).text("₹ "+total_price);
            $.ajax({
                type: "POST",
                url: "{{url('/{slug}/manager/plus-qty/')}}",
                data: 
                {
                    _token:"{{csrf_token()}}",
                    id:$(this).attr('id'),
                    qty:added_qty,
                    price:"₹ "+total_price,
                },
                success: function(data){
                    var total=0;
                $(".product_price").each(function(){
                    var price=$(this).text();
                    price=price.replace(/[_\W]+/g, "");
                    var total_price=parseInt(price);
                    total+=total_price;
                });
                $(".total").text(total);
                },
            });
        }
        
    });


    $(".order-ticket").click(function(){
        $.ajax({
            type: "POST",
            url: "{{url('/{slug}/manager/getorder-ticket/')}}",
            data: 
            {
                _token:"{{csrf_token()}}",
                table_id:"{{request()->id}}",
            },
            success: function(data){
                if(data!="Error")
                {
                    window.location.href="/{{session()->get('client-slug')}}/manager/order-info/"+data;
                }
                else
                {

                }
                console.log(data);
            },
        });
    });

    $("#all").click(function(){
        $(".all").show();
        $("#all").addClass("active");
        $(".take_away").hide();
        $("#take_away").removeClass("active");
        $(".delivery").hide();
        $("#delivery").removeClass("active");
        $(".tableshow").hide();
        $("#tableshow").removeClass("active");
        $(".free").hide();
        $("#free").removeClass("active");
        $(".occupied").hide();
        $("#occupied").removeClass("active");
        $(".unpaid").hide();
        $("#unpaid").removeClass("active");
    })
    $("#take_away").click(function(){
        $(".all").hide();
        $("#all").removeClass("active");
        $(".take_away").show();
        $("#take_away").addClass("active");
        $(".delivery").hide();
        $("#delivery").removeClass("active");
        $(".tableshow").hide();
        $("#tableshow").removeClass("active");
        $(".free").hide();
        $("#free").removeClass("active");
        $(".occupied").hide();
        $("#occupied").removeClass("active");
        $(".unpaid").hide();
        $("#unpaid").removeClass("active");
    })
    $("#delivery").click(function(){
        $(".all").hide();
        $("#all").removeClass("active");
        $(".take_away").hide();
        $("#take_away").removeClass("active");
        $(".delivery").show();
        $("#delivery").addClass("active");
        $(".tableshow").hide();
        $("#tableshow").removeClass("active");
        $(".free").hide();
        $("#free").removeClass("active");
        $(".occupied").hide();
        $("#occupied").removeClass("active");
        $(".unpaid").hide();
        $("#unpaid").removeClass("active");
    })
    $("#tableshow").click(function(){
        $(".all").hide();
        $("#all").removeClass("active");
        $(".take_away").hide();
        $("#take_away").removeClass("active");
        $(".delivery").hide();
        $("#delivery").removeClass("active");
        $(".tableshow").show();
        $("#tableshow").addClass("active");
        $(".free").hide();
        $("#free").removeClass("active");
        $(".occupied").hide();
        $("#occupied").removeClass("active");
        $(".unpaid").hide();
        $("#unpaid").removeClass("active");
    })
    $("#free").click(function(){
        $(".all").hide();
        $("#all").removeClass("active");
        $(".take_away").hide();
        $("#take_away").removeClass("active");
        $(".delivery").hide();
        $("#delivery").removeClass("active");
        $(".tableshow").hide();
        $("#tableshow").removeClass("active");
        $(".free").show();
        $("#free").addClass("active");
        $(".occupied").hide();
        $("#occupied").removeClass("active");
        $(".unpaid").hide();
        $("#unpaid").removeClass("active");
    })
    $("#occupied").click(function(){
        $(".all").hide();
        $("#all").removeClass("active");
        $(".take_away").hide();
        $("#take_away").removeClass("active");
        $(".delivery").hide();
        $("#delivery").removeClass("active");
        $(".tableshow").hide();
        $("#tableshow").removeClass("active");
        $(".free").hide();
        $("#free").removeClass("active");
        $(".occupied").show();
        $("#occupied").addClass("active");
        $(".unpaid").hide();
        $("#unpaid").removeClass("active");
    })
    $("#unpaid").click(function(){
        $(".all").hide();
        $("#all").removeClass("active");
        $(".take_away").hide();
        $("#take_away").removeClass("active");
        $(".delivery").hide();
        $("#delivery").removeClass("active");
        $(".tableshow").hide();
        $("#tableshow").removeClass("active");
        $(".free").hide();
        $("#free").removeClass("active");
        $(".occupied").hide();
        $("#occupied").removeClass("active");
        $(".unpaid").show();
        $("#unpaid").addClass("active");
    })
    
});
</script>
@endsection
