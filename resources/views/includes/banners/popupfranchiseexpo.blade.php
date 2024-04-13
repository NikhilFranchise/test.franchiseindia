<style type="text/css">
    #myModal .modal-body {
        padding: 0!important
    }
.form-control--white{background-color: transparent!important;border: none!important;outline:none;box-shadow: none;color: #333333;
    font-size: 17px!important;padding-left: 0px;height: auto;
    vertical-align:top;  font-family: Myriad Pro;
    padding-top: 0px;}
    .nopd{padding: 0px!important;}
.expoamount{color: #000000;    font-family: Myriad Pro;
    text-align: right;
    font-size: 17px;}
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
        height:448px;
        width: 600px;
        padding-top:110px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/popupfranchiseexpobottom.jpg") no-repeat center top;
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
        cursor: pointer;
        border:none;margin-top: 1px;
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
background: url("https://www.franchiseindia.com/images/popup/popupfranchiseexpo.jpg") no-repeat center top;
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
              <form class="form registration-form align-center" action="https://master.franchiseindia.com/fro/register_update.php" method="post">
    <input id="ref" name="ref" type="hidden" value="FRO-Insta-Paid">
    <input id="lp_type" name="event_title" type="hidden" value="FROBOS 2022">  
    <input id="source" name="source" type="hidden" value="popup"> 
 <input type="hidden" value="Kolkata22ndMay2022" name="eventdays" id="eventdays">		
    <input id="tfw_interest" name="tfw_interest" type="hidden" value="Visit the Expo - Paid">  

                                <div class="sec">
                                      <div class="f1">
                                    </div>
                                    <div class="f1">
                                      <input type="text" class="form-control" name="txtName" id="txtName" title="Enter Name" required="">
                                    </div>
                                    <div class="f3">
                                  <input type="text" class="form-control" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" maxlength="150" value="" id="txtEmail" name="txtEmail" title="Enter Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                       <input type="text" class="form-control" value="" id="txtPhone" name="txtPhone" title="Enter Mobile" pattern="[5-9]{1}[0-9]{9}" maxlength="10" onkeypress="return isNumber(event)">
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
                                          <!--  <option value="delhi">delhi</option> -->
                                        </select>
                                    </div>
                                 
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                    <input type="text" class="form-control" maxlength="150" value="" id="txtAddress" name="txtAddress" title="Enter Address" required="">
                                    </div>

                                                                    <div class="sec">
                                    <div class="f1">
                                     <select name="txtDelegates" id="txtDelegates" class="form-control" onchange="checkNumbersforfrom(this.value);">
                        <option value="" disabled="" selected="" hidden="">Select No. of Visitors</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
                    </select>
                                    </div>
                                 
                                </div>
                        </div>
                    </div>
               <div class="sec" style="text-align:center;background-color: #ffcb08;padding:15px 0px;">
               	<div class="row">
               		<div class="col-md-7 nopd">
               <div class="expoamount">Total Amount: Rs. </div></div>
<div class="col-md-4 nopd">
               <input class="form-control form-control--white amountt marginfix" type="text" value="590" id="txtAmount" name="txtAmount" readonly="">
           </div>
       </div>
               
                                   
                                    <button type="submit" id="submtval" value="Book Your Seat" name="btnSubmitReg" class="expo-submitnew"><img src="https://www.franchiseindia.com/images/popup/submitexpo.png"></button>
                                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="javascript">
      function checkNumbersforfrom(v){
        console.log('fzdfgSDF');
      if(v=="1"){
        //alert("Hello");
     let amt = 590; 
         $('#txtAmount').val(amt);
        $('#payMent').show();
      }
      
       else if(v=="2")
       {
         let amt = 1180; 
         $('#txtAmount').val(amt);
         $('#payMent').show();
      
      }
      
      else if(v=="3")
       {
         let amt = 1770; 
       $('#txtAmount').val(amt);

   
   $('#payMent').show();
      }
      else if(v=="4")
       {
         let amt = 2360; 
      $('#txtAmount').val(amt);
      $('#payMent').show();
      }
      else if(v=="5")
       {
         let amt = 2950; 
      $('#txtAmount').val(amt);
      $('#payMent').show();
      }
      
      else if(v=="6")
       {
         let amt = 3540; 
      $('#txtAmount').val(amt);
      $('#payMent').show();
      }
            else if(v=="7")
       {
         let amt = 4130; 
      $('#txtAmount').val(amt);
      $('#payMent').show();
      }
            else if(v=="8")
       {
         let amt = 4720; 
      $('#txtAmount').val(amt);
      $('#payMent').show();
      }
            else if(v=="9")
       {
         let amt = 5310; 
      $('#txtAmount').val(amt);
      $('#payMent').show();
      }
            else if(v=="10")
       {
         let amt = 5900; 
      $('#txtAmount').val(amt);
      $('#payMent').show();
      }
    }
</script>


 
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
