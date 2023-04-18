<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\AddStock;
use DB;
use Session;
use PDF;

class ProductController extends AppBaseController
{
    /** @var  ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
    {
        $this->productRepository = $productRepo;
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
        $this->middleware('permission:product-create', ['only' => ['create','store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the Product.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
       //$products = Product::all()->orderBy('id', 'DESC');;

    $products = Product::all();

     //  $products = Product::orderBy('id','DESC')->paginate(5);
        return view('products.index',compact('products'));



     //  return view('products.index',compact('products'));

    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $brand = Brand::all();
        $category = Category::all();
        return view('products.create',compact('brand','category'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();
        $image = $request->file('image');

        $catalog = $request->file('catalog');

        if($image == null){

            $image_name = 'default.png';
        }
        else{

        $image_name = rand(111,999).'.' .$image->getClientOriginalExtension();
        $image->move(public_path('product_images'),$image_name);
        }

        if($catalog== null){
            $pdf_name = 'default.pdf';
        }
else{
        $pdf_name = rand(111,999).'.' .$catalog->getClientOriginalExtension();
        $catalog->move(public_path('product_catalog'),$pdf_name);
}
        $product = new Product;
        $product->product = $request->product;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->image = $image_name;
        $product->catalog = $pdf_name;
        $product->qty = $request->qty;
        $product->warranty = $request->warranty;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->status= $request->status;
        $product->save();
        $productStock =  new AddStock;
        $productStock->product_id = $product->id;
        $productStock->previous_qty = 0;
        $productStock->qty = $request->qty;
        $productStock->current_qty=$request->qty;
        $productStock->status= "New Stock";
        $productStock->save();
        Session::flash('success','Product saved successfully.');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Session::flash('error','Product not found');

            return redirect(route('products.index'));
        }

        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        $brand = Brand::all();
        $category = Category::all();

        if (empty($product)) {
            Session::flash('error','Product not found');

            return redirect(route('products.index'));
        }

        return view('products.edit',compact('brand','category'))->with('product', $product);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $input = $request->all();
        $imageName = $request->image_name;
        $productCatalog = $request->product_catalog;
        $image = $request->file('image');
        $catalog = $request->file('catalog');

            if($image == ''){
                $image_name = $imageName;

            }
            else{
                $image_name = rand(111,999) .'.' .$image->getClientOriginalExtension();
                $image->move(public_path('product_images'),$image_name);
            }
            if($catalog == ''){
                $pdf_name = $productCatalog;

            }
            else{
                $pdf_name = rand(111,999) .'.' .$catalog->getClientOriginalExtension();
                $catalog->move(public_path('product_catalog'),$pdf_name);
            }

            $product = Product::find($id);

            $product->product = $request->product;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->image = $image_name;
            $product->catalog = $pdf_name;
            $product->qty = $request->qty;
            $product->warranty = $request->warranty;
            $product->buying_price = $request->buying_price;
            $product->selling_price = $request->selling_price;
            $product->status= $request->status;
            $product->save();
        Session::flash('success','Product updated successfully.');

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            Session::flash('error','Product not found');

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        Session::flash('success','Product deleted successfully.');

        return redirect(route('products.index'));
    }

    public function updateStatus(Request $request)
        {
            $product = Product::findOrFail($request->id);
            $product->status = $request->status;
            $product->save();
            return response()->json(['message' => 'Product status updated successfully.']);
        }

    public function addStock($id)
        {
            $product = Product::findOrFail($id);

            $name = $product->product;
            $qty = $product ->qty;
            return view('products.stock',compact('name','qty','id'));

           dd($id);
        }
        public function stockUpdate(Request $request)
        {

        $name = $request->product;
        $p_id = $request->product_id;
        $product = AddStock::where('product_id',$p_id)
                            ->latest()->first();
        $qty = $product->current_qty;
        $nqty = $request->new_quantity;
        $tqty = $qty + $nqty;
        $productStock =  new AddStock;
        $productStock->product_id = $p_id;
        $productStock->previous_qty = $qty;
        $productStock->qty = $nqty;
        $productStock->current_qty=$tqty;
        $productStock->status= "Stock Entry";
        $productStock->save();
        Product::where('id', $p_id)->update(array('qty' => $tqty));
        return redirect(route('products.index'));


        }

        public function pdfProduct($id)
        {
            $list = AddStock::where('product_id', $id)
                            ->get() ;
            dd($list);

            $name = Product::where('id', $id)->first();
            $ddd = $name->product;
             $fileName = $ddd.'.pdf';

             $pdf = PDF::loadView('products.report',compact('list','ddd'));
            // $pdf->save(storage_path().'_filename.pdf');
             return $pdf->stream($fileName);

        }

    function productList(){

        //return Posts::all();
        //    $user = User::find($user_id);
        //   $user_id = $user->id;

        $product = Product::get();

        return $product;
    }
}
