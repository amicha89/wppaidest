<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\AppRegistrationDataTable;
use Illuminate\Http\Request;
use App\Models\AppReg;
use App\Http\Helpers\Common;
use Session,Config,Validator;

class AppRegistrationController extends Controller
{
    
    protected $helper;

    public function __construct()
    {
        $this->helper = new Common();
    }
    
    
    public function index(AppRegistrationDataTable $dataTable)
    {
        //$data['menu']     = 'app-registrations';
        return $dataTable->render('admin.appregistration.index');
    }
    
    public function edit($id)
    {
        $data['menu']     = 'app-registrations';
        $data['applications'] = AppReg::find($id);
        return view('admin.appregistration.edit', $data);
        
    }
    
    public function update(Request $request, $id)
    {
        $appData = AppReg::find($id);
        $rules = array(
            'first_name'    =>  'required',
            'last_name'    =>  'required',
            'email'    =>  'required',
            'phone'    =>  'required',
            'dob'    =>  'required',
            'rule'    =>  'required',
            'company_name'    =>  'required',
            'company_number'    =>  'required',
            'company_type'    =>  'required',
            'companyIndustry'    =>  'required',
            'registeredCountry'    =>  'required',
            'source_of_funds'    =>  'required',
            'streetAddress'    =>  'required',
            'cityState'    =>  'required',
            'zipCode'    =>  'required',
            'dateTime'    =>  'required',
        );

        $fieldNames = array(
            'first_name'    =>  'First Name',
            'last_name'    =>  'Last Name',
            'email'    =>  'Valid Email Address',
            'phone'    =>  'Phone Number',
            'dob'    =>  'Date of Birht',
            'rule'    =>  'Role',
            'company_name'    =>  'Company Name',
            'company_number'    =>  'Company Number',
            'company_type'    =>  'Company Type',
            'companyIndustry'    =>  'Company Industry',
            'registeredCountry'    =>  'Registred Country Name',
            'source_of_funds'    =>  'Source of Funds',
            'streetAddress'    =>  'Street Address',
            'cityState'    =>  'City/State Name',
            'zipCode'    =>  'Zipcode',
            'dateTime'    =>  'Date',
        );
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $appData = $appData->update($request->All());
            $this->helper->one_time_message('success', 'Record Updated Successfully');
            return redirect(Config::get('adminPrefix').'/app-registrations');
        }
    }
    
    public function destroy($id)
    {
       
        if($id){ 
            AppReg::where('id',$id)->delete();
            $this->helper->one_time_message('success', 'Application Deleted Successfully');
            return redirect(Config::get('adminPrefix').'/app-registrations');
        }
    }
}
