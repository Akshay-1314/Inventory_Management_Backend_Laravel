<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Crypt;
use App\signup_manufacturer;
use App\signup_seller;
use App\manufacturer_inventory;
use App\seller_inventory;
use App\item_request;
use App\items_sold_seller;
use App\customer_detail;
use App\items_sold_manufacturer;
use Carbon\Carbon;

class UserController extends Controller
{
    public function signup_manufacturer(Request $req){
        $details = DB::select("select email from signup_manufacturers");
        $var = true;
            foreach($details as $value){
                if($value->email == $req->emailAddress){
                    $var = false;
                    break;
                }
            }
        if($var)
        {
            $new = new signup_manufacturer;
            $new->full_name = $req->username;
            $new->email = $req->emailAddress;
            $new->password = Crypt::encrypt($req->password);
            $new->save();
            
            $req->session()->put('data',$req->input("username"));
            $req->session()->put('manufacturer',$req->input("emailAddress"));
            return redirect('dashboard')->with('message','Successful!');
        }
        else{
            return redirect()->back()->with('message','Error!');    
        }
    }
    public function signup_seller(Request $req){
        $details = DB::select("select email from signup_sellers");
        $var = true;
            foreach($details as $value){
                if($value->email == $req->seller_emailAddress){
                    $var = false;
                    break;
                }
            }
        if($var)
        {
            $new = new signup_seller;
            $new->full_name = $req->seller_username;
            $new->email = $req->seller_emailAddress;
            $new->password = Crypt::encrypt($req->seller_password);
            $new->save();
            $req->session()->put('data',$req->input("seller_username"));
            $req->session()->put('seller',$req->input("seller_emailAddress"));
            return redirect('dashboard')->with('message','Successful!');
        }
        else{
            return redirect()->back()->with('message','Error!');
        }
    }
    public function login_manufacturer(Request $req){
        $details = DB::select("select full_name,email,password from signup_manufacturers");
        $var = false;
        foreach($details as $value){
            if($value->email == $req->login_email_manufacturers and Crypt::decrypt($value->password) == $req->login_password_manufacturers){
                $var = true;
                $name = $value->full_name;
                $email = $value->email;
                break;
            }
        }
        if($var){
            $req->session()->put('data',$name);
            $req->session()->put('manufacturer',$email);
            return redirect('dashboard');
        }
        else{
            return redirect()->back()->with('login_error','Error!');
        }
        
    }
    public function login_seller(Request $req){
        $details = DB::select("select full_name,email,password from signup_sellers");
        $var = false;
        foreach($details as $value){
            if($value->email == $req->login_email_sellers and Crypt::decrypt($value->password) == $req->login_password_sellers){
                $var = true;
                $name = $value->full_name;
                $email = $value->email;
                break;
            }
        }
        if($var){
            $req->session()->put('data',$name);
            $req->session()->put('seller',$email);
            return redirect('dashboard');
        }
        else{
            return redirect()->back()->with('login_error','Error!');
        }
    }
    public function logout(){
        session()->forget('data');
        session()->forget('seller');
        session()->forget('manufacturer');
        session()->forget('email');
        session()->forget('customer_mobile');
        return redirect('/');
    }
    public function delete_manufacturers(){
        signup_manufacturer::truncate();
        return("Deleted successfully");
    }
    public function delete_sellers(){
        signup_seller::truncate();
        return("Deleted successfully");
    }

    public function Inventory(){
        $data = manufacturer_inventory::where('email',session('manufacturer'))->get();
        $data1 = seller_inventory::where('email',session('seller'))->get();
        $data2 = manufacturer_inventory::all();
        $data3 = item_request::all();
        $requests = "false";
        foreach($data3 as $value){
            if($value->manufacturers_email==session('manufacturer')){
                
                $requests = "true";
                break;
            }
        }
        return view('inventory',compact('data','data1','data2','data3','requests'));
    }

    public function add_manufacturer_inventory(Request $req){
        $new = new manufacturer_inventory;
        $new->product_name = $req->pname;
        $new->quantity = $req->quantity;
        $new->production_cost = $req->production_cost;
        $new->material_cost = $req->material_cost;
        $new->price = $req->price;
        $new->expiry_date = $req->dom;
        $new->date_of_manufacture = Carbon::now()->toDateTimeString();
        $new->name_of_manufacturer = session('data');
        $new->email = session('manufacturer');
        $new->save();
        return redirect()->back()->with('message','Successful!');
    }

