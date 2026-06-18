<head>
    <meta charset="utf-8">
    <meta content="en-in" name="language"/>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>{{ $seoTitle }}</title>
    <meta content="{{ $seoDesc }}" name="description"/>
    <link rel="canonical" href="@yield('canonicalUrl', str_replace('/amp/', '/', url()->current()))">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes  -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
    <script async custom-template="amp-mustache" src="https://cdn.ampproject.org/v0/amp-mustache-0.2.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <style amp-custom>
        @font-face {
            font-family: 'NotoSansDevanagariUI-Light';
            src: url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Light.eot?#iefix') format('embedded-opentype'),  url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Light.woff') format('woff'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Light.ttf')  format('truetype'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Light.svg#NotoSansDevanagariUI-Light') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'NotoSansDevanagariUI-Medium';
            src: url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Medium.eot?#iefix') format('embedded-opentype'),  url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Medium.woff') format('woff'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Medium.ttf')  format('truetype'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Medium.svg#NotoSansDevanagariUI-Medium') format('svg');
            font-weight: normal;
            font-style: normal;
        }


        @font-face {
            font-family: 'NotoSansDevanagariUI-Regular';
            src: url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Regular.eot?#iefix') format('embedded-opentype'),  url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Regular.woff') format('woff'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Regular.ttf')  format('truetype'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Regular.svg#NotoSansDevanagariUI-Regular') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'NotoSansDevanagariUI-SemiBold';
            src: url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-SemiBold.eot?#iefix') format('embedded-opentype'),  url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-SemiBold.woff') format('woff'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-SemiBold.ttf')  format('truetype'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-SemiBold.svg#NotoSansDevanagariUI-SemiBold') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'NotoSansDevanagariUI-Bold';
            src: url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Bold.eot?#iefix') format('embedded-opentype'),  url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Bold.woff') format('woff'),
            url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Bold.ttf')  format('truetype'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Bold.svg#NotoSansDevanagariUI-Bold') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'NotoSansDevanagariUI-ExtraCondensedExtraBold';
            src: url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-ExtraCondensedExtraBold.eot?#iefix') format('embedded-opentype'),  url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-ExtraCondensedExtraBold.woff') format('woff'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-ExtraCondensedExtraBold.ttf')  format('truetype'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-ExtraCondensedExtraBold.svg#NotoSansDevanagariUI-ExtraCondensedExtraBold') format('svg');
            font-weight: normal;
            font-style: normal;
        }


        @font-face {
            font-family: 'NotoSansDevanagariUI-Thin';
            src: url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Thin.eot?#iefix') format('embedded-opentype'),  url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Thin.woff') format('woff'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Thin.ttf')  format('truetype'), url('https://www.franchiseindia.com/css/fonts/NotoSansDevanagariUI-Thin.svg#NotoSansDevanagariUI-Thin') format('svg');
            font-weight: normal;
            font-style: normal;
        }

        body {  font-family: 'NotoSansDevanagariUI-Regular',sans-serif;}
        a{ text-decoration:none;}
        img { border:none;}
        .main{ max-width:700px; margin:0 auto;}
        h1 {      color: #333333; font-size:25px; font-family: 'NotoSansDevanagariUI-Regular',sans-serif; line-height:28px; font-weight:400;     margin:30px 0 20px;}
        ul li { list-style-type:none; }
        ::-webkit-scrollbar{-webkit-appearance:none;width:7px;background:#e5e5e5;}
        ::-webkit-scrollbar-thumb{border-radius:4px;background-color:#bababa;-webkit-box-shadow:0 0 1px rgba(186,186,186, 1);}
        .head{  background-color: #fff; padding:10px 20px; margin:0 auto; text-align:center; }
        .head .fihl-logo {    width: 225px; margin:0 auto;}
        .marss { margin:15px; }
        .fbv { clear:both; float:none; overflow:hidden; margin:0 0 0px 0;}
        .as { float:left; color:#006699; }
        .as a{ color:#006699; font-family: 'NotoSansDevanagariUI-Regular',sans-serif; }
        .rellink{ color:#333; font-size:15px;}
        .rellink strong{ font-weight:700;}
        .rellink a{color:#006699;}
        p.subheadtxt { font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; color:#333333; line-height:23px; font-weight:400;}
        p{ font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; color: #666666; font-size:1em;  line-height:23px; }
        .datas { float:left;color: #999999; font-size:14px;     margin-left: 10px; margin-top:2px; }
        .autho  {color: #666666; font-size:14px; font-family: 'NotoSansDevanagariUI-Regular',sans-serif;  margin-bottom:20px;}
        .autho  span{color: #333; font-family: 'NotoSansDevanagariUI-Medium',sans-serif;}
        .fotr{  background-color: #f3f3f3; padding: 1rem; margin:30px auto 0; text-align:center; overflow:hidden;}

        .txsbt{ font-size:11px; color:#333; line-height:14px; }
        .txsbt a{  color:#fff;}
        /* side menu start here */
        amp-sidebar { width: 250px; padding-right: 0;   background:#fff;    }
        .amp-sidebar-image { line-height: 0;      vertical-align:middle;    }
        .amp-close-image { top: 15px;       left: 190px;       cursor: pointer;    }
        .btmune { float: left;    background: transparent;    border: 1px solid transparent;    color: #fff;    top: 0; margin: 0px 0 0 -15px; }
        .sideline { padding-bottom: 1px;    border-bottom: 1px solid #dfdfdf;   display:block;    width: 100%; margin:0;}
        ul.side-list { margin:0; padding:0px 0 0 0;  float:none;color:#333333;}
        ul.side-list li{ margin:0; padding:0;font-size:14px;font-family: 'NotoSansDevanagariUI-Regular',sans-serif;}
        ul.side-list li:first-child{margin:12px 0 0;}
        ul.side-list li:last-child{margin:0 0 12px 0;}
        ul.side-list li a{color:#333333;  padding: 7px 0 7px 15px;display:block; }
        ul.side-list li a:hover{  color:#000;     padding: 7px 0 7px 15px; background:#f6f6f6; display:block;}
        ul.side-bot-list { margin:0px auto 0;  width:100%; color:#333333; text-align: center;border-top: 1px solid #dfdfdf; padding: 15px 0 0 0;}
        ul.side-bot-list li{ margin:0px auto; padding:0 5px;font-size:14px;font-family: 'NotoSansDevanagariUI-Regular',sans-serif; display: inline;}
        ul.side-bot-list li a{color:#333333;}
        ul.topsocialside {      margin: 0;    padding: 15px 0; text-align:center; }
        ul.topsocialside li { padding:3px; margin:0; display:inline; font-size: 16px; }
        ul.topsocialside li a{ color:#333333; }
        ul.topsocialside li a:hover{ color:#000; }
        .side-s-txt  { text-align: center; margin: 10px auto 40px 0; font-size:14px;font-family: 'NotoSansDevanagariUI-Regular',sans-serif;}
        .sidelinenew  {  border-bottom: 1px solid #dfdfdf;display: block;margin: 18px 0 10px 0;padding-bottom: 1px; width: 100%;}
        .busheadmebu {float:none;font-family: 'NotoSansDevanagariUI-Regular',sans-serif;font-size:15px;color:#333;margin:0px 0 0px 0;font-weight: 700; padding: 17px 0 0 15px; line-height:22px;}
        .busheadmebu a {color:#333;}
        .busheadmebu a:hover{color:#E62005; text-decoration:underline;}
        ul.side-bot-foot { margin:0px auto 0;  width:100%; color:#333; text-align: center; padding: 15px 0 15px 0;     border-bottom: 1px solid #dfdfdf;}
        ul.side-bot-foot li{ margin:0px auto; padding:0 3px;font-size:13px; font-family: "Open Sans",sans-serif; font-weight:100; display: inline; }
        ul.side-bot-foot li a{color:#333;}
        p.txs{ font-size:13px; color:#333; line-height:20px;  font-family: "Open Sans",sans-serif; font-weight:100; }
        /* side menu end here */
        /* sticky  start */
        .amp-sticky-ad {background-color: #fce4ec}
        .amp-sticky-ad-loaded {background-color: #f48fb1}
        .amp-sticky-ad-close-button {min-width: 0}
        /* sticky end */
        #housing-description {      clear: both;    }
        amp-carousel {
            margin: 0;
        }
        amp-accordion p, amp-accordion h4 {
            padding: 16px;
        }
        amp-accordion h4 {
            font-size: 18px;
        }
        .related {
            background-color: #f5f5f5;
            display: block;
            color: #111;
            height: 100px;
            padding: 0;
            line-height: 75px;
            padding-right: 8px;
        }
        .related amp-img {
            line-height: 24px;
            font-weight: 400;
            font-size: 24px;
            vertical-align: middle;
            float: left;
            margin-right: 10px;
        }
        .related:active {
            background-color: #ccc;
        }
        .price-description {      color: green;      font-weight: 400;    }
        amp-fit-text {      margin-bottom: 24px;      margin-top: 24px;      padding: 0 16px;    }
        .price-other {      font-weight: bold;    }
        .contact-section {      margin-top: 24px;      display: flex;      flex-wrap: wrap;    }
        .card{box-shadow:0 2px 2px 0 rgba(0,0,0,.14),0 3px 1px -2px rgba(0,0,0,.2),0 1px 5px 0 rgba(0,0,0,.12);float:none;overflow:hidden;padding:8px;margin:16px;border-radius:2px;}
        .card h4{margin-top:0;padding:0}
        .card p{margin-top:-4px;padding:0}
        .card .smtf{margin-top:-4px;padding:0; color:#006699; font-size:12px;}
        .headband { width:100%; background:#f3f3f3; border-bottom:1px solid #dfdfdf; color:#333; overflow:hidden;  box-shadow: inset 0px 11px 8px -10px #CCC, inset 0px 0px 0px 0px #CCC; }
        .hleft { width:47%; float:left; padding:15px 10px; text-align:center; color:#333;    font-family: "Open Sans", "serif"; font-weight:400; font-size:14px; }
        .hright { width:46.8%; border-left:1px solid #dfdfdf; float:right;padding:15px 0;}
        ul.logprocess  { margin:0; text-align:center; padding:0;}
        ul.logprocess li{ display:inline-block; margin-left:6px;}
        ul.logprocess li a{ color:#333; border-radius:4px; border:1px solid #333; padding:3px 10px; font-family: "Open Sans", "serif"; font-weight:700; font-size:11px; text-transform:uppercase;}
        .articlelistsubhead {font-family: 'NotoSansDevanagariUI-Regular',sans-serif;font-size:14px;color:#006699;margin:20px 0 0px 0;}
        .articlelistsubhead a{ color:#006699;}
        .articlelisthead {font-family: 'NotoSansDevanagariUI-Medium',sans-serif;font-size:20px; line-height:22px; color:#333333;margin:15px 0 15px 0;}
        .articlelisthead a{ color:#333333;}
        .articlelistdate {font-family: 'NotoSansDevanagariUI-Regular',sans-serif;font-size:14px; line-height:17px; color:#999999;margin:0px 0 30px 0;}
        .articlelistdate a{ color:#999999;}
        .ttrt { text-align:center}
        .ttrt a{ border:1px solid #333; border-radius:4px; padding:5px 10px; width:70px; display:inline-block; font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; color:#333; margin-bottom:20px;}
        .brandlogo { width:199px; border-radius:4px; padding:10px; margin:0 auto; border:1px solid #dbdbdb; }
        .brandlogo img{ width:100%;}
        h1.brandname { font-family: 'NotoSansDevanagariUI-Regular',sans-serif;font-size:28px; line-height:28px; margin-top:0; color:#333333; text-align:center;}
        .brandsub {font-family: 'NotoSansDevanagariUI-Regular',sans-serif;font-size:16px; line-height:17px; color:#999999;margin-top:20px; text-align:center;}
        .brandsub a{ color:#999999;}

        .brandmainval { font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:15px; color:#666666; text-align:center; margin-bottom:20px;}
        .brandmainval  span { font-family: "Open Sans", "serif"; font-weight:bold; color:#333; }
        .brandcontainer { border-radius:4px; border:1px solid #dbdbdb; padding:15px; font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; line-height:20px; margin-bottom:20px; }

        .brandcontainer  .brandtitle { border-bottom:1px solid #dbdbdb;  font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:22px; color:#333;     padding-bottom: 5px; }
        .brandcontainer .innercontain { overflow:auto; max-height:420px; height:420px;     margin-top: 25px; padding-right:15px;}
        .marss ul , .marss  ol { margin-left:20px; padding:0px;}
        .marss ol li {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; line-height:20px; color:#666;}
        .marss ul li {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; line-height:20px; color:#666; list-style:circle; }
        .marss table { border-collapse:collapse; border:1px solid #dfdfdf; margin-top: 20px;}
        .marss td, .marss th{  border:1px solid #dfdfdf; text-align:left; padding:5px; font-family: 'NotoSansDevanagariUI-Regular',sans-serif;}
        .brandcontainer  .brandtitle { border-bottom:1px solid #dbdbdb;  font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:22px; color:#333;     padding-bottom: 5px; }
        .brandcontainer .innercontain { overflow:auto; max-height:420px; height:420px;     margin-top: 25px; padding-right:15px;}
        .brandcontainer .innercontain > p { margin-top:0px;}
        .brandcontainer .innercontain p{font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; line-height:20px;}
        .brandcontainer .innercontain ul , .brandcontainer .innercontain ol { margin-left:20px; padding:0px;}
        .brandcontainer .innercontain ul li {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; line-height:20px; color:#666; list-style:circle; }
        .brandcontainer .innercontain ol li {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:16px; line-height:20px; color:#666;}
        .brandcontainer .innercontain table { border-collapse:collapse; border:1px solid #dfdfdf; margin-top: 20px;}
        .brandcontainer .innercontain td, .brandcontainer .innercontain th{  border:1px solid #dfdfdf; text-align:left; padding:5px; font-family: 'NotoSansDevanagariUI-Regular',sans-serif;}

        .brandcontainer .brandsubtitle {font-family: 'NotoSansDevanagariUI-Medium',sans-serif; font-size:18px; line-height:20px; margin-top:20px; margin-bottom:5px; }
        .brandcontainer .keypoints {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:14px; color:#666666;}
        .brandcontainer .keypoints .keyinner  { font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:14px; color:#666666; }
        .brandcontainer .keypoints .keyinner span { float:right; color:#333; font-weight:bold;}
        .padding15 { padding:15px;}
        .padding10 { padding:10px;}
        .innercontainer { border-radius:4px; border:1px solid #dbdbdb; margin-top:10px; margin-bottom:30px;  }
        .backheading { background:#f3f3f3; border-top-left-radius:4px;  border-top-right-radius:4px; font-family: 'NotoSansDevanagariUI-Medium',sans-serif; color:#333;  padding:10px 15px; font-size:16px; font-weight:600;}
        .heightone { background:#dbdbdb; height:1px; margin-bottom:0; margin:0 15px; }
        .innercontainer.upmargin { margin-top:0; margin-bottom:10px;}

        .keyinnerother {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:14px; color:#666666; margin-top:10px;}
        .keyinnerother span {  color:#333; font-weight:bold; display:block;}
        .brandtitle.marbot10 { margin-bottom:20px;}
        .brandcontainer .sec { margin:0px 0 13px;}
        .brandcontainer .sec .frminput {  border-radius:4px; border:1px solid #dfdfdf;  width:100%; height:35px; text-indent:10px; }
        .brandcontainer .sec select.frminput  {width:100%; color:#666; }
        .brandcontainer .sec textarea.frminput  {width:99%; color:#666; height:80px; }
        .btnsubmit { border:1px solid #f22406; color:#f22406; border-radius:4px; font-family: 'NotoSansDevanagariUI-Medium',sans-serif; background:transparent; padding:7px 15px; margin:8px auto; font-size:16px; text-align:center; float:none; }
        .brandcontainer .sec  { font-size:14px; color:#666;}

        .barndmargin { margin:5px; overflow:hidden;}
        .barndmargin h1{ padding:0 5px;}
        ul.brandlist  {   width:100%; margin:0 0; padding:0;}
        ul.brandlist li{ float:left; vertical-align:top; width:50%;  margin-bottom:10px;  }

        ul.brandlist li .blk{  padding:10px;  border:1px solid #dfdfdf;  margin:0 5px; min-height:240px;}
        ul.brandlist li .blk .brandlogolist { width:100%;}
        ul.brandlist li .blk .brandlogolist img{ border:1px solid #dfdfdf;}
        .brandcatname {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:13px; line-height:15px; color:#666666; margin-top:10px; }
        .brandcatname a{ color:#666666; }
        .brandname {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:15px; line-height:18px; color:#006699; margin-top:10px;}
        .brandname a{ color:#006699; }
        .investvalue {font-family: 'NotoSansDevanagariUI-Regular',sans-serif; font-size:12px; line-height:15px; color:#999999; margin-top:10px; }
        .investvalue span{ display:block;  font-family: 'Open Sans'; font-size:16px; font-weight:400; color:#333; }
        .pagination{   margin-left:0px; padding-left: 0px;  padding-top: 20px;     margin-top: 20px; clear: both; }
        .pagination > li > a, .pagination > li > span{color:#333333;padding:2px 9px;line-height:19px;border-radius:3px;}
        .pagination > li > a img{vertical-align:baseline;}
        .pagination > .active > a, .pagination > .active > a:focus, .pagination > .active > a:hover, .pagination > .active > span, .pagination > .active > span:focus, .pagination > .active > span:hover{background-color:#333333;border-color:#333333; color:#fff;}
        .pagination > .disabled > a, .pagination > li.disabled span{opacity:0.7;     color: #333;    pointer-events: none;     cursor: auto;}
        .pagination > li{display:inline-block;margin:0px 0px 10px 6px; }
        .pagination > li.disabled span{opacity:0.7;     color: #333;    pointer-events: none;     cursor: auto;}
    </style>

</head>