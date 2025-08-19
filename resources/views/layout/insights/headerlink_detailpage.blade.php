 <!-- Favicons -->
 <link  rel="icon" href="{{url('insight-new/assets/img/favicon.ico')}}" type="image/x-icon">
 <link rel="apple-touch-icon" href="{{url('insight-new/assets/img/favicon-new.png')}}" >

  <!-- Preconnects (reduce DNS lookup time) -->
  <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preconnect" href="https://franchiseindia.s3.ap-south-1.amazonaws.com" crossorigin>

  <!-- Preload Critical Fonts -->
  <link rel="preload" href="https://fonts.gstatic.com/s/roboto/v30/roboto-400.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="https://fonts.gstatic.com/s/robotoslab/v17/robotoslab-400.woff2" as="font" type="font/woff2" crossorigin>

  <!-- Google Fonts (swap ensures no render-blocking) -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600&display=swap" rel="stylesheet">



 <!-- Vendor CSS Files -->
 {{-- <link  href="{{url('insight-new/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> --}}

   <!-- Preload Critical CSS (Bootstrap first) -->
   <link rel="preload" href="{{url('insight-new/assets/vendor/bootstrap/css/bootstrap.min.css')}}" as="style">
   <link href="{{url('insight-new/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
 

 <link href="{{url('insight-new/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
 <link href="{{url('insight-new/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet" media="print" onload="this.media='all'">
 <link href="{{url('insight-new/assets/vendor/aos/aos.css')}}" rel="stylesheet" media="print" onload="this.media='all'">
<link href="{{url('insight-new/assets/css/swiper.min.css')}}" rel="stylesheet" media="print" onload="this.media='all'">
 <link href="{{url('insight-new/assets/css/insightstyle.css?ver='.date('d'))}}" rel="stylesheet">
 <link href="{{url('insight-new/assets/css/insight_new.css?ver='.date('d'))}}" rel="stylesheet">
   <!-- Java Script -->
{{-- 
<style>
    body{font-family: Roboto, sans-serif!important;}
    .logobar .dbtn:hover, a.moreless-button {
    color: #169743;
}
    .nav-menu a {
    display: block;font-weight: 600;
    text-decoration: none;
    transition: .3s;
    position: relative;
    color: #111;
    font-size: 15px;
    font-family: Raleway, sans-serif;
}
    .logobar .dbtn {
    background: 0 0;
    border: none;
    font-weight: 600;
    font-size: 15px;
}
.ftrbtm, .logobar {
    padding: 20px 0;
}
   #header{z-index: 4 !important;background: #fff;padding: 0;box-shadow: 0 2px 15px rgba(0, 0, 0, .1);transition: .5s;}
   .topmenu{background:#13823a;padding: 4px 0;height: 35px;}
   span.top1{margin-left: -25px;padding-top: 6px;font-size: 12px;display: block;color: #fff;}
   ul.top-ul{display: flex;justify-content: end;list-style: none;padding-top: 4px;}
   .topright{float: left;}
   ul.togl{text-align: right;border-radius: 10px;border: 1px solid #169743;padding: 0;margin: 0;}
   ul.togl li.active{background: #bdc2c7;}
   ul.togl li{float: left;list-style: none;background: #ffffff;width: 61px;line-height: 16px;text-align: center;padding: 4px 10px;border-top-left-radius: 10px;border-bottom-left-radius: 10px;}
   ul.togl li a{color: #333;font-size: 11px;}
   ul.togl li:last-child{border-radius: 0 10px 10px 0;}
   ul.top-ul li a{color: #fff!important;font-size: 11px;line-height: 16px;padding-left: 4px;}
   ul.top-ul li{color: #fff;line-height: 16px;font-size: 11px;display: inherit;}
   ul.top-ul li span{font-size: 14px;line-height: 16px;}
   .inner-top-head{background: linear-gradient(to right, #169743, #fbc231);color: #fff;margin-top: 80px;font-weight: 400;font-size: 20px;padding: 5px 0;margin-bottom: 0;}
   .inner-top-head h1{color: #fff;font-family: Roboto;font-weight: 400;font-size: 19px;line-height: 30px;margin: 5px 0;}
   .nav-menu a{display: block;position: relative;color: #111;font-size: 15px;font-family: Raleway, sans-serif;}
   #header .logo{font-size: 32px;margin: 0;padding: 0;line-height: 1;font-weight: 600;font-family: Poppins, sans-serif}
   #header .logo a{color: #111}
   #header .logo a span,.nav-menu .drop-down ul .active>a,.nav-menu .drop-down ul a:hover,.nav-menu .drop-down ul li:hover>a{color: #e03a3c}
   #header .logo img{padding-left: 0;max-height: 35px}
   .mobile-nav *,.nav-menu ul{margin: 0;padding: 0;list-style: none}
   .nav-menu>ul>li{position: relative;white-space: nowrap;padding: 10px 0 10px 28px}
   .nav-menu a{display: block;position: relative;color: #111;font-size: 15px;font-family: Raleway, sans-serif}
   .nav-menu .active>a,.nav-menu a:hover,.nav-menu li:hover>a{color: #169743 !important}
   .nav-menu .drop-down ul{display: block;position: absolute;left: 14px;top: calc(100% + 30px);z-index: 99;opacity: 0;visibility: hidden;padding: 10px 0;background: #fff;box-shadow: 0 0 30px rgba(127, 137, 161, .25);transition: .3s}
   .nav-menu .drop-down:hover>ul{opacity: 1;top: 100%;visibility: visible}
   .nav-menu .drop-down li{min-width: 180px;position: relative}
   .nav-menu .drop-down ul a{padding: 10px 20px;font-size: 14px;text-transform: none}
   .nav-menu .drop-down>a:after{content: "\ea99";font-family: IcoFont;padding-left: 5px}
   .nav-menu .drop-down .drop-down ul{top: 0;left: calc(100% - 30px)}
   .nav-menu .drop-down .drop-down:hover>ul{opacity: 1;top: 0;left: 100%}
   .mobile-nav .drop-down>a,.nav-menu .drop-down .drop-down>a{padding-right: 35px}
   .nav-menu .drop-down .drop-down>a:after{content: "\eaa0";font-family: IcoFont;position: absolute;right: 15px}
   .nav-menu>ul, .stab ul{display: flex;}
   .popular-head a, .article-time a{color: #212122!important;}
   .dbtn{background: transparent;border: none;}
   ul.breadcrumb{margin: 0;padding: 0;}
   .breadcrumb a{color:#0f7934;font-size: 14px;}
   .contentwrapper h2{color: #231f20;font-size: 28px;margin: 3px 0 6px;}
   .article-logo{float: left}
   .article-time{color: #353535;font-size: 14px;line-height: 19px;float: left;margin-left: 15px}
   .article-time span{display: block;color: #231f20}
   .contentwrapper .content-share{width: 85px;text-align: right;margin-right: 0;margin-top: 13px}
   .article-wrap ul{padding-left: 17px}
   .article-wrap ul li{color: #555353;font-size: 18px;font-weight: 400;line-height: 30px}
   .article-features .follow-us{margin-top: 13px;width: 100px;margin-left: 12px;}
   .article-features .follow-us a{color: #000;font-size: 13px;padding: 6px 13px;border: 1px solid #333;border-radius: 5px;text-decoration: none}
   .article-features .follow-us img{width: 11px;height: 11px;vertical-align: unset;margin-left: 1px}
   .content-share ul li{display: inline-block}
   .content-share ul{list-style: none;display: block;padding-left: 0}
   .cont-top{margin-top: 4px}
   .article-features{justify-content: space-between;display: flex;}
   .contentwrapper .article-date{width: 74%;display: flex;margin: 5px 0 10px;}
   .contentwrapper .article-date{width: 74%;display: flex;margin: 5px 0 10px;}
   .breadcrumb{background: transparent!important;}
   .ar-des, .inner-article-detail-desktop-ad {margin-bottom: 20px;}
   .articlecontent a:hover, .breadcrumb-item a:hover {color: #169743 !important;text-decoration: underline;}
   .contentwrapper{margin-top: 50px;}
   .popular-articles ul li:last-child{border: none;padding-bottom: 0;margin-bottom: 0;}
   .right-wrap{display: inline;width: 300px;margin: auto;}
   .ad-right{text-align: left;}
   .popular-articles{padding: 25px 0;border: 1px solid #e8e8e8;border-radius: 8px;margin: 20px 0;width: 300px;}
   .popular-articles h3{padding: 0 20px;margin-bottom: 19px;font-weight: 600;font-size: 22px;line-height: 24px;}
   .popular-articles ul{padding: 0;list-style: none;}
   .popular-articles ul li{border-bottom: 1px solid #c6c6c6;margin-bottom: 18px;padding: 0 20px 10px;}
   .popular-head a{color: #231f20;font-size: 15px;display: block;margin: 0 0 5px;text-decoration: none;font-weight: 500;line-height: 21px;}
   .popular-head a:hover{text-decoration: none;}
   .articlecontent p{font-size: 17px;line-height: 31px;color: #242424;text-align: justify;}
   .franBrands{display: flex;flex-wrap: wrap;gap: 15px;justify-content: center;padding: 20px;}
   .franBrands h4{margin-top: 15px;font-size: 18px;line-height: 20px;}
   .franInterest{background-color: #f9f9f9;border: 1px solid #ddd;padding: 15px 20px;border-radius: 8px;box-shadow: 0 4px 6px rgba(0, 0, 0, .1);min-width: 95px;max-width: 200px;}
   .franInterest a{text-decoration: none;color: #333;font-weight: 700;font-size: 16px;}
   .tag-block{margin: 50px 0;}
   ul.tag-list li{text-align: center;margin-right: 10px;list-style: none;display: inline-block;margin-bottom: 15px;}
   ul.tag-list li a{background: #f3f6f9;border-radius: 4px;padding: 4px 12px;color: #545454;font-weight: 400;line-height: 12px;font-size: 12px;}
   .newsletterbg{width: 850px;height: 227px;background:#f3f6f9;max-width: 100%;margin-bottom: 70px;padding: 30px;}
   .contentarea{clear: both;max-width: 100%;}
   .strbhead{font-size: 28px;line-height: 36px;color: #242424;}
   .newstxt{font-size: 16px;color:#2d2d2d;line-height: 22px;margin-top: 5px;margin-bottom: 7px;}
   ul.submaglsi{padding: 0;margin: 15px 0 0;}
   ul.submaglsi li{list-style: none;margin-right: 20px;width: 40%;}
   ul.submaglsi li input{border-radius: 4px;padding: 10px;border: 1px solid #dfdfdf;height: 50px;width: 100%;}
   ul.submaglsi li input.stb{background: rgb(19 130 58);color: #fff;text-align: center;width: 175px;font-size: 18px;font-weight: 500;}
   ul.submaglsi li input{border-radius: 4px;padding: 10px;border: 1px solid #dfdfdf;height: 50px;}
   ul.submaglsi{padding: 0;margin: 15px 0 0;display: flex;}
   .similar-article-line{height: 2px;background-color: #333;margin-top: 41px;}
   .article-next{display: block;background-color: #000;color: #fff;padding: 2px 17px 5px 17px;width: 111px;margin-top: -16px;font-size: 16px;border-radius: 0px 0px 23px 0px;}
   
   </style> --}}