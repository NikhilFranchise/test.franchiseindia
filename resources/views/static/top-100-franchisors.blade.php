@section('seoTitle', 'Top 100 Franchise Opportunities in India for 2024: Franchise India')
@section('seoDesc', 'Top 100 Franchise Businesses in India 2023: Dive into the most successful franchisor and franchisee opportunities. Gain insights into the best sectors to launch and grow your franchise this year.')
@section('seoKeywords', 'Franchise India Top 100 Franchisees, Top 100 Franchisees')
@extends('layout.master')
@section('content')
<style>
  /* 5 OCT 2023 CSS ADD */
.yeartab li.active{border-bottom: 1px solid #f00;}
.yeartab li:hover{background-color: #3E3E3E;border-radius: 4px;border-bottom: 1px solid #f00;}
.yeartab li:hover a{color:#ffffff!important;}
.scriteria{border: 1px solid #E9ECF4;padding: 10px 25px 25px 25px;border-radius: 4px;background: #ffffff;margin-bottom: 25px;}
.scriteria ul li{margin-bottom: 10px;}
.moblink{display: none;}
a.desklink{background-color: #000000; padding: 14px 20px;border-radius: 5px; font-weight: normal;display: block;font-size: 13px; color:#ffffff;
text-align: center;}
.staicp h1{font-size: 33px;line-height: 41px;}
a.desklink:hover{color: #ffffff;}
.middleval{display: none;}
.top-hundred h2{color: #333333;font-size: 26px;}
.top-hundred p{color: #333333;font-size: 16px;line-height: 24px;}
.top-hundred-tab h3{color: #333333;font-size: 20px;font-weight: bold;margin-bottom: 11px;}
.top-hundred a{color:#ED1C25;font-size: 16px;text-decoration: underline;cursor: pointer;}
.top-hundred a:hover{color:#ED1C25;text-decoration: underline;cursor: pointer;}
.top-hundred-tab{border: 1px solid #E9ECF4;padding:0px 20px 20px 20px;border-radius: 4px;background: #ffffff;margin-top: 20px;margin-bottom: 20px;}
.nav-tabs>li{text-align: center;}
.nav-tabs>li span{line-height: 18px;font-size: 14px;padding-top: 7px;display: block;}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover, .nav-tabs>li>a{background-color: transparent!important;border: 0px!important;color: #333333!important;}
.nav-tabs>li>a{margin-right: 0px!important;}
.nav-tabs{display: flex;justify-content: space-between;	}
.nav>li>a>img{max-width: none;display: block;margin: 0px auto 4px auto;}
.top-hundred-tab li img{margin-bottom: 4px;display: block;}
.top-table{width: 100%;margin-top: 0px;}
.top-table tr{border-bottom: 1px solid #e3e3e3;}
.top-table tr:nth-child(n):hover{background-color:#E9ECF4!important;}
.top-table tr:nth-child(n){background-color:#F9FAFB!important;}
.top-table tr:nth-child(2n){background-color:#ffffff!important;}
.top-table th{padding: 15px!important;background-color: #F3F4F6!important;border-top: 1px solid #e3e3e3;color:#333333;}
.top-table td{padding:20px!important;color: #333333;font-size: 15px;font-weight: bold;}
.top-table td img{margin-right: 10px; width: 30%;}
.top-table td:nth-child(1){width:10%;}
.top-table td:nth-child(2){width:40%;}
.top-table td:nth-child(3){width:20%;}
.top-table td:nth-child(4){width:15%;}
.top-table td:nth-child(5){width:15%;}
a.load_more{display: block;background: #333333;padding: 15px 10px;border-radius: 4px;width: 170px;text-align: center;color: #ffffff;margin: 15px auto;font-size: 16px;}
a.load_more:hover, a.load_more:visited, a.load_more:focus{color: #ffffff;}
/*.active tr{ display: none; }*/
table tr.active { display: table-row; }
.top-modal-head{color: #333333;font-size: 20px;font-weight: bold;margin-bottom: 15px;}
ul.topp{list-style: none;padding-left: 0px;}
ul.topp li{color: #333333;font-size: 15px;margin-bottom: 5px;position: relative;padding-left: 24px;background-image: url(https://www.franchiseindia.com/images/top100/bullets.png);
    background-repeat: no-repeat;background-position: left;}
#topFranchise .close {position: absolute;right: 7px;top: 4px;background-color: transparent;border-radius: 50px;z-index: 999;height: 33px;width: 33px;opacity: 1;color: #585858;box-shadow: none;
}
#topFranchise .modal-content{border-radius: 0px;box-shadow: none;padding: 10px;}
#topFranchise .modal-dialog {width: 539px;margin: 152px auto;}
.yeartab li.active{background:#3E3E3E;padding: 4px 25px;border-radius: 4px;}
.yeartab li.active{color:#ffffff!important;position: relative;}
.yeartab li.active a, .yeartab li.active a:focus, .yeartab li.active a:visited{color:#ffffff!important;font-weight: bold;font-size: 20px;cursor: pointer;}
.yeartab li{margin-bottom: 20px;background: #ffffff;padding: 4px 25px;}
.yeartab li a{color:#333333;font-weight: bold;font-size: 20px;cursor: pointer;}
.yeartab{display: block!important;}
.yeartab li.active::after{border-radius: 10px 20px 20px 5px;width: 20px;position: absolute;padding-left: 40px; bottom: 0px;left: 50px;bottom: 10px;display: block;}

.top-hundred .crit {
  color: #ED1C25;
  font-size: 16px;
  text-decoration: underline;
  cursor: pointer;
}

@media screen and (min-width:1000px) and (max-width:1199px){
.nav-tabs>li>a span{display: none;}

}
@media screen and (max-width:767px){
.top-table th{font-size: 16px;}
.nav-tabs > li.active > a:hover{color:#ffffff!important;font-weight: bold;}
.staicp h1 {font-size: 22px;line-height: 33px;}
.scriteria .catbheading, .scriteria h2.catbheading{font-size: 18px;line-height: 27px;margin-bottom: 0px;}
.moblink{display: block;}
.top-hundred a{font-size: 15px;}
.tbrands .nav > li > a{padding: 5px 10px;}
.top-hundred h2{font-size:20px;}
a.desklink{display: none;}
.top-table td:nth-child(2) img{margin-right: 10px; width: 47%;float: left;}
.top-table{margin-bottom: -1px!important;}
.top-hundred{padding: 0px 5px}
.top-hundred-tab .nav-tabs{padding-left: 0px;}
.top-hundred-tab h3{font-size: 17px;line-height: 22px;}
.yeartab li{padding: 2px 4px;margin-bottom: 0px;}
.yeartab .nav > li > a, .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover{padding: 5px 10px!important;}
.yeartab li.active{padding: 2px 4px;font-weight: normal;}
.yeartab li.active a{font-size: 14px;font-weight: normal;}
.yeartab li.focus{padding: 2px 4px;font-weight: normal;}
.yeartab li.focus a{font-size: 14px;font-weight: normal;}
.yeartab li.active a, .yeartab li.active a:focus, .yeartab li.active a:visited{font-size: 15px;}
.yeartab li a{font-size: 15px;font-weight: normal;}
.tab-content{padding: 10px;}
.top-table td:nth-child(1){width:1%;    padding-left: 10px;}
.yeartab{display: flex!important;margin:0px 13px;}
.top-table td:nth-child(2) {width: 62%;font-size: 13px;padding: 20px 10px 20px 0px!important;}
.top-table td:nth-child(3), .top-table th:nth-child(3), .top-table td:nth-child(4), .top-table th:nth-child(4){display: none;}
.nav-tabs {display: flex;overflow-x: auto;white-space: nowrap;overflow-y: hidden;}
.top-table td img{width: auto;}
.top-table td:nth-child(5) {width: 10%;padding: 0px 0px 0px 0px!important;}
#topFranchise .modal-dialog{width: 96%;margin-left: auto;margin-right: auto;}
}

/* 5 OCT 2023 CSS ADD */
    </style>


<div class="container formsection marginTB45 staicp tbrands">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 p-3">


<ul class="nav nav-tabs yeartab" role="tablist">
<li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#year2024">2024</a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#year2023">2023</a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#year2022">2022</a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#year2021">2021</a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#year2020">2020</a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#year2019">2019</a></li>


</ul>


<!-- Year Tab Content -->
<div class="tab-content">

<!-- Year 2024 -->

<div id="year2024" role="tabpanel" class="tab-pane active">

<div class="top-hundred">
<br>
<h1>Top 100 Franchise/Franchisor 2024</h1>
<p>Revealing brand impact, consumer value, and dynamic opportunities. Explore trends in Indian franchises, including global giants and emerging innovators. Rankings consider financial strength, expansion, growth rate, and success, reflecting a distinct identity, robust planning, support, innovation, and cultural sensitivity. This analysis assists franchisees and franchisors alike, offering insights into the franchise sector that underpin thriving business ventures.</p>
<div data-target="#topFranchise" data-toggle="modal" class="crit">Understand Selection Criteria</div>
</div>

<!-- Top 100 franchises -->
<div class="top-hundred-tab">
<h3>Browse Top 100 franchises by category</h3>
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#all9"><img src="{{ url('images/top100/brands.svg') }}" alt=""> <span>All</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#automotive9"><img src="{{ url('images/top100/automotive.svg') }}" alt=""> <span>Automotive</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#beauty9"><img src="{{ url('images/top100/beauty.svg') }}" alt=""> <span>Beauty &<br> Health</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#business9"><img src="{{ url('images/top100/business.svg') }}" alt=""> <span>Business<br> Services</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#dealers9"><img src="{{ url('images/top100/dealers.svg') }}" alt=""> <span>Dealers &<br> Distributors</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#education9"><img src="{{ url('images/top100/education.svg') }}" alt=""> <span>Education</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#fashion9"><img src="{{ url('images/top100/fashion.svg') }}" alt=""> <span>Fashion</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#food9"><img src="{{ url('images/top100/food.svg') }}" alt=""> <span>Food And<br> Beverage</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#hotel9"><img src="{{ url('images/top100/hotel.svg') }}" alt=""> <span>Hotel, Travel<br> & Tourism</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#retail9"><img src="{{ url('images/top100/retail.svg') }}" alt=""> <span>Retail</span></a></li>
</ul>
</div>
<!-- Top 100 franchises -->

<!-- Tab Content -->
<div class="tab-content">

<!-- All -->
<div id="all9" role="tabpanel" class="tab-pane active">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="Amul"> Amul</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista"> Barista </a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins"> Baskin Robbins </a></td>
    <td>Food and Beverage </td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata"> Bata</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/croma.58113">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/croma_1.gif" alt="Croma"> Croma </a></td>
    <td>Retail</td>
    <td>Rs. 2 Cr - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal PathLabs"> Dr Lal PathLabs</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC Courier"> DTDC Courier</a> </td>
    <td>Business Services    </td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="EuroKids"> EuroKids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals"> Ferns 'N' Petals </a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="First Cry"> First Cry</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Jockey-India.231">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Jockey-India_1.gif" alt="Jockey India"> Jockey India</a></td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr    </td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/kotak.gif" alt="Kotak Securities"> Kotak Securities</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac </td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart"> Lenskart </a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Levis-Strauss-India.886">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Levis-Strauss-India_1.jpg" alt="Levis"> Levis</a></td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes"> Liberty Shoes</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac </td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/louis-philippe.91613">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/louis-philippe_1.gif" alt="Louis Philippe"> Louis Philippe</a></td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/MMTFranchise_1.gif" alt="MakeMyTrip"> MakeMyTrip</a></td>
    <td>Hotel and Resorts</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nescafe.90746">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/nescafe_1.jpg" alt="Nescafe"> Nescafe</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk"> Siyaram Silk </a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>20</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/tanishq.gif" alt="Tanishq"> Tanishq</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. Onwards</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>21</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus"> Titan Eye Plus </a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories-men.ssc562" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories-men.ssc562" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>22</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige"> TTK Prestige </a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>23</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="Manyavar"> Manyavar</a></td>
    <td>Retail</td>
    <td>Rs. 40 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>24</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/uspolo.gif" alt="U.S. Polo"> U.S. Polo</a></td>
        <td>Retail</td>
        <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>25</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/wbytcns.gif" alt="W by TCNS"> W by TCNS</a></td>
        <td>Retail</td>
        <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>26</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/zudio.85046">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/zudio_1.jpg" alt="Zudio"> Zudio</a></td>
    <td>Fashion</td>
    <td>Rs. 2 Cr - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>27</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/la-pinoz-pizza.85043">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/la-pinoz-pizza_1.jpg" alt="La Pino’z Pizza"> La Pino’z Pizza</a>
    </td>
    <td>Food and Beverage</td>
    <td>Rs. 50Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>28</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-arvind-store.29949">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-arvind-store_1.gif" alt="The Arvind Store"> The Arvind Store</a></td>
        <td>Fashion</td>
        <td>Rs. 50Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>29</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/nayara.gif" alt="Nayara energy"> Nayara Energy</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 50Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/energy-saving-products-devices" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/energy-saving-products-devices" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>30</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/maggi-hotspot.90744">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/maggi-hotspot_1.jpg" alt="Maggi Hotspot"> Maggi Hotspot</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>31</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/westside.91799">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/westside_1.gif" alt="Westside"> Westside</a></td>
    <td>Fashion</td>
    <td>Rs. 1 Cr. - 2 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>32</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee Limited"> Vakrangee Limited</a></td>
    <td>Retail</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>33</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Naturals-Salons.14092">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/naturals199.gif" alt="Naturals Salon"> Naturals Salon</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>34</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/berger-paints.93087">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/berger-paints_1.jpg" alt="Berger Paints"> Berger Paints</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/paints-allied-products" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/paints-allied-products" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>35</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/van-heusen.91614">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/van-heusen_1.gif" alt="Van Heusen"> Van Heusen</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>36</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/allen-solly.91653">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/allen-solly_1.gif" alt="Allen solly"> Allen solly</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/mens-wear" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/mens-wear" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>37</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/peter-england.91654">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/peter-england_1.gif" alt="Peter England"> Peter England</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>38</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/CAREER-LAUNCHER.19103">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/career(199x81).gif" alt="Career Launcher"> Career Launcher</a></td>
    <td>Education</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/competitive-exam-coaching-institute.ssc89
" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/competitive-exam-coaching-institute.ssc89
" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>39</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="Lakme Salon"> Lakme Salon</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>40</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics"> Apollo Diagnostics</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>41</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/caratlane.gif" alt="Caratlane"> Caratlane</a></td>
    <td>Retail</td>
    <td>Rs. 60 Lac - 80 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>42</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/color-bar.58162">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/color-bar_1.jpg" alt="Colorbar"> Colorbar</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>43</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Khadim-India-Ltd.16722">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/khadim.gif" alt="Khadim India"> Khadim India</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>44</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/livspace-3367">
        <img src="https://img.franchiseindia.com/brands/logo/livspace_1.jpg" alt="Livspace"> Livspace</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/home-furniture" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/home-furniture" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>45</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/mamagoto.gif" alt="Mamagoto"> Mamagoto</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1.5 Cr. - 2 Cr.</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>46</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry"> Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>47</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/chai-garam.36959">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/chai-garam_1.png" alt="Chai Garam"> Chai Garam </a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>48</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/kalyan.gif" alt="Kalyan Jewellers"> Kalyan Jewellers</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>49</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/cultfit.gif" alt="Cultfit"> Cultfit</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 1 Cr - 2 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>50</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/lemontree.gif" alt="Lemon tree"> Lemon tree</a></td>
    <td>Business Services</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

  </table>

<table class="table-striped table-responsive top-table moretext9" style="display: none;">
<tr>
    <td>51</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/biggies.75490">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biggies_1.jpg" alt="Biggies Burger"> Biggies Burger</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>52</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/burger-singh.37193">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/burger-singh_1.jpg" alt="Burger Singh"> Burger Singh</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>53</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/carzspa.33543">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/carzspa_2.jpg" alt="Carzspa"> Carzspa</a></td>
    <td>Automotive</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>54</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pigeon-gilma-black-decker-stovekarft.70884">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pigeon-gilma-black-decker-stovekarft_1.jpg" alt="Stovekraft"> Stovekraft</a></td>
    <td>Retail</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>55</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/crossword.gif" alt="Crossword"> Crossword</a></td>
    <td>Retail</td>
    <td>Rs. 30 Lac Onwards</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/book-stores.ssc197" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/book-stores.ssc197" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>56</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mia-by-tanishq.92638">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mia-by-tanishq_1.gif" alt="Mia by Tanishq"> Mia by Tanishq</a></td>
    <td>Retail</td>
    <td>Rs. 50Lakh - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>57</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ylg-salon.90954">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/ylg-salon_1.jpg" alt="YLG Salon"> YLG Salon</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>58</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Jumboking-Foods.13373">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Jumboking-Foods_1.jpg" alt="JUMBOKING FOODS"> JUMBOKING FOODS</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>59</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/houseofcandy.83502">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/houseofcandy_1.jpg" alt="House Of Candy"> House Of Candy</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>60</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/hitachi-payment-services-pvt-ltd.38217">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/hitachi-payment-services-pvt-ltd_1.jpg" alt="Hitachi Payment Services"> Hitachi Payment Services</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lakh - 5 Lakh</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/payment-solution-services.ssc554" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/payment-solution-services.ssc554" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>61</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean"> U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>62</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/ather.gif" alt="Ather"> Ather</a></td>
    <td>Dealers and Distributors</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/electric-vehicles-parts" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/electric-vehicles-parts" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>63</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/gocolors.gif" alt="Go Colors"> Go Colors</a></td>
    <td>Retail</td>
    <td>Rs. 40+ Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>64</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/senco.gif" alt="Sanco Gold"> Sanco Gold</a></td>
    <td>Fashion</td>
    <td>Rs. 2 Cr - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>65</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fortum-charge-drive-india.74327">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fortum-charge-drive-india_1.jpg" alt="Glida"> Glida</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-vehicles.ssc725" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-vehicles.ssc725" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>66</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/blinkit.75501">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/blinkit_1.png" alt="Blinkit"> Blinkit</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>67</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/electricone.gif" alt="Electric One"> Electric One</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 20 Lac - 60 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-vehicles.ssc725" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-vehicles.ssc725" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>68</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/amritsar-haveli.91745">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/amritsar-haveli_1.gif" alt="Amritsar Haveli"> Amritsar Haveli</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>69</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/delhivery.28935">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/delhivery_1.jpg" alt="Delhivery"> Delhivery</a></td>
    <td>Business Services</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>70</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/headsup.gif" alt="Heads up For Tails"> Heads up For Tails</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>71</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/upGrad.gif" alt="upGrad"> upGrad</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>72</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/masaba.gif" alt="House of Masaba"> House of Masaba</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>73</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/tyaani.gif" alt="Tyaani"> Tyaani</a></td>
    <td>Retail</td>
    <td>Rs. 4 Cr. Onwards</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>74</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nykd-by-nykaa.78545">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/nykd-by-nykaa_1.gif" alt="Nykd By Nykaa"> Nykd By Nykaa</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-clothing.ssc560" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-clothing.ssc560" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>75</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/zorgers.65340">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/zorgers_2.jpg" alt="Zorgers"> Zorgers</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>76</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/yatra-online-ltd.96785">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/yatra-online-ltd_1.jpg" alt="Yatra"> Yatra</a></td>
    <td>Hotel and Resorts</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-travel-services.ssc146" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-travel-services.ssc146" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>77</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/venture-x.89713">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/venture-x_1.jpg" alt="Venture X"> Venture X</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Cr. - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>78</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/western-global-traders.93453">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/western-global-traders_1.gif" alt="WESTERN GLOBAL TRADERS "> WESTERN GLOBAL TRADERS </a></td>
    <td>Business Services</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-financial.ssc142" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-financial.ssc142" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>79</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/melorra.86694">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/melorra_1.gif" alt="Melorra"> Melorra</a></td>
    <td>Retail</td>
    <td>Rs. 2 Cr - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>80</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Home-Lane.18892">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Home-Lane_1.gif" alt="Home Lane"> Home Lane</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>81</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/zepto.86000">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/zepto_1.gif" alt="Zepto"> Zepto</a></td>
    <td>Retail</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>82</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/22nd-parallel.89511">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/22nd-parallel_1.gif" alt="22nd Parallel"> 22nd Parallel</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>83</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-elefant.83621">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-elefant_1.jpg" alt="The Elefant"> The Elefant</a></td>
    <td>Education</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-application-services.ssc734" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-application-services.ssc734" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>84</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/time-for-organics.93458">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/time-for-organics_1.jpg" alt="Time for Organics"> Time for Organics</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>85</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pikpart-car-service-center.95803">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pikpart-car-service-center_1.jpg" alt="Pikpart Smart Garage"> Pikpart Smart Garage </a></td>
    <td>Automotive</td>
    <td>Rs. 20 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>86</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/prakruthi.gif" alt="Prakruthi">Prakruthi</a></td>
    <td>Retail</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>87</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/hippo.gif" alt="Hippo Stores">Hippo Stores</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/building-material-stores.ssc221" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/building-material-stores.ssc221" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>88</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso"> Miniso</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 50Lakh - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>89</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/puma.gif" alt="Puma"> Puma</a></td>
    <td>Retail</td>
    <td>Rs. 40 Lac - 60 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>90</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/anytime-fitness.51366">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness"> Anytime Fitness</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 2Cr - 3 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>91</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/domino.gif" alt="Domino's Pizza"> Domino's Pizza</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 35 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>92</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/reebok.gif" alt="Reebok"> Reebok</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>93</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/noodle.gif" alt="Noodle box"> Noodle box</a></td>
    <td>Food and Beverage</td>
    <td>$ 2M AUD</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>94</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/totalenergies.95952">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/totalenergies_1.jpg" alt="TotalEnergies"> TotalEnergies</a></td>
    <td>Automotive</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-maintanance-related.ssc367" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-maintanance-related.ssc367" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>95</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/elle.gif" alt="Elle Décor Kitchens"> Elle Decor Kitchens</a></td>
    <td>Retail</td>
    <td>Rs. 40 Lakh - 2 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>96</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/carltonlondon.93590">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/carltonlondon_1.gif" alt="Carlton London"> Carlton London</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-clothing.ssc233" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-clothing.ssc233" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>97</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/marriott.gif" alt="Marriott International"> Marriott International</a></td>
    <td>Hotel and Resorts</td>
    <td>Rs. 3714 - 5942 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>98</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/hyatt.gif" alt="Hyatt">Hyatt</a></td>
    <td>Hotel and Resorts</td>
    <td>Rs. 4 Cr. onwards</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>99</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/wyndham.gif" alt="Wyndham Hotels & Resorts"> Wyndham Hotels & Resorts</a></td>
    <td>Hotel and Resorts</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>100</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/peets.77274">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/peets_1.jpg" alt="Peet’s Coffee"> Peet’s Coffee</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10000 - 50 K</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>
  </table>
  <a class="load_more moreless-button9">Load more »</a>

</div>
<!-- All ends -->


<!-- Automotive -->
<div id="automotive9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/carzspa.33543">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/carzspa_2.jpg" alt="Carzspa"> Carzspa</a></td>
    <td>Automotive</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/totalenergies.95952">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/totalenergies_1.jpg" alt="TotalEnergies"> TotalEnergies</a></td>
    <td>Automotive</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-maintanance-related.ssc367" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-maintanance-related.ssc367" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pikpart-car-service-center.95803">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pikpart-car-service-center_1.jpg" alt="Pikpart Smart Garage"> Pikpart Smart Garage </a></td>
    <td>Automotive</td>
    <td>Rs. 20 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>



  </table>
</div>
<!-- Automotive ends-->


<!-- Beauty and Health -->
<div id="beauty9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal PathLabs"> Dr Lal PathLabs</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Naturals-Salons.14092">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/naturals199.gif" alt="Naturals Salon"> Naturals Salon</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="Lakme Salon"> Lakme Salon</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics"> Apollo Diagnostics</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/color-bar.58162">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/color-bar_1.jpg" alt="Colorbar"> Colorbar</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/cultfit.gif" alt="Cultfit"> Cultfit</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 1 Cr - 2 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ylg-salon.90954">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/ylg-salon_1.jpg" alt="YLG Salon"> YLG Salon</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/zorgers.65340">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/zorgers_2.jpg" alt="Zorgers"> Zorgers</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso"> Miniso</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 50Lakh - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/anytime-fitness.51366">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness"> Anytime Fitness</a></td>
    <td>Beauty and Health</td>
    <td>Rs. 2Cr - 3 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>



  </table>
</div>
<!-- Beauty and Health ends-->


<!-- Business Services -->
<div id="business9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC Courier"> DTDC Courier</a> </td>
    <td>Business Services    </td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/kotak.gif" alt="Kotak Securities"> Kotak Securities</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac </td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/lemontree.gif" alt="Lemon tree"> Lemon tree</a></td>
    <td>Business Services</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/hitachi-payment-services-pvt-ltd.38217">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/hitachi-payment-services-pvt-ltd_1.jpg" alt="Hitachi Payment Services"> Hitachi Payment Services</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lakh - 5 Lakh</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/payment-solution-services.ssc554" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/payment-solution-services.ssc554" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean"> U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/delhivery.28935">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/delhivery_1.jpg" alt="Delhivery"> Delhivery</a></td>
    <td>Business Services</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/headsup.gif" alt="Heads up For Tails"> Heads up For Tails</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/venture-x.89713">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/venture-x_1.jpg" alt="Venture X"> Venture X</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Cr. - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/western-global-traders.93453">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/western-global-traders_1.gif" alt="WESTERN GLOBAL TRADERS "> WESTERN GLOBAL TRADERS </a></td>
    <td>Business Services</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-financial.ssc142" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-financial.ssc142" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>



  </table>
</div>
<!-- Business Services ends-->


<!-- Dealers & Destributors Services -->
<div id="dealers9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/nayara.gif" alt="Nayara energy"> Nayara Energy</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 50Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/energy-saving-products-devices" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/energy-saving-products-devices" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/berger-paints.93087">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/berger-paints_1.jpg" alt="Berger Paints"> Berger Paints</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/paints-allied-products" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/paints-allied-products" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/livspace-3367">
        <img src="https://img.franchiseindia.com/brands/logo/livspace_1.jpg" alt="Livspace"> Livspace</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/home-furniture" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/home-furniture" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/ather.gif" alt="Ather"> Ather</a></td>
    <td>Dealers and Distributors</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/electric-vehicles-parts" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/electric-vehicles-parts" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fortum-charge-drive-india.74327">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fortum-charge-drive-india_1.jpg" alt="Glida"> Glida</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-vehicles.ssc725" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-vehicles.ssc725" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/electricone.gif" alt="Electric One"> Electric One</a></td>
    <td>Dealers and Distributors</td>
    <td>Rs. 20 Lac - 60 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-vehicles.ssc725" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-vehicles.ssc725" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


  </table>
</div>
<!-- Dealers & Destributors Services ends-->


<!-- Education Services -->
<div id="education9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="EuroKids"> EuroKids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/CAREER-LAUNCHER.19103">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/career(199x81).gif" alt="Career Launcher"> Career Launcher</a></td>
    <td>Education</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/competitive-exam-coaching-institute.ssc89
" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/competitive-exam-coaching-institute.ssc89
" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/upGrad.gif" alt="upGrad"> upGrad</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-elefant.83621">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-elefant_1.jpg" alt="The Elefant"> The Elefant</a></td>
    <td>Education</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-application-services.ssc734" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-application-services.ssc734" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


  </table>
</div>
<!-- Education ends-->


<!-- Fashion -->
<div id="fashion9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata"> Bata</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="First Cry"> First Cry</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Jockey-India.231">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Jockey-India_1.gif" alt="Jockey India"> Jockey India</a></td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr    </td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart"> Lenskart </a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Levis-Strauss-India.886">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Levis-Strauss-India_1.jpg" alt="Levis"> Levis</a></td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes"> Liberty Shoes</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac </td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/louis-philippe.91613">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/louis-philippe_1.gif" alt="Louis Philippe"> Louis Philippe</a></td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/zudio.85046">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/zudio_1.jpg" alt="Zudio"> Zudio</a></td>
    <td>Fashion</td>
    <td>Rs. 2 Cr - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-arvind-store.29949">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-arvind-store_1.gif" alt="The Arvind Store"> The Arvind Store</a></td>
        <td>Fashion</td>
        <td>Rs. 50Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/westside.91799">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/westside_1.gif" alt="Westside"> Westside</a></td>
    <td>Fashion</td>
    <td>Rs. 1 Cr. - 2 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>




<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/van-heusen.91614">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/van-heusen_1.gif" alt="Van Heusen"> Van Heusen</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/allen-solly.91653">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/allen-solly_1.gif" alt="Allen solly"> Allen solly</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.dealerindia.com/dir/mens-wear" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/mens-wear" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/peter-england.91654">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/peter-england_1.gif" alt="Peter England"> Peter England</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Khadim-India-Ltd.16722">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/khadim.gif" alt="Khadim India"> Khadim India</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/senco.gif" alt="Sanco Gold"> Sanco Gold</a></td>
    <td>Fashion</td>
    <td>Rs. 2 Cr - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/carltonlondon.93590">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/carltonlondon_1.gif" alt="Carlton London"> Carlton London</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-clothing.ssc233" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-clothing.ssc233" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>



  </table>
</div>
<!-- Fashion ends-->


<!-- Food and Beverages -->
<div id="food9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="Amul"> Amul</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista"> Barista </a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins"> Baskin Robbins </a></td>
    <td>Food and Beverage </td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nescafe.90746">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/nescafe_1.jpg" alt="Nescafe"> Nescafe</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/la-pinoz-pizza.85043">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/la-pinoz-pizza_1.jpg" alt="La Pino’z Pizza"> La Pino’z Pizza</a>
    </td>
    <td>Food and Beverage</td>
    <td>Rs. 50Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/maggi-hotspot.90744">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/maggi-hotspot_1.jpg" alt="Maggi Hotspot"> Maggi Hotspot</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/mamagoto.gif" alt="Mamagoto"> Mamagoto</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1.5 Cr. - 2 Cr.</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/chai-garam.36959">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/chai-garam_1.png" alt="Chai Garam"> Chai Garam </a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/biggies.75490">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biggies_1.jpg" alt="Biggies Burger"> Biggies Burger</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/burger-singh.37193">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/burger-singh_1.jpg" alt="Burger Singh"> Burger Singh</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Jumboking-Foods.13373">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Jumboking-Foods_1.jpg" alt="JUMBOKING FOODS"> JUMBOKING FOODS</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/houseofcandy.83502">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/houseofcandy_1.jpg" alt="House Of Candy"> House Of Candy</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/amritsar-haveli.91745">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/amritsar-haveli_1.gif" alt="Amritsar Haveli"> Amritsar Haveli</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/22nd-parallel.89511">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/22nd-parallel_1.gif" alt="22nd Parallel"> 22nd Parallel</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/time-for-organics.93458">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/time-for-organics_1.jpg" alt="Time for Organics"> Time for Organics</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/domino.gif" alt="Domino's Pizza"> Domino's Pizza</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 35 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/noodle.gif" alt="Noodle box"> Noodle box</a></td>
    <td>Food and Beverage</td>
    <td>$ 2M AUD</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/peets.77274">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/peets_1.jpg" alt="Peet’s Coffee"> Peet’s Coffee</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10000 - 50 K</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


  </table>
</div>
<!-- Food and Beverages ends-->



<!-- Hotel, Travel & Tourism -->
<div id="hotel9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/MMTFranchise_1.gif" alt="MakeMyTrip"> MakeMyTrip</a></td>
    <td>Hotel and Resorts</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/yatra-online-ltd.96785">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/yatra-online-ltd_1.jpg" alt="Yatra"> Yatra</a></td>
    <td>Hotel and Resorts</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-travel-services.ssc146" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-travel-services.ssc146" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/marriott.gif" alt="Marriott International"> Marriott International</a></td>
    <td>Hotel and Resorts</td>
    <td>Rs. 3714 - 5942 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/hyatt.gif" alt="Hyatt">Hyatt</a></td>
    <td>Hotel and Resorts</td>
    <td>Rs. 4 Cr. onwards</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/wyndham.gif" alt="Wyndham Hotels &amp; Resorts"> Wyndham Hotels &amp; Resorts</a></td>
    <td>Hotel and Resorts</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


  </table>
</div>
<!-- Hotel, Travel & Tourism ends-->


<!-- Retail -->
<div id="retail9" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Ranks</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/croma.58113">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/croma_1.gif" alt="Croma"> Croma </a></td>
    <td>Retail</td>
    <td>Rs. 2 Cr - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk"> Siyaram Silk </a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/tanishq.gif" alt="Tanishq"> Tanishq</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. Onwards</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus"> Titan Eye Plus </a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories-men.ssc562" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories-men.ssc562" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige"> TTK Prestige </a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="Manyavar"> Manyavar</a></td>
    <td>Retail</td>
    <td>Rs. 40 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/uspolo.gif" alt="U.S. Polo"> U.S. Polo</a></td>
        <td>Retail</td>
        <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/wbytcns.gif" alt="W by TCNS"> W by TCNS</a></td>
        <td>Retail</td>
        <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee Limited"> Vakrangee Limited</a></td>
    <td>Retail</td>
    <td>Rs. 5Lac - 10Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/caratlane.gif" alt="Caratlane"> Caratlane</a></td>
    <td>Retail</td>
    <td>Rs. 60 Lac - 80 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry"> Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/kalyan.gif" alt="Kalyan Jewellers"> Kalyan Jewellers</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pigeon-gilma-black-decker-stovekarft.70884">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pigeon-gilma-black-decker-stovekarft_1.jpg" alt="Stovekraft"> Stovekraft</a></td>
    <td>Retail</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/crossword.gif" alt="Crossword"> Crossword</a></td>
    <td>Retail</td>
    <td>Rs. 30 Lac Onwards</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/book-stores.ssc197" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/book-stores.ssc197" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mia-by-tanishq.92638">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mia-by-tanishq_1.gif" alt="Mia by Tanishq"> Mia by Tanishq</a></td>
    <td>Retail</td>
    <td>Rs. 50Lakh - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/gocolors.gif" alt="Go Colors"> Go Colors</a></td>
    <td>Retail</td>
    <td>Rs. 40+ Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/blinkit.75501">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/blinkit_1.png" alt="Blinkit"> Blinkit</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/masaba.gif" alt="House of Masaba"> House of Masaba</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/tyaani.gif" alt="Tyaani"> Tyaani</a></td>
    <td>Retail</td>
    <td>Rs. 4 Cr. Onwards</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>20</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nykd-by-nykaa.78545">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/nykd-by-nykaa_1.gif" alt="Nykd By Nykaa"> Nykd By Nykaa</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-clothing.ssc560" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-clothing.ssc560" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>21</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/melorra.86694">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/melorra_1.gif" alt="Melorra"> Melorra</a></td>
    <td>Retail</td>
    <td>Rs. 2 Cr - 5 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>22</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Home-Lane.18892">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Home-Lane_1.gif" alt="Home Lane"> Home Lane</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>23</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/zepto.86000">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/zepto_1.gif" alt="Zepto"> Zepto</a></td>
    <td>Retail</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>24</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/prakruthi.gif" alt="Prakruthi">Prakruthi</a></td>
    <td>Retail</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>25</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/hippo.gif" alt="Hippo Stores">Hippo Stores</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/building-material-stores.ssc221" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/building-material-stores.ssc221" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


<tr>
    <td>26</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/puma.gif" alt="Puma"> Puma</a></td>
    <td>Retail</td>
    <td>Rs. 40 Lac - 60 Lac</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>27</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/reebok.gif" alt="Reebok"> Reebok</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>

<tr>
    <td>28</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="https://www.franchiseindia.com/images/top-100-brand-logos/2024/elle.gif" alt="Elle Décor Kitchens"> Elle Décor Kitchens</a></td>
    <td>Retail</td>
    <td>Rs. 40 Lakh - 2 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>


  </table>
</div>
<!-- Retail ends-->


<!-- tab closing div -->
</div>

<!-- final closing div -->
</div>




<!-- Year 2024 End-->




<!-- Year 2023 -->

<div id="year2023" role="tabpanel" class="tab-pane">

<div class="top-hundred">
    <br>
<h1>Top 100 Franchise 2024</h1>
<p>Revealing brand impact, consumer value, and dynamic opportunities. Explore trends in Indian franchises, including global giants and emerging innovators. Rankings consider financial strength, expansion, growth rate, and success, reflecting a distinct identity, robust planning, support, innovation, and cultural sensitivity. This analysis assists franchisees and franchisors alike, offering insights into the franchise sector that underpin thriving business ventures.</p>
<a data-target="#topFranchise" data-toggle="modal">Understand Selection Criteria</a>
</div>


<!-- Top 100 franchises -->
<div class="top-hundred-tab">
<h3>Browse Top 100 franchises by category</h3>
<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#all"><img src="{{ url('images/top100/brands.svg') }}" alt=""> <span>All</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#automotive1"><img src="{{ url('images/top100/automotive.svg') }}" alt=""> <span>Automotive</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#beauty1"><img src="{{ url('images/top100/beauty.svg') }}" alt=""> <span>Beauty &<br> Health</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#business1"><img src="{{ url('images/top100/business.svg') }}" alt=""> <span>Business<br> Services</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#dealers1"><img src="{{ url('images/top100/dealers.svg') }}" alt=""> <span>Dealers &<br> Distributors</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#education1"><img src="{{ url('images/top100/education.svg') }}" alt=""> <span>Education</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#fashion1"><img src="{{ url('images/top100/fashion.svg') }}" alt=""> <span>Fashion</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#food1"><img src="{{ url('images/top100/food.svg') }}" alt=""> <span>Food And<br> Beverage</span></a></li>
<!-- <li role="presentation"><a role="tab" data-toggle="tab" href="#home1"><img src="{{ url('images/top100/homebusiness.svg') }}" alt=""> <span>Home Based<br> Business</span></a></li> -->
<li role="presentation"><a role="tab" data-toggle="tab" href="#hotel1"><img src="{{ url('images/top100/hotel.svg') }}" alt=""> <span>Hotel, Travel<br> & Tourism</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#retail1"><img src="{{ url('images/top100/retail.svg') }}" alt=""> <span>Retail</span></a></li>
<!-- <li role="presentation"><a role="tab" data-toggle="tab" href="#sports1"><img src="{{ url('images/top100/sports.svg') }}" alt=""> <span>Sports, Fitness &<br> Entertainment</span></a></li> -->
</ul>
</div>



<!-- Tab Content -->
<div class="tab-content">


<!-- All -->
<div id="all" role="tabpanel" class="tab-pane active">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mahindra-first-choice-services.29348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mahindra-first-choice-services_1.gif" alt=""> Mahindra First Choice Services Ltd.</a></td>
    <td>Automotive</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

</td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/3M-Car-Care.21349"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/car.gif" alt="3M Car Care logo">3M Car Care</a></td>
    <td>Automotive</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/5k-car-care-pvt-ltd.57920"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/5k-car-care-pvt-ltd_1.jpg" alt="5K CAR CARE logo">5K CAR CARE</a></td>
    <td>Automotive</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hero-elect.gif') }}" alt="Hero Electric logo">Hero Electric</a></td>
    <td>Automotive</td>
    <td>Rs. 40 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>



<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/quantum-energy-limited.79701"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/quantum-energy-limited_1.png" alt="Quantum Energy logo">Quantum Energy</a></td>
    <td>Automotive</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>

<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs logo">Dr Lal Path Labs</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="LakmeLever Pvt Ltd">Lakme Salon</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/metropolis-healthcare.64040"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/metropolis-healthcare_1.jpg" alt="Metropolis Healthcare logo">Metropolis Healthcare</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Naturals-Salons.14092"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/naturals199.gif" alt="Naturals Salon & Spa logo">Naturals Salon & Spa</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty logo">VLCC School of Beauty</a></td>
    <td>Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics logo">Apollo Diagnostics</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/color-bar.58162"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/color-bar_1.jpg" alt="Color Bar">Color Bar</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/thyrocare-technologies-ltd.63413"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/thyrocare-technologies-ltd_1.jpg" alt="Thyrocare logo">Thyrocare</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/beardo.70927"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/beardo_1.jpg" alt="Beardo">Beardo</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mma.gif') }}" alt="MMA Matrix logo">MMA Matrix</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 1.5 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-man-company.68137"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-man-company_1.jpg" alt="The Man Company logo">The Man Company</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/toothsi-skinnsi.80279"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/toothsi-skinnsi_1.jpg" alt="Toothsi | Skinnsi logo">Toothsi | Skinnsi</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>

<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/anytime-fitness.51366"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness logo">Anytime Fitness</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>

<tr>
    <td>20</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/golds-gym.1009"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Gold%27s-Gym.gif" alt=">Gold’s Gym logo">Gold’s Gym</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>

<tr>
    <td>21</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC logo">DTDC</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>

<tr>
    <td>22</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean logo">U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>23</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee logo">Vakrangee</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>24</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/delhivery.28935">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/delhivery_1.jpg" alt="Delhivery logo">Delhivery</a></td>
    <td>Business Services</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>25</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="{{ url('images/top100/brands/innov8.gif') }}" alt="Innov8 logo">Innov8</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>26</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="{{ url('images/top100/brands/kotak-sec.gif') }}" alt="Kotak Securities">Kotak Securities</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td> <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>27</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/livspace-3367">
        <img src="https://img.franchiseindia.com/brands/logo/livspace_1.jpg" alt="Livspace logo">Livspace</a></td>
    <td>Dealers & Destributors</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/home-furnishing-items" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/home-furnishing-items" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>

    </td>
</tr>
<tr>
    <td>28</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/Stellar-Green20-2094">
        <img src="https://img.franchiseindia.com/brands/logo/865168452.jpg" alt="Stellar logo">Stellar</a></td>
    <td>Dealers & Destributors</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
         <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
   </td>
</tr>
<tr>
    <td>29</td>
    <td><a target="_blank" href="https://www.dealerindia.com/">
        <img src="{{ url('images/top100/brands/loom.gif') }}" alt="Loom Solar logo">Loom Solar</a></td>
    <td>Dealers & Destributors</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>

<tr>
    <td>30</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee logo"> Kidzee</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>30</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/KumonIndia-Education.18075"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Kumon-Logo.gif" alt="KUMON logo"> KUMON</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>32</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/CAREER-LAUNCHER.19103"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/career(199x81).gif " alt="Career Launcher"> Career Launcher</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/competitive-exam-coaching-institute.ssc89" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/competitive-exam-coaching-institute.ssc89" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>33</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids logo"> Eurokids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>34</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/podar-jumbo-kids.35838"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/podar-jumbo-kids_2.png" alt="Podar Jumbo Kids logo"> Podar Jumbo Kids</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>35</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/bhaichung.gif') }}" alt="Bhaichung Bhutia Football School"> Bhaichung Bhutia Football School</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>36</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/drs-kids.72963"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/drs-kids_1.jpg" alt="MDN Edify Education logo"> MDN Edify Education</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
  </td>
</tr>
<tr>
    <td>37</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mt-litera.gif') }}" alt="Mount Litera Zee Schools logo"> Mount Litera Zee Schools</a></td>
    <td>Education</td>
    <td>Rs. 10 Cr. - 20 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>38</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/g-d-goenka-public-school.71392"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/g-d-goenka-public-school_1.jpg" alt="G D GOENKA PUBLIC SCHOOL logo"> G D GOENKA PUBLIC SCHOOL</a></td>
    <td>Education</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>39</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87"><img src="{{ url('images/top100/brands/mahesh.gif') }}" alt="Mahesh Bhupathi Tennis Academy logo"> Mahesh Bhupathi Tennis Academy</a></td>
    <td>Education</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>40</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mickey-arthur-early-learning-cricket-centre.74194"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mickey-arthur-early-learning-cricket-centre_1.jpg" alt="Mickey Arthur Early Learning Cricket Center logo"> Mickey Arthur Early Learning Cricket</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
  </td>
</tr>

<tr>
    <td>41</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/upgard.gif') }}" alt="Upgrad logo">Upgrad</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 lacc</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>

<tr>
    <td>42</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/and.gif') }}" alt="AND logo">AND</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>43</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata logo">Bata</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>44</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="FirstCry">FirstCry</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>45</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/jockey.gif') }}" alt="Jockey logo">Jockey</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="desklink">View more</a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>46</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart logo">Lenskart</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>47</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Levis-Strauss-India.886"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Levis-Strauss-India_1.jpg" alt="Levi's logo">Levi's</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>48</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd logo">Liberty Shoes Ltd</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>49</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/LOUIS-PHILLIPE.gif" alt="Louis Philippe logo">Louis Philippe</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>



    <td>50</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/raymonds.75150"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/raymonds_1.jpg" alt="Raymonds logo">Raymonds</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

</table>
<table class="table-striped table-responsive top-table moretext1" style="display: none;">
<tr>
    <td>51</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/samsonite.gif') }}" alt="Samsonite logo">Samsonite</td>
    <td>Fashion</td>
    <td>Rs. 15 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
 </td>
</tr>
<tr>
    <td>52</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk logo">Siyaram Silk</td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>53</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus logo">Titan Eye Plus</td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>54</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/vip.gif') }}" alt="VIP Bags logo">VIP Bags</td>
    <td>Fashion</td>
    <td>Rs. 15 Lac - 25 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>55</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/baggit.73455"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/baggit_1.jpg" alt="Baggit India logo">Baggit India</td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
       </td>
</tr>
<tr>
    <td>56</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo">Easybuy</td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
</tr>
<tr>
    <td>57</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/khadim.64592"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/khadim_1.jpg" alt="Khadim's logo">Khadim's</td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>58</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="MANYAVAR logo">MANYAVAR</td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>59</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/us-polo.gif') }}" alt="U.S. Polo logo">U.S. Polo</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
     </td>
</tr>
<tr>
    <td>60</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TCNS-CLOTHING.gif" alt="TCNS CLOTHING logo">TCNS CLOTHING</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
     </td>
</tr>
<tr>
    <td>61</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/zivame.gif') }}" alt="Zivame logo">Zivame</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>62</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/adidas.gif') }}" alt="Adidas logo">Adidas</td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
 </td>
</tr>
<tr>
    <td>63</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Puma-Logo.gif" alt="PUMA logo">PUMA</td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>64</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Skechers-India.13899"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/skechers.gif" alt="Skechers logo">Skechers</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>65</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL (GCMF LTD) logo">AMUL (GCMF LTD)</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>66</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista logo">Barista</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>67</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins logo">Baskin Robbins</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
     </td>
</tr>
<tr>
    <td>68</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/haldiram-bhujiawala-ltd.58200"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/haldiram-bhujiawala-ltd_1.gif" alt="HALDIRAM BHUJIAWALA logo">HALDIRAM BHUJIAWALA</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>69</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nestle.83010"><img src="{{ url('images/top100/brands/maggie-hotspot.gif') }}" alt="MAGGI Hotspot logo">MAGGI Hotspot</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 10 lac - 15 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>70</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nestle.83010"><img src="{{ url('images/top100/brands/nescafe.gif') }}" alt="Nescafe Kiosk logo">Nescafe Kiosk</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 10 lac - 15 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>71</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/dhaba.gif') }}" alt="Dhaba by Claridges logo">Dhaba by Claridges</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 1.5 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>72</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mamagoto.gif') }}" alt="Mamagoto logo">Mamagoto</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 1.5 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>73</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/punjabi-by-nature.74540"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/punjabi-by-nature_1.jpg" alt="Punjabi by Nature logo">Punjabi by Nature</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
     </td>
</tr>
<tr>
    <td>74</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/chai-garam.36959"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/chai-garam_1.png" alt="Chai Garam">Chai Garam</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
     </td>
</tr>
<tr>
    <td>75</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="Cloud Dhaba">Cloud Dhaba</a></td>
    <td>Food & Beverage</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>76</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/dominios.gif') }}" alt="Dominos">Dominos</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 30 lac - 35 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>77</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/figaros-pizza.73238"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/figaros-pizza_1.jpg" alt="Figaro's Italian Pizza">Figaro's Italian Pizza</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>78</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd.">Subway Systems India (P) Ltd.</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>79</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/MAKEMYTRIP.gif" alt="MAKEMYTRIP"> MAKEMYTRIP</a></td>
    <td> Hotel, Travel & Tourism</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
 </td>
</tr>
<tr>
    <td>80</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/babai.gif') }}" alt="Babai Hotels"> Babai Hotels</a></td>
    <td> Hotel, Travel & Tourism</td>
    <td>Rs. 1 Cr. - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>81</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hayatt.gif') }}" alt="Hyatt">Hyatt</a></td>
    <td> Hotel, Travel & Tourism</td>
    <td>Rs. 4 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>82</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/croma.58113"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/croma_1.gif" alt="Croma"> Croma</a></td>
    <td>Retail</td>
    <td>Rs. 5 Cr. - 10 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
 </td>
</tr>
<tr>
    <td>83</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals"> Ferns 'N' Petals</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>84</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/GodrejInterio-123.8762"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/GodrejInterio-123_1.jpg" alt="Godrej Interio"> Godrej Interio</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>85</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/tanishq.gif') }}" alt="TANISHQ"> TANISHQ</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>86</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige"> TTK Prestige</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>87</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone"> BlueStone</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
     </td>
</tr>
<tr>
    <td>88</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/caratlane.gif') }}" alt="Caratlane"> Caratlane</a></td>
    <td>Retail</td>
    <td>Rs. 60 lac - 80 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>89</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fortune-mart.66348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fortune-mart_1.jpg" alt="Adani Wilmar Ltd."> Adani Wilmar Ltd.</a></td>
    <td>Retail</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>90</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/joya.gif') }}" alt="Joyalukkas"> Joyalukkas</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
  </td>
</tr>
<tr>
    <td>91</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mai-tq.gif') }}" alt="Mia by Tanishq"> Mia by Tanishq</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac to 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
   </td>
</tr>
<tr>
    <td>92</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry"> Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>93</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Red-Chief.22593"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Red-Chief_1.jpg" alt="Red Chief"> Red Chief</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>94</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/rockingdeals.68165"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/rockingdeals_1.jpg" alt="RockingDeals"> RockingDeals</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/other-electronics-electrical-prod.ssc185" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/other-electronics-electrical-prod.ssc185" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>95</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/deepa.gif') }}" alt="Deepa's Reading Room"> Deepa's Reading Room</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/book-stores.ssc197" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/book-stores.ssc197" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>96</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/heads-up.gif') }}" alt="Heads up For Tails"> Heads up For Tails</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>97</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso"> Miniso</a></td>
    <td>Retail</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
</tr>
<tr>
    <td>98</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-new-shop.78544"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-new-shop_1.png" alt="The New Shop"> The New Shop</a></td>
    <td>Retail</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/department-convenience-stores.ssc187" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/department-convenience-stores.ssc187" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </a>
    </td>
</tr>
<tr>
    <td>99</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/voylla.61635"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/voylla_1.jpg" alt="Voylla"> Voylla</a></td>
    <td>Retail</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>100</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/wooden-street.59330"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/wooden-street_1.jpg" alt="WOODEN STREET"> WOODEN STREET</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>


</table>
<a class="load_more moreless-button1">Load more »</a>
</div>
<!-- all -->

<!-- Automotive -->
<div id="automotive1" role="tabpanel" class="tab-pane ">
<table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mahindra-first-choice-services.29348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mahindra-first-choice-services_1.gif" alt=""> Mahindra First Choice Services Ltd.</a></td>
    <td>Automotive</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/3M-Car-Care.21349"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/car.gif" alt="3M CAR CARE">3M Car Care</a></td>
    <td>Automotive</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/5k-car-care-pvt-ltd.57920"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/5k-car-care-pvt-ltd_1.jpg" alt="">5K CAR CARE</a></td>
    <td>Automotive</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hero-elect.gif') }}" alt="Hero Electric logo">Hero Electric</a></td>
    <td>Automotive</td>
    <td>Rs. 40 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/quantum-energy-limited.79701"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/quantum-energy-limited_1.png" alt="Quantum Energy logo">Quantum Energy</a></td>
    <td>Automotive</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
  <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ssc358" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
</table>

</div>
<!-- Automotive -->


<div id="beauty1" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs logo">Dr Lal Path Labs</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="LakmeLever Pvt Ltd">Lakme Salon</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/metropolis-healthcare.64040"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/metropolis-healthcare_1.jpg" alt="Metropolis Healthcare logo">Metropolis Healthcare</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Naturals-Salons.14092"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/naturals199.gif" alt="Naturals Salon & Spa logo">Naturals Salon & Spa</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics logo">Apollo Diagnostics</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/color-bar.58162"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/color-bar_1.jpg" alt="Color Bar">Color Bar</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/thyrocare-technologies-ltd.63413"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/thyrocare-technologies-ltd_1.jpg" alt="Thyrocare logo">Thyrocare</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/beardo.70927"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/beardo_1.jpg" alt="Beardo">Beardo</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mma.gif') }}" alt="MMA Matrix logo">MMA Matrix</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 1.5 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-man-company.68137"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-man-company_1.jpg" alt="The Man Company logo">The Man Company</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/toothsi-skinnsi.80279"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/toothsi-skinnsi_1.jpg" alt="Toothsi | Skinnsi logo">Toothsi | Skinnsi</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/anytime-fitness.51366"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness logo">Anytime Fitness</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/golds-gym.1009"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Gold%27s-Gym.gif" alt=">Gold’s Gym logo">Gold’s Gym</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>

    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>


</table>

</div>
<!-- Beauty & Health -->



<!-- Business -->
<div id="business1" role="tabpanel" class="tab-pane">
<table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC logo">DTDC</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean logo">U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee logo">Vakrangee</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/delhivery.28935">
        <img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/delhivery_1.jpg" alt="Delhivery logo">Delhivery</a></td>
    <td>Business Services</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="{{ url('images/top100/brands/innov8.gif') }}" alt="Innov8 logo">Innov8</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all">
        <img src="{{ url('images/top100/brands/kotak-sec.gif') }}" alt="Kotak Securities">Kotak Securities</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

</table>

</div>
<!-- Business -->




<!-- Dealer & Distributors -->
<div id="dealers1" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/livspace-3367">
        <img src="https://img.franchiseindia.com/brands/logo/livspace_1.jpg" alt="Livspace logo">Livspace</a></td>
    <td>Dealers & Destributors</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/home-furnishing-items" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.dealerindia.com/dir/home-furnishing-items" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
     </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/Stellar-Green20-2094">
        <img src="https://img.franchiseindia.com/brands/logo/865168452.jpg" alt="Stellar logo">Stellar</a></td>
    <td>Dealers & Destributors</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
    <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="moblink">
      <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.dealerindia.com/">
        <img src="{{ url('images/top100/brands/loom.gif') }} " alt="Loom Solar logo">Loom Solar</a></td>
    <td>Dealers & Destributors</td>
    <td>Rs. 5 lac - 10 lac</td>

    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="moblink">
           <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>

</table>

</div>
<!-- Dealer -->



<!-- Education -->
<div id="education1" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee logo"> Kidzee</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/KumonIndia-Education.18075"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Kumon-Logo.gif" alt="KUMON logo"> KUMON</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
      </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/CAREER-LAUNCHER.19103"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/career(199x81).gif " alt="Career Launcher"> Career Launcher</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/competitive-exam-coaching-institute.ssc89" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/competitive-exam-coaching-institute.ssc89" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids logo"> Eurokids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/podar-jumbo-kids.35838"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/podar-jumbo-kids_2.png" alt="Podar Jumbo Kids logo"> Podar Jumbo Kids</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/bhaichung.gif') }}" alt="Bhaichung Bhutia Football School"> Bhaichung Bhutia Football School</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
       </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/drs-kids.72963"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/drs-kids_1.jpg" alt="MDN Edify Education logo"> MDN Edify Education</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mt-litera.gif') }}" alt="Mount Litera Zee Schools logo"> Mount Litera Zee Schools</a></td>
    <td>Education</td>
    <td>Rs. 10 Cr. - 20 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/g-d-goenka-public-school.71392"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/g-d-goenka-public-school_1.jpg" alt="G D GOENKA PUBLIC SCHOOL logo"> G D GOENKA PUBLIC SCHOOL</a></td>
    <td>Education</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
     </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87"><img src="{{ url('images/top100/brands/mahesh.gif') }}" alt="Mahesh Bhupathi Tennis Academy logo"> Mahesh Bhupathi Tennis Academy</a></td>
    <td>Education</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mickey-arthur-early-learning-cricket-centre.74194"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mickey-arthur-early-learning-cricket-centre_1.jpg" alt="Mickey Arthur Early Learning Cricket Center logo"> Mickey Arthur Early Learning Cricket</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
</td>
</tr>

<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/upgard.gif') }}" alt="Upgrad logo">Upgrad</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 lacc</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
</td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty logo">VLCC School of Beauty</a></td>
    <td>Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

</table>

</div>
<!-- Education -->



<!-- Fashion -->
<div id="fashion1" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/and.gif') }}" alt="AND logo">AND</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
      </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata logo">Bata</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="FirstCry">FirstCry</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/jockey.gif') }}" alt="Jockey logo">Jockey</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart logo">Lenskart</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Levis-Strauss-India.886"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Levis-Strauss-India_1.jpg" alt="Levi's logo">Levi's</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd logo">Liberty Shoes Ltd</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
        View more
    </a>
     <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/LOUIS-PHILLIPE.gif" alt="Louis Philippe logo">Louis Philippe</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
       </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/raymonds.75150"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/raymonds_1.jpg" alt="Raymonds logo">Raymonds</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/samsonite.gif') }}" alt="Samsonite logo">Samsonite</td>
    <td>Fashion</td>
    <td>Rs. 15 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk logo">Siyaram Silk</td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus logo">Titan Eye Plus</td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/vip.gif') }}" alt="VIP Bags logo">VIP Bags</td>
    <td>Fashion</td>
    <td>Rs. 15 Lac - 25 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/baggit.73455"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/baggit_1.jpg" alt="Baggit India logo">Baggit India</td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/luggage-and-hand-bags.ssc247" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo">Easybuy</td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/khadim.64592"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/khadim_1.jpg" alt="Khadim's logo">Khadim's</td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="MANYAVAR logo">MANYAVAR</td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/us-polo.gif') }}" alt="U.S. Polo logo">U.S. Polo</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
 </td>
</tr>
<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TCNS-CLOTHING.gif" alt="TCNS CLOTHING logo">TCNS CLOTHING</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>20</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/zivame.gif') }}" alt="Zivame logo">Zivame</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
   </td>
</tr>

<tr>
    <td>21</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/adidas.gif') }}" alt="Adidas logo">Adidas</td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casuals.ssc235" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>22</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Puma-Logo.gif" alt="PUMA logo">PUMA</td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>23</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Skechers-India.13899"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/skechers.gif" alt="Skechers logo">Skechers</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

</table>

</div>
<!-- Fashion -->



<!--FOOD & BEVERAGE -->
<div id="food1" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL (GCMF LTD) logo">AMUL (GCMF LTD)</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista logo">Barista</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins logo">Baskin Robbins</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/haldiram-bhujiawala-ltd.58200"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/haldiram-bhujiawala-ltd_1.gif" alt="HALDIRAM BHUJIAWALA logo">HALDIRAM BHUJIAWALA</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nestle.83010"><img src="{{ url('images/top100/brands/maggie-hotspot.gif') }}" alt="MAGGI Hotspot logo">MAGGI Hotspot</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 10 lac - 15 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nestle.83010"><img src="{{ url('images/top100/brands/nescafe.gif') }}" alt="Nescafe Kiosk logo">Nescafe Kiosk</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 10 lac - 15 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
     </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/dhaba.gif') }}" alt="Dhaba by Claridges logo">Dhaba by Claridges</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 1.5 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mamagoto.gif') }}" alt="Mamagoto logo">Mamagoto</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 1.5 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
 </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/punjabi-by-nature.74540"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/punjabi-by-nature_1.jpg" alt="Punjabi by Nature logo">Punjabi by Nature</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/chai-garam.36959"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/chai-garam_1.png" alt="Chai Garam">Chai Garam</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="Cloud Dhaba">Cloud Dhaba</a></td>
    <td>Food & Beverage</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/dominios.gif') }}" alt="Dominos">Dominos</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 30 lac - 35 lac</td>
    <td>

        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/figaros-pizza.73238"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/figaros-pizza_1.jpg" alt="Figaro's Italian Pizza">Figaro's Italian Pizza</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fine-dine-restaurants.ssc431" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd.">Subway Systems India (P) Ltd.</a></td>
    <td>Food & Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

</table>

</div>
<!-- food -->





<!-- Hotel, Travel & Tourism -->
<div id="hotel1" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/MAKEMYTRIP.gif" alt="MAKEMYTRIP"> MAKEMYTRIP</a></td>
    <td> Hotel, Travel & Tourism</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/babai.gif') }}" alt="Babai Hotels"> Babai Hotels</a></td>
    <td> Hotel, Travel & Tourism</td>
    <td>Rs. 1 Cr. - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hayatt.gif') }}" alt="Hyatt">Hyatt</a></td>
    <td> Hotel, Travel & Tourism</td>
    <td>Rs. 4 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

</table>

</div>
<!--  Hotel, Travel & Tourism -->



<!-- retail -->
<div id="retail1" role="tabpanel" class="tab-pane">
   <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/croma.58113"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/croma_1.gif" alt="Croma"> Croma</a></td>
    <td>Retail</td>
    <td>Rs. 5 Cr. - 10 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals"> Ferns 'N' Petals</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/GodrejInterio-123.8762"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/GodrejInterio-123_1.jpg" alt="Godrej Interio"> Godrej Interio</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/tanishq.gif') }}" alt="TANISHQ"> TANISHQ</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige"> TTK Prestige</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone"> BlueStone</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/caratlane.gif') }}" alt="Caratlane"> Caratlane</a></td>
    <td>Retail</td>
    <td>Rs. 60 lac - 80 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fortune-mart.66348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fortune-mart_1.jpg" alt="Adani Wilmar Ltd."> Adani Wilmar Ltd.</a></td>
    <td>Retail</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/joya.gif') }}" alt="Joyalukkas"> Joyalukkas</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mai-tq.gif') }}" alt="Mia by Tanishq"> Mia by Tanishq</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac to 50 lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry"> Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Red-Chief.22593"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Red-Chief_1.jpg" alt="Red Chief"> Red Chief</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/rockingdeals.68165"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/rockingdeals_1.jpg" alt="RockingDeals"> RockingDeals</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/other-electronics-electrical-prod.ssc185" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/other-electronics-electrical-prod.ssc185" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/deepa.gif') }}" alt="Deepa's Reading Room"> Deepa's Reading Room</a></td>
    <td>Retail</td>
    <td>N/A</td>
    <td>

        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/book-stores.ssc197" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/book-stores.ssc197" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/heads-up.gif') }}" alt="Heads up For Tails"> Heads up For Tails</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td> <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso"> Miniso</a></td>
    <td>Retail</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-new-shop.78544"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-new-shop_1.png" alt="The New Shop"> The New Shop</a></td>
    <td>Retail</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/department-convenience-stores.ssc187" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/department-convenience-stores.ssc187" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </a>
    </td>
</tr>
<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/voylla.61635"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/voylla_1.jpg" alt="Voylla"> Voylla</a></td>
    <td>Retail</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/wooden-street.59330"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/wooden-street_1.jpg" alt="WOODEN STREET"> WOODEN STREET</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>


</table>

</div>
<!-- retail -->




</div>
<!-- Tab Content -->


</div>
<!-- Year 2023 active Tab Content end-->




<!-- Year 2022 -->

<div id="year2022" role="tabpanel" class="tab-pane">

<div class="top-hundred">
    <br>
<h1>Top 100 Franchise/Franchisor 2022</h1>
<p>Revealing brand impact, consumer value, and dynamic opportunities. Explore trends in Indian franchises, including global giants and emerging innovators. Rankings consider financial strength, expansion, growth rate, and success, reflecting a distinct identity, robust planning, support, innovation, and cultural sensitivity. This analysis assists franchisees and franchisors alike, offering insights into the franchise sector that underpin thriving business ventures.</p>
<a data-target="#topFranchise" data-toggle="modal">Understand Selection Criteria</a>
</div>


<!-- Top 100 franchises -->
<div class="top-hundred-tab">
<h3>Browse Top 100 franchises by category</h3>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#all2"><img src="{{ url('images/top100/brands.svg') }}" alt=""> <span>All</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#automotive2"><img src="{{ url('images/top100/automotive.svg') }}" alt=""> <span>Automotive</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#beauty2"><img src="{{ url('images/top100/beauty.svg') }}" alt=""> <span>Beauty &<br> Health</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#business2"><img src="{{ url('images/top100/business.svg') }}" alt=""> <span>Business<br> Services</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#dealers2"><img src="{{ url('images/top100/dealers.svg') }}" alt=""> <span>Dealers &<br> Distributors</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#education2"><img src="{{ url('images/top100/education.svg') }}" alt=""> <span>Education</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#fashion2"><img src="{{ url('images/top100/fashion.svg') }}" alt=""> <span>Fashion</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#food2"><img src="{{ url('images/top100/food.svg') }}" alt=""> <span>Food And<br> Beverage</span></a></li>
<!-- <li role="presentation"><a role="tab" data-toggle="tab" href="#home1"><img src="{{ url('images/top100/homebusiness.svg') }}" alt=""> <span>Home Based<br> Business</span></a></li> -->
<li role="presentation"><a role="tab" data-toggle="tab" href="#hotel2"><img src="{{ url('images/top100/hotel.svg') }}" alt=""> <span>Hotel, Travel<br> & Tourism</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#retail2"><img src="{{ url('images/top100/retail.svg') }}" alt=""> <span>Retail</span></a></li>
<!-- <li role="presentation"><a role="tab" data-toggle="tab" href="#sports1"><img src="{{ url('images/top100/sports.svg"') }} alt=""> <span>Sports, Fitness &<br> Entertainment</span></a></li> -->
</ul>
</div>



<!-- Tab Content -->
<div class="tab-content">

    <!-- All -->
<div id="all2" role="tabpanel" class="tab-pane active">
    <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hero-elect.gif') }}" alt="Hero Electric"> Hero Electric</a></td>
        <td>Automotive</td>
        <td>Rs. 40 Lac - 1 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

        </td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/mahindra-first-choice-services.29348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mahindra-first-choice-services_1.gif" alt="Mahindra First Choice Services Ltd.">Mahindra First Choice Services Ltd.</a></td>
        <td>Automotive</td>
        <td>Rs. 50 Lac - 1 Crc</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
  </td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/credar.68223"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/credar_1.jpg" alt="Credr">Credr</a></td>
        <td>Automotive</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics"> Apollo Diagnostics</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 10 K - 50 K</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>

    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs"> Dr Lal Path Labs</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 50 K - 2 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
    </tr>

    <tr>
        <td>6</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/jawed-habib-hair-and-beauty-limited.74924"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jawed-habib-hair-and-beauty-limited_1.jpg" alt="JAWED HABIB HAIR AND BEAUTY LIMITED"> JAWED HABIB HAIR AND BEAUTY LIMITED</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>

        </td>
    </tr>

    <tr>
        <td>7</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="Lakme Salon"> Lakme Salon</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>

    <tr>
        <td>8</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty"> VLCC School of Beauty</a></td>
        <td>Education</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>

    <tr>
        <td>9</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/1mg.30137"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/1mg_1.jpg" alt="1mg.com"> 1mg.com</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 10 K - 50 K</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
          </td>
    </tr>

    <tr>
        <td>10</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/juice-hair-marketing-pvt-ltd.49087"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/juice-hair-marketing-pvt-ltd_1.jpg" alt="JUICE"> JUICE</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 30 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
            </td>
    </tr>

    <tr>
        <td>11</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus"> Titan Eye Plus</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 20 lac - 30 lac </td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>

    <tr>
        <td>12</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/beardo.70927"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/beardo_1.jpg" alt="Beardo"> Beardo</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 5 lac - 10 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>

    <tr>
        <td>13</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/celebrate-life.70557"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/celebrate-life_1.jpg" alt="Celebrate Life"> Celebrate Life</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>

    <tr>
        <td>14</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/fitq-india.70911"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fitq-india_1.jpg" alt="FitQ India"> FitQ India</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 5 lac - 10 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>

    <tr>
        <td>15</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/scentials.70492"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/scentials_1.jpg" alt="Scentials"> Scentials</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>

        </td>
    </tr>

    <tr>
        <td>16</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-man-company.68137"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-man-company_1.jpg" alt="The Man Company"> The Man Company</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>

    <tr>
        <td>17</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/zorgers.65340"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/zorgers_2.jpg" alt="Zorgers"> Zorgers</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 20 lac - 30 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>

    <tr>
        <td>18</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/house-of-fitness-pvt-ltd.51366"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness"> Anytime Fitness</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 2 Cr. - 5 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>

    <tr>
        <td>19</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/barry.gif') }}" alt="BARRY'S"> BARRY'S</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 3 Cr. - 5 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>

    <tr>
        <td>20</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/lay-bare.gif') }}" alt="LAY BARE"> LAY BARE</a></td>
        <td>Beauty & Health</td>
        <td>Rs. 20 lac - 30 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>

<tr>
    <td>21</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC"> DTDC</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>22</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee"> Vakrangee</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

</tr>
<tr>
    <td>23</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ceat.75354"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/ceat_1.jpg" alt="CEAT"> CEAT</a></td>
    <td>Business Services</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-spares-related.ssc368" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-spares-related.ssc368" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>24</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/delhivery.28935"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/delhivery_1.jpg" alt="Delhivery"> Delhivery</a></td>
    <td>Business Services</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
            </td>
</tr>
<tr>
    <td>25</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/kotak-sec.gif') }}" alt="Kotak Securities"> Kotak Securities</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="desklink">
            View more

        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
    </td>
</tr>
<tr>
    <td>26</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/shadowfax-technologies-private-limited.57551"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/shadowfax-technologies-private-limited_1.gif" alt="Shadowfax Technologies"> Shadowfax Technologies</a></td>
    <td>Business Services</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
</tr>
<tr>
    <td>27</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/talent-corner-hr.742"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/talent-corner-hr_2.jpg" alt="Talent Corner HR Services"> Talent Corner HR Services</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hr-recruitment.ssc161" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hr-recruitment.ssc161" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
   </td>
</tr>
<tr>
    <td>28</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/xpressbees.76825"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/xpressbees_1.png" alt="Xpressbees"> Xpressbees</a></td>
    <td>Business Services</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
</td>
</tr>
<tr>
    <td>29</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/actioncoach.30037"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/actioncoach_1.jpg" alt="ActionCOACH"> ActionCOACH</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>30</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Inxpress-DHL.10505"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Inxpress-DHL_2.jpg" alt="Inxpress"> Inxpress</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>31</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/regus.61289"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/regus_2.jpg" alt="IWG, Plc"> IWG, Plc</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Cr. onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>32</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mr-jeff.65333"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mr-jeff_1.jpg" alt="Mr Jeff"> Mr Jeff</a></td>
    <td>Business Services</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>33</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/remax(199x81).gif" alt="REMAX INDIA"> REMAX INDIA</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>34</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean"> U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
  </td>
</tr>
<tr>
    <td>35</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/a2z-medicals-su-3402"><img src="https://img.franchiseindia.com/brands/logo/808682587.jpg" alt="A2Z Medicals & Surgicals"> A2Z Medicals & Surgicals</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/pcd-pharma" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/pcd-pharma" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>36</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/enggific-engineering-scientific-29320102"><img src="https://img.franchiseindia.com/brands/logo/682998394.jpg" alt=" ENGGIFIC Engineering & Scientific"> ENGGIFIC Engineering & Scientific</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 5 lac - 7 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/laboratory-equipments-instruments" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/laboratory-equipments-instruments" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>37</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/purefuel-energy.66167"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/purefuel-energy_1.jpg" alt="Purefuel Energy"> Purefuel Energy</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 90 Lac - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/oil-lubricants" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/oil-lubricants" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}" alt=""></a>
    </td>
</tr>
<tr>
    <td>38</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/skippi-ice-pops-29320012"><img src="https://img.franchiseindia.com/brands/logo/343549484.jpg" alt="Skippi Icepops"> Skippi Icepops</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/sweets-deserts" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/sweets-deserts" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}" alt=""></a>

    </td>
</tr>
<tr>
    <td>39</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids logo"> Eurokids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>40</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee logo"> Kidzee</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>41</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mt-litera.gif') }}" alt="Mount Litera Zee Schools logo"> Mount Litera Zee Schools</a></td>
    <td>Education</td>
    <td>Rs. 10 Cr. - 20 Cr. </td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>42</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/little-elly.28951"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/little-elly_1.jpg" alt="Little Elly"> Little Elly</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>43</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/upgard.gif') }}" alt="Upgrad"> Upgrad</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>44</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/vedantu.67008"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vedantu_1.jpg" alt="Vedantu"> Vedantu</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-coaching.ssc90" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-coaching.ssc90" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>45</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/peepal-tree.73656"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/SKILLS-India_1.jpg" alt="EDUMETA THE i-SCHOOL"> EDUMETA THE i-SCHOOL</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>46</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/peepal-tree.73656"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/peepal-tree_1.jpg" alt="Peepal Tree Eduserve"> Peepal Tree Eduserve</a></td>
    <td>Education</td>
    <td>Rs. 20 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>47</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata"> Bata</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>48</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/biba.75331"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biba_1.jpg" alt="Biba"> Biba</a></td>
    <td>Fashion</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>49</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo"> Easybuy</a></td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>50</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/jockey.gif') }}" alt="Jockey"> Jockey</a></td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
</table>
<table class="table-striped table-responsive top-table moretext2" style="display: none;">
<tr>
    <td>51</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart"> Lenskart</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>52</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Levis-Strauss-India.886"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Levis-Strauss-India_1.jpg" alt="Levi's"> Levi's</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>53</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd"> Liberty Shoes Ltd</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>54</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="MANYAVAR logo"> MANYAVAR</a></td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>55</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/pepe-jeans.gif') }}" alt="Pepe Jeans"> Pepe Jeans</a></td>
    <td>Fashion</td>
    <td>Rs. 50 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>56</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/peter-eng.png') }}" alt="Peter England"> Peter England</a></td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>57</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk"> Siyaram Silk</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>58</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus.27833"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus_1.jpg" alt="Titan Company"> Titan Company</a></td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
</tr>
<tr>
    <td>59</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/united-color.gif') }}" alt="UNITED COLORS OF BENETTON"> UNITED COLORS OF BENETTON</a></td>
    <td>Fashion</td>
    <td>Rs. 50 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>60</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/baggit.73455"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/baggit_1.jpg" alt="Baggit India"> Baggit India</a></td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>61</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/c-k.gif') }}" alt="CALVIN KLEIN"> CALVIN KLEIN</a></td>
    <td>Fashion</td>
    <td>Rs. 1 Cr. - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>62</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/CLASSIC-POLO.15786"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/CLASSIC-POLO_1.jpg" alt="CLASSIC POLO"> CLASSIC POLO</a></td>
    <td>Fashion</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>63</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fabindia-limited.73515"><img src="{{ url('images/top100/brands/fab-india.gif') }}" alt="Fabindia"> Fabindia</a></td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>64</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fastrack.75799"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fastrack_1.gif" alt="Fastrack"> Fastrack</a></td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/watches.ssc340" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/watches.ssc340" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>65</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/u-a.gif') }}" alt="UNDER ARMOUR"> UNDER ARMOUR</a></td>
    <td>Fashion</td>
    <td>Rs. 3 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>66</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL (GCMF LTD)"> AMUL (GCMF LTD)</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>67</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista"> Barista</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>68</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins"> Baskin Robbins</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>69</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/bikanervala-foo-4400"><img src="https://img.franchiseindia.com/brands/logo/440510772.gif" alt="Bikanervala Foods Pvt Ltd"> Bikanervala Foods Pvt Ltd</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>70</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/99pancakes.75323"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/99pancakes_1.jpg" alt="99 Pancakes"> 99 Pancakes</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>71</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fresh-n-honest-coffee-point.33902"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fresh-n-honest-coffee-point_1.jpg" alt="Fresh & Honest Coffee Point"> Fresh & Honest Coffee Point</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>72</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/drunken-monkey.73442"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/drunken-monkey_1.jpg" alt="DRUNKEN MONKEY"> DRUNKEN MONKEY</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>73</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/lassi-and-shakes.33798"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/lassi-and-shakes_1.jpg" alt="Lassi And Shakes"> Lassi And Shakes</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>      </td>
</tr>
<tr>
    <td>74</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/marino.gif') }}" alt="MARINO"> MARINO</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>75</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/rasna-buzz.30285"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/rasna-buzz_1.gif" alt="Rasna Buzz"> Rasna Buzz</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>76</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/tea-post.72087"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/tea-post_1.jpg" alt="Tea Post"> Tea Post</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>77</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/dominios.gif') }}" alt="Dominos"> Dominos</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 lac - 35 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>78</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/KFC_199X81.gif" alt="KFC"> KFC</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 1.6 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>79</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/pizza-hut.gif') }}" alt="PIZZA HUT"> PIZZA HUT</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>80</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd."> Subway Systems India (P) Ltd.</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>81</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/shawarmer.67959"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/shawarmer_1.jpg" alt="Shawarmer"> Shawarmer</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>82</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/o-tacos.gif') }}" alt="O'TACOS"> O'TACOS</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>83</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hayatt.gif') }}" alt="Hyatt"> Hyatt</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 4 Cr. onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>84</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/wyndham.gif') }}" alt="Wyndham Hotels"> Wyndham Hotels</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>

