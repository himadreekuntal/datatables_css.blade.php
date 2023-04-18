<div class="table-responsive">
    <table class="table" id="stockFiles-table">
        <thead>
            <tr>
                <th>File</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($stockFiles as $stockFile)
            <tr>
                       <td>{{ $stockFile->file }}</td>
                       <td class=" text-center">
                           {!! Form::open(['route' => ['stockFiles.destroy', $stockFile->id], 'method' => 'delete']) !!}
                           <div class='btn-group'>
                        
                              <a href="{{asset('monthly_report/' .$stockFile->file)}}" class='btn btn-light action-btn '><i class="fa fa-download"></i></a>
                               {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger action-btn delete-btn', 'onclick' => 'return confirm("Are you sure want to delete this record ?")']) !!}
                           </div>
                           {!! Form::close() !!}
                       </td>
                   </tr>
        @endforeach
        </tbody>
    </table>
</div>
