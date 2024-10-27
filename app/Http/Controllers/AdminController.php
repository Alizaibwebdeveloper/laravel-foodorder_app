<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

use App\Models\Food;
use App\Models\Order;

class AdminController extends Controller
{

    public function add_food(){


        return  view('admin.add_food');
    }

    public function upload_food(Request $request){

        $data = new Food;
        $data->title = $request->title;

        $data->details = $request->details;

        $data->price = $request->price;

        
    if ($request->hasFile('img')) {
        $image = $request->file('img'); 

        $filename = time() . '.' . $image->getClientOriginalExtension();

        $image->move(public_path('food_img'), $filename);

        $data->image = $filename;
    } else {
        $data->image = null;
    }       
    
    $data->save();

        return redirect()->back();
    }


    public function view_food(){

        $data = Food::all();
        return view('admin.view_food', compact('data'));
    }

    public function delete_food($id){

        $data = Food::find($id);
        $data->delete();
        return redirect()->back();

    }

    public function update_food($id){


        $food = Food::find($id);
        return view('admin.update_food', compact('food'));
    }

    public function edit_food(Request $request, $id){

        $data = Food::find($id);
        $data->title = $request->title;
        $data->details = $request->details;
        $data->price = $request->price;


        $image = $request->img;
        if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('food_img'), $imagename); 
       $data->image = $imagename;
}


        $data->save();

     
        return redirect('view_food');

    }


    public function orders(){

        $data = Order::all();
        return view('admin.order', compact('data'));
    }

    public function on_the_way($id){


        $data = Order::find($id);
        $data->delivery_status = "On the way";
        $data->save();

        return redirect()->back();

    }


    public function delivered($id){

        $data = Order::find($id);
        $data->delivery_status = "delivered";
        $data->save();

        return redirect()->back();
    }

    public function canceled($id){

        $data = Order::find($id);
        $data->delivery_status = "Canceled";
        $data->save();


        return redirect()->back();
    }

    public function reservation(){

        $data = Book::all();
        return view('admin.reservation', compact('data'));
    }
}
