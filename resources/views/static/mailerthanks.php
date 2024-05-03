@extends('layout.master')
@section('content')

<!--form start here -->
<div class="container formsection">
<div class="row">
<!--left form section start here -->
<div class="col-xs-12 col-sm-9 col-md-9 bor-radius backwhite targleft row-no-padding">
<!---->
    
<form class="form-horizontal">    
    <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
    <div class="sidehead">Thank You</div>
            Thank You for for sharing Your interest.
    </div>    
    <div class="clearfix"></div>    
</form>    

<!---->
</div>
<!--left form section end here -->  
<!--right form section start here -->           
    @include('includes.franchisor-faq')
<!--right form section end here -->    
</div>
</div>
<!--form end here -->

@endsection
