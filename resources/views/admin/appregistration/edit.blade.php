@extends('admin.layouts.master')
@section('title', 'Edit Registration')

@section('head_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/sweetalert/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/bootstrap-toggle/css/bootstrap-toggle.min.css') }}">
    <!-- intlTelInput -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/intl-tel-input-13.0.0/intl-tel-input-13.0.0/build/css/intlTelInput.css')}}">
@endsection

@section('page_content')
    <!-- Main content -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Edit Registration') }}</h3>
                </div>
                <form action="{{ route('appRegis.update', $applications->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" id="edit_currency_form">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('First Name') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="first_name" class="form-control" value="{{ $applications->first_name }}" placeholder="First Name" id="name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Last Name') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="last_name" class="form-control" value="{{ $applications->last_name }}" placeholder="Last Name" id="name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Email') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" value="{{ $applications->email }}" placeholder="Email" id="name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Phone Number') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" value="{{ $applications->phone }}" placeholder="Phone Number" id="name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Date Of Birth') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="dob" class="form-control" value="{{ $applications->dob }}" placeholder="Date Of Birth" id="name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Role') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="rule" class="form-control" value="{{ $applications->rule }}" placeholder="Role" id="rule">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Company Name') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="company_name" class="form-control" value="{{ $applications->company_name }}" placeholder="Company Name" id="company_name">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Company Number') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="company_number" class="form-control" value="{{ $applications->company_number }}" placeholder="Company Number" id="company_number">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Company Type') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="company_type" class="form-control" value="{{ $applications->company_type }}" placeholder="Company Type" id="company_type">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Company Industry') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="companyIndustry" class="form-control" value="{{ $applications->companyIndustry }}" placeholder="Company Industry" id="companyIndustry">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Registered Country') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="registeredCountry" class="form-control" value="{{ $applications->registeredCountry }}" placeholder="Registered Country" id="registeredCountry">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Source of Fund') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="source_of_funds" class="form-control" value="{{ $applications->source_of_funds }}" placeholder="Source of Fund" id="source_of_funds">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Street Address') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="streetAddress" class="form-control" value="{{ $applications->streetAddress }}" placeholder="Street Address" id="streetAddress">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('City / State') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="cityState" class="form-control" value="{{ $applications->cityState }}" placeholder="City / State" id="cityState">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Zip Code') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="zipCode" class="form-control" value="{{ $applications->zipCode }}" placeholder="Zip Code" id="zipCode">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('IP Address') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="ipAddress" class="form-control" value="{{ $applications->ipAddress }}" placeholder="IP Address" id="ipAddress">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <!-- Status -->
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="status">{{ __('Status') }}</label>
                            <div class="col-sm-6">
                                <select class="select2 form-control" name="status" id="status">
                                    <option value='Active' {{ $applications->status == 1 ? 'selected' : '' }}>Processing</option>
                                    <option value='Inactive' {{ $applications->status == 0 ? 'selected' : '' }}>Pending</option>
                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Date') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="dateTime" class="form-control" value="{{ $applications->dateTime }}" placeholder="Date" id="dateTime">
                                <span class="text-danger"></span>
                            </div>
                        </div>
                        
                        <div class="box-footer">
                            <a class="btn btn-theme-danger" href="{{ route('appRegis.index') }}">{{ __('Cancel') }}</a>
                            <button type="submit" class="btn btn-theme pull-right" id="currency-edit-submit-btn">
                                <i class="fa fa-spinner fa-spin" style="display: none;"></i> <span id="currency-edit-submit-btn-text">{{ __('Update') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection