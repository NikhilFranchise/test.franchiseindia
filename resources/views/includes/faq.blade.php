<div class="col-xs-12 col-sm-3 col-md-3 bor-radius backwhite pad30 targright rightvideo">
    <div class="homevideo">
        <div class="homevideoheading"><a href="#" data-toggle="modal" data-target="#combinedvideo">Take A Tour</a> </div>
        <a href="#" data-toggle="modal" data-target="#combinedvideo"><div class="ytimg">
                <div class="overlay"> <img alt="guide video" src="{{Config('constants.MainDomain')}}/images/guidevideoicon.png"  class="videoico"/></div>
                <img src="https://i.ytimg.com/vi/f6HYmKW5KAc/mqdefault.jpg" title="" alt="youtube video"></div>
        </a>
    </div>

</div>
<!--right form section start here -->
        <div class="col-xs-12 col-sm-3 col-md-3 bor-radius backwhite pad30 targright">
    <h2 class="sidehead">Frequently Asked Questions</h2>
    <div class="demo-show">    
        <h5><a href="#faq-1">What is a Franchise?</a></h5>
        <div id="faq-1">        
            <p>An authorization granted by a company to another individual or group allowing them to carry out specified commercial activities, for example acting as an agent for a company's products.</p>
        </div>
    </div>    
    <div class="demo-show">    
       <h5><a href="#faq-2">Who is an Investor?</a></h5>
       <div id="faq-2">        
           <p>An individual or an organization willing to put money in another company or brand in order to garner profits.</p>
       </div>
    </div>         
    <div class="demo-show">    
        <h5><a href="#faq-3">Who is a Franchisor?</a></h5>
        <div id="faq-3">        
            <p>The company that allows an individual (known as the franchisee) to run a location of their business. The franchisor owns the overarching company, trademarks, and products, but gives the right to the franchisee to run
the franchise location, in return for an agreed-upon fee.</p>
        </div>
    </div>          
    <div class="demo-show">    
        <h5><a href="#faq-4">Who is a Trade Partner?</a></h5>
        <div id="faq-4">        
            <p>An agreement drawn up by two parties that have agreed to trade certain products, services or information to each other.</p>
        </div>
    </div>         
    <div class="demo-show">    
        <h5><a href="#faq-5">How can you be a Franchisor?</a></h5>
        <div id="faq-5">        
            <p>A franchisor should be ready to distribute franchising rights to another individual or company (an investor). </p>
        </div>
    </div>       
    <div class="demo-show">    
        <h5><a href="#faq-6">How can you be an Investor?</a></h5>
        <div id="faq-6">        
            <p>An investor should be willing to invest money into another company thus taking up franchisee rights.</p>
        </div>
    </div>
    <div class="demo-show">    
        <h5><a href="#faq-7">What is a domestic property?</a></h5>
        <div id="faq-7">        
            <p>A property which is situated in a residential area.</p>
        </div>
    </div>
    <div class="demo-show">    
        <h5><a href="#faq-8">What is a commercial property?</a></h5>
        <div id="faq-8">        
            <p>A property which is situated inside or within the premises of a commercial area.</p>
            <!-- <ul class="s-opt-l">
            <li>Lorem ipsum dolor sit amet</li>
            <li>Lorem ipsum dolor sit amet</li>
            </ul> -->
        </div>
    </div>          
</div>
    <!--right form section end here -->

<!-- video code start here  -->

<div class="modal fade" id="combinedvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <div class="modal-body">
                <iframe  width="100%" height="400" id="videoModalonefran"
                         src="https://www.youtube.com/embed/f6HYmKW5KAc" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<!-- video code end here -->






<script type="text/javascript">
    $('.close').click(function() {
//First get the  iframe URL
        var url = $('#videoModalonefran').attr('src');
//Then assign the src to null, this then stops the video been playing
        $('#videoModalonefran').attr('src', '');
// Finally you reasign the URL back to your iframe, so when you hide and load it again you still have the link
        $('#videoModalonefran').attr('src', url);
    });

    $('#combinedvideo').click(function() {
//First get the  iframe URL
        var url = $('#videoModalonefran').attr('src');
//Then assign the src to null, this then stops the video been playing
        $('#videoModalonefran').attr('src', '');
// Finally you reasign the URL back to your iframe, so when you hide and load it again you still have the link
        $('#videoModalonefran').attr('src', url);
    });
</script>