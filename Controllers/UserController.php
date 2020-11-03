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

    public function delete_manufacturer_product($id){
        manufacturer_inventory::where('id',$id)->delete();
        return redirect('/inventory')->with('delete','Deleted!');
    }

    public function delete_seller_product($id){
        seller_inventory::where('id',$id)->delete();
        return redirect('/inventory')->with('delete','Deleted!');
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
}
