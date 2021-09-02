@extends('layouts.app')


@section('container')

  <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                    <div class="row">
                        <div class=" text-left">
                            <strong>Select Language: </strong>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control changeLang">
                                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                                <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                                <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option>
                            </select>
                        </div>
                    </div>
                
                    <h1>{{ __('messages.title') }}</h1>
                       
                        <!-- start page-title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4  class="page-title">Employee CREATE </h4>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-right">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Perky Rabbit</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Employee</a></li>
                                        <li class="breadcrumb-item active">Employee Create</li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

   
                        <div class="row">
                           

<!-- div 1 -->                                 
                        <div id="div1" class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        
                                  
                                    <!-- message show -->
                                    @include('layouts.partials.message-show')
                                    <!-- message show end -->
                                    
                           
                            <form action="{{ route( 'employee.create' ) }}" method="post" enctype="multipart/form-data" >
                                 @csrf

                            <!-- 2nd row     -->
                           <div class="row">

                           <!-- 1st part              -->
                                <div class="col-lg-6">
                                    <div class="p-20">

                              
                                            <div class="form-group">
                                                <label>Name</label>
                                                <div>
                                                    <input type="text" name="name" value="{{ old('name') }}"
                                                           class="form-control" required
                                                           placeholder="Enter Employee Name "/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                    
                                                <div>   
                                                    <label for="image"> Picture </label><br>
                                                    <input type="file" name="image" class="form-control" id="image"  placeholder="upload Image">
                                                </div>

                                            </div>

                                            

                                    </div>
                                    <!-- col-lg-6 -->
                                        </div>
                                        <!-- p-20    -->
                                    <!-- 1st part end     -->
                                   

                                    <!-- 2nd part              -->
                                        <div class="col-lg-6">
                                                <div class="p-20">
                                            
                                                <div class="form-group">
                                                <label>Date Of Birth</label>
                                                <div>
                                                    <input type="date" name="DateOfBirth" value="{{ old('DateOfBirth') }}" class="form-control" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="text">Contact Number</label>
                                                <div>
                                                  <input type="text" class="form-control" name="contact" value="{{ old('contact') }}" placeholder="Enter Employee Contact Number" required>
                                                </div>
                                            </div>
    
                                            <div class="form-group">
                                                <label>Email</label>
                                                <div>
                                                    <input type="text" id="email" name="email" value="{{ old('email') }}"
                                                           class="form-control" required
                                                           placeholder="Enter User Email "/>
                                                     <span id="email_availability"></span>      
                                                </div>
                                            </div>

                                            
                                            </div>
                                            <!-- col-lg-6 -->
                                        </div> 
                                        <!-- p-20 -->
                                    <!-- 2nd part end     -->    

                                 </div>  
                            <!-- 2nd row end                -->  
   
                                    <div style=text-align:center class="col-xl-12">
                                         <!-- submit button    -->
                                         <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                                        <!-- button end -->
                                        
                                        </form> 
                                        <!-- from end -->

                                        <!-- cancle from -->
                                        <a href="{{ route( 'employee.index' ) }}" class="btn btn-danger"> {{ __('cancle') }}</a>
                                        <!-- cancle from end -->
                                    <div>  
                                        
                           

                                    </div>
                                </div>
                            </div> <!-- end col -->

                        

                        </div> <!-- end row -->      

                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection   

@section('jquery')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection

@section('script')
<script>

 var url = "{{ route('changeLang') }}";
  
  $(".changeLang").change(function(){
      window.location.href = url + "?lang="+ $(this).val();
  });   


</script>
@endsection
