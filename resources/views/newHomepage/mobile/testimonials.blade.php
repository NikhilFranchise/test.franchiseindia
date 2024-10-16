<section class="testimonials">
    {{--
    <h2 class="brands-head">Trending Videos</h2>
    --}}
    <div class="testimonial-container">
       @if (request()->segment(1) != 'hi')
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/naturals.webp') }}" class="img-b-fluid"
             alt="Naturals Salon &amp; Spa" width="141" height="141" loading="lazy">
          <p>We are extremely pleased with the exceptional services provided by Franchise
             India. The team demonstrated unparalleled professionalism, efficiency, and
             dedication. Their commitment to excellence and attention
             to detail have surpassed our expectations. Working with Franchise India has
             been a truly rewarding experience and we wholeheartedly recommend their
             services to anyone seeking top-notch quality and reliability.
             <span>Naturals Salon &amp; Spa</span>
          </p>
       </div>
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/apollo.webp') }}" class="img-b-fluid"
             alt="Apollo Health and Lifestyle Limited" width="141" height="141" loading="lazy">
          <p>Your team&apos;s dedication and expertise have played a pivotal role in enhancing
             our outreach efforts and driving meaningful results. The quality of leads
             generated through our partnership with Franchise India has exceeded
             our expectations and we are truly appreciative of the commitment to
             excellence demonstrated by each member of your team.
             <span>Apollo Health and Lifestyle Limited</span>
          </p>
       </div>
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/fern.webp') }}" class="img-b-fluid" alt="Ferns N Petals"
             width="141" height="141" loading="lazy">
          <p>It is indeed an ideal platform to expand any brand PAN India. Our long
             association has helped us to grow our network &amp; establish 300+ outlets
             in 98 cities
             <span>Ferns N Petals</span>
          </p>
       </div>
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/liberty.webp') }}" class="img-b-fluid" alt="Liberty"
             width="141" height="141" loading="lazy">
          <p>As a trusted Trade magazine Franchise India is great tool to spread your
             message to the Franchise Community and our experience in this effort has
             been excellent with the magazine.<span>Liberty Shoes Ltd</span>
          </p>
       </div>
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/ims.webp') }}" class="img-b-fluid" alt="Ims Home"
             width="141" height="141" loading="lazy">
          <p>We have been using Franchise India website services for a very long time. And
             we have been able to create some very successful franchisee partners. The
             quality and flow of leads is really very good. Our association
             with Franchise India has been a great experience and we will not only
             continue this relationship but also recommend others to take their expert
             services and advisory.<span>IMS Learning Resources pvt ltd</span>
          </p>
       </div>
       @else
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/naturals.webp') }}" class="img-b-fluid"
             alt="Naturals Salon &amp; Spa" width="141" height="141" loading="lazy">
          <p>हम फ्रैंचाइज़ इंडिया द्वारा प्रदान की गई असाधारण सेवाओं से बेहद प्रसन्न हैं।
             टीम ने अद्वितीय व्यावसायिकता, दक्षता और समर्पण का प्रदर्शन किया। उत्कृष्टता
             के प्रति उनकी प्रतिबद्धता और विस्तार पर ध्यान ने हमारी अपेक्षाओं को पार कर
             लिया है। फ्रैंचाइज़ इंडिया के साथ काम करना वास्तव में एक पुरस्कृत अनुभव रहा
             है और हम सर्वोच्च गुणवत्ता और विश्वसनीयता चाहने वाले किसी भी व्यक्ति को उनकी
             सेवाओं की तहे दिल से अनुशंसा करते हैं।
             <span>Naturals Salon &amp; Spa</span>
          </p>
       </div>
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/apollo.webp') }}" class="img-b-fluid"
             alt="Apollo Health and Lifestyle Limited" width="141" height="141" loading="lazy">
          <p>आपकी टीम के समर्पण और विशेषज्ञता ने हमारे आउटरीच प्रयासों को बढ़ाने और
             सार्थक परिणाम लाने में महत्वपूर्ण भूमिका निभाई है। फ्रैंचाइज़ इंडिया के साथ हमारी
             साझेदारी के माध्यम से उत्पन्न लीड की गुणवत्ता हमारी अपेक्षाओं से अधिक है और
             हम वास्तव में आपकी टीम के प्रत्येक सदस्य द्वारा प्रदर्शित उत्कृष्टता के
             प्रति प्रतिबद्धता की सराहना करते हैं।
             <span>Apollo Health and Lifestyle Limited</span>
          </p>
       </div>
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/fern.webp') }}" class="img-b-fluid" alt="Ferns N Petals"
             width="141" height="141" loading="lazy">
          <p>यह वास्तव में किसी भी ब्रांड पैन इंडिया का विस्तार करने के लिए एक आदर्श मंच
             है। हमारे लंबे सहयोग ने हमें हमारे नेटवर्क को विकसित करने और 98 शहरों में
             300+ आउटलेट स्थापित करने में मदद की है <span>Ferns N Petals</span>
          </p>
       </div>
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/liberty.webp') }}" class="img-b-fluid" alt="Liberty"
             width="141" height="141" loading="lazy">
          <p>एक विश्वसनीय ट्रेड पत्रिका फ्रैंचाइज़ इंडिया के रूप में, फ्रैंचाइज़
             कम्युनिटी को अपना संदेश फैलाने के लिए एक महान उपकरण है और इस प्रयास में
             हमारा अनुभव पत्रिका<span>Liberty Shoes Ltd</span>
          </p>
       </div>
       <div class="testimonial-wrap">
          <img src="{{ url('cvw/images/testimonials-home/ims.webp') }}" class="img-b-fluid" alt="Ims Home"
             width="141" height="141" loading="lazy">
          <p>हम बहुत लंबे समय से फ्रैंचाइज़ इंडिया वेबसाइट सेवाओं का उपयोग कर रहे हैं। और
             हम कुछ बहुत ही सफल फ्रेंचाइजी पार्टनर बनाने में सफल रहे हैं। लीड्स की
             गुणवत्ता और प्रवाह वास्तव में बहुत अच्छा है। फ्रैंचाइज़ इंडिया के साथ हमारा
             जुड़ाव एक शानदार अनुभव रहा है और हम न केवल इस रिश्ते को जारी रखेंगे बल्कि
             दूसरों को भी अपने विशेषज्ञ और सलाहकार लेने की सलाह देंगे।<span>IMS Learning Resources pvt ltd</span>
          </p>
       </div>
       @endif
    </div>
 </section>
