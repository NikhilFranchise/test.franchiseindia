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
        height:247px;
        width: 600px;
        margin: 0 auto;
        background: url("frochandigarh-top.jpg") no-repeat center top;
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:transparent!important;
        border: 1px solid #2c2c2c!important;
        color: #000!important;
        border-radius: 10px;
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

    .fi-bg-expo {
        height:247px;
        width: 600px;
        margin: 0 auto;
        background: url("frochandigarh-bottom.jpg") no-repeat center top;
    }



    .sec .f1 .form-control,
    .sec .f3 .form-control {
        background:transparent;!important;
        border: 1px solid #2c2c2c;
        color: #000!important;
        border-radius: 10px;
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
        padding: 8px 14px;
        background: #ea1519;
        text-transform: uppercase;
        color: #fff;
        font-size: 18px;
        font-family: 'Open Sans Bold';
        cursor: pointer;
        margin:5px auto 0 0;
        border: 0;
        display: inline-block
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
background: url("frochandigarh-top.jpg") no-repeat center top;
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
                <a href="https://www.franchiseindia.com/brands/GreenTrends.14289?utm_source=cG9wdXA=&utm_campaign=bWFpbGVyMjAyMQ==" target="_blank">
                    <img src="https://www.franchiseindia.com/images/popup/green-trends.jpg" alt="GREEN TRENDS">
                </a>
               
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
    {$(document).ready(function(){$('#myModal').modal('show');});}
    function isNumber(evt){evt=(evt)?evt:window.event;var charCode=(evt.which)?evt.which:evt.keyCode;return !(charCode > 31 && (charCode < 48 || charCode > 57));
        }
    function getcitypopup(value){value=$(value).find(':selected').attr('data-id');$.ajax({type:'GET',url:'/getcitylist',data:{state:value},success:function(data){$("#popupcity").html(data);}});}/*]]>*/
</script>
