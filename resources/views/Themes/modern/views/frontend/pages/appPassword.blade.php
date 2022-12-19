@extends('frontend.layouts.app')
@section('content')
<!--Start banner Section-->
<section class="bg-image mt-93">
    <div class="bg-dark">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-12">
                    <h2 class="text-white font-weight-bold text-28">Create Your Password</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End banner Section-->

<!--Start Section-->
<section class="sign-up padding-30 pb-44">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-5">
                        <!-- form card login -->
                        <div class="card p-4 rounded-0">
                            <!-- <div>
                                <h3 class="mb-0 font-weight-bold">Verify Your Email Address</h3>
                            </div> -->
                            <div class="alert alert-info">
                                <h4 class="alert-heading"><i class="fas fa-exclamation-circle"></i>&nbsp;Password Must be...</h4>
                            <div class="pt-2 pl-4">
                                <ul style="list-style-type:disc">
                                    <li>Between 8 and 30 characters.</li>
                                    <li>Include a lowercase character.</li>
                                    <li>Include an uppercase character.</li>
                                    <li>Include a digit and a special character.</li>
                                    <li>Different from any of the 5 last such passwords used.</li>
                                </ul>
                            </div>

                            </div>
							<div class="card-body">
								@include('frontend.layouts.common.alert')
								<form action="{{ route('password-store') }}" method="post" id="create_password">
										{{ csrf_field() }}
										@method('POST')
                                        
                                        <div class="form-group">
											<label for="password_only">Email</label>
											<input type="email" value="{{ $userEmail ?? '' }}" class="form-control"  placeholder="" readonly onclick='return false;' name="email" id="email">

											@if($errors->has('password'))
												<span class="error">
													{{ $errors->first('password') }}
												</span>
											@endif
										</div>

										<div class="form-group">
											<label for="password_only">Password</label>
											<input type="password" value="" class="form-control"  placeholder="" name="password" id="password">

											@if($errors->has('password'))
												<span class="error">
													{{ $errors->first('password') }}
												</span>
											@endif
										</div>
									
										<div class="form-group">
											<label for="confirmpass_only">Confirm Password</label>
											<input type="password"  value="" class="form-control" aria-describedby="phoneHelp" placeholder="" name="password_confirmation" id="confirmpass_only">

											@if($errors->has('password_confirmation'))
												<span class="error">
													{{ $errors->first('password_confirmation') }}
												</span>
											@endif
										</div>                                        
									<div class="row">
										<div class="col-md-12">
										<button type="submit" class="btn btn-grad mt-4" id="users_create">
											<i class="spinner fa fa-spinner fa-spin" style="display: none;"></i> 
											<span id="users_create_text">Submit</span>
										</button>
										</div>
									</div>

								</form>
							</div>
							<!--/card-block-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{theme_asset('public/js/jquery.validate.min.js')}}" type="text/javascript"></script>
<script>
    // flag for button disable/enable
    var hasPhoneError = false;
    var hasEmailError = false;

        //jquery validation
    $.validator.setDefaults({
    highlight: function(element) {
        $(element).parent('div').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).parent('div').removeClass('has-error');
    },
    errorPlacement: function (error, element) {
            error.insertAfter(element);
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "{{ __('This field is required.') }}",
        equalTo: "{{ __("Please enter the same value again.") }}",
        minlength: $.validator.format( "{{ __("Please enter at least") }}"+" {0} "+"{{ __("characters.") }}" ),
        password_confirmation: {
            equalTo: "{{ __("Please enter same value as the password field!") }}",
        },
    })

    $('#create_password').validate({
        rules: {
            password: {
                required: true,
                minlength: 8,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            },
            type: {
                required: true,
            },
        },
        messages: {
            password_confirmation: {
                equalTo: "{{ __("Please enter same value as the password field!") }}",
            }
        },
        submitHandler: function(form)
        {
            $("#users_create").attr("disabled", true).click(function (e)
            {
                e.preventDefault();
            });
            $(".spinner").show();
            $("#users_create_text").text("{{ __('Creating Password...') }}");
            form.submit();
        }
    });

    /**
    * [check submit button should be disabled or not]
    * @return {void}
    */
    function enableDisableButton()
    {
        if (!hasPhoneError && !hasEmailError) {
            $('form').find("button[type='submit']").prop('disabled',false);
        } else {
            $('form').find("button[type='submit']").prop('disabled',true);
        }
    }

    $.validator.addMethod("alpha", function(value, element) {
        return this.optional(element) || value == value.match(/^[a-zA-Z\s]+$/);
    });
</script>
@endsection
