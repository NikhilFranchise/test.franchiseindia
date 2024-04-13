<div id="business_tab" class="tab-section">
    <div class="tab-sec-ttl">व्यापार विवरण</div>
    <div class="tab-sec-topics mx-height">
        <div class="tab-sec-topics-desc brandcontenthindi">

            @if($franDetails->franchisor_id == "FIHL8764110")
                <video id="example_video_1" poster="https://www.franchiseindia.com/images/videos/480-270-pre.jpg?d=2" autobuffer="true" onclick="this.play()" Loop controls tabindex="0" class="videob">
                    <source src="https://www.franchiseindia.com/images/videos/preschool.mp4" type="video/mp4">
                    <source src="https://www.franchiseindia.com/images/videos/preschool.ogv" type="video/ogv">
                    <source src="https://www.franchiseindia.com/images/videos/preschool.webm" type="video/webm">
                </video>
            @endif

            @if($franDetails->franchisor_id == "FIHL452813")
                <div style="text-align: center;">
                    <iframe width="480" height="270" src="https://www.youtube.com/embed/d01VlD1HR9U?autoplay=1&loop=1&playlist=d01VlD1HR9U&rel=0"  frameborder="0" align="middle" allowfullscreen></iframe>
                </div>
            @endif

            @if($franDetails->franchisor_id == "FIHL6051388")
                <video id="example_video_1" poster="https://www.franchiseindia.com/images/videos/chowringhee.jpg?d=2" autobuffer="true" onclick="this.play()" loop="" controls="" tabindex="0" class="videob">
                    <source src="https://www.franchiseindia.com/images/videos/chowringhee.mp4" type="video/mp4">
                    <source src="https://www.franchiseindia.com/images/videos/chowringhee.ogv" type="video/ogv">
                    <source src="https://www.franchiseindia.com/images/videos/chowringhee.webm" type="video/webm">
                </video>
            @endif

            @if($franDetails->franchisor_id == "FIHL9006360")
                <video id="example_video_1" poster="https://www.franchiseindia.com/images/videos/acadgild.jpg?d=2" autobuffer="true" onclick="this.play()" Loop controls tabindex="0" class="videob">
                    <source src="https://www.franchiseindia.com/images/videos/acadgild.mp4" type="video/mp4">
                    <source src="https://www.franchiseindia.com/images/videos/acadgild.ogv" type="video/ogv">
                    <source src="https://www.franchiseindia.com/images/videos/acadgild.webm" type="video/webm">
                </video>
            @endif

            @if($franDetails->franchisor_id == "FIHL236867")
                       <video id="example_video_1" poster="https://www.franchiseindia.com/images/videos/smart-school-k12.jpg?d=2" autobuffer="true" onclick="this.play()" loop="" controls="" tabindex="0" class="videob">
<source src="https://www.franchiseindia.com/images/videos/smartpreschool.mp4" type="video/mp4">
<source src="https://www.franchiseindia.com/images/videos/smartpreschool.ogv" type="video/ogv">
<source src="https://www.franchiseindia.com/images/videos/smartpreschool.webm" type="video/webm">
</video>
            @endif

            @if($franDetails->franchisor_id == "FIHL7433849")
                <video id="example_video_1" poster="https://www.franchiseindia.com/images/videos/cambridge.jpg?d=2" autobuffer="true" onclick="this.play()" loop="" controls="" tabindex="0" class="videob">
                    <source src="https://www.franchiseindia.com/images/videos/cambridge.mp4" type="video/mp4">
                    <source src="https://www.franchiseindia.com/images/videos/cambridge.ogv" type="video/ogv">
                    <source src="https://www.franchiseindia.com/images/videos/cambridge.webm" type="video/webm">
                </video>
            @endif

            @if($franDetails->franchisor_id == "FIHL943207")
                <video id="example_video_1" poster="https://www.franchiseindia.com/images/videos/tuli.jpg?d=2" autobuffer="true" onclick="this.play()" loop="" controls="" tabindex="0" class="videob">
                    <source src="https://www.franchiseindia.com/images/videos/tuli.mp4" type="video/mp4">
                    <source src="https://www.franchiseindia.com/images/videos/tuli.ogv" type="video/ogv">
                    <source src="https://www.franchiseindia.com/images/videos/tuli.webm" type="video/webm">
                </video>
            @endif

            {!! empty($franDetails['business_desc_hindi']) ? $franDetails['business_desc'] : $franDetails['business_desc_hindi'] !!}

        </div>
    </div>
</div>