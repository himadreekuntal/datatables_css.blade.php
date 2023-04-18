<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductDescriptionRequest;
use App\Http\Requests\UpdateProductDescriptionRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDescription;
use App\Repositories\ProductDescriptionRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class ProductDescriptionController extends AppBaseController
{
    /** @var  ProductDescriptionRepository */
    private $productDescriptionRepository;

    public function __construct(ProductDescriptionRepository $productDescriptionRepo)
    {
        $this->productDescriptionRepository = $productDescriptionRepo;
    }

    /**
     * Display a listing of the ProductDescription.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productDescriptions = $this->productDescriptionRepository->all();

        return view('product_descriptions.index')
            ->with('productDescriptions', $productDescriptions);
    }

    /**
     * Show the form for creating a new ProductDescription.
     *
     * @return Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product_descriptions.create',compact('category'));
    }

    /**
     * Store a newly created ProductDescription in storage.
     *
     * @param CreateProductDescriptionRequest $request
     *
     * @return Response
     */
    public function store(CreateProductDescriptionRequest $request)
    {
        $input = $request->all();
        $image = $request->file('product_image');

        $catalog = $request->file('product_catalog');

        if($image == null){

            $image_name = 'default.png';
        }
        else{

            $image_name = rand(111,999).'.' .$image->getClientOriginalExtension();
            $image->move(public_path('product_details'),$image_name);
        }

        if($catalog== null){
            $pdf_name = 'default.pdf';
        }
        else{
            $pdf_name = rand(111,999).'.' .$catalog->getClientOriginalExtension();
            $catalog->move(public_path('product_details'),$pdf_name);
        }
        $productDescription = new ProductDescription();
        $productDescription->category_id = $request->category_id;
        $productDescription->product_name = $request->product_name;
        $productDescription->description = $request->description;
        $productDescription->product_image = $image_name;
        $productDescription->product_catalog = $pdf_name;

        $productDescription->save();

        Flash::success('Product Description saved successfully.');

        return redirect(route('productDescriptions.index'));
    }

    /**
     * Display the specified ProductDescription.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productDescription = $this->productDescriptionRepository->find($id);


        if (empty($productDescription)) {
            Flash::error('Product Description not found');

            return redirect(route('productDescriptions.index'));
        }

        return view('product_descriptions.show')->with('productDescription', $productDescription);
    }

    /**
     * Show the form for editing the specified ProductDescription.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productDescription = $this->productDescriptionRepository->find($id);
        $category = Category::all();
        if (empty($productDescription)) {
            Flash::error('Product Description not found');

            return redirect(route('productDescriptions.index'));
        }

        return view('product_descriptions.edit',compact('category'))->with('productDescription', $productDescription);
    }

    /**
     * Update the specified ProductDescription in storage.
     *
     * @param int $id
     * @param UpdateProductDescriptionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductDescriptionRequest $request)
    {

        $input = $request->all();

        $imageName = $request->product_image;
        $productCatalog = $request->product_catalog;

        $image = $request->file('product_image1');
        $catalog = $request->file('product_catalog1');


        if($image == ''){
            $image_name = $imageName;

        }
        else{
            $image_name = rand(111,999) .'.' .$image->getClientOriginalExtension();
            $image->move(public_path('product_details'),$image_name);
        }
        if($catalog == ''){
            $pdf_name = $productCatalog;

        }
        else{
            $pdf_name = rand(111,999) .'.' .$catalog->getClientOriginalExtension();
            $catalog->move(public_path('product_details'),$pdf_name);
        }

        //  dd($input);
        $productDescription = ProductDescription::findOrFail($id);
        $productDescription->category_id = $request->category_id;
        $productDescription->product_name = $request->product_name;
        $productDescription->description = $request->description;
        $productDescription->product_image = $image_name;
        $productDescription->product_catalog = $pdf_name;
        $productDescription->save();

        Flash::success('Product Description updated successfully.');

        return redirect(route('productDescriptions.index'));
    }

    /**
     * Remove the specified ProductDescription from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productDescription = $this->productDescriptionRepository->find($id);

        if (empty($productDescription)) {
            Flash::error('Product Description not found');

            return redirect(route('productDescriptions.index'));
        }

        $this->productDescriptionRepository->delete($id);

        Flash::success('Product Description deleted successfully.');

        return redirect(route('productDescriptions.index'));
    }
}
