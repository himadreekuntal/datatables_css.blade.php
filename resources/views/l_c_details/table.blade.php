<div class="table-responsive">
    <table class="table" id="lCDetails-table">
        <thead>
            <tr>
                <th>Date</th>
        <th>Brand Id</th>
        <th>Commodities</th>
        <th>Payment Type</th>
        <th>Amount</th>
        <th>Amount in Tk.</th>
        <th>Margin</th>
        <th>LTR Amount</th>
        <th>Invoice</th>
        <th>Lc Copy</th>
        <th>Bill of Entry</th>
        <th>Bank Statement</th>
        <th>Payment Remaining</th>
        <th>Last Date of Payment</th>
        <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lCDetails as $lCDetail)
            <tr>
                <td>{{date('d-m-Y', strtotime($lCDetail->date))}}</td>
                <td>{{ $lCDetail->brand->brand }}</td>
                <td>{{ $lCDetail->commodities }}</td>
                @if($lCDetail->payment_type == 'lc')
                <td>L/C</td>
                @else
                <td>TT</td>
                @endif
                <td>{{ number_format($lCDetail->amount, 2, '.', ',') }} {{ $lCDetail->currency_type }}</td>
                <td>{{ number_format($lCDetail->total_amount_bdt, 2, '.', ',') }} Tk. </td>
                <td>{{ number_format($lCDetail->margin, 2, '.', ',') }}</td>
                <td>{{ number_format($lCDetail->ltr_amount, 2, '.', ',') }}</td>

                @if($lCDetail->invoice == 'default.pdf')
                <td>{{ $lCDetail->invoice }}</td>
                @else
                <td><a href="{{asset('lc_document/' .$lCDetail->invoice )}}">{{ $lCDetail->invoice }}</a> </td>
                @endif

                @if($lCDetail->lc_document == 'default.pdf')
                <td>{{ $lCDetail->lc_document }}</td>
                @else
                <td><a href="{{asset('lc_document/' .$lCDetail->lc_document )}}">{{ $lCDetail->lc_document }}</a> </td>
                @endif

                @if($lCDetail->boe == 'default.pdf')
                <td>{{ $lCDetail->boe }}</td>
                @else
                <td><a href="{{asset('lc_document/' .$lCDetail->boe )}}">{{ $lCDetail->boe }}</a> </td>
                @endif


                @if($lCDetail->bank_statement == 'default.pdf')
                <td>{{ $lCDetail->bank_statement }}</td>
                @else
                <td><a href="{{asset('lc_document/' .$lCDetail->bank_statement )}}">{{ $lCDetail->bank_statement }}</a> </td>
                @endif
                <td>{{ number_format($lCDetail->payment_remaining, 2, '.', ',') }}</td>
                <td>{{date('d-m-Y', strtotime($lCDetail->last_payment))}}</td>
                <td>{{ $lCDetail->ltr_status }}</td>

                <td class=" text-center">

                    @if ($lCDetail->payment_type == 'lc')
                    <div class='btn-group'>
                        <a href="{!! route('lCDetails.show', [$lCDetail->id]) !!}" class='btn btn-success waves-effect' data-toggle="tooltip" title="Show"><i class="fa fa-success fa-eye"></i></a>&nbsp
                        <a href="{!! route('lCDetails.edit', [$lCDetail->id]) !!}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                        <a href="{{ route('ltrPayment', [$lCDetail->id]) }}" class='btn btn-primary waves-effect' data-toggle="tooltip2" title="LTR payment"><i class="fa fa-wallet"></i></a>&nbsp
                        <a href="{{ route('lcReport', [$lCDetail->id]) }}" class='btn btn btn-warning waves-effect' data-toggle="tooltip2" title="Download Report"><i class="fa fa-download"></i></a>&nbsp
                        <button class="btn btn-danger waves-effect" type="button" onclick="deleteLC({{ $lCDetail->id }}) " data-toggle="tooltip6" title="Delete">
                            <i class="fa fa-trash"> </i>
                        </button>
                        <form id="delete-form-{{$lCDetail->id}}" action="{{ route('lCDetails.destroy',$lCDetail->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                    @else

                    <div class='btn-group'>
                        <a href="{!! route('lCDetails.show', [$lCDetail->id]) !!}" class='btn btn-success waves-effect' data-toggle="tooltip" title="Show"><i class="fa fa-success fa-eye"></i></a>&nbsp
                        <a href="{!! route('lCDetails.edit', [$lCDetail->id]) !!}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                        <a href="{{ route('lcReport', [$lCDetail->id]) }}" class='btn btn btn-warning waves-effect' data-toggle="tooltip2" title="Download Report"><i class="fa fa-download"></i></a>&nbsp

                        <button class="btn btn-danger waves-effect" type="button" onclick="deleteLC({{ $lCDetail->id }}) " data-toggle="tooltip6" title="Delete">
                            <i class="fa fa-trash"> </i>
                        </button>
                        <form id="delete-form-{{$lCDetail->id}}" action="{{ route('lCDetails.destroy',$lCDetail->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                    @endif


                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@section('scripts')

<script>
$(document).ready( function (){
    $('#lCDetails-table').DataTable({
        "order": [],
    });
});

function deleteLC(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: ' No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }

    </script>


@endsection
