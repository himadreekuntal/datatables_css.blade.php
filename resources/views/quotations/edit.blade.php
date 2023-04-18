@extends('pos_layouts.app')
@section('title')
    Edit Quotation
@endsection
@section('content')
    <section class="section">

  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">

                     <div class="col-lg-12">
                         <div class="card" style="margin-top: 50px;">
                             <div class="card-header d-flex justify-content-between">
                                 <h3 class="page__heading m-0">Edit Quotation</h3>
                                 <div>                    &nbsp;
                                     <a href="{{ route('quotations.index') }}" class="btn btn-primary form-btn">Back</a>

                                 </div>
                             </div>
                             <div class="card-body ">
                                    {!! Form::model($quotation, ['route' => ['quotations.update', $quotation->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('quotations.fieldedit')
                                        </div>

                                    {!! Form::close() !!}
                            </div>
                         </div>
                    </div>
                 </div>
              </div>
   </div>
  </section>
@endsection
