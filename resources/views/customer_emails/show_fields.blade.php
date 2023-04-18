<!-- Category Field -->
<div class="form-group">
    {!! Form::label('category', 'Category:') !!}
    <p>{{ $customerEmail->category }}</p>
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
        <?php
        $i = 1; ?>

        @foreach(  $customerEmailDetail as $item)
        <tr>
            <td>{{$i}}</td>
            <?php  $i++; ?>
            <td>
                <input type="text" class="customer_name form-control" name="customer_names[]" value="{{ $item->customer_name }}" readonly>
            </td>
            <td>
                <input type="text" class="customer_company form-control" name="customer_companies[]" value="{{ $item->customer_company }}" readonly>
            </td>
            <td>
                <input type="text" class="customer_email form-control" name="customer_emails[]" value="{{ $item->customer_email }}" readonly>
            </td>

            <td>
                <input type="text" class="customer_phone form-control" name="customer_phones[]" value="{{ $item->customer_phone }}" readonly>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>


