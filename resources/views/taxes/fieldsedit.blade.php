<!-- Criteria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('criteria', 'Criteria') !!}
    {!! Form::text('criteria', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('age_limit', 'Age Limit') !!}
    {!! Form::text('age_limit', null, ['class' => 'form-control']) !!}
</div>


<div class="table">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Percentage</th>
            <th></th>
        </tr>
        </thead>
        <tbody class="neworderbody">
        <?php
        $i = 1; ?>
        @foreach($taxDetail as $taxDetail)
            <tr>
                <td>{{$i}}</td>
                    <?php  $i++; ?>

                <td>
                    <input type="text" class="name form-control" name="names[]" value="{{$taxDetail->name}}">
                </td>

                <td>
                    <input type="text" class="amount form-control" name="amounts[]" value="{{$taxDetail->amount}}">
                </td>

                <td>
                    <input type="text" class="tax_percentage form-control" name="tax_percentages[]" value="{{$taxDetail->tax_percentage}}">
                </td>

                <td>
                    <input type="button" class="btn btn-danger delete" value="x">
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>  <br/>
    <input type="button" class=" btn-lg btn-primary add" value="Add New Item">
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('taxes.index') }}" class="btn btn-light">@lang('Cancel')</a>
</div>

@section('scripts')
    <script>
        $('.add').click(function () {
            var n = ($('.neworderbody tr').length - 0) + 1;
            var tr = '<tr><td class="no">' + n + '</td>' +
                '<td> <input type="text" class="name form-control" name="names[]" value="{{ old('name') }}"></td>' +
                '<td> <input type="text" class="amount form-control" name="amounts[]" value="{{ old('amount') }}"></td>' +
                '<td> <input type="text" class="tax_percentage form-control" name="tax_percentages[]" value="{{ old('tax_percentage') }}"></td>' +
                '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.neworderbody').append(tr);
        });

        $('.neworderbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
        });

    </script>
@endsection


