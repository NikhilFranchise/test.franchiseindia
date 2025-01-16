@extends('layout.insights.master')

@section('seoTitle', $newsDetails->title)
@section('seoDesc', $newsDetails->shortDesc)
@section('seoKeywords', $newsDetails->kicker)
@section('canonicalUrl', url()->current())
{{-- @dd($newsDetails->image); --}}
@php

    $ogimage = !empty($newsDetails->image)
        ? \App\Http\Controllers\InsightsController::createimgurl($newsDetails->image)
        : 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';
    $imageDetails = @getimagesize($ogimage);

    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;

    $locale = App::getLocale();
    $baseUrl = Config('constants.MainDomain') . "/insights/$locale/" . strtolower($newsDetails->insight_type) . '/';
    $newsUrl = $baseUrl . $newsDetails->slug . '.' . $newsDetails->news_id;
    //$author_details
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    //dd($authorSlug);
    $authorUrl = $baseUrl . 'author/' . $authorSlug . '-' . $author_details->author_id;

    $authorImage = !empty($author_details->image)
        ? \App\Http\Controllers\InsightsController::authorImageurl($author_details->image)
        : url('images/defaultuser.png');
@endphp

@section('image', $ogimage)
@section('shortDesc', $newsDetails->shortDesc)
@section('imagesrc', $ogimage)
@section('title', $newsDetails->title)
@section('url', url()->current())
@section('width', $width)
@section('height', $height)
@section('content')
    <div class="maininnver homeh">
        <div class="inner-top-head">
            <div class="container">
                <h1>{{ $newsDetails->title }}</h1>
            </div>
        </div>
        <!-- DESKTOP TOP AD PLACEMENT  -->
        <div class="container">
            {{-- <div class="inner-article-detail-desktop-top-ad">
         <img src="{{ url('/insight-new/images/desk-ad.png') }}" alt="" class="img-fluid">
      </div> --}}
            @desktop
                <div id='FI_Desktop_ROS_728x90_ATF'>
                    <script>
                        googletag.cmd.push(function() {
                            googletag.display('FI_Desktop_ROS_728x90_ATF');
                        });
                    </script>
                </div>
            @enddesktop
        </div>

        <!-- DESKTOP TOP AD PLACEMENT  -->
    </div>
    <div class="contentwrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/insights') }}" class="tip-bottom">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/insights') }}" class="tip-bottom">{{ $newsDetails->insight_type }}</a>
                </li>
                @foreach ($newsDetails->category as $category)
                    <li class="breadcrumb-item"><a href="{{ $baseUrl . $category->slug }}"
                            class="tip-bottom">{{ $category->catname }}</a></li>
                @endforeach

                @foreach ($newsDetails->Subcategory as $subcat)
                    <li class="breadcrumb-item"><a
                            href="{{ $baseUrl . $category->slug . '/' . $subcat->slug }}">{{ $subcat->subcat_name }}</a>
                    </li>
                @endforeach

                <li class="breadcrumb-item">{{ $newsDetails->title }}</li>
            </ul>
        </div>
        <div class="container">

            <div class="row">

                <div class="col-md-8">

                    <h2>{{ $newsDetails->title }}</h2>
                    <div class="cont-top">
                        <div class="article-features">
                            <div class="article-date">
                                <div class="article-logo">
                                    <img src="{{ $authorImage }}" width="51" height="51" alt="Indian Retailer"
                                        loading="lazy" class="">
                                </div>
                                <div class="article-time">
                                    BY -
                                    <a href="{{ $authorUrl }}">{{ $author_details->title }}</a>
                                    <br>
                                    <span>
                                        {{ $author_details->designation }}
                                    </span>
                                    <span>
                                        {{ date('M d, Y', strtotime($newsDetails->created_at)) }} /
                                        <img src="https://www.indianretailer.com/brandlicense/themes/menshealth/images/vicon.webp"
                                            height="10" width="17" alt="IndianRetailer" class="img-fluid">
                                        {{ $newsDetails->views }}
                                        / {{ app\Http\Controllers\InsightsController::calculateReadTime($newsDetails) }}
                                        MIN READ
                                    </span>
                                </div>
                            </div>
                            <div class="content-share">
                                <ul>
                                    <li>
                                        <a target="_blank"
                                            href="https://www.facebook.com/share.php?url={{ $newsUrl }}">
                                            <img src="{{ url('insight-new/images/fshare.webp') }}" height="25"
                                                width="25" loading="lazy" alt="IR">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank"
                                            href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ $newsUrl }}">
                                            <img src="{{ url('insight-new/images/flink.webp') }}" height="25"
                                                width="25" loading="lazy" alt="IR">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://x.com/intent/post?url={{ $newsUrl }}">
                                            <img src="{{ url('insight-new/images/ftwit.webp') }}" height="25"
                                                width="25" loading="lazy" alt="IR">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="follow-us">
                                <a href="https://news.google.com/publications/CAAiEJjETmBVGGR4AF2qcS42jEMqFAgKIhCYxE5gVRhkeABdqnEuNoxD?hl=en-IN&amp;gl=IN&amp;ceid=IN%3Aen"
                                    target="_blank">
                                    Follow Us
                                    <img src="{{ url('insight-new/images/follow.webp') }}" loading="lazy"
                                        alt="Franchise India" width="11" height="10">
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="content-main">
                        <img src="{{ $ogimage }}" class="img-fluid" alt="{{ $newsDetails->title }}">
                        <div class="shortdes">{{ $newsDetails->shortDesc }}</div>

                        {{-- <div class="articlecontent">
                  @php
                  $custom_data = explode("\r\n", $newsDetails->content);
                  if (count($custom_data) == 1) {
                  $articleData[0] =
                  $custom_data[0] .
                  '
                  <div id="v-franchiseindia"></div>
                  <script>
                     (function(v, d, o, ai) {
                      ai = d.createElement("script");
                      ai.defer = true;
                      ai.async = true;
                      ai.src = v.location.protocol + o;
                      d.head.appendChild(ai);
                  })
                  (window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
                  </script>
                  ';

                  } else {
                  $counter = 0;
                  foreach ($custom_data as $cdata) {
                  if ($counter == 2) {
                  $articleData[] =
                  $cdata .
                  '
                  <div id="v-franchiseindia"></div>

                  <script>
                     (function(v, d, o, ai) {
                      ai = d.createElement("script");
                      ai.defer = true;
                      ai.async = true;
                      ai.src = v.location.protocol + o;
                      d.head.appendChild(ai);
                  })(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
                  </script>
                  ';

                  } else {
                  $articleData[] = $cdata;
                  }
                  $counter++;
                  }
                  }
                  $resultArticle = implode("\r\n", $articleData);
                  @endphp
                  {!! $resultArticle !!}
               </div> --}}
                        <div class="articlecontent">
                            @php
                                $custom_data = explode("\r\n", $newsDetails->content);
                                if (count($custom_data) == 1) {
                                    $articleData[0] =
                                        $custom_data[0] .
                                        '
                  <div id="v-franchiseindia"></div>
                  <script>
                      (function(v, d, o, ai) {
                          ai = d.createElement("script");
                          ai.defer = true;
                          ai.async = true;
                          ai.src = v.location.protocol + o;
                          d.head.appendChild(ai);
                      })
                      (window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
                  </script>
                  ';
                                } else {
                                    $counter = 0;
                                    foreach ($custom_data as $cdata) {
                                        $articleData[] = $cdata;
                                        if ($counter == 1) {
                                            // Change the position based on your requirement
                                            $articleData[] =
                                                '<div class="inner-article-detail-desktop-ad">
                     <img src="' .
                                                url('insight-new/images/desk-ad.png') .
                                                '" class="img-fluid">
                              </div>';
                                        }
                                        if ($counter == 2) {
                                            $articleData[] = '
                                  <div id="v-franchiseindia"></div>
                                  <script>
                                      (function(v, d, o, ai) {
                                          ai = d.createElement("script");
                                          ai.defer = true;
                                          ai.async = true;
                                          ai.src = v.location.protocol + o;
                                          d.head.appendChild(ai);
                                      })(window, document, "//a.vdo.ai/core/v-franchiseindia/vdo.ai.js");
                                  </script>
                                  ';
                                        }
                                        $counter++;
                                    }
                                }
                                $resultArticle = implode("\r\n", $articleData);
                            @endphp {!! $resultArticle !!} </div>

                        @if (!empty($franchiseData))
                            <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center; padding: 20px;">
                                <h4 style="margin-top:15px">Interested in Franchise:</h4>

                                @foreach ($franchiseData as $franchise)
                                    <div
                                        style="background-color: #f9f9f9; border: 1px solid #ddd; padding: 15px 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); text-align: center; min-width: 95px; max-width: 200px;">
                                        <a href="http://franchiseindia.com/brands/{{ strtolower($franchise['profile_name']) }}.{{ $franchise['fran_detail_id'] }}"
                                            target="_blank"
                                            style="text-decoration: none; color: #333; font-weight: bold; font-size: 16px;">
                                            {{ $franchise['company_name'] }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="contentarea">
                        @include('layout.insights.subscribenewsletter')
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right-wrap">
                        <div class="ad-right">
                            <img src="{{ url('insight-new/images/ad-right.jpg') }}" class="img-fluid">
                        </div>
                        <div class="popular-articles">
                            <h3>Trending Articles</h3>
                            <ul>
                                @forelse ($trendingArticles as $trend)
                                    <li>
                                        @foreach ($trend->category as $cat)
                                            @php
                                                $locale = App::getLocale();
                                                $catURL =
                                                    Config('constants.MainDomain') . "/insights/{$locale}/{$cat->slug}";
                                                $baseUrl1 =
                                                    Config('constants.MainDomain') .
                                                    "/insights/$locale/" .
                                                    strtolower($trend->insight_type) .
                                                    '/';
                                                $trendUrl = $baseUrl1 . $trend->slug . '.' . $trend->news_id;
                                            @endphp
                                            <div class="popular-sub">
                                                <a href="{{ $catURL }}"
                                                    hreflang="{{ $locale }}">{{ $cat->catname }}</a>
                                            </div>
                                        @endforeach
                                        <div class="popular-head">
                                            <a href="{{ $trendUrl }}">{{ $trend->title }}</a>
                                        </div>
                                    </li>
                                @empty

                                @endforelse
                            </ul>
                        </div>
                        <div class="ad-right-sticky">
                            <img src="{{ url('insight-new/images/ad8.png') }}" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('layout.insights.magblock')
    {{-- <div class="fixsocial">
      <ul class="sociallist">
         <li>
            <a href="https://www.facebook.com/FranchiseIndiaMedia" target="_blank">
               <img src="https://www.franchiseindia.com/newhomepage/assets/img/fb-icon.svg" alt="facebook">
            </a>
         </li>
         <li>
            <a href="https://www.instagram.com/franchiseindia_/" target="_blank">
               <img src="https://www.franchiseindia.com/newhomepage/assets/img/instagram-icon.svg" alt="">
            </a>
         </li>
         <li>
            <a href="https://twitter.com/FranchiseIndia" target="_blank">
               <img src="https://www.franchiseindia.com/newhomepage/assets/img/twitter-icon.svg" alt="twitter">
            </a>
         </li>
         <li>
            <a href="https://www.youtube.com/user/FranchiseIndia" target="_blank">
               <img src="https://www.franchiseindia.com/newhomepage/assets/img/you-tube-icon.svg" alt="youtube">
            </a>
         </li>
      </ul>
   </div> --}}

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            async function doAjax(args) {
                try {
                    const result = await $.ajax({
                        url: '/insights/instasubsribe',
                        type: 'POST',
                        data: args,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                    });

                    return result; // Add this line to return the result explicitly
                } catch (error) {
                    // Log the error for debugging purposes
                    console.error('AJAX Error:', error);
                    throw error; // Re-throw the error to propagate it to the caller
                }
            }

            function validateForm() {
                // Reset previous error messages
                $(".text-danger").text("");

                var email = $("#emailId").val();
                var tel = $("#tel").val();

                if (email === "") {
                    $("#email-error").text("Please enter your email.");
                    $("#emailId").focus();
                    return false;
                } else if (!isValidEmail(email)) {
                    $("#email-error").text("Please enter a valid email address.");
                    $("#emailId").focus();
                    return false;
                }

                if (tel === "") {
                    $("#tel-error").text("Please enter your Mobile number.");
                    $("#tel").focus();
                    return false;
                } else if (!isValidTel(tel)) {
                    $("#tel-error").text("Please enter a valid 10-digit Mobile number.");
                    $("#tel").focus();
                    return false;
                }

                return true;
            }

            $('#magsubscribe').submit(function(event) {
                event.preventDefault();

                if (validateForm()) {
                    const formData = $(this).serialize();
                    // alert('hello');
                    doAjax(formData).then((data) => {
                        if (data.error === false) {
                            $('#magsubscribe input[type="email"]').val('');
                            $('#magsubscribe input[type="number"]').val('');
                            window.location.href =
                                'https://www.franchiseindia.com/insights/hi/thanks';

                        } else {
                            // Display error messages in span elements
                            $("#email-error").text(data.fields.email ? data.message1 : '');
                            $("#tel-error").text(data.fields.tel ? data.message2 : '');
                        }
                    }).catch((error) => {
                        // Log the error for debugging purposes
                        console.error('AJAX Error:', error);

                        // Check if the error response contains a message
                        if (error.response && error.response.data && error.response.data.message) {
                            alert('Error: ' + error.response.data.message);
                        } else {
                            alert(
                            'An error occurred. Please try again.'); // Display a generic error message
                        }
                    });
                }
            });

            function isValidEmail(email) {
                // Use a regular expression for basic email format validation
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            function isValidTel(tel) {
                // Validate telephone number length
                return /^\d{10}$/.test(tel);
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            // $('input[title!=""]').hint();
            // $('textarea[title!=""]').hint();
            // $('select[title!=""]').hint();
            var validator = $("#update").validate({

                rules: {

                    email: {
                        required: true,
                        email: true
                    }
                },

                messages: {

                    email: {
                        required: "",
                        email: ""
                    }
                }

            });
        });
    </script>
@endsection
