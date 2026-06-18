
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
        margin-bottom: 20px
    }

    .f1 {
        float: left;
        width: 48%
    }

    .f3 {
        float: right;
        width: 48%
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
        height:307px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/popupirbttomapril.jpg") no-repeat center top;
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:#fff;!important;
        border: 1px solid #767677;
        color: #333!important;
        border-radius:0px;
        height: 35px;
    }

    .sec:placeholder-shown {
        color: #333!important
    }

    .sec .form-control::placeholder {
        color: #333!important;
        opacity: 1
    }

    .sec .form-control:-ms-input-placeholder {
        color: #333!important
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
        padding: 8px 14px;
        background: #ea1519;
        text-transform: uppercase;
        color: #fff;
        font-size: 18px;
        font-family: 'Open Sans Bold';
        cursor: pointer;
        margin:0px auto 0 0;
        border: 0;
        display: inline-block
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


.headtag { height: 267px; overflow: hidden; width: 600px;
background: url("https://www.franchiseindia.com/images/popup/popupirtopapril.jpg") no-repeat center top;
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
               <form name="sentMessage" id="contactForm" action="https://www.indianretailer.com/webinars/register_update.php" method="post" enctype="multipart/form-data"> 
<input type="hidden" name="ref" value="Retail-Webinar-Registration">
<input type="hidden" name="reg_type" value="Retail Webinar Registration"> 
<input type="hidden" name="visit_type" value="Attend the Webinar - Driving Innovation and Growth">                     
<input type="hidden" name="event_year" value="29 April 2021">     
<input type="hidden" name="src" value="popup">       



                                <div class="sec">
                                    <div class="f1">
                                        <input name="name" type="text" class="form-control" placeholder="Name" required="">
                                    </div>
                                    <div class="f3">
                                        <input name="email" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <input name="telephone" type="tel" placeholder="Contact" class="form-control" pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                    <div class="f3">
                                   
                                           <input name="designation" type="text" placeholder="Designation" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                          <input name="txtOrg" type="text" placeholder="Company" class="form-control" required="">
                                    </div>
                                    <div class="f3">
                                          <input name="txtCity" type="text" placeholder="City" class="form-control" required="">
                                               
                                    </div>
                                </div>

             


                                
                                <div class="sec" style="text-align:center">
                                    <input type="submit" value="Register Now" name="btnSubmitReg" class="expo-submitnew">
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
