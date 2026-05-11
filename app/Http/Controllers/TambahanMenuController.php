<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TambahanMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.tambahan_menu.index', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu' => 'required|string|max:255',
            'link' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        ]);

        $namaFile = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage/menu_files'), $namaFile);
        }

        Menu::create([
            'menu' => $request->menu,
            'link' => $request->link,
            'file' => $namaFile,
        ]);

        return redirect()->back()->with('success', 'Menu berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        if ($menu->file) {
            $path = public_path('storage/menu_files/' . $menu->file);
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $menu->delete();
        return redirect()->back()->with('success', 'Menu berhasil dihapus.');
    }
}
