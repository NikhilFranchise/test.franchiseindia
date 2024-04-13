<style type="text/css">
::-webkit-input-placeholder { 
     color:#1f1c55!important;
}
:-moz-placeholder { 
    color:#1f1c55!important;
}
::-moz-placeholder { 
    color:#1f1c55!important;
} /* For the future */
:-ms-input-placeholder { 
    color:#1f1c55!important;
}
input:focus {

    background-color: transparent!important;

}
    #myModal .modal-body {
        padding: 0!important
    }

    #myModal .modal-dialog {
        width: 600px!important
    }

    #myModal .close {
        right: -19px!important;
        top: -19px!important;
        box-shadow: 0 0 15px 8px rgba(0, 0, 0, 0.35)!important
    }

    #popup_entry1 input.errorInput {
        border: 1px solid yellow;
        background: yellow
    }

    #myModal .my_modal_close {
        position: absolute
    }

    #myModal .modal-content {
        margin-top: 70px
    }

    .sec {
        overflow: hidden;
        width: 100%;
        margin-bottom: 11px
    }

    .f1 {
        float: left;
        width: 48%
    }

    .f3 {
        float: right;
        width: 48%
    }


    .fi-bg-expo {
        height:266px;
        width: 600px;
        margin: 0 auto;
        background: url("https://ds120o7vl8cz9.cloudfront.net/images/popup/fro-expo-delhi-footer.jpg") no-repeat center top;
    }


    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:transparent;
        color:#1f1c55!important;
        border-radius: 10px!important;
        height: 36px;border:1px solid #1f1c55 !important
    }

    .fi-expotest {
        font-size: 39px;
        color: #ea1519;
        font-family: 'Open Sans Semibold';
        padding: 25px 0 8px 0;
        line-height: 39px;
        text-transform: uppercase
    }
    .fi-expotest span { color: #fff;}

.expo-submitnew
{
  padding: 10px 19px;
  background: #fff !important;
  text-transform: uppercase;
  color: #1b1457;
  font-size: 14px;
  font-family: Open Sans;
  cursor: pointer;
  margin: 5px auto 0 0;
  border: 0;
  display: inline-block;
  border-radius: 0px;
  font-weight: bold;
  border: 1px solid #1b1457;
}
    .boxblk {
        padding:9px 30px 0px 30px;
    }

    .fblk {
        text-align: center
    }

    .tsha {
        font-family: 'Open Sans Semibold';
        font-size: 22px;
        line-height: 24px;
        clear: both;
        color: #fff;
        margin-bottom: 10px;
        padding:0 36px;
    }

    .valtxtx span {
        color: #fff;
        font-family: 'Open Sans Bold'
    }


.headtag { height: 284px; overflow: hidden; width: 600px;
background: url("https://ds120o7vl8cz9.cloudfront.net/images/popup/fro-expo-delhi-header.jpg") no-repeat center top;
overflow: hidden;

}
.ftrbg { background: #ea1519; color: #fff;  padding: 5px; text-align: center;  font-family: 'Open Sans Regular'; font-size: 16px; line-height: 22px;}
</style>

 @php
    $states = Config('location.stateArr');
    asort($states);
@endphp 
<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <div id="my_modal" class="model_top" style="width:600px">
                    <div class="headtag">
                       
                    </div>

                    <div class="fi-bg-expo">


                   
                        <div class="boxblk">
<form id="msform" action="https://master.franchiseindia.com/expo/register_update.php" name="msform1" method="post">
<input type="hidden" value="Insta-Registration" id="ref" name="ref">
<input id="src" name="src" type="hidden" value="Popup"> 
<input type="hidden" value="Attend Registration" name="reg_type" id="reg_type">
<input type="hidden" value="Delhi May 2024" name="event_year" id="event_year">
<input type="hidden" value="VIPEB" name="package" id="package">
                                


                                <div class="sec">
                                    <div class="f1">
<input name="txtName" type="text" class="form-control myselect" placeholder="Name" required="" style="color:#ffffff;">
                                    </div>
                                    <div class="f3">
                                        <input name="txtEmail" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control myselect" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtMobile" type="tel" placeholder="Contact No." class="form-control myselect" pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                    <div class="f3">
                                   
                                        <select name="txtState" onchange="getcitypopup(this)" class="form-control myselect" id="txtState" required="">
                                              <!-- <option value="new delhi">new delhi</option> -->
                                            <option value="" data-id="">Select State</option>
                                            @foreach($states as $index => $value)
                                                <option value="{{ $value }}" data-id="{{ $index }}">{!! $value !!}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                         <select name="txtCity" class="form-control myselect" id="popupcity" required="">
                                            <option value="">Select City</option>
                                            <!-- <option value="delhi">delhi</option> -->
                                        </select>
                                    </div>
                                    <div class="f3">
                                             <!--    <select type="text" placeholder="No. of Visitors" id="eventdays" name="eventdays" class="form-control myselect" accesskey="">
                     <option value="Saturday28thAugust" selected="selected">Saturday, 28th August  </option>
                     <option value="Sunday29thAugust">Sunday, 29th August  </option>
                     <option value="Bothdays2829August">Both days, 28th-29th August  </option>
                  </select> -->
                  <select placeholder="No. of Visitors" id="txtDelegates" name="txtDelegatesRDP" class="form-control myselect" onchange="checkNumbersforfrom(this.value);">
                        <option selected="selected" value="1">Select No of Tickets</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                                    </div>
                                </div>


                                <div class="sec">
                                    <div class="f1">
                                <select name="txtCategory" id="txtCategory" required="required" class="form-control">
<option value="1">Select Area of Interest</option>
<option value="1">Beauty &amp; Health</option>
<option value="2">Food And Beverage</option>
<option value="3">Education</option>
<option value="5">Dealers &amp; Distributors</option>
<option value="6">Business Services</option>
<option value="7">Home Based Business</option>
<option value="8">Automotive</option>
<option value="9">Retail</option>
<option value="10">Fashion</option>
<option value="11">Sports, Fitness &amp; Entertainment</option>
<option value="263">Hotel, Travel &amp; Tourism</option>
<option value="573">Industrial Machinery &amp; Manufacturing</option>
</select>
</div>
<div class="f3">
<select class="form-control" id="investment_range" required="required" name="investment_range">
<option value="1">Select Investment Range</option>
<option value="1">Rs. 10000 - 50 K</option>
<option value="3">Rs. 50 K - 2lac</option>
<option value="5">Rs. 2lac - 5lac</option>
<option value="7">Rs. 5lac - 10lac</option>
<option value="9">Rs. 10lac - 20lac</option>
<option value="11">Rs. 20lac - 30lac</option>
<option value="13">Rs. 30lac - 50lac</option>
<option value="15">Rs. 50lac - 1 Cr.</option>
<option value="17">Rs. 1 Cr. - 2 Cr</option>
<option value="19">Rs. 2 Cr. - 5 Cr</option>
<option value="21">Rs. 5 Cr. above</option>
</select>
</div>
</div>

             


                                
                                <div class="sec" style="text-align:center">
                                    <input type="submit" value="Get Your Entry Pass" name="btnSubmitReg" class="expo-submitnew">
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
    function checkNumbers(){var amt=500;var eventdays=$("#eventdays :selected").val();var visitVal=$("#txtDelegates :selected").val();if(eventdays=="Saturday28thAugust")
    {amt=500;$('#txtAmount').val(amt);}
    else if(eventdays=="Sunday29thAugust")
    {amt=500;$('#txtAmount').val(amt);}
    else if(eventdays=="Bothdays2829August")
    {amt=1000;$('#txtAmount').val(amt);}
    else{amt=500;$('#txtAmount').val(amt);}
        total=visitVal*amt;$('#txtAmount').val(total);}
    /*<![CDATA[*/if(screen.width>767)
    {$(document).ready(function(){$('#myModal').modal('show');});}
    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
