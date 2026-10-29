<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use App\Events\OrderPlaced;
use App\Models\User;

class OrderController extends Controller
{
    public function invoice(Order $order)
    {
        $invoice = Order::with('items.product', 'customer')
            ->findOrFail($order->id);

        foreach ($invoice->items as $item) {
                $item->total = $item->subtotal;
        }

        $invoice->total = $invoice->total_amount;

        $pdf = Pdf::loadView(
            'invoices.invoice',
            ['invoice' => $invoice]
        );

        return $pdf->download('invoice_' . $invoice->id . '.pdf');
    }

    public function create()
    {
        return view('transaksi');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'total_amount' => 'required|numeric|min:1',
        ]);

        $user = auth()->user();

        if (!$user) {
            return redirect('/register')
                ->withErrors(['email' => 'Silakan daftar atau login terlebih dahulu.']);
        }

        if (!$user) {
            return back()->withErrors([
                'total_amount' => 'Belum ada pengguna. Daftarkan pengguna terlebih dahulu.',
            ]);
        }

        $order = Order::create([
            'customer_id' => $user->id,
            'total_amount' => $data['total_amount'],
        ]);

        event(new OrderPlaced($order, $user));

        return back()->with('success', 'Transaksi berhasil disimpan dan event dipicu!');
    }
}
