<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Franchise India</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        .tbli{padding-left:10px;}
        .tbli img{margin-right:10px;margin-bottom:1px; line-height:40px;}

        /*Calling our web font*/
        .list-head{color:#ffffff; text-align:center; padding: 29px 0 20px 0; font-size:16px; font-weight:bold;}
        @media screen and (max-width: 767px) {
            #mainTbl { width: 100% !important; }
            .mhide{display: none !important;}
            .mshow{display: block !important;}
            .social-img{width:100%;}
            img{max-width: 100%;margin-left: auto;margin-right: auto;}
            .td-business{padding:0 20px 26px 20px!important;}
            .td-business2{padding:0 20px 57px 20px!important;}
            .td-eligible{padding:30px 20px 26px 20px!important;}
            .menu-list{width:90%; padding-bottom:7px!important;padding-left:0!important;}
            .menu-list td.menu-item{ display:block; text-align:center; width:100%;padding-bottom:5px;}
            .view-btn{width:50%!important;}
            .content-list{width:90%!important; padding:10px!important;}
            .pad-mo{padding:10px 0 10px 10px!important;}
            .td-content{width:40%!important;}
            .logo-mo{width:75%; max-width:200px;}
            .activate-so{width:90%;}
        }

    </style>

</head>
<body style="margin:0; padding:0; background-color:#ffffff" bgcolor="">
<table width="698" border="0" cellpadding="0" bgcolor="#fbfbfb" cellspacing="0" align="center" style="margin:0 auto;border:1px solid #eaeaea" id="mainTbl">

    <!--Header-part-->
    @include('layout.mail.mail-header')
    <!--close-top-Header-menu-->

    <!--main-container-part-->
    @yield('content')
    <!--end-main-container-part-->

    <tr>
        <td valign="top"><table width="100%" cellspacing="0" cellpadding="0">
                <tr>
                    <td valign="top" class="td-business" style="padding:0 90px 10px 90px; text-align:center; font-size:16px; color:#666666;"><font face="Arial, Helvetica, sans-serif">Please see the tutorial video below.</font></td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td valign="top">
            <a href="@yield('videoLink')" style="text-decoration:none;" target="_blank">
                <table width="100%" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="top" align="center">
                            <a href="@yield('videoLink')" style="text-decoration:none;" target="_blank">
                                <img src="https://www.franchiseindia.com/images/video.jpg" alt="video" align="center" border="0">
                            </a>
                        </td>
                    </tr>
                </table>
            </a>
        </td>
    </tr>

    <!--Footer links part-->
    @include('layout.mail.mail-footer')
    <!--end-Footer-links-part-->

</table>
</body>
</html>
