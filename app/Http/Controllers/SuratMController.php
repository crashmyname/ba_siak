<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
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

class SuratMController extends Controller
{
    public function suratmasuk(Request $request)
    {
        $title = 'Surat Masuk';
        if($request->ajax())
        {
            $suratmasuk = SuratMasuk::leftJoin('product','suratmasuk.product_id','=','product.product_id')
                        ->select('suratmasuk.suratmasuk_id','suratmasuk.no_suratmasuk','suratmasuk.tgl_terima','suratmasuk.tgl_pembuatan','suratmasuk.no_po','product.nama_product','product.nama_supplier','suratmasuk.no_invoice','suratmasuk.no_faktur','suratmasuk.nominal','suratmasuk.keterangan')
                        ->get();
            return DataTables::of($suratmasuk)
            ->make(true);
        }
        $product = Product::all();
        return view('suratmasuk.suratmasuk',compact('title','product'));
    }
    
    public function addSuratmasuk(Request $request)
    {
        $request->validate([
            'no_suratmasuk' => 'required',
            'tgl_terima' => 'required',
            'tgl_pembuatan' => 'required',
            'no_po' => 'required',
            'product_id' => 'required',
            'no_invoice' => 'required',
            'no_faktur' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);
        $ceksupplier = Product::where('product_id',$request->product_id)->first();
        $result = !$ceksupplier ? '' : $ceksupplier->nama_supplier;
        $suratmasuk = new SuratMasuk();
        $suratmasuk->no_suratmasuk = $request->no_suratmasuk;     
        $suratmasuk->tgl_terima = $request->tgl_terima;     
        $suratmasuk->tgl_pembuatan = $request->tgl_pembuatan;     
        $suratmasuk->no_po = $request->no_po;     
        $suratmasuk->product_id = $request->product_id;     
        $suratmasuk->nama_supplier = $result;     
        $suratmasuk->no_invoice = $request->no_invoice;     
        $suratmasuk->no_faktur = $request->no_faktur;     
        $suratmasuk->nominal = $request->nominal;     
        $suratmasuk->keterangan = $request->keterangan;
        $cek = SuratMasuk::where('no_suratmasuk',$request->no_suratmasuk)->first();
        if(!$cek){
            $suratmasuk->save();
        } else {
            return response()->json(['status'=>300]);
        }     
        return response()->json(['status'=>200]);
    }

    public function updateSuratmasuk(Request $request, $id)
    {
        $suratmasuk = SuratMasuk::find($id);
        $cek = Product::where('product_id',$request->product_id)->first();
        $suratmasuk->no_suratmasuk = $request->no_suratmasuk;     
        $suratmasuk->tgl_terima = $request->tgl_terima;     
        $suratmasuk->tgl_pembuatan = $request->tgl_pembuatan;     
        $suratmasuk->no_po = $request->no_po;     
        $suratmasuk->product_id = $request->product_id;     
        $suratmasuk->nama_supplier = !$cek ? '' : $cek->nama_supplier;     
        $suratmasuk->no_invoice = $request->no_invoice;     
        $suratmasuk->no_faktur = $request->no_faktur;     
        $suratmasuk->nominal = $request->nominal;     
        $suratmasuk->keterangan = $request->keterangan;  
        $suratmasuk->save();
        return response()->json(['status' => 200]);
    }

    public function deleteSuratmasuk(Request $request, $id)
    {
        $suratmasuk = SuratMasuk::find($id);
        $suratmasuk->delete();
        return response()->json(['status' => 200]);
    }
}
