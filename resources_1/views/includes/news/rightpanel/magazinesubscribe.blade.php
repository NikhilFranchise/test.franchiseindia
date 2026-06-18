<!-- magazine Subscribe code start here -->

<div class="sidearce bor-radius backwhite pad30" >
    <div id="instathanks"></div>

    <div id="instaSubscribeMsg" style="display: none"><h2><b>Thank you for Enquiry.</b></h2><br>
        <h4>Our Subscription team will get in touch with you shortly.</h4></div>
    <div id="instaSubscribe_block">

        <div class="mbhdhead">
            Insta-Subscribe to <br>
            <span>The Franchising World<br>
Magazine</span>
        </div>

        <div class="tts">
            <img src="https://www.franchiseindia.com/images/magazine/tfw-80x109.jpg" alt="tfw-80x109" /></div>

        <div class="ttstxt">
            For hassle free instant subscription, just give your number and email id and our customer care agent
            will get in touch with you
        </div>
        <div class="formsection padartif">
            <form id="instaSubscribeForm" class="query_cell" method="post">


                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <div class="input-group">
                                <span class="input-group-addon"><img alt="email" src="{{URL::asset('images/email.png')}}"></span>
                                <input type="text" class="form-control" id="email1" name="email" placeholder="Enter Email">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                            <div class="input-group">
                                <span class="input-group-addon"><img alt="mobile" src="{{URL::asset('images/mobile.png')}}"></span>
                                <input type="text" class="form-control" id="mobile" name="mobile" maxlength="10" placeholder="Enter Mobile">
                            </div>
                        </div>
                    </div>
                </div>


                <center><input type="button" id="btnsubscribe" class="btn btn-default" onclick="validForm();" value="Insta-Subscription"/></center>

                <div class="sbctsxt">
                    OR
                    <span><a href="https://master.franchiseindia.com/emagazine/">Click here</a> to Subscribe Online</span>
                </div>
            </form>
        </div>


    </div>
</div>

<!-- magazine Subscribe code start here -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#btnsubscribe').click(function() {
            if(validForm()){
                var email  = document.getElementById('email1').value;
                var mobile = document.getElementById('mobile').value;

                $.ajax({
                    type  : 'post',
                    url   : '/instasubsribe',
                    data  : {email:email, mobile:mobile},
                    success: function (data) {
                        if (data == 1)

                            document.getElementById("instaSubscribeMsg").style.display  = "block";
                            document.getElementById("instaSubscribe_block").style.display = "none";
                    }
                });
            }
        });

    });

    function validForm() {
        if (
            $("#instaSubscribeForm").validate({
                rules: {

                    mobile: {
                        required  : true,
                        accept    : "[0-9]",
                        minlength : 10,
                        maxlength : 10,
                        number    : true
                    },
                    email: {
                        required: true,
                        email: true
                    }

                },


                messages: {
                    mobile: {
                        required  : "",
                        accept    : "",
                        minlength : "",
                        maxlength : "",
                        number    : ""
                    },
                    email: {
                        required: "",
                        email: ""
                    }
                },
                errorPlacement: function (error, element) {
                    error.appendTo(element.parent().parent())
                },
            }).form())
            return true;
    }
</script>
