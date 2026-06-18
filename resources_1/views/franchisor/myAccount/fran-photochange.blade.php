@extends('layout.master')
@section('fl', 'selected')
@section('content')
<div class="container row-no-padding">
    <div class="container myaccount">
        <div class="row row-no-margin">
            <!-- MY ACCOUNT LEFT START -->
            @include('includes.myfranchiseleft')
            <!-- MY ACCOUNT LEFT END -->
            <div class="col-xs-12 col-sm-10 col-md-10 formsection myaccright">
                <h1 class="myhead marleft">Upload/Change Logo</h1>
                <div class="bor-radius backwhite marleft">
                    <form class="form-horizontal" action="{{ route('fran.photochange') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-xs-12 col-sm-12 col-md-12 pad30 showbg">
                            <div class="form-group">
                                @if (Session::has('Success'))
                                <div class="alert alert-info">{{ Session::get('Success') }}</div>
                                @endif
                                @if (!empty($franData->pre_approved_logo))
                                @if (Auth::user()->membership_type == 0)
                                <div class="alert alert-info">Our executive will get in touch with you shortly</div>
                                @endif
                                @endif
                                <label class="col-xs-12 col-sm-4 com4mod control-label mandatory">Upload Company Logo</label>
                                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                                <div class="col-xs-12 col-sm-7 col-md-7 com7mod">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            @if(!empty($franData->company_logo))
                                            Approved Logo
                                            <img alt="approved image" src="{{ asset('uploads/franchisor/'.$franData->company_logo) }}" height="81px" width="199px"/>
                                            @endif
                                        </div>
                                        @if(!empty($franData->pre_approved_logo))
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            Non Approved Logo
                                            <img src="{{ $franData->pre_approved_logo }}" alt="pre approved image" width="200px" class="" />
                                        </div>
                                        @endif
                                    </div>
                                    <input type="hidden" name="company_logoold" value="{{ $franData->company_logo ?? '' }}">
                                    <input type="hidden" name="pre_approved_logo" value="{{ $franData->pre_approved_logo ?? '' }}">
                                    @if(empty($franData->pre_approved_logo))
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <img alt="upload image" src="{{ asset('images/upload.png') }}">
                                        </span>
                                        <input type="file" name="company_logo" id="company_logo" required class="form-control" placeholder="Upload your Company Logo" accept="image/*">
                                    </div>
                                    <div style="display: none; color: red;" id="company_logo_msg">Please select a valid image (jpg / gif / png)</div>
                                    <div style="display: none; color: red;" id="company_logo_msg_size">Please select an image of size (Less than 2MB)</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="row colbg">
                            @if (empty($franData->pre_approved_logo))
                            <center>
                                <input type="submit" id="franchisorsubmit" class="btn btn-default" value="Update" />
                            </center>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#company_logo").change(function () {
            var val = $(this).val();
            switch (val.substring(val.lastIndexOf('.') + 1).toLowerCase()) {
                case 'gif':
                case 'jpg':
                case 'png':
                    $('#company_logo_msg').css('display', 'none');
                    $('#franchisorsubmit').prop('disabled', false);
                    break;
                default:
                    $(this).val('');
                    $('#company_logo_msg').css('display', 'block');
                    $('#franchisorsubmit').prop('disabled', true);
                    break;
            }
        });

        $('#company_logo').bind('change', function () {
            if (this.files[0].size > 2097152) {
                $('#company_logo_msg_size').css('display', 'block');
                $('#franchisorsubmit').prop('disabled', true);
            } else {
                $('#company_logo_msg_size').css('display', 'none');
                $('#franchisorsubmit').prop('disabled', false);
            }
        });
    });
</script>
@endsection
