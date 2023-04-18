@extends('hrm_layouts.app')
@section('title')
    Edit Monthly Salary
@endsection
@section('content')
    <section class="section">

  <div class="content">
              @include('stisla-templates::common.errors')
              <div class="section-body">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card" style="margin-top: 50px;">
                             <div class="card-header d-flex justify-content-between">
                                 <h3 class="page__heading m-0">Edit Monthly Salaries </h3>
                                 <div>                    &nbsp;
                                     <a href="{{ route('monthlySalaries.index') }}" class="btn btn-primary form-btn">Back</a>
                                 </div>
                             </div>
                             <div class="card-body ">
                                    {!! Form::model($monthlySalary, ['route' => ['monthlySalaries.update', $monthlySalary->id], 'method' => 'patch']) !!}
                                        <div class="row">
                                            @include('monthly_salaries.fields')
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
