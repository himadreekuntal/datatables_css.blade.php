
<div class="card">
    <div class="card-header">
        <i class="fa fa-plus-square-o fa-lg"></i>
        <strong>Employees Basic Information</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group col-md-12">
                    <img id="output_image" src="{{asset('employee_images/' .$employee->image)}}" class="img-thumbnail" alt="your image" />
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('first_name', 'First Name:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->first_name }}" readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('last_name', 'Last Name:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->last_name }}"  readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('nationality', 'Nationality:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->nationality }}"  readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('voter_id', 'Voter Id:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->voter_id }}"  readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->email }}"  readonly>
                    </div>

                    <!-- Phone Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('phone', 'Phone:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->phone }}"  readonly>
                    </div>

                    <!-- Religion Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('religion', 'Religion:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->religion }}"  readonly>
                    </div>

                    <!-- Gender Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('gender', 'Gender:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->gender }}"  readonly>
                    </div>

                    <!-- Dob Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('dob', 'Dob:') !!}
                        <!-- {!! Form::text('dob', null, ['class' => 'form-control','id'=>'dob']) !!} -->
                        <input type="text" id = "dob" name="dob" value=" {{date('d-m-Y', strtotime($employee->dob))}}" readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('rfid', 'RFID:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->rfid }}"  readonly>
                    </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('blood_group', 'Blood Group:') !!}
                        {!! Form::text('blood_group', null, ['class' => 'form-control','id'=>'blood_group']) !!}
                    </div>


                    <!-- Category Id Field -->

                </div>


                <!-- Submit Field -->

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-plus-square-o fa-lg"></i>
                <strong>Employee's Address</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('present_address', 'Present Address:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->present_address }}"  readonly>
                    </div>

                    <!-- Permanent Address Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('permanent_address', 'Permanent Address:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->permanent_address }}"  readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-plus-square-o fa-lg"></i>
                <strong>Parent's Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-3">
                        {!! Form::label('father_name', 'Father Name:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->father_name }}"  readonly>
                    </div>

                    <!-- Father Phone Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('father_phone', 'Father Phone:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->father_phone }}"  readonly>
                    </div>

                    <!-- Mother Name Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('mother_name', 'Mother Name:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->mother_name }}"  readonly>
                    </div>

                    <!-- Mother Phone Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('mother_phone', 'Mother Phone:') !!}
                        <input type="text"  class= "form-control" value=" {{ $employee->mother_phone }}"  readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-plus-square-o fa-lg"></i>
                <strong>Education's Information</strong>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Education</th>
                        <th>Division</th>
                        <th>Institute</th>
                        <th>Passing Year</th>
                        <th>CGPA</th>

                    </tr>
                    </thead>
                    <tbody id="neworderbody" class="neworderbody">
                    <?php
                    $i = 1;
                    ?>
                    @foreach($educationEmployee as $item)
                        <tr>
                            <td class="no">{{ $i }}</td>
                                <?php  $i++; ?>
                            <td>
                                <input type="text" class="exam_name form-control" name="exam_names[]" value="{{$item->exam_name}}" readonly>

                            </td>
                            <td>
                                <input type="text" class="division form-control" name="divisions[]" value="{{$item->division}}" readonly>
                            </td>

                            <td>
                                <input type="text" class="institute form-control" name="institutes[]" value="{{$item->institute}}" readonly>
                            </td>
                            <td>
                                <input type="text" class="passing_year form-control" name="passing_years[]" value="{{$item->passing_year}}" readonly>
                            </td>
                            <td>
                                <input type="text" class="cgpa form-control" name="cgpas[]" value="{{$item->cgpa}}" readonly>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>-->

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-plus-square-o fa-lg"></i>
                <strong>Official Information</strong>
            </div>
            <div class="card-body">
                <div class="row">

                    <!-- Designation Id Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('designation_id', 'Designation Id:') !!}
                        <input type="text" id = "designation_id" name="designation_id" value=" {{ $employee->designation->designation }}" autocomplete="off">
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('joining_date', 'Joining Date:') !!}

                        <input type="text" id = "joining_date" name="joining_date" value=" {{date('d-m-Y', strtotime($employee->joining_date))}}" autocomplete="off">
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



