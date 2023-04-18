<div class="table-responsive">
    <table class="table table-bordered" id="monthlySalaries-table">
        <thead>
            <tr>
                <th>Select Employee</th>
                <th>Salary Created At</th>
                <th>Employee Details</th>
                <th>Advance Payment</th>
                <th>Payable Salary</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($monthlySalaries as $monthlySalary)
            <tr>
                <td><input type="checkbox" name="id[]" value="{{$monthlySalary->id}}"></td>
                       <td>{{date('d-m-Y', strtotime($monthlySalary->created_at))}}</td>
            <td>Name: {{ $monthlySalary->employee->first_name }} {{ $monthlySalary->employee->last_name }} <br>
                Department: {{ $monthlySalary->employee->designation->department->department }}<br>
                Designation: {{ $monthlySalary->employee->designation->designation }} </td>
            <td> Tk. {{ number_format($monthlySalary->advance_payment, 2) }}</td>
            <td> Tk. {{ number_format($monthlySalary->payable_salary, 2) }}</td>
                @if($monthlySalary->salary_status == NULL)
                    <td>Salary Not Approved</td>
                @else
                    <td>Salary Approved</td>
                @endif
                       <td class=" text-center">
                           {!! Form::open(['route' => ['monthlySalaries.destroy', $monthlySalary->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('monthlySalaries.show', [$monthlySalary->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('monthlySalaries.edit', [$monthlySalary->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               <a href="{!! route('salary-approve', [$monthlySalary->id]) !!}" class='btn btn-success action-btn edit-btn'><i class="fa fa-check"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
