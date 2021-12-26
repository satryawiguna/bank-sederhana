<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Topup;
use App\Models\Transfer;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function transferIndex()
    {
        $balance = Balance::where('user_id', Auth()->id())
            ->select(DB::raw("SUM(value) as value"))
            ->first();

        return view('transfer', compact('balance'));
    }

    public function transferStore(Request $request)
    {
        $balance = Balance::where('user_id', Auth()->id())
            ->sum('value');

        $this->validate($request, [
            'value' => "required|min:0|max:$balance",
            'rekening' => "required",
            'receiver' => "required",
        ]);

        $transfer = new Transfer();
        $transfer->value = $request->value;
        $transfer->user_id = Auth()->id();
        $transfer->rekening = $request->rekening;
        $transfer->receiver = $request->receiver;
        $transfer->created_at = Carbon::now();
        $transfer->updated_at = Carbon::now();

        DB::beginTransaction();
        try {
            $transfer->save();

            $currentBalance = $balance - $transfer->value;

            $balance = Balance::where('user_id',Auth()->id())
                ->update(['value'=> $currentBalance]);

            DB::commit();

            return redirect()->back()->with('success','Data sudah ditambahkan');
        } catch (\Exception $e) {
            $errorCode = $e->errorInfo[1];
        }
    }

    public function withdrawIndex()
    {
        $balance = Balance::where('user_id', Auth()->id())
            ->select(DB::raw("SUM(value) as value"))
            ->first();

        return view('withdraw', compact('balance'));
    }

    public function withdrawStore(Request $request)
    {
        $balance = Balance::where('user_id', Auth()->id())
            ->sum('value');

        $this->validate($request, [
            'value' => "required|min:0|max:$balance",
        ]);

        $withdraw = new Withdraw();
        $withdraw->value = $request->value;
        $withdraw->user_id = Auth()->id();
        $withdraw->created_at = carbon::now();
        $withdraw->updated_at = carbon::now();

        DB::beginTransaction();
        try {
            $withdraw->save();

            $topup = $balance-$withdraw->value;

            Balance::where('user_id',Auth()->id())->update(['value'=> $topup]);

            DB::commit();
            return redirect()->back()->with('success','Data sudah ditambahkan');
        }
        catch (\Exception $e) {
            $errorCode = $e->errorInfo[1];
        }
    }

    public function topupIndex()
    {
        return view('topup');
    }

    public function topupStore(Request $request)
    {
        $this->validate($request, [
            'value' => 'required|min:0',
        ]);

        $topup = new Topup();
        $topup->value = $request->value;
        $topup->user_id = Auth()->id();
        $topup->created_at = carbon::now();
        $topup->updated_at = carbon::now();

        $balance = new Balance();
        $balance->value = $request->value;
        $balance->user_id = Auth()->id();
        $balance->created_at = carbon::now();
        $balance->updated_at = carbon::now();

        DB::beginTransaction();
        try {
            $topup->save();

            $_balance_ = Balance::where('user_id', Auth()->id())
                ->sum('value');

            if (empty($_balance_)) {
                $balance->save();
            }

            $topup = Topup::where('user_id', Auth()->id())
                ->sum('value');

            Balance::where('user_id',Auth()->id())->update(['value'=> $topup]);

            DB::commit();
            return redirect()->back()->with('success','Data sudah ditambahkan');
        }
        catch (\Exception $e) {
            $errorCode = $e->errorInfo[1];
        }
    }

}
