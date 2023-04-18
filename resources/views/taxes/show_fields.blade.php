<!-- Criteria Field -->

<!-- Criteria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('criteria', __('Criteria').':') !!}
    <p>{{$tax -> criteria}}</p>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('age_limit', 'Age Limit') !!}
    <p>{{$tax -> age_limit}}</p>
</div>


<div class="table">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Amount</th>
            <th>Percentage</th>

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
                    <input type="text" class="name form-control" name="names[]" value="{{$taxDetail->name}}" readonly>
                </td>

                <td>
                    <input type="text" class="amount form-control" name="amounts[]" value="{{$taxDetail->amount}}" readonly>
                </td>

                <td>
                    <input type="text" class="tax_percentage form-control" name="tax_percentages[]" value="{{$taxDetail->tax_percentage}}" readonly>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>  <br/>

</div>




