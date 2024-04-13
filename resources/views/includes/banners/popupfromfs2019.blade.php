<style type="text/css">
    #myModal .modal-body{padding:0px!important;}
    #myModal .modal-dialog{width:620px!important;}
    #myModal .bcs{position: absolute;
        right: 46px!important;
        top: -30px!important;
        background:transparent!important;
        box-shadow:none!important;
        z-index: 999;
        height: 33px;
        width: 33px;
        display:block;
        opacity: 1;
        cursor: pointer;
    }


    #myModal .close {
        right: -19px!important;
        top: -19px!important;
        box-shadow: 0px 0px 15px 8px rgba(0, 0, 0, 0.35)!important;
    }


    #popup_entry1 input.errorInput {
        border:1px solid yellow;
        background:yellow;
    }

    /*delhi-expo-popup*/
    #myModal .my_modal_close{ position:absolute;}
    #myModal .modal-content { margin-top:70px;}
    .fi-HeadCont-expo{width:600px;  margin:0 auto; padding:0; background:#fff;}
    .sec{overflow: hidden;width: 100%;margin-bottom: 7px; }

    .f3{ float:left; width:100%;}
    .expo-header{height:127px; width:620px; margin:0 auto; background:url("../images/popup/headermfstop.jpg") no-repeat center top; }
    .fi-bg-expo{height:400px; width:620px; margin:0 auto; background:url("../images/popup/headermfsbottom.jpg") no-repeat center top;}
    .fro-expo-form{overflow:hidden; margin:0px auto;  padding:0; }
    .fro-expo-form label{width:180px; font-size:14px; font-family:Open Sans Light; margin-right:10px; float:left; color:#fff; padding-top:3px; padding-right:10px; text-align:left; }
    .fro-expo-form  input[type="text"], .fro-expo-form input[type="tel"], .fro-expo-form input[type="email"]{width:100%;    padding:4px 0 4px 10px; color:#333; float:left; background:white; border:1px solid #dfdfdf; border-radius:0px;-moz-border-radius:0px;-webkit-border-radius:0px; height:28px!important;}
    .fro-expo-form  input[placeholder]{color:#666;}
    .fro-expo-form select{width:100%;background:white; padding:2px 0 2px 6px!important; border:1px solid #dfdfdf; line-height:28px !important; color:#333; border-radius:0px; height: 31px;}

    .fro-expo-form label.error{display:none!important}
    .fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}
    .fi-expotest{font-size:30px; color:#fff; font-family:'Open Sans Regular';  padding:15px 0 0px 0px; line-height:26px; text-transform:uppercase;}
    .fi-expotest span{color:#fff200; font-family:'Open Sans Bold';}
    .expo-submitnew{
        width:125px;
        border-radius: 10px; color:#1c39af!important; border:1px solid #1c39af!important; font-family:'Open Sans Semibold';
        height:35px;cursor:pointer;  margin:2px auto 0 0px; border:none; display:inline-block; background-color: #fff;}
    .boxblk { padding:15px 30px;}
    .fblk { text-align: center;}
    .tsha  {font-family:'Open Sans Light'; font-size:19px; line-height:19px; clear:both; color:#fff;     margin-top: 10px;}
    .tsha span { font-family:'Open Sans Semibold'; font-size:16px;}
    .expo-bgcolor{ background: #EA1519;color:#fff; text-align: center; font-size: 18px;padding-bottom:5px; padding-top: 2px;}
    /* End popup start */
    .valtxtx {font-family:'Open Sans Light'; font-size:20px; color:#fff;    padding-top: 10px;     margin: 0 auto;     width: 218px;}
    .valtxtx span{ color:#fff;       font-family: 'Open Sans Bold'; }
    .leftshow { float:left;}
    .valtxtx #novisitShow{    background: transparent!important;
        width: 23%!important;
        font-family: 'Open Sans Bold';
        border: none!important; float:left; height: 28px; color:#fff; padding:2px;}

    .fleftpop { width: 315px; float: left; padding-left: 30px;}
    .frightpop { width: 305px; float: left;}
</style>

@php
    $states = Config('location.stateArr');
        asort($states);
    $cities = Config('location.cityArr.23');
        asort($cities);
@endphp

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
			
                <script type="text/javascript">

                    $(document).ready(function(){
                        $("#novisit").change(function() {
                            total = $('#novisit :selected').val() * 500;
                            $("#novisitAmountt").val(total);
                            $("#novisitShow").val(total);
                        });
                    });

                </script>
                <div id="my_modal" class="model_top" style="width:600px;">
                    <!--<img src="https://www.franchiseindia.com/images/popup/close.gif" class="my_modal_close" onclick="closepop();" style="right: -2px;"/>-->
                    <div class="fi-HeadCont-expo">

                        <div class="expo-header">

                        </div>
                    </div>
                    <div class="fi-bg-expo">

                        <div class="fblk">
<div class="fleftpop">
    <div class="boxblk">

        <form class="form fro-expo-form" name="frmConferenceReg" id="frmConferenceReg" action="https://www.masterfranchiseshow.in/premium-visitor-reg/frm_validation.php" method="post" >
            <input type="hidden" name="ref" id="ref" value="MFS-Insta">
            <input type="hidden" name="source" value="popup" />
            <input type="hidden" name="event_year" value="Delhi June 2019" id="event_year"/>
            <input type="hidden" name="event_title" value="MFS 2019 New Delhi" />

            <div class="sec">

                <div class="f3">
            <select class="form-control  myselectclasssearch"
                    id="wantval" name="tfw_interest" onchange="myFunction(this.value);" required="">

                <option value="Visit the Expo - Premium LP Paid" selected>Visit the Show</option>
                <option value="Attend the conference">Attend the conference</option>


            </select>
                </div>
            </div>


            <div class="sec">

                <div class="f3">
                    <input id="txtName" name="txtName" type="text" class="form-control" placeholder="Name" required="">
                </div>
            </div>


            <div class="sec">

                <div class="f3">
                    <input id="txtEmail" name="txtEmail" type="email"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email" required="">
                </div>
            </div>

            <div class="sec">

                <div class="f3">
                    <input id="txtPhone" name="txtPhone" type="tel" placeholder="Mobile" class="form-control"
                           pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="">
                </div>
            </div>

            <div class="sec">

                <div class="f3">
                    <select name="state" onchange="getcitypopup(this)"  class="form-control myselectclasscat" id="txtState">
                        <option value="" data-id="">Select State</option>
                        @foreach($states as $index => $value)
                            <option value="{{ $value }}" data-id="{{ $index }}"  @if($index == 23) selected @endif >{!! $value !!}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="sec">

                <div class="f3">
                    <select name="city" class="form-control myselectclasssearch" id="popupcity" >
                        <option value="">Select a City</option>
                        @foreach($cities as $value)
                            <option value="{!! $value !!}"  @if ( $value == "New Delhi") selected @endif>{!! $value !!} </option>
                        @endforeach
                    </select>

                </div>
            </div>

            <div class="sec">

                <div class="f3">
                    <input id="txtAddress" name="txtAddress"  type="text" class="form-control" placeholder="Address" required="">
                </div>
            </div>




            <div class="sec" id="companypop" style="display: none;">

                <div class="f3">

                    <input name="txtcompany" id="txtcompany" placeholder="Enter Company Name"  type="text" class="form-control" >
                </div>
            </div>


            <div class="sec" id="visitorspop">

                <div class="f3">

                    <select placeholder="No. of Visitors" id="novisit" name="txtDelegates" class="form-control myselectclasscat" required>
                        <option value="1" selected>No. of Visitors</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>

            <div class="sec">
                <input class="form-control"  type="hidden" value="500" id="novisitAmountt" name="txtAmount" readonly>
            </div>

            <div class="sec" style="text-align:center;">
                <input type="submit" value="Submit" name="btnSubmitReg" class="expo-submitnew">
            </div>

        </form>
    </div>


</div>
                            <div class="frightpop"></div>
                        </div>







                    </div>

                </div>
            </div>

        </div>

    </div>
</div>





<script language="javascript">
    if(screen.width>767)
    {
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    }
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function getcitypopup(value){

        value = $(value).find(':selected').attr('data-id');

        $.ajax({
            type:'GET',
            url:'/getcitylist',
            data:{state : value},
            success:function(data){
                $("#popupcity").html(data);
            }
        });
    }

</script>

<script language="JavaScript">


        function myFunction(selectwant)
        {
            $("#companypop").css("display", "none");
            ///alert(a);
            var selectwant = $("#wantval :selected").val();
            //var selectwant=$("#wantval").val();
            //alert(taval);
            //alert(delValue);

            if(selectwant == "Visit the Expo - Premium LP Paid")
            {
                $("#companypop").css("display", "none");
                $("#visitorspop").css("display","block");

            }
            else if(selectwant == "Attend the conference")
            {
                $("#companypop").css("display", "block");
                $("#visitorspop").css("display","none");

            }
            else{

                $("#companypop").css("display", "block");
                $("#visitorspop").css("display","none");

            }



        }




</script>

