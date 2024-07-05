<style type="text/css">



</style>

<div class="middleval" style="right: -305px;"  id="side-form">
<div class="bothbtnmi">
<div class="vttbl-cell">

        <div class="sideslideform">
            <div class="sideinout">
                @if(request()->segment(2) == 'business-opportunities' || request()->segment(1) == 'business-opportunities' || request()->segment(2) == 'brands' ||  request()->segment(1) == 'brands' ||  request()->segment(2) == 'searchby' ||  request()->segment(3) == 'searchby' )
                <div class="comparebtn" id="seo_comparebtn"></div>
                @endif
                <div class="sidebtn" id="seo_sidebtn"></div>
            </div>
            <!--<div id="tt-img-control"></div>-->
            <div id="tryyyy" >
                <div class="formsection leftrightzero">
                    <div id="askMsg" style="display:none;">
                        <div class="green">Thank You for Submitting information for Free Advice!
                        </div>
                    </div>
                    <div class="frm-container" id="askForm">
                        <form id="homepage" name="homepage" method="post" action="{{Config('constants.MainDomain')}}/freeadvice">
                            @csrf
                            <p>pankaj</p>
                            <h2 class="ttl">Free Advice - Ask Our Experts</h2>
                            <div id="errMsg" style="display:none;"><span style="color: red; ">Please select one
                            option..!</span></div>
                            <div class="frm-type">

                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="investor" checked>
                                        Buy a Franchise
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="franchisor">
                                        Expand My Brand
                                    </label>
                                </div>

                            </div>
                            <div class="frm-input">
                                <div class="input-group">
                                    <span class="input-group-addon"><div class="usersprite"></div></span>
                                    <input type="text" class="form-control" name="namefreeadvice" id="namefreeadvice" placeholder="Enter Name">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><div class="emailsprite"></div></span>
                                    <input type="text" name="emailfreeadvice" id="emailfreeadvice" class="form-control" placeholder="Enter E-mail">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><div class="usersprite"></div></span>
                                    <input type="text" class="form-control" maxlength="10" name="mobilefreeadvice" id="mobilefreeadvice" placeholder="Enter Mobile">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon"><img alt="pincode" src="{{ Config('constants.MainDomain') }}/images/pincode.png"></span>
                                    <input type="text" name="pincodefreeadvice" id="pincodefreeadvice" class="form-control" placeholder="Enter Pincode">
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon height80"><div class="addreesssprite"></div></span>
                                    <textarea class="form-control height80" name="detailsfreeadvice" id="detailsfreeadvice" placeholder="Enter Details"></textarea>
                                </div>
                                <div class="checkbox rm-prop">
                                    <label>
                                        <input type="checkbox" name="is_newsletterfreeadvice" id="is_newsletterfreeadvice" value="1" checked> Yes, i want to subscribe for weekly
                                        Newsletter
                                    </label>
                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 txt-center" id="sub">
                                        <input type="submit" id="btnhome" class="btn btn-default btn-red" value="Ask Our Experts" >
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
    $(document).ready(function () {
       /* if (screen.height <= 768)
            $("#side-form").css('top', '5px'); */





        /* $("#tryyyy").css('box-shadow', 'none');*/

        $('.sidebtn').click(function () {
            let sideBlock = $("#side-form");
            if (sideBlock.css('right') === '-305px') {
                //$('.comparebtn').toggle(1000);
                $('.comparebtn').animate({'right': '-44px', 'z-index': '-4'});
                $( "body" ).addClass( "sidemobe" );
                sideBlock.animate({
                    "right": "+=305px"
                }, 1000);
                $("#tryyyy").css('box-shadow', '4px 4px 12px 7px rgba(153,153,153,1)');
            } else {

                $( "body" ).removeClass( "sidemobe" );
                sideBlock.animate({
                    "right": "-=305px"
                }, 1000);
                setTimeout(function () {
                    $('#tryyyy').css("box-shadow", "none");
                    //$('.comparebtn').toggle(1000);
                    $('.comparebtn').animate({'right': '0px', 'z-index': '1'});
                }, 1000);

            }
        });
    });
</script>
