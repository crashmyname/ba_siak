<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function product(Request $request)
    {
        $title = 'Data Product';
        if($request->ajax())
        {
            $product = Product::all();
            return DataTables::of($product)
            ->make(true);
        }
        return view('product.product',compact('title'));
    }
    
    public function addProduct(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'kode_product' => 'required',
            'nama_product' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
        ]);
        $product = new Product();
        $product->nama_supplier = $request->nama_supplier;
        $product->kode_product = $request->kode_product;
        $product->nama_product = $request->nama_product;
        $product->jumlah = $request->jumlah;
        $product->satuan = $request->satuan;
        $product->keterangan = $request->keterangan;        
        $product->save();
        return response()->json(['status'=>200]);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->nama_supplier = $request->nama_supplier;
        $product->kode_product = $request->kode_product;
        $product->nama_product = $request->nama_product;
        $product->jumlah = $request->jumlah;
        $product->satuan = $request->satuan;
        $product->keterangan = $request->keterangan;
        $product->save();
        return response()->json(['status' => 200]);
    }

    public function deleteProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json(['status' => 200]);
    }
}
