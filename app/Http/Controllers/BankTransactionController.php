<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBankTransactionRequest;
use App\Http\Requests\UpdateBankTransactionRequest;
use App\Models\BankTransaction;
use App\Models\CashHand;
use App\Repositories\BankTransactionRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Response;

class BankTransactionController extends AppBaseController
{
    /** @var BankTransactionRepository $bankTransactionRepository*/
    private $bankTransactionRepository;

    public function __construct(BankTransactionRepository $bankTransactionRepo)
    {
        $this->bankTransactionRepository = $bankTransactionRepo;
    }

    /**
     * Display a listing of the BankTransaction.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $bankTransactions = $this->bankTransactionRepository->all();

        return view('bank_transactions.index')
            ->with('bankTransactions', $bankTransactions);
    }

    /**
     * Show the form for creating a new BankTransaction.
     *
     * @return Response
     */
    public function create()
    {
      /*  $yesterday = Carbon::yesterday()->format('Y-m-d');
        $cashHY = CashHand::where('date',$yesterday)->first();
        if($cashHY == NULL){
            $cashY = 0;
        }
        else{
            $cashY = $cashHY ->amount;
        }*/

        $tDate = date('Y-m-d');
        $cashHand = CashHand::where('date',$tDate)->first();

        if($cashHand == NULL)
        {
           $cashT = 0;
        }
        else
        {
            $cashT = $cashHand ->amount;

        }

        return view('bank_transactions.create',compact('cashT'));
    }

    /**
     * Store a newly created BankTransaction in storage.
     *
     * @param CreateBankTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateBankTransactionRequest $request)
    {
        $input = $request->all();

        $bankTransaction = $this->bankTransactionRepository->create($input);
        $tDate = date('Y-m-d');
        $cashHand = CashHand::where('date',$tDate)->first();

            $totalcashHand = ($cashHand->amount)-($request->amount);
            CashHand::where('date',$tDate)->update(['amount'=>$totalcashHand]);


        Flash::success('Bank Transaction saved successfully.');

        return redirect(route('bankTransactions.index'));
    }

    /**
     * Display the specified BankTransaction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $bankTransaction = $this->bankTransactionRepository->find($id);

        if (empty($bankTransaction)) {
            Flash::error('Bank Transaction not found');

            return redirect(route('bankTransactions.index'));
        }

        return view('bank_transactions.show')->with('bankTransaction', $bankTransaction);
    }

    /**
     * Show the form for editing the specified BankTransaction.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {


        $bankTransaction = BankTransaction::findorfail($id);
        $cashHand = \App\Models\CashHand::all()->last();
        $amount = $cashHand->amount;

        $cashT = $amount+($bankTransaction->amount);

        return view('bank_transactions.edit',compact('bankTransaction','cashT'));
    }

    /**
     * Update the specified BankTransaction in storage.
     *
     * @param int $id
     * @param UpdateBankTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBankTransactionRequest $request)
    {
        $bankTransaction = BankTransaction::findorfail($id);
        $cashHand = \App\Models\CashHand::all()->last();
        $amount = $cashHand->amount;
        $cashH = $amount+($bankTransaction->amount);
        $bankTransaction->amount = $request->amount;
        $bankTransaction->date = $request->date;
        $bankTransaction->save();

        $tDate = date('Y-m-d');
        $cashHand = CashHand::where('date',$tDate)->first();
        $totalcashHand = ($cashH)-($request->amount);
        CashHand::where('date',$tDate)->update(['amount'=>$totalcashHand]);

        Flash::success('Bank Transaction updated successfully.');

        return redirect(route('bankTransactions.index'));
    }

    /**
     * Remove the specified BankTransaction from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $bankTransaction = BankTransaction::findorfail($id);
        $cashHand = \App\Models\CashHand::all()->last();
        $amount = $cashHand->amount;
        $cashH = $amount+($bankTransaction->amount);
        $bankTransaction->delete();
        $tDate = date('Y-m-d');
        CashHand::where('date',$tDate)->update(['amount'=>$cashH]);

        Flash::success('Bank Transaction deleted successfully.');

        return redirect(route('bankTransactions.index'));
    }
}
