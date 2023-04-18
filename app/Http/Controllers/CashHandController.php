<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCashHandRequest;
use App\Http\Requests\UpdateCashHandRequest;
use App\Repositories\CashHandRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CashHandController extends AppBaseController
{
    /** @var CashHandRepository $cashHandRepository*/
    private $cashHandRepository;

    public function __construct(CashHandRepository $cashHandRepo)
    {
        $this->cashHandRepository = $cashHandRepo;
    }

    /**
     * Display a listing of the CashHand.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $cashHands = $this->cashHandRepository->all();

        return view('cash_hands.index')
            ->with('cashHands', $cashHands);
    }

    /**
     * Show the form for creating a new CashHand.
     *
     * @return Response
     */
    public function create()
    {
        return view('cash_hands.create');
    }

    /**
     * Store a newly created CashHand in storage.
     *
     * @param CreateCashHandRequest $request
     *
     * @return Response
     */
    public function store(CreateCashHandRequest $request)
    {
        $input = $request->all();

        $cashHand = $this->cashHandRepository->create($input);

        Flash::success('Cash Hand saved successfully.');

        return redirect(route('cashHands.index'));
    }

    /**
     * Display the specified CashHand.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cashHand = $this->cashHandRepository->find($id);

        if (empty($cashHand)) {
            Flash::error('Cash Hand not found');

            return redirect(route('cashHands.index'));
        }

        return view('cash_hands.show')->with('cashHand', $cashHand);
    }

    /**
     * Show the form for editing the specified CashHand.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cashHand = $this->cashHandRepository->find($id);

        if (empty($cashHand)) {
            Flash::error('Cash Hand not found');

            return redirect(route('cashHands.index'));
        }

        return view('cash_hands.edit')->with('cashHand', $cashHand);
    }

    /**
     * Update the specified CashHand in storage.
     *
     * @param int $id
     * @param UpdateCashHandRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCashHandRequest $request)
    {
        $cashHand = $this->cashHandRepository->find($id);

        if (empty($cashHand)) {
            Flash::error('Cash Hand not found');

            return redirect(route('cashHands.index'));
        }

        $cashHand = $this->cashHandRepository->update($request->all(), $id);

        Flash::success('Cash Hand updated successfully.');

        return redirect(route('cashHands.index'));
    }

    /**
     * Remove the specified CashHand from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cashHand = $this->cashHandRepository->find($id);

        if (empty($cashHand)) {
            Flash::error('Cash Hand not found');

            return redirect(route('cashHands.index'));
        }

        $this->cashHandRepository->delete($id);

        Flash::success('Cash Hand deleted successfully.');

        return redirect(route('cashHands.index'));
    }
}
