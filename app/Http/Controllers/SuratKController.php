<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratKeluar;
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

class SuratKController extends Controller
{
    public function suratkeluar(Request $request)
    {
        $title = 'Surat Keluar';
        if($request->ajax())
        {
            $suratkeluar = SuratKeluar::all();
            return DataTables::of($suratkeluar)
            ->make(true);
        }
        return view('suratkeluar.suratkeluar',compact('title'));
    }
    
    public function addSuratkeluar(Request $request)
    {
        $request->validate([
            'no_suratkeluar' => 'required',
            'tgl_terima' => 'required',
            'tgl_pembuatan' => 'required',
            'no_po' => 'required',
            // 'product_id' => 'required',
            // 'nama_supplier' => 'required',
            'no_invoice' => 'required',
            'no_faktur' => 'required',
            'nominal' => 'required',
            'keterangan' => 'required',
        ]);
        $suratkeluar = new SuratKeluar();
        $suratkeluar->no_suratkeluar = $request->no_suratkeluar;     
        $suratkeluar->tgl_terima = $request->tgl_terima;     
        $suratkeluar->tgl_pembuatan = $request->tgl_pembuatan;     
        $suratkeluar->no_po = $request->no_po;         
        $suratkeluar->no_invoice = $request->no_invoice;     
        $suratkeluar->no_faktur = $request->no_faktur;     
        $suratkeluar->nominal = $request->nominal;     
        $suratkeluar->keterangan = $request->keterangan;
        $cek = SuratKeluar::where('no_suratkeluar',$request->no_suratkeluar)->first();
        if(!$cek){
            $suratkeluar->save();
        } else {
            return response()->json(['status'=>300]);
        }    
        return response()->json(['status'=>200]);
    }

    public function updateSuratkeluar(Request $request, $id)
    {
        $suratkeluar = SuratKeluar::find($id);
        $suratkeluar->no_suratkeluar = $request->no_suratkeluar;     
        $suratkeluar->tgl_terima = $request->tgl_terima;     
        $suratkeluar->tgl_pembuatan = $request->tgl_pembuatan;     
        $suratkeluar->no_po = $request->no_po;         
        $suratkeluar->no_invoice = $request->no_invoice;     
        $suratkeluar->no_faktur = $request->no_faktur;     
        $suratkeluar->nominal = $request->nominal;     
        $suratkeluar->keterangan = $request->keterangan;  
        $suratkeluar->save();
        return response()->json(['status' => 200]);
    }

    public function deleteSuratkeluar(Request $request, $id)
    {
        $suratkeluar = SuratKeluar::find($id);
        $suratkeluar->delete();
        return response()->json(['status' => 200]);
    }
}
