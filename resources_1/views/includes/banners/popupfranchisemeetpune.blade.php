<style type="text/css">
::-webkit-input-placeholder { 
     color: #4a4a4a!important;
}
:-moz-placeholder { 
    color: #4a4a4a!important;
}
::-moz-placeholder { 
    color: #4a4a4a!important;
} /* For the future */
:-ms-input-placeholder { 
    color: #4a4a4a!important;
}
input:focus {

    background-color: transparent;

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


    .fi-bg-expo {
        height:307px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/franchisemeetbottom.jpg") no-repeat center top;
    }


    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:#e8f0fe;
        border: 1px solid #767677;
        color: #4a4a4a!important;
        border-radius: 10px;
        height: 36px;
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
    padding: 10px 44px;
    background: #ffffff!important;
    text-transform: uppercase;
    color: e80c76;
    font-size: 18px;
    font-family: 'Open Sans Bold';
    cursor: pointer;
    margin: 5px auto 0 0;
    border: 0;
    display: inline-block;
    border-radius: 25px;
    font-weight: 800;
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


.headtag { height: 303px; overflow: hidden; width: 600px;
background: url("https://www.franchiseindia.com/images/franchisemeettop.jpg") no-repeat center top;
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
   <form id="msform" action="https://franchiseindiaevents.com/franchise-expo/reg_sub.php" name="msform1" method="post">
<input type="hidden" name="brand" id="brand" value="FIBL-Event-Registration" />
		<input type="hidden" name="linkpage" id="linkpage" value="exclusive-events" />
		<input id="source" name="source" type="hidden" value="Website">            
		<input type="hidden" name="txtstate" id="txtstate" value="website" />
<input type="hidden" name="category" id="category" value="Events" />
                                

                                <div class="sec">
                                    <div class="f1">
 <select placeholder="Event City" id="txtcity" name="txtcity" class="form-control myselect blur">
            <option value="">Event City</option>
            <option value="23 July - Ghaziabad">Ghaziabad, 23rd July - Radisson Blu Kaushambi</option>
            <option value="23 July - Kolkata">Kolkata, 23rd July - The Lalit Great Eastern</option>  
            <option value="24 July - Patna">Patna, 24th July - Lemon Tree Premier</option>
            <option value="30 July - Pune">Pune, 30th July - 93 Avenue Mall Solapur Road</option>  
        </select>
                                    </div>
                                    <div class="f3">
                                       <input type="text" placeholder="Enter Name" name="name" id="name" required="required" class="form-control myselect blur" />
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                       <input type="text" placeholder="Enter Email" name="email" id="email" required="required" class="form-control myselect blur"/>
                                    </div>
                                    <div class="f3">
                    <input type="text" placeholder="Enter Phone" name="phone" id="phone" required="required" maxlength="10" pattern="[56789][0-9]{9}" maxlength="10" class="form-control myselect blur"/>
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                            <select name="txtinvestment" id="txtinvestment"  placeholder="Investment"  class="form-control myselect blur">
				 <option value="">Select Range</option>
				<!-- <option value="1">Less than 10 Lac</option>-->
				  <option value="2">Rs. 10Lac - 20Lac</option>
				 <option value="3">Rs. 20Lac - 30Lac</option>
				 <option value="4">Rs. 30Lac - 40Lac</option>
				 <option value="5">Rs. 40Lac - 50Lac</option>
				 <option value="6">Rs. 50Lac - 60Lac</option>
				 <option value="7">Rs. 60Lac - 70Lac</option>
				 <option value="8">Rs. 70Lac - 80Lac</option>
				 <option value="9">Rs. 80Lac - 90Lac</option>
				 <option value="10">Rs. 90Lac - Rs. 1 Cr.</option> 
				 <option value="11">Rs. 1 Cr. - Rs. 2 Cr</option>
				 <option value="12">Rs. 2 Cr. - Rs. 5 Cr</option>
				 <option value="13">Rs. 5 Cr. and above</option>                       
			</select>
                                    </div>
                                    <div class="f3">
                  </select> 
                  <select placeholder="Select No. of Visitors" class="form-control myselect blur" id="txtDelegates" name="txtDelegates">
		  <option value="">Select No. of Visitors</option>
            <option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
            <option value="7">7</option>
			
          </select>
                                    </div>
                                </div>

                                
                                <div class="sec" style="text-align:center">
                                    <input type="submit" value="SUBMIT" name="btnSubmitReg" class="expo-submitnew">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>



<script type="text/javascript" src="https://www.franchiseindia.com/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="https://www.franchiseindia.com/js/validationInsta.js?ver=04"></script>
<script type="text/javascript" src="https://www.franchiseindia.com/js/js.cookie.min.js"></script>
<script type="text/javascript" src="https://www.franchiseindia.com/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://www.franchiseindia.com/js/bootstrap-filestyle.min.js"></script>
<script type="text/javascript" src="https://www.franchiseindia.com/js/custom.js?ver=04"></script>
<script type="text/javascript" src="https://www.franchiseindia.com/js/bootstrap-typeahead.js"></script>
<script type="text/javascript" src="https://www.franchiseindia.com/js/bioep.js"></script>
<script type="text/javascript" src="https://www.franchiseindia.com/js/lozad.min.js"></script>




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
