<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEducationEmployeeRequest;
use App\Http\Requests\UpdateEducationEmployeeRequest;
use App\Repositories\EducationEmployeeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class EducationEmployeeController extends AppBaseController
{
    /** @var  EducationEmployeeRepository */
    private $educationEmployeeRepository;

    public function __construct(EducationEmployeeRepository $educationEmployeeRepo)
    {
        $this->educationEmployeeRepository = $educationEmployeeRepo;
    }

    /**
     * Display a listing of the EducationEmployee.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $educationEmployees = $this->educationEmployeeRepository->all();

        return view('education_employees.index')
            ->with('educationEmployees', $educationEmployees);
    }

    /**
     * Show the form for creating a new EducationEmployee.
     *
     * @return Response
     */
    public function create()
    {
        return view('education_employees.create');
    }

    /**
     * Store a newly created EducationEmployee in storage.
     *
     * @param CreateEducationEmployeeRequest $request
     *
     * @return Response
     */
    public function store(CreateEducationEmployeeRequest $request)
    {
        $input = $request->all();

        $educationEmployee = $this->educationEmployeeRepository->create($input);

        Flash::success('Education Employee saved successfully.');

        return redirect(route('educationEmployees.index'));
    }

    /**
     * Display the specified EducationEmployee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $educationEmployee = $this->educationEmployeeRepository->find($id);

        if (empty($educationEmployee)) {
            Flash::error('Education Employee not found');

            return redirect(route('educationEmployees.index'));
        }

        return view('education_employees.show')->with('educationEmployee', $educationEmployee);
    }

    /**
     * Show the form for editing the specified EducationEmployee.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $educationEmployee = $this->educationEmployeeRepository->find($id);

        if (empty($educationEmployee)) {
            Flash::error('Education Employee not found');

            return redirect(route('educationEmployees.index'));
        }

        return view('education_employees.edit')->with('educationEmployee', $educationEmployee);
    }

    /**
     * Update the specified EducationEmployee in storage.
     *
     * @param int $id
     * @param UpdateEducationEmployeeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEducationEmployeeRequest $request)
    {
        $educationEmployee = $this->educationEmployeeRepository->find($id);

        if (empty($educationEmployee)) {
            Flash::error('Education Employee not found');

            return redirect(route('educationEmployees.index'));
        }

        $educationEmployee = $this->educationEmployeeRepository->update($request->all(), $id);

        Flash::success('Education Employee updated successfully.');

        return redirect(route('educationEmployees.index'));
    }

    /**
     * Remove the specified EducationEmployee from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $educationEmployee = $this->educationEmployeeRepository->find($id);

        if (empty($educationEmployee)) {
            Flash::error('Education Employee not found');

            return redirect(route('educationEmployees.index'));
        }

        $this->educationEmployeeRepository->delete($id);

        Flash::success('Education Employee deleted successfully.');

        return redirect(route('educationEmployees.index'));
    }
}
