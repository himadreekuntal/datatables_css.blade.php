<div class="table-responsive">
    <table class="table table-striped" id="quotations-table">
        <thead>
            <tr>
                <th>Quotaion Id</th>
                <th>Quotation Date</th>
                <th>Customer Name &  Address</th>
                <th>Products(Quantity)</th>
                <th>Payment </th>
                <th>Delivery Time</th>
                <th>Quotation Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($quotation as $quotation)
            <tr>
                <td>{{ $quotation->id }}</td>
            <td>{{date('d-m-Y', strtotime($quotation->qut_date))}}</td>
            <td>{{ $quotation->customer->name }} <br> {{ $quotation->customer->address }}</td>
            <td><ul>
                @foreach($quotation->products as $item)
                    <li>
                        {{ $item->product }} ({{ $item->pivot->quantity }})
                    </li>
                @endforeach
                </ul></td>


            <?php
                             if($quotation->delivery_time == 'In Stock'){ ?>

                                 <td style="color: #3989c6"> {{$quotation->delivery_time}}</td>
                            <?php }  else{?>
                                <td style="color: red"> {{$quotation->delivery_time}}</td>
                          <?php  } ?>


                          <?php
                          if($quotation->payment == 'Full Payment at the time of delivery'){ ?>

                              <td style="color: #3989c6"> {{$quotation->payment}}</td>
                         <?php } else if($quotation->payment == '30% Advance Payment'){?>
                             <td style="color: orange"> {{$quotation->payment}}</td>
                         <?php } else{?>
                             <td style="color: red"> {{$quotation->payment}}</td>
                       <?php  } ?>

                          <?php
                          if($quotation->qut_status == '1'){ ?>

                              <td style="color: #3989c6">Quotation Procceed</td>

                         <?php } else{?>
                             <td style="color: red">Quotation Deleted </td>
                       <?php  } ?>

                <td>

                    <div class='btn-group'>
                        <a href="{{ route('quotations.show', [$quotation->id]) }}" class='btn btn-ghost-success waves-effect'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('quotations.edit', [$quotation->id]) }}" class='btn btn-ghost-info waves-effect'><i class="fa fa-edit"></i></a>
                        <a href="{{ route('quotationmail', [$quotation->id]) }}" class='btn btn-ghost-primary waves-effect'><i class="fa fa-envelope"></i></a>
                        <a href="{{ route('quotationprint', [$quotation->id]) }}" class='btnprn btn btn-ghost-warning waves-effect'><i class="fa fa-print"></i></a>
                        <button class="btn btn-ghost-danger waves-effect" type="button" onclick="deleteQuotation({{ $quotation->id }})">
                            <i class="fa fa-trash"> </i>
                        </button>
                        <form id="delete-form-{{ $quotation->id }}" action="{{ route('quotations.destroy',$quotation->id) }}" method="POST" style="display: none;">
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
    $('#quotations-table').DataTable({
        "order": [],
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
    </script>


@endsection
