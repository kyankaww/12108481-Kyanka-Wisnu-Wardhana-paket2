<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\Customer;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;


class SaleController extends Controller
{
    public function index()
    {
        $data['type_menu'] = 'sale';
        $data['products'] = Product::all();
        $data['sales'] = Sale::where('userId', Auth::user()->id)->get();

        return view('pages.sale.index', $data);
    }

    public function detail($id)
    {
        $data['type_menu'] = 'sale';
        $data['sales'] = Sale::where('id', $id)->first();
        $data['saleDetails'] = SaleDetail::where('saleId', $id)->get();

        return view('pages.sale.detail', $data);
    }

    public function store(Request $request)
    {
        $totalPrice = 0;
        $customer_id = Customer::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'address' => $request->address,
        ]);

            $sale_id = Sale::create([
                'totalPrice' => 0,
                'date' => date('Y-m-d'),
                'userId' => Auth::user()->id,
                'customerId' => $customer_id->id
            ]);
            foreach ($request->qty as $id =>  $qty) {
                $product = Product::where('id', $id)->first();
                $product->stock = $product->stock - $qty;
                $product->save();


                $subPrice = $product->price * $qty;
                $totalPrice = $totalPrice + $subPrice;

                    if ($qty >= 1) {

                        SaleDetail::create([
                                'saleId' => $sale_id->id ?? 1,
                                'productId' => $product->id,
                                'qty' => $qty,
                                'subPrice' => $subPrice,
                            ]
                        );
                    }
            }

                Sale::where('id', $sale_id->id)->update([
                    'totalPrice' => $totalPrice
                ]);

                if ($totalPrice  == 0) {
                    return redirect()->route('penjualan')->with('error', 'Gagal membuat penjualan : tidak ada item terjual');
                } else {
                    $data['sales'] = Sale::where('id', $sale_id->id)->first();
                    $data['saleDetails'] = SaleDetail::where('saleId', $sale_id->id)->get();

                    $pdf = Pdf::loadView('pages.sale.invoice', $data);
                    return $pdf->download('invoicee.pdf');
                }
    }

    public function invoice($id)
    {


        $data['sales'] = Sale::where('id', $id)->first();
        $data['saleDetails'] = SaleDetail::where('saleId', $id)->get();

        $pdf = Pdf::loadView('pages.sale.invoice', $data);
        return $pdf->download('invoice.pdf');
    }
}
