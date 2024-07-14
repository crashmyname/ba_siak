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
use setasign\Fpdi\Fpdi;

class SuratMController extends Controller
{
    public function suratmasuk(Request $request)
    {
        $title = 'Surat Masuk';
        if($request->ajax())
        {
            $suratmasuk = SuratMasuk::leftJoin('product','suratmasuk.product_id','=','product.product_id')
                        ->select('suratmasuk.suratmasuk_id','suratmasuk.no_suratmasuk','suratmasuk.tgl_terima','suratmasuk.tgl_pembuatan','suratmasuk.no_po','product.nama_product','product.nama_supplier','suratmasuk.no_invoice','suratmasuk.no_faktur','suratmasuk.nominal','suratmasuk.keterangan','suratmasuk.berkas')
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
        $suratmasuk->quantity = $request->quantity;     
        $suratmasuk->nominal = $request->nominal;     
        if ($request->hasFile('file')) {
            $file = $request->file('berkas');
            $oriname = $file->getClientOriginalName();
            $file->storeAs('public/berkas', $oriname);
            $suratmasuk->berkas = $oriname;
        }    
        $suratmasuk->keterangan = $request->keterangan;
        $cek = SuratMasuk::where('no_suratmasuk',$request->no_suratmasuk)->first();
        if(!$cek){
            $suratmasuk->save();
        } else {
            return response()->json(['status'=>300]);
        }
        \Artisan::call('storage:link');     
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
        $suratmasuk->quantity = $request->quantity;
        $suratmasuk->nominal = $request->nominal;
        if($request->hasFile('berkas')){
            $path = 'berkas/'.$suratmasuk->berkas;
            if(Storage::disk('public')->exists($path)){
                Storage::disk('public')->delete($path);
            }
            $oriname = $request->berkas->getClientOriginalName();
            $pict = $request->file('berkas')->storeAs('public/berkas',$oriname);
            $suratmasuk->berkas = $oriname;
        }
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

    public function reportSuratMasuk()
    {
        return view('suratmasuk.reportsuratmasuk');
    }

    public function pdfSuratMasuk(Request $request, $id)
    {
        $file = public_path('pdf/suratjalan.pdf');
        $suratmasuk = SuratMasuk::find($id);
        $product = Product::where('product_id',$suratmasuk->product_id)->first();
        $folderpath = public_path('/pdf/suratjalan/'.$id);
        if(!file_exists($folderpath)){
            mkdir($folderpath, 0777, true);
        }
        $namafile = $suratmasuk->no_suratmasuk." | ". $suratmasuk->tgl_pembuatan;
        $combine = $folderpath."/".$namafile.".pdf";
        $fpdi = new FPDI;
        $source = $fpdi->setSourceFile($file);
        $fpdi->SetTitle($namafile);
        for($i = 1; $i<=$source;$i++){
            $template = $fpdi->importPage($i);
            $size = $fpdi->getTemplateSize($template);
            $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
            $fpdi->useTemplate($template);
            $fpdi->SetFont('Arial', "",12);
            $fpdi->SetTextColor(0,0,0);
            $fpdi->Text(46,69.6,$suratmasuk->no_suratmasuk);
            $fpdi->Text(45.7,76.2,$suratmasuk->no_faktur);
            $fpdi->Text(46,83,$suratmasuk->no_po);
            $fpdi->Text(160,69.6,$suratmasuk->no_invoice);
            $fpdi->Text(160,76.2,Carbon::parse($suratmasuk->tgl_terima)->format('d-m-Y'));
            $fpdi->Text(160,83,Carbon::parse($suratmasuk->tgl_pembuatan)->format('d-m-Y'));
            $fpdi->Text(15,118,$product->nama_product);
            $fpdi->Text(114,118,$suratmasuk->quantity);
            // $fpdi->SetFont('Arial','',10);
            $fpdi->Text(135,118,"Rp.".($suratmasuk->quantity * $suratmasuk->nominal));
            $fpdi->Text(175,118,$suratmasuk->keterangan);
        }
        return $fpdi->Output($combine, 'I');
    }
}
