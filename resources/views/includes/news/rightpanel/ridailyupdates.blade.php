<div class="sidearce ri">
    <div class="bor-radius backgrey pad20 ovfl ">
        <div class="arthads">Daily Updates</div>
        <form id="update" method="post" action="{{Config::get('constants.MainDomain')}}/newslettersignup">
            <div class="form-group posl">
                <input type="hidden" name="site_type" value="fi">
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email Id">
                <input type="submit" class="btn btn-default addoncb" value="Signup" id="btnupdate"/>
            </div>
        </form>
        <div class="newlertxt">Submit your email address to receive the
            latest updates on news & host of
            opportunities
        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('input[title!=""]').hint();
        $('textarea[title!=""]').hint();
        $('select[title!=""]').hint();
        var validator = $("#update").validate({

            rules: {

                email: {
                    required : true,
                    email    : true
                }
            },


            messages: {

                email: {
                    required : "",
                    email    : ""
                }
            }

        });
    });

</script>