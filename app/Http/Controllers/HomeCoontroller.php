<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Food;
use App\Models\Cart;


use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class HomeCoontroller extends Controller
{
    public function index(){

        if(Auth::id()){

            $usertype = Auth()->user()->usertype;

            if($usertype=='user'){
                $data = Food::all();
                return view('home.index', compact('data'));
            }else{
                return view('admin.index');
            }
        }

    }

    public function my_home(){

        $data = Food::all();
        return view('home.index', compact('data'));

    }

    public function add_cart(Request $request,$id){

        if(Auth::id()){

            $food = Food::find($id);
            $cart_title = $food->title;
            $cart_detail = $food->details;
            $cart_price =  Str::remove('$',$food->price );
            $cart_img = $food->image;

            $data = new Cart;
            $data->title = $cart_title;
            $data->details = $cart_detail;
            $data->price = $cart_price * $request->qty;
            $data->image = $cart_img;
            $data->quantity = $request->qty;

            $data->userId = Auth()->user()->id; 

            $data->save();

            return redirect()->back();
            
        }else{
            return redirect('login');
        }

    }



    public function my_cart(){
        $user_id = Auth()->user()->id;
        $data = Cart::where('userId', '=', $user_id)->get();

        return view('home.my_cart', compact('data'));
    }

    public function remove_cart($id){

        $data = Cart::find($id);
        $data->delete();

        return redirect()->back();

    }


    public function confirm_order(Request $request){

        $user_id = Auth()->user()->id;
        $cart = Cart::where('userId', $user_id)->get();

        foreach ($cart as  $cart) {
            
            $order = new Order;
            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->title =  $cart->title;
            $order->quantity = $cart->quantity;
            $order->price = $cart->price;
            $order->image = $cart->image;


            $order->save();

            $data = Cart::find($cart->id);
            $data->delete();

        }
        return redirect()->back();
    }


    public function book_table(Request $request){
        $book_table = new Book;
        $book_table->phone = $request->phone;
        $book_table->guest = $request->n_guest;
        $book_table->time = $request->time;
        $book_table->date = $request->date;

        $book_table->save();


        return redirect()->back();
    }

    
}
