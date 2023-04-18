<div class="form-group col-sm-6">
    {!! Form::label('designation', 'Designation:') !!}
    {!! Form::text('designation', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dept_id', 'Department:') !!}
    {!! Form::select('dept_id', App\Models\Department::pluck('department','id'), null, ['class' => 'dept_id form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('designations.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
    <script>

        $(document).ready(function() {


            $('#dept_id').select2({
                placeholder: "Select a Department",
                allowClear: true
            });

        });


    </script>
@endsection

