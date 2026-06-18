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
        margin-bottom: 18px;
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
        height:247px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/frolucknowtop.jpg") no-repeat center top;
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:transparent!important;
        border: 1px solid #2c2c2c!important;
        color: #000!important;
        border-radius: 10px;
        height: 40px;
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

    .fi-bg-expo {
        height:247px;
        width: 600px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/frolucknowbottom.jpg") no-repeat center top;
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:#ffffff!important;
        border: 1px solid #2c2c2c;
        color: #000!important;
        border-radius: 0px;
        height: 36px;
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
    padding: 12px 21px;
    background: #227C98;
    text-transform: uppercase;
    color: #fff;
    font-size: 15px;
    font-family: 'Open Sans Bold';
    cursor: pointer;
    margin: 5px auto 0 0;
    border: 0;
    display: inline-block;
}
    .boxblk {
        padding:1px 30px 20px 30px;
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
background: url("https://www.franchiseindia.com/images/popup/frolucknowtop.jpg") no-repeat center top;
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

<form class="form registration-form align-center" 
action="https://www.franchiseindiaevents.com/lucknow-franchise-meet/register_update.php" method="post">
<input type="hidden" name="ref" value="Insta-Registration">
<input type="hidden" name="reg_type" value="Events"> 
<input type="hidden" name="visit_type" value="Lucknow Franchise Meet">                
<input type="hidden" name="event_year" value="15 October 2022">
<input id="source" name="source" type="hidden" value="popup"> 
                                
  <div class="sec">
                                    <div class="f1">
                                        <input type="text" placeholder="Name" name="name" class="form-control"  required="">
                                    </div>
                                    <div class="f3">
                                     <input type="email" placeholder="Email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" name="email" class="form-control"  required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                     <input type="text" name="telephone" pattern="[6789][0-9]{9}" maxlength="10" placeholder="Mobile" onkeypress="return isNumber(event)" class="form-control" required="">
                                    </div>
                                    <div class="f3">
                                   
                                     <select name="txtState" onchange="getcitypopup(this)" 
                                     class="form-control myselect" id="txtState" required="">
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
                                         <select name="txtCity" class="form-control myselect" id="popupcity" required="">
                                            <option value="">Select City</option>
                                        <!-- <option value="delhi">delhi</option> -->
                                        </select>
                                    </div>
                                    <div class="f3">
                       	<textarea class="form-control" name="details" id="details" placeholder="Query(Optional)"></textarea>

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
