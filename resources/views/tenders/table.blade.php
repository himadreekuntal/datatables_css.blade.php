<div class="table-responsive">
    <table class="table table-bordered" id="tenders-table">
        <thead>
            <tr>
                <th>Tender ID</th>
                <th>Procuring Entity</th>
                <th>Item</th>
                <th>BG Status</th>
                <th>Opening Date</th>
                <th>Tender Status</th>
                <th>PG Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tenders as $tender)
            <tr>
                       <td>{{ $tender->etender_id }}</td>
            <td>{{ $tender->procuring_entity }}</td>
            <td>{!! $tender->item !!}</td>
            <td>{{ $tender->opening_date }}</td>
            @if($tender->bg_status == NULL)
            <td>Unpaid</td>
            @elseif ($tender->bg_status == 1)
                <td>Paid</td>
                @else
                <td>Released</td>
            @endif
                @if($tender->tender_status == NULL)
                    <td>
                        <button class="btn btn-danger waves-effect" type="button" onclick="tenderStatus({{ $tender->id }}) " data-toggle="tooltip3" title="Update">
                            <i class="fa fa-clock-o"> Pending </i>
                        </button>
                        <form id="status-form-{{ $tender->id }}" action="{{ route('tenders.status',$tender->id) }}" method="GET" style="display: none;">
                            @csrf

                        </form>

                    </td>
                @else
                    <td style="color: green"> Tender Won</td>
                @endif
                @if($tender->pg_status == NULL)
                    <td>Unpaid</td>
                @elseif ($tender->pg_status == 1)
                    <td>Paid</td>
                @else
                    <td>Released</td>
                @endif

                       <td class=" text-center">

                           <div class='btn-group'>
                               <a href="{!! route('tenders.show', [$tender->id]) !!}" class='btn btn-light waves-effect'><i class="fa fa-eye"></i></a> &nbsp
                               <a href="{!! route('tenders.edit', [$tender->id]) !!}" class='btn btn-warning waves-effect'><i class="fa fa-edit"></i></a>&nbsp
                               <button class="btn btn-danger waves-effect" type="button" onclick="deleteTender({{ $tender->id }}) " data-toggle="tooltip3" title="Delete">
                                   <i class="fa fa-trash"> </i>
                               </button>
                               <form id="delete-form-{{ $tender->id }}" action="{{ route('tenders.destroy',$tender->id) }}" method="POST" style="display: none;">
                                   @csrf
                                   @method('DELETE')
                               </form>

                           @if($tender->bg_status == NULL)
                               <a href="javascript:void(0)" class='btn btn-light waves-effect' id="bg" data-id="{{ $tender->id }}">BG</a>&nbsp
                               @elseif($tender->bg_status == 1)
                                   <button class="btn btn-danger waves-effect" type="button" onclick="bgStatus({{ $tender->id }}) "  title="Release the Bank Gurantee">&nbsp
                                       <i class="fa fa-clock-o"> BG Released </i>
                                   </button>
                                   <form id="bg-form-{{ $tender->id }}" action="{{ route('bgs.status',$tender->id) }}" method="GET" style="display: none;">
                                       @csrf
                                       @method('DELETE')
                                   </form>
                               @else
                                @endif


                               @if($tender->tender_status == 1 && $tender->pg_status == Null)
                                   <a href="javascript:void(0)" class="btn btn-primary waves-effect" id = "pg" data-id="{{ $tender->id }}">PG</a>&nbsp
                               @else
                                   @endif
                               @if($tender->pg_status == 1)
                                   <button class="btn btn-danger waves-effect" type="button" onclick="pgStatus({{ $tender->id }}) "  title="Release the Performance Gurantee">
                                       <i class="fa fa-clock-o"> PG Released </i>
                                   </button>&nbsp
                                   <form id="pg-form-{{ $tender->id }}" action="{{ route('pgs.status',$tender->id) }}" method="GET" style="display: none;">
                                       @csrf

                                   </form>
                               @else
                               @endif

                           </div>

                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>





