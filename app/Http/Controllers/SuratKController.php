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
use setasign\Fpdi\Fpdi;

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

    public function reportSuratKeluar()
    {
        return view('suratkeluar.reportsuratkeluar');
    }

    public function pdfSuratKeluar(Request $request, $id)
    {
        $file = public_path('pdf/suratjalan.pdf');
        $suratkeluar = SuratKeluar::find($id);
        $product = Product::where('product_id',$suratkeluar->product_id)->first();
        $folderpath = public_path('/pdf/suratjalan/'.$id);
        if(!file_exists($folderpath)){
            mkdir($folderpath, 0777, true);
        }
        $namafile = $suratkeluar->no_suratkeluar." | ". $suratkeluar->tgl_pembuatan;
        $combine = $folderpath."/".$namafile.".pdf";
        $fpdi = new FPDI;
        $source = $fpdi->setSourceFile($file);
        $fpdi->SetTitle($namafile);
        for($i = 1; $i<=$source;$i++){
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTempateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $fpdi->SetFont('Arial', "",12);
            $fpdi->SetTextColor(0,0,0);
            $fpdi->Text(20,10,$suratkeluar->no_suratkeluar);
            $fpdi->Text(20,15,$suratkeluar->no_faktur);
            $fpdi->Text(20,18,$suratkeluar->no_po);
            $fpdi->Text(30,18,$suratkeluar->no_invoice);
            $fpdi->Text(30,20,$suratkeluar->tgl_terima);
            $fpdi->Text(30,23,$suratkeluar->tgl_pembuatan);
            $fpdi->Text(40,13,$product->nama_product);
            $fpdi->Text(40,15,$suratkeluar->nominal);
            $fpdi->Text(45,15,$suratkeluar->keterangan);
        }
        return $fpdi->Output($combine, 'I');
    }
}