<tr>
    <td>85</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals"> Ferns 'N' Petals</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>86</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/nike.gif') }}" alt="Nike"> Nike</a></td>
    <td>Retail</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a> </td>
</tr>
<tr>
    <td>87</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TANISHQ.gif" alt="TANISHQ"> TANISHQ</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>88</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige"> TTK Prestige</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>89</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/amazon-ez.gif') }}" alt="Amazon Easy Store"> Amazon Easy Store</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-and-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-and-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>90</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone"> BlueStone</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>91</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/croma.58113"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/croma_1.gif" alt="Croma"> Croma</a></td>
    <td>Retail</td>
    <td>Rs. 5 Cr. - 10 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>92</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Home-Lane.18892"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Home-Lane_1.gif" alt="Home Lane"> Home Lane</a></td>
    <td>Retail</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>93</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry"> Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>94</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/alcis.71815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/alcis_1.jpg" alt="Alcis"> Alcis</a></td>
    <td>Retail</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports-garments.ssc375" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports-garments.ssc375" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>95</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fortune-mart.66348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fortune-mart_1.jpg" alt="Adani Wilmar Ltd."> Adani Wilmar Ltd.</a></td>
    <td>Retail</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>96</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/pioneer.gif') }}" alt="PIONEER FURNITURE"> PIONEER FURNITURE</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 25 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>97</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso"> Miniso</a></td>
    <td>Retail</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
