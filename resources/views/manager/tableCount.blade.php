<div class="row">
@for($i = 0; $i <= $client_pub_tables->number_of_tables-1; $i++)
    @if(isset($table_info))
        @if(isset($table_info[$i]->table_no) && $table_info[$i]->table_status==1)
            <div class="square seated" style="background-color:#ddffdd;">
                <a href="/{{session()->get('client-slug')}}/manager/order-take/{{$table_info[$i]->id}}" style="color:gray;">
                    Table<span class="table-no"> {{$i+1}}<br></span>
                    Seated<br>
                </a>
            </div>
        @elseif(isset($table_info[$i]->table_no) && $table_info[$i]->table_status==2)
            <div class="square" style="background-color:#fef2f4;">
                <a href="/{{session()->get('client-slug')}}/manager/order-info/{{$table_info[$i]->order_no}}" style="color:gray;">
                    Table<span class="table-no"> {{$i+1}}<br></span>
                    Ordered<br>
                </a>
            </div>
        @elseif(isset($table_info[$i]->table_no) && $table_info[$i]->table_status==3)
            <div class="square" >
                <a href="/{{session()->get('client-slug')}}/manager/billing" style="color:gray;">
                    Table<span class="table-no"> {{$i+1}}<br></span>
                    Served<br>
                </a>
            </div>
        @else
            <div class="square empty">
                <a href="/{{session()->get('client-slug')}}/manager/table-info/{{$i}}/1" style="color:gray;" data-toggle="modal" data-target="#add-member">
                    Table<span class="table-no"> {{$i+1}}<br></span>
                    Empty <br>
                </a>
            </div>
        @endif
    @else
        <div class="square empty">
            <a href="/{{session()->get('client-slug')}}/manager/table-info/{{$i}}/1" style="color:gray;" data-toggle="modal" data-target="#add-member">
                    Table <span class="table-no">{{$i+1}}<br></span>
                    Empty <br>
                
            </a>
        </div>
    @endif
@endfor
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".empty").click(function(){
            $(".book-table-form .table_no").val($(".table-no",this).text());
            $(".floor_no").val($("#client_pub_section").val());
        });
        $(".seated").click(function(){
            localStorage.setItem('table',$(".table-no",this).text());
            $(".floor_no").val($("#client_pub_section").val());
        });
    });
</script>

<!--<div class="content">
    <div class="row justify-content-center">
    @for($i = 1; $i <= $client_pub_tables->number_of_tables; $i++)
        @if($i%2 == 0)
        <div class="col-md-3">
            <a href="/{{session()->get('client-slug')}}/manager/table-info/{{$i}}/1" style="color:gray;" data-toggle="modal" data-target="#add-member">
                <div class="block content-full">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-secondary">{{$i}}</button>
                        </div>
                        <div class="col-md-10 text-left">
                            Empty <br>
                            <small>15 Minutes</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @elseif($i%3 == 0)
        <div class="col-md-3">
            <a href="/{{session()->get('client-slug')}}/manager/order-take">
                <div class="block content-full">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-danger">{{$i}}</button>
                        </div>
                        <div class="col-md-10 text-left">
                            <div style="color:red;">Seated</div>
                            <small style="color:gray;">10 Minutes</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @elseif($i%5 == 0)
        <div class="col-md-3">
            <a href="/{{session()->get('client-slug')}}/manager/order-info">
                <div class="block content-full">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-warning">{{$i}}</button>
                        </div>
                        <div class="col-md-10 text-left">
                            <div style="color:orange;">Ordered</div>
                            <small style="color:gray;">07 Minutes</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @else
        <div class="col-md-3">
            <a href="/{{session()->get('client-slug')}}/manager/billing">
                <div class="block content-full">
                    <div class="row">
                        <div class="col-md-2">
                            <button class="btn btn-success">{{$i}}</button>
                        </div>
                        <div class="col-md-10 text-left">
                            <div style="color:green;">Served</div>
                            <small style="color:gray;">05 Minutes</small>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif
        
    @endfor
    </div>
</div>





@if($i%2 == 0)
    
        <div class="square">
            <a href="/{{session()->get('client-slug')}}/manager/table-info/{{$i}}/1" style="color:gray;" data-toggle="modal" data-target="#add-member">
                    Table {{$i}}<br>
                    Empty <br>
                
            </a>
        </div>
    
    @elseif($i%3 == 0)
    
        <div class="square" style="background-color:#ddffdd;">
        <a href="/{{session()->get('client-slug')}}/manager/order-take" style="color:gray;">
                Table {{$i}}<br>
                Seated<br>
                
        </a>
        </div>
    
    @elseif($i%5 == 0)
        <div class="square" style="background-color:#fef2f4;">
        <a href="/{{session()->get('client-slug')}}/manager/order-info" style="color:gray;">
                Table {{$i}}<br>
                Ordered<br>
                
        </a>
        </div>
    @else
    
        <div class="square" >
        <a href="/{{session()->get('client-slug')}}/manager/billing" style="color:gray;">
                Table {{$i}}<br>
                Served<br>
                
        </a>
        </div>
    
    @endif
-->