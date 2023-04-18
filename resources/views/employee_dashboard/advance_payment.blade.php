@extends('employee_layouts.app')
@section('title')
   Advance Payment
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3>Advance Payment</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{url('employee/advance-payment-store')}}"  enctype="multipart/form-data">
                                @csrf
                                <div class="row">


                                    <!-- Advance Payment Field -->
                                    <div class="form-group col-sm-6">
                                        {!! Form::label('advance_payment', __('Amount(Tk.)').':') !!}
                                        <input type="text" class="form-control employee_id" id="employee_id" name="employee_id" value="{{$employeeID}}" hidden>
                                        {!! Form::text('advance_payment', null, ['class' => 'form-control']) !!}
                                    </div>


                                    <!-- Loan Reason Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::label('loan_reason', __('Loan Reason').':') !!}
                                        <textarea name="loan_reason" id="loan_reason" cols="30" rows="10" class="form-control"></textarea>
                                    </div>

                                    <!-- Submit Field -->
                                    <div class="form-group col-sm-12">
                                        {!! Form::submit(__('Save'), ['class' => 'btn btn-primary']) !!}
                                        <a href="{{ route('employee.advance-payment') }}" class="btn btn-light">@lang('Cancel')</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="advancePayments-table">
                                    <thead>
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Advance Payment</th>
                                        <th>Monthly Payment</th>
                                        <th>Interrest</th>
                                        <th>Repayment Time</th>
                                        <th>Loan Reason</th>
                                        <th>Status</th>
                                        <th>Approve</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($advancePayment as $advancePayment)
                                        <tr>
                                            <td>{{ $advancePayment->employee_id }}</td>
                                            <td>{{ $advancePayment->advance_payment }}</td>
                                            <td>{{ $advancePayment->monthly_payment }}</td>
                                            <td>{{ $advancePayment->interest }}</td>
                                            <td>{{ $advancePayment->repayment_time }}</td>
                                            <td>{{ $advancePayment->loan_reason }}</td>
                                            <td>{{ $advancePayment->status }}</td>
                                            <td>{{ $advancePayment->approve }}</td>
                                        </tr>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>

        $('#loan_reason').summernote({
            tabsize: 2,
            height: 180,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

    </script>
@endsection


