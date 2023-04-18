<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category', 'Category:') !!}
    {!! Form::text('category', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<div class="table">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Customer Name</th>
            <th>Company Name</th>
            <th>Company Email</th>
            <th>Company Mobile Number</th>
        </tr>
        </thead>
        <tbody class="neworderbody">
        <tr>
            <td>1</td>
            <td>
                <input type="text" class="customer_name form-control" name="customer_names[]" value="{{ old('customer_name') }}">
            </td>
            <td>
                <input type="text" class="customer_company form-control" name="customer_companies[]" value="{{ old('customer_company') }}">
            </td>
            <td>
                <input type="text" class="customer_email form-control" name="customer_emails[]" value="{{ old('customer_email') }}">
            </td>

            <td>
                <input type="text" class="customer_phone form-control" name="customer_phones[]" value="{{ old('customer_phone') }}">
            </td>

            <td>
                <input type="button" class="btn btn-danger delete" value="x">
            </td>
        </tr>
        </tbody>
    </table>  <br/>
    <input type="button" class="btn btn-lg btn-primary add" value="Add New Item">
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('customerEmails.index') }}" class="btn btn-light">Cancel</a>
</div>
@section('scripts')
    <script>
        $('.add').click(function () {
            var n = ($('.neworderbody tr').length - 0) + 1;
            var tr = '<tr><td class="no">' + n + '</td>' + ' <td><input type="text" class="customer_name form-control" name="customer_names[]" value="{{ old('customer_name') }}"> </td>' +
                '<td> <input type="text" class="customer_company form-control" name="customer_companies[]" value="{{ old('customer_company') }}"></td>'+
                '<td><input type="text" class="customer_email form-control" name="customer_emails[]" value="{{ old('customer_email') }}"></td>' +
                '<td><input type="text" class="customer_phone form-control" name="customer_phones[]" value="{{ old('customer_phone') }}"></td>' +
                '<td><input type="button" class="btn btn-danger delete" value="x"></td></tr>';
            $('.neworderbody').append(tr);
        });

        $('.neworderbody').delegate('.delete', 'click', function () {
            $(this).parent().parent().remove();
        });
    </script>
@endsection
