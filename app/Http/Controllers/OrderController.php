<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;

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
}
