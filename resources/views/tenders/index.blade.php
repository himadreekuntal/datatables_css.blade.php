@extends('other_layouts.app')
@section('title')
    Tenders
@endsection
@section('content')
    <section class="section">

        <div class="section-body">
            <div class="card" style="margin-top: 50px;">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="page__heading m-0">Tenders </h3>
                    <div>                    &nbsp;
                        <a href="{{ route('tenders.create') }}" class="btn btn-primary form-btn">Tenders <i class="fas fa-plus"></i></a>

                    </div>
                </div>
                <div class="card-body">
                    @include('tenders.table')
                </div>
           </div>

       </div>
    </section>
@endsection


<!-- boostrap model -->

<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="bgModal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => 'bankGurantees.store', 'enctype'=>'multipart/form-data']) !!}
                  @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            {!! Form::label('tender_id', 'Tender Id:') !!}
                            {!! Form::text('tender_id', null, ['class' => 'form-control','id'=>'tender_id']) !!}
                        </div>

                        <!-- Pg Date Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('bg_date', 'BG Date:') !!}
                            {!! Form::text('bg_date', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'autocomplete'=>"off"]) !!}
                        </div>

                        <!-- Pg No Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('bg_no', 'BG No:') !!}
                            {!! Form::text('bg_no', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>

                        <!-- Pg Amount Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('bg_amount', 'BG Amount:') !!}
                            {!! Form::text('bg_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>

                        <!-- Bank Info Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('bank_info', 'Bank Info:') !!}
                            {!! Form::text('bank_info', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                        </div>

                        <!-- Validity Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('validity', 'Validity:') !!}
                            {!! Form::text('validity', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'autocomplete'=>"off"]) !!}
                        </div>
                        <div class="form-group col-sm-6">
                            {!! Form::label('bg1', 'BG:') !!}
                            {!! Form::file('bg1', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="{{ route('bankGurantees.index') }}" class="btn btn-light">Cancel</a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->


<!-- performance boostrap model -->

<div class="modal fade" id="modal-id1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="pgModal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>

            <div class="modal-body">
                {!! Form::open(['route' => 'performanceGurantees.store', 'enctype'=>'multipart/form-data']) !!}
                @csrf
                <div class="row">
                <div class="form-group col-sm-6">
                    {!! Form::label('tender_id1', 'Tender Id:') !!}
                    {!! Form::text('tender_id1', null, ['class' => 'form-control','id'=>'tender_id1']) !!}
                </div>

                <!-- Pg Date Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('pg_date', 'Pg Date:') !!}
                    {!! Form::text('pg_date', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'autocomplete'=>"off"]) !!}
                </div>

              <!-- Pg No Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('pg_no', 'Pg No:') !!}
                    {!! Form::text('pg_no', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <!-- Pg Amount Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('pg_amount', 'Pg Amount:') !!}
                    {!! Form::text('pg_amount', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <!-- Bank Info Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('pg_bank_info', 'Bank Info:') !!}
                    {!! Form::text('pg_bank_info', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
                </div>

                <!-- Validity Field -->
                <div class="form-group col-sm-6">
                    {!! Form::label('pg_validity', 'Validity:') !!}
                    {!! Form::text('pg_validity', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'autocomplete'=>"off"]) !!}
                </div>
                    <div class="form-group col-sm-6">
                        {!! Form::label('pg1', 'PG:') !!}
                        {!! Form::file('pg1', null, ['class' => 'form-control']) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('noa', 'NoA:') !!}
                        {!! Form::file('noa', null, ['class' => 'form-control']) !!}
                    </div>





                <!-- Submit Field -->
                <div class="form-group col-sm-12">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('performanceGurantees.index') }}" class="btn btn-light">Cancel</a>
                </div>


             </div>
                {!! Form::close() !!}
            </div>


        </div>
    </div>
</div>
<!-- end bootstrap model -->


@section('scripts')
    <script>


        $(document).ready( function () {
            $('#tenders-table').DataTable({
                "order": [],
                });

        });

        $(document).on('click', '#bg', function(event) {
            var id = $(this).data('id');
            $('#bgModal').html("Add Bank Gurantee Details");
            $('#modal-id').modal('show');
            $('#tender_id').val(id);

        });

        $(document).on('click', '#pg', function(event) {
            var id1 = $(this).data('id');
           // console.log(id1);
            $('#pgModal').html("Add Performance Gurantee Details");
            $('#modal-id1').modal('show');
            $('#tender_id1').val(id1);

        });


        $('#pg_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        });
        $('#bg_date').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        });

        $('#validity').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        });
        $('#pg_validity').datepicker({
            uiLibrary: 'bootstrap4',
            format: "dd-mm-yyyy",
            todayHighlight: true
        });


        function tenderStatus(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Won the Tender!',
                cancelButtonText: ' No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('status-form-'+id).submit();
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

        function bgStatus(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, BG is Released!',
                cancelButtonText: ' No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('bg-form-'+id).submit();
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

        function pgStatus(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, PG is Released!',
                cancelButtonText: ' No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: true,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('pg-form-'+id).submit();
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

        function deleteTender(id) {
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
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
            $('[data-toggle="tooltip1"]').tooltip();
            $('[data-toggle="tooltip2"]').tooltip();
            $('[data-toggle="tooltip3"]').tooltip();

        });
    </script>
@endsection
