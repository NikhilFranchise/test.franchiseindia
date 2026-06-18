<div id="others_tab" class="tab-section">
    <!--<h3 class="tab-sec-ttl">Agreement & Term Details</h3>-->
	<h2 class="tab-sec-ttl">{{$franDetails->company_name}} Franchise Agreement Details</h2>
    <div class="tab-sec-topics">
        <div class="keypoints">
            @if($franDetails->std_fran_aggreement == 1)
                <p>
                    Do you have a standard {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "dealership" : "franchise" }} agreement?
                    <span class='pull-right fnone'> Yes </span>
                </p>
            @endif
            <p>
                How long is the {{ $franDetails->looking_tradepartner == 1 || $franDetails->ind_main_cat == 5 ? "dealership" : "franchise" }} term for?
                <span class='pull-right fnone'>
                    @php
                        $aggrementTime = $franDetails->franchise_term_duration;
                        
                        if($aggrementTime == "Life")
                            $aggrementTime = "Lifetime";
                        else if($aggrementTime == 1)
                            $aggrementTime = "1 Year";
                        else
                            $aggrementTime = $franDetails->franchise_term_duration. " Years";

                    @endphp
                    {{ $aggrementTime }}
                </span>
            </p>
            @if($franDetails->term_renewable == 1)
                <p>
                    Is the term renewable?
                    <span class='pull-right fnone'> Yes </span>
                </p>
            @endif
        </div>
    </div>

</div>
<div class="tab-section" >
    <p><span><strong>Disclaimer:</strong></span><i>
        Franchise India is an integrated franchise solution company since 1999, and an absolute authority on franchising and licensing. FIHL <a href="https://www.franchiseindia.com" style="color: blue">(<u>www.franchiseindia.com</u>)</a> and the site sponsors accept no liability for the accuracy of any information contained on this site or on other linked sites. We recommend you take advice from a lawyer, accountant and franchise consultant experienced in franchising before you commit yourself. It is user’s responsibility to satisfy yourself as to the accuracy and reliability of the information supplied. Please read the <a href="https://www.franchiseindia.com/terms" style="color:blue;"><u>terms & conditions on Franchise India.</u></a></i></p>
</div>

<div id="others_tab" class="tab-section">
<h2 class="tab-sec-ttl">How to get {{$franDetails->company_name}} Franchise</h2>

    <div class="tab-sec-topics">
        <div class="keypoints">
        {{-- Franchise India stands as a premier platform offering a wide spectrum of franchise opportunities across diverse industries. Embarking on your entrepreneurial journey through a franchise presents a promising venture. To get a {{$franDetails->company_name}} franchise, you can fill up the application form provided on the website and our expert team will guide you with all the details viz. {{$franDetails->company_name}} franchise fee, {{$franDetails->company_name}} franchise cost, {{$franDetails->company_name}} apply process and more. Our team will guide you during the process to avail {{$franDetails->company_name}}  franchise. --}}
        Franchise India stands as a premier platform offering a wide spectrum of franchise opportunities across diverse industries. Embarking on your entrepreneurial journey through a franchise presents a promising venture. To get information about {{$franDetails->company_name}} franchise, you can fill up the application form provided on the website and get all the details viz. {{$franDetails->company_name}} franchise fee, {{$franDetails->company_name}} franchise cost, {{$franDetails->company_name}} apply process and more.

        </div>
    </div>

</div>

@notmobile
@include('includes.brandlanding.wider-insta-apply-form')

@endnotmobile