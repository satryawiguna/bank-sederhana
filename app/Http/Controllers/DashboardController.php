<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Topup;
use App\Models\Transfer;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $transfer = Transfer::where('user_id', Auth()->id())
            ->select('receiver', 'rekening', 'value', 'created_at')
            ->get();

        $withdraw = Withdraw::where('user_id', Auth()->id())
            ->select('value', 'created_at')
            ->get();

        $topup = Topup::where('user_id', Auth()->id())
            ->select('value', 'created_at')
            ->get();

        $balance = Balance::where('user_id', Auth()->id())
            ->select(DB::raw("SUM(value) as value"))
            ->get()
            ->first();

        return view('dashboard', compact('transfer', 'withdraw',
            'topup', 'balance'));
    }
}