</tr>
<tr>
    <td>98</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Skechers-India.13899"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/skechers.gif" alt="Skechers"> Skechers</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>99</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Bombay-Dyeing.10978"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Bombay-Dyeing_1.jpg" alt="Bombay Dyeing"> Bombay Dyeing</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>100</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all "><img src="{{ url('images/top100/no-img.gif') }}" alt="PROPERTY"> PROPERTY</a></td>
    <td>Business Services</td>
    <td>2 Cr. Onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267 " class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267 " class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

</tr>

    </table>
    <a class="load_more moreless-button2">Load more »</a>
    </div>
    <!-- all -->

<!-- Automotive -->
<div id="automotive2" role="tabpanel" class="tab-pane">
<table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hero-elect.gif') }}" alt="Hero Electric"> Hero Electric</a></td>
    <td>Automotive</td>
    <td>Rs. 40 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mahindra-first-choice-services.29348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mahindra-first-choice-services_1.gif" alt="Mahindra First Choice Services Ltd.">Mahindra First Choice Services Ltd.</a></td>
    <td>Automotive</td>
    <td>Rs. 50 Lac - 1 Crc</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/credar.68223"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/credar_1.jpg" alt="Credr">Credr</a></td>
    <td>Automotive</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>


</table>

</div>
<!-- Automotive -->
<!-- Beauty & Health -->
<div id="beauty2" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics"> Apollo Diagnostics</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs"> Dr Lal Path Labs</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jawed-habib-hair-and-beauty-limited.74924"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jawed-habib-hair-and-beauty-limited_1.jpg" alt="JAWED HABIB HAIR AND BEAUTY LIMITED"> JAWED HABIB HAIR AND BEAUTY LIMITED</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="Lakme Salon"> Lakme Salon</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>