    public function add_seller_inventory(Request $req){
        $new = new seller_inventory;
        $new->product_name = $req->pname_seller;
        $new->quantity = $req->quantity_seller;
        $new->price = $req->price_seller;
        $new->selling_price = $req->selling_price_seller;
        $new->date_of_manufacture = $req->date_of_manufacture;
        $new->name_of_manufacturer = $req->name_of_manufacturer;
        $new->expiry_date = $req->dom_seller;
        $new->email = session('seller');
        $new->save();
        return redirect()->back()->with('message','Successful!');
    }
    
    public function item_requests($id){
        $request_data = manufacturer_inventory::where('id',$id)->get();
        if(!item_request::where('manufacturer_product_id',$id)->get()->isEmpty()){
            $details = item_request::where('manufacturer_product_id',$id)->get();
            foreach($details as $value){
                if($value->sellers_email==session('seller')){
                    return redirect()->back()->with('requested','requested');
                }
            }
                    $new = new item_request;
                    $new->manufacturer_product_id = $id;
                    $new->sellers_name = session('data');
                    $new->sellers_email = session('seller');
                    $new->product_name = $request_data[0]['product_name'];
                    $new->manufacturers_email = $request_data[0]['email'];
                    $new->save();
                    $quantity_available = $request_data[0]['quantity'];
                    return redirect()->back()->with('quantity',$quantity_available);
        }
        else{
            $new = new item_request;
            $new->manufacturer_product_id = $id;
            $new->sellers_name = session('data');
            $new->sellers_email = session('seller');
            $new->product_name = $request_data[0]['product_name'];
            $new->manufacturers_email = $request_data[0]['email'];
            $new->save();
            $quantity_available = $request_data[0]['quantity'];
            return redirect()->back()->with('quantity',$quantity_available);
        }
    }

    public function confirm_quantity(Request $req){
        item_request::where('quantity_required',null)->update(['quantity_required'=>$req->quantity_required]);
        return redirect()->back()->with('confirmed','confirmed');
    }

    public function grant_request($manufacturer_product_id,$id){
        $quantity_required = item_request::where('id',$id)->get()[0]['quantity_required'];
        $quantity_available = manufacturer_inventory::where('id',$manufacturer_product_id)->get()[0]['quantity'];
        $remaining = $quantity_available-$quantity_required;

        $pointer = item_request::where('id',$id);
        $pointer1 = manufacturer_inventory::where('id',$manufacturer_product_id);

        $new = new seller_inventory;
        $new->product_name = $pointer->get()[0]['product_name'];
        $new->quantity = $quantity_required;
        $new->price = $pointer1->get()[0]['price'];
        $new->selling_price = -1;
        $new->date_of_manufacture = $pointer1->get()[0]['date_of_manufacture'];
        $new->name_of_manufacturer = $pointer1->get()[0]['name_of_manufacturer'];
        $new->expiry_date = $pointer1->get()[0]['expiry_date'];
        $new->email = $pointer->get()[0]['sellers_email'];
        $new->save();

        $new_data = new items_sold_manufacturer;
        $new_data->product_name = $pointer->get()[0]['product_name'];
        $new_data->quantity = $quantity_required;
        $new_data->price = $pointer1->get()[0]['material_cost']+$pointer1->get()[0]['production_cost'];
        $new_data->selling_price = $pointer1->get()[0]['price'];
        $new_data->date_of_manufacture = $pointer1->get()[0]['date_of_manufacture'];
        $new_data->name_of_manufacturer = $pointer1->get()[0]['name_of_manufacturer'];
        $new_data->expiry_date = $pointer1->get()[0]['expiry_date'];
        $new_data->manufacturers_email = session('manufacturer');
        $new_data->sellers_email = $pointer->get()[0]['sellers_email'];
        $new_data->date_of_transaction = Carbon::now()->toDateTimeString();
        $new_data->save();


        if($quantity_available==$quantity_required)
        {
            item_request::where('manufacturer_product_id',$manufacturer_product_id)->delete();
            manufacturer_inventory::where('id',$manufacturer_product_id)->delete();
        }
        else{
            item_request::where('id',$id)->delete();
            
            $item = item_request::where('manufacturer_product_id',$manufacturer_product_id)->get();
            
            foreach($item as $value){
                if($value->quantity_required>$remaining)
                {
                    $value->delete();
                }
            }

            $details = manufacturer_inventory::where('id',$manufacturer_product_id)->update(['quantity'=>$remaining]);
        }
        return redirect()->back()->with('granted','granted');
    }

    public function update_selling_price(Request $req)
    {  
        $split = explode('                          ',$req->update_selling_price);
        seller_inventory::where('id',$split[1])->update(['selling_price'=>$split[0]]);
        return redirect()->back();
    }

