<!-- Newsletter Signup -->
<div class="row bggry mrgn-tp-30 hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 newsletter">


                @if(Request::segment(1) == 'hi')
                    <h3 class='ttl singlehindi'> न्यूज़लेटर साइन अप</h3>
                @else
                    <h3 class='ttl'>Newsletter Signup</h3>
                @endif


                <div class="input">
                    <form method="post" action="{{Config('constants.MainDomain')}}/newslettersignup">
                        <div class="form-group posl">
                            <input type="hidden" name="site_type" value="fi">
                            <input type="email" required class="form-control" name="email" placeholder="{{ (Request::segment(1) == 'hi') ? "ईमेल दर्ज करें" : "Enter your Email Id" }}">
                            <input type="submit" class="btn btn-default addoncb" value="{{ (Request::segment(1) == 'hi') ? "साइन अप" : "Signup" }}"/>
                        </div>
                    </form>
                </div>
                <div class="desc">{{ (Request::segment(1) == 'hi') ? "उद्योग से नवीनतम अपडेट और महान अवसरों तक पहुंच प्राप्त करने के लिए अपना ईमेल पता साझा करें।" : "Share your email address to get latest updates from the industry and access to great opportunities. " }}</div>
            </div>
        </div>
    </div>
</div>
<!-- Add Section -->
<div id="expandFranchise"></div>
