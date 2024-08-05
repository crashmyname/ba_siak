<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DetailProduct;
use App\Models\SuratMasuk;
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

class DetailProductController extends Controller
{
    public function detailproduct(Request $request, $id)
    {
        $title = 'Detail Product';
        $suratmasuk = SuratMasuk::find($id);
        $product = Product::all();
        return view('suratmasuk.detailproduct',compact('title','product','suratmasuk','id'));
    }
    
    public function addDetail(Request $request,$id)
    {
        $request->validate([
            'product_id' => 'required',
        ]);
        $product = new DetailProduct();
        $product->suratmasuk_id = $id;
        $product->product_id = $request->product_id;      
        $product->save();
        $notification = [
            'title' => 'Success!',
            'text' => 'Added Successfully',
            'icon' => 'success',
        ];
        return redirect()->route('dproduct',$id)->with('notification',$notification);
    }
}