<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/1mg.30137"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/1mg_1.jpg" alt="1mg.com"> 1mg.com</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/juice-hair-marketing-pvt-ltd.49087"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/juice-hair-marketing-pvt-ltd_1.jpg" alt="JUICE"> JUICE</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus"> Titan Eye Plus</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 lac - 30 lac </td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </tr>

<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/beardo.70927"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/beardo_1.jpg" alt="Beardo"> Beardo</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/celebrate-life.70557"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/celebrate-life_1.jpg" alt="Celebrate Life"> Celebrate Life</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fitq-india.70911"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fitq-india_1.jpg" alt="FitQ India"> FitQ India</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</tr>

<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/scentials.70492"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/scentials_1.jpg" alt="Scentials"> Scentials</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-man-company.68137"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-man-company_1.jpg" alt="The Man Company"> The Man Company</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/zorgers.65340"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/zorgers_2.jpg" alt="Zorgers"> Zorgers</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="ttps://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="desklink">
            View more
        </a>
        <a target="_blank" href="ttps://www.franchiseindia.com/business-opportunities/clinics-nursing-homes.ssc56" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/house-of-fitness-pvt-ltd.51366"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness"> Anytime Fitness</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/barry.gif') }}" alt="BARRY'S"> BARRY'S</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 3 Cr. - 5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>

<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/lay-bare.gif') }}" alt="LAY BARE"> LAY BARE</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

</tr>



</table>

</div>
<!-- Beauty & Health -->
<!-- Business -->
<div id="business2" role="tabpanel" class="tab-pane">
<table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC"> DTDC</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee"> Vakrangee</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ceat.75354"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/ceat_1.jpg" alt="CEAT"> CEAT</a></td>
    <td>Business Services</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-spares-related.ssc368" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-spares-related.ssc368" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/delhivery.28935"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/delhivery_1.jpg" alt="Delhivery"> Delhivery</a></td>
    <td>Business Services</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
            </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/kotak-sec.gif') }}" alt="Kotak Securities"> Kotak Securities</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-and-brokers.ssc137" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/shadowfax-technologies-private-limited.57551"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/shadowfax-technologies-private-limited_1.gif" alt="Shadowfax Technologies"> Shadowfax Technologies</a></td>
    <td>Business Services</td>
    <td>Rs. 10 K - 50 K</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/talent-corner-hr.742"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/talent-corner-hr_2.jpg" alt="Talent Corner HR Services"> Talent Corner HR Services</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hr-recruitment.ssc161" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hr-recruitment.ssc161" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
   </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/xpressbees.76825"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/xpressbees_1.png" alt="Xpressbees"> Xpressbees</a></td>
    <td>Business Services</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
        </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/actioncoach.30037"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/actioncoach_1.jpg" alt="ActionCOACH"> ActionCOACH</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Inxpress-DHL.10505"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Inxpress-DHL_2.jpg" alt="Inxpress"> Inxpress</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/regus.61289"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/regus_2.jpg" alt="IWG, Plc"> IWG, Plc</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Cr. onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mr-jeff.65333"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mr-jeff_1.jpg" alt="Mr Jeff"> Mr Jeff</a></td>
    <td>Business Services</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/remax(199x81).gif" alt="REMAX INDIA"> REMAX INDIA</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean"> U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
  </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all "><img src="{{ url('images/top100/no-img.gif') }}" alt="PROPERTY"> PROPERTY</a></td>
    <td>Business Services</td>
    <td>2 Cr. Onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267 " class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267 " class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

</tr>
</table>

</div>
<!-- Business -->
<!-- Dealer -->
<div id="dealers2" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/a2z-medicals-su-3402"><img src="https://img.franchiseindia.com/brands/logo/808682587.jpg" alt="A2Z Medicals & Surgicals"> A2Z Medicals & Surgicals</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/pcd-pharma" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/pcd-pharma" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/enggific-engineering-scientific-29320102"><img src="https://img.franchiseindia.com/brands/logo/682998394.jpg" alt=" ENGGIFIC Engineering & Scientific"> ENGGIFIC Engineering & Scientific</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 5 lac - 7 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/laboratory-equipments-instruments" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/laboratory-equipments-instruments" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/purefuel-energy.66167"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/purefuel-energy_1.jpg" alt="Purefuel Energy"> Purefuel Energy</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 90 Lac - 1.5 Cr.</td>
    <td>    <a target="_blank" href="https://www.dealerindia.com/dir/oil-lubricants" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/oil-lubricants" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/skippi-ice-pops-29320012"><img src="https://img.franchiseindia.com/brands/logo/343549484.jpg" alt="Skippi Icepops"> Skippi Icepops</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/sweets-deserts" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/sweets-deserts" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>


</table>

</div>
<!-- Dealer -->
<!-- Education -->
<div id="education2" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids logo"> Eurokids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee logo"> Kidzee</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mt-litera.gif') }}" alt="Mount Litera Zee Schools logo"> Mount Litera Zee Schools</a></td>
    <td>Education</td>
    <td>Rs. 10 Cr. - 20 Cr. </td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/little-elly.28951"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/little-elly_1.jpg" alt="Little Elly"> Little Elly</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/upgard.gif') }}" alt="Upgrad"> Upgrad</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/vedantu.67008"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vedantu_1.jpg" alt="Vedantu"> Vedantu</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-coaching.ssc90" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-coaching.ssc90" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/peepal-tree.73656"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/SKILLS-India_1.jpg" alt="EDUMETA THE i-SCHOOL"> EDUMETA THE i-SCHOOL</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/peepal-tree.73656"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/peepal-tree_1.jpg" alt="Peepal Tree Eduserve"> Peepal Tree Eduserve</a></td>
    <td>Education</td>
    <td>Rs. 20 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty"> VLCC School of Beauty</a></td>
    <td>Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
</table>

</div>
<!-- Education -->
<!-- Fashion -->
<div id="fashion2" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata"> Bata</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/biba.75331"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biba_1.jpg" alt="Biba"> Biba</a></td>
    <td>Fashion</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo"> Easybuy</a></td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/jockey.gif') }}" alt="Jockey"> Jockey</a></td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart"> Lenskart</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Levis-Strauss-India.886"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Levis-Strauss-India_1.jpg" alt="Levi's"> Levi's</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd"> Liberty Shoes Ltd</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="MANYAVAR logo"> MANYAVAR</a></td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/pepe-jeans.gif') }}" alt="Pepe Jeans"> Pepe Jeans</a></td>
    <td>Fashion</td>
    <td>Rs. 50 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/peter-eng.png') }}" alt="Peter England"> Peter England</a></td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk"> Siyaram Silk</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus.27833"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus_1.jpg" alt="Titan Company"> Titan Company</a></td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/united-color.gif') }}" alt="UNITED COLORS OF BENETTON"> UNITED COLORS OF BENETTON</a></td>
    <td>Fashion</td>
    <td>Rs. 50 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/baggit.73455"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/baggit_1.jpg" alt="Baggit India"> Baggit India</a></td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/c-k.gif') }}" alt="CALVIN KLEIN"> CALVIN KLEIN</a></td>
    <td>Fashion</td>
    <td>Rs. 1 Cr. - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/CLASSIC-POLO.15786"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/CLASSIC-POLO_1.jpg" alt="CLASSIC POLO"> CLASSIC POLO</a></td>
    <td>Fashion</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fabindia-limited.73515"><img src="{{ url('images/top100/brands/fab-india.gif') }}" alt="Fabindia"> Fabindia</a></td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fastrack.75799"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fastrack_1.gif" alt="Fastrack"> Fastrack</a></td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/watches.ssc340" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/watches.ssc340" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/u-a.gif') }}" alt="UNDER ARMOUR"> UNDER ARMOUR</a></td>
    <td>Fashion</td>
    <td>Rs. 3 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>


</table>

</div>
<!-- Fashion -->
<!-- food -->
<div id="food2" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL (GCMF LTD)"> AMUL (GCMF LTD)</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista"> Barista</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins"> Baskin Robbins</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/bikanervala-foo-4400"><img src="https://img.franchiseindia.com/brands/logo/440510772.gif" alt="Bikanervala Foods Pvt Ltd"> Bikanervala Foods Pvt Ltd</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/99pancakes.75323"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/99pancakes_1.jpg" alt="99 Pancakes"> 99 Pancakes</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fresh-n-honest-coffee-point.33902"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fresh-n-honest-coffee-point_1.jpg" alt="Fresh & Honest Coffee Point"> Fresh & Honest Coffee Point</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/drunken-monkey.73442"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/drunken-monkey_1.jpg" alt="DRUNKEN MONKEY"> DRUNKEN MONKEY</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/lassi-and-shakes.33798"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/lassi-and-shakes_1.jpg" alt="Lassi And Shakes"> Lassi And Shakes</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>      </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/marino.gif') }}" alt="MARINO"> MARINO</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/rasna-buzz.30285"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/rasna-buzz_1.gif" alt="Rasna Buzz"> Rasna Buzz</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/tea-post.72087"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/tea-post_1.jpg" alt="Tea Post"> Tea Post</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/dominios.gif') }}" alt="Dominos"> Dominos</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 lac - 35 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/KFC_199X81.gif" alt="KFC"> KFC</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 1.6 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/pizza-hut.gif') }}" alt="PIZZA HUT"> PIZZA HUT</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd."> Subway Systems India (P) Ltd.</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
         </td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/shawarmer.67959"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/shawarmer_1.jpg" alt="Shawarmer"> Shawarmer</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/o-tacos.gif') }}" alt="O'TACOS"> O'TACOS</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>



</table>

</div>
<!-- food -->
<!-- hotel -->
<div id="hotel2" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hayatt.gif') }}" alt="Hyatt"> Hyatt</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 4 Cr. onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/wyndham.gif') }}" alt="Wyndham Hotels"> Wyndham Hotels</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
</table>

</div>
<!-- hotel -->
<!-- retail -->
<div id="retail2" role="tabpanel" class="tab-pane">
   <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals"> Ferns 'N' Petals</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/nike.gif') }}" alt="Nike"> Nike</a></td>
    <td>Retail</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a> </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TANISHQ.gif" alt="TANISHQ"> TANISHQ</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige"> TTK Prestige</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/amazon-ez.gif') }}" alt="Amazon Easy Store"> Amazon Easy Store</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-and-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-and-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone"> BlueStone</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/croma.58113"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/croma_1.gif" alt="Croma"> Croma</a></td>
    <td>Retail</td>
    <td>Rs. 5 Cr. - 10 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Home-Lane.18892"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Home-Lane_1.gif" alt="Home Lane"> Home Lane</a></td>
    <td>Retail</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniturehome-decor-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry"> Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/alcis.71815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/alcis_1.jpg" alt="Alcis"> Alcis</a></td>
    <td>Retail</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports-garments.ssc375" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports-garments.ssc375" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fortune-mart.66348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fortune-mart_1.jpg" alt="Adani Wilmar Ltd."> Adani Wilmar Ltd.</a></td>
    <td>Retail</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/pioneer.gif') }}" alt="PIONEER FURNITURE"> PIONEER FURNITURE</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 25 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso"> Miniso</a></td>
    <td>Retail</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Skechers-India.13899"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/skechers.gif" alt="Skechers"> Skechers</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Bombay-Dyeing.10978"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Bombay-Dyeing_1.jpg" alt="Bombay Dyeing"> Bombay Dyeing</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>


</table>

</div>
<!-- retail -->



</div>
<!-- Tab Content -->


</div>
<!-- Year 2022 active Tab Content end-->




<!-- Year 2021 -->

<div id="year2021" role="tabpanel" class="tab-pane">

<div class="top-hundred">
    <br>
<h1>Top 100 Franchise/Franchisor 2021</h1>
<p>Revealing brand impact, consumer value, and dynamic opportunities. Explore trends in Indian franchises, including global giants and emerging innovators. Rankings consider financial strength, expansion, growth rate, and success, reflecting a distinct identity, robust planning, support, innovation, and cultural sensitivity. This analysis assists franchisees and franchisors alike, offering insights into the franchise sector that underpin thriving business ventures.</p>
<a data-target="#topFranchise" data-toggle="modal">Understand Selection Criteria</a>
</div>


<!-- Top 100 franchises -->
<div class="top-hundred-tab">
<h3>Browse Top 100 franchises by category</h3>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#all3"><img src="{{ url('images/top100/brands.svg') }}"alt=""> <span>all</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#automotive3"><img src="{{ url('images/top100/automotive.svg') }}"
 alt=""> <span>Automotive</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#beauty3"><img src="{{ url('images/top100/beauty.svg') }}" alt=""> <span>Beauty &<br> Health</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#business3"><img src="{{ url('images/top100/business.svg') }}" alt=""> <span>Business<br> Services</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#dealers3"><img src="{{ url('images/top100/dealers.svg') }}" alt=""> <span>Dealers &<br> Distributors</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#education3"><img src="{{ url('images/top100/education.svg') }}" alt=""> <span>Education</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#fashion3"><img src="{{ url('images/top100/fashion.svg') }}" alt=""> <span>Fashion</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#food3"><img src="{{ url('images/top100/food.svg') }}" alt=""> <span>Food And<br> Beverage</span></a></li>
<!-- <li role="presentation"><a role="tab" data-toggle="tab" href="#home3"><img src="{{ url('images/top100/homebusiness.svg') }} alt=""> <span>Home Based<br> Business</span></a></li> -->
<li role="presentation"><a role="tab" data-toggle="tab" href="#hotel3"><img src="{{ url('images/top100/hotel.svg') }}" alt=""> <span>Hotel, Travel<br> & Tourism</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#retail3"><img src="{{ url('images/top100/retail.svg') }}" alt=""> <span>Retail</span></a></li>
<!-- <li role="presentation"><a role="tab" data-toggle="tab" href="#sports3"><img src="{{ url('images/top100/sports.svg"') }} alt=""> <span>Sports, Fitness &<br> Entertainment</span></a></li> -->
</ul>
</div>



<!-- Tab Content -->
<div class="tab-content">

    <!-- all -->
<div id="all3" role="tabpanel" class="tab-pane active">
    <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hero-elect.gif') }}" alt="Hero Electric"> Hero Electric</a></td>
        <td>Automotive</td>
        <td>Rs. 40 Lac - 1 Cr.</td>
        <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

        </td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/cartrade.gif') }}" alt="Cartrade"> Cartrade</a></td>
        <td>Automotive</td>
        <td>Rs. 10 lac - 12 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/ceat.75354"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/ceat_1.jpg" alt="CEAT"> CEAT</a></td>
        <td>Automotive</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-spares-related.ssc368" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-spares-related.ssc368" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/credar.68223"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/credar_1.jpg" alt="Credr"> Credr</a></td>
        <td>Automotive</td>
        <td>Rs. 30 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/no-ho.gif') }}" alt="No-H2O"> No-H2O</a></td>
        <td>Automotive</td>
        <td>Rs. 75 lac - 80 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-and-detailing.ssc358" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-and-detailing.ssc358" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>

<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics logo">Apollo Diagnostics</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs logo">Dr Lal Path Labs</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jawed-habib-hair-and-beauty-limited.74924"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jawed-habib-hair-and-beauty-limited_1.jpg" alt="JAWED HABIB HAIR AND BEAUTY LIMITED">JAWED HABIB HAIR AND BEAUTY LIMITED</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="LakmeLever Pvt Ltd">Lakme Salon</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart logo">Lenskart</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>

<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/patanjali-ayurved.85107"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/patanjali-ayurved_1.gif" alt="PATANJALI">PATANJALI</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>

    </td>
</tr>

<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/agilus-diagnostics-limited.88534"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/agilus-diagnostics-limited_1.gif" alt="AGILUS DIAGNOSTICS">AGILUS DIAGNOSTICS</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10000 - 50 K</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>   </td>
</tr>

<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus logo">Titan Eye Plus</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>

<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty logo">VLCC School of Beauty</a></td>
    <td>Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/juice-hair-marketing-pvt-ltd.49087"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/juice-hair-marketing-pvt-ltd_1.jpg" alt="JUICE">JUICE</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/newu.gif') }}" alt="NewU">NewU</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>

<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/1mg.30137"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/1mg_1.jpg" alt="1mg.com">1mg.com</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/color-bar.58162"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/color-bar_1.jpg" alt="Color Bar">Color Bar</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/cyro.gif') }}" alt="CRYO">CRYO</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 3 Cr. onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>20</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC logo">DTDC</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>21</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/motilal_199x81.png" alt="Motilal Oswal Financial Service">Motilal Oswal Financial Service</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>22 </td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/remax(199x81).gif" alt="REMAX INDIA">REMAX INDIA</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>23</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean logo">U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
  </td>
</tr>
<tr>
    <td>24</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee logo">Vakrangee</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

</tr>
<tr>
    <td>25</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/delhivery.28935"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/delhivery_1.jpg" alt="Delhivery logo">Delhivery</a></td>
    <td>Business Services</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
            </td>
</tr>
<tr>
    <td>26</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="MFC services">MFC services</a></td>
    <td>Business Services</td>
    <td>Rs. 15 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>27</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/shadowfax-technologies-private-limited.57551"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/shadowfax-technologies-private-limited_1.gif" alt="Shadowfax Technologies">Shadowfax Technologies</a></td>
    <td>Business Services</td>
    <td>Rs. 10 K - 50 K</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
</tr>
<tr>
    <td>28</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/actioncoach.30037"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/actioncoach_1.jpg" alt="ActionCOACH">ActionCOACH</a></td>
    <td>Business Services</td>
    <td>Rs. 10 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>

<tr>
    <td>29</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bbx-india.53738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bbx-india_1.gif" alt="BBX India">BBX India</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/computer-and-ict-services.ssc131" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/computer-and-ict-services.ssc131" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>    </td>
</tr>

<tr>
    <td>30</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ChemDry-US.15156"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/chemdry.gif" alt="Chem Dry">Chem Dry</a></td>
    <td>Business Services</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr><tr>
    <td>31</td>
    <td><a target="_blank" href="https://www.franglobal.com/engage-and-grow/"><img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png" alt="Engage & Grow">Engage & Grow</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/career-counseling.ssc158" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/career-counseling.ssc158" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>32</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="Forex">Forex</a></td>
    <td>Business Services</td>
    <td>$ 0.70 Mn - 0.80 Mn</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/foreign-exchange.ssc140" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/foreign-exchange.ssc140" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>33</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hoop.gif') }}" alt="Hoop Mountain">Hoop Mountain</a></td>
    <td>Business Services</td>
    <td>Rs. 50 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/adventurous-sporting.ssc372" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/adventurous-sporting.ssc372" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>34</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Inxpress-DHL.10505"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Inxpress-DHL_2.jpg" alt="Inxpress">Inxpress</a></td>
    <td>Business Services</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>

<tr>
    <td>35</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/hatsun.png') }}" alt="Hatsun Agro Products">Hatsun Agro Products</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 10 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/milk-dairy-products" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/milk-dairy-products" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>36</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/lenevo.gif') }}" alt="Lenovo">Lenovo</a></td>
    <td>Dealer & Distributors</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/computer-parts-accessories" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/computer-parts-accessories" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>37</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/NAYARA-ENERGY.gif" alt="NAYARA ENERGY">NAYARA ENERGY</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/food-processing-plants-machinery" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/food-processing-plants-machinery" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>38</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/xiaomi.gif') }}" alt="XIAOMI">XIAOMI</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>39</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/waari-solar-29320401"><img src="https://img.franchiseindia.com/brands/logo/1938180466.jpg" alt="Waaree Solar">Waaree Solar</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 50 K to 1 lac</td>
    <td>
         <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>40</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Go69-Pizza.21117"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pizza.gif" alt="Go69 Pizza">Go69 Pizza</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>


<tr>
    <td>41</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids">Eurokids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>42</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee">Kidzee</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>43</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Rootstowings.5893"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Rootstowings_1.gif" alt="Little Millenium">Little Millenium</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>44</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mt-litera.gif') }}" alt="Mount Litera Zee Schools">Mount Litera Zee Schools</a></td>
    <td>Education</td>
    <td>Rs. 10 Cr. - 20 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>45</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/little-elly.28951"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/little-elly_1.jpg" alt="Little Elly">Little Elly</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>46</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mom.gif') }}" alt="Millenium Education">Millenium Education</a></td>
    <td>Education</td>
    <td>Rs. 10 Cr. - 20 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>47</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/upgard.gif') }}" alt="Upgrad logo">Upgrad</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>48</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/white-hat.gif') }}" alt="WhiteHat Jr">WhiteHat Jr</a></td>
    <td>Education</td>
    <td>Rs. 4 lac - 5 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>49</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/icode.56416"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/icode_1.jpg" alt="Icode">Icode</a></td>
    <td>Education</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/robotics-technical-training.ssc91" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/robotics-technical-training.ssc91" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>50</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata logo">Bata</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
</table>
<table class="table-striped table-responsive top-table moretext3" style="display: none;">
<tr>
    <td>51</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/biba.75331"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biba_1.jpg" alt="Biba">Biba</a></td>
    <td>Fashion</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>52</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo">Easybuy</td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>53</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="FirstCry">FirstCry</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>54</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Levis-Strauss-India.886"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Levis-Strauss-India_1.jpg" alt="Levi's logo">Levi's</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>55</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd logo">Liberty Shoes Ltd</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>56</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/peter-eng.png') }}" alt="Peter England">Peter England</a></td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>57</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/raymonds.75150"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/raymonds_1.jpg" alt="Raymonds logo">Raymonds</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>

