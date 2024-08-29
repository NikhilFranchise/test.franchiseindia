@if (request()->segment(1) == 'hi')
<footer class="footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class="copy-right">Copyright © 2009 - {{date('Y')}} Franchise India Holdings Ltd.</p>
            </div>   
            <div class="col-md-7">
                <ul class="fihl-footer-bottom-links">
                    <li><a href="/">होम</a></li>
                    <li><a href="https://www.franchiseindia.com/about">हमारे बारे में</a></li>
                    <li><a href="https://www.franchiseindia.com/contact/">हम से संपर्क करें</a>
                    </li>
                    <li><a href="https://www.franchiseindia.com/feedback/">परतिक्रिया</a></li>
                    <li><a href="https://news.franchiseindia.com/">समाचार्</a></li>
                    <li><a href="https://www.franchiseindia.com/testimonials">प्रशंसापत्र</a></li>
                    <li><a href="https://www.franchiseindia.com/terms">शर्तें</a></li>
                    <li><a href="https://www.franchiseindia.com/sitemap">साइटमैप</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cookies-section" id="cookie">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <p>हमारी वेब साइट यह सुनिश्चित करने के लिए कुकीज़ का उपयोग करती है कि हम आपको हमारी वेबसाइट पर सबसे अच्छा अनुभव दें। यदि आप इस साइट का उपयोग करना जारी रखते हैं तो हम मान लेंगे कि आप इससे खुश हैं। एक सूचित निर्णय लें <a href="https://www.franchiseindia.com/terms" target="_blank">terms and conditions.</a><button class="btn btn-main seta" onclick="return setCookie()">ठीक</button></p>
                </div>
                <div class="col-md-1 text-center"></div>
            </div>
        </div>
    </div>
</footer>
@else
<footer class="footer" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <p class="copy-right">Copyright © 2009 - 2024 Franchise India Holdings Ltd.</p>
            </div>   
            <div class="col-md-7">
                <ul class="fihl-footer-bottom-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="https://www.franchiseindia.com/about" target="_blank">About Us</a></li>
                    <li><a href="https://www.franchiseindia.com/contact" target="_blank">Contact Us</a></li>
                    <li><a href="https://www.franchiseindia.com/feedback" target="_blank">Feedback</a></li>
                    <li><a href="https://www.franchiseindia.com/sitemap/brands" target="_blank">Brands</a></li>
                    <li><a href="https://opportunityindia.com" target="_blank">News</a></li>
                    <li><a href="https://www.franchiseindia.com/testimonials" target="_blank">Testimonials</a></li>
                    <li><a href="https://www.franchiseindia.com/terms" target="_blank">Terms</a></li>
                    <li><a href="https://www.franchiseindia.com/sitemap" target="_blank">Sitemap</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="cookies-section" id="cookie">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <p>By using our site, you acknowledge that you have read and understand our<a href="https://www.franchiseindia.com/terms" target="_blank">terms and conditions.</a><button class="btn btn-main seta" onclick="return setCookie()">Accept Cookies</button></p>
                </div>
                <div class="col-md-1 text-center"></div>
            </div>
        </div>
    </div>
</footer>
@endif