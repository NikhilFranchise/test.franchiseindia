<style type="text/css">
    #myModal .modal-body{padding:0px!important;}
    #myModal .modal-dialog{width:600px!important;}
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
    .fi-HeadCont-expo{width:599px;  margin:0 auto; padding:0; background:#fff;}
    .clear{clear:both;}
    .sec{overflow: hidden;width: 100%;margin-bottom: 7px; }
    .sec.tst { text-align: center;}
    .f1{ float:left; width:30%;color: #fff; font-family:Open Sans Light; padding-left: 10px;}
    .f2{ float:left; width:5%; color:#fff;}
    .f3{ float:right; width:60%;}
.blksppop { height:315px; }
    .fi-bg-expo{height:749px; width:599px; margin:0 auto; background:url("../images/popup/respopup.jpg") no-repeat center top;}
    .fro-expo-form{overflow:hidden; margin:0px auto;  padding:0; }
    .fro-expo-form label{width:180px; font-size:14px; font-family:Open Sans Light; margin-right:10px; float:left; color:#fff; padding-top:3px; padding-right:10px; text-align:left; }
    .fro-expo-form  input[type="text"], .fro-expo-form input[type="tel"], .fro-expo-form input[type="email"]{ width:100%;     height: 30px;  padding:6px 0 6px 10px; color:#454545; float:left; background:white; border:1px solid #dfdfdf; border-radius:4px;}
    .fro-expo-form  input[placeholder]{color:#454545;}
    .fro-expo-form select{width:100%;background:white; padding:4px 4px 4px 10px !important; border:1px solid #dfdfdf; line-height:26px !important; color:#454545; border-radius:4px;}

    .fro-expo-form label.error{display:none!important}
    .fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}
    .fi-expotest{font-size:32px; color:#fff; font-family:'Open Sans Bold'; padding:22px 0 0px 0px; line-height:30px; text-transform:uppercase;}
    .fi-expotest span{color:#fff200;}
    .expo-submitnew{background:url("../images/popup/submitbtnpopup.jpg") no-repeat; width:136px;
        height:36px;cursor:pointer;  margin:5px auto 0 0px; border:none; text-align: center; display: inline-block;}
    .boxblk { padding:20px 20px;  }
    .fblk {  padding-top: 25px; margin-left:30px;}
    .tsha  {font-family:'Open Sans Light'; font-size:19px; line-height:19px; clear:both; color:#fff;     margin-top: 10px;}
    .tsha span { font-family:'Open Sans Semibold'; font-size:16px;}
    .expo-bgcolor{ background: #fff;color:#000; text-align: center; font-size: 18px;padding-bottom:5px; padding-top: 2px;}
    /* End popup start */
    ul.bostxt { text-align:center;     margin: 9px 0px;}
    ul.bostxt li {font-size:21px; color:#000;font-family:'Open Sans Regular'; display:inline-block; margin-left:5px; }
    ul.bostxt li span{ font-size:27px; color:#ff7f1c; display:block; float:left;     margin-top: -4px;margin-right: 2px; }

</style>
@php
    $states = Config('location.stateArr');
        asort($states);
    $cities = Config('location.cityArr.18');
        asort($cities);
@endphp

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">


                <div id="my_modal" class="model_top" style="width:599px;">
                    <!--<img src="https://www.franchiseindia.com/images/popup/close.gif" class="my_modal_close" onclick="closepop();" style="right: -2px;"/>-->

                    <div class="fi-bg-expo">


<div class="blksppop"></div>



                        <div class="boxblk">




                            <form method="post" id="form1-stall" name="form1-stall" action="https://master.franchiseindia.com/restaurantindia.in/congress/register_update.php" class="fro-expo-form">
                                <input type="hidden" value="IRC-Insta" id="ref" name="ref">
                                <input type="hidden" readonly value="Indian Restaurant Congress Insta Register" id="hideType" name="hideType">
                                <input type="hidden" name="src" id="src" value="Popup">
                                <input type="hidden" value="Delhi August 2019" name="event_year" id="event_year">
                                <input type="hidden" value="Attend the congress - Food Labs" name="want" id="want">



                                <div class="sec">

                                    <div class="f1">
                                        <label>Name *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtname" name="txtname" type="text" class="form-control" placeholder="Name" required="">
                                    </div>


                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <label>Email *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                    <input id="txtemail" name="txtemail" type="email"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email *" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <label>Phone *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                    <input id="txtphone" name="txtphone" type="tel" placeholder="Contact No. *" class="form-control"
                                           pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <label>Conmpany *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtcompany" name="txtcompany" type="text" placeholder="Conmpany *" class="form-control"
                                                required="">
                                    </div>
                                </div>



                                <div class="sec">
                                    <div class="f1">
                                        <label>State *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                    <select name="txtState" onchange="getcitypopup(this)"  class="form-control myselectclasscat"
                                            id="txtState" required="">
                                        <option value="" data-id="">Select State</option>
                                        @foreach($states as $index => $value)
                                            <option value="{{ $value }}" data-id="{{ $index }}">{!! $value !!}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>


                                <div class="sec">

                                    <div class="f1">
                                        <label>City *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">

                                    <select name="txtCity" class="form-control myselectclasssearch" id="popupcity" required="">
                                        <option value="">Select a City</option>
                                        @foreach($cities as $value)
                                            <option value="{!! $value !!}"  @if ( $value == "Kolkata") selected @endif>{!! $value !!} </option>
                                        @endforeach
                                    </select>
                                    </div>

                                </div>














                                <div class="sec tst">

                                    <input type="submit" value="" name="btnSubmitReg" class="expo-submitnew">

                                </div>



                            </form>
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



