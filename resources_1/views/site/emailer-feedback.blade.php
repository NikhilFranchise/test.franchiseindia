<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Feedback mailer</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
        <link href="{{URL::asset('css/font.css')}}" type="text/css" rel="stylesheet" />
        <link href="{{URL::asset('css/feedback.css')}}" type="text/css" rel="stylesheet" />
        <script language="javascript" src="{{ URL::asset('js/jquery-3.1.1.min.js') }}"></script>
    </head>
    <body>
        <div class="maindiv">
            <div class="maininnerdiv">
                <div class="logo">
    	           <img src="https://www.franchiseindia.com/images/logo.png" alt="Franchise Logo" />
                </div>
            </div>
            <div class="lintt bgcolorgg">
                <div class="maininnerdiv mihheigh">
                    @php
                        $img = 'https://www.franchiseindia.com/images/no-img.gif';
                        if(!empty($franData->company_logo)) {
                            if( $franData->membership_type != 0 ) 
                                $img = Config::get('constants.franAwsImgPath').$franData->company_logo;
                        }
                    @endphp
        	        
                    <div class="blogo">
                        <img src="{{ $img }}" alt="{{ $franData->company_name }}">
                    </div>
                    
                    <div class="blogoinfo1">
            			<div class="textblk">Company Name<span class="bigtxt">{{ $franData->company_name }}</span></div>
                        <div class="textblk mart20">Total Applications<span class="smalltxt">{{ $applyCount }}</span></div>
                    </div>
            
                    <div class="blogoinfo2">
                    	<div class="textblk">Start date<span class="smalltxt">{{ $franData->created_at->format('d-m-Y')}}</span></div>
                        <div class="textblk mart20">Total Profile Views<span class="smalltxt">{{ $franData->views }}</span></div>
                    </div>
                    
                </div>
            </div>
            
            <div class="custtextblk">
                <div class="maininnerdiv">
                    <div class="custtexthead">Dear Franchisor,</div>
                    <p class="custtext">We are excited to see your brand growing on <a href="https://www.franchiseindia.com/" target="_blank">FranchiseIndia.com.</a></p>
                </div>
            </div>

            <!--form code start here -->
            <div class="maininnerdiv" id="feedmyacc">
                <form class="feedmail" id="feedback-form" action="#">
                    <div class="fdkblk">                        
                        <div class="hdkblk">
                            Help Us Serve You Better!! please share your valuable feedback with us
                            <span>(5 Star being the highest)</span>
                        </div>
                        <input type="hidden" name="franchisor_feedback_month" id="franchisor_feedback_month" value="{{ empty(Cookie::get('franchisor_feedback_month')) ? 1 : Cookie::get('franchisor_feedback_month') }}">
                        <div class="sbkblk">
                            <div class="hdk">How was your Experience with FranchiseIndia.com?</div>
                            <div class="rating">
                                <label><input type="radio" name="exp_rating" value="5" title="5 stars"> 5</label>
                                <label><input type="radio" name="exp_rating" value="4" title="4 stars"> 4</label>
                                <label><input type="radio" name="exp_rating" value="3" title="3 stars"> 3</label>
                                <label><input type="radio" name="exp_rating" value="2" title="2 stars"> 2</label>
                                <label><input type="radio" name="exp_rating" value="1" title="1 star"> 1</label>
                            </div>
                            <label id="rating1" style="display: none; color: red;">Please select your rating</label>
                        </div>

                        <div class="sbkblk">
                            <div class="hdk">Rate your satisfaction level for the quantity of leads.</div>
                            <div class="ratingleads">
                                <label><input type="radio" name="leads_quantity" value="5" title="5 stars"> 5</label>
                                <label><input type="radio" name="leads_quantity" value="4" title="4 stars"> 4</label>
                                <label><input type="radio" name="leads_quantity" value="3" title="3 stars"> 3</label>
                                <label><input type="radio" name="leads_quantity" value="2" title="2 stars"> 2</label>
                                <label><input type="radio" name="leads_quantity" value="1" title="1 star"> 1</label>
                            </div>
                            <label id="rating2" style="display: none; color: red;">Please select your rating</label>
                        </div>

                        <div class="sbkblk">
                            <div class="hdk">Rate your satisfaction level for the quality of leads.</div>
                            <div class="ratingleadsquality">
                                <label><input type="radio" name="ratingleadsquality" value="5" title="5 stars"> 5</label>
                                <label><input type="radio" name="ratingleadsquality" value="4" title="4 stars"> 4</label>
                                <label><input type="radio" name="ratingleadsquality" value="3" title="3 stars"> 3</label>
                                <label><input type="radio" name="ratingleadsquality" value="2" title="2 stars"> 2</label>
                                <label><input type="radio" name="ratingleadsquality" value="1" title="1 star"> 1</label>
                            </div>
                            <label id="rating3" style="display: none; color: red;">Please select your rating</label>
                        </div>

                        <div class="sbkblk">
                            <div class="hdk">Kindly share the number of prospects received from the website.</div>
                            <ul class="webrating">
                                <li><input type="radio" name="websiterating" value="1" title="0-5" checked="checked">0-5</li>
                                <li><input type="radio" name="websiterating" value="2" title="6-10" >6-10</li>
                                <li><input type="radio" name="websiterating" value="3" title="11-20">11-20</li>
                                <li><input type="radio" name="websiterating" value="4" title="Above 20">Above 20</li>
                            </ul>
                        </div>

                        <div class="sbkblk">
                            <div class="hdk">How happy were you with franchise India's service?</div>
                            <div class="ratingservice">
                                <label><input type="radio" name="ratingservice" value="5" title="5 stars"> 5</label>
                                <label><input type="radio" name="ratingservice" value="4" title="4 stars"> 4</label>
                                <label><input type="radio" name="ratingservice" value="3" title="3 stars"> 3</label>
                                <label><input type="radio" name="ratingservice" value="2" title="2 stars"> 2</label>
                                <label><input type="radio" name="ratingservice" value="1" title="1 stars"> 1 </label>
                            </div>
                            <label id="rating5" style="display: none; color: red;">Please select your rating</label>
                        </div>     

                        <div class="sbkblk">
                            <div class="hdk">Have more to say? Kindly share your comments with us.</div>
                            <div class="txtarea">
                                <textarea cols="4" rows="5" name="feedback_comment" id="feedback_comment" > </textarea>
                            </div>
                        </div>   
                        <input type="submit" value="Send feedback" class="btn  sbt" id="feedbackSubmit" /> 
                    </div>
                </form>
            </div>

             <div class="maininnerdiv" id="thanks-message" style="display: none;">
                <form class="feedmail">
                <div class="fdkblk">
                    <div class="thkff">
                        <p>Thank you for sharing your valuable feedback, we hope to continue serving you better.
                            <a href="{{ Config::get('constants.MainDomain') }}/loginform" class="sbt">Login to your Dashboard</a>
                        </p>
                    </div>
                </div>
            </div>
            <!--form code end here-->
            <div class="footbg">Copyright © 2009 - {{ date('Y') }} Franchise India Holdings Ltd.</div>
        </div>
    </body>
