<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Product;

class ProdukController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $daftarProduk = Product::latest()->get();

        $kategori = 'Elektronik';
        
        return view('produk.index', compact('kategori', 'daftarProduk'));
    }
    // Menampilkan detail produk berdasarkan parameter ID
    public function show($id)
    {
        return view('produk.detail', ['id' => $id]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|integer',
            'sku' => 'required|string|max:100|unique:products,sku',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $file = $request->file('image');
        if ($file) {
            $original = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $ext = strtolower($file->getClientOriginalExtension());
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-_]/', '_', $original) . '.' . $ext;
            $folder = 'products';
            $path = $folder . '/' . $filename;

            $manager = new ImageManager(new Driver());

            $image = $manager->read($file->getRealPath())
                            ->cover(800, 800);
            
            if ($ext === 'png') {
                $encoded = $image->toPng();
            } else {
                $encoded = $image->toJpeg(quality: 85);
            }

            Storage::disk('public')->put($path, (string) $encoded);

            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk ditambahkan');
    }

    public function create()
    {
        return view('produk.create');
    }
}
