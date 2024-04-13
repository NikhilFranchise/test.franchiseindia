<div class="sidearce restaurant">
    <div class="bor-radius backgrey pad20 ovfl">
        <div class="arthads">Daily Updates</div>
        <form id="daily-update" method="post" action="{{ url('newslettersignup') }}">
            <div class="form-group posl">
                <input type="hidden" name="site_type" value="fi">
                <input type="text" class="form-control" name="email" placeholder="Enter your Email Id">
                <input type="submit" class="btn btn-default addoncb" value="Signup" />
            </div>
        </form>
        <div class="newlertxt">Submit your email address to receive the latest updates on news & host of opportunities</div>
    </div>
</div>
<script type="text/javascript">$(document).ready(function(){$('input[title!=""]').hint();$('textarea[title!=""]').hint();$('select[title!=""]').hint();$("#daily-update").validate({rules:{email:{required:true,email:true}},messages:{email:{required:"",email:""}}})});</script>