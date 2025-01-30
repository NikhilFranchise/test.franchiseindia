<div class="middleval" style="right: -305px;" id="side-form">
    <div class="bothbtnmi">
        <div class="vttbl-cell">

            <div class="sideslideform">
                <div class="sideinout">
                    @if (request()->segment(2) == 'business-opportunities' ||
                            request()->segment(1) == 'business-opportunities' ||
                            // request()->segment(2) == 'brands' ||
                            // request()->segment(1) == 'brands' ||
                            request()->segment(2) == 'searchby' ||
                            request()->segment(3) == 'searchby')
                        <div class="comparebtn" id="seo_comparebtn"></div>
                        <div class="sidebtn" id="seo_sidebtn"></div>
  
                    @endif
                </div>
                <!--<div id="tt-img-control"></div>-->
                <div id="tryyyy">
                    <div class="formsection leftrightzero">
                        <div id="askMsg" style="display:none;">
                            <div class="green">Thank You for Submitting information for Free Advice!
                            </div>
                        </div>
                        <div class="frm-container" id="askForm">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error) 
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div><br />
                            @endif
                            <form id="homepagefree" name="homepage" method="post" action="{{ route('form.submitlisting') }}">
                                @csrf
                                <h2 class="ttl">Free Advice - Ask Our Experts</h2>
                                <div id="errMsg" style="display:none;"><span style="color: red; ">Please select one
                                        option..!</span></div>
                                <div class="frm-type">

                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1"
                                                value="investor" checked>
                                            Buy a Franchise
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3"
                                                value="franchisor">
                                            Expand My Brand
                                        </label>
                                    </div>

                                </div>
                                <div class="frm-input">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control" name="namefreeadvice"
                                            id="namefreeadvice" placeholder="Enter Name">
                                        <span style="font-size: 10px" class="error-message" id="namefreeadvice-error"></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="emailsprite"></div>
                                        </span>
                                        <input type="text" name="emailfreeadvice" id="emailfreeadvice"
                                            class="form-control" placeholder="Enter E-mail">
                                        <span style="font-size: 10px" class="error-message" id="emailfreeadvice-error"></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <div class="usersprite"></div>
                                        </span>
                                        <input type="text" class="form-control" maxlength="10"
                                            name="mobilefreeadvice" id="mobilefreeadvice" placeholder="Enter Mobile">
                                        <span style="font-size: 10px" class="error-message" id="mobilefreeadvice-error"></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon"><img alt="pincode"
                                                src="{{ Config('constants.MainDomain') }}/images/pincode.png"></span>
                                        <input type="text" name="pincodefreeadvice" id="pincodefreeadvice"
                                            class="form-control" placeholder="Enter Pincode">
                                        <span style="font-size: 10px" class="error-message" id="pincodefreeadvice-error"></span>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon height80">
                                            <div class="addreesssprite"></div>
                                        </span>
                                        <textarea class="form-control height80" name="detailsfreeadvice" id="detailsfreeadvice" placeholder="Enter Details"></textarea>
                                        <span style="font-size: 10px" class="error-message" id="detailsfreeadvice-error"></span>
                                    </div>

                                    <div class="form-group mt-4 mb-4">
                                        <div class="captcha">
                                            <span>{!! captcha_img() !!}</span>
                                            <button type="button" class="btn btn-danger" class="reload" id="reload">
                                                &#x21bb;
                                            </button>
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <input id="captcha" type="text" class="form-control"
                                            placeholder="Enter Captcha" name="captcha">
                                        <span style="font-size: 10px" class="error-message" id="captcha-error"></span>
                                    </div>
                                    <div class="checkbox rm-prop">
                                        <label>
                                            <input type="checkbox" name="is_newsletterfreeadvice"
                                                id="is_newsletterfreeadvice" value="1" checked> Yes, i want to
                                            subscribe for weekly
                                            Newsletter
                                        </label>
                                    </div>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                            <input type="submit" id="btnhome" class="btn btn-default btn-red"
                                                value="Ask Our Experts">
                                        </div>

                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>





        </div>



    </div>
</div>






<script type="text/javascript">
    $(document).ready(function() {
        $('.sidebtn').click(function() {
            let sideBlock = $("#side-form");
            if (sideBlock.css('right') === '-305px') {
                //$('.comparebtn').toggle(1000);
                $('.comparebtn').animate({
                    'right': '-44px',
                    'z-index': '-4'
                });
                $("body").addClass("sidemobe");
                sideBlock.animate({
                    "right": "+=305px"
                }, 1000);
                $("#tryyyy").css('box-shadow', '4px 4px 12px 7px rgba(153,153,153,1)');
            } else {

                $("body").removeClass("sidemobe");
                sideBlock.animate({
                    "right": "-=305px"
                }, 1000);
                setTimeout(function() {
                    $('#tryyyy').css("box-shadow", "none");
                    //$('.comparebtn').toggle(1000);
                    $('.comparebtn').animate({
                        'right': '0px',
                        'z-index': '1'
                    });
                }, 1000);

            }
        });
    });

    $('#reload').click(function() {
        // console.log('called');
        var endpoint = '/reload-captcha';
        var baseUrl = '{{ Config('constants.MainDomain') }}';
        // console.log(baseUrl);
        // Construct the full URL
        var fullUrl = baseUrl + endpoint;
        $.ajax({
            type: 'GET',
            url: fullUrl,
            success: function(data) {
                // console.log('yes');
                $(".captcha span").html(data.captcha);
            }
        });
    });

    $(document).ready(function() {
    $('#homepagefree').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = $(this).serialize();

        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: formData,
            success: function(response) {
                $('#response').html('<p>Form submitted successfully!</p>');
                window.location = "/thanks-advice-form";

                // Clear previous error messages and placeholders
                $('.error-message').text('');
                // $('input').attr('placeholder', '');
            },
            error: function(xhr) {
                // Clear previous error messages and placeholders
                $('.error-message').text('');
                // $('input').attr('placeholder', '');

                var errors = xhr.responseJSON.errors;

                $.each(errors, function(key, errorMessages) {
                    // Check if the error message is for captcha and replace it with a custom message
                    if (key === 'captcha' && errorMessages[0] === 'validation.captcha') {
                        var customMessage = 'Invalid captcha value.';
                        $('#' + key + '-error').text(customMessage);
                        // $('#' + key).attr('placeholder', customMessage);
                    } else {
                        // Use the error messages provided by the server response
                        var errorMessage = errorMessages[0];
                        $('#' + key + '-error').text(errorMessage);
                        // $('#' + key).attr('placeholder', errorMessage);
                    }
                });

                // Optionally, handle global errors
                if (xhr.responseJSON.message) {
                    $('#response').html('<p>' + xhr.responseJSON.message + '</p>');
                }
            }
        });
    });
});


  
</script>

<style>
  /* styles.css */

.error-message {
    color: red; /* Text color for error messages */
    font-size: 0.875em; /* Optional: Adjust font size */
    margin-top: 0.25em; /* Optional: Space above error messages */
    display: block; /* Display error messages as block elements */
}

/* Additional styles for form controls, if needed */
.input-group {
    margin-bottom: 1em;
}

</style>
