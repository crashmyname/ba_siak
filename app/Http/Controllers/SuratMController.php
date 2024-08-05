<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use App\Models\Product;
use App\Models\DetailProduct;
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
            $suratmasuk = SuratMasuk::all();
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
            // 'product_id' => 'required',
            'no_invoice' => 'required',
            'no_faktur' => 'required',
            'ppn' => 'required',
            'total' => 'required',
            'keterangan' => 'required',
        ]);
        // $ceksupplier = Product::where('product_id',$request->product_id)->first();
        // $result = !$ceksupplier ? '' : $ceksupplier->nama_supplier;
        $suratmasuk = new SuratMasuk();
        $suratmasuk->no_suratmasuk = $request->no_suratmasuk;     
        $suratmasuk->tgl_terima = $request->tgl_terima;     
        $suratmasuk->tgl_pembuatan = $request->tgl_pembuatan;     
        $suratmasuk->no_po = $request->no_po;     
        // $suratmasuk->product_id = $request->product_id;     
        // $suratmasuk->nama_supplier = $result;     
        $suratmasuk->no_invoice = $request->no_invoice;     
        $suratmasuk->no_faktur = $request->no_faktur;     
        $suratmasuk->ppn = $request->ppn;     
        $suratmasuk->total = $request->total;     
        if ($request->hasFile('berkas')) {
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
        // $cek = Product::where('product_id',$request->product_id)->first();
        $suratmasuk->no_suratmasuk = $request->no_suratmasuk;     
        $suratmasuk->tgl_terima = $request->tgl_terima;     
        $suratmasuk->tgl_pembuatan = $request->tgl_pembuatan;     
        $suratmasuk->no_po = $request->no_po;     
        // $suratmasuk->product_id = $request->product_id;     
        // $suratmasuk->nama_supplier = !$cek ? '' : $cek->nama_supplier;     
        $suratmasuk->no_invoice = $request->no_invoice;     
        $suratmasuk->no_faktur = $request->no_faktur;     
        $suratmasuk->ppn = $request->ppn;
        $suratmasuk->total = $request->total;
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

    public function detailProduct(Request $request,$id)
    {
        $suratmasuk = SuratMasuk::find($id);
        if($request->ajax()){
            $dproduct = DetailProduct::leftJoin('product','detailproduct.product_id','=','product.product_id')
            ->where('suratmasuk_id',$id)
            ->get();
            return DataTables::of($dproduct)
            ->make(true);
        }
    }

    public function pdfSuratMasuk(Request $request, $id)
    {
        $file = public_path('pdf/suratjalan.pdf');
        $suratmasuk = SuratMasuk::find($id);
        $dproduct = DetailProduct::select('detailproduct.suratmasuk_id','suratmasuk.no_suratmasuk','suratmasuk.no_faktur','suratmasuk.no_po','suratmasuk.no_invoice','suratmasuk.tgl_terima','suratmasuk.tgl_pembuatan','product.nama_product','suratmasuk.ppn','suratmasuk.keterangan','suratmasuk.total')
        ->leftJoin('suratmasuk','detailproduct.suratmasuk_id','=','suratmasuk.suratmasuk_id')
        ->leftJoin('product','detailproduct.product_id','=','product.product_id')
        ->where('detailproduct.suratmasuk_id',$suratmasuk->suratmasuk_id)
        ->get();
        // dd($dproduct);
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
            // Posisi Y awal
            $startY = 118;
            $lineHeight = 18; // Tinggi baris untuk setiap data
            foreach ($dproduct as $key => $value) {
                // $fpdi->Text(15,118,$value->nama_product);
                $fpdi->Text(15, $startY + ($key * $lineHeight), $value->nama_product);
                $fpdi->SetFont('Arial','',10);
                $fpdi->Text(114, $startY + ($key * $lineHeight), $value->ppn);
                $fpdi->Text(135, $startY + ($key * $lineHeight), 'Rp. '.$value->total);
                $fpdi->Text(170, $startY + ($key * $lineHeight), $value->keterangan);
            }
            // $fpdi->Text(114,118,$suratmasuk->ppn);
            // $fpdi->Text(114,137,$suratmasuk->ppn);
            // $fpdi->Text(114,155,$suratmasuk->ppn);
            // $fpdi->SetFont('Arial','',10);
            // $fpdi->Text(135,118,"Rp.".($suratmasuk->total));
            // $fpdi->Text(135,137,"Rp.".($suratmasuk->total));
            // $fpdi->Text(135,155,"Rp.".($suratmasuk->total));
            // $fpdi->Text(175,118,$suratmasuk->keterangan);
            // $fpdi->Text(175,137,$suratmasuk->keterangan);
            // $fpdi->Text(175,155,$suratmasuk->keterangan);
        }
        return $fpdi->Output($combine, 'I');
    }
}
