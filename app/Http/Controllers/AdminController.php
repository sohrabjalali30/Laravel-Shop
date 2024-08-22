<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Products;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Category;
use Flasher\Prime\FlasherInterface;
use test\Mockery\MockingStaticMethodsCalledObjectStyleTest;

class AdminController extends Controller
{
    public function view_category()
    {
        $data= Category::all();
        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        toastr()->success('Category Added Successfully');
        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        toastr()->success('The Category Has Been Deleted');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }

    public function update_category(Request $request,$id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->success('Update category has been Successfully');
        return redirect('/view_category');
    }

    public function new_product()
    {
        $category = Category::all();
        return view('admin.new_product',compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Products;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->qty;
        $data->description = $request->des;
        $image = $request->image;
        if ($image){
            $imagename = time().'.'. $image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->success('New Product added Successfully');
        return redirect()->back();
    }

    public function all_products()
    {
        $product = Products::paginate(5);
        return view('admin.all_products',compact('product'));
    }

    public function delete_product($id)
    {
        $data = Products::find($id);
        $data->delete();
        $image_path = public_path('products/'.$data->image);
        if (file_exists($image_path))
        {
            unlink($image_path);
        }
        toastr()->deleted();
        return redirect()->back();
    }

    public function update_product($id)
    {
        $data = Products::find($id);
        $category = Category::all();

        return view('admin.update_product',compact('data','category'));
    }

    public function edit_product(Request $request,$id)
    {
        $data = Products::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->qty;
        $data->description = $request->des;
        $image = $request->image;
        if ($image){
            $imagename = time().'.'. $image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->success('Product Edit Successfully');
        return redirect('/all_products');
    }

    public function product_search(Request $request)
    {
        $search = $request->search;
        $product = Products::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(5);
        return view('admin.all_products',compact('product'));
    }

    public function view_orders()
    {
        $data = Order::all();
        return view('admin.view_orders',compact('data'));
    }

    public function on_way($id)
    {
        $data = Order::find($id);
        $data->status = 'On Way';
        $data->save();
        return redirect('/view_orders');
    }

    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'delivered';
        $data->save();
        return redirect('/view_orders');
    }

    public function print_order($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
