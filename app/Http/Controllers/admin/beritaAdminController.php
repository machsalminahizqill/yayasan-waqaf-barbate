<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;
class beritaAdminController extends Controller
{
    public function mainPage()
    {
        $beritas =  berita::Paginate(15);

        return view('admin.pages.berita.main')
        ->with('beritas', $beritas);
    }

    public function detailPage($slug, $id)
    {
        $berita = berita::where('id', $id)->where('slug', $slug)->first();

        return view('admin.pages.berita.detail')
        ->with('berita', $berita);

    }

    public function TambahPage()
    {

        return view('admin.pages.berita.tambah');


    }

    public function editPage($slug, $id)
    {
        $berita = berita::where('id', $id)->where('slug', $slug)->first();

        return view('admin.pages.berita.edit')
        ->with('berita', $berita);
    }



    public function addBerita(Request $request)
    {

         $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('assets/uploads/berita/', $filename);
            $gambar =  '/assets/uploads/berita/' .$filename;
        } else {
            $gambar = "/assets/12.jpg";
        }

        berita::create([
            "judul" => $request->judul,
            "slug" => Str::slug($request->judul, '-'),
            "konten" => $request->konten,
            "gambar" => $gambar
        ]);

        return redirect()->route('beritaAdmin');
    }

    public function editBerita(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png',
        ]);
        $berita = berita::find($request->id);

        if ($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;
            $file->move('assets/uploads/berita/', $filename);
            $gambar =  '/assets/uploads/berita/' .$filename;

            File::delete(public_path($berita->gambar));
        } else {
            $gambar = $berita->gambar;
        }

        $berita->judul = $request->judul;
        $berita->slug = Str::slug($request->judul, '-');
        $berita->konten = $request->konten;
        $berita->gambar = $gambar;
        $berita->save();

        return redirect('/admin/berita/'. $berita->slug .'/'. $berita->id);
    }

    public function hapusBerita($slug, $id)
    {
        $berita = berita::where('id', $id)->where('slug', $slug)->first();
        $berita->delete();

        return redirect()->route('beritaAdmin');

    }
}
