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
    .fi-bannert{width:600px;  margin:0 auto; padding:0; background:#fff;}


</style>

<div id="myModal" class="modal fade" aria-hidden="true" tabindex="-1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">

            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">


                <div id="my_modal" class="model_top" style="width:600px;">
                    <!--<img src="https://www.franchiseindia.com/images/popup/close.gif" class="my_modal_close" onclick="closepop();" style="right: -2px;"/>-->
                    <div class="fi-bannert">
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdbMr9UuqAN3JPepF6utW49-os-1_Yg2wgpfiLS8HLUcUeOVA/viewform?usp=sf_link" target="_blank"><img class="lozad" data-src="{{Config('constants.MainDomain')}}/images/topeducation50.jpg" /></a>

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

</script>