<tr>
    <td>58</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/van-hause.gif') }}" alt="Van Heusen">Van Heusen</a></td>
    <td>Fashion</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>59</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone">BlueStone</a></td>
    <td>Fashion</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>60</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/CLASSIC-POLO.15786"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/CLASSIC-POLO_1.jpg" alt="CLASSIC POLO">CLASSIC POLO</a></td>
    <td>Fashion</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>61</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/pendelton.gif') }}" alt="Pendelton">Pendelton</a></td>
    <td>Fashion</td>
    <td>Rs. 1 Cr. - 1.2 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-clothing.ssc233" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-clothing.ssc233" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>62</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk logo">Siyaram Silk</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>63</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL (GCMF LTD) logo">AMUL (GCMF LTD)</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>64</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista logo">Barista</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>65</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins logo">Baskin Robbins</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>66</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/bikanervala-foo-4400"><img src="https://img.franchiseindia.com/brands/logo/440510772.gif" alt="Bikanervala Foods Pvt Ltd">Bikanervala Foods Pvt Ltd</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>67</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/dominios.gif') }}" alt="Dominos">Dominos</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 lac - 35 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>68</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/kfc.gif') }}" alt="KFC">KFC</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 1.6 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>69</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd.">Subway Systems India (P) Ltd.</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
         </td>
</tr>
<tr>
    <td>70</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nestle.83010"><img src="{{ url('images/top100/brands/nescafe.gif') }}" alt="Nescafe Kiosk logo">Nescafe Kiosk</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 15 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>71</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/rasna-buzz.30285"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/rasna-buzz_1.gif" alt="Rasna Buzz">Rasna Buzz</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>72</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/bubble-recap.gif') }}" alt="Bubble Recap Beverage">Bubble Recap Beverage</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 6 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>73</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/coco-fit.37263"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/coco-fit_1.gif" alt="COCOFIT">COCOFIT</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>74</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/haldiram-bhujiawala-ltd.58200"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/haldiram-bhujiawala-ltd_1.gif" alt="HALDIRAM BHUJIAWALA logo">HALDIRAM BHUJIAWALA</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>75</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/CHouse-Milano_1.jpg" alt="C House Bakery">C House Bakery</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-and-confectionary.ssc437" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-and-confectionary.ssc437" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>76</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jj-chicken.56357"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jj-chicken_2.jpg" alt="JJ Chicken">JJ Chicken</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>77</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/wrap-it-up.29055"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/wrap-it-up_1.jpg" alt="Wrap It Up">Wrap It Up</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>78</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hayatt.gif') }}" alt="Hyatt">Hyatt</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 4 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>

<tr>
    <td>79</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/MMTFranchise_1.gif" alt="MakeMyTrip India">MakeMyTrip India</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>

<tr>
    <td>80</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/marriot.gif') }}" alt="MARRIOTT">MARRIOTT</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>

<tr>
    <td>81</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/wyndham.gif') }}" alt="Wyndham Hotels">Wyndham Hotels</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>

<tr>
    <td>82</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals">Ferns 'N' Petals</td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>84</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/samsung-smart.gif') }}" alt="Samsung Smart Cafe">Samsung Smart Cafe</td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>84</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Skechers-India.13899"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/skechers.gif" alt="Skechers logo">Skechers</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>85</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TANISHQ.gif" alt="TANISHQ">TANISHQ</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>86</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige">TTK Prestige</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>87</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/caratlane.gif') }}" alt="Caratlane">Caratlane</a></td>
    <td>Retail</td>
    <td>Rs. 60 lac - 80 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>88</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/d-decore.gif') }}" alt="D’decor">D’decor</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>89</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/jockey.gif') }}" alt="Jockey logo">Jockey</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>90</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/nike.gif') }}" alt="Nike">Nike</a></td>
    <td>Retail</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a> </td>
</tr>
<tr>
    <td>91</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/nobilia.gif') }}" alt="Nobilia Kitchen">Nobilia Kitchen</a></td>
    <td>Retail</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>92</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry">Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>93</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/amazon-ez.gif') }}" alt="Amazon Easy Store">Amazon Easy Store</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-and-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-and-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>94</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/clovia.gif') }}" alt="Clovia">Clovia</a></td>
    <td>Retail</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>   </td>
</tr>
<tr>
    <td>95</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/croma.58113"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/croma_1.gif" alt="Croma">Croma</a></td>
    <td>Retail</td>
    <td>Rs. 5 Cr. - 10 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>96</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/blinkit.75501"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/blinkit_1.png" alt="Grofers (Blinkit)">Grofers (Blinkit)</a></td>
    <td>Retail</td>
    <td>Rs. 18 Lac - 25 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>97</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/walkway.gif') }}" alt="Walkway">Walkway</a></td>
    <td>Retail</td>
    <td>Rs. 25 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>98</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/chilli-beans.gif') }}" alt="Chilli Beans">Chilli Beans</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticians-eye-wear.ssc246" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticians-eye-wear.ssc246" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>99</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fresh-n-honest-coffee-point.33902"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fresh-n-honest-coffee-point_1.jpg" alt="Fresh & Honest Coffee Point">Fresh & Honest Coffee Point</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>

<tr>
    <td>100</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/carbon-antidote-5488"><img src="https://img.franchiseindia.com/brands/logo/1474696837.gif" alt="FURTURE DIZICARE ENTERPRISES">FURTURE DIZICARE ENTERPRISES</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/automotive-parts-components" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/automotive-parts-components" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

</tr>

    </table>
    <a class="load_more moreless-button3">Load more »</a>
    </div>
    <!-- a -->

<!-- Automotive -->
<div id="automotive3" role="tabpanel" class="tab-pane">
<table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hero-elect.gif') }}" alt="Hero Electric"> Hero Electric</a></td>
    <td>Automotive</td>
    <td>Rs. 40 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/cartrade.gif') }}" alt="Cartrade"> Cartrade</a></td>
    <td>Automotive</td>
    <td>Rs. 10 lac - 12 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ceat.75354"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/ceat_1.jpg" alt="CEAT"> CEAT</a></td>
    <td>Automotive</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-spares-related.ssc368" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/automobile-spares-related.ssc368" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/credar.68223"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/credar_1.jpg" alt="Credr"> Credr</a></td>
    <td>Automotive</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/no-ho.gif') }}" alt="No-H2O"> No-H2O</a></td>
    <td>Automotive</td>
    <td>Rs. 75 lac - 80 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-and-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-and-detailing.ssc358" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

</tr>
</table>

</div>
<!-- Automotive -->
<!-- Beauty & Health -->
<div id="beauty3" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics logo">Apollo Diagnostics</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs logo">Dr Lal Path Labs</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jawed-habib-hair-and-beauty-limited.74924"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jawed-habib-hair-and-beauty-limited_1.jpg" alt="JAWED HABIB HAIR AND BEAUTY LIMITED">JAWED HABIB HAIR AND BEAUTY LIMITED</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="LakmeLever Pvt Ltd">Lakme Salon</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart logo">Lenskart</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>

<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/patanjali-ayurved.85107"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/patanjali-ayurved_1.gif" alt="PATANJALI">PATANJALI</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>

    </td>
</tr>

<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/agilus-diagnostics-limited.88534"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/agilus-diagnostics-limited_1.gif" alt="AGILUS DIAGNOSTICS">AGILUS DIAGNOSTICS</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10000 - 50 K</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>   </td>
</tr>

<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus logo">Titan Eye Plus</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>



<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/juice-hair-marketing-pvt-ltd.49087"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/juice-hair-marketing-pvt-ltd_1.jpg" alt="JUICE">JUICE</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/newu.gif') }}" alt="NewU">NewU</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>

<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/1mg.30137"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/1mg_1.jpg" alt="1mg.com">1mg.com</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/color-bar.58162"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/color-bar_1.jpg" alt="Color Bar">Color Bar</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/cyro.gif') }}" alt="CRYO">CRYO</a></td>
    <td>Beauty & Health</td>
    <td>Rs. 3 Cr. onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>


</table>

</div>
<!-- Beauty & Health -->
<!-- Business -->
<div id="business3" role="tabpanel" class="tab-pane">
<table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC logo">DTDC</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/motilal_199x81.png" alt="Motilal Oswal Financial Service">Motilal Oswal Financial Service</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>3 </td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/remax(199x81).gif" alt="REMAX INDIA">REMAX INDIA</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean logo">U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
  </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee logo">Vakrangee</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/delhivery.28935"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/delhivery_1.jpg" alt="Delhivery logo">Delhivery</a></td>
    <td>Business Services</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
            </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="MFC services">MFC services</a></td>
    <td>Business Services</td>
    <td>Rs. 15 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/shadowfax-technologies-private-limited.57551"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/shadowfax-technologies-private-limited_1.gif" alt="Shadowfax Technologies">Shadowfax Technologies</a></td>
    <td>Business Services</td>
    <td>Rs. 10 K - 50 K</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/actioncoach.30037"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/actioncoach_1.jpg" alt="ActionCOACH">ActionCOACH</a></td>
    <td>Business Services</td>
    <td>Rs. 10 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bbx-india.53738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bbx-india_1.gif" alt="BBX India">BBX India</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/computer-and-ict-services.ssc131" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/computer-and-ict-services.ssc131" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ChemDry-US.15156"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/chemdry.gif" alt="Chem Dry">Chem Dry</a></td>
    <td>Business Services</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr><tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franglobal.com/engage-and-grow/"><img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png" alt="Engage & Grow">Engage & Grow</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/career-counseling.ssc158" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/career-counseling.ssc158" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="Forex">Forex</a></td>
    <td>Business Services</td>
    <td>$ 0.70 Mn - 0.80 Mn</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/foreign-exchange.ssc140" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/foreign-exchange.ssc140" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hoop.gif') }}" alt="Hoop Mountain">Hoop Mountain</a></td>
    <td>Business Services</td>
    <td>Rs. 50 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/adventurous-sporting.ssc372" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/adventurous-sporting.ssc372" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Inxpress-DHL.10505"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Inxpress-DHL_2.jpg" alt="Inxpress">Inxpress</a></td>
    <td>Business Services</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>


</table>

</div>
<!-- Business -->
<!-- Dealer -->
<div id="dealers3" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/hatsun.png') }}" alt="Hatsun Agro Products">Hatsun Agro Products</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 10 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/milk-dairy-products" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/milk-dairy-products" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/lenevo.gif') }}" alt="Lenovo">Lenovo</a></td>
    <td>Dealer & Distributors</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/computer-parts-accessories" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/computer-parts-accessories" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/NAYARA-ENERGY.gif" alt="NAYARA ENERGY">NAYARA ENERGY</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/food-processing-plants-machinery" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/food-processing-plants-machinery" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/xiaomi.gif') }}" alt="XIAOMI">XIAOMI</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/waari-solar-29320401"><img src="https://img.franchiseindia.com/brands/logo/1938180466.jpg" alt="Waaree Solar">Waaree Solar</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 50 K to 1 lac</td>
    <td>
         <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/solar-renewable-energy-products-components" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/carbon-antidote-5488"><img src="https://img.franchiseindia.com/brands/logo/1474696837.gif" alt="FURTURE DIZICARE ENTERPRISES">FURTURE DIZICARE ENTERPRISES</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/automotive-parts-components" class="desklink">View more</a>
        <a target="_blank" href="https://www.dealerindia.com/dir/automotive-parts-components" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

</tr>

</table>

</div>
<!-- Dealer -->
<!-- Education -->
<div id="education3" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids">Eurokids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee">Kidzee</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Rootstowings.5893"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Rootstowings_1.gif" alt="Little Millenium">Little Millenium</a></td>
    <td>Education</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mt-litera.gif') }}" alt="Mount Litera Zee Schools">Mount Litera Zee Schools</a></td>
    <td>Education</td>
    <td>Rs. 10 Cr. - 20 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/little-elly.28951"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/little-elly_1.jpg" alt="Little Elly">Little Elly</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/mom.gif') }}" alt="Millenium Education">Millenium Education</a></td>
    <td>Education</td>
    <td>Rs. 10 Cr. - 20 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/upgard.gif') }}" alt="Upgrad logo">Upgrad</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/white-hat.gif') }}" alt="WhiteHat Jr">WhiteHat Jr</a></td>
    <td>Education</td>
    <td>Rs. 4 lac - 5 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/icode.56416"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/icode_1.jpg" alt="Icode">Icode</a></td>
    <td>Education</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/robotics-technical-training.ssc91" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/robotics-technical-training.ssc91" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>

<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty logo">VLCC School of Beauty</a></td>
    <td>Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
</table>

</div>
<!-- Education -->
<!-- Fashion -->
<div id="fashion3" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata logo">Bata</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/biba.75331"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biba_1.jpg" alt="Biba">Biba</a></td>
    <td>Fashion</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo">Easybuy</td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="FirstCry">FirstCry</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Levis-Strauss-India.886"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Levis-Strauss-India_1.jpg" alt="Levi's logo">Levi's</a></td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd logo">Liberty Shoes Ltd</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/peter-eng.png') }}" alt="Peter England">Peter England</a></td>
    <td>Fashion</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/raymonds.75150"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/raymonds_1.jpg" alt="Raymonds logo">Raymonds</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>

<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/van-hause.gif') }}" alt="Van Heusen">Van Heusen</a></td>
    <td>Fashion</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone">BlueStone</a></td>
    <td>Fashion</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/CLASSIC-POLO.15786"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/CLASSIC-POLO_1.jpg" alt="CLASSIC POLO">CLASSIC POLO</a></td>
    <td>Fashion</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/pendelton.gif') }}" alt="Pendelton">Pendelton</a></td>
    <td>Fashion</td>
    <td>Rs. 1 Cr. - 1.2 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-clothing.ssc233" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-clothing.ssc233" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk logo">Siyaram Silk</a></td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
</table>

</div>
<!-- Fashion -->
<!-- food -->
<div id="food3" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL (GCMF LTD) logo">AMUL (GCMF LTD)</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista logo">Barista</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="hhttps://www.dealerindia.com/dir/packaged-food-products-supplies" class="desklink">
            View more
        </a>
        <a target="_blank" href="hhttps://www.dealerindia.com/dir/packaged-food-products-supplies" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins logo">Baskin Robbins</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/bikanervala-foo-4400"><img src="https://img.franchiseindia.com/brands/logo/440510772.gif" alt="Bikanervala Foods Pvt Ltd">Bikanervala Foods Pvt Ltd</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/dominios.gif') }}" alt="Dominos">Dominos</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 lac - 35 lac</td>
    <td><a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="moblink">
      <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/kfc.gif') }}" alt="KFC">KFC</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 1.6 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd.">Subway Systems India (P) Ltd.</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
         </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/nestle.83010"><img src="{{ url('images/top100/brands/nescafe.gif') }}" alt="Nescafe Kiosk logo">Nescafe Kiosk</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 15 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/express-food-joints-drive-through.ssc429" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/rasna-buzz.30285"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/rasna-buzz_1.gif" alt="Rasna Buzz">Rasna Buzz</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/bubble-recap.gif') }}" alt="Bubble Recap Beverage">Bubble Recap Beverage</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 6 lac - 10 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/coco-fit.37263"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/coco-fit_1.gif" alt="COCOFIT">COCOFIT</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/haldiram-bhujiawala-ltd.58200"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/haldiram-bhujiawala-ltd_1.gif" alt="HALDIRAM BHUJIAWALA logo">HALDIRAM BHUJIAWALA</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/CHouse-Milano_1.jpg" alt="C House Bakery">C House Bakery</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-and-confectionary.ssc437" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-and-confectionary.ssc437" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jj-chicken.56357"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jj-chicken_2.jpg" alt="JJ Chicken">JJ Chicken</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/wrap-it-up.29055"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/wrap-it-up_1.jpg" alt="Wrap It Up">Wrap It Up</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Go69-Pizza.21117"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pizza.gif" alt="Go69 Pizza">Go69 Pizza</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 lac - 10 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fresh-n-honest-coffee-point.33902"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fresh-n-honest-coffee-point_1.jpg" alt="Fresh & Honest Coffee Point">Fresh & Honest Coffee Point</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>

</table>

</div>
<!-- food -->
<!-- hotel -->
<div id="hotel3" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hayatt.gif') }}" alt="Hyatt">Hyatt</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 4 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/MMTFranchise_1.gif" alt="MakeMyTrip India">MakeMyTrip India</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>

<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/marriot.gif') }}" alt="MARRIOTT">MARRIOTT</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>

    </td>
</tr>

<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/wyndham.gif') }}" alt="Wyndham Hotels">Wyndham Hotels</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>N/A</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>

    </td>
</tr>


</table>

</div>
<!-- hotel -->
<!-- retail -->
<div id="retail3" role="tabpanel" class="tab-pane">
   <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals">Ferns 'N' Petals</td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>

    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/samsung-smart.gif') }}" alt="Samsung Smart Cafe">Samsung Smart Cafe</td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Skechers-India.13899"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/skechers.gif" alt="Skechers logo">Skechers</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TANISHQ.gif" alt="TANISHQ">TANISHQ</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige">TTK Prestige</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/caratlane.gif') }}" alt="Caratlane">Caratlane</a></td>
    <td>Retail</td>
    <td>Rs. 60 lac - 80 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/d-decore.gif') }}" alt="D’decor">D’decor</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/jockey.gif') }}" alt="Jockey logo">Jockey</a></td>
    <td>Retail</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-innerwear.ssc232" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/nike.gif') }}" alt="Nike">Nike</a></td>
    <td>Retail</td>
    <td>Rs. 50 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a> </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/nobilia.gif') }}" alt="Nobilia Kitchen">Nobilia Kitchen</a></td>
    <td>Retail</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry">Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/amazon-ez.gif') }}" alt="Amazon Easy Store">Amazon Easy Store</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-and-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-and-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/clovia.gif') }}" alt="Clovia">Clovia</a></td>
    <td>Retail</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>   </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/croma.58113"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/croma_1.gif" alt="Croma">Croma</a></td>
    <td>Retail</td>
    <td>Rs. 5 Cr. - 10 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/consumer-electronics.ssc177" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/blinkit.75501"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/blinkit_1.png" alt="Grofers (Blinkit)">Grofers (Blinkit)</a></td>
    <td>Retail</td>
    <td>Rs. 18 Lac - 25 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/walkway.gif') }}" alt="Walkway">Walkway</a></td>
    <td>Retail</td>
    <td>Rs. 25 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/chilli-beans.gif') }}" alt="Chilli Beans">Chilli Beans</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticians-eye-wear.ssc246" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticians-eye-wear.ssc246" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>


</table>

</div>
<!-- retail -->

</div>
<!-- Tab Content -->


</div>
<!-- Year 2021 active Tab Content end-->



<!-- Year 2020 -->

<div id="year2020" role="tabpanel" class="tab-pane">

<div class="top-hundred">
    <br>
<h1>Top 100 Franchise/Franchisor 2020</h1>
<p>Revealing brand impact, consumer value, and dynamic opportunities. Explore trends in Indian franchises, including global giants and emerging innovators. Rankings consider financial strength, expansion, growth rate, and success, reflecting a distinct identity, robust planning, support, innovation, and cultural sensitivity. This analysis assists franchisees and franchisors alike, offering insights into the franchise sector that underpin thriving business ventures.</p>
<a data-target="#topFranchise" data-toggle="modal">Understand Selection Criteria</a>
</div>


<!-- Top 100 franchises -->
<div class="top-hundred-tab">
<h3>Browse Top 100 franchises by category</h3>
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#all4"><img src="{{ url('images/top100/brands.svg') }}"alt=""> <span>All</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#automotive4"><img src="{{ url('images/top100/automotive.svg') }}" alt=""> <span>Automotive</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#beauty4"><img src="{{ url('images/top100/beauty.svg') }}" alt=""> <span>Beauty &<br> Health</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#business4"><img src="{{ url('images/top100/business.svg') }}" alt=""> <span>Business<br> Services</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#dealers4"><img src="{{ url('images/top100/dealers.svg') }}" alt=""> <span>Dealers &<br> Distributors</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#education4"><img src="{{ url('images/top100/education.svg') }}" alt=""> <span>Education</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#fashion4"><img src="{{ url('images/top100/fashion.svg') }}" alt=""> <span>Fashion</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#food4"><img src="{{ url('images/top100/food.svg') }}" alt=""> <span>Food And<br> Beverage</span></a></li>
<!-- <li role="presentation"><a role="tab" data-toggle="tab" href="#home4"><img src="{{ url('images/top100/homebusiness.svg') }}" alt=""> <span>Home Based<br> Business</span></a></li> -->
<li role="presentation"><a role="tab" data-toggle="tab" href="#hotel4"><img src="{{ url('images/top100/hotel.svg') }}" alt=""> <span>Hotel, Travel<br> & Tourism</span></a></li>
<li role="presentation"><a role="tab" data-toggle="tab" href="#retail4"><img src="{{ url('images/top100/retail.svg') }}" alt=""> <span>Retail</span></a></li>
<!-- <li role="presentation"><a role="tab" data-toggle="tab" href="#sports4"><img src="{{ url('images/top100/sports.svg') }}" alt=""> <span>Sports, Fitness &<br> Entertainment</span></a></li> -->
</ul>
</div>



<!-- Tab Content -->
<div class="tab-content">

<!-- all -->
    <div id="all4" role="tabpanel" class="tab-pane active">
        <table class="table-striped table-responsive top-table">
            <tr>
            <th>Rank</th>
            <th>Franchise Name</th>
            <th>Category</th>
            <th>Investment Range</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <td>1</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/hero-elect.gif') }}" alt="Hero Electric logo">Hero Electric</a></td>
            <td>Automotive</td>
            <td>Rs. 40 Lac - 1 Cr.</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/electric-two-wheelers.ssc350" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

            </td>
        </tr>
        <tr>
            <td>2</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/mahindra-first-choice-services.29348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mahindra-first-choice-services_1.gif" alt="Mahindra First Choice Services Ltd.">Mahindra First Choice Services Ltd.</a></td>
            <td>Automotive</td>
            <td>Rs. 50 Lac - 1 Cr</td>
            <td>
      <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
           </td>
        </tr>
        <tr>
            <td>3</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/amigo-auto-spa-private-limited.57163"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/amigo-auto-spa-private-limited_1.jpg" alt="AmigoSpa Auto Spa">AmigoSpa Auto Spa</a></td>
            <td>Automotive</td>
            <td>Rs. 20 Lac - 30 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-and-detailing.ssc358" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-and-detailing.ssc358" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>4</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/cars24-services-pvt-ltd.39672"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/cars24-services-pvt-ltd_1.gif" alt="Cars24">Cars24</a></td>
            <td>Automotive</td>
            <td>Rs. 30 Lac - 50 Lac</td>
            <td>  <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
        </tr>
        <tr>
            <td>5</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/drivezy.gif') }}" alt="Drivezy">Drivezy</a></td>
            <td>Automotive</td>
            <td>Rs. 35 Lac - 60 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-rental.ssc546" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-rental.ssc546" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                    </a>
                </td>
        </tr>

<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics"> Apollo Diagnostics</td>
    <td> Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                    View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs"> Dr Lal Path Labs</td>
    <td> Beauty & Health</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                    View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/golds-gym.1009"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Gold%27s-Gym.gif" alt="Gold’s Gym"> Gold’s Gym</td>
    <td> Beauty & Health</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                    View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jawed-habib-hair-and-beauty-limited.74924"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jawed-habib-hair-and-beauty-limited_1.jpg" alt="JAWED HABIB HAIR AND BEAUTY LIMITED"> JAWED HABIB HAIR AND BEAUTY LIMITED</td>
    <td> Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                    View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td></tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="Lakme Salon"> Lakme Salon</td>
    <td> Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
   </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/toniguy.41796"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/toniguy_1.gif" alt="TONI&GUY"> TONI&GUY</td>
    <td> Beauty & Health</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty"> VLCC School of Beauty</td>
    <td> Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/house-of-fitness-pvt-ltd.51366"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness"> Anytime Fitness</td>
    <td> Beauty & Health</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>

    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/truefitt&hill.gif') }}" alt="Truefitt & Hill"> Truefitt & Hill</td>
    <td> Beauty & Health</td>
    <td>Rs. 1 Cr. - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC logo">DTDC</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Edelweiss.gif" alt="EDELWEISS">EDELWEISS</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/icicid.gif') }}" alt="ICICIdirect">ICICIdirect</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/financial-investment-and-trading.ssc555" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/financial-investment-and-trading.ssc555" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/motilal_199x81.png" alt="Motilal Oswal Financial Service">Motilal Oswal Financial Service</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/remax(199x81).gif" alt="REMAX INDIA">REMAX INDIA</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>20</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean logo">U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
  </td>
</tr>
<tr>
    <td>21</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/talent-corner-hr.742"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/talent-corner-hr_2.jpg" alt="Talent Corner HR Services">Talent Corner HR Services</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hr-recruitment.ssc161" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hr-recruitment.ssc161" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
   </td>
</tr>
<tr>
    <td>22</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/5paisa.36730"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/5paisa_1.png" alt="5paisa Capital limited">5paisa Capital limited</a></td>
    <td>Business Services</td>
    <td>Rs. 10000 - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>23</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/actioncoach.30037"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/actioncoach_1.jpg" alt="ActionCOACH">ActionCOACH</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>24</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ChemDry-US.15156"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/chemdry.gif" alt="Chem Dry">Chem Dry</a></td>
    <td>Business Services</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>25</td>
    <td><a target="_blank" href="https://www.franglobal.com/engage-and-grow/"><img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png" alt="Engage & Grow">Engage & Grow</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/career-counseling.ssc158" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/career-counseling.ssc158" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>26</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/regus.61289"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/regus_2.jpg" alt="IWG, Plc">IWG, Plc</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Cr. onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>27</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eye-plus.28694"><img src="{{ url('images/top100/brands/sani-serv.gif') }}" alt="Saniservice">Saniservice</a></td>
    <td>Business Services</td>
    <td>Rs. 1 Cr. - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/facility-management.ssc567" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/facility-management.ssc567" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>

