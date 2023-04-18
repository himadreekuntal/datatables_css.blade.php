<div class="table-responsive">
    <table class="table" id="employeeSalaries-table">
        <thead>
            <tr>
                <th>Emp Id</th>
                <th>Home Allowance</th>
                <th>Car Allowance</th>
                <th>Medical Allowance</th>
                <th>Education Allowance</th>
                <th>Base Salary</th>
                <th>Pf</th>
                <th>Tax Duductible</th>
                <th>Total Salary</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employeeSalaries as $employeeSalary)
            <tr>
                <td>{{ $employeeSalary->emp->first_name }} {{ $employeeSalary->emp->last_nmae }}</td>
                <td>{{ $employeeSalary->home_allowance }}</td>
                <td>{{ $employeeSalary->car_allowance }}</td>
                <td>{{ $employeeSalary->medical_allowance }}</td>
                <td>{{ $employeeSalary->education_allowance }}</td>
                <td>{{ $employeeSalary->base_salary }}</td>
                <td>{{ $employeeSalary->pf }}</td>
                <td>{{ $employeeSalary->tax }}</td>
                <td>{{ $employeeSalary->total_salary }}</td>
                <td class=" text-center">
                   {!! Form::open(['route' => ['employeeSalaries.destroy', $employeeSalary->id], 'method' => 'delete']) !!}
                   <div class='btn-group'>
                       <a href="{!! route('employeeSalaries.show', [$employeeSalary->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                       <a href="{!! route('employeeSalaries.edit', [$employeeSalary->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                       {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                   </div>
                   {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
