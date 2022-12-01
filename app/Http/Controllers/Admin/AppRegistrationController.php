<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\AppRegistrationDataTable;
use Illuminate\Http\Request;
use App\Models\AppReg;
use App\Http\Helpers\Common;
use Session,Config,Validator,DB;

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
            'status'    =>  'required',
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
            'status'    =>  'Status',
            'dateTime'    =>  'Date',
        );
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($fieldNames);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }else{
            $appData = AppReg::find($id);
            $appData->first_name  = $request->first_name;
            $appData->last_name  = $request->last_name;
            $appData->email = $request->email;
            $appData->phone = $request->phone;
            $appData->dob = $request->dob;
            $appData->rule = $request->rule;
            $appData->company_name = $request->company_name;
            $appData->company_number = $request->company_number;
            $appData->company_type = $request->company_type;
            $appData->companyIndustry = $request->companyIndustry;
            $appData->registeredCountry = $request->registeredCountry;
            $appData->source_of_funds = $request->source_of_funds;
            $appData->streetAddress = $request->streetAddress;
            $appData->cityState = $request->cityState;
            $appData->zipCode = $request->zipCode;
            $appData->status = $request->status;
            $appData->dateTime = $request->dateTime;

            $appData->save();
            //$appData = $appData->update($request->all());
            $this->helper->one_time_message('success', 'Record Updated Successfully');
            //return view('admin.appregistration.edit');
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