<tr>
    <td>28</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/xiaomi.gif') }}" alt="XIAOMI">XIAOMI</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>29</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/em.gif') }}" alt="Marshalls, India's No.1 Wallcoverings">Marshalls, India's No.1 Wallcoverings</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 25 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/home-furniture" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.dealerindia.com/dir/home-furniture" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>  </td>
</tr>
<tr>
    <td>30</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/nature-care-inn-3629"><img src="https://img.franchiseindia.com/brands/logo/nature-care-innovation-services_1.png" alt="Nature Care Innovation Services">Nature Care Innovation Services</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 3 lac - 4 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/eco-friendly-products" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.dealerindia.com/dir/eco-friendly-products" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>

    </td>
</tr>

<tr>
    <td>31</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids">Eurokids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>32</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee">Kidzee</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>33</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/NIIT.21675"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/niit(199x81)k7i2.gif" alt="NIIT Limited">NIIT Limited</a></td>
    <td>Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>34</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/aptech-montana-international-preschool.28127"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/aptech-montana-international-preschool_2.gif" alt="Aptech Montana International">Aptech Montana International</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>35</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/drs-kids.72963"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/drs-kids_1.jpg" alt="MDN Edify Education">MDN Edify Education</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>36</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Eye-Level-India.19395"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eye-level(199x81)9udc.gif" alt="Eye Level India">Eye Level India</a></td>
    <td>Education</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/school-tutoring.ssc92" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/school-tutoring.ssc92" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>    </td>
</tr>
<tr>
    <td>37</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/seth-anandram-jaipuria-school.33897"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/seth-anandram-jaipuria-school_1.png" alt="Seth Anandram Jaipuria School">Seth Anandram Jaipuria School</a></td>
    <td>Education</td>
    <td>Rs. 5 Cr. - 10 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>38</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/toppr.29135"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/toppr_1.jpg" alt="Toppr Technologies">Toppr Technologies</a></td>
    <td>Education</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-learninge-learning.ssc107" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-learninge-learning.ssc107" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>39</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="0-8 Early Start">0-8 Early Start</a></td>
    <td>Education</td>
    <td>Rs. 40 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>40</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/algorithmics-parakh-knowledge-academy.37722"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/algorithmics-parakh-knowledge-academy_1.png" alt="Algorithmics">Algorithmics</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>41</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kipinae-kids.37561"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kipinae-kids_1.gif" alt="Kipina Worldwide">Kipina Worldwide</a></td>
    <td>Education</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>42</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/litter-kickers.gif') }}" alt="Little Kickers">Little Kickers</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 15 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>42</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/logischool.gif') }}" alt="Logiscool">Logiscool</a></td>
    <td>Education</td>
    <td>Rs. 30 lac - 70 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>44</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/new-horiza.gif') }}" alt="New Horizon">New Horizon</a></td>
    <td>Education</td>
    <td>Rs. 1 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/degree-diploma-colleges.ssc94" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/degree-diploma-colleges.ssc94" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>45</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/tulip-preschool.28658"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/tulip-preschool_1.gif" alt="Tulip Kids">Tulip Kids</a></td>
    <td>Education</td>
    <td>Rs. 10000 - 50 K</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>46</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/biba.75331"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biba_1.jpg" alt="Biba">Biba</td>
    <td>Fashion</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>47</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo">Easybuy</td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>48</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="FirstCry">FirstCry</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>49</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/LOUIS-PHILLIPE.gif" alt="Louis Philippe logo">Louis Philippe</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
       </td>
</tr><tr>
    <td>50</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="MANYAVAR logo">MANYAVAR</td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
</table>
<table class="table-striped table-responsive top-table moretext4" style="display: none;">

<tr>
    <td>51</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk logo">Siyaram Silk</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>52</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-arvind-store.29949"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-arvind-store_1.gif" alt="ARVIND LIMITED">ARVIND LIMITED</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>53</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/raymonds.75150"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/raymonds_1.jpg" alt="Raymonds logo">Raymonds</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>54</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TCNS-CLOTHING.gif" alt="W">W</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>55</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata logo">Bata</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>56</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart logo">Lenskart</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>57</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus logo">Titan Eye Plus</td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>58</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/cvc-opticals.36922"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/cvc-opticals_1.gif" alt="CVC Opticals">CVC Opticals
       </td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
            </td>
</tr>
<tr>
    <td>59</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd logo">Liberty Shoes Ltd</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
        View more
    </a>

    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>

<tr>
    <td>60</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista"> Barista</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>61</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins"> Baskin Robbins</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>62</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fresh-n-honest-coffee-point.33902"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fresh-n-honest-coffee-point_1.jpg" alt="Fresh & Honest Coffee Point"> Fresh & Honest Coffee Point</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>63</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FrontierBiscuit.19955"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FrontierBiscuit_1.jpg" alt="Frontier Biscuit Factory Pvt. Ltd."> Frontier Biscuit Factory Pvt. Ltd.</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>64</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/monginis.15829"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/monginis_1.jpg" alt="Monginis Foods Pvt Ltd"> Monginis Foods Pvt Ltd</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>65</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd."> Subway Systems India (P) Ltd.</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
         </td>
</tr>
<tr>
    <td>66</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/FARZI-CAFE.gif" alt="FARZI CAFÉ"> FARZI CAFÉ</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>67</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Us-Pizza.27020"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Us-Pizza_4.jpg" alt="U.S. Pizza"> U.S. Pizza</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>68</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/burger-rev.gif') }}" alt="Burger Revolution"> Burger Revolution</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 lac - 10 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>69</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/rasna-buzz.30285"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/rasna-buzz_1.gif" alt="Rasna Buzz"> Rasna Buzz</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>70</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="Superman"> Superman</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 lac - 60 lac.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>71</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/zomato.gif') }}" alt="Zomato"> Zomato</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 35 lac onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-food-ordering-services.ssc442" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-food-ordering-services.ssc442" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>72</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/doner-gyro.89251"><img src="{{ url('images/top100/brands/doner-gyro.gif') }}" alt="Doner & Gyros"> Doner & Gyros</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 55 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>73</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Fatburger.18215"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Fatburger_1.jpg" alt="Fatburger"> Fatburger</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>74</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/gelati.gif') }}" alt="Gelatissimo"> Gelatissimo</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 60 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>75</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/haagen.gif') }}" alt="Haagen-Dazs"> Haagen-Dazs</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 70 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>76</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/icream.gif') }}" alt="Icecream Lab"> Icecream Lab</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 35 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>77</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jj-chicken.56357"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jj-chicken_2.jpg" alt="JJ Chicken"> JJ Chicken</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>78</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/joost.gif') }}" alt="Joost Juice Bars"> Joost Juice Bars</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 25 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>70</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kerrimo.73437"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kerrimo_1.jpg" alt="Kerrimo"> Kerrimo</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
           <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>80</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/little-cesear-pizza') }}.gif" alt="Little Caesar"> Little Caesar</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 1.6 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>81</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/millies-cookies.28162"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/millies-cookies_1.png" alt="Millie's Cookies"> Millie's Cookies</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>82</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ritazza.28161"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/ritazza_1.png" alt="RITAZZA"> RITAZZA</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>83</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/sabroo.gif') }}" alt="Sbarro Pizza"> Sbarro Pizza</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 35 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>84</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/SumoSuchiAndBento.17617"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/sumo(199x81).gif" alt="Sumo Sushi & Bento"> Sumo Sushi & Bento</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </tr>

<tr>
    <td>85</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/wrap-it-up.29055"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/wrap-it-up_1.jpg" alt="Wrap It Up"> Wrap It Up</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>86</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL"> AMUL</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>87</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/MMTFranchise_1.gif" alt="MAKEMYTRIP"> MakeMyTrip India</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>

<tr>
 <td>88</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals">Ferns 'N' Petals</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>89</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/GodrejInterio-123.8762"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/GodrejInterio-123_1.jpg" alt="Godrej Interio">Godrej Interio</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>90</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/khadim.64592"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/khadim_1.jpg" alt="Khadim's logo">Khadim's</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>91</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige">TTK Prestige</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>92</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Puma-Logo.gif" alt="PUMA logo">PUMA</a></td>
    <td>Retail</td>
    <td>Rs. 40 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>93</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/tanishq.gif') }}" alt="TANISHQ">TANISHQ</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>94</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee logo">Vakrangee</a></td>
    <td>Retail</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>95</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone">BlueStone</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>96</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso">Miniso</a></td>
    <td>Retail</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
</tr>
<tr>
    <td>97</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry">Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>98</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/blinkit.75501"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/blinkit_1.png" alt="Grofers (Blinkit)">Grofers (Blinkit)</a></td>
    <td>Retail</td>
    <td>Rs. 18 Lac - 25 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>99</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/linen-house-by-kfpl.68734"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/linen-house-by-kfpl_1.jpg" alt="">Linen house</a></td>
    <td>Retail</td>
    <td>Rs. 15 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>100</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/BONBENO.gif" alt="BONBENO">BONBENO</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

        </table>
        <a class="load_more moreless-button4">Load more »</a>
        </div>
        <!-- all -->


        <!-- Automotive -->
<div id="automotive4" role="tabpanel" class="tab-pane ">
<table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>

<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/mahindra-first-choice-services.29348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mahindra-first-choice-services_1.gif" alt="Mahindra First Choice Services Ltd.">Mahindra First Choice Services Ltd.</a></td>
    <td>Automotive</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/amigo-auto-spa-private-limited.57163"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/amigo-auto-spa-private-limited_1.jpg" alt="AmigoSpa Auto Spa">AmigoSpa Auto Spa</a></td>
    <td>Automotive</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-and-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-and-detailing.ssc358" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/cars24-services-pvt-ltd.39672"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/cars24-services-pvt-ltd_1.gif" alt="Cars24">Cars24</a></td>
    <td>Automotive</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-reselling.ssc356" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
 </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{url('images/top100/brands/drivezy.gif')}}" alt="Drivezy">Drivezy</a></td>
    <td>Automotive</td>
    <td>Rs. 35 Lac - 60 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-rental.ssc546" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-rental.ssc546" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</tr>

</table>

</div>
<!-- Automotive -->
<!-- Beauty & Health -->
<div id="beauty4" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics"> Apollo Diagnostics</td>
    <td> Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                    </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs"> Dr Lal Path Labs</td>
    <td> Beauty & Health</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                    View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/golds-gym.1009"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Gold%27s-Gym.gif" alt="Gold’s Gym"> Gold’s Gym</td>
    <td> Beauty & Health</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                    View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jawed-habib-hair-and-beauty-limited.74924"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jawed-habib-hair-and-beauty-limited_1.jpg" alt="JAWED HABIB HAIR AND BEAUTY LIMITED"> JAWED HABIB HAIR AND BEAUTY LIMITED</td>
    <td> Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                    View more TONI&GUY
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td></tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="Lakme Salon"> Lakme Salon</td>
    <td> Beauty & Health</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
</td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/toniguy.41796"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/toniguy_1.gif" alt="TONI&GUY"> TONI&GUY</td>
    <td> Beauty & Health</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>    </td>
</tr>

<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/house-of-fitness-pvt-ltd.51366"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness"> Anytime Fitness</td>
    <td> Beauty & Health</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>

    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/truefitt&hill.gif') }}" alt="Truefitt & Hill"> Truefitt & Hill</td>
    <td> Beauty & Health</td>
    <td>Rs. 1 Cr. - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>

</table>

</div>
<!-- Beauty & Health -->
<!-- Business -->
<div id="business4" role="tabpanel" class="tab-pane">
<table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC logo">DTDC</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Edelweiss.gif" alt="EDELWEISS">EDELWEISS</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/icicid.gif') }}" alt="ICICIdirect">ICICIdirect</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/financial-investment-and-trading.ssc555" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/financial-investment-and-trading.ssc555" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/motilal_199x81.png" alt="Motilal Oswal Financial Service">Motilal Oswal Financial Service</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/remax(199x81).gif" alt="REMAX INDIA">REMAX INDIA</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean logo">U Clean</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
  </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/talent-corner-hr.742"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/talent-corner-hr_2.jpg" alt="Talent Corner HR Services">Talent Corner HR Services</a></td>
    <td>Business Services</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hr-recruitment.ssc161" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hr-recruitment.ssc161" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
   </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/5paisa.36730"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/5paisa_1.png" alt="5paisa Capital limited">5paisa Capital limited</a></td>
    <td>Business Services</td>
    <td>Rs. 10000 - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/actioncoach.30037"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/actioncoach_1.jpg" alt="ActionCOACH">ActionCOACH</a></td>
    <td>Business Services</td>
    <td>Rs. 10 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/service-for-smes.ssc159" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ChemDry-US.15156"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/chemdry.gif" alt="Chem Dry">Chem Dry</a></td>
    <td>Business Services</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franglobal.com/engage-and-grow/"><img src="https://www.franchiseindia.com/franchiseinternational/images/banners/homepage/engage_199x81.png" alt="Engage & Grow">Engage & Grow</a></td>
    <td>Business Services</td>
    <td>Rs. 2 lac - 5 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/career-counseling.ssc158" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/career-counseling.ssc158" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/regus.61289"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/regus_2.jpg" alt="IWG, Plc">IWG, Plc</a></td>
    <td>Business Services</td>
    <td>Rs. 5 Cr. onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eye-plus.28694"><img src="{{ url('images/top100/brands/sani-serv.gif') }}" alt="Saniservice">Saniservice</a></td>
    <td>Business Services</td>
    <td>Rs. 1 Cr. - 1.5 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/facility-management.ssc567" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/facility-management.ssc567" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
</table>

</div>
<!-- Business -->
<!-- Dealer -->
<div id="dealers4" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/xiaomi.gif') }}" alt="XIAOMI">XIAOMI</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/em.gif') }}" alt="Marshalls, India's No.1 Wallcoverings">Marshalls, India's No.1 Wallcoverings</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 25 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/home-furniture" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.dealerindia.com/dir/home-furniture" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>  </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/nature-care-inn-3629"><img src="https://img.franchiseindia.com/brands/logo/nature-care-innovation-services_1.png" alt="Nature Care Innovation Services">Nature Care Innovation Services</a></td>
    <td>Dealer & Distributors</td>
    <td>Rs. 3 lac - 4 lac</td>
    <td>
        <a target="_blank" href="https://www.dealerindia.com/dir/eco-friendly-products" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.dealerindia.com/dir/eco-friendly-products" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>

    </td>
</tr>
</table>

</div>
<!-- Dealer -->
<!-- Education -->
<div id="education4" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids">Eurokids</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee">Kidzee</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
      </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/NIIT.21675"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/niit(199x81)k7i2.gif" alt="NIIT Limited">NIIT Limited</a></td>
    <td>Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/aptech-montana-international-preschool.28127"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/aptech-montana-international-preschool_2.gif" alt="Aptech Montana International">Aptech Montana International</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/drs-kids.72963"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/drs-kids_1.jpg" alt="MDN Edify Education">MDN Edify Education</a></td>
    <td>Education</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Eye-Level-India.19395"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eye-level(199x81)9udc.gif" alt="Eye Level India">Eye Level India</a></td>
    <td>Education</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/school-tutoring.ssc92" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/school-tutoring.ssc92" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/seth-anandram-jaipuria-school.33897"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/seth-anandram-jaipuria-school_1.png" alt="Seth Anandram Jaipuria School">Seth Anandram Jaipuria School</a></td>
    <td>Education</td>
    <td>Rs. 5 Cr. - 10 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/toppr.29135"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/toppr_1.jpg" alt="Toppr Technologies">Toppr Technologies</a></td>
    <td>Education</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-learninge-learning.ssc107" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-learninge-learning.ssc107" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/no-img.gif') }}" alt="0-8 Early Start">0-8 Early Start</a></td>
    <td>Education</td>
    <td>Rs. 40 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/algorithmics-parakh-knowledge-academy.37722"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/algorithmics-parakh-knowledge-academy_1.png" alt="Algorithmics">Algorithmics</a></td>
    <td>Education</td>
    <td>Rs. 50 K - 2 Lac</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kipinae-kids.37561"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kipinae-kids_1.gif" alt="Kipina Worldwide">Kipina Worldwide</a></td>
    <td>Education</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/litter-kickers.gif') }}" alt="Little Kickers">Little Kickers</a></td>
    <td>Education</td>
    <td>Rs. 10 lac - 15 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/logischool.gif') }}" alt="Logiscool">Logiscool</a></td>
    <td>Education</td>
    <td>Rs. 30 lac - 70 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/new-horiza.gif') }}" alt="New Horizon">New Horizon</a></td>
    <td>Education</td>
    <td>Rs. 1 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/degree-diploma-colleges.ssc94" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/degree-diploma-colleges.ssc94" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/tulip-preschool.28658"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/tulip-preschool_1.gif" alt="Tulip Kids">Tulip Kids</a></td>
    <td>Education</td>
    <td>Rs. 10000 - 50 K</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty"> VLCC School of Beauty</td>
    <td> Education</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
            View more
</a>
<a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
    </td>
</tr>
</table>

</div>
<!-- Education -->
<!-- Fashion -->
<div id="fashion4" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/biba.75331"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biba_1.jpg" alt="Biba">Biba</td>
    <td>Fashion</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo">Easybuy</td>
    <td>Fashion</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="FirstCry">FirstCry</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/LOUIS-PHILLIPE.gif" alt="Louis Philippe logo">Louis Philippe</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
       </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="MANYAVAR logo">MANYAVAR</td>
    <td>Fashion</td>
    <td>Rs. 40 lac - 50 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk logo">Siyaram Silk</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-arvind-store.29949"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-arvind-store_1.gif" alt="ARVIND LIMITED">ARVIND LIMITED</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/raymonds.75150"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/raymonds_1.jpg" alt="Raymonds logo">Raymonds</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TCNS-CLOTHING.gif" alt="W">W</td>
    <td>Fashion</td>
    <td>Rs. 30 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata logo">Bata</td>
    <td>Fashion</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">

        </a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart logo">Lenskart</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus-chennai.65048"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus-chennai_1.gif" alt="Titan Eye Plus logo">Titan Eye Plus</td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/cvc-opticals.36922"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/cvc-opticals_1.gif" alt="CVC Opticals">CVC Opticals</td>
    <td>Fashion</td>
    <td>Rs. 20 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
            </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd logo">Liberty Shoes Ltd</td>
    <td>Fashion</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>

</table>

</div>
<!-- Fashion -->
<!-- food -->
<div id="food4" role="tabpanel" class="tab-pane">
  <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/barista.75327"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/barista_1.jpg" alt="Barista"> Barista</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
          <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins"> Baskin Robbins</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>

    </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/fresh-n-honest-coffee-point.33902"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/fresh-n-honest-coffee-point_1.jpg" alt="Fresh & Honest Coffee Point"> Fresh & Honest Coffee Point</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/FrontierBiscuit.19955"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FrontierBiscuit_1.jpg" alt="Frontier Biscuit Factory Pvt. Ltd."> Frontier Biscuit Factory Pvt. Ltd.</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/monginis.15829"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/monginis_1.jpg" alt="Monginis Foods Pvt Ltd"> Monginis Foods Pvt Ltd</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd."> Subway Systems India (P) Ltd.</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
          <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
         </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/FARZI-CAFE.gif" alt="FARZI CAFÉ"> FARZI CAFÉ</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>     </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Us-Pizza.27020"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Us-Pizza_4.jpg" alt="U.S. Pizza"> U.S. Pizza</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/burger-rev.gif') }}" alt="Burger Revolution"> Burger Revolution</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 lac - 10 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/rasna-buzz.30285"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/rasna-buzz_1.gif" alt="Rasna Buzz"> Rasna Buzz</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 lac - 20 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{url('images/top100/no-img.gif')}}" alt="Superman"> Superman</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 5 lac - 60 lac.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>    </td>
</tr>
<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/zomato.gif') }}" alt="Zomato"> Zomato</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 35 lac onwards</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-food-ordering-services.ssc442" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/online-food-ordering-services.ssc442" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/doner-gyro.89251"><img src="{{ url('images/top100/brands/doner-gyro.gif') }}" alt="Doner & Gyros"> Doner & Gyros</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 55 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Fatburger.18215"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Fatburger_1.jpg" alt="Fatburger"> Fatburger</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/gelati.gif') }}" alt="Gelatissimo"> Gelatissimo</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 60 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>16</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/haagen.gif') }}" alt="Haagen-Dazs"> Haagen-Dazs</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 70 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>17</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/icream.gif') }}" alt="Icecream Lab"> Icecream Lab</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 35 lac - 50 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>18</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/jj-chicken.56357"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jj-chicken_2.jpg" alt="JJ Chicken"> JJ Chicken</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>19</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/joost.gif') }}" alt="Joost Juice Bars"> Joost Juice Bars</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 25 lac - 30 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/juices-smoothies-dairy-parlors.ssc426" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>20</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/kerrimo.73437"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kerrimo_1.jpg" alt="Kerrimo"> Kerrimo</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
           <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>21</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/little-cesear-pizza') }}.gif" alt="Little Caesar"> Little Caesar</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 1.6 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        </td>
</tr>
<tr>
    <td>22</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/millies-cookies.28162"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/millies-cookies_1.png" alt="Millie's Cookies"> Millie's Cookies</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>23</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/ritazza.28161"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/ritazza_1.png" alt="RITAZZA"> RITAZZA</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tea-and-coffee-chain.ssc427" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>24</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/sabroo.gif') }}" alt="Sbarro Pizza"> Sbarro Pizza</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 35 lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pizzeria.ssc724" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>25</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/SumoSuchiAndBento.17617"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/sumo(199x81).gif" alt="Sumo Sushi & Bento"> Sumo Sushi & Bento</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Cr. - 5 Cr.</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </tr>
</tr>
<tr>
    <td>26</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/wrap-it-up.29055"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/wrap-it-up_1.jpg" alt="Wrap It Up"> Wrap It Up</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 30 Lac - 50 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr>
<tr>
    <td>27</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL"> AMUL</a></td>
    <td>Food and Beverage</td>
    <td>Rs. 2 Lac - 5 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
            View more        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
</table>

</div>
<!-- food -->
<!-- hotel -->
<div id="hotel4" role="tabpanel" class="tab-pane">
 <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/MMTFranchise_1.gif" alt="MAKEMYTRIP"> MakeMyTrip India</a></td>
    <td>Hotel, Travel & Tourism</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink"><img src="{{ url('images/top100/arrow-new.png') }}"></a>
    </td>
</tr></table>
</table>

</div>
<!-- hotel -->
<!-- retail -->
<div id="retail4" role="tabpanel" class="tab-pane">
   <table class="table-striped table-responsive top-table">
    <tr>
    <th>Rank</th>
    <th>Franchise Name</th>
    <th>Category</th>
    <th>Investment Range</th>
    <th>&nbsp;</th>
</tr>
<tr>
    <td>1</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals">Ferns 'N' Petals</a></td>
    <td>Retail</td>
    <td>Rs. 10 lac - 20 lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>2</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/GodrejInterio-123.8762"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/GodrejInterio-123_1.jpg" alt="Godrej Interio">Godrej Interio</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
       </td>
</tr>
<tr>
    <td>3</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/khadim.64592"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/khadim_1.jpg" alt="Khadim's logo">Khadim's</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>4</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige">TTK Prestige</a></td>
    <td>Retail</td>
    <td>Rs. 20 Lac - 30 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>

    </td>
</tr>
<tr>
    <td>5</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Puma-Logo.gif" alt="PUMA logo">PUMA</a></td>
    <td>Retail</td>
    <td>Rs. 40 lac - 60 lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>6</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{url('images/top100/brands/tanishq.gif')}}" alt="TANISHQ">TANISHQ</a></td>
    <td>Retail</td>
    <td>Rs. 1.5 Cr. onwards</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>7</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee logo">Vakrangee</a></td>
    <td>Retail</td>
    <td>Rs. 5 Lac - 10 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>8</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone">BlueStone</a></td>
    <td>Retail</td>
    <td>Rs. 1 Cr. - 2 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>9</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso">Miniso</a></td>
    <td>Retail</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">View more</a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
</tr>
<tr>
    <td>10</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry">Pepperfry</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>11</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/BONBENO.gif" alt="BONBENO">BONBENO</a></td>
    <td>Retail</td>
    <td>Rs. 10 Lac - 20 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>

<tr>
    <td>12</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/blinkit.75501"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/blinkit_1.png" alt="Grofers (Blinkit)">Grofers (Blinkit)</a></td>
    <td>Retail</td>
    <td>Rs. 18 Lac - 25 Lac</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/grocery-stores.ssc188" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
    </td>
</tr>
<tr>
    <td>13</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/linen-house-by-kfpl.68734"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/linen-house-by-kfpl_1.jpg" alt="">Linen house</a></td>
    <td>Retail</td>
    <td>Rs. 15 Lac - 30 Lac</td>
    <td>
         <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
        <td>
</tr>

</table>

</div>
<!-- retail -->

</div>
<!-- Tab Content -->


</div>
<!-- Year 2020 active Tab Content end-->



<!-- Year 2019 -->

