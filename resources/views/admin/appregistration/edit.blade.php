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
    <div class="box box-default">
        <div class="box-body">
            <div class="d-flex justify-content-between">
                <div>
                    <div class="top-bar-title padding-bottom pull-left">Edit Registration</div>
                </div>
                <div>
                     <a style="margin-top: 15px;" href="{{ route('create.corporate', $applications->id) }}" class="btn btn-theme confirmation-warning">Accept & Proceed</a>
                        &nbsp;&nbsp;&nbsp;

                        <a style="margin-top: 15px;" href="{{ route('status.rejected', $applications->id) }}" class="btn btn-danger">Rejected</a>
                        &nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    
                </div>
                <form action="{{ route('appRegis.update', $applications->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data" id="edit_currency_form">
                    @csrf
                    @method('POST')
                    <div class="box-body">
                        <!-- Name -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('First Name') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="first_name" class="form-control" value="{{ $applications->first_name }}" placeholder="First Name" id="name">
                                @if($errors->has('first_name'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Last Name') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="last_name" class="form-control" value="{{ $applications->last_name }}" placeholder="Last Name" id="name">
                                @if($errors->has('last_name'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Email') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="email" class="form-control" value="{{ $applications->email }}" placeholder="Email" id="name">
                                @if($errors->has('email'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Phone Number') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="phone" class="form-control" value="{{ $applications->phone }}" placeholder="Phone Number" id="name">
                                @if($errors->has('phone'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Date Of Birth') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="dob" class="form-control" value="{{ $applications->dob }}" placeholder="Date Of Birth" id="name">
                                @if($errors->has('dob'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('dob') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Role') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="rule" class="form-control" value="{{ $applications->rule }}" placeholder="Role" id="rule">
                                @if($errors->has('rule'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('rule') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Company Name') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="company_name" class="form-control" value="{{ $applications->company_name }}" placeholder="Company Name" id="company_name">
                                @if($errors->has('company_name'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Company Number') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="company_number" class="form-control" value="{{ $applications->company_number }}" placeholder="Company Number" id="company_number">
                                @if($errors->has('company_name'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('company_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Company Type') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="company_type" class="form-control" value="{{ $applications->company_type }}" placeholder="Company Type" id="company_type">
                                @if($errors->has('company_type'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('company_type') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Company Industry') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="companyIndustry" class="form-control" value="{{ $applications->companyIndustry }}" placeholder="Company Industry" id="companyIndustry">
                                @if($errors->has('companyIndustry'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('companyIndustry') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Registered Country') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="registeredCountry" class="form-control" value="{{ $applications->registeredCountry }}" placeholder="Registered Country" id="registeredCountry">
                                @if($errors->has('registeredCountry'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('registeredCountry') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Source of Fund') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="source_of_funds" class="form-control" value="{{ $applications->source_of_funds }}" placeholder="Source of Fund" id="source_of_funds">
                                @if($errors->has('source_of_funds'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('source_of_funds') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Street Address') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="streetAddress" class="form-control" value="{{ $applications->streetAddress }}" placeholder="Street Address" id="streetAddress">
                                @if($errors->has('streetAddress'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('streetAddress') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('City / State') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="cityState" class="form-control" value="{{ $applications->cityState }}" placeholder="City / State" id="cityState">
                                @if($errors->has('cityState'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('cityState') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Zip Code') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="zipCode" class="form-control" value="{{ $applications->zipCode }}" placeholder="Zip Code" id="zipCode">
                                @if($errors->has('zipCode'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('zipCode') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('IP Address') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="ipAddress" class="form-control" value="{{ $applications->ipAddress }}" placeholder="IP Address" id="ipAddress">
                                @if($errors->has('ipAddress'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('ipAddress') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Status -->
                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="status">{{ __('Status') }}</label>
                            <div class="col-sm-6">
                                <select class="select2 form-control" name="status" id="status">
                                    <option value='0' {{ $applications->status == '0' ? 'selected' : '' }}>Pending</option>
                                    <option value='1' {{ $applications->status == '1' ? 'selected' : '' }}>Processing</option>
                                    <option value='2' {{ $applications->status == '2' ? 'selected' : '' }}>Rejected</option>
                                </select>
                                @if($errors->has('status'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('status') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label class="col-sm-3 control-label" for="name">{{ __('Date') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="dateTime" class="form-control" value="{{ $applications->dateTime }}" placeholder="Date" id="dateTime">
                                @if($errors->has('dateTime'))
                                <span class="help-block">
                                    <strong class="text-danger">{{ $errors->first('dateTime') }}</strong>
                                </span>
                                @endif
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
    
    <!-- Confirmation Model -->
    <div class="modal fade" id="confirmation-warning-modal" role="dialog" style="z-index:1060; color: light blue;">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width:100%;height:100%; background-color: aliceblue;">
                <div style="display: block" class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ __('Confirmation') }}</h4>
                </div>

                <div class="modal-body">
                    <p><strong>{{ __('Are you sure you want to Process?') }}</strong></p>
                </div>

                <div class="modal-footer">
                    <a class="btn btn-danger" id="delete-modal-yes" href="javascript:void(0)">@lang('message.form.yes')</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('message.form.no')</button>
                </div>
            </div>
        </div>
    </div>

@endsection