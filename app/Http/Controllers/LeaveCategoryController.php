<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeaveCategoryRequest;
use App\Http\Requests\UpdateLeaveCategoryRequest;
use App\Repositories\LeaveCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class LeaveCategoryController extends AppBaseController
{
    /** @var LeaveCategoryRepository $leaveCategoryRepository*/
    private $leaveCategoryRepository;

    public function __construct(LeaveCategoryRepository $leaveCategoryRepo)
    {
        $this->leaveCategoryRepository = $leaveCategoryRepo;
    }

    /**
     * Display a listing of the LeaveCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $leaveCategories = $this->leaveCategoryRepository->all();

        return view('leave_categories.index')
            ->with('leaveCategories', $leaveCategories);
    }

    /**
     * Show the form for creating a new LeaveCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('leave_categories.create');
    }

    /**
     * Store a newly created LeaveCategory in storage.
     *
     * @param CreateLeaveCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateLeaveCategoryRequest $request)
    {
        $input = $request->all();

        $leaveCategory = $this->leaveCategoryRepository->create($input);

        Flash::success('Leave Category saved successfully.');

        return redirect(route('leaveCategories.index'));
    }

    /**
     * Display the specified LeaveCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $leaveCategory = $this->leaveCategoryRepository->find($id);

        if (empty($leaveCategory)) {
            Flash::error('Leave Category not found');

            return redirect(route('leaveCategories.index'));
        }

        return view('leave_categories.show')->with('leaveCategory', $leaveCategory);
    }

    /**
     * Show the form for editing the specified LeaveCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $leaveCategory = $this->leaveCategoryRepository->find($id);

        if (empty($leaveCategory)) {
            Flash::error('Leave Category not found');

            return redirect(route('leaveCategories.index'));
        }

        return view('leave_categories.edit')->with('leaveCategory', $leaveCategory);
    }

    /**
     * Update the specified LeaveCategory in storage.
     *
     * @param int $id
     * @param UpdateLeaveCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLeaveCategoryRequest $request)
    {
        $leaveCategory = $this->leaveCategoryRepository->find($id);

        if (empty($leaveCategory)) {
            Flash::error('Leave Category not found');

            return redirect(route('leaveCategories.index'));
        }

        $leaveCategory = $this->leaveCategoryRepository->update($request->all(), $id);

        Flash::success('Leave Category updated successfully.');

        return redirect(route('leaveCategories.index'));
    }

    /**
     * Remove the specified LeaveCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $leaveCategory = $this->leaveCategoryRepository->find($id);

        if (empty($leaveCategory)) {
            Flash::error('Leave Category not found');

            return redirect(route('leaveCategories.index'));
        }

        $this->leaveCategoryRepository->delete($id);

        Flash::success('Leave Category deleted successfully.');

        return redirect(route('leaveCategories.index'));
    }
}
