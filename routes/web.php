<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\OrderPlaced;
use App\Models\Order;
use App\Models\User;

Route::get('/register', [RegisterController::class,  'showRegistrationForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.store');

Route::view('/test-email', 'emails.test');

Route::post('/test-email', [EmailController::class, 'sendEmail'])
->name('email.send');

Route::get('/', function () {
    return view('welcome');
});

//Routing menuju Controller
Route::get('/produk', [ProdukController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('products.index');

Route::get('/produk/tambah', [ProdukController::class, 'create'])
    ->name('produk.create');

Route::post('/produk', [ProdukController::class, 'store'])
    ->name('produk.store');

Route::post('/produk/preview-image', [ProdukController::class, 'previewImage'])
    ->name('produk.previewImage');

Route::view('/produk/preview', 'produk.preview');

Route::get('/products/{id}/edit', [ProdukController::class, 'edit'])
    ->name('products.edit');

Route::put('/products/{id}', [ProdukController::class, 'update'])
    ->name('products.update');

Route::delete('/products/{id}', [ProdukController::class, 'destroy'])
    ->name('products.destroy');

Route::get('/produk/{id}', [ProdukController::class, 'show']);
Route::get('/laporan', LaporanPenjualanController::class);

Route::get('/produk-toko', function () {
    $produk = [
        [
            'nama' => 'Beras',
            'sku' => 'BR001',
            'harga' => 75000,
            'stok' => 20,
            'gambar' => asset('images/beras.jpeg')
        ],
        [
            'nama' => 'Minyak Goreng',
            'sku' => 'MG001',
            'harga' => 18000,
            'stok' => 30,
            'gambar' => asset('images/minyak.jpeg')
        ],
        [
            'nama' => 'Gula',
            'sku' => 'GL001',
            'harga' => 16000,
            'stok' => 25,
            'gambar' => asset('images/gula.jpeg')
        ],
    ];

    return view('daftar_produk', [
        'produk' => $produk
    ]);
});

Route::get('/orders/{order}/invoice', [OrderController::class, 'invoice'])
    ->name('orders.invoice');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/')->with(
        'success',
        'Alamat email berhasil diverifikasi!'
    );
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with(
        'success',
        'Email verifikasi berhasil diminta ulang!'
    );
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/test-broadcast', function () {
    $order = Order::first();

    if (!$order) {
        return 'Belum ada data order di database.';
    }

    $user = $order->customer;

    if (!$user) {
        return 'Order belum memiliki customer.';
    }

    OrderPlaced::dispatch($order, $user);

    return 'Event OrderPlaced berhasil dipicu!';
})->middleware('auth');

Route::get('/transaksi', [OrderController::class, 'create'])
    ->name('transaksi.create');

Route::post('/transaksi', [OrderController::class, 'store'])
    ->name('transaksi.store');