<div id="year2019" role="tabpanel" class="tab-pane">

    <div class="top-hundred">
        <br>
    <h1>Top 100 Franchise/Franchisor 2019</h1>
    <p>Revealing brand impact, consumer value, and dynamic opportunities. Explore trends in Indian franchises, including global giants and emerging innovators. Rankings consider financial strength, expansion, growth rate, and success, reflecting a distinct identity, robust planning, support, innovation, and cultural sensitivity. This analysis assists franchisees and franchisors alike, offering insights into the franchise sector that underpin thriving business ventures.</p>
    <a data-target="#topFranchise" data-toggle="modal">Understand Selection Criteria</a>
    </div>


    <!-- Top 100 franchises -->
    <div class="top-hundred-tab">
    <h3>Browse Top 100 franchises by category</h3>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a role="tab" data-toggle="tab" href="#all5"><img src="{{ url('images/top100/brands.svg ') }}"alt=""> <span>all</span></a></li>
    <li role="presentation"><a role="tab" data-toggle="tab" href="#automotive5"><img src="{{ url('images/top100/automotive.svg') }}" alt=""> <span>Automotive</span></a></li>
    <li role="presentation"><a role="tab" data-toggle="tab" href="#beauty5"><img src="{{ url('images/top100/beauty.svg') }}" alt=""> <span>Beauty &<br> Health</span></a></li>
    <li role="presentation"><a role="tab" data-toggle="tab" href="#business5"><img src="{{ url('images/top100/business.svg') }}" alt=""> <span>Business<br> Services</span></a></li>
    <li role="presentation"><a role="tab" data-toggle="tab" href="#dealers5"><img src="{{ url('images/top100/dealers.svg') }}" alt=""> <span>Dealers &<br> Distributors</span></a></li>
    <li role="presentation"><a role="tab" data-toggle="tab" href="#education5"><img src="{{ url('images/top100/education.svg') }}" alt=""> <span>Education</span></a></li>
    <li role="presentation"><a role="tab" data-toggle="tab" href="#fashion5"><img src="{{ url('images/top100/fashion.svg') }}" alt=""> <span>Fashion</span></a></li>
    <li role="presentation"><a role="tab" data-toggle="tab" href="#food5"><img src="{{ url('images/top100/food.svg') }}" alt=""> <span>Food And<br> Beverage</span></a></li>

    <li role="presentation"><a role="tab" data-toggle="tab" href="#hotel5"><img src="{{ url('images/top100/hotel.svg') }}" alt=""> <span>Hotel, Travel<br> & Tourism</span></a></li>
    <li role="presentation"><a role="tab" data-toggle="tab" href="#retail5"><img src="{{ url('images/top100/retail.svg') }}" alt=""> <span>Retail</span></a></li>

    </ul>
    </div>



    <!-- Tab Content -->
    <div class="tab-content">
         <!-- all -->
    <div id="all5" role="tabpanel" class="tab-pane active">
        <table class="table-striped table-responsive top-table">
            <tr>
            <th>Rank</th>
            <th>Franchise Name</th>
            <th>Category</th>
            <th>Investment Range</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <td>1</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/mahindra-first-choice-services.29348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mahindra-first-choice-services_1.gif" alt="Mahindra First Choice Services Ltd.">Mahindra First Choice Services Ltd.</a></td>
            <td>Automotive</td>
            <td>Rs. 50 Lac - 1 Cr</td>
            <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
           </td>
        </tr>
        <tr>
            <td>2</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/credar.68223"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/credar_1.jpg" alt="Credr">Credr</a></td>
            <td>Automotive</td>
            <td>Rs. 30 Lac - 50 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
        </tr>
        <tr>
            <td>3</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty logo">VLCC School of Beauty</td>
            <td> Education</td>
            <td>Rs. 30 Lac - 50 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>

        <tr>
            <td>4</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/jawed-habib-hair-and-beauty-limited.74924"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jawed-habib-hair-and-beauty-limited_1.jpg" alt="JAWED HABIB HAIR AND BEAUTY LIMITED">JAWED HABIB HAIR AND BEAUTY LIMITED</td>
            <td> Beauty & Health</td>
            <td>Rs. 30 Lac - 50 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>5</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/golds-gym.1009"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Gold%27s-Gym.gif" alt="Gold’s Gym"> Gold’s Gym</td>
            <td> Beauty & Health</td>
            <td>Rs. 1 Cr. - 2 Cr.</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
             </td>
        </tr>
        <tr>
            <td>6</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="Lakme Salon"> Lakme Salon</td>
            <td> Beauty & Health</td>
            <td>Rs. 30 Lac - 50 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>7</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/LOOKS-SALON.gif" alt="LOOKS SALON">LOOKS SALON</td>
            <td> Beauty & Health</td>
            <td>Rs. 30 lac - 50 lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
        </tr>
        <tr>
            <td>8</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/SHAHNAZ-HUSAIN.gif" alt="SHAHNAZ HUSAIN"> SHAHNAZ HUSAIN</td>
            <td> Beauty & Health</td>
            <td>N/A</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
             </td>
        </tr>
        <tr>
            <td>9</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TALKWALKAR%27S.gif" alt="TALKWALKAR'S"> TALKWALKAR'S</td>
            <td> Beauty & Health</td>
            <td>N/A</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
           </td>
            </tr>
            <tr>
                <td>10</td>
                <td><a target="_blank" href="https://www.franchiseindia.com/brands/sanjivani.77085"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/sanjivani_1.png" alt="Sanjivani">Sanjivani</td>
                <td> Beauty & Health</td>
                <td>Rs. 10 Lac - 20 Lac</td>
                <td>
                    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="desklink">
                        View more
                    </a>
                    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="moblink">
                        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                    </a>
                </td>
                </tr>
                <tr>
                    <td>11</td>
                    <td><a target="_blank" href="https://www.franchiseindia.com/brands/house-of-fitness-pvt-ltd.51366"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness"> Anytime Fitness</td>
                    <td> Beauty & Health</td>
                    <td>Rs. 2 Cr. - 5 Cr.</td>
                    <td>
                        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                            View more
                        </a>
                        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                        </a>
                </td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td><a target="_blank" href="https://www.franchiseindia.com/brands/patanjali-ayurved.85107"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/patanjali-ayurved_1.gif" alt="PATANJALI">PATANJALI</td>
                        <td> Beauty & Health</td>
                        <td>Rs. 50 Lac - 1 Cr.</td>
                        <td>
                            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62" class="desklink">
                                View more
                            </a>
                            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62" class="moblink">
                                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                            </a>                  </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td><a target="_blank" href="https://www.franchiseindia.com/brands/davaindia.85921"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/davaindia_1.gif" alt="DavaIndia">DavaIndia</td>
                            <td> Beauty & Health</td>
                            <td>Rs. 5 Lac - 10 Lac</td>
                            <td>
                                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="desklink">
                                    View more
                                </a>
                                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="moblink">
                                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                                </a>
</td>
                            </tr>
    <tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso">Miniso</td>
    <td> Beauty & Health</td>
    <td>Rs. 50 Lac - 1 Cr.</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
    </tr>
    <tr>
    <td>15</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Sri-Sri-Tattva-Logo.gif" alt="SRI SRI TATTVA">SRI SRI TATTVA</td>
    <td> Beauty & Health</td>
    <td>N/A</td>
    <td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
    </tr>
    <tr>
        <td>16</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics logo">Apollo Diagnostics</td>
        <td> Beauty & Health</td>
        <td>Rs. 10 K - 50 K</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
      </td>
        </tr>

        <tr>
            <td>17</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/motilal_199x81.png" alt="Motilal Oswal Financial Service">Motilal Oswal Financial Service</a></td>
            <td>Business Services</td>
            <td>Rs. 10 Lac - 20 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
               </td>
        </tr>
        <tr>
            <td>18</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs logo">Dr Lal Path Labs</a></td>
            <td>Business Services</td>
            <td>Rs. 50 K - 2 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
        </tr>
        <tr>
            <td>19</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/ICFL_ALC.18993"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/icfl(199x81)troz.gif" alt="ICICI Securities">ICICI Securities</a></td>
            <td>Business Services</td>
            <td>Rs. 5 Lac - 10 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/banking-insurance-training-instit.ssc103" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/banking-insurance-training-instit.ssc103" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
         </td>
        </tr>
        <tr>
            <td>20</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC logo">DTDC</a></td>
            <td>Business Services</td>
            <td>Rs. 2 Lac - 5 Lac</td>
            <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
        </tr>
        <tr>
            <td>21</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/Angel-Broking.26319"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Angel-Broking_1.jpg" alt="Angel Broking Pvt Ltd">Angel Broking Pvt Ltd</a></td>
            <td>Business Services</td>
            <td>Rs. 50 K - 2 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>22</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Edelweiss.gif" alt="EDELWEISS">EDELWEISS</a></td>
            <td>Business Services</td>
            <td>Rs. 2 lac - 5 lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
            </td>
        </tr>
        <tr>
            <td>23</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/gati.74993"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/gati_1.jpg" alt="GATI">GATI</a></td>
            <td>Business Services</td>
            <td>Rs. 10 Lac - 20 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
       </td>
        </tr>
        <tr>
            <td>24</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/India-Post-Logo.gif" alt="INDIA POST">INDIA POST</a></td>
            <td>Business Services</td>
            <td>N/A</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
        </tr>
        <tr>
            <td>25</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean logo">U Clean</a></td>
            <td>Business Services</td>
            <td>Rs. 10 Lac - 20 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>26</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/remax(199x81).gif" alt="REMAX INDIA">REMAX INDIA</a></td>
            <td>Business Services</td>
            <td>Rs. 10 Lac - 20 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>27</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/Inxpress-DHL.10505"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Inxpress-DHL_2.jpg" alt="Inxpress">Inxpress</a></td>
            <td>Business Services</td>
            <td>images/no-img.gifs</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
     </td>
        </tr>
        <tr>
            <td>28</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/Hicare_Services.17109"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/hicare(199x81)ohjf.gif" alt="Hicare Services">Hicare Services</a></td>
            <td>Business Services</td>
            <td>Rs. 5 Lac - 10 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pest-control.ssc152" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pest-control.ssc152" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
              </td>
        </tr>
        <tr>
            <td>29</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/3M-Car-Care.21349"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/car.gif" alt="3M CAR CARE">3M CAR CARE</a></td>
            <td>Business Services</td>
            <td>Rs. 30 lac - 50 lac</td>
            <td>
                 <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailin-coating-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailin" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
                    </a></td>
        </tr>
        <tr>
            <td>30</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/Gait-View.18465"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Gait-View_1.jpg" alt="Gait View Technophiles">Gait View Technophiles</a></td>
            <td>Business Services</td>
            <td>Rs. 50 K - 2 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/computer-and-ict-services.ssc131" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/computer-and-ict-services.ssc131" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>31</td>
            <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Apollo-Tyres.gif" alt="APOLLO TYRES">APOLLO TYRES</a></td>
            <td>Dealer & Distributors</td>
            <td>Rs. 50 Lac - 1 Cr.</td>
            <td>
                <a target="_blank" href="https://www.dealerindia.com/dir/tyre-tubes-accessories" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.dealerindia.com/dir/tyre-tubes-accessories" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
            </td>
        </tr>
        <tr>
            <td>32</td>
            <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/KURL-ON.gif" alt="KURL-ON">KURL-ON</a></td>
            <td>Dealer & Distributors</td>
            <td>N/A</td>
            <td>
                <a target="_blank" href="https://www.dealerindia.com/dir/home-furnishing-items" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.dealerindia.com/dir/home-furnishing-items" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
                </td>
        </tr>
        <tr>
            <td>33</td>
            <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/NAYARA-ENERGY.gif" alt="NAYARA ENERGY">NAYARA ENERGY</a></td>
            <td>Dealer & Distributors</td>
            <td>Rs. 50 lac - 1 Cr.</td>
            <td>
                <a target="_blank" href="https://www.dealerindia.com/dir/food-processing-plants-machinery" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.dealerindia.com/dir/food-processing-plants-machinery" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>34</td>
            <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/xiaomi.gif') }}" alt="XIAOMI">XIAOMI</a></td>
            <td>Dealer & Distributors</td>
            <td>Rs. 10 lac - 20 lac</td>
            <td>
                <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
            </td>
        </tr>
        <tr>
            <td>35</td>
            <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/mad-2708"><img src="https://img.franchiseindia.com/brands/logo/mad_2.gif" alt="MAD ABOUT DOGS">MAD ABOUT DOGS</a></td>
            <td>Dealer & Distributors</td>
            <td>Rs. 10 Lac - 20 Lac</td>
            <td>
                <a target="_blank" href="https://www.dealerindia.com/dir/pet-products-furniture" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.dealerindia.com/dir/pet-products-furniture" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
</td>
        </tr>
        <tr>
            <td>36</td>
            <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Cube-Elevators-Logo.gif" alt="CUBE ELEVATORS">CUBE ELEVATORS</a></td>
            <td>Dealer & Distributors</td>
            <td>N/A</td>
            <td>
                <a target="_blank" href="https://www.dealerindia.com/dir/cranes-forklifts" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.dealerindia.com/dir/cranes-forklifts" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </tr>

    <tr>
        <td>37</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids">Eurokids</a></td>
        <td>Education</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>38</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee">Kidzee</a></td>
        <td>Education</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>39</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/NIIT.21675"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/niit(199x81)k7i2.gif" alt="NIIT Limited">NIIT Limited</a></td>
        <td>Education</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>40</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/aptech-montana-international-preschool.28127"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/aptech-montana-international-preschool_2.gif" alt="Aptech Montana International">Aptech Montana International</a></td>
        <td>Education</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>

    <tr>
        <td>41</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/timesvarsity.9913"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/TI(199x81).gif" alt="TIMTS">TIMTS</a></td>
        <td>Education</td>
        <td>Rs. 5 lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>42</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/shanti-educational-initiatives-ltd.37619"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/shanti-educational-initiatives-ltd_1.jpg" alt="SHANTI JUNIORS">SHANTI JUNIORS</a></td>
        <td>Education</td>
        <td>Rs. 5 lac - 10 Lac</td>
        <td>
              <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>43</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Jaipuria-School.11382"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Jaipuria-Group.gif" alt="Jaipuria Schools">Jaipuria Schools</a></td>
        <td>Education</td>
        <td>Rs. 8 Cr. - 10 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>         </td>
    </tr>
    <tr>
        <td>44</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Kumon-Logo.gif" alt="KUMON">KUMON</a></td>
        <td>Education</td>
        <td>Rs. 5 lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>      </td>
    </tr>
    <tr>
        <td>45</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/HummingBirdEducation.5296"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/HummingBirdEducation_1.gif" alt="HUMMING BIRD EDUCATION">HUMMING BIRD EDUCATION</a></td>
        <td>Education</td>
        <td>Rs. 50 K - 2 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/extra-curriculum-activities.ssc261" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/extra-curriculum-activities.ssc261" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>46</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Doon-Public-School.18242"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Doon-Public-School_1.gif" alt="Doon Public School">Doon Public School</a></td>
        <td>Education</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>47</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/SPEROWZ-PRE-SACHOOL.gif" alt="Doon Public School">SPEROWZ PRE SCHOOL</a></td>
        <td>Education</td>
        <td>N/A</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>48</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Centre-of-Learning.7867"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Thomas.GIF" alt="Thomas Cook - Centre of Learning">Thomas Cook - Centre of Learning</a></td>
        <td>Education</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/degree-diploma-colleges.ssc94" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/degree-diploma-colleges.ssc94" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>49</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus.27833"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus_1.jpg" alt="TITAN COMPANY">TITAN COMPANY</td>
        <td>Fashion</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories-men.ssc562" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories-men.ssc562" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
                    </td>
    </tr>

    <tr>
        <td>50</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-arvind-store.29949"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-arvind-store_1.gif" alt="ARVIND LIMITED">ARVIND LIMITED</td>
        <td>Fashion</td>
        <td>Rs. 30 Lac - 2 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
</table>
<table class="table-striped table-responsive top-table moretext5" style="display: none;">
    <tr>
        <td>51</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk logo">Siyaram Silk</td>
        <td>Fashion</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>52</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd logo">Liberty Shoes Ltd</td>
        <td>Fashion</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>53</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/raymonds.75150"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/raymonds_1.jpg" alt="Raymonds logo">Raymonds</td>
        <td>Fashion</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>54</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/WESTSIDE.gif" alt="WESTSIDE">WESTSIDE</td>
        <td>Fashion</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>55</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/biba.75331"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biba_1.jpg" alt="Biba">Biba</td>
        <td>Fashion</td>
        <td>Rs. 2 Cr. - 5 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>56</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/roman-island.79786"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/roman-island_1.jpg" alt="Roman Island">Roman Island</td>
        <td>Fashion</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>57</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart logo">Lenskart</td>
        <td>Fashion</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>58</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/HIMALAYA-OPTICAL.gif" alt="HIMALAYA OPTICAL">HIMALAYA OPTICAL</td>
        <td>Fashion</td>
        <td>Rs. 50 lac - 1 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>59</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="FirstCry">FirstCry</td>
        <td>Fashion</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>60</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata logo">Bata</td>
        <td>Fashion</td>
        <td>Rs. 30 Lac - 50 Lac </td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>61</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Amante-Logo.gif" alt="AMANTE">AMANTE</td>
        <td>Fashion</td>
        <td>Rs. 50 lac - 1 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
                    </td>
    </tr>
    <tr>
        <td>62</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/baggit.73455"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/baggit_1.jpg" alt="Baggit India logo">Baggit India</td>
        <td>Fashion</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>63</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="MANYAVAR logo">MANYAVAR</td>
        <td>Fashion</td>
        <td>Rs. 40 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>64</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TCNS-CLOTHING.gif" alt="TCNS CLOTHING logo">TCNS CLOTHING</td>
        <td>Fashion</td>
        <td>Rs. 30 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>65</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/monginis.15829"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/monginis_1.jpg" alt="Monginis Foods Pvt Ltd"> Monginis Foods Pvt Ltd</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>66</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/FrontierBiscuit.19955"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FrontierBiscuit_1.jpg" alt="Frontier Biscuit Factory Pvt. Ltd."> Frontier Biscuit Factory Pvt. Ltd.</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 5 Lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>67</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins"> Baskin Robbins</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>68</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL (GCMF LTD)"> AMUL (GCMF LTD)</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>        </td>
    </tr>
    <tr>
        <td>69</td>
        <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/bikanervala-foo-4400"><img src="https://img.franchiseindia.com/brands/logo/440510772.gif" alt="Bikanervala Foods Pvt Ltd"> Bikanervala Foods Pvt Ltd</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
            <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>70</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/KFC_199X81.gif" alt="KFC"> KFC</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 1 Cr. - 1.6 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>71</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/mother-dairy.85110"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mother-dairy_1.jpg" alt="MOTHER DAIRY"> MOTHER DAIRY</a></td>
        <td>Food and Beverage</td>
        <td>N/A</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>72</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd."> Subway Systems India (P) Ltd.</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 50 Lac - 1 Cr</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>73</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/THE-BELGIAN-WAFFLE-CO.gif" alt="THE BELGIAN WAFFLE CO"> THE BELGIAN WAFFLE CO</a></td>
        <td>Food and Beverage</td>
        <td>Rs. Rs. 20lac - 30lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>74</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/KRISPY-KREME.gif" alt="KRISPY KREME"> KRISPY KREME</a></td>
        <td>Food and Beverage</td>
        <td>N/A</td>
        <td>
              <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>75</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/pbrals-fresh-and-naturelle-ice-cream.5942"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pabrai(199x81).gif" alt="Pabrai's Fresh & Naturelle Ice Creams"> Pabrai's Fresh & Naturelle Ice Creams</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>76</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/millies-cookies.28162"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/millies-cookies_1.png" alt="Millie's Cookies"> Millie's Cookies</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>77</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/DHADHOOM.gif" alt="DHADHOOM"> DHADHOOM</a></td>
        <td>Food and Beverage</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>78</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/FARZI-CAFE.gif" alt="FARZI CAFÉ"> FARZI CAFÉ</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 2 Cr. - 5 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>79</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/THAT-ITALIAN-PLACE.gif" alt="THAT ITALIAN PLACE & CAFÉ BANCHETTA"> THAT ITALIAN PLACE & CAFÉ BANCHETTA</a></td>
        <td>Food and Beverage</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>        </td>
    </tr>
    <tr>
        <td>80</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/MMTFranchise_1.gif" alt="MAKEMYTRIP"> MakeMyTrip India</a></td>
        <td>Hotel, Travel & Tourism</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>81</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/marriot.gif') }}" alt="MARRIOTT">MARRIOTT</a></td>
        <td>Hotel, Travel & Tourism</td>
        <td>Rs. 5 Cr. onwards</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>82</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/oyo.gif') }}" alt="OYO">OYO</a></td>
        <td>Hotel, Travel & Tourism</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>83</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee logo">Vakrangee</a></td>
        <td>Retail</td>
        <td>Rs. 5 Lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>84</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige">TTK Prestige</a></td>
        <td>Retail</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>85</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/GodrejInterio-123.8762"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/GodrejInterio-123_1.jpg" alt="Godrej Interio">Godrej Interio</a></td>
        <td>Retail</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>86</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals">Ferns 'N' Petals</a></td>
        <td>Retail</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>        </td>
    </tr>
    <tr>
        <td>87</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/LOUIS-PHILLIPE.gif" alt="Louis Philippe logo">Louis Philippe</a></td>
        <td>Retail</td>
        <td>Rs. 30 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>88</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/MAX-FASHIONS.gif" alt="MAX FASHIONS">MAX FASHIONS</a></td>
        <td>Retail</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>89</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Puma-Logo.gif" alt="PUMA logo">PUMA</a></td>
        <td>Retail</td>
        <td>Rs. 40 lac - 60 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>90</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/samsung.gif" alt="SAMSUNG">SAMSUNG</a></td>
        <td>Retail</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>91</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TANISHQ.gif" alt="TANISHQ">TANISHQ</a></td>
        <td>Retail</td>
        <td>Rs. 1.5 Cr. onwards</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>92</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/VIP-Logo.gif" alt="VIP Bags logo">VIP Bags</a></td>
        <td>Retail</td>
        <td>Rs. 15 lac - 25 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>93</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/PC-Jeweller-Ltd.24469"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/PC-Jeweller-Ltd_1.jpg" alt="PC Jeweller">PC Jeweller</a></td>
        <td>Retail</td>
        <td>Rs. 5 Cr. - 10 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>94</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo">Easybuy</a></td>
        <td>Retail</td>
        <td>Rs. 50 Lac - 1 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>95</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry">Pepperfry</a></td>
        <td>Retail</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>96</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/BONBENO.gif" alt="BONBENO">BONBENO</a></td>
        <td>Retail</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>97</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Phonup-Logo.gif" alt="PHONEUP">PHONEUP</a></td>
        <td>Retail</td>
        <td>Rs. 5 Lac - 10 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>98</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Mobel-Furniture-Logo.gif" alt="MOBEL">MOBEL</a></td>
        <td>Retail</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>99</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone">BlueStone</a></td>
        <td>Retail</td>
        <td>Rs. 1 Cr. - 2 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>

    <tr>
        <td>100</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/thyrocare-technologies-ltd.63413"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/thyrocare-technologies-ltd_1.jpg" alt="Thyrocare">Thyrocare</td>
        <td> Beauty & Health</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
        </tr>
        </table>
        <a class="load_more moreless-button5">Load more »</a>
        </div>
        <!-- all -->



    <!-- Automotive -->
    <div id="automotive5" role="tabpanel" class="tab-pane">
    <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/mahindra-first-choice-services.29348"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mahindra-first-choice-services_1.gif" alt="Mahindra First Choice Services Ltd.">Mahindra First Choice Services Ltd.</a></td>
        <td>Automotive</td>
        <td>Rs. 50 Lac - 1 Cr</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-maintanance-repair-services.ssc353" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/credar.68223"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/credar_1.jpg" alt="Credr">Credr</a></td>
        <td>Automotive</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bike-showroom.ssc346" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>


    </table>

    </div>
    <!-- Automotive -->

    <!-- Beauty & Health -->
    <div id="beauty5" role="tabpanel" class="tab-pane">
     <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/VLCC-Center.17271"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/VLCC-School-of-Beauty_1.jpg" alt="VLCC School of Beauty logo">VLCC School of Beauty</td>
        <td> Education</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td> <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-and-wellness-training-institute.ssc102" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a></td>
    </tr>

    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/jawed-habib-hair-and-beauty-limited.74924"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/jawed-habib-hair-and-beauty-limited_1.jpg" alt="JAWED HABIB HAIR AND BEAUTY LIMITED">JAWED HABIB HAIR AND BEAUTY LIMITED</td>
        <td> Beauty & Health</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/golds-gym.1009"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Gold%27s-Gym.gif" alt="Gold’s Gym"> Gold’s Gym</td>
        <td> Beauty & Health</td>
        <td>Rs. 1 Cr. - 2 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lakme-Salon.9448"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lakme-Salon_1.gif" alt="Lakme Salon"> Lakme Salon</td>
        <td> Beauty & Health</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/LOOKS-SALON.gif" alt="LOOKS SALON">LOOKS SALON</td>
        <td> Beauty & Health</td>
        <td>Rs. 30 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/SHAHNAZ-HUSAIN.gif" alt="SHAHNAZ HUSAIN"> SHAHNAZ HUSAIN</td>
        <td> Beauty & Health</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/beauty-salons.ssc47" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TALKWALKAR%27S.gif" alt="TALKWALKAR'S"> TALKWALKAR'S</td>
        <td> Beauty & Health</td>
        <td>N/A</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
