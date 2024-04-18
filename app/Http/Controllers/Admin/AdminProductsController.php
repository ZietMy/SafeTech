<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categories;
class AdminProductsController extends Controller
{
    private $products;
    private $categories;
    public function __construct()
    {
        $this->products = new Product();
        $this->categories= new Categories();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        
        return view('admin.products.lists', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= $this->categories->getAllCategories();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'price'=>'required|numeric',
            'quantity'=>'required|numeric',
            'details' => 'required|min:20',
            'category'=>'required'
        ],[ 
            'name.required' => "Name bắt buộc nhập",
            'name.min' => "Name ít nhất 5 kí tự",
            'price.required' => "Price bắt buộc",
            'price.numeric' => 'bắt buộc là kiểu số',
            'quantity.required' => "quantity bắt buộc",
            'quantity.numeric' => 'bắt buộc là kiểu số',
            'details.required'=>'bắt buộc',
            'details.min' => "details ít nhất 20 kí tự",
            'category.required'=>' category bắt buộc'
        ]);
        // dd($request->all())
        $dataInsert = [
            'name' => $request->name,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'details' => $request->details,
            'category'=>$request->category
        ];
        $this->products->create( $dataInsert);
        return redirect() ->route('products.index')->with('msg','Create product success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=$this->products->getDetailId($id)->first();
        $categories= $this->categories->getAllCategories();
        return view('admin.products.edit',compact('product','id','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:5',
            'price'=>'required|numeric',
            'discount'=>'required|numeric|min:0|max:99',
            'quantity'=>'required|numeric',
            'details' => 'required|min:20',
            'category'=>'required'
        ],[ 
            'name.required' => "Name bắt buộc nhập",
            'name.min' => "Name ít nhất 5 kí tự",
            'price.required' => "Price bắt buộc",
            'price.numeric' => 'bắt buộc là kiểu số',
            'discount.required' => "discount bắt buộc",
            'discount.numeric' => 'bắt buộc là kiểu số',
            'discount.min'=>'số nhỏ nhất phải lớn hơn hoặc bằng 0',
            'discount.max'=>'nhỏ hơn 99 và lớn hơn hoặc bằng 0',
            'quantity.required' => "quantity bắt buộc",
            'quantity.numeric' => 'bắt buộc là kiểu số',
            'details.required'=>'bắt buộc',
            'details.min' => "details ít nhất 20 kí tự",
            'category.required'=>' category bắt buộc'
        ]);
        // dd($request->all())
        $dataInsert = [
            'name' => $request->name,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'quantity'=>$request->quantity,
            'details' => $request->details,
            'category'=>$request->category
        ];
        $this->products->updateProduct( $dataInsert,$id);
        return redirect() ->route('products.index')->with('msg','Update product success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->products->deleteProduct($id);
        return redirect()->route('products.index')->with('success','Deleted successfully');
    }
}
