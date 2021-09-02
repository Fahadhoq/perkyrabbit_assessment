@extends('layouts.app')

@section('css')
<!-- datatable css link add -->
         @include('layouts.partials.datatable-css')
<style>  
.hover:hover{
    text-decoration: underline;
}  
</style>         
@endsection

@section('container')

<!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">               
                 <div class="container-fluid">
                    

                    <!-- start page-title -->
                    <div class="page-title-box">
                        
                        <!-- start row -->
                        <div class="row align-items-center">
                            
                            <div class="col-sm-6">
                                <h4 class="page-title">ALL Employees </h4>
                            </div>
                            
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Perky Rabbit</a></li>
                                    <li class="breadcrumb-item active">Employee </li>
                                    <li class="breadcrumb-item active">ALL Employees </li>
                                </ol>
                            </div>
                       
                        </div>
                        <!-- end row -->
                     </div>
                    <!-- end page-title -->


                    <!-- main contaner start -->
               
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                
                                <div class="card-body">
                                  
                                    
                                    <!-- message show -->
                                    @include('layouts.partials.message-show')
                                    <!-- message show end -->


                                   <div class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer col-md-12">
                                     
                                      <div class="col-sm-12 col-md-10 dataTables_filter"> 
                                        Employee Create: From
                                           <input name="from_date" id="from_date" class="form-control col-sm-12 col-md-3" type="date" value="from date" placeholder="From Date">
                                          To
                                           <input name="to_date" id="to_date" class="form-control col-sm-12 col-md-3" type="date" value="To date" placeholder="To Date">
                                           <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info col-sm-12 col-md-2" />  
                                      </div> 
                                       
                                      
                                      <div style="clear:both"></div>                 
                                      <br />
                                      
                                    </div>

                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                                <thead class="thead-default">
                                                    <tr>
                                                        <th style=text-align:center>SL</th>
                                                        <th style=text-align:center>profile photo </th>
                                                        <th style=text-align:center>Employee ID</th>
                                                        <th style=text-align:center>Employee Name</th>
                                                        <th style=text-align:center>Employee Contact</th>
                                                        <th style=text-align:center>Employee Email</th>  
                                                        <th style=text-align:center>Employee DOB</th> 
                                                        <th style=text-align:center>Employee Create at</th>    
                                                    </tr>
                                                </thead>
        
        
                                                <tbody id="TableData">
                                                @php $i=1 @endphp
                                                @foreach($employees as $employee)
                                                    <tr>
                                                        <td style=text-align:center scope="row">{{$i++}}</td>   
                                                        <td style=text-align:center>
                                                            <img class="rounded-circle z-depth-2" width="60px" height="60px" src="{{ url('storage').'/'.@$employee->picture }}"
                                                            data-holder-rendered="true">
                                                        </td>
                                                        <td style=text-align:center>{{$employee->id}}</td>
                                                        <td style=text-align:center>
                                                              <label>{{$employee->name}}</label>    
                                                        </td>
                                                        <td style=text-align:center>{{$employee->contact}}</td>
                                                        <td style=text-align:center>{{$employee->email}}</td>
                                                        <td style=text-align:center>{{$employee->date_of_birth}}</td>
                                                        <td style=text-align:center>{{$employee->created_at->format("m/d/Y")}}</td>
       
                                                    </tr>
                                                @endforeach    
                                                </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->


                    <!-- main  contaner end -->
                
                </div>
                <!-- container-fluid -->
            </div>
            <!-- content  -->
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

@endsection   

@section('jquery')
<!-- datatable js link add -->
<@include('layouts.partials.datatable-js')


@endsection


@section('script')
<script>
$(document).ready(function(){ 

// filter created_at date

           $('#filter').click(function(){  
                var csrf_token = $('input[name=_token]').val();
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val(); 

                var FromDate = new Date($('#from_date').val());
                var ToDate = new Date($('#to_date').val());

                if(FromDate < ToDate){
                    if(from_date != '' && to_date != '')  
                    {  
                        $.ajax({  
                            url: '/create-at-date-filter',  
                            type: 'post',  
                            data:{
                                from_date:from_date,
                                to_date:to_date,
                                "_token": "{{ csrf_token() }}"
                                },  
                            success:function(data)  
                            {  
                                $('#datatable-buttons').html(data);
                                    
                            }  
                        });  
                    }else  
                    {  
                        alert("Please Select Date");  
                    }    
                }else{
                    alert("Invalid Date Range"); 
                }
              
                
           });
// filter created_at date end             


});    



</script>
@endsection