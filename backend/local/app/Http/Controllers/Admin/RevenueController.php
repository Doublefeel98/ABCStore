<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Revenue;
use DB;

class RevenueController extends Controller
{
    public function getRevenueAll(Request $req)
    {
        $data['selectType'] = 0;

        $data['revenue'] = Revenue::all();

        if(!empty($data['revenue'])){
            $data['sum_sale'] = 0;
            $data['sum_buy'] = 0;
            $data['sum_salary'] = 0;
            $data['sum_income'] = 0;
            foreach ($data['revenue'] as $key => $value) {
                $data['sum_sale'] += $value->reve_sale;
                $data['sum_buy'] += $value->reve_buy;
                $data['sum_salary'] += $value->reve_salary;
                $data['sum_income'] += $value->reve_income;
            }
        }

        return view('admin.revenue_statistics.revenue_all',$data);
    }

    public function getRevenueMonth(Request $req)
    {
        $data['selectType'] = 1;

        $data['revenue'] = Revenue::where('reve_year',$req->year)
            ->get();
        
        $data['year'] = $req->year;

        if(!empty($data['revenue'])){
            $data['sum_sale'] = 0;
            $data['sum_buy'] = 0;
            $data['sum_salary'] = 0;
            $data['sum_income'] = 0;
            foreach ($data['revenue'] as $key => $value) {
                $data['sum_sale'] += $value->reve_sale;
                $data['sum_buy'] += $value->reve_buy;
                $data['sum_salary'] += $value->reve_salary;
                $data['sum_income'] += $value->reve_income;
            }
        }
        return view('admin.revenue_statistics.revenue_month',$data);
    }

    public function getRevenueQuarter(Request $req)
    {

        $data['selectType'] = 2;

        $data['revenue'] = Revenue::where('reve_year',$req->year)
            ->select(DB::raw('reve_quarter, revenue.reve_year, SUM(revenue.reve_sale) AS reve_sale, SUM(revenue.reve_buy) AS reve_buy, SUM(revenue.reve_salary) AS reve_salary, SUM(revenue.reve_income) AS reve_income'))
            ->groupBy('reve_quarter')
            ->get();

        $data['year'] = $req->year;

        if(!empty($data['revenue'])){
            $data['sum_sale'] = 0;
            $data['sum_buy'] = 0;
            $data['sum_salary'] = 0;
            $data['sum_income'] = 0;
            foreach ($data['revenue'] as $key => $value) {
                $data['sum_sale'] += $value->reve_sale;
                $data['sum_buy'] += $value->reve_buy;
                $data['sum_salary'] += $value->reve_salary;
                $data['sum_income'] += $value->reve_income;
            }
        }
        return view('admin.revenue_statistics.revenue_quarter',$data);
    }

    public function getRevenueYear(Request $req)
    {
        $data['selectType'] = 3;

        $data['revenue'] = Revenue::select(DB::raw('revenue.reve_year, SUM(revenue.reve_sale) AS reve_sale, SUM(revenue.reve_buy) AS reve_buy, SUM(revenue.reve_salary) AS reve_salary, SUM(revenue.reve_income) AS reve_income'))
            ->groupBy('reve_year')
            ->get();
        
        if(!empty($data['revenue'])){
            $data['sum_sale'] = 0;
            $data['sum_buy'] = 0;
            $data['sum_salary'] = 0;
            $data['sum_income'] = 0;
            foreach ($data['revenue'] as $key => $value) {
                $data['sum_sale'] += $value->reve_sale;
                $data['sum_buy'] += $value->reve_buy;
                $data['sum_salary'] += $value->reve_salary;
                $data['sum_income'] += $value->reve_income;
            }
        }
        return view('admin.revenue_statistics.revenue_year',$data);
    }

    
}