<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SalesChart extends BaseChart
{
    /**
    * Handles the HTTP request for the given chart.
    * It must always return an instance of Chartisan
    * and never a string or an array.
    */
    public function handler(Request $request): Chartisan
    {
        $sales = DB::table("placed_orders")
        ->selectRaw('SUM(total_price) AS price, MONTH(placed_orders.created_at) AS month')
        ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
        ->join("products", "product_id", "=", "products.id")
        ->join("users", "user_id", "=", "users.id")
        ->where("user_id", "=", Auth::id())
        ->whereYear("placed_orders.created_at", "=", "2021")
        ->groupBy("month")
        ->orderBy('month')
        ->get();

        $sales_month = [];

        $i = 1;

        foreach ($sales as $sale) {
            while (count($sales_month) < 12) {
                if ($sale->month == $i) {
                    array_push($sales_month, $sale->price);
                    $i++;
                    break;
                } else {
                    array_push($sales_month, 0);
                    $i++;
                }
            }
        }
        
        return Chartisan::build()
        ->labels(['Gennaio', 'Febbraio', 'Marzo','Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre','Ottobre', 'Novembre', 'Dicembre'])
        ->dataset('Vendite', $sales_month);
    }
}