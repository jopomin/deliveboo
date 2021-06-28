<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $orders = DB::table("placed_orders")
        ->selectRaw('COUNT(DISTINCT(placed_orders.id)) AS orders, MONTH(placed_orders.created_at) AS month')
        ->join("placed_order_product", "placed_order_id", "=", "placed_orders.id")
        ->join("products", "product_id", "=", "products.id")
        ->join("users", "user_id", "=", "users.id")
        ->where("user_id", "=", Auth::id())
            ->where("payment_status", "=", 1)
            ->whereYear("placed_orders.created_at", "=", "2021")
            ->groupBy("month")
            ->orderBy("month")
            ->get();

        $orders_month = [];

        $i = 1;

        foreach ($orders as $order) {
            while (count($orders_month) < 12) {
                if ($order->month == $i) {
                    array_push($orders_month, $order->orders);
                    $i++;
                    break;
                } else {
                    array_push($orders_month, 0);
                    $i++;
                }
            }
        }
        
        return Chartisan::build()
            ->labels(['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'])
            ->dataset('Ordini', $orders_month);
    }
}