    public function sellers_invoice(){
        $detail = customer_detail::where(['sellers_email'=>session('seller'),'sold'=>0]);
        $details = $detail->count();
        if($details>0){
            $data1 = 'customer_added';
            session()->put('customer_mobile',$detail->get()[0]['customer_mobile']);
        }
        else{
            session()->forget('customer_mobile');
            $data1 = 'customer_not_added';
        }
        $data2 = $detail->get();
        $data = seller_inventory::where('email',session('seller'))->get();
        $data3 = items_sold_seller::where(['sellers_email'=>session('seller'),'sold'=>0])->get();
        return view('invoice',compact('data','data1','data2','data3'));
    }

    public function customer_details(Request $req){
        $count = customer_detail::where(['customer_mobile'=>$req->customer_mobile,'sold'=>0,'sellers_email'=>session('seller')])->count();
        if($count!=0){
            return redirect()->back()->with('mobile_number','same');
        }
        $new = new customer_detail;
        $new->customer_name = $req->customer_name;
        $new->customer_mobile = $req->customer_mobile;
        $new->date_of_transaction = Carbon::now()->toDateTimeString();
        $new->sellers_email = session('seller');
        $new->sold = 0;
        $new->save();
        return redirect('/invoice');
    }

    public function item_sell($id){
        if(items_sold_seller::where(['seller_product_id'=>$id,'sellers_email'=>session('seller'),'sold'=>0])->count()==0){
            $sell = seller_inventory::where('id',$id)->get();
            $new = new items_sold_seller;
            $new->seller_product_id = $id;
            $new->product_name = $sell[0]['product_name'];
            $new->price = $sell[0]['price'];
            $new->selling_price = $sell[0]['selling_price'];
            $new->date_of_manufacture = $sell[0]['date_of_manufacture'];
            $new->expiry_date = $sell[0]['expiry_date'];
            $new->name_of_manufacturer = $sell[0]['name_of_manufacturer'];
            $new->sellers_email = $sell[0]['email'];
            $new->sold = 0;
            $new->customer_mobile = customer_detail::where(['sellers_email'=>session('seller'),'sold'=>0])->get()[0]['customer_mobile'];
            $new->save();
        }
        else{
            return redirect()->back()->with('added','added');
        }
        return redirect()->back()->with('quantity',$sell[0]['quantity']);
    }

    public function quantity_sold(Request $req)
    {
        $quantity_required = $req->quantity_required;
        $items = items_sold_seller::where(['quantity_sold'=>null,'sold'=>0])->get();
        
        $seller = seller_inventory::where('id',$items[0]['seller_product_id'])->get();
        $quantity_available = $seller[0]['quantity'];

        if($quantity_available == $quantity_required){
            seller_inventory::where('id',$items[0]['seller_product_id'])->delete();
            DB::table('items_sold_seller')
            ->where(function($query)
            {
                    $query->where('quantity_sold', '!=', null)
                  ->where('seller_product_id', '=', items_sold_seller::where(['quantity_sold'=>null,'sold'=>0])->get()[0]['seller_product_id']);
            })->delete();
        }
        else{
            $remaining = $quantity_available - $quantity_required;
            seller_inventory::where('id',$items[0]['seller_product_id'])->update(['quantity'=>$remaining]);
            $detail = items_sold_seller::where(['seller_product_id'=>$items[0]['seller_product_id'],'sold'=>0])->get();
            foreach($detail as $value){
                if($value->quantity_sold>$remaining){
                    $value->delete();
                }
            }
        }
        items_sold_seller::where(['quantity_sold'=>null,'sold'=>0])->update(['quantity_sold'=>$req->quantity_required]);
        return redirect()->back();
    }

    public function remove_item($seller_product_id,$id){
        $seller = seller_inventory::where('id',$seller_product_id);
        $items = items_sold_seller::where('id',$id);
        if($seller->count()==1){
            $seller->update(['quantity'=>$seller->get()[0]['quantity']+$items->get()[0]['quantity_sold']]);
        }
        else{
            $new = new seller_inventory;
            $new->product_name = $items->get()[0]['product_name'];
            $new->quantity = $items->get()[0]['quantity_sold'];
            $new->price = $items->get()[0]['price'];
            $new->selling_price = $items->get()[0]['selling_price'];
            $new->date_of_manufacture = $items->get()[0]['date_of_manufacture'];
            $new->expiry_date = $items->get()[0]['expiry_date'];
            $new->name_of_manufacturer = $items->get()[0]['name_of_manufacturer'];
            $new->email = session('seller');
            $new->save();
        }
        $items->delete();
        return redirect()->back();
    }