</td>
        </tr>
        <tr>
            <td>8</td>
            <td><a target="_blank" href="https://www.franchiseindia.com/brands/sanjivani.77085"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/sanjivani_1.png" alt="Sanjivani">Sanjivani</td>
            <td> Beauty & Health</td>
            <td>Rs. 10 Lac - 20 Lac</td>
            <td>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
    </td>
            </tr>
            <tr>
                <td>9</td>
                <td><a target="_blank" href="https://www.franchiseindia.com/brands/house-of-fitness-pvt-ltd.51366"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/house-of-fitness-pvt-ltd_2.jpg" alt="Anytime Fitness"> Anytime Fitness</td>
                <td> Beauty & Health</td>
                <td>Rs. 2 Cr. - 5 Cr.</td>
                <td>
                    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="desklink">
                        View more
                    </a>
                    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/gyms-and-fitness-centres.ssc52" class="moblink">
                        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                    </a>
      </td>
                </tr>
                <tr>
                    <td>10</td>
                    <td><a target="_blank" href="https://www.franchiseindia.com/brands/patanjali-ayurved.85107"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/patanjali-ayurved_1.gif" alt="PATANJALI">PATANJALI</td>
                    <td> Beauty & Health</td>
                    <td>Rs. 50 Lac - 1 Cr.</td>
                    <td>
                        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62" class="desklink">
                            View more
                        </a>
                        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ayurvedic-herbal-and-organic-products.ssc62" class="moblink">
                            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                        </a>
                    </td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td><a target="_blank" href="https://www.franchiseindia.com/brands/davaindia.85921"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/davaindia_1.gif" alt="DavaIndia">DavaIndia</td>
                        <td> Beauty & Health</td>
                        <td>Rs. 5 Lac - 10 Lac</td>
                        <td>
                            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="desklink">
                                View more
                            </a>
                            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pharmacies.ssc58" class="moblink">
                                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                            </a>
</td>
                        </tr>
<tr>
<td>12</td>
<td><a target="_blank" href="https://www.franchiseindia.com/brands/miniso.75793"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/miniso_1.gif" alt="Miniso">Miniso</td>
<td> Beauty & Health</td>
<td>Rs. 50 Lac - 1 Cr.</td>
<td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/cosmetics-beauty-product-stores.ssc49" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
<td>13</td>
<td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Sri-Sri-Tattva-Logo.gif" alt="SRI SRI TATTVA">SRI SRI TATTVA</td>
<td> Beauty & Health</td>
<td>N/A</td>
<td>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="desklink">
        View more
    </a>
    <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-health-care-and-fitness.ssc63" class="moblink">
        <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
    </a>
</td>
</tr>
<tr>
    <td>14</td>
    <td><a target="_blank" href="https://www.franchiseindia.com/brands/apollo-diagnostics.66969"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/apollo-diagnostics_1.gif" alt="Apollo Diagnostics logo">Apollo Diagnostics</td>
    <td> Beauty & Health</td>
    <td>Rs. 10 K - 50 K</td>
    <td>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                    </a>
    </td>
    </tr>

    <tr>
        <td>15</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/thyrocare-technologies-ltd.63413"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/thyrocare-technologies-ltd_1.jpg" alt="Thyrocare">Thyrocare</td>
        <td> Beauty & Health</td>
        <td>Rs. 10 K - 50 K</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
        </tr>


    </table>

    </div>
    <!-- Beauty & Health -->
    <!-- Business -->
    <div id="business5" role="tabpanel" class="tab-pane">
    <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/motilal_199x81.png" alt="Motilal Oswal Financial Service">Motilal Oswal Financial Service</a></td>
        <td>Business Services</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
</td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/LPLF.12738"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/LPLF_1.gif" alt="Dr Lal Path Labs logo">Dr Lal Path Labs</a></td>
        <td>Business Services</td>
        <td>Rs. 50 K - 2 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pathological-labs.ssc51" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/ICFL_ALC.18993"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/icfl(199x81)troz.gif" alt="ICICI Securities">ICICI Securities</a></td>
        <td>Business Services</td>
        <td>Rs. 5 Lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/banking-insurance-training-instit.ssc103" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/banking-insurance-training-instit.ssc103" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
</td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/DTDC-Express.17643"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/DTDC-Express_1.gif" alt="DTDC logo">DTDC</a></td>
        <td>Business Services</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
</td>
    </tr>
    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Angel-Broking.26319"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Angel-Broking_1.jpg" alt="Angel Broking Pvt Ltd">Angel Broking Pvt Ltd</a></td>
        <td>Business Services</td>
        <td>Rs. 50 K - 2 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/finance-advisors-brokers.ssc137" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
</a>
</td>
    </tr>
    <tr>
        <td>6</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Edelweiss.gif" alt="EDELWEISS">EDELWEISS</a></td>
        <td>Business Services</td>
        <td>Rs. 2 lac - 5 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/microfinance.ssc138" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>7</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/gati.74993"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/gati_1.jpg" alt="GATI">GATI</a></td>
        <td>Business Services</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
            </td>
    </tr>
    <tr>
        <td>8</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/India-Post-Logo.gif" alt="INDIA POST">INDIA POST</a></td>
        <td>Business Services</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>9</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/uclean.21731"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/uclean_2.jpg" alt="U Clean logo">U Clean</a></td>
        <td>Business Services</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/laundry-dry-cleaning.ssc150" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
          </td>
    </tr>
    <tr>
        <td>10</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/REMAX-INDIA.25791"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/remax(199x81).gif" alt="REMAX INDIA">REMAX INDIA</a></td>
        <td>Business Services</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/real-estate-sub.ssc267" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>11</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Inxpress-DHL.10505"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Inxpress-DHL_2.jpg" alt="Inxpress">Inxpress</a></td>
        <td>Business Services</td>
        <td>images/no-img.gifs</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/courier-delivery.ssc127" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>12</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Hicare_Services.17109"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/hicare(199x81)ohjf.gif" alt="Hicare Services">Hicare Services</a></td>
        <td>Business Services</td>
        <td>Rs. 5 Lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pest-control.ssc152" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pest-control.ssc152" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    <tr>
        <td>13</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/3M-Car-Care.21349"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/car.gif" alt="3M CAR CARE">3M CAR CARE</a></td>
        <td>Business Services</td>
        <td>Rs. 30 lac - 50 lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ss-detailing.ssc358" class="desklink">
            View more
        </a>
        <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/car-wash-ceramic-coating-detailing.ss" class="moblink">
            <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
        </a>
            </a></td>
    </tr>
    <tr>
        <td>14</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Gait-View.18465"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Gait-View_1.jpg" alt="Gait View Technophiles">Gait View Technophiles</a></td>
        <td>Business Services</td>
        <td>Rs. 50 K - 2 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/computer-and-ict-services.ssc131" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/computer-and-ict-services.ssc131" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    </table>

    </div>
    <!-- Business -->
    <!-- Dealer -->
    <div id="dealers5" role="tabpanel" class="tab-pane">
      <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Apollo-Tyres.gif" alt="APOLLO TYRES">APOLLO TYRES</a></td>
        <td>Dealer & Distributors</td>
        <td>Rs. 50 Lac - 1 Cr.</td>
        <td>
            <a target="_blank" href="https://www.dealerindia.com/dir/tyre-tubes-accessories" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/tyre-tubes-accessories" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/KURL-ON.gif" alt="KURL-ON">KURL-ON</a></td>
        <td>Dealer & Distributors</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.dealerindia.com/dir/home-furnishing-items" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/home-furnishing-items" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
     </td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/NAYARA-ENERGY.gif" alt="NAYARA ENERGY">NAYARA ENERGY</a></td>
        <td>Dealer & Distributors</td>
        <td>Rs. 50 lac - 1 Cr.</td>
        <td>
            <a target="_blank" href="https://www.dealerindia.com/dir/food-processing-plants-machinery" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/food-processing-plants-machinery" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.dealerindia.com/"><img src="{{ url('images/top100/brands/xiaomi.gif') }}" alt="XIAOMI">XIAOMI</a></td>
        <td>Dealer & Distributors</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
            <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/electronic-products-components" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/mad-2708"><img src="https://img.franchiseindia.com/brands/logo/mad_2.gif" alt="MAD ABOUT DOGS">MAD ABOUT DOGS</a></td>
        <td>Dealer & Distributors</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.dealerindia.com/dir/pet-products-furniture" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/pet-products-furniture" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
</td>
    </tr>
    <tr>
        <td>6</td>
        <td><a target="_blank" href="https://www.dealerindia.com/"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Cube-Elevators-Logo.gif" alt="CUBE ELEVATORS">CUBE ELEVATORS</a></td>
        <td>Dealer & Distributors</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.dealerindia.com/dir/cranes-forklifts" class="desklink">
                View more
            </a>
            <a target="_blank" href="https://www.dealerindia.com/dir/cranes-forklifts" class="moblink">
                <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
            </a>
        </td>
    </tr>
    </table>

    </div>
    <!-- Dealer -->
    <!-- Education -->
    <div id="education5" role="tabpanel" class="tab-pane">
     <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/eurokids.68461"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/eurokids_2.jpg" alt="Eurokids">Eurokids</a></td>
        <td>Education</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/kidzee.76646"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/kidzee_1.jpg" alt="Kidzee">Kidzee</a></td>
        <td>Education</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/NIIT.21675"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/niit(199x81)k7i2.gif" alt="NIIT Limited">NIIT Limited</a></td>
        <td>Education</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/aptech-montana-international-preschool.28127"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/aptech-montana-international-preschool_2.gif" alt="Aptech Montana International">Aptech Montana International</a></td>
        <td>Education</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>

    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/timesvarsity.9913"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/TI(199x81).gif" alt="TIMTS">TIMTS</a></td>
        <td>Education</td>
        <td>Rs. 5 lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/it-education.ssc99" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/shanti-educational-initiatives-ltd.37619"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/shanti-educational-initiatives-ltd_1.jpg" alt="SHANTI JUNIORS">SHANTI JUNIORS</a></td>
        <td>Education</td>
        <td>Rs. 5 lac - 10 Lac</td>
        <td>
              <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Jaipuria-School.11382"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Jaipuria-Group.gif" alt="Jaipuria Schools">Jaipuria Schools</a></td>
        <td>Education</td>
        <td>Rs. 8 Cr. - 10 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>         </td>
    </tr>
    <tr>
        <td>8</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Kumon-Logo.gif" alt="KUMON">KUMON</a></td>
        <td>Education</td>
        <td>Rs. 5 lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/after-school-activities.ssc87" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>      </td>
    </tr>
    <tr>
        <td>9</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/HummingBirdEducation.5296"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/HummingBirdEducation_1.gif" alt="HUMMING BIRD EDUCATION">HUMMING BIRD EDUCATION</a></td>
        <td>Education</td>
        <td>Rs. 50 K - 2 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/extra-curriculum-activities.ssc261" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/extra-curriculum-activities.ssc261" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>10</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Doon-Public-School.18242"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Doon-Public-School_1.gif" alt="Doon Public School">Doon Public School</a></td>
        <td>Education</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/schools.ssc88" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>11</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/SPEROWZ-PRE-SACHOOL.gif" alt="Doon Public School">SPEROWZ PRE SCHOOL</a></td>
        <td>Education</td>
        <td>N/A</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/preschools.ssc85" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>12</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Centre-of-Learning.7867"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Thomas.GIF" alt="Thomas Cook - Centre of Learning">Thomas Cook - Centre of Learning</a></td>
        <td>Education</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/degree-diploma-colleges.ssc94" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/degree-diploma-colleges.ssc94" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    </table>

    </div>
    <!-- Education -->
    <!-- Fashion -->
    <div id="fashion5" role="tabpanel" class="tab-pane">
      <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/titan-eyeplus.27833"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/titan-eyeplus_1.jpg" alt="TITAN COMPANY">TITAN COMPANY</td>
        <td>Fashion</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories-men.ssc562" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories-men.ssc562" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
                    </td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/the-arvind-store.29949"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/the-arvind-store_1.gif" alt="ARVIND LIMITED">ARVIND LIMITED</td>
        <td>Fashion</td>
        <td>Rs. 30 Lac - 2 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/siyaram.7664"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/siyaram_2.jpg" alt="Siyaram Silk logo">Siyaram Silk</td>
        <td>Fashion</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Liberty-Shoes.9246"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Liberty-Shoes_1.jpg" alt="Liberty Shoes Ltd logo">Liberty Shoes Ltd</td>
        <td>Fashion</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/sports.ssc236" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/raymonds.75150"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/raymonds_1.jpg" alt="Raymonds logo">Raymonds</td>
        <td>Fashion</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-clothing.ssc558" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/WESTSIDE.gif" alt="WESTSIDE">WESTSIDE</td>
        <td>Fashion</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/departmentalunisex.ssc228" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/biba.75331"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/biba_1.jpg" alt="Biba">Biba</td>
        <td>Fashion</td>
        <td>Rs. 2 Cr. - 5 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>8</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/roman-island.79786"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/roman-island_1.jpg" alt="Roman Island">Roman Island</td>
        <td>Fashion</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-wear.ssc226" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>9</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Lenskart1.16842"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Lenskart1_1.jpg" alt="Lenskart logo">Lenskart</td>
        <td>Fashion</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>10</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/HIMALAYA-OPTICAL.gif" alt="HIMALAYA OPTICAL">HIMALAYA OPTICAL</td>
        <td>Fashion</td>
        <td>Rs. 50 lac - 1 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/opticianseye-wear.ssc246" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>11</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/FirstCry.5683"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FirstCry_1.gif" alt="FirstCry">FirstCry</td>
        <td>Fashion</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kids-wear.ssc225" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>12</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/bata.70810"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bata_1.jpg" alt="Bata logo">Bata</td>
        <td>Fashion</td>
        <td>Rs. 30 Lac - 50 Lac </td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/fashion-accessories.ssc248" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>13</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Amante-Logo.gif" alt="AMANTE">AMANTE</td>
        <td>Fashion</td>
        <td>Rs. 50 lac - 1 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/lingerie-and-innerwear.ssc232" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
                    </td>
    </tr>
    <tr>
        <td>14</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/baggit.73455"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/baggit_1.jpg" alt="Baggit India logo">Baggit India</td>
        <td>Fashion</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>15</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/manyavar.97335"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/manyavar_1.gif" alt="MANYAVAR logo">MANYAVAR</td>
        <td>Fashion</td>
        <td>Rs. 40 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ethnic-stores.ssc229" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>16</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TCNS-CLOTHING.gif" alt="TCNS CLOTHING logo">TCNS CLOTHING</td>
        <td>Fashion</td>
        <td>Rs. 30 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/womens-wear.ssc227" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>


    </table>

    </div>
    <!-- Fashion -->
    <!-- food -->
    <div id="food5" role="tabpanel" class="tab-pane">
      <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/monginis.15829"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/monginis_1.jpg" alt="Monginis Foods Pvt Ltd"> Monginis Foods Pvt Ltd</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/FrontierBiscuit.19955"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/FrontierBiscuit_1.jpg" alt="Frontier Biscuit Factory Pvt. Ltd."> Frontier Biscuit Factory Pvt. Ltd.</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 5 Lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/BaskinRobbins-India.18449"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/BaskinRobbins-India_1.gif" alt="Baskin Robbins"> Baskin Robbins</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/AmulScoopingParlours.14860"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/AmulScoopingParlours_1.jpg" alt="AMUL (GCMF LTD)"> AMUL (GCMF LTD)</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>        </td>
    </tr>
    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.dealerindia.com/manufacturer/bikanervala-foo-4400"><img src="https://img.franchiseindia.com/brands/logo/440510772.gif" alt="Bikanervala Foods Pvt Ltd"> Bikanervala Foods Pvt Ltd</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
            <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.dealerindia.com/dir/packaged-food-products-supplies" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/KFC_199X81.gif" alt="KFC"> KFC</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 1 Cr. - 1.6 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/casual-dine-restaurants.ssc432" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/mother-dairy.85110"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/mother-dairy_1.jpg" alt="MOTHER DAIRY"> MOTHER DAIRY</a></td>
        <td>Food and Beverage</td>
        <td>N/A</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/others-food-service.ssc84" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>8</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/subway-systems.1475"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/subway-systems_1.gif" alt="Subway Systems India (P) Ltd."> Subway Systems India (P) Ltd.</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 50 Lac - 1 Cr</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>9</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/THE-BELGIAN-WAFFLE-CO.gif" alt="THE BELGIAN WAFFLE CO"> THE BELGIAN WAFFLE CO</a></td>
        <td>Food and Beverage</td>
        <td>Rs. Rs. 20lac - 30lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>10</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/KRISPY-KREME.gif" alt="KRISPY KREME"> KRISPY KREME</a></td>
        <td>Food and Beverage</td>
        <td>N/A</td>
        <td>
              <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>11</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/pbrals-fresh-and-naturelle-ice-cream.5942"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pabrai(199x81).gif" alt="Pabrai's Fresh & Naturelle Ice Creams"> Pabrai's Fresh & Naturelle Ice Creams</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/ice-creams-yogurt-parlors.ssc436" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>12</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/millies-cookies.28162"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/millies-cookies_1.png" alt="Millie's Cookies"> Millie's Cookies</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 30 Lac - 50 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bakery-confectionary.ssc437" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>13</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/DHADHOOM.gif" alt="DHADHOOM"> DHADHOOM</a></td>
        <td>Food and Beverage</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>14</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/FARZI-CAFE.gif" alt="FARZI CAFÉ"> FARZI CAFÉ</a></td>
        <td>Food and Beverage</td>
        <td>Rs. 2 Cr. - 5 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>15</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/THAT-ITALIAN-PLACE.gif" alt="THAT ITALIAN PLACE & CAFÉ BANCHETTA"> THAT ITALIAN PLACE & CAFÉ BANCHETTA</a></td>
        <td>Food and Beverage</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/quick-service-restaurants.ssc428" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>        </td>
    </tr>
    </table>

    </div>
    <!-- food -->
    <!-- hotel -->
    <div id="hotel5" role="tabpanel" class="tab-pane">
     <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/MMTFranchise.5938"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/MMTFranchise_1.gif" alt="MAKEMYTRIP"> MakeMyTrip India</a></td>
        <td>Hotel, Travel & Tourism</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/tour-packages.ssc392" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/marriot.gif') }}" alt="MARRIOTT">MARRIOTT</a></td>
        <td>Hotel, Travel & Tourism</td>
        <td>Rs. 5 Cr. onwards</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="{{ url('images/top100/brands/oyo.gif') }}" alt="OYO">OYO</a></td>
        <td>Hotel, Travel & Tourism</td>
        <td>Rs. 2 Lac - 5 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/hotel-chain.ssc67" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    </table>

    </div>
    <!-- hotel -->
    <!-- retail -->
    <div id="retail5" role="tabpanel" class="tab-pane">
       <table class="table-striped table-responsive top-table">
        <tr>
        <th>Rank</th>
        <th>Franchise Name</th>
        <th>Category</th>
        <th>Investment Range</th>
        <th>&nbsp;</th>
    </tr>
    <tr>
        <td>1</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Vakrangee-Limited.18832"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/vakrangee(199x81).gif" alt="Vakrangee logo">Vakrangee</a></td>
        <td>Retail</td>
        <td>Rs. 5 Lac - 10 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/superstores.ssc186" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Prestige-Smart-Kitchen.2219"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Prestige-Smart-Kitchen_1.jpg" alt="TTK Prestige">TTK Prestige</a></td>
        <td>Retail</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/kitchen.ssc212" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/GodrejInterio-123.8762"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/GodrejInterio-123_1.jpg" alt="Godrej Interio">Godrej Interio</a></td>
        <td>Retail</td>
        <td>Rs. 20 Lac - 30 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/Ferns-N-Petals.28"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/Ferns-N-Petals_1.jpg" alt="Ferns 'N' Petals">Ferns 'N' Petals</a></td>
        <td>Retail</td>
        <td>Rs. 10 lac - 20 lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/florists.ssc207" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>        </td>
    </tr>
    <tr>
        <td>5</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/LOUIS-PHILLIPE.gif" alt="Louis Philippe logo">Louis Philippe</a></td>
        <td>Retail</td>
        <td>Rs. 30 lac - 50 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/MAX-FASHIONS.gif" alt="MAX FASHIONS">MAX FASHIONS</a></td>
        <td>Retail</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/readymade.ssc230" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Puma-Logo.gif" alt="PUMA logo">PUMA</a></td>
        <td>Retail</td>
        <td>Rs. 40 lac - 60 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mens-footwear.ssc559" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>8</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/samsung.gif" alt="SAMSUNG">SAMSUNG</a></td>
        <td>Retail</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>9</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/TANISHQ.gif" alt="TANISHQ">TANISHQ</a></td>
        <td>Retail</td>
        <td>Rs. 1.5 Cr. onwards</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>10</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/VIP-Logo.gif" alt="VIP Bags logo">VIP Bags</a></td>
        <td>Retail</td>
        <td>Rs. 15 lac - 25 lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/bags-luggage.ssc566" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>11</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/PC-Jeweller-Ltd.24469"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/PC-Jeweller-Ltd_1.jpg" alt="PC Jeweller">PC Jeweller</a></td>
        <td>Retail</td>
        <td>Rs. 5 Cr. - 10 Cr.</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/precious-jewellery.ssc241" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>12</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/easybuy.75355"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/easybuy_1.jpg" alt="Easybuy logo">Easybuy</a></td>
        <td>Retail</td>
        <td>Rs. 50 Lac - 1 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>13</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/pepperfry-private-limited.57134"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/pepperfry-private-limited_1.jpg" alt="Pepperfry">Pepperfry</a></td>
        <td>Retail</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/e-commerce-related.ssc223" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>14</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/BONBENO.gif" alt="BONBENO">BONBENO</a></td>
        <td>Retail</td>
        <td>Rs. 10 Lac - 20 Lac</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/pet-stores.ssc191" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>15</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Phonup-Logo.gif" alt="PHONEUP">PHONEUP</a></td>
        <td>Retail</td>
        <td>Rs. 5 Lac - 10 Lac</td>
        <td>
             <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/mobile-communicationinternet-con.ssc179" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>16</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/business-opportunities/all/all"><img src="https://www.franchiseindia.com/images/top-100-brand-logos/Mobel-Furniture-Logo.gif" alt="MOBEL">MOBEL</a></td>
        <td>Retail</td>
        <td>N/A</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/furniture-home-decor-and-furnishing.ssc213" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    <tr>
        <td>17</td>
        <td><a target="_blank" href="https://www.franchiseindia.com/brands/bluestone.31815"><img src="https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/franchisor/bluestone_1.gif" alt="BlueStone">BlueStone</a></td>
        <td>Retail</td>
        <td>Rs. 1 Cr. - 2 Cr.</td>
        <td>
            <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="desklink">
                    View more
                </a>
                <a target="_blank" href="https://www.franchiseindia.com/business-opportunities/designer-jewellery.ssc564" class="moblink">
                    <img src="{{ url('images/top100/arrow-new.png') }}" alt="">
                </a>
        </td>
    </tr>
    </table>

    </div>
    <!-- retail -->

    </div>
    <!-- Tab Content -->


    </div>

<!-- Year 2019 active Tab Content end-->



</div>
<!-- Years Tab Content end-->


<!-- Top 100 franchises -->
</div>


</div>


</div>
@include('static.top100_seo_desc')



<script type="text/javascript">
$('.moreless-button1').click(function() {
  $('.moretext1').slideToggle();
  if ($('.moreless-button1').text() == "Load more »") {
    $(this).text("Load less »")
  } else {
    $(this).text("Load more »")
  }
});

$('.moreless-button2').click(function() {
  $('.moretext2').slideToggle();
  if ($('.moreless-button2').text() == "Load more »") {
    $(this).text("Load less »")
  } else {
    $(this).text("Load more »")
  }
});

$('.moreless-button3').click(function() {
  $('.moretext3').slideToggle();
  if ($('.moreless-button3').text() == "Load more »") {
    $(this).text("Load less »")
  } else {
    $(this).text("Load more »")
  }
});

$('.moreless-button4').click(function() {
  $('.moretext4').slideToggle();
  if ($('.moreless-button4').text() == "Load more »") {
    $(this).text("Load less »")
  } else {
    $(this).text("Load more »")
  }
});



$('.moreless-button5').click(function() {
  $('.moretext5').slideToggle();
  if ($('.moreless-button5').text() == "Load more »") {
    $(this).text("Load less »")
  } else {
    $(this).text("Load more »")
  }
});


$('.moreless-button9').click(function() {
  $('.moretext9').slideToggle();
  if ($('.moreless-button9').text() == "Load more »") {
    $(this).text("Load less »")
  } else {
    $(this).text("Load more »")
  }
});

</script>

<div class="modal fade" id="topFranchise" tabindex="-1" role="dialog" aria-labelledby="topFranchise">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="{{ url('images/top100/close.png') }}" alt="">
                </button>
                <div class="top-modal-head">Understand Selection Criteria</div>
                <ul class="topp">
                        <li>Annual Turnover of the Company Company</li>
                        <li>Operational Since</li>
                        <li>Year of starting Franchising</li>
                        <li>Number of Cities present in</li>
                        <li>Number of Franchise Units</li>
                        <li>Percentage of total business from franchise</li>
                        <li>Total Investment and area required</li>
                        <li>Franchisee fees</li>
                        <li>Royalty Fees</li>
                        <li>Marketing cost as percentage of sales</li>
                        <li>Working Capital per month</li>
                        <li>Return on investment</li>
                        <li>Number of employees required to run a franchise unit</li>
                        <li>Expected break-even time</li>
                        <li>Average business from a franchise unit</li>
                        <li>Number of franchisees owning more than one unit</li>
                        <li>Number of stores in small, mid and large format</li>
                        <li>Year-on-year growth for the last three years</li>
                        <li>Franchise success milestone</li>
                </ul>
            </div>
        </div>
    </div>
</div>

    <!--form end here -->
@endsection