</html>

<script language="javascript">
    
    // $(document).ready(function () {
    //     $('#feedmyacc').hide();
    //     $('#thanks-message').show();
    // });

    $('.rating input').change(function () {
        var $radio = $(this);
        $('.rating .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });

    $('.ratingleads input').change(function () {
        var $radio = $(this);
        $('.ratingleads .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });   

    $('.ratingleadsquality input').change(function () {
        var $radio = $(this);
        $('.ratingleadsquality .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });   

    $('.ratingservice input').change(function () {
        var $radio = $(this);
        $('.ratingservice .selected').removeClass('selected');
        $radio.closest('label').addClass('selected');
    });

    $("#feedback-form").submit(function(e){
        e.preventDefault();
        $('#feedbackSubmit').prop('disabled', true);
        var expRating       = $('input[name=exp_rating]:checked', '#feedback-form').val();
        var leadQuality     = $('input[name=ratingleadsquality]:checked', '#feedback-form').val();
        var happiness       = $('input[name=ratingservice]:checked', '#feedback-form').val();
        var leadQuantity    = $('input[name=leads_quantity]:checked', '#feedback-form').val();
        var noOfProspects   = $('input[name=websiterating]:checked', '#feedback-form').val();
        var feedbackComment = $('#feedback_comment').val();
        var feedbackMonth   = $('#franchisor_feedback_month').val();


        if(expRating == undefined)
            $('#rating1').show().fadeOut(5000);
        if(leadQuantity == undefined)
            $('#rating2').show().fadeOut(5000);
        if(leadQuality == undefined)
            $('#rating3').show().fadeOut(5000);
        if(happiness == undefined)
            $('#rating5').show().fadeOut(5000);



        if(expRating != undefined && leadQuantity != undefined && leadQuality != undefined && happiness != undefined) {

            $.ajax({
                type: 'post',
                url: "{{Config::get('constants.MainDomain')}}/franchisor-feedback",
                data: {
                    franId:          '{{ Cookie::get('email_fran_id')}}',
                    expRating:       expRating,
                    happiness:       happiness,
                    leadQuality:     leadQuality,
                    leadQuantity:    leadQuantity,
                    noOfProspects:   noOfProspects,
                    feedbackComment: feedbackComment,
                    feedbackMonth:   feedbackMonth,
                },
                success: function (data) {
                    $('#feedmyacc').hide();
                    $('#thanks-message').show();
                }
            });
            
        }
    });

</script>
