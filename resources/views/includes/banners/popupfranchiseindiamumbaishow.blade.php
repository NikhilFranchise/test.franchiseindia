<style type="text/css">
#myModall ::-webkit-input-placeholder { 
     color:#ffffff!important;
}
#myModall :-moz-placeholder { 
    color:#ffffff!important;
}
#myModall ::-moz-placeholder { 
    color:#ffffff!important;
} /* For the future */
#myModall :-ms-input-placeholder { 
    color:#ffffff!important;
}
/*input:focus {

    background-color: transparent!important;

}*/
    #myModall .modal-body {
        padding: 0!important
    }

    #myModall .modal-dialog {
        width: 600px!important
    }

    #myModall .close {
        right: -19px!important;
        top: -19px!important;
        box-shadow: 0 0 15px 8px rgba(0, 0, 0, 0.35)!important
    }

    #popup_entry1 input.errorInput {
        border: 1px solid yellow;
        background: yellow
    }

    #myModall .my_modal_close {
        position: absolute
    }

    #myModall .modal-content {
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
        height:288px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/popup-franchise-india-mumbai-show-footer.jpg") no-repeat center top;
    }

#myModall select option{background:#891f6a;}

    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background: transparent;
  color: #ffffff !important;
  border-radius: 5px !important;
  height: 40px;
  border: 1px solid #ffffff !important;
  margin-top: 7px;
  font-weight: 300;
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

.expo-submitnew {
  padding: 11px 19px;
  background:#f8ea0c;
  text-transform: uppercase;
  color: #000000;
  font-size: 14px;
  font-family: Open Sans;
  margin: 21px auto 0 0;
  border: 0;
  display: inline-block;
  border-radius: 0px;
  font-weight: bold;
}
    .boxblk {
        padding:20px 30px 0px 30px;
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


.headtag { height:263px; overflow: hidden; width: 600px;
background: url("https://www.franchiseindia.com/images/popup/popup-franchise-india-mumbai-show-header.jpg") no-repeat center top;
overflow: hidden;

}
.ftrbg { background: #ea1519; color: #fff;  padding: 5px; text-align: center;  font-family: 'Open Sans Regular'; font-size: 16px; line-height: 22px;}
</style>

 @php
    $states = Config('location.stateArr');
    asort($states);
@endphp 
<div id="myModall" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <div id="my_modal" class="model_top" style="width:600px">
                    <div class="headtag">
                    </div>
                    <div class="fi-bg-expo">
                        <div class="boxblk">

                        <form action="https://www.franchiseindia.com/expo/mumbai/register_update.php" method="post">
                        <input type="hidden" value="Insta-Registration" id="ref" name="ref">
                        <input type="hidden" name="src" id="src" value="Popup">
                        <input type="hidden" value="Attend Registration" name="reg_type" id="reg_type">
                        <input type="hidden" value="Mumbai November 2025" name="event_year" id="event_year">


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
                                          
                                        </select>
                                    </div>
                                    <div class="f3">
                  <select type="text" placeholder="Select event date" id="eventdays" name="eventdays" class="form-control myselectclass3" accesskey="" onchange="checkNumbers();">
                                 <option value="Bothdays1415November" selected>Expo Visit, Both Days</option>
                                 <option value="Friday14November">Expo Visit, Friday, 14 November</option>
                                 <option value="Saturday15November">Expo Visit, Saturday, 15 November</option>
                                 <option value="PremiumPass1415November">Premium Pass</option>
                  </select>
                                    </div>
                                </div>

                            <div class="sec" style="text-align:center">
                                    <input type="submit" value="GET YOUR ENTRY PASS" name="btnSubmitReg" class="expo-submitnew">
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
    {$(document).ready(function(){$('#myModall').modal('show');});}
    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
