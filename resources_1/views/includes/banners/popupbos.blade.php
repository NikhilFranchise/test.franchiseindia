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
        width:42%;
         margin-bottom: 8px
    }

    .f3 {
        float: none;
        width: 42%;
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
        padding-top:72px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/popupbosbottom.jpg") no-repeat center top;
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:#fff!important;
        border: 1px solid #767677;
        color: #000!important;
        border-radius: 4px;
        height: 31px;width: 100%;
        padding-left: 6px;
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
    padding: 6px 36px;
    background: #fff200;
    text-transform: uppercase;
    color: #ed1c24;
    font-size: 14px;
    /* font-family: 'Open Sans'; */
    cursor: pointer;
    margin: 4px auto 0 0;
    border-radius: 4px;
    display: inline-block;
    font-weight: 700;
    border: none;
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
background: url("https://www.franchiseindia.com/images/popup/popupbostop.jpg") no-repeat center top;
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
<form method="post" id="form1-stall" name="form1-stall" action="https://master.franchiseindia.com/bos/register_update.php" class="top-reg">
<input type="hidden" value="BOS-Insta-Register" id="ref" name="ref">
<input id="source" name="source" type="hidden" value="Popup">   
<input type="hidden" name="want" id="want" value="Visit The Show">
<input type="hidden" name="event_city" id="event_city" value="Rajkot"> 
<input type="hidden" value="Gujarat" name="reg_type" id="reg_type">                        
<input type="hidden" value="September 2023" name="event_year" id="event_year">

  <div class="sec">
                                    <div class="f1">
                                      <input class="form-control form-control--white" placeholder="Name" name="txtname" type="txtname" required="">
                                    </div>
                                    <div class="f3">
                                      <input class="form-control form-control--white" placeholder="E-mail" name="txtemail" type="txtemail" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                      <input class="form-control form-control--white" placeholder="Mobile" name="txtphone" type="text" pattern="[789][0-9]{9}" maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                    <div class="f3">
                                   
                                        <select name="txtState" onchange="getcitypopup(this)" class="form-control" id="txtState" required="">
                                             <!--   <option value="">Select State</option>-->
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
                                         <!-- <option value="delhi">delhi</option>   -->
                                        </select>
                                    </div>
                                 
                                </div>

                                <div class="sec">
                                    <div class="f1">
                     <select class="form-control form-control--white myselectclass3" placeholder="Enter your Name" name="txtDelegates" type="text" id="txtDelegates" onchange="checkNumbersforfrom(this.value)" required="">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                  
                </select>
                                    </div>
                                 
                                </div> 

               <div class="sec" style="text-align:left">
                                    <input type="submit" value="Register to Attend" name="btnSubmitReg" class="expo-submitnew">
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