    public function edit_delete_seller_inventory(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'product_name'	=>	$request->product_name,
    				'quantity'		=>	$request->quantity,
                    'price'		=>	$request->price,
                    'selling_price'		=>	$request->selling_price,
                    'date_of_manufacture'		=>	$request->date_of_manufacture,
                    'expiry_date'		=>	$request->expiry_date,
                    'name_of_manufacturer'		=>	$request->name_of_manufacturer
                );
                seller_inventory::where('id',$request->id)->update($data);
    		}
    		if($request->action == 'delete')
    		{
    			seller_inventory::where('id',$request->id)->delete();
    		}
    		return response()->json($request);
    	}
    }

    public function edit_delete_manufacturer_inventory(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'product_name'	=>	$request->product_name,
                    'production_cost'		=>	$request->production_cost,
                    'material_cost'		=>	$request->material_cost,
                    'quantity'        =>  $request->quantity,
                    'price'		=>	$request->price,
                    'date_of_manufacture'		=>	$request->date_of_manufacture,
                    'expiry_date'		=>	$request->expiry_date
                );
                manufacturer_inventory::where('id',$request->id)->update($data);
                DB::table('item_requests')
                ->where(function($query)
                {
                    $query->where('manufacturer_product_id', '=', $request->id)
                    ->where('quantity', '>', $request->quantity);
                })->delete();
    		}
    		if($request->action == 'delete')
    		{
                manufacturer_inventory::where('id',$request->id)->delete();
                item_request::where('manufacturer_product_id',$request->id)->delete();
    		}
    		return response()->json($request);
    	}
    }

    public function items_sold_customer(){
            items_sold_seller::where(['sellers_email'=>session('seller'),'sold'=>0])->update(['sold'=>1]);
            customer_detail::where(['sellers_email'=>session('seller'),'sold'=>0])->update(['sold'=>1]);
            $detail = DB::table('items_sold_seller')
                    ->select('*')
                    ->join('customer_details', function ($join) {
                        $join->on('items_sold_seller.customer_mobile', '=', 'customer_details.customer_mobile')->groupBy('items_sold_seller.product_name'); 
                    })
                    ->where(['items_sold_seller.sold'=>1,'customer_details.sold'=>1,'customer_details.customer_mobile'=>session('customer_mobile')]);
            $details = $detail->get();
            
            foreach($details as $value)
            {
                $customer_name = $value->customer_name;
                $customer_mobile = $value->customer_mobile;
                $date = $value->date_of_transaction;
                break;
            }

            $amount = 0;
            $quantity_sold = 0;
            $count = 0;
            foreach($details as $value){
                $amount = $amount + $value->quantity_sold*$value->selling_price;
                $quantity_sold = $quantity_sold + $value->quantity_sold;
                $count = $count + 1;
            }
            return view('bill',compact('details','count','quantity_sold','amount','customer_name','customer_mobile','date'));
    }
    
    public function store_details(Request $req){
        $store_name = $req->store_name;
        $store_details = $req->address;
        return redirect()->back()->with(['store_name'=>$store_name,'store_details'=>$store_details]);
    }

    public function manufacturers_invoice(){
        session()->forget('email');
        $data = DB::table('items_sold_manufacturer')
        ->select('sellers_email')
        ->join('signup_sellers', function ($join) {
            $join->on('items_sold_manufacturer.sellers_email', '=', 'signup_sellers.email'); 
        })->where('items_sold_manufacturer.manufacturers_email',session('manufacturer'))->distinct('signup_sellers.email')->get();
        $detail = array();
        foreach($data as $value){
            $detail[signup_seller::where('email',$value->sellers_email)->get()[0]['full_name']] = items_sold_manufacturer::where(['manufacturers_email'=>session('manufacturer'),'sellers_email'=>$value->sellers_email])->get()->count();
        }
        $email = array();
        $i = 1;
        foreach($data as $value){
            $email[$i] = $value->sellers_email;
            $i = $i+1;
        }
        return view('invoice',compact('detail','email'));
    }

    public function soldto($email){
        session()->put('email',$email);
        return redirect()->route('bill');
    }
    public function bill(){
        $email =  session()->get('email');
        $details = items_sold_manufacturer::where(['sellers_email'=>$email,'manufacturers_email'=>session('manufacturer')])->get();
        $customer_name = signup_seller::where('email',$email)->get()[0]['full_name'];
        $count = $details->count();
        $quantity_sold = 0;
        $amount = 0;
        foreach($details as $value){
            $quantity_sold = $quantity_sold + $value->quantity;
            $amount = $amount + $value->quantity*$value->selling_price;
        }
        return view('bill',compact('details','count','quantity_sold','amount','customer_name'));
    }
}
