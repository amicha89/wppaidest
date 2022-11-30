@extends('admin.layouts.master')
@section('title', __('Add New Asset') )

@section('head_style')
    <link rel="stylesheet" type="text/css" href="{{ asset('public/backend/bootstrap-toggle/css/bootstrap-toggle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('Modules/BlockIo/Resources/assets/admin/css/blockio_asset_setting.min.css') }}">
@endsection

@section('page_content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info" id="blockio-asset-create">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ __('Add New Asset') }}</h3>
                </div>

                <form action="{{ route('admin.blockio_asset.store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data" id="add-blockio-network-form">
                    @csrf
                    <div class="box-body">                 
                        <!-- Name -->
                        <div class="form-group" id="name-div">
                            <label for="name" class="col-sm-3 control-label">{{ __('Name') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('eg - Bitcoin or Litecoin') }}" id="name" aria-required="true" aria-invalid="false" required data-value-missing="{{ __("This field is required.") }}">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                        </div>

                        <!-- Network / code -->
                        <div class="form-group" id="crypto-networks-div">
                            <label class="col-sm-3 control-label" for="network">{{ __('Coin/Network') }}</label>
                            <div class="col-sm-6">
                                <input type="text" value="{{ old('network') }}" name="network" class="form-control" placeholder="{{ __('Enter network code (eg - BTC)') }}" id="network" required data-value-missing="{{ __("This field is required.") }}">
                                <span class="text-danger">{{ $errors->first('network') }}</span>
                                <span class="network-exist-error"></span>
                            </div>
                        </div>


                        <!-- Symbol -->
                        <div class="form-group d-none" id="symbol-div">
                            <label for="symbol" class="col-sm-3 control-label">{{ __('Symbol') }}</label>
                            <div class="col-sm-6">
                                <input type="text" name="symbol" class="form-control" value="{{ old('symbol') }}" placeholder="Symbol (eg - ₿)" id="symbol" aria-required="true" aria-invalid="false" required data-value-missing="{{ __("This field is required.") }}">
                                <span class="text-danger">{{ $errors->first('symbol') }}</span>
                            </div>
                        </div>

                        <!-- Logo -->
                        <div class="form-group" id="logo-div">
                            <label for="currency-logo" class="col-sm-3 control-label">{{ __('Logo') }}</label>
                            <div class="col-sm-4">
                                <input type="file" name="logo" class="form-control input-file-field" id="currency-logo">
                                <span class="text-danger">{{ $errors->first('logo') }}</span>
                                <div class="clearfix"></div>
                              <small class="form-text text-muted"><strong>{{ allowedImageDimension(64,64) }}</strong></small>
                            </div>
                            <div class="col-sm-2">
                                <div class="pull-right setting-img">
                                    <img src='{{ url('public/user_dashboard/images/favicon.png') }}' width="64" height="64" id="currency-demo-logo-preview">
                                </div>
                            </div>
                        </div>

                        <!-- API Key -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="api_key">{{ __('API Key') }}</label>
                            <div class="col-sm-6">
                                <input class="form-control api_key" name="api_key" type="text" placeholder="{{ __('Please enter valid api key') }}" value="{{ old('api_key') }}" id="api_key" required data-value-missing="{{ __("This field is required.") }}">
                                <span class="text-danger">{{ $errors->first('api_key') }}</span>
                                <div class="clearfix"></div>
                                <small class="form-text text-muted"><strong>{{ __('*Network/Crypto Currency is generated according to api key.') }}</strong></small>
                                <div class="clearfix"></div>
                                <small class="form-text text-muted"><strong>{{ __('*Updating API key will update corresponding crypto currency.') }}</strong></small>
                            </div>
                        </div>

                        <!-- PIN -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="pin">{{ __('PIN') }}</label>
                            <div class="col-sm-6">
                                <input class="form-control pin" name="pin" type="text" placeholder="{{ __('Please enter valid pin') }}" value="{{ old('pin') }}" id="pin" required data-value-missing="{{ __("This field is required.") }}">
                                <span class="text-danger">{{ $errors->first('pin') }}</span>
                            </div>
                        </div>

                        <!-- Merchant Address -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="address">{{ __('Merchant Address') }}</label>
                            <div class="col-sm-6">
                                <input class="form-control address" name="address" type="text" placeholder="{{ __('Please enter valid merchant address') }}" value="{{ old('address') }}" id="address" required data-value-missing="{{ __("This field is required.") }}">
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                <span class="address-validation-error"></span>
                            </div>
                        </div>

                        <!-- Address generate -->
                        <div class="form-group" id="create-network-address-div">
                            <label class="col-sm-3 control-label" for="network-address">{{ __('Create Addresses') }}</label>
                            <div class="col-sm-6">
                                <input type="checkbox" data-toggle="toggle" name="  " id="network-address">
                                <div class="clearfix"></div>
                                <small class="form-text text-muted"><strong>{{ __('*If On, ') }}<span class="network-name"></span> {{ __('wallet addresses will be created for all registered users.') }}</strong></small>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="status">{{ __('Status') }}</label>
                            <div class="col-sm-6">
                                <select class="form-control status" name="status" id="status">
                                    <option value='Active'>{{ __('Active') }}</option>
                                    <option value='Inactive'>{{ __('Inactive') }}</option>
                                </select>
                                <div class="clearfix"></div>
                                <small class="form-text text-muted"><strong>{{ __('*Updating status will update corresponding crypto currency.') }}</strong></small>
                            </div>
                        </div>

                        <div class="box-footer">
                            <a class="btn btn-theme-danger" href="{{ route('admin.crypto_providers.list', 'BlockIo') }}" >{{ __('Cancel') }}</a>
                            @if (Common::has_permission(\Auth::guard('admin')->user()->id, 'add_crypto_asset'))
                                <button type="submit" class="btn btn-theme pull-right" id="blockio-settings-submit-btn">
                                    <i class="fa fa-spinner fa-spin display-spinner"></i> <span id="blockio-settings-submit-btn-text">{{ __('Submit') }}</span>
                                </button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('extra_body_scripts')
<script src="{{ asset('public/backend/bootstrap-toggle/js/bootstrap-toggle.min.js') }}" type="text/javascript"></script>
<script src="{{ theme_asset('public/js/sweetalert/sweetalert-unpkg.min.js') }}" type="text/javascript"></script>
<script src="{{ theme_asset('public/js/jquery.ba-throttle-debounce.js') }}" type="text/javascript"></script>
<script src="{{ asset('Modules/BlockIo/Resources/assets/admin/js/validation.min.js') }}"  type="text/javascript" ></script>

<script>
    'use strict';
    var checkMerchantAddressUrl = '{{ route("admin.blockio_asset.check_merchant_address") }}';
    var checkDuplicateNetworkUrl = '{{ route("admin.blockio_asset.check_duplicate_network") }}';
    var defaultImageSource = '{{ url("public/user_dashboard/images/favicon.png") }}';
    var pleaseWait = '{{ __("Please Wait") }}';
    var loading = '{{ __("Loading...") }}';
    var merchantAddress = '{{ __("Merchant address does not belong to this network.") }}';
    var submit = '{{ __("Submit") }}';
    var submitting = '{{ __("Submitting...") }}';
</script>

<script src="{{ asset('Modules/BlockIo/Resources/assets/admin/js/blockio_asset_setting.min.js') }}"  type="text/javascript"></script>
@include('common.read-file-on-change')


@endpush
