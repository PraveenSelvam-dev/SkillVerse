<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Withdrawal;

class AdminPaymentController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::with('user')->latest()->paginate(20);
        return view('admin.payments.index', compact('transactions'));
    }

    public function withdrawals(Request $request)
    {
        $withdrawals = Withdrawal::with('user')->latest()->paginate(20);
        return view('admin.withdrawals.index', compact('withdrawals'));
    }

    public function approveWithdrawal($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'approved';
        $withdrawal->save();
        return redirect()->back()->with('success', 'Withdrawal approved successfully');
    }

    public function rejectWithdrawal($id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $withdrawal->status = 'rejected';
        $withdrawal->save();
        return redirect()->back()->with('success', 'Withdrawal rejected');
    }
}
