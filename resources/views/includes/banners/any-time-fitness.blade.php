<style type="text/css">
::-webkit-input-placeholder { 
     color:#ffffff!important;
}
:-moz-placeholder { 
    color:#ffffff!important;
}
::-moz-placeholder { 
    color:#ffffff!important;
} /* For the future */
:-ms-input-placeholder { 
    color:#ffffff!important;
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
select option{background: #000000;}
    .f1 {
        float: left;
        width: 29%
    }

    .f3 {
        float: right;
        width: 48%
    }

    .model_top{
        height:550px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/any-time-fitness.jpg") no-repeat center top;
    }


    .fi-bg-expo {
        margin: 0 auto;padding-top: 215px;
    }


    .sec .f1 .form-control,
    .sec .f3 .form-control {
       background: transparent;
  color: #ffffff !important;
  border-radius: 3px !important;
  height: 31px;
  border: 1px solid #aaaaaa!important;
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
  padding: 6px 52px;
  background: #d5352e;
  text-transform: uppercase;
  color: #fff;
  font-size: 14px;
  cursor: pointer;
  margin: 1px auto 0 0;
  border: 0;
  display: inline-block;
  border-radius: 3px;
  font-weight: bold;
  border: none;
}
    .boxblk {
        padding:9px 30px 0px 22px;
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
background: url("fro-expo-delhi-header.jpg") no-repeat center top;
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
                    <div class="fi-bg-expo">
                        <div class="boxblk">
<form id="msform" action="https://www.franchiseindia.com/advertisement/feedback_express.php" name="msform1" method="post">
<input type="hidden" value="FIHL226456" id="franchisor_id" name="franchisor_id">
<input type="hidden" value="DOTCOM" id="source" name="source">
<input type="hidden" value="Popup" id="source_ref" name="source_ref">

                                <div class="sec">
                                    <div class="f1">
<input name="txtName" type="text" class="form-control myselect" placeholder="Name" required="" style="color:#ffffff;">
                                    </div>
                                </div>

                                    <div class="sec">
                                        <div class="f1">
                                        <input name="txtEmail" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control myselect" placeholder="Email" required="">
                                    </div>
                                    </div>

                                <div class="sec">
                                    <div class="f1">
                                        <input name="txtMobile" type="tel" placeholder="Contact No." class="form-control myselect" pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                </div>

                                    <div class="sec">
                                        <div class="f1">
                                        <select name="txtState" onchange="getcitypopup(this)" class="form-control myselect" id="txtState" required="">
                                              <!-- <option value="new delhi">new delhi</option> -->
                                            <option value="" data-id="">State</option>
                                            @foreach($states as $index => $value)
                                                <option value="{{ $value }}" data-id="{{ $index }}">{!! $value !!}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    </div>

                                <div class="sec">
                                    <div class="f1">
                                         <select name="txtCity" class="form-control myselect" id="popupcity" required="">
                                            <option value="">City</option>
                                            <!-- <option value="delhi">delhi</option> -->
                                        </select>
                                    </div>
                                </div>


                                 <div class="sec">
                                        <div class="f1">
                                        <input name="txtPin" inputmode="numeric" oninput="this.value = this.value.replace(/\D+/g, '')" type="text" class="form-control myselect" placeholder="Pincode" required="" maxlength="6">
                                    </div>
                                    </div>

                                
                                <div class="sec" style="text-align:center">
                                    <div class="f1">
                                    <input type="submit" value="Submit" name="btnSubmitReg" class="expo-submitnew">
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
