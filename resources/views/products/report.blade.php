<html>
    <head>
        <style>
            /**
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0px 25px;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 4cm;

                margin-bottom: 2cm;
            }

            .company-details {

                    text-align: right;

                    }

             .company-details .name {
                    margin-top: -120px;
                    margin-right: 0px;

                    }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 4cm;
                border-bottom: 1px solid #3989c6;
                /** Extra personal styles **/

                /* color: white;
                text-align: center;
                line-height: 1.5cm; */
            }

            /** Define the footer rules **/
            footer {
                position: fixed;
                bottom: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                border-top: 1px solid #3989c6;
                text-align: center;
                /** Extra personal styles **/
                /* background-color: #03a9f4;
                color: white;
                text-align: center;
                line-height: 1.5cm; */
            }

            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
              }

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  font-size: 10px; 
  font-family: arial, sans-serif;
}


        </style>
  
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <div class="row">
                <div class="col">
                    <h2 class="name1">
                        <a target="_blank" href="https://lobianijs.com">
                        Symbex International
                        </a>
                    </h2>
                    <div>92 Motijheel Commercial Area, Dhaka:100</div>
                    <div>Phone: 01951135806</div>
                    <div>Email: symbex@dhaka.net</div>
                    <div><a target="_blank" href="https://lobianijs.com">
                        www.symbexbd.com
                        </a></div>
                </div>
                <div class="col company-details">
                    <h2 class="name">
                        <a target="_blank" href="https://lobianijs.com">
                        SymbexIT Ltd.
                        </a>
                    </h2>
                    <div>92/1 Motijheel Commercial Area, Dhaka:1000</div>
                    <div>Phone: 01951135806</div>
                    <div>Email: symbex_erb@dhaka.net</div>
                    <div><a target="_blank" href="https://lobianijs.com">
                        www.symbexit.com
                        </a></div>
                </div>
            </div>
        </header>

        <footer>
           This is Software Generated Report.
           <br>
           Designed by SymbexIT Ltd.
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>

        <h4 style="text-align:center;"> Detail Report of {{ $ddd }}</h4>
        <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Bill Details</th>
                       
                        <th>Previous Stock</th>
                        <th>In/Out</th>
                        <th>Total Stock</th>
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                @foreach($list as $list)
                 @if($list->sale_id == NULL)
                    <tr style="font-weight: bold;">
                @else 
                    <tr>
                @endif
                        <td>{{ date('d-M-y', strtotime($list->created_at)) }}</td>

                    @if($list->sale_id == NULL)
                    <td>Stock Entry</td>
                    @else

                   <td>{{ $list->sale->bill_id}}({{$list->sale->customer->name}})</td>
                   @endif

                    <td>{{$list-> previous_qty}}</td>
                    <td>{{$list->qty}}</td>

                            <td>{{$list->current_qty}} </td>

                            <td>{{$list->status}} </td>
                           

                    </tr>
                    @endforeach

                    

                </tbody>
            </table>
        </main>
    </body>
</html>
