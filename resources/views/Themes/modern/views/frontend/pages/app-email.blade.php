@extends('frontend.layouts.app')
@section('content')
<!--Start header section-->
<section class="section-06 sector-guides">
	<div class="container">
		<div class="mt30">

			<div class="clearfix">
			</div>
		</div>
	</div>
</section>
<!--End Section -->

<!--Start woocommerce body section-->
<section class="section-06 sector-guides mt50">
	<div class="container">
		<div class="h4 mt30 mb20 text-center">
			 WooCommerce Plugin Installation
		</div>
		{{-- <hr/> --}}
		<div class="mt10">
		</div>

	    <div class="guidepara-style mt30">
	 
	    	<p>After downloading the plugin (which will be a zip file), you will need to go to WordPress admin area and visit Plugins » Add New page.</p>
	    	<p>After that, click on the Upload Plugin button on top of the page.</p>
	    	<br>
	    	<img src="{{ theme_asset('public/images/woocommerce/uploadpluginwpadmin.png') }}" class="img-thumbnail" style="width: 500px;">
	    	<br>
	    	<p>This will bring you to the plugin upload page. Here you need to click on the choose file button and select the plugin file you downloaded earlier to your computer.</p>
	    	<br>
	    	<img src="{{ theme_asset('public/images/woocommerce/pluginuploadpage.png') }}" class="img-thumbnail" style="width: 500px;">
	    	<br>
	    	<p>After you have selected the file, you need to click on the install now button.</p>
	    	<p>WordPress will now upload the plugin file from your computer and install it for you. You will see a success message like this after the installation is finished.</p>
	    	<br>
	    	<img src="{{ theme_asset('public/images/woocommerce/plugininstalledmanual.png') }}" class="img-thumbnail" style="width: 500px;">
	    	<br>
	    	<p>Once installed, you need to click on the Activate Plugin link to start using the plugin.</p>
	    	<p>You would have to configure the settings to fit your needs. These settings will vary for each plugin.</p>
	    </div>

		    <div class="mt30">
		    </div>
		</div>
	</section>
	<!--End woocommerce body section -->

	@endsection

	@section('js')
	<script>
	</script>
	@endsection