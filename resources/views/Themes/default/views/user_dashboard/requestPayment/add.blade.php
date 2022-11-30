@extends('user_dashboard.layouts.app')

@section('css')
    <style>
        @media only screen and (max-width: 206px) {
            .chart-list ul li.active a {
                padding-bottom: 0;
            }
        }
    </style>
@endsection

@section('content')
<section class="min-vh-100">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-xs-12">
                @include('user_dashboard.layouts.common.alert')
                <div class="card">
                    <div class="row m-0">
                        @if(Common::has_permission(auth()->id(),'manage_transfer'))
                            <a class="inactive-tab text-center w-50" href="{{ url('/moneytransfer') }}">
                                <div class="">@lang('message.dashboard.send-request.menu.send')</div>
                            </a>
                        @endif
                        @if(Common::has_permission(auth()->id(),'manage_request_payment'))
                            <a class="send-request-active-tab w-50 text-center" href="{{ url('/request_payment/add') }}">
                                <div class="">@lang('message.dashboard.send-request.menu.request')</div>
                            </a>
                        @endif
                    </div>
                    <form method="POST" action="{{url('request')}}" id="requestpayment_create_form" accept-charset='UTF-8'>
                        <input type="hidden" value="{{csrf_token()}}" name="_token" id="token">
                        <input type="hidden" name="requestMoneyProcessedBy" id="requestMoneyProcessedBy">
                        <div class="card-body">
                            <div class="form-group">
                                <label>@lang('message.dashboard.send-request.common.recipient')</label>
                                <input type="text" class="form-control" value="{{isset($transInfo['email'])?$transInfo['email']:''}}" name="email" id="requestCreatorEmail" onkeyup="this.value = this.value.replace(/\s/g, '')">
                                <span class="requestCreatorEmailOrPhoneError"></span>
                                <small id="emailHelp" class="form-text text-muted"></small>

                                @if($errors->has('email'))
                                    <span class="error">
                                        {{ $errors->first('email') }}
                                    </span>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="exampleInputPassword1">@lang('message.dashboard.send-request.common.currency')</label>
                                        <select class="form-control" name="currency_id" id="currency_id">
                                            <!--pm_v2.3-->
                                            @foreach($currencyList as $result)
                                                    <option data-type="{{ $result['type'] }}" value="{{$result['id']}}" {{ $defaultWallet->currency_id == $result['id'] ? 'selected="selected"' : '' }}>{{$result['code']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">@lang('message.dashboard.send-request.common.amount')</label>
                                        <input type="text" class="form-control" name="amount" placeholder="0.00" type="text" id="amount" onkeypress="return isNumberOrDecimalPointKey(this, event);"
                                        value="{{isset($transInfo['amount'])?$transInfo['amount']:''}}" oninput="restrictNumberToPrefdecimalOnInput(this)">
                                        @if($errors->has('amount'))
                                            <span class="error">
                                                {{ $errors->first('amount') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('message.dashboard.send-request.common.note')</label>
                                    <textarea class="form-control" rows="5" placeholder="@lang('message.dashboard.send-request.common.enter-note')" name="note" id="note">{{isset($transInfo['note'])?$transInfo['note']:''}}</textarea>
                                @if($errors->has('note'))
                                    <span class="error">
                                        {{ $errors->first('note') }}
                                    </span>
                                @endif
                            </div>

                            <div class="mt-5">
                                <button type="submit" class="btn btn-grad col-12" id="rp_money">
                                    <i class="spinner fa fa-spinner fa-spin" style="display: none;"></i> <span id="rp_text" style="font-weight: bolder;">{{ __('Next') }}</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

<script src="{{ theme_asset('public/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ theme_asset('public/js/additional-methods.min.js') }}" type="text/javascript"></script>

@include('common.restrict_number_to_pref_decimal')
@include('common.restrict_character_decimal_point')

<script type="text/javascript">

    /**
     * [requestMoneyValidateEmail description]
     * @param  {null} email [regular expression for email pattern]
     * @return {null}
     */
    function requestMoneyValidateEmail(receiver) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(receiver);
    }

    function requestMoneyGetStringAfterPlusSymbol(str)
    {
        return str.split('+')[1];
    }

    function checkRequestMoneyProcessedBy()
    {
        $.ajax(
        {
            url: SITE_URL + "/check-processed-by",
            type: 'GET',
            data: {},
            dataType: 'json',
        })
        .done(function(response)
        {
            if (response.status == true) {
                if (response.processedBy == "email") {
                    $('#requestCreatorEmail').attr("placeholder", "{{ __('Please enter valid email (ex: user@gmail.com)') }}");
                    $('#emailHelp').text("{{ __('We will never share your email with anyone else.') }}");
                } else if (response.processedBy == "phone") {
                    $('#requestCreatorEmail').attr("placeholder", "{{ __('Please enter valid phone (ex: +12015550123)') }}");
                    $('#emailHelp').text("{{ __('We will never share your phone with anyone else.') }}");
                } else if (response.processedBy == "email_or_phone") {
                    $('#requestCreatorEmail').attr("placeholder", "{{ __('Please enter valid email (ex: user@gmail.com) or phone (ex: +12015550123)') }}");
                    $('#emailHelp').text("{{ __('We will never share your email or phone with anyone else.') }}");
                }
                $('#requestMoneyProcessedBy').val(response.processedBy);
            }
        })
        .fail(function(error)
        {
            console.log(error);
        });
    }

    function restrictNumberToPrefdecimalOnInput(e)
    {
        var type = $('select#currency_id').find(':selected').data('type')
        restrictNumberToPrefdecimal(e, type);
    }

    function requestMoneyEmailPhoneValidationCheck(emailOrPhone, sendOrRequestSubmitButton)
    {
        var processedBy = $('#requestMoneyProcessedBy').val();
        if (emailOrPhone && emailOrPhone.length != 0) {
            let message = '';
            if (processedBy == "email") {
                if (requestMoneyValidateEmail(emailOrPhone)) {
                    $('.requestCreatorEmailOrPhoneError').html('');
                    sendOrRequestSubmitButton.attr("disabled", false);
                } else {
                    $('.requestCreatorEmailOrPhoneError').html("{{ __('Please enter a valid email address.') }}").css({
                        'color': 'red',
                        'font-size': '14px',
                        'font-weight': '800',
                        'padding-top': '5px',
                    });
                    sendOrRequestSubmitButton.attr("disabled", true);
                }
            }
            else if (processedBy == "phone") {
                if (emailOrPhone.charAt(0) != "+" || !$.isNumeric(requestMoneyGetStringAfterPlusSymbol(emailOrPhone))) {
                    $('.requestCreatorEmailOrPhoneError').html("{{__('Please enter a valid phone (ex: +12015550123)')}}").css({
                        'color': 'red',
                        'font-size': '14px',
                        'font-weight': '800',
                        'padding-top': '5px',
                    });
                    sendOrRequestSubmitButton.attr("disabled", true);
                } else {
                    $('.requestCreatorEmailOrPhoneError').html('');
                    sendOrRequestSubmitButton.attr("disabled", false);
                }
            }
            else if (processedBy == "email_or_phone") {
                if (emailOrPhone.charAt(0) != "+" || !$.isNumeric(requestMoneyGetStringAfterPlusSymbol(emailOrPhone))) {
                    if (requestMoneyValidateEmail(emailOrPhone)) {
                        $('.requestCreatorEmailOrPhoneError').html('');
                        sendOrRequestSubmitButton.attr("disabled", false);
                    }
                    else {
                         $('.requestCreatorEmailOrPhoneError').html("{{__('Please enter valid email (ex: user@gmail.com) or phone (ex: +12015550123)')}}")

                         .css({
                            'color': 'red',
                            'font-size': '14px',
                            'font-weight': '800',
                            'padding-top': '5px',
                        });
                        sendOrRequestSubmitButton.attr("disabled", true);
                    }
                } else {
                    $('.requestCreatorEmailOrPhoneError').html('');
                    sendOrRequestSubmitButton.attr("disabled", false);
                }
            }
        } else {
            $('.requestCreatorEmailOrPhoneError').html('');
            sendOrRequestSubmitButton.attr("disabled", false);
        }
    }

    function IsRequestMoneyEmailPhoneValid()
    {
        let emailOrPhone    = $('#requestCreatorEmail').val().trim();
        if (emailOrPhone != null) {
            requestMoneyEmailPhoneValidationCheck(emailOrPhone, $("#rp_money"));
        }
    }

    function checkRequestCreatorEmailorPhone(emailOrPhone)
    {
        if (emailOrPhone)
        {
            $.ajax({
                method: "POST",
                url: SITE_URL+"/request_payment/request-user-email-phone-receiver-status-validate",
                dataType: "json",
                data: {
                     '_token':$('#token').val(),
                    'requestCreatorEmailOrPhone': emailOrPhone,
                }
            })
            .done(function(response)
            {
                if (response.status == true || response.status == 404)
                {
                    $('.requestCreatorEmailOrPhoneError').html(response.message).css({
                        'color': 'red',
                        'font-size': '14px',
                        'font-weight': '800',
                        'padding-top': '5px',
                    });
                    $('form').find("button[type='submit']").prop('disabled', true);
                }
                else
                {
                    $('.requestCreatorEmailOrPhoneError').html('');
                    $('form').find("button[type='submit']").prop('disabled', false);
                }
            });
        }
    }

    function determineDecimalPoint() {
        
        var currencyType = $('select#currency_id').find(':selected').data('type')

        if (currencyType == 'crypto') {
            $("#amount").attr('placeholder', CRYPTODP);
        } else if (currencyType == 'fiat') {
            $("#amount").attr('placeholder', FIATDP);
        }
    }

    $(window).load(function(){
        checkRequestMoneyProcessedBy();
        IsRequestMoneyEmailPhoneValid();
        determineDecimalPoint();
    });

    var currenctCurrencyType, lastCurrencyType;
    $(document).on('click', 'select', function()
    {
        lastCurrencyType = $(this).find(':selected').data('type');

    }).on("change","select",function(){
        currenctCurrencyType = $(this).find(':selected').data('type');
    });

    $(document).on('change', '#currency_id', function()
    {
        if (lastCurrencyType !== currenctCurrencyType) {
            $('#amount').val('');
        }
        $('.amountLimit').text('');

        determineDecimalPoint();
    });

    //Code for Email validation
    $(document).on('input',"#requestCreatorEmail",function(e)
    {
        IsRequestMoneyEmailPhoneValid();
        let emailOrPhone    = $('#requestCreatorEmail').val().trim();
        checkRequestCreatorEmailorPhone(emailOrPhone);
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "{{ __('This field is required.') }}",
        maxlength: $.validator.format( "{{ __('Please enter no more than') }}"+" {0} "+"{{ __('characters.') }}" ),
    })

    $('#requestpayment_create_form').validate({
        rules: {
            amount: {
                required: true,
            },
            email: {
                required: true,
            },
            note: {
                required: true,
                maxlength: 512,
            },
        },
        submitHandler: function(form)
        {
            var pretxt=$("#rp_text").text();
            setTimeout(function(){
                $("#rp_money").removeAttr("disabled");
                $(".spinner").hide();
                $("#rp_text").text(pretxt);
            },1000);

            $("#rp_money").attr("disabled", true);
            $(".spinner").show();
            $("#rp_text").text("{{ __('Sending Request...') }}");
            form.submit();
        }
    });
</script>

@endsection
