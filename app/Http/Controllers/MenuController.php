<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::latest()->get();

        // $menu = Menu::all();

        // dd($menu);

        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|mimes:jpeg,png,jpg,gif,svg'
        ]);


        $menu = new Menu();
        $menu->nama = $request->nama;
        $menu->deskripsi = $request->deskripsi;
        $menu->harga = $request->harga;

        if ($request->hasFile('gambar')) {
            $upload = $request->file('gambar')->store('public/menu');
            $fileName = basename($upload);
            $menu->gambar = $fileName;
        }

        $menu->save();
        
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);

        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {

            $request->validate([
                'nama' => 'required',
                'deskripsi' => 'required',
                'harga' => 'required|numeric|min:0',
                'gambar' => 'nullable|mimes:jpeg,png,jpg,gif,svg'
            ]);

            $menu = Menu::findOrFail($id);
            $menu->nama = $request->nama;
            $menu->deskripsi = $request->deskripsi;
            $menu->harga = $request->harga;

            if ($menu->gambar && Storage::exists('public/menu/' . $menu->gambar)) {
                Storage::delete('public/menu/' . $menu->gambar);
            }

            // Upload gambar baru
            $upload = $request->file('gambar')->store('public/menu');
            $fileName = basename($upload);
            $menu->gambar = $fileName;

            $menu->save();

            return redirect()->route('menu.index')->with('success', 'Menu berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        // kalau ketemu dapet data sebagai array
        // kalau tidak ketemu akan return page not found
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
