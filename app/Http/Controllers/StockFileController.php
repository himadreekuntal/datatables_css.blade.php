<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStockFileRequest;
use App\Http\Requests\UpdateStockFileRequest;
use App\Repositories\StockFileRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class StockFileController extends AppBaseController
{
    /** @var  StockFileRepository */
    private $stockFileRepository;

    public function __construct(StockFileRepository $stockFileRepo)
    {
        $this->stockFileRepository = $stockFileRepo;
    }

    /**
     * Display a listing of the StockFile.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $stockFiles = $this->stockFileRepository->all();

        return view('stock_files.index')
            ->with('stockFiles', $stockFiles);
    }

    /**
     * Show the form for creating a new StockFile.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_files.create');
    }

    /**
     * Store a newly created StockFile in storage.
     *
     * @param CreateStockFileRequest $request
     *
     * @return Response
     */
    public function store(CreateStockFileRequest $request)
    {
        $input = $request->all();

        $stockFile = $this->stockFileRepository->create($input);

        Flash::success('Stock File saved successfully.');

        return redirect(route('stockFiles.index'));
    }

    /**
     * Display the specified StockFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockFile = $this->stockFileRepository->find($id);

        if (empty($stockFile)) {
            Flash::error('Stock File not found');

            return redirect(route('stockFiles.index'));
        }

        return view('stock_files.show')->with('stockFile', $stockFile);
    }

    /**
     * Show the form for editing the specified StockFile.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockFile = $this->stockFileRepository->find($id);

        if (empty($stockFile)) {
            Flash::error('Stock File not found');

            return redirect(route('stockFiles.index'));
        }

        return view('stock_files.edit')->with('stockFile', $stockFile);
    }

    /**
     * Update the specified StockFile in storage.
     *
     * @param int $id
     * @param UpdateStockFileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateStockFileRequest $request)
    {
        $stockFile = $this->stockFileRepository->find($id);

        if (empty($stockFile)) {
            Flash::error('Stock File not found');

            return redirect(route('stockFiles.index'));
        }

        $stockFile = $this->stockFileRepository->update($request->all(), $id);

        Flash::success('Stock File updated successfully.');

        return redirect(route('stockFiles.index'));
    }

    /**
     * Remove the specified StockFile from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockFile = $this->stockFileRepository->find($id);

        if (empty($stockFile)) {
            Flash::error('Stock File not found');

            return redirect(route('stockFiles.index'));
        }

        $this->stockFileRepository->delete($id);

        Flash::success('Stock File deleted successfully.');

        return redirect(route('stockFiles.index'));
    }
}
