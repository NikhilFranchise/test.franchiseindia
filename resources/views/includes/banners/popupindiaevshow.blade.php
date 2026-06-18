<style type="text/css">
#myModals ::-webkit-input-placeholder {
    color: #ffffff;
}
#myModals ::-moz-placeholder {
    color: #ffffff;
}
#myModals :-ms-input-placeholder {
    color: #ffffff;
}
#myModals ::placeholder {
    color: #ffffff;
}
/*input:focus {

    background-color: transparent!important;

}*/
    #myModals .modal-body {
        padding: 0!important
    }

    #myModals .modal-dialog {
        width: 600px!important
    }

    #myModals .close {
        right: -19px!important;
        top: -19px!important;
        box-shadow: 0 0 15px 8px rgba(0, 0, 0, 0.35)!important
    }

    #popup_entry1 input.errorInput {
        border: 1px solid yellow;
        background: yellow
    }

    #myModals .my_modal_close {
        position: absolute
    }

    #myModals .modal-content {
        margin-top: 70px
    }

    #myModals .sec {
        overflow: hidden;
        width: 100%;
        margin-bottom: 11px
    }

    #myModals .f1 {
        float: left;
        width: 48%
    }

    #myModals .f3 {
        float: right;
        width: 48%
    }


    #myModals .fi-bg-expo {
        height:245px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/india-ev-show-popup-footer.webp") no-repeat center top;
    }

#myModals select option{background: #48c25d;}

    #myModals .sec .f1 .form-control,
    #myModals .sec .f3 .form-control {
        background: transparent!important;
  color: #ffffff!important;
  border-radius: 5px !important;
  height: 40px;
  border: 1px solid #ffffff !important;
  margin-top: 7px;
  font-weight: 300;
    }

    #myModals .fi-expotest {
        font-size: 39px;
        color: #ea1519;
        padding: 25px 0 8px 0;
        line-height: 39px;
        text-transform: uppercase
    }
    #myModals .fi-expotest span { color: #fff;}

#myModals .expo-submitnew {
  padding: 11px 19px;
  background:#f8ea0c;
  text-transform: uppercase;
  color: #000000;
  font-size: 14px;
  margin: 4px auto 0 0;
  border: 0;
  display: inline-block;
  border-radius: 0px;
  font-weight: bold;
}
    #myModals .boxblk {
        padding:9px 30px 0px 30px;
    }

    #myModals .fblk {
        text-align: center
    }

    #myModals .tsha {
        font-family: 'Open Sans Semibold';
        font-size: 22px;
        line-height: 24px;
        clear: both;
        color: #fff;
        margin-bottom: 10px;
        padding:0 36px;
    }

    #myModals .valtxtx span {
        color: #fff;
        font-family: 'Open Sans Bold'
    }


#myModals .headtag { height: 306px; overflow: hidden; width: 600px;
background: url("https://www.franchiseindia.com/images/popup/india-ev-show-popup-header.webp") no-repeat center top;
overflow: hidden;

}
#myModals .ftrbg { background: #ea1519; color: #fff;  padding: 5px; text-align: center;  font-family: 'Open Sans Regular'; font-size: 16px; line-height: 22px;}
</style>

 @php
    $states = Config('location.stateArr');
    asort($states);
@endphp 
<div id="myModals" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <div id="my_modal" class="model_top" style="width:600px">
                    <div class="headtag">
                    </div>
                    <div class="fi-bg-expo">
                        <div class="boxblk">


  

                        <form id="attendForm" action="https://www.indiaev.org/gujarat/register_update.php" name="msform1" method="post">
                        <input type="hidden" name="ref" value="BusinessEx-Webinar-Registration">
                        <input type="hidden" name="reg_type" value="Electric Vehicle Confex & Awards">
                        <input type="hidden" name="visit_type" value="Conference Registration">
                        <input type="hidden" name="event_year" value="Gujarat September 2025">
                        <input type="hidden" name="src" value="Popup">


                       <div class="sec">
                                    <div class="f1">
<input name="name" type="text" class="form-control myselect" placeholder="Name" required="" style="color:#ffffff;">
                                    </div>
                                    <div class="f3">
                                        <input name="email" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control myselect" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <input name="telephone" type="tel" placeholder="Contact No." class="form-control myselect" pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                    <div class="f3">
                                   
                                          <select name="txtState" onChange="getcitypopup(this)" class="form-control myselect" id="txtState" required="">
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
                  <select type="text" placeholder="Select event date" id="eventdays" name="package" class="form-control" accesskey="" onchange="checkNumbers();">
                         <!--    <option value="EXPO VISITOR Saturday20September">Saturday, 20th September</option>
                            <option value="EXPO VISITOR Sunday21September">Sunday, 21st September</option>
                            <option value="EXPO VISITOR Bothdays2021September">Bothdays, 20th-21st September</option> -->
                            <option value="EXPO VISITOR Bothdays2021September" selected>Expo Visitor</option>
                  </select>
                                    </div>
                                </div>

                            <div class="sec" style="text-align:center">
                                    <input type="submit" value="Register To Attend" name="btnSubmitReg" class="expo-submitnew">
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
    {$(document).ready(function(){$('#myModals').modal('show');});}
    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
