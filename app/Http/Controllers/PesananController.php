<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Facades\Invoice;

class PesananController extends Controller
{
    function downloadPdf(Pesanan $pesanan) {
        $customer = new Buyer([
            'custom_fields' => [
                'Nama'          => $pesanan->nama,
                'Nomor Kursi' => $pesanan->nomor_kursi,
                'Dari'          => $pesanan->titik_jemput,
                'Tujuan'        => $pesanan->titik_antar    
                ]
        ]);

        $client = new Party([
            "name" => "THOYYIB TRAVEL",
            'address'       => 'Jalan Ingsub Gang Pelita IV,Tanah,Bumbu, Kalimantan Selatan Telp:0853-5046-8697 Email:thoyyibtravel@gmail.com',
            'custom_fields' => [
        'order number' => '> 654321 <',
    ],
        ]);

        
        $item = InvoiceItem::make('Tiket')
        ->pricePerUnit($pesanan->total_tagihan)
        ->quantity($pesanan->jumlah_penumpang);
        
        
        $invoice = Invoice::make()
        ->buyer($customer)
        ->seller($client)
        ->currencySymbol('Rp')
        ->currencyCode('IDR') 
        ->currencyFormat('{SYMBOL} {VALUE}') 
        ->logo(public_path('img/logo.png'))
        ->addItem($item);
        
        return $invoice->stream();
    }
}
