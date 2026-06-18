@include('franchise-international.includes.header')
@include('franchise-international.includes.searchsection')
@include('franchise-international.includes.cat')
@include('franchise-international.includes.tbo')
@include('franchise-international.includes.catgoogleban')
@include('franchise-international.includes.newsletter')
@include('franchise-international.includes.homepagenews')

<div class="row row-no-margin adcebt">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="ads mrgn-tp-30">
            @desktop
                <div class="homeadd970">
                    @include('includes.banners-new.international.INTHP_DSK_BTF_970x250')
                </div>
            @enddesktop
            @tablet
                <div class="homeadd728">
                    @include('includes.banners-new.international.INTHP_TB_BTF_728x90')
                </div>
            @endtablet
            @mobile
                <div class="homeadd320">
                    @include('includes.banners-new.international.INTHP_MW_BTF_320x100')
                </div>
            @endmobile
        </div>
    </div>
</div>


@include('franchise-international.includes.footer')
