@extends('layout.master')
@section('content')
<!--form start here -->
<div class="container formsection margintop60 staicp">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12"><h1>Unsubscribe from our newsletters</h1>
            <p class="simtxt">
            Your email id is : <strong>{{$eid}}</strong> <br>
            We are sorry to find you are not any longer interested in our newsletter. To help us improve our services, we would be grateful if you could tell us why:
            </p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 row-no-padding">
        <form class="form-horizontal" action="{{Config::get('constants.MainDomain')}}/unsub" method="post" name="feedbackForm" id="feedbackForm">
            <input type="hidden" name="_csrf" value="{{csrf_token()}}">
            <input type="hidden" name="pid" value="{{$pid}}">
            <input type="hidden" name="eid" value="{{$eid}}">
            <input type="hidden" name="site_type" value="{{$site}}">
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">
                Reason </label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                <div class="input-group">
                <span class="input-group-addon"><img src="/images/iwanto.png" alt="iwanto"></span>
                <select id="Reason" name="Reason" class="form-control myselectclass">        
                    <option value="">Please select reason</option>
                    <option value="Your emails are too frequent">Your emails are too frequent</option> 
                    <option value="I don�t remember signing up for this">I don't remember signing up for this</option> 
                    <option value="I no longer want to receive these emails">I no longer want to receive these emails</option> 
                    <option value="The emails are spam and should be reported">The emails are spam and should be reported </option> 
                    <option value="Other">Other </option> 
                </select>
                </div>
                </div>
            </div>

            <div class="form-group" id="comment" style="display: none">
                <label class="col-xs-12 col-sm-4 col-md-4 com4mod control-label mandatory">
                Comment </label>
                <div class="col-sm-1 com1mod padtop20 hidden-xs">:</div>
                <div class="col-xs-12 col-sm-7 col-md-6">
                <div class="input-group">
                <span class="input-group-addon"><img src="/images/iwanto.png" alt="iwanto"></span>
                <textarea cols="73" rows="6" name="txtFeedback" id="txtFeedback" class="clr no-left-mar fi-wide338 errorbox"></textarea>
                </div>
                </div>
            </div>

            <div style="text-align: center;">
                <input type="submit" class="btn btn-default frmbtntop" value="Unsubscribe "> 
            </div>
        
        </form> 
    </div>
    </div>
</div>
    <script type="text/javascript">
        $("#Reason").change(function(){ 
        if( $('#Reason :selected').val() != 'Other' ){       
            $("#comment").hide("slow"),
            $('#comment :input').attr('disabled', true);
        } else{
            $("#comment").show("slow"),
            $('#comment :input').removeAttr('disabled');
        }
        });

    $(document).ready(function(){
    var validator = $("#feedbackForm").validate({
    
    rules: {
            Reason: "required",
            txtFeedback: "required"
            },
        messages: {             

            Reason: "Please select reason",
            txtFeedback: "Enter Feedback details",
        },
        errorPlacement: function(error, element) {                  
            error.appendTo( element.parent() )
        },
        submitHandler: function() {
            disableSubmitButtons(this);
        }       
    });
        
    function disableSubmitButtons(b) {

    for (var k=0; k < document.forms.length; k++) {
      for (var i=0; i < document.forms[k].elements.length; i++) {
        element = document.forms[k].elements[i];
        if (element.type == 'submit' || element.type == 'reset' || element.type == 'button') {
          element.disabled = true;
        }
      }
    }
    // change hidden field to hold submit value
    proxy = b.form.proxySubmit;
    proxy.value = b.value;
    proxy.name = b.name;
    b.form.submit();
    return true;
    }
});

    </script>
    @endsection
