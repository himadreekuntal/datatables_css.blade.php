<div class="table-responsive">
    <table class="table" id="educationEmployees-table">
        <thead>
            <tr>
                <th>Employee Id</th>
        <th>Exam Name</th>
        <th>Division</th>
        <th>Institute</th>
        <th>Passing Year</th>
        <th>Cgpa</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($educationEmployees as $educationEmployee)
            <tr>
                       <td>{{ $educationEmployee->employee_id }}</td>
            <td>{{ $educationEmployee->exam_name }}</td>
            <td>{{ $educationEmployee->division }}</td>
            <td>{{ $educationEmployee->institute }}</td>
            <td>{{ $educationEmployee->passing_year }}</td>
            <td>{{ $educationEmployee->cgpa }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['educationEmployees.destroy', $educationEmployee->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                               <a href="{!! route('educationEmployees.show', [$educationEmployee->id]) !!}" class='btn btn-light action-btn '><i class="fa fa-eye"></i></a>
                               <a href="{!! route('educationEmployees.edit', [$educationEmployee->id]) !!}" class='btn btn-warning action-btn edit-btn'><i class="fa fa-edit"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
