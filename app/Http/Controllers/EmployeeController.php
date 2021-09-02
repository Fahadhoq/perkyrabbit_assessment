<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        $data['employees'] = Employee::get();
             
     // dd($data['employees']);

        return view('Employee.index' , $data);
    }

    // create_at_date_filter
    public function create_at_date_filter(Request $request){
     
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        //dd($to_date);
   
        if(isset($from_date, $to_date)){
   
         $output = '';  
         $Employees = Employee::where('created_at' , '>=' , $from_date." 00:00:00")->where('created_at' , '<=' ,  $to_date." 23:59:59")->get();    
           //dd(count($Users));
         $output .= '<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
   
                                                   <thead class="thead-default">
                                                        <th style=text-align:center>SL</th>
                                                        <th style=text-align:center>profile photo </th>
                                                        <th style=text-align:center>Employee ID</th>
                                                        <th style=text-align:center>Employee Name</th>
                                                        <th style=text-align:center>Employee Contact</th>
                                                        <th style=text-align:center>Employee Email</th>  
                                                        <th style=text-align:center>Employee DOB</th> 
                                                        <th style=text-align:center>Employee Create at</th>    
                                                   </thead>
                    <tbody>
                           <tr>';
   
         if(count($Employees) > 0 )  
         {  
              $i=1;
             foreach($Employees as $employee){            
                                                       
               $output .=  '<th style=text-align:center scope="row">' .$i++. '</th>
                            <td style=text-align:center scope="row">
                               <img class="rounded-circle z-depth-2" width="60px" height="60px" src="storage/'.$employee->picture.'"data-holder-rendered="true">
                            </td>
                           <td style=text-align:center >' .$employee->id. '</td>
                           <td style=text-align:center>
                             <label>'.$employee->name.'</label>    
                           </td> 
                           <td style=text-align:center >' .$employee->contact. '</td>                               
                           <td style=text-align:center >' .$employee->email. '</td>
                           <td style=text-align:center >' .$employee->date_of_birth. '</td>
                           
                           <td style=text-align:center >' .$employee->created_at->format("m/d/Y"). '</td>
                                         
                     ';
               $output .= '
                                                         
                 </tr>';
                                    
                                    
             }  
         }  
         else  
         {  
              $output .= '  
                    
                        <td style=text-align:center colspan="12"> Employee Data Not Found</td>  
                   </tr>  
              ';  
         }
   
         $output .= '</tbody>
                       </table>';  
         
         echo $output;  
         
         }
   
       }
   // create_at_date_filter end 

   public function create(Type $var = null)
   {                   
        return view('Employee.Create');
   }

   public function store(Request $request )
    {  
        
        //for backendend validation
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255' , 'unique:employees,email'],
            'contact' => 'required|regex:/(01)[0-9]{9}/|min:11|max:11|unique:employees,contact',
            'DateOfBirth' => 'required',
        ]);

    if($validator->fails()){
        return redirect()->back()->WithErrors($validator)->WithInput();
     }
    
     //image validation and storage 
     if($request->file('image') != null){

        
            $validator_img = Validator::make($request->all(), [
                'image' => 'required|image|max:10240',
            ]);
            
   
            if($validator_img->fails()){
                return redirect()->back()->WithErrors($validator_img)->WithInput();
            }
            
            $imageFile = $request->file('image');

            $file_name = uniqid('profile-photos/' , true ).Str::random(10).'.'.$imageFile->getClientOriginalExtension();

            if($imageFile->isvalid()){
                $imageFile->move(storage_path('app\public\profile-photos'), $file_name);       
            }

      }else{
           $this->SetMessage('select profile picture' , 'danger');
           return redirect()->back();
      }
      //image validation and storage end

        
    try{
        
        //user table insert
        
        $user = Auth::user();
    
        $employee = new Employee([
            'user_id'    => $user->id,
            'name'          => $request->name,
            'contact'       => $request->contact,
            'email'         => $request->email,
            'date_of_birth' => $request->DateOfBirth,
            'picture'       => $file_name,
        ]);

        $user->employees()->save($employee);


        $this->SetMessage('Employee Create Successfull' , 'success');
  
        return  redirect('/dashboard');

       } catch (Exception $e){

          $this->SetMessage($e->getMessage() , 'danger');

           return redirect()->back();
       }
        
    }
}
