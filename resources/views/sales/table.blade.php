<div class="table-responsive">

    <table class="table table-striped table-bordered" id="sales-table">
        <thead>
            <tr>
                <th>Bill No.</th>
                <th>Sales Date</th>
                <th>Customer Name &  Address</th>
                <th>Products(Quantity)</th>
                <th>Payment Status</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($sales as $sale)
            <tr>
                <td width="10%">{{ $sale->bill_id }}</td>
                <td width="10%">  {{date('d-m-Y', strtotime($sale->sales_date))}}</td>
                <td>{{ $sale->customer->name }} <br> {{ $sale->customer->address }}</td>
                <td><ul>
                    @foreach($sale->products as $item)
                        <li>{{ $item->product }} ({{ $item->pivot->quantity }})

                        </li>
                    @endforeach
                    </ul>
                </td>


                   <?php
                             if($sale->payment_status == 'Full Payment'){ ?>

                                 <td style="color: #3989c6"> {{$sale->payment_status}}</td>
                            <?php } else if($sale->payment_status == 'Partial Payment'){?>
                                <td style="color: orange"> {{$sale->payment_status}}</td>
                            <?php } else{?>
                                <td style="color: red"> {{$sale->payment_status}}</td>
                          <?php  } ?>

                          <?php
                          if($sale->order_status == '1'){ ?>

                              <td style="color: #3989c6">Order Procceed</td>

                         <?php } else{?>
                             <td style="color: red"> Order Deleted </td>
                       <?php  } ?>

                <td>

                    <div class='btn-group'>
                        <a href="{{ route('sales.show', [$sale->id]) }}" class='btn btn-success waves-effect' data-toggle="tooltip" title="Show"><i class="fa fa-success fa-eye"></i></a>&nbsp
                        <a href="{{ route('sales.edit', [$sale->id]) }}" class='btn btn-info waves-effect' data-toggle="tooltip1" title="Edit"><i class="fa fa-edit"></i></a>&nbsp
                        <a href="{{ route('customermail', [$sale->id]) }}" class='btn btn-secondary waves-effect' data-toggle="tooltip2" title="Mail Invoice to Customer"><i class="fa fa-envelope"></i></a>&nbsp
                        <a href="{{ route('print', [$sale->id]) }}" class='btnprn btn btn-warning waves-effect' data-toggle="tooltip3" title="Print Invoice"><i class="fa fa-print"></i></a>&nbsp
                        <a href="{{ route('mail', [$sale->id]) }}" class='btn btn-primary waves-effect' data-toggle="tooltip4" title="Due mail to Cutomer"><i class="fa fa-envelope"></i></a>&nbsp
                        <a href="{{ route('printchalan', [$sale->id]) }}" class='btnprn btn btn-light waves-effect' data-toggle="tooltip5" title="Print Chalan"><i class="fa fa-print"></i></a>&nbsp
                        <button class="btn btn-danger waves-effect" type="button" onclick="deleteSale({{ $sale->id }}) " data-toggle="tooltip6" title="Delete">
                            <i class="fa fa-trash"> </i>
                        </button>
                        <form id="delete-form-{{ $sale->id }}" action="{{ route('sales.destroy',$sale->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>


</div>

@section('scripts')
    <script>
     $(document).ready( function () {
     $('#sales-table').DataTable({
        "order": [],
         pagingType: 'full_numbers',
    });
});

function deleteSale(id) {
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
        $('.btnprn').printPage();
        $(document).ready(function(){




         });
    </script>


@endsection

