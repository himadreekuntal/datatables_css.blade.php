<!-- Emp Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('emp_id', __('Employee').':') !!}
    <select name="emp_id" id="emp_id" class="emp_id form-control">
        <option value=""></option>
        @foreach($employee as $r)
            <option  value="{!! $r->id !!}" >{!! $r->first_name !!} {!! $r->last_name !!}</option>
        @endforeach
    </select>
</div>
<!-- Base Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('base_salary', __('Base Salary').':') !!}
    {!! Form::text('base_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Home Allowance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('home_allowance', __('Home Allowance').':') !!}
    {!! Form::text('home_allowance', null, ['class' => 'form-control']) !!}
</div>

<!-- Car Allowance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('car_allowance', __('Car Allowance').':') !!}
    {!! Form::text('car_allowance', null, ['class' => 'form-control']) !!}
</div>

<!-- Medical Allowance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medical_allowance', __('Medical Allowance').':') !!}
    {!! Form::text('medical_allowance', null, ['class' => 'form-control']) !!}
</div>

<!-- Education Allowance Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education_allowance', __('Education Allowance').':') !!}
    {!! Form::text('education_allowance', null, ['class' => 'form-control']) !!}
</div>


<!-- Pf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pf', __('Provident Fund').':') !!}
    {!! Form::text('pf', null, ['class' => 'form-control']) !!}
</div>


<!-- Pf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tax', __('Tax').':') !!}
    {!! Form::text('tax', null, ['class' => 'form-control']) !!}
</div>

<!-- Total Salary Field -->
<div class="form-group col-sm-6">
    {!! Form::label('total_salary', __('Total Salary').':') !!}
    {!! Form::text('total_salary', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('employeeSalaries.index') }}" class="btn btn-light">@lang('Cancel')</a>
</div>

@section('scripts')
    <script>
        $(document).on('change keyup blur','#base_salary',function(){
            emp_id = $('#emp_id').val();
            base_salary = $('#base_salary').val();
            pf = $('#pf').val();
            calculateTotal();
            calculateTax(emp_id,base_salary,pf);

        });
        $(document).on('change keyup blur','#home_allowance',function(){
            calculateTotal();
        });
        $(document).on('change keyup blur','#car_allowance',function(){
            calculateTotal();
        });
        $(document).on('change keyup blur','#medical_allowance',function(){
            calculateTotal();
        });  $(document).on('change keyup blur','#education_allowance',function(){
            calculateTotal();
        });  $(document).on('change keyup blur','#pf',function(){
            emp_id = $('#emp_id').val();
            base_salary = $('#base_salary').val();
            pf = $('#pf').val();
            calculateTotal();
            calculateTax(emp_id,base_salary,pf);
        });
        function calculateTotal(){
            baseSalary = $('#base_salary').val();
            homeAllowance = $('#home_allowance').val();
            carAllowance = $('#car_allowance').val();
            medicalAllowance = $('#medical_allowance').val();
            educationAlllowance = $('#education_allowance').val();
            tax = $('#tax').val();
            pf = $('#pf').val();
            var total ;
            total = Number(baseSalary)+Number(homeAllowance)+Number(carAllowance)+Number(medicalAllowance)+Number(educationAlllowance)-Number(pf)-Number(tax);
            $('#total_salary').val(total.toFixed(2));
        }

        function calculateTax(emp_id,base_salary,pf){
            bs = Number(base_salary);
            tpf = Number(pf);
            totalB = bs-tpf;
            empID = emp_id;

            $.ajax({  //create an ajax request to display.php
                type: "GET",
                url: "{{URL('tax/{empId}/{totalA}')}}",
                data: {empId: empID, totalA: totalB },

                success: function(dataResult){
                    var resultData = dataResult;
                    var mtax = resultData / 12 ;
                    $('#tax').val(mtax);
                    calculateTotal();
                }
            });
            // xhr.abort();
        }

    </script>
@endsection
