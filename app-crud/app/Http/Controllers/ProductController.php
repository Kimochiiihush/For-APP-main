<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Food;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('prod.index', ['product' => $product]);
    }

    

    public function create(){
        return view('prod.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        try {
            $newProduct = Product::create($data);
        } catch (\Exception $e) {
            Log::error('Error creating product: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error creating product.');
        }

        return redirect()->route('prod.index');
    }

    public function edit(Product $product){
        return view('prod.edit', ['product' => $product]);
    }

   

    
//-------------------------------------------FOOD-----------------------------------------------------------//
    public function foodmenu()
    {

        $data = food::all();
        return view("admin.foodmenu", compact('data'));
    }

    public function upload(Request $request)
{
    $data = new Food;

    // Retrieve the image from the request
    $image = $request->file('image');
    
    // Generate a unique name for the image
    $imagename = time() . '.' . $image->getClientOriginalExtension();
    
    // Move the image to the 'foodimage' directory
    $image->move(public_path('foodimage'), $imagename);
    
    // Assign the image name to the data
    $data->image = $imagename;

    // Assign other form inputs to the model attributes
    $data->title = $request->title;
    $data->price = $request->price;
    $data->description = $request->description;

    // Save the data to the database
    $data->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Data and image uploaded successfully.');
}


    public function deletemenu($id){

        $data = food::find($id);

        $data->delete();
        return redirect()->back();

    }

    public function updateview($id){

        $data = food::find($id);

        
        return view("admin.updateview", compact('data'));

    }

    public function update(Request $request, $id)
{
    $data = Food::find($id);

    // Validate the request data
    $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric',
        'description' => 'required|string',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure it's an image and within size limit
    ]);

    // Check if the image is present in the request
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        
        // Generate a unique name for the image
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        
        // Move the image to the 'foodimage' directory
        $image->move(public_path('foodimage'), $imagename);
        
        // Assign the image name to the data
        $data->image = $imagename;
    }

    // Assign other form inputs to the model attributes
    $data->title = $request->title;
    $data->price = $request->price;
    $data->description = $request->description;

    // Save the data to the database
    $data->save();

    // Redirect back with success message
    return redirect()->back()->with('success', 'Data and image updated successfully.');
}


public function addcart(Request $request, $id)
{
    if(Auth::check())
    {
        $user_id = Auth::id();
        $foodid = $id;
        $quantity = $request->quantity;

        $cart = new cart;

        $cart->user_id = $user_id;
        $cart->food_id = $foodid;
        $cart->quantity = $quantity;

        $cart->save();

        return redirect()->back();
    }
    else
    {
        return redirect()->route('login');
    }
}

public function showcart(Request $request, $id)
{
    $count = Cart::where('user_id', $id)->count();

    $data2=cart:: select('*')->where('user_id', '=', $id)->get();

    $data = Cart::where('user_id', $id)
                ->join('food', 'carts.food_id', '=', 'food.id')
                ->get();

    return view('showcart', compact('count', 'data', 'data2'));
}


public function remove($id){
    $data=cart::find($id);
    $data->delete();
    return redirect()->back();

}

}