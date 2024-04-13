<div class="newcontentblk" id="removediv">

    <div class="thankscomman" id="instaSubscribeMsg" style="display:none;">
        <div class="bigth">Thank you for Enquiry</div>
        <div class="simthks">Our Subscription team will get in touch with you shortly.</div>
    </div>

  <div class="container" id="instaSubscribe_block">
    <div class="magblk">
        <img src="{{asset('article/images/magazineback3.png')}}" alt="" class="imgstd">
    </div>
      <form id="instaSubscribeForm">
             <div class="magfrm">
      <div class="haedstg">The Franchising World Magazine</div>
      <p class="magtxt">For hassle free instant subscription, just give your number and email id and our customer care agent will get in touch with you</p>
      <ul class="maglsi">
        <li class="wid180"><label>Enter Email</label>
          <input type="email" name="email" id="email1">
        </li>
         <li class="wid180"><label>Enter No. </label>
          <div class="flis">
            <select class="code"><option> + 91 </option> </select>
            <input type="number" name="mobile" class="telcode" id="mobile">
          </div>
         </li>
         <li><label class="hide">&nbsp;</label>
          <input type="button" onclick="validForm()"  id="btnsubscribe" value="Subscribe Now" class="stb"></li>

      </ul>
      <p class="mbtmtxt">or <a href="https://master.franchiseindia.com/emagazine/">Click here to Subscribe Online</a></p>
    </div>
      </form>
</div>
</div>


<script type="text/javascript">
    $(document).ready(function(){
        $("#btnsubscribe").click(function(){
            if(validForm()){
                var c=document.getElementById("email1").value;
                var d=document.getElementById("mobile").value;
                $.ajax({
                    type:"post",
                    url:"/instasubsribe",
                    data:{email:c,mobile:d},
                    success:function(a){
                        if(parseInt(a)===1){
                            document.getElementById("instaSubscribeMsg").style.display="block"
                        }
                        document.getElementById("instaSubscribe_block").style.display = "none"
                        setTimeout(function (){
                            document.getElementById("removediv").style.display = "none"
                        },5000)


                    }
                })
            }
        })


    });
    function validForm(){
        if($("#instaSubscribeForm").validate({
            rules:{mobile:{required:true,accept:"[0-9]",minlength:10,maxlength:10,number:true},
                email:{required:true,email:true}},
            messages:{mobile:{required:"",accept:"",minlength:"",maxlength:"",number:""},
                email:{required:"",email:""}},
            errorPlacement:function(d,c){d.appendTo(c.parent().parent())}}).form()){return true}}
</script>

