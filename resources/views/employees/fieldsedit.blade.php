
<div class="card">
    <div class="card-header">
        <i class="fa fa-plus-square-o fa-lg"></i>
        <strong>Employees Basic Information</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group col-md-12">
                    <img id="output_image" src="{{ asset('img/no-image-icon.png') }}" class="img-thumbnail" alt="your image" />
                    <input type="hidden" class="form-control" name="image_name" value="{{$employee->image}}">
                    <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="image/*" name="image" onchange="preview_image(event)"></span>
                </div>


            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="form-group col-sm-6">
                        {!! Form::label('first_name', 'First Name:') !!}
                        {!! Form::text('first_name', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('last_name', 'Last Name:') !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('nationality', 'Nationality:') !!}
                        {!! Form::text('nationality', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('voter_id', 'National ID Number:') !!}
                        {!! Form::text('voter_id', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::email('email', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <!-- Phone Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('phone', 'Phone:') !!}
                        {!! Form::text('phone', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <!-- Religion Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('religion', 'Religion:') !!}
                        <select name="religion" id="religion" class="religion form-control">
                            <option selected value="">Please Select One</option>
                            <option value="muslim" {{($employee->religion === 'muslim') ? 'Selected' : ''}}>Muslim</option>
                            <option  value="hindu" {{($employee->religion === 'hindu') ? 'Selected' : ''}}>Hindu</option>
                            <option  value="buddhist" {{($employee->religion === 'buddhist') ? 'Selected' : ''}}>Buddhist</option>
                            <option  value="christian" {{($employee->religion === 'christian') ? 'Selected' : ''}}>Christian</option>
                            <option  value="other" {{($employee->religion === 'other') ? 'Selected' : ''}}>Other</option>
                        </select>
                    </div>

                    <!-- Gender Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('gender', 'Gender:') !!}
                        <select name="gender" id="gender" class="gender form-control">
                            <option selected value="">Please Select One</option>
                            <option  value="male" {{($employee->gender === 'male') ? 'Selected' : ''}}>Male</option>
                            <option  value="female" {{($employee->gender === 'female') ? 'Selected' : ''}}>Female</option>
                            <option  value="other" {{($employee->other === 'other') ? 'Selected' : ''}}>Other</option>
                        </select>
                    </div>

                    <!-- Dob Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('dob', 'Date of Birth:') !!}
                        {!! Form::text('dob', null, ['class' => 'form-control','id'=>'dob','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('rfid', 'RFID:') !!}
                        <input type="read" class="form-control" name="rfid" id="rfid" value="{{$employee->rfid}}" readonly>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('tax_catagory', 'Tax Category:') !!}
                        <select name="tax_category" id="tax_category" class="tax_category selectpicker form-control" data-actions-box="true"  data-live-search="true" , data-done-button="true">
                            <option selected value="">Please Select One</option>
                            @foreach($tax as $r)
                                <option value="{!! $r->id !!}" {{($employee->tax_category === $r->id) ? 'Selected' : ''}}>{!! $r->criteria !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Category Id Field -->
                </div>

                <div class="row">

                    <div class="form-group col-sm-6">
                        {!! Form::label('documents', 'Documents:') !!}<br/>
                        <input type="hidden" name="employee_document" value="{{ $employee->documents }}">
                        <span style="margin-top: 15px;margin-bottom: 15px;margin-right: 15px;" class="btn btn-light"><input type="file" accept="pdf/*" name="documents"></span>

                    </div>

                    <!-- Status Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('status', 'Status:') !!}
                        {!! Form::hidden('status', 0) !!}
                        {!! Form::checkbox('status', '1', null) !!}
                    </div>
                </div>
                <!-- Submit Field -->

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-plus-square-o fa-lg"></i>
                <strong>Parent's Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-4">
                        {!! Form::label('father_name', 'Father Name:') !!}
                        {!! Form::text('father_name', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <!-- Father Phone Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('father_phone', 'Father Phone:') !!}
                        {!! Form::text('father_phone', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('father_profession', 'Father Profession:') !!}
                        {!! Form::text('father_profession', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <!-- Mother Name Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('mother_name', 'Mother Name:') !!}
                        {!! Form::text('mother_name', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <!-- Mother Phone Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('mother_phone', 'Mother Phone:') !!}
                        {!! Form::text('mother_phone', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('mother_profession', 'Mother Profession:') !!}
                        {!! Form::text('mother_profession', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-plus-square-o fa-lg"></i>
                <strong>Employee's official Information</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-lg-6">
                        {!! Form::label('present_address', 'Present Address:') !!}
                        {!! Form::textarea('present_address', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <!-- Permanent Address Field -->
                    <div class="form-group col-lg-6">
                        {!! Form::label('permanent_address', 'Permanent Address:') !!}
                        {!! Form::textarea('permanent_address', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('designation_id', 'Designation Id:') !!}
                        <select name="designation_id" id="designation_id" class="designation_id selectpicker form-control" data-actions-box="true"  data-live-search="true" , data-done-button="true">
                            <option value="">Choose Designation</option>
                            @foreach($designation as $r)
                                <option value="{!! $r->id !!}" {{($employee->designation_id === $r->id) ? 'Selected' : ''}}>{!! $r->designation !!}</option>
                            @endforeach

                        </select>
                    </div>
                   <div class="form-group col-sm-4">
                        {!! Form::label('joining_date', 'Joining Date:') !!}
                        {!! Form::text('joining_date', null, ['class' => 'form-control','id'=>'joining_date','autocomplete'=>'off']) !!}
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
                        <th>Delete</th>

                    </tr>
                    </thead>
                    <tbody class="neworderbody">
                        <tr>
                            <td class="no">1</td>
                            <td>
                                <input type="text" class="exam_name form-control" name="exam_name[]" value="{{ old('exam_name') }}" autocomplete="off">
                            </td>
                            <td>
                                <input type="text" class="division form-control" name="division[]" value="{{ old('division') }}" autocomplete="off">
                            </td>

                            <td>
                                <input type="text" class="institute form-control" name="institute[]" value="{{ old('institute') }}" autocomplete="off">
                            </td>
                            <td>
                                <input type="text" class="passing_year form-control" name="passing_year[]" value="{{ old('passing_year') }}" autocomplete="off">
                            </td>
                            <td>
                                <input type="text" class="cgpa form-control" name="cgpa[]" value="{{ old('cgpa') }}" autocomplete="off">
                            </td>

                            <td>
                                <input type="button" class="btn btn-danger delete" value="x">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <input type="button" class="btn btn-lg btn-primary add" value="Add New Item">
            </div>
        </div>
    </div>
</div>-->



<div class="row">
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('employees.index') }}" class="btn btn-default">Cancel</a>
    </div>
</div>


@section('scripts')
    <script>
        function preview_image(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function preview_doc(event)
        {
            var reader = new FileReader();
            reader.onload = function()
            {
                var output = document.getElementById('output_doc');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        $('#dob').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        })
        $('#joining_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        })





        /*   var i=$('table tr').length;
           $('.add').click(function ()
           {
               var education = $('.education_id').html();
               //  var tr = $(this).parent().parent();
               var n = ($('.neworderbody tr').length - 0) + 1;
               var tr = '<tr><td class="no">' + n + '</td>' +  '<td><input type="text" class="education form-control" name="education[]" value="{{ old('education') }}"></td>' +

                '<td><input type="text" class="division form-control" name="division[]" value="{{ old('division') }}" autocomplete="off"></td>' +
                '<td><input type="text" class="institute form-control" name="institute[]" value="{{ old('institute') }}" autocomplete="off"></td>' +
                '<td><input type="text" class="passing_year form-control" name="passing_year[]" value="{{ old('passing_year') }}" autocomplete="off"></td>' +
                '<td><input type="text" class="cgpa form-control" name="cgpa[]" value="{{ old('cgpa') }}" autocomplete="off"></td>' +
                '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.neworderbody').append(tr);

            $('.education_id').selectpicker();

        });

        $('.neworderbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();

        });*/

        var sdate = $('#dob').val();
        var date = new Date(sdate);

        var day = date.getDate();
        var month = date.getMonth() + 1;
        var year = date.getFullYear();

        if (month < 10) month = "0" + month;
        if (day < 10) day = "0" + day;

        var today = day + "-" + month + "-" + year;


        var sdate1 = $('#joining_date').val();
        var date1 = new Date(sdate1);

        var day1 = date1.getDate();
        var month1 = date1.getMonth() + 1;
        var year1 = date1.getFullYear();

        if (month1 < 10) month1 = "0" + month1;
        if (day1 < 10) day1 = "0" + day1;

        var today1 = day1 + "-" + month1 + "-" + year1;



        document.getElementById('joining_date').value = today1;
        document.getElementById('dob').value = today;
    </script>
@endsection
