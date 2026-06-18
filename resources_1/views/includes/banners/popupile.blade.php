<style type="text/css">
    #myModal .modal-body{padding:0px!important;}
    #myModal .modal-dialog{width:600px!important;}
    #myModal .bcs{position: absolute;
        right: 46px!important;
        top: -30px!important;
        background:transparent!important;
        box-shadow:none!important;
        z-index: 999;
        height: 33px;
        width: 33px;
        display:block;
        opacity: 1;
        cursor: pointer;
    }


    #myModal .close {
        right: -19px!important;
        top: -19px!important;
        box-shadow: 0px 0px 15px 8px rgba(0, 0, 0, 0.35)!important;
    }


    #popup_entry1 input.errorInput {
        border:1px solid yellow;
        background:yellow;
    }

    /*delhi-expo-popup*/
    #myModal .my_modal_close{ position:absolute;}
    #myModal .modal-content { margin-top:70px;}
    .fi-HeadCont-expo{width:600px;  margin:0 auto; padding:0; background:#fff;}
    .clear{clear:both;}
    .sec{overflow: hidden;width: 100%;margin-bottom: 7px; }
    .f1{ float:left; width:45%;}
    .f2{ float:left; width:5%; color:#fff;}
    .f3{ float:right; width:50%;}
    .newheader{z-index:1;}
    .show-header{margin-right:42px; width:538px;}
    .expo-header{ }
    .fi-bg-expo{height:460px; width:600px; margin:0 auto; background:url("https://www.franchiseindia.com/images/popup/ile-back.jpg") no-repeat center top;}
    .fro-expo-form{overflow:hidden; margin:0px auto;  padding:0; }
    .fro-expo-form label{width:180px; font-size:14px; font-family:Open Sans Light; margin-right:10px; float:left; color:#fff; padding-top:3px; padding-right:10px; text-align:left; }
    .fro-expo-form  input[type="text"], .fro-business-form input[type="tel"], .fro-business-form input[type="email"]{width:100%;     height: 28px;  padding:6px 0 6px 10px; color:#333; float:left; background:white; border:1px solid #dfdfdf; border-radius:0px;-moz-border-radius:0px;-webkit-border-radius:0px;}
    .fro-expo-form  input[placeholder]{color:#666;}
    .fro-expo-form select{width:100%;background:white; padding:2px 0 2px 6px!important; border:1px solid #dfdfdf; line-height:28px !important; color:#333; border-radius:0px; height: 32px;}

    .fro-expo-form label.error{display:none!important}
    .fro-expo-form input.error, .fro-business-form select.error {background: none repeat scroll 0 0 #ffa312 !important; color:#fff !important; border:1px solid #fff !important;}
    .fi-expotest{ font-size:26px; color:#fff; font-family:'Open Sans Regular';  padding:15px 0 0px 0px; line-height:26px; }
    .fi-expotest span{ text-transform:uppercase; color:#efa506; font-size:32px; font-family:'Open Sans Bold'; }
    .expo-submitnew{background:url("https://www.franchiseindia.com/images/popup/ile-btn.jpg") no-repeat; width:252px;
        height:35px;cursor:pointer;  margin:2px auto 0 0px; border:none; display:inline-block;}
    .boxblk { padding:20px 30px;}
    .fblk { text-align: center;}
    .tsha  {font-family:'Open Sans Light'; font-size:19px; line-height:19px; clear:both; color:#fff;     margin-top: 10px;}
    .tsha span { font-family:'Open Sans Semibold'; font-size:16px;}
    .expo-bgcolor{ background: #EA1519;color:#fff; text-align: center; font-size: 18px;padding-bottom:5px; padding-top: 2px;}
    /* End popup start */
    .valtxtx {font-family:'Open Sans Light'; font-size:20px; color:#fff;    padding-top: 10px;     margin: 0 auto;     width: 218px;}
    .valtxtx span{ color:#fff;       font-family: 'Open Sans Bold'; }
    .leftshow { float:left;}
    .valtxtx #novisitShow{    background: transparent!important;
        width: 23%!important;
        font-family: 'Open Sans Bold';
        border: none!important; float:left; height: 28px; color:#fff; padding:2px;}
</style>

@php
    $states = Config('location.stateArr');
        asort($states);
    $cities = Config('location.cityArr.18');
        asort($cities);
@endphp

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">

                <script type="text/javascript">

                    $(document).ready(function(){
                        $("#novisit").change(function() {
                            total = $('#novisit :selected').val() * 500;
                            $("#novisitAmountt").val(total);
                            $("#novisitShow").val(total);
                        });
                    });

                </script>
                <div id="my_modal" class="model_top" style="width:600px;">
                    <!--<img src="https://www.franchiseindia.com/images/popup/close.gif" class="my_modal_close" onclick="closepop();" style="right: -2px;"/>-->
                    <div class="fi-HeadCont-expo">

                        <div class="expo-header">
                            <a href="https://www.franchiseindia.com/fro/" target="_blank"><img class="lozad" data-src="https://www.franchiseindia.com/images/popup/ile-header.jpg" /></a>
                        </div>
                    </div>
                    <div class="fi-bg-expo">

                        <div class="fblk">
                            <div class="fi-expotest">Partner with <span>200+ Global <br />
Brands </span>
                                for Franchising &
                                Licensing Opportunities</div>


                        </div>






                        <div class="boxblk">





                                <form class="form fro-expo-form" action="https://www.licenseindia.com/expo/register_update.php" method="post" name="frmConferenceReg" id="frmConferenceReg">

                                    <input type="hidden" name="ref" value="Visitors-Registration">
                                    <input type="hidden" name="reg_type" value="India Licensing Expo Visitors Registration">
                                    <input type="hidden" name="event_date" value="Mumbai July 2019">
                                    <input type="hidden" name="source" value="Popup">




                                    <div class="sec">
                                    <div class="f1">
                                        <label>Name *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtName" name="person" type="text" class="form-control" placeholder="Name" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <label>Email *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtEmail" name="email" type="email"  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" class="form-control" placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <label>Contact *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <input id="txtPhone" name="tel" type="tel" placeholder="Mobile" class="form-control"
                                               pattern="[789][0-9]{9}" minlength="10" maxlength="10" onkeypress="return isNumber(event)" oninvalid="InvalidMsg(this);" oninput="InvalidMsg(this);" required="">
                                    </div>
                                </div>

                                <div class="sec">
                                    <div class="f1">
                                        <label>State *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">
                                        <select name="state" onchange="getcitypopup(this)"  class="form-control myselectclasscat" id="txtState">
                                            <option value="" data-id="">Select State</option>
                                            @foreach($states as $index => $value)
                                                <option value="{{ $value }}" data-id="{{ $index }}"  @if($index == 18) selected @endif >{!! $value !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                    <div class="sec">
                                        <div class="f1">
                                            <label>City *</label>
                                        </div>
                                        <div class="f2">:</div>
                                        <div class="f3">
                                            <select name="city" class="form-control myselectclasssearch" id="popupcity" >
                                                <option value="">Select a City</option>
                                                @foreach($cities as $value)
                                                    <option value="{!! $value !!}"  @if ( $value == "Mumbai City") selected @endif>{!! $value !!} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="sec">
                                        <div class="f1">
                                            <label>Address *</label>
                                        </div>
                                        <div class="f2">:</div>
                                        <div class="f3">
                                            <input id="txtAddress" name="address" type="text" class="form-control" placeholder="Enter Address" required="">
                                        </div>
                                    </div>



                                <div class="sec">
                                    <div class="f1">
                                        <label>Visitors  *</label>
                                    </div>
                                    <div class="f2">:</div>
                                    <div class="f3">

                                        <select placeholder="No. of Visitors" id="novisit" name="txtVisitor" class="form-control myselectclasscat" required>
                                            <option value="1" selected>No. of Visitors</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sec">
                                    <input class="form-control"  type="hidden" value="500" id="novisitAmountt" name="txtAmount" readonly>
                                </div>

                                <div class="sec" style="text-align:center;">
                                    <input type="submit" value="" name="btnSubmitReg" class="expo-submitnew">
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
    if(screen.width>767)
    {
        $(document).ready(function(){
            $('#myModal').modal('show');
        });
    }
    function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    function getcitypopup(value){

        value = $(value).find(':selected').attr('data-id');

        $.ajax({
            type:'GET',
            url:'/getcitylist',
            data:{state : value},
            success:function(data){
                $("#popupcity").html(data);
            }
        });
    }

</script>



