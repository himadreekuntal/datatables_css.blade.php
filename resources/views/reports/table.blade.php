@extends('report_layouts.app')
@section('title')
    Products
@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products</h1>
            <div class="section-header-breadcrumb">

            </div>
        </div>
    <div class="section-body">
       <div class="card">
            <div class="card-body">
            <div class="table-responsive">


<br>
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>

                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($files as $key => $file)
                <tr>
                <td></td>




                    <td width="5%"> <a href="{{asset('product_catalog/' .$file)}}">{{$file}}</a></td>


                </tr>
            @endforeach


        </tbody>
    </table>


</div>
            </div>
       </div>
   </div>

    </section>
@endsection


