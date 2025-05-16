function frg_panel(){$("#lg-pnl").hide(),$("#frg-pnl").show()}function lg_panel(){$("#lg-pnl").show(),$("#loginactive").click(),$("#frg-pnl").hide()}function getSubCategoryHeader12(e){

    $.ajax({type:"GET",url:"/getsubcategory",data:{categoryID:e},success:function(e){$("#getSubCategoryDataHeader").html(e)}})}function getSubCatCategoryHeader12(e){
    // console.log('called');
    $.ajax({type:"GET",url:"/getsubcatcategory",data:{subcategoryID:e},success:function(e){$("#getSubCatCategoryDataHeader").html(e)}})}function getcity(e){
    // console.log('yes');
    $.ajax({type:"GET",url:"/getcitylist",data:{state:e},success:function(e){$("#headercity").html(e)}})}function customResetForm(){
    // Reset the form
    document.getElementById("invform_desktop").reset(),document.getElementById("maxAmount").innerHTML='<option value="" hidden>Select Max Investment</option>'}function getSubCategoryHeader1(e){
    // console.log('yes');
    $.ajax({type:"GET",url:"/getsubcategory",data:{categoryID:e},success:function(e){$("#getSubCategoryDataHeader1").html(e)}})}function getSubCatCategoryHeader1(e){
    // console.log('yes');
    $.ajax({type:"GET",url:"/getsubcatcategory",data:{subcategoryID:e},success:function(e){$("#getSubCatCategoryDataHeader1").html(e)}})}function getcity1(e){
    // console.log('yes');
    $.ajax({type:"GET",url:"/getcitylist",data:{state:e},success:function(e){$("#headercity1").html(e)}})}function changelanguage(url) {
        console.log('Language change triggered');
        if (url) { // require a URL
            console.log('Redirecting to:', url);
            window.location.href = url; // redirect
        }
        return false;
    }function isNumber(e){var t=(e=e||window.event).which?e.which:e.keyCode;return!(t>31&&(t<48||t>57))}function getcitypopup(e){e=$(e).find(":selected").attr("data-id"),$.ajax({type:"GET",url:"/getcitylist",data:{state:e},success:function(e){$("#popupcity").html(e)}})}$(document).ready((function(){$("#sidebar").mCustomScrollbar({theme:"minimal"}),$("#dismiss, .overlay").on("click",(function(){$("#sidebar").removeClass("active"),$(".overlay").removeClass("active")})),$("#sidebarCollapse").on("click",(function(){$("#sidebar").addClass("active"),$(".overlay").addClass("active"),$(".collapse.in").toggleClass("in"),$("a[aria-expanded=true]").attr("aria-expanded","false")}))})),
    //loging section sidebar
    $(document).ready((function(){$("#sidebar-login").mCustomScrollbar({theme:"minimal"}),$("#dismiss-login, .overlay").on("click",(function(){$("#sidebar-login").removeClass("active"),$(".overlay").removeClass("active")})),$("#sidebarCollapse-main-login").on("click",(function(){$("#sidebar-login").addClass("active"),$(".overlay").addClass("active"),$(".collapse.in").toggleClass("in"),$("a[aria-expanded=true]").attr("aria-expanded","false")}))})),document.addEventListener("DOMContentLoaded",(function(){var e=document.getElementById("getMainCategoryDataHeader");
    // console.log(mainCategorySelect);
    e?.value&&getSubCategoryHeader(e.value)})),$(document).ready((function(){$("#homepagenew").on("submit",(function(e){
    // console.log('tres');
    e.preventDefault();// Prevent the default form submission
    // Get form data
    var t=$(this).serialize();$.ajax({type:"POST",url:$(this).attr("action"),data:t,success:function(e){$("#response").html("<p>Form submitted successfully!</p>"),window.location="/thanks-advice-form",
    // Clear previous error messages and placeholders
    $(".error-message").text("")},error:function(e){
    // Clear previous error messages and placeholders
    $(".error-message").text("");
    // $('input').attr('placeholder', '');
    var t=e.responseJSON.errors;$.each(t,(function(e,t){
    // Check if the error message is for captcha and replace it with a custom message
    if("captcha"===e&&"validation.captcha"===t[0]){$("#"+e+"-error").text("Invalid captcha value.")}else{
    // Use the error messages provided by the server response
    var n=t[0];$("#"+e+"-error").text(n)}})),
    // Optionally, handle global errors
    e.responseJSON.message&&$("#response").html("<p>"+e.responseJSON.message+"</p>")}})}))})),screen.width>1&&$(document).ready((function(){setTimeout((function(){$("#searchblk").slideUp(800),$("#clickhidebtn").show(),$("#clickshowbtn").hide()}),3e3),$("#clickhidebtn").click((function(){$("#searchblk").slideDown("slow"),$("#clickhidebtn").hide(),$("#clickshowbtn").show()})),$("#clickshowbtn").click((function(){$("#searchblk").slideUp("slow"),$("#clickhidebtn").show(),$("#clickshowbtn").hide()}))})),$("#registerselect").click((function(){$("#registeractive").click()})),$("#loginselect").click((function(){$("#loginactive").click()})),$("#mobilereg").click((function(){$("#registeractive").click()})),$("#changeLang").on("click",(function(){$("#langType").slideToggle()})),$("#registerselect1").click((function(){$("#login").addClass("active"),$("#register").removeClass("active"),$("#loginactiveopen").addClass("active"),$("#registeractiveopen").removeClass("active")})),$("#loginselect1").click((function(){$("#login").removeClass("active"),$("#register").addClass("active"),$("#loginactiveopen").removeClass("active"),$("#registeractiveopen").addClass("active")})),$(document).ready((function(){$("#searchoptnew").click((function(){$(".searchblknew").show(400),$(".searchspace").hide(400)})),$("#closegsearch").click((function(){$(".searchspace").show(400),$(".searchblknew").hide(400)})),screen.width>1199&&screen.height<=768&&$(".gsc-wrapper").css({"max-height":"340px",overflow:"auto"}),$("#searchopt").click((function(){return $(".open").click(),$(".searchoption").toggle(400),!1})),$("#searchopt2").click((function(){$(".searchoption").hide(400)})),$(".dropdown-toggle").click((function(){$(".searchoption").hide(400)}))}));var linkElement=document.createElement("link");linkElement.rel="stylesheet",linkElement.href = "https://www.franchiseindia.com/css/font-awesome.minfresh.css",document.head.appendChild(linkElement);const observer=lozad();// lazy loads elements with default selector as '.lozad'
    observer.observe(),$(document).ready((function(){$(window).scroll((function(){$(this).scrollTop()>100?$("#scroll").fadeIn():$("#scroll").fadeOut()})),$("#scroll").click((function(){return $("html, body").animate({scrollTop:0},600),!1})),$("#changeLang").on("click",(function(){$("#langType").slideToggle()})),$("#changeLang1").on("click",(function(){$("#langType1").slideToggle()}));Cookies.get("langType");setTimeout((function(){Cookies.set("langType","english",{expires:7})}),2e4)}));// This closing bracket and parenthesis was added to properly close the $(document).ready() function
    //Awesomplete
    const input=document.getElementById("dealer-bar-search-top"),awesomplete=new Awesomplete(input),navBarSearch=$("#dealer-bar-search-top");
    // Init awesomplete
    function prepareList(e){var t=[];e.forEach((e=>{t.push(e.name)})),
    // Assigned the c_list to the list property of Awesomplete instance
    awesomplete.list=t}
    //navBarSearch.keypress(function () {
    navBarSearch.on("keypress keyup keypress blur change",(function(){var e=$(this).val();
    // Check if atleast 2 chars are typed
    e.length>=2&&$.ajax({url:"/dealers-search/"+e,type:"GET",dataType:"json",success:function(e){prepareList(JSON.parse(JSON.stringify(e)))},error:function(e){console.log(e)}})})),navBarSearch.on("awesomplete-selectcomplete",(function(){if(""!=$("#dealer-bar-search-top").val()){var e=$("#dealer-bar-search-top").val(),t=e.split(" - <strong> in");t.length>1&&(e=t[0]),window.location.href="/dealers-india/search/"+e}})),$("#textcompany").on("click",(function(){if(""!=$("#dealer-bar-search").val()){var e=$("#dealer-bar-search-top").val(),t=e.split(" - <strong> in");t.length>1&&(e=t[0]),window.location.href="/dealers-india/search/"+e}})),$(document).ready((function(){var e=$(".js-select2");e.select2({closeOnSelect:!1,placeholder:"Select 5 Preferred Cities",maximumSelectionLength:5,allowClear:!0,tags:!0}),e.on("select2:select",(function(t){var n=e.val();n&&5<n.length&&(alert("You can select only 5 preferred cities."),$(t.params.data.element).prop("selected",!1),e.trigger("change"))})),e.on("select2:unselect",(function(e){}))})),$(document).ready((function(e){e("#myCarouselvideo").carousel({pause:!0,interval:!1})}));var swiper=new Swiper(".trendvideo .swiper-container",{slidesPerView:1,spaceBetween:0,loop:!0,autoplay:!1,pagination:{el:".trendvideo .swiper-pagination",clickable:!0},navigation:{nextEl:".trendvideo .swiper-button-next",prevEl:".trendvideo .swiper-button-prev"},keyboard:{enabled:!0,onlyInViewport:!0},breakpoints:{350:{slidesPerView:1.5,spaceBetween:0},768:{slidesPerView:1,spaceBetween:0},1024:{slidesPerView:1,spaceBetween:0}}});swiper=new Swiper(".testimonial .swiper-container",{slidesPerView:1,spaceBetween:0,loop:!0,autoplay:!1,pagination:{el:".testimonial .swiper-pagination",clickable:!0},navigation:{nextEl:".testimonial .swiper-button-next",prevEl:".testimonial .swiper-button-prev"},keyboard:{enabled:!0,onlyInViewport:!0},breakpoints:{350:{slidesPerView:1,spaceBetween:0},768:{slidesPerView:1,spaceBetween:0},1024:{slidesPerView:1,spaceBetween:0}}}),swiper=new Swiper(".eventblk .swiper-container",{slidesPerView:1,spaceBetween:0,loop:!0,autoplay:!1,pagination:{el:".eventblk .swiper-pagination",clickable:!0},navigation:{nextEl:".eventblk .swiper-button-next",prevEl:".eventblk .swiper-button-prev"},keyboard:{enabled:!0,onlyInViewport:!0},breakpoints:{350:{slidesPerView:1.5,spaceBetween:10},768:{slidesPerView:2,spaceBetween:0},993:{slidesPerView:1,spaceBetween:0},1024:{slidesPerView:1,spaceBetween:0}}});function setCookie(){document.cookie="accept_cookie=ok",$("#cookie").hide();const e=new Date;e.setTime(e.getTime()+6048e5);let t="expires="+e.toUTCString();console.log(t),document.cookie="username=cookie_user;"+t+";path=/"}function getCookie(){return checkCookie("accept_cookie")}function checkCookie(e){for(var t=e+"=",n=document.cookie.split(";"),a=0;a<n.length;a++){for(var i=n[a];" "==i.charAt(0);)i=i.substring(1);if(0==i.indexOf(t))return i.substring(t.length,i.length)}return""}$(document).ready((function(){"ok"==getCookie()?$("#cookie").hide():$("#cookie").show()})),$(document).ready((function(){
    // Function to handle the visibility of .hero-section based on scroll position
    function handleScroll(){$(window).scrollTop()>40?($(".main").show(),$(".mycss").css("display","block")):($(".main").hide(),$(".mycss").css("display","none"))}
    // Check screen width and set up event handlers accordingly
    screen.width<767&&(
    // Initial visibility check
    handleScroll(),
    // Attach the scroll event handler
    $(window).scroll(handleScroll))}));
    



