<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use App\Models\Transaction;
use App\Models\WholesellerWallet;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session, Alert, DB, Image, File;
use App\User;
use App\Admin;
use  Hashids, DataTables;
use App\Models\TaxRate;
use App\Models\CouriersAssignment;
use App\Models\CouriersAssignmentDetail;


class AccountStatementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)

    {
        if ($request->ajax()) {
            
            $users = collect([]);
            $userId = (@$request->user_id) ? $request->user_id : 0;
            $transactions = Transaction::with('cart', 'user')->where('user_id', $userId);
            
            if(!empty($request->start_date) and !empty($request->end_date)){

                $startDate = $request->start_date;
                $endDate = $request->end_date;

                $transactions->whereDate('created_at','>=',$startDate)->whereDate('created_at','<=',$endDate);

                $transactions = $transactions->get();

            
                $grand_total = 0;
                foreach ($transactions as $transaction) {
                    if ($transaction->is_refunded == 1){
                        $grand_total = $grand_total + 0;
                    } else {
                        $grand_total = $grand_total + $transaction->amount;
                    }
                }

                $debit = WholesellerWallet::where('user_id', $userId)->whereDate('created_at','<', $startDate)->sum('debit');
                $credit = WholesellerWallet::where('user_id', $userId)->whereDate('created_at','<', $startDate)->sum('credit');
                $debit = ($debit)?$debit:0;
                $credit = ($credit)?$credit:0;

                $afterCreditAmount = 0;
                $afterCredit = WholesellerWallet::where('user_id', $userId)
                                    ->whereDate('created_at','>=', $startDate)
                                    ->whereDate('created_at','<=',$endDate)
                                    ->whereNotNull('credit')
                                    ->get();
                $afterCreditHtml = '';
                foreach($afterCredit as $wallet) {
                    $afterCreditAmount = $afterCreditAmount + $wallet->credit;

                    $paymentMode = '';
                    if ($wallet->payment_mode != '') {
                        $paymentMode = ' (' . ucfirst($wallet->payment_mode) . ')';
                    }

                    $afterCreditHtml .= date('m/d/Y', strtotime($wallet->created_at)) . ' - ' . number_format($wallet->credit, 2) . $paymentMode  . '<br/>';
                }        
                $afterCredit = ($afterCredit)?$afterCredit:0;

                $previousAmount = $credit-$debit;

                $users->push([
                    'date' => date('m/d/Y', strtotime($startDate)) . '-' . date('m/d/Y', strtotime($endDate)),
                    'previous_amount' => number_format($previousAmount, 2),
                    'invoice_total' => number_format($grand_total, 2),
                    'after_credit' => $afterCreditHtml,
                    'remaining_amount' => number_format((($previousAmount + $afterCreditAmount) - $grand_total), 2),
                    'grand_total' => $grand_total,
                    'customer_name' => @$transaction->user->first_name . ' ' . @$transaction->user->last_name,
                    'company_name' => @$transaction->user->company_name,
                    'phone' => @$transaction->user->phone,
                    'email' => @$transaction->user->email,
                    'address' => @$transaction->user->address,
                ]);
            }
            

            return Datatables::of($users)
                    ->rawColumns(['after_credit'])
                    ->make(true);
        }
        
        $data = User::whereIn('type', ['dropshipper','wholesaler'])->get();
        

        return view('admin.account-statement.2', compact('data'));
    }
}

