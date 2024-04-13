<style type="text/css">
    #myModal .modal-body {
        padding: 0px !important;
    }

    #myModal .modal-dialog {
        width: 550px !important;
    }

    #myModal .bcs {
        position: absolute;
        right: 46px !important;
        top: -30px !important;
        background: transparent !important;
        box-shadow: none !important;
        z-index: 999;
        height: 33px;
        width: 33px;
        display: block;
        opacity: 1;
        cursor: pointer;
    }

    #myModal .close {
        right: -19px !important;
        top: -19px !important;
        box-shadow: 0px 0px 15px 8px rgba(0, 0, 0, 0.35) !important;
    }

    #myModal .my_modal_close {
        position: absolute;
    }

    #myModal .modal-content {
        margin-top: 70px;
    }

    .fi-HeadCont-expo {
        width: 550px;
        margin: 0 auto;
        padding: 0;
        background: #fff;
    }

    .clear {
        clear: both;
    }

    .sec {
        overflow: hidden;
        width: 100%;
        margin-bottom: 10px;
    }

    .riblklet {
        float: left;
        width: 330px;
    }

    .ri-bg-exponew {
        height: 542px;
        width: 550px;
        margin: 0 auto;
        background: url("https://www.franchiseindia.com/images/popup/resbottombg.jpg") no-repeat center top;
    }

    .ri-expo-form {
        overflow: hidden;
        margin: 0px auto;
        padding: 0;
    }

    .ri-expo-form input[type="text"], .ri-expo-form input[type="tel"], .ri-expo-form input[type="email"] {
        border-radius: 6px;
        width: 87%;
        padding: 6px 0 6px 10px;
        color: #333;
        float: left;
        background: white;
        border: 1px solid #dfdfdf;
        height: 32px;
    }

    .ri-expo-form input[placeholder] {
        color: #000;
    }

    .ri-expo-form select {
        width: 87%;
        background: white;
        height: 32px;
        border-radius: 6px;
        padding: 4px !important;
        border: 1px solid #dfdfdf;
        line-height: 28px !important;
        color: #666;
    }

    .ri-bgcolor {
        background: #000;
        color: #fff;
        font-family: 'Open Sans Regular';
        font-size: 16px;
        text-align: center;
        width: 550px;
        padding: 5px 0 7px;
    }

    .ri-expotest {
        font-size: 33px;
        color: #fff;
        font-family: 'Open Sans Bold';
        padding: 30px 0 5px 30px;
        line-height: 26px;
        text-transform: uppercase;
        width: 311px;
    }

    .ri-expotest span {
        color: #f5e922;
        font-size: 17px;
        font-style: italic;
        font-family: 'Open Sans Regular';
        text-transform: capitalize;
    }

    .ri-expo-form .ri-submitnew {
        background: url("https://www.franchiseindia.com/images/popup/submitres.png") no-repeat;
        width: 141px;
        height: 45px;
        cursor: pointer;
        margin: 5px auto 0 0px;
        border: none;
    }

    .boxblk {
        padding: 45px 0px 20px 30px;
        width: 330px
    }

    .txtimg {
        margin-top: 50px;
        margin-bottom: 30px;
    }

    .fleft {
        float: left;
    }

    .fright {
        float: right;
        margin-top: 25px;
    }

    .ritsha {
        font-family: 'Open Sans Light';
        font-size: 16px;
        line-height: 17px;
        clear: both;
        color: #fff;
        margin-bottom: 20px;
    }

    .ritsha span {
        font-family: 'Open Sans Bold';
        font-size: 16px;
    }

    /* End popup start */
</style>


<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <div class="modal-body">

                <script type="text/javascript">
                    function closePopup() {
                        //alert('FRO POPUP');
                        $('#my_modal').hide();
                        $('#my_modal_background').hide();
                    }

                </script>
                <div id="my_modal" class="model_top" style="width:550px;">
                    <!--<img src="https://www.franchiseindia.com/images/popup/close.gif" class="my_modal_close" onclick="closepop();" style="right: -2px;"/>-->
                    <div class="fi-HeadCont-expo">
                        <a href="https://www.restaurantindia.in/south/" target="_blank"><img
                                    src="https://www.franchiseindia.com/images/popup/restopbanner.jpg"/></a>

                    </div>
                    <div class="ri-bg-exponew">


                        <div class="boxblk">

                            <div class="txtimg">
                                <img src="https://www.franchiseindia.com/images/popup/text-res.png"/>

                            </div>


                            <form method="post" id="form1-stall" name="form1-stall"
                                  action="https://www.restaurantindia.in/south/register_update.php"
                                  class="ri-expo-form">
                                <input type="hidden" value="IRC-Insta" id="ref" name="ref">
                                <input type="hidden" name="src" id="src" value="popup">
                                <input type="hidden" value="Bangalore December 2018" name="event_year" id="event_year">


                                <div class="sec">
                                    <div class="riblklet">
                                        <select placeholder="No. of Visitors" id="want" name="want" class="form-control"
                                                required>
                                            <option value="">I Would Like to :</option>
                                            <option value="Attend the congress">Attend the congress</option>
                                            <option value="Self nominate for the awards">Self nominate for the Awards
                                            </option>
                                            <option value="Exhibit at the congress">Exhibit at the congress</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="sec">

                                    <div class="riblklet">
                                        <input id="txtname" name="txtname" type="text" class="form-control"
                                               placeholder="Name" required="">
                                    </div>
                                </div>

                                <div class="sec">

                                    <div class="riblklet">
                                        <input id="txtemail" name="txtemail" type="email" class="form-control"
                                               pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"
                                               placeholder="Email" required="">
                                    </div>
                                </div>

                                <div class="sec">

                                    <div class="riblklet">
                                        <input id="txtphone" name="txtphone" type="text" placeholder="Mobile"
                                               class="form-control" pattern="[789][0-9]{9}" minlength="10"
                                               maxlength="10" onkeypress="return isNumber(event)" required="">
                                    </div>
                                </div>
                                <div class="sec">

                                    <div class="riblklet">
                                        <input id="txtcompany" name="txtcompany" type="text" class="form-control"
                                               placeholder="company" required="">
                                    </div>
                                </div>
                                <div class="sec">
                                    <div class="riblklet">
                                        <input type="submit" value="" name="btnSubmitReg" class="ri-submitnew">
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
    if (screen.width > 767) {
        $(document).ready(function () {
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
</script>




