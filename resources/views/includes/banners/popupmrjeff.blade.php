<style type="text/css">
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
       
    }

    .f1 {
        float: none;
        width:50%;
         margin-bottom: 8px
    }

    .f3 {
        float: none;
        width: 50%;
         margin-bottom: 8px
    }

    .sec::placeholder {
        color: #333!important;
        opacity: 1
    }

    .sec:-ms-input-placeholder {
        color: #333!important
    }

    .sec:-ms-input-placeholder {
        color: #333!important
    }

    .fi-bg-expo {
        height:376px;
        width: 600px;
        padding-top:30px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/jeff-bottom.jpg") no-repeat center top;
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:#fff!important;
        border: 1px solid #767677;
        color: #000!important;
        border-radius: 4px;
        height: 37px;
    margin-bottom: 12px;
    }

    .sec:placeholder-shown {
        color: #000!important
    }

    .sec .form-control::placeholder {
        color: #000!important;
        opacity: 1
    }

    .sec .form-control:-ms-input-placeholder {
        color: #000!important
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
        padding: 4px 14px;
        background: #fff200;
        text-transform: uppercase;
        color: #ed1c24;
        font-size: 15px;
        font-family: 'Open Sans Bold';
        cursor: pointer;
        margin:4px auto 0 0;
        border-radius:4px;
        display: inline-block;
        font-weight:700;
        border:none;
    }

    .boxblk {
        padding: 20px 30px
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


.headtag { height:171px; overflow: hidden; width: 600px;
background: url("https://www.franchiseindia.com/images/jeff-header.jpg") no-repeat center top;
overflow: hidden;

}
.ftrbg { background: #ea1519; color: #fff;  padding: 5px; text-align: center;  font-family: 'Open Sans Regular'; font-size: 16px; line-height: 22px;}
</style>

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
 <form id="form1" name="form1" action="https://www.franchiseindia.in/mr-jeff-franchise/reg_sub.php" method="post" class="form registration-form align-center">
 <input type="hidden" name="brand" id="brand" value="FIBL-Mr-Jeff" />
 <input type="hidden" name="brandid" id="brandid" value="5946" /> 
 <input type="hidden" name="userid" id="userid" value="108" /> 
 <input type="hidden" name="verticalid" id="verticalid" value="17" /> 
 <input type="hidden" name="linkpage" value="" />
 <input type="hidden" value="Popup" id="src" name="src">

                                <div class="sec">
                                    <div class="f1">
                                      <input id="name" name="name" type="text" class="form-control" placeholder="Your Name" required="required">
                                    </div>
                                    <div class="f3">
                                    <input id="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" name="email" type="email" class="form-control" placeholder="Email" required="required"></div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                       <input id="phone" pattern="[6789][0-9]{9}" minlength="10" maxlength="10" name="phone" type="tel" placeholder="Mobile" class="form-control" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" onkeypress="return isNumber(event)" required="required">
 </div>
                                    <div class="f3">

<select placeholder="State" type="text" class="form-control" id="txtstate" name="txtstate" onchange="getState(this.value);">

                 <option value="">Select State</option>

                    <option value="1">Andhra Pradesh</option><option value="3">Assam</option><option value="6">Chhattisgarh</option><option value="10">Gujarat</option><option value="11">Haryana</option><option value="14">Jharkhand</option><option value="15">Karnataka</option><option value="16">Kerala</option><option value="18">Madhya Pradesh</option><option value="19">Maharashtra</option><option value="25">New Delhi</option><option value="28">Punjab</option><option value="29">Rajasthan</option><option value="32">Uttaranchal</option><option value="33">Uttar Pardesh</option><option value="34">West Bengal</option><option value="35">Tamil Nadu</option><option value="36">Telangana</option>
                    </select>
                                    </div>
                                </div>

             
                                <div class="sec" style="text-align:leftg">
                                    <input type="submit" id="submtval" value="SUBMIT" name="btnSubmitReg" class="expo-submitnew">
                                </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>

<script language="javascript">
    function checkNumbers(){var amt=500;var eventdays=$("#eventdays :selected").val();var visitVal=$("#txtDelegates :selected").val();if(eventdays=="Friday22may")
    {amt=500;$('#txtAmount').val(amt);}
    else if(eventdays=="Saturday23may")
    {amt=500;$('#txtAmount').val(amt);}
    else if(eventdays=="Bothdays2223may")
    {amt=1000;$('#txtAmount').val(amt);}
    else{amt=500;$('#txtAmount').val(amt);}
        total=visitVal*amt;$('#txtAmount').val(total);}
    /*<![CDATA[*/if(screen.width>767)
    {$(document).ready(function(){$('#myModal').modal('show');});}
    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
