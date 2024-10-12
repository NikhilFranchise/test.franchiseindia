
@mobile
    @include('newHomepage.mobile.header')
    @include('newHomepage.mobile.herosection')
    <main id="main" class="main">
        @include('newHomepage.mobile.leading-franchise-today')
        @include('newHomepage.mobile.top-business-opportunities')
        @include('newHomepage.mobile.top-dealership-opportunity')
        @include('newHomepage.mobile.business-for-sale')
        @include('newHomepage.mobile.upcoming-events')
        @include('newHomepage.mobile.trending-videoes')
        @include('newHomepage.mobile.top-international-opportunities')
        @include('newHomepage.mobile.hgps')
        @include('newHomepage.mobile.tfo')
        @include('newHomepage.mobile.ffc')
        @include('newHomepage.mobile.franchise_insights_news')
        @include('newHomepage.mobile.testimonials')
    </main>
    @include('newHomepage.mobile.sidemenu-mobile')
    <div class="overlay"></div>
    @include('newHomepage.mobile.newsletter')
    @include('newHomepage.mobile.aboutus')
    @include('newHomepage.mobile.footer-mobile')
@endmobile
@desktop
    @include('newHomepage.header')
    @include('newHomepage.herosection')
    <main id="main" class="main">
        @include('newHomepage.cardsection')
        @include('newHomepage.covidproof')
        @include('newHomepage.tbo')
        @include('newHomepage.tdo')
        @include('newHomepage.businessforsale')
        @include('newHomepage.videoevent')
        @include('newHomepage.tio')
        @include('newHomepage.hgps')
        @include('newHomepage.tfo')
        @include('newHomepage.ffc')
        @include('newHomepage.f_insights_news')
        @include('newHomepage.testimonials')
        @include('newHomepage.loginmodal')
        @include('newHomepage.popupfroahmedabad')
    </main>
    @include('newHomepage.sidemenu')
    <div class="overlay"></div>
    @include('newHomepage.newsletter')
    @include('newHomepage.aboutus')
    @include('newHomepage.footersection')
    @include('newHomepage.footer')
@enddesktop
@tablet
    @include('newHomepage.header')
    @include('newHomepage.herosection')
    <main id="main" class="main">
        @include('newHomepage.cardsection')
        @include('newHomepage.covidproof')
        @include('newHomepage.tbo')
        @include('newHomepage.tdo')
        @include('newHomepage.businessforsale')
        @include('newHomepage.videoevent')
        @include('newHomepage.tio')
        @include('newHomepage.hgps')
        @include('newHomepage.tfo')
        @include('newHomepage.ffc')
        @include('newHomepage.f_insights_news')
        @include('newHomepage.testimonials')
        @include('newHomepage.loginmodal')
        {{--  @include('newHomepage.popupfroahmedabad')  --}}
    </main>
    @include('newHomepage.sidemenu')
    <div class="overlay"></div>
    @include('newHomepage.newsletter')
    @include('newHomepage.aboutus')
    @include('newHomepage.footersection')
    @include('newHomepage.footer')
@endtablet
</body>

</html>
