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

            $image = $manager->read($file->getRealPath());
            $watermark = $manager->read(public_path('images/watermark.png'))
                                ->scale(width: 100);

            $image->place($watermark, 'bottom-right', 10, 10);
            
            $encoded = $image->toPng();

            $filename = pathinfo($filename, PATHINFO_FILENAME) . '.png';
            $path = $folder . '/' . $filename;

            Storage::disk('public')->put($path, (string) $encoded);

            $data['image'] = $path;
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Produk ditambahkan');
    }

    public function edit($id)
    {
        $produk = Product::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Product::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|integer',
            'sku' => 'required|string|max:100|unique:products,sku,' . $produk->id,
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $file = $request->file('image');

        if ($file) {
            if ($produk->image) {
                \Illuminate\Support\Facades\Storage::disk('public')
                    ->delete($produk->image);
            }

            $filename = time() . '_' . preg_replace(
                '/[^A-Za-z0-9\-_]/',
                '_',
                pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)
            );

            $ext = strtolower($file->getClientOriginalExtension());
            $path = 'products/' . $filename . '.' . $ext;

            $manager = new \Intervention\Image\ImageManager(
                new \Intervention\Image\Drivers\Gd\Driver()
            );

            $image = $manager->read($file->getRealPath());

            if ($ext === 'png') {
                $encoded = $image->toPng();
            } else {
                $encoded = $image->toJpeg(quality: 75);
            }

            \Illuminate\Support\Facades\Storage::disk('public')
                ->put($path, (string) $encoded);

            $data['image'] = $path;
        } else {
            unset($data['image']);
        }

        $produk->update($data);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

        public function destroy($id)
    {
        $produk = Product::findOrFail($id);

        if ($produk->image) {
            \Illuminate\Support\Facades\Storage::disk('public')
                ->delete($produk->image);
        }

        $produk->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }

    public function create()
    {
        return view('produk.create');
    }

    public function previewImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $manager = new ImageManager(new Driver());

        $image = $manager->read(
            $request->file('image')->getRealPath()
        );

        return response(
            (string) $image->toJpeg(),
            200,
            ['Content-Type' => 'image/jpeg']
        );
    }
}
