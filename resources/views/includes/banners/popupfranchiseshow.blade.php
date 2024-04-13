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
        padding-top:77px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/popupfranchiseshowbottom.jpg") no-repeat center top;
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:#fff!important;
        border: 1px solid #767677;
        color: #000!important;
        border-radius: 4px;
        height: 31px;
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
background: url("https://www.franchiseindia.com/images/popup/popupfranchiseshowtop.jpg") no-repeat center top;
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
              <form class="form registration-form align-center" action="https://master.franchiseindia.com/fro/register_update_franchise_show.php" method="post">
    <input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
    <input id="lp_type" name="event_title" type="hidden" value="Franchise Show - FOAG">  
    <input id="source" name="source" type="hidden" value="popup"> 
    <input id="tfw_interest" name="tfw_interest" type="hidden" value="Visit the Expo - Paid">

                                <div class="sec">
                                      <div class="f1">
                                         <select id="eventdays" name="event_year" class="form-control"  required="">
<option value="UttarPradesh01Feb2022"> -- Select Event Date --</option> 
<option value="UttarPradesh01Feb2022">Uttar Pradesh, 01 Feb 2022</option>
<option value="DELHINCR03Feb2022">DELHI-NCR, 03 Feb 2022</option>
<option value="AndhraPradesh05Feb2022">Andhra Pradesh, 05 Feb 2022</option>
<option value="Rajasthan08Feb2022">Rajasthan, 08 Feb 2022</option>
<option value="WestBengal10Feb2022">West Bengal, 10 Feb 2022</option>
<option value="Telangana11Feb2022">Telangana, 11 Feb 2022</option>
<option value="Maharashtra15Feb2022">Maharashtra, 15 Feb 2022</option>
<option value="Karnataka17Feb2022">Karnataka,17 Feb 2022</option>
<option value="TamilNadu19Feb2022">TamilNadu, 19 Feb 2022</option>
<option value="MadhyaPradesh22Feb2022">Madhya Pradesh, 22 Feb 2022</option>
<option value="Gujarat24Feb2022">Gujarat, 24 Feb 2022</option>
                                        </select>
                                    </div>
                                    <div class="f1">
                                    <input id="txtname" name="txtName" type="text" class="form-control" placeholder="Name" required="">
                                    </div>
                                    <div class="f3">
                                   <input id="txtemail" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" name="txtEmail" type="email" class="form-control" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                       <input id="txtphone" pattern="[789][0-9]{9}" minlength="10" maxlength="10" name="txtPhone" type="tel" placeholder="Mobile" class="form-control" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" onkeypress="return isNumber(event)" required="">
                                    </div>
                                    <div class="f3">
                                   
                                        <select name="txtState" onchange="getcitypopup(this)" class="form-control" id="txtState" required="">
                                            <!-- <option value="new delhi">new delhi</option>-->
                                          <option value="" data-id="">Select State</option>
                                            @foreach($states as $index => $value)
                                                <option value="{{ $value }}" data-id="{{ $index }}">{!! $value !!}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                         <select name="txtCity" class="form-control" id="popupcity" required="">
                                            <option value="">Select City</option>
                                           <!--<option value="delhi">delhi</option>-->
                                        </select>
                                    </div>
                                 
                                </div>

             
                                <div class="sec" style="text-align:leftg">
                                    <input type="submit" id="submtval" value="Book Your Seat" name="btnSubmitReg" class="expo-submitnew">
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
