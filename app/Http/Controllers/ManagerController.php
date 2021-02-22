<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Client;
use App\Models\ClientLog;
use App\Models\ClientPubTable;
use App\Models\ClientPubStatus;
use App\Models\Manager;
use App\Models\Waiter;
use App\Models\TableInfo;
use App\Models\Member;
use App\Models\Order;
use App\Models\Kot;
use Session;

class ManagerController extends Controller
{
    public function login(){
        if(session()->has('manager')){
            $clientSlug = Session::get('client-slug');
            return redirect('/'.$clientSlug.'/manager/dashboard');
        }else{
            $invalid = '';
            return view('manager.managerLogin',['invalid'=>$invalid]);
        }
    }
    public function loginManager(Request $request){
        $validatedData = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ],[
            'email.required'=> 'Email ID is required',
            'password.required' => 'Password is required'
        ]);
        $manager = Manager::where(['email'=>$request->email])->first();
        if(!$manager || !Hash::check($request->password, $manager->password)){
            $invalid = "Invalid Email id or password";
            return view('manager.managerLogin',['invalid'=>$invalid]);
        }else{ 
            $client = Client::where(['id'=>$manager->client_id])->first();
            $request->session()->put('client-slug',$client->slug);
            if($client->status == 0){
                $invalid = "Your Company Account is Banded";
                return view('manager.managerLogin',['invalid'=>$invalid]);
            }else if($manager->status == 0){
                $invalid = "Your are Banded";
                return view('manager.managerLogin',['invalid'=>$invalid]);
            }else{
                $pub_status = (ClientPubStatus::where(['client_id'=>$manager->client_id])->first())?ClientPubStatus::where(['client_id'=>$manager->client_id])->first():"Not";
                if($pub_status == "Not"){
                    $invalid = "Your admin hasn\'t open or start System";
                    return view('manager.managerLogin',['invalid'=>$invalid]);
                }else if($pub_status->status == 1){
                    $request->session()->put('manager',$manager);
                    $clientSlug = Session::get('client-slug');
                    return redirect('/'.$clientSlug.'/manager/dashboard');
                }else{
                    $invalid = "Your admin hasn\'t open or start System";
                    return view('manager.managerLogin',['invalid'=>$invalid]);
                }
            }
        }
    }
    public function home($slug){
        $clientSlug = Session::get('client-slug');
        if($slug != $clientSlug){
            return view("error");
        }
        if(session()->has('manager')){
            $clientId = Session::get('manager')['client_id'];
            $client_pub_tables = ClientPubTable::where(['client_id'=>$clientId,'status'=>1])->get();
            $table_info = TableInfo::where(['client_id'=>$clientId])->get();
            $waiters = Waiter::where(['client_id'=>$clientId])->get();
            return view('manager.dashboard',compact('client_pub_tables','waiters','table_info'));
        }else{
            $invalid = '';
            return redirect('/manager');
        }
        return view('manager.dashboard');
    }
    public function logout(){
        Session::flush();
        Session::forget('manager');
        Session::forget('client-slug');
        return redirect('/cashier');
    }
    public function profileGet($slug){
        $clientSlug = Session::get('client-slug');
        if($slug != $clientSlug){
            return view("error");
        }
        $managerId = Session::get('manager')['id'];
        $manager = Manager::find($managerId);
        $msgsucc = '';
        return view('manager.profile',['manager'=>$manager,'msgsucc'=>$msgsucc]);
    }
    public function profileChangePassword(Request $request){
        $validatedData = $request->validate([
            'current_password'    => 'required',
            'new_password'        => 'required|min:6',
            'confirm_password'    => 'required_with:new_password|same:new_password',
        ]);
        $manager = Manager::where(['id'=>$request->id])->first();
        if(!$manager || !Hash::check($request->current_password, $manager->password)){
            $invalid = "Invalid Current password";
            $managerId = Session::get('manager')['id'];
            $managers = Manager::find($managerId);
            return view('manager.profile',['manager'=>$clients,'msgsucc'=>$invalid]);
        }else{
            $manager->password = Hash::make($request->confirm_password);
            $manager->save();
            
            $clientLog = new ClientLog;
            $clientLog->client_id = $manager->client_id;
            $clientLog->date = date('Y-m-d');
            $clientLog->activity = "Manager Change Password";
            $clientLog->save();
            return redirect('/manager-logout');
        }
    }
    public function tableCount(Request $request){
        $client_pub_tables = ClientPubTable::where(['id'=>$request->id,'status'=>1])->first();
        if($client_pub_tables->count()>0)
        {
            $table_info=TableInfo::where(['client_id'=>$client_pub_tables->client_id,'floor'=>$client_pub_tables->section_name])->get();
            if($table_info->count()>0)
            {
                return view('manager.tableCount',compact('client_pub_tables','table_info'));
            }
            else
            {
                return view('manager.tableCount',compact('client_pub_tables'));
            }
        }
    }
    public function orderTake($slug, $id){
        $clientSlug = Session::get('client-slug');
        if($slug != $clientSlug){
            return view("error");
        }
        $order=Order::where('table_id',$id)->get();
        if($order->count()>0)
        {
            return view('manager.orderTake',['orders'=>$order]);
        }
        else
        {
            return view('manager.orderTake');
        }
        
    }
    public function orderInfo($slug, $orderid){
        $clientSlug = Session::get('client-slug');
        if($slug != $clientSlug){
            return view("error");
        }
        $kots = Kot::select('order_no')->distinct()->where('table_id',$orderid)->get();
       
        $data;
        $i=0;
        foreach($kots as $row){
            $data[$i] = Kot::where('order_no',$row->order_no)->get();
            $i++;
        }
        return view('manager.orderInfo',['orders'=>$data]);
        // foreach($data as $order){
        //     foreach($order as $row){
        //         echo "$row->product_name<br>";
        //     }
        // }

        //  old one
        // $order=Order::where('order_no',$orderid)->get();
        // if($order->count()>0)
        // {
            
        //     return view('manager.orderInfo',['orders'=>$order]);
        // }
        // else
        // {
        //     return view('manager.orderInfo',['result'=>"No data found"]);
        // }
    }
    public function billing($slug, $orderid){
        $clientSlug = Session::get('client-slug');
        if($slug != $clientSlug){
            return view("error");
        }
        $order=Order::where('order_no',$orderid)->get();
        if($order->count()>0)
        {
            $waiter=Waiter::where('id',$order[0]->waiter_id)->get();
            $member=Member::where('id',$order[0]->member_id)->get();
            return view('manager.billing',['orders'=>$order,'waiter'=>$waiter,'member'=>$member,'count'=>1]);
        }
        else
        {
            return view('manager.billing',['result'=>"No data found"]);
        }
    }

    public function bookTable(Request $request)
    {
        $client_pub_tables = ClientPubTable::where(['id'=>$request->input('floor_no'),'status'=>1])->first();
        $save_member=new Member();
        $save_member->client_id=$request->input('client_id');
        $save_member->name=$request->input('name');
        $save_member->mobile=$request->input('mobile');
        $save_member->waiter_id=$request->input('waiter_id');
        date_default_timezone_set("Asia/Kolkata");
        $save_member->date=date("d-m-Y");
        $save_member->table_no=$request->input('table_no');
        $save_member->floor=$client_pub_tables->section_name;
        if($save_member->save())
        {
            $save_table=new TableInfo();
            $save_table->client_id=$request->input('client_id');
            $save_table->table_no=$request->input('table_no');
            $save_table->table_status=1;
            $save_table->date_time=date('Y-m-d H:i:s');
            $save_table->floor=$client_pub_tables->section_name;
            $save_table->member_id=$save_member->id;
            if($save_table->save())
            {
                $update=Member::where('id',$save_member->id)->update(['table_id'=>$save_table->id]);
                return "table saved";
            }
            else
            {
                return "table Not saved";
            }

        }
        else
        {
            return "Not saved";
        }
    }

    public function saveOrder(Request $req)
    {
        $member=Member::where('table_no',$req->input('table_no'))->get();
        if($member->count()>0)
        {
            $order=Order::where(['product_name'=>$req->input('product_name'),'table_no'=>$req->input('table_no'),'member_id'=>$member[0]->id])->get();
            if($order->count()>0)
            {
                $qty=$order[0]->product_qty+1;
                $price=ltrim($order[0]->product_price,"₹ ");
                $price=trim($price);
                $price=(int)$price*$qty;
                $save_order=Order::where('id',$order[0]->id)->update(['product_qty'=>$qty,'total_price'=>"₹ ".$price]);
                if($save_order)
                {
                    $get_order=Order::where(['table_no'=>$req->input('table_no'),'member_id'=>$member[0]->id])->get();
                    return $get_order;
                }
                else
                {
                    return "Can't save";
                }
            }
            else
            {
                $save_order=new Order();
                $save_order->client_id=$member[0]->client_id;
                $save_order->product_name=$req->input('product_name');
                $save_order->product_price=$req->input('product_price');
                $save_order->total_price=$req->input('product_price');
                $save_order->product_qty=1;
                $save_order->product_type=$req->input('product_type');
                $save_order->table_no=(int)$req->input('table_no');
                $save_order->waiter_id=$member[0]->waiter_id;
                $save_order->member_id=$member[0]->id;
                date_default_timezone_set("Asia/Kolkata");
                $save_order->date_time=date("Y-m-d H:i:s");
                $save_order->table_id=$req->id;
                $save_order=$save_order->save();
                if($save_order)
                {
                    $get_order=Order::where(['table_no'=>$req->input('table_no'),'member_id'=>$member[0]->id])->get();
                    return $get_order;
                }
                else
                {
                    return "Can't save";
                }
            }
        }
    }

    public function clearOrder(Request $req)
    {
        $clear=Order::where('table_id',$req->input('id'))->delete();
        if($clear)
        {
            return "Success";
        }
        else
        {
            return "Error";
        }
    }

    public function deleteProduct(Request $req)
    {
        $clear=Order::where('id',$req->input('id'))->delete();
        if($clear)
        {
            $order=Order::where('table_id',$req->input('table_id'))->get();
            if($order->count()>0)
            {
                return $order;
            }
            else
            {
                return "No data";
            }
        }
        else
        {
            return "Error";
        }
    }

    public function plusQty(Request $req)
    {
        $plus=Order::where('id',$req->input('id'))->update(['product_qty'=>$req->input('qty'),'total_price'=>$req->input('price')]);
    }

    public function minusQty(Request $req)
    {
        $plus=Order::where('id',$req->input('id'))->update(['product_qty'=>$req->input('qty'),'total_price'=>$req->input('price')]);
    }

    public function getOrderTicket(Request $req)
    {
         $ticket=rand(0000,9999);
        // $get = Order::where('table_id',$req->input('table_id'))->get();
        // $create_kot = new Kot();
        
        // $create_kot->table_id = $req->input('table_id');
        // $create_kot->order_no = $ticket;
        // $save_kot = $create_kot->save();
        // if($save_kot){
        //     return $ticket;
        // }
        // else{
        //     return "Error";
        // }
        $get=Order::where(['table_id'=>$req->input('table_id'),'order_no'=>NULL])->get();
        if($get->count()>0){
            $update = Order::where(['table_id'=>$req->input('table_id'),'order_no'=>NULL])->update(['order_no'=>$ticket]);
            if($update){
               // echo"kldsjf";
                $orders=Order::where(['table_id'=>$req->input('table_id'),'order_no'=>$ticket])->get();
                foreach($orders as $row){
                    //echo "$row->order_no <br>";
                     $create_kot = new Kot();
                     $create_kot->client_id =  $row->client_id;
                     $create_kot->product_name = $row->product_name;
                     $create_kot->product_price = $row->product_price;
                     $create_kot->product_qty =  $row->product_qty;
                     $create_kot->product_type = $row->product_type;
                     $create_kot->table_no = $row->table_no;
                    $create_kot->table_id = $row->table_id;
                    $create_kot->order_no = $row->order_no;
                    $create_kot->total_price = $row->total_price;
                    $create_kot->date_time = $row->date_time;
                    $create_kot->waiter_id = $row->waiter_id;
                    $create_kot->member_id = $row->member_id;
                    $create_kot->save();
                }
                
                return $orders[0]->client_id;
            }
            else{
                return "Error";
            }
        }
        // ******************
        //$ticket=rand(0000,9999);
        //$get=Order::where('table_id',$req->input('table_id'))->get();
        // if($get->count()>0)
        // {
        //     if(empty($get[0]->order_no))
        //     {
        //         $update=Order::where('table_id',$req->input('table_id'))->update(['order_no'=>$ticket]);
        //         if($update)
        //         {
        //             $table=TableInfo::where('id',$req->input('table_id'))->update(['table_status'=>2,'order_no'=>$ticket]);
        //             return $ticket;
        //         }
        //         else
        //         {
        //             return "Error";
        //         }
        //     }
        //     else
        //     {
        //         return $get[0]->order_no;
        //     }
        // }
    }
}
