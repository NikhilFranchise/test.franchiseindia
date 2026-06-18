@php
$locale = App::getLocale();
$ogimage = insightsImageUrl($newsDetails->image, $locale);
$imageDetails = @getimagesize($ogimage);
$width = $imageDetails[0] ? $imageDetails[0] : 0;
$height = $imageDetails[1] ? $imageDetails[1] : 0;
$newsUrl = insightsUrl($newsDetails, $locale);
$categoryData = $newsDetails->category;
// dd($newsDetails);
$categoryUrl = $categoryData ? insightsCategoryUrl($categoryData) : '';

$subcatData = $newsDetails->Subcategory;
$subcategoryUrl = $subcatData ? insightsSubCategoryUrl($subcatData) : '';

//$author_details
$authorUrl = insightsAuthorUrl($author_details);
$authorImage = insightsAuthorImageUrl($author_details->image, $locale);
@endphp
@if ($newsDetails->insight_type == 'News')
<script type="application/ld+json" class="rank-math-schema-pro">
  {
    "@context": "https://schema.org",
    "@graph": [{
        "@type": "Organization",
        "@id": "{{ Config('constants.MainDomain')}}/#organization",
        "name": "FranchiseIndia.com",
        "logo": {
          "@type": "ImageObject",
          "@id": "{{ Config('constants.MainDomain')}}/#logo",
          "url": "{{ Config('constants.MainDomain')}}/insight-new/images/logo.png",
          "contentUrl": "{{ Config('constants.MainDomain')}}/insight-new/images/logo.png",
          "caption": "FranchiseIndia.com",
          "inLanguage": "en-IN",
          "width": 320,
          "height": 46
        }
      },
      {
        "@type": "WebSite",
        "@id": "{{ Config('constants.MainDomain')}}/#website",
        "url": "{{ Config('constants.MainDomain')}}",
        "name": "FranchiseIndia.com",
        "alternateName": "FranchiseIndia",
        "publisher": {
          "@id": "{{ Config('constants.MainDomain')}}/#organization"
        },
        "inLanguage": "en-IN"
      },
      {
        "@type": "ImageObject",
        "@id": "{{$ogimage}}",
        "url": "{{$ogimage}}",
        "width": "{{$width}}",
        "height": "{{$height}}",
        "caption": "{{$newsDetails->title}}",
        "inLanguage": "en-IN"
      },
      {
        "@type": "BreadcrumbList",
        "@id": "{{$newsUrl}}/#breadcrumb",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "item": {
              "@id": "{{ url('/insights') }}",
              "name": "Home"
            }
          },
          {
            "@type": "ListItem",
            "position": 2,
            "item": {
              "@id": "{{ url('/insights') }}",
              "name": "{{ $newsDetails->insight_type }}"
            }
          },
          @php
          $position = 3;
          @endphp {
            "@type": "ListItem",
            "position": "{{ $position++ }}",
            "item": {
              "@id": "{{ $categoryUrl }}",
              "name": "{{ $categoryData->catname }}"
            }
          }
          @php $position = 4;@endphp

          @if(!empty($subcatData) && !empty($subcategoryUrl)),
          {
            "@type": "ListItem",
            "position": "{{ $position++ }}",
            "item": {
              "@id": "{{ $subcategoryUrl }}",
              "name": "{{ $subcatData->subcat_name }}"
            }
          }
          @endif,
          {
            "@type": "ListItem",
            "position": "{{ $position }}",
            "item": {
              "@id": "{{ $newsUrl }}",
              "name": "{{ $newsDetails->title }}"
            }
          }
        ]
      },
      {
        "@type": "WebPage",
        "@id": "{{$newsUrl}}/#webpage",
        "url": "{{$newsUrl}}",
        "name": "{{$newsDetails->title}} - FranchiseIndia",
        "datePublished": "{{$newsDetails->created_at}}",
        "dateModified": "{{isset($newsDetails->published_date) ? $newsDetails->published_date : $newsDetails->created_at}}",
        "isPartOf": {
          "@id": "{{ Config('constants.MainDomain')}}/#website"
        },
        "primaryImageOfPage": {
          "@id": "{{$ogimage}}"
        },
        "inLanguage": "en-IN",
        "breadcrumb": {
          "@id": "{{$newsUrl}}/#breadcrumb"
        }
      },
      {
        "@type": "Person",
        "@id": "{{$authorUrl}}",
        "name": "{{ $author_details->title }}",
        "description": "{{ strip_tags($author_details->text) }}",
        "url": "{{$authorUrl}}",
        "image": {
          "@type": "ImageObject",
          "@id": "{{$authorImage}}",
          "url": "{{$authorImage}}",
          "caption": "{{$author_details->title}}",
          "inLanguage": "en-IN"
        },
        "sameAs": [
          "{{$author_details->facebook_profile}}",
          "{{$author_details->linkedin_profile}}",
          "{{$author_details->twitter_profile}}",
          "{{$author_details->insta_profile}}"
        ],
        "worksFor": {
          "@id": "{{ Config('constants.MainDomain')}}/#organization"
        }
      },
      {
        "@type": "NewsArticle",
        "headline": "{{$newsDetails->title}} - FranchiseIndia",
        "description": "{{strip_tags($newsDetails->description)}}",
        "datePublished": "{{$newsDetails->created_at}}",
        "dateModified": "{{isset($newsDetails->published_date) ? $newsDetails->published_date : $newsDetails->created_at}}",
        "image": {
          "@id": "{{$ogimage}}"
        },
        "author": {
          "@id": "{{$authorUrl}}",
          "name": "{{$author_details->title}}"
        },
        "copyrightYear": "{{date('Y')}}",
        "name": "{{$newsDetails->title}} - FranchiseIndia",
        "@id": "{{$newsUrl}}/#schema-75109",
        "isPartOf": {
          "@id": "{{$newsUrl}}/#webpage"
        },
        "publisher": {
          "@id": "{{ Config('constants.MainDomain')}}/#organization"
        },
        "inLanguage": "en-IN",
        "mainEntityOfPage": {
          "@id": "{{$newsUrl}}/#webpage"
        }
      }
    ]
  }
</script>
@elseif($newsDetails->insight_type == 'Article')
<script type="application/ld+json" class="rank-math-schema-pro">
  {
    "@context": "https://schema.org",
    "@graph": [{
        "@type": "Organization",
        "@id": "{{ Config('constants.MainDomain')}}/#organization",
        "name": "FranchiseIndia.com",
        "logo": {
          "@type": "ImageObject",
          "@id": "{{ Config('constants.MainDomain')}}/#logo",
          "url": "{{ Config('constants.MainDomain')}}/insight-new/images/logo.png",
          "contentUrl": "{{ Config('constants.MainDomain')}}/insight-new/images/logo.png",
          "caption": "FranchiseIndia.com",
          "inLanguage": "en-IN",
          "width": "320",
          "height": "46"
        }
      },
      {
        "@type": "WebSite",
        "@id": "{{ Config('constants.MainDomain')}}/#website",
        "url": "{{ Config('constants.MainDomain')}}",
        "name": "FranchiseIndia.com",
        "alternateName": "FranchiseIndia",
        "publisher": {
          "@id": "{{ Config('constants.MainDomain')}}/#organization"
        },
        "inLanguage": "en-IN"
      },
      {
        "@type": "ImageObject",
        "@id": "{{$ogimage}}",
        "url": "{{$ogimage}}",
        "width": "{{$width}}",
        "height": "{{$height}}",
        "caption": "{{$newsDetails->title}}",
        "inLanguage": "en-IN"
      },
      {
        "@type": "BreadcrumbList",
        "@id": "{{$newsUrl}}/#breadcrumb",
        "itemListElement": [{
            "@type": "ListItem",
            "position": 1,
            "item": {
              "@id": "{{ url('/insights') }}",
              "name": "Home"
            }
          },
          {
            "@type": "ListItem",
            "position": 2,
            "item": {
              "@id": "{{ url('/insights') }}",
              "name": "{{ $newsDetails->insight_type }}"
            }
          },
          @php
          $position = 3;
          @endphp {
            "@type": "ListItem",
            "position": "{{ $position++ }}",
            "item": {
              "@id": "{{ $categoryUrl }}",
              "name": "{{ $categoryData->catname }}"
            }
          }
          @php $position = 4;@endphp
          @if(!empty($subcatData) && !empty($subcategoryUrl)),
          {
            "@type": "ListItem",
            "position": "{{ $position++ }}",
            "item": {
              "@id": "{{ $subcategoryUrl }}",
              "name": "{{ $subcatData->subcat_name }}"
            }
          }
          @endif,
          {
            "@type": "ListItem",
            "position": "{{ $position }}",
            "item": {
              "@id": "{{ $newsUrl }}",
              "name": "{{ $newsDetails->title }}"
            }
          }
        ]
      },
      {
        "@type": "WebPage",
        "@id": "{{$newsUrl}}/#webpage",
        "url": "{{$newsUrl}}",
        "name": "{{$newsDetails->title}} - FranchiseIndia",
        "datePublished": "{{$newsDetails->created_at}}",
        "dateModified": "{{isset($newsDetails->published_date) ? $newsDetails->published_date : $newsDetails->created_at}}",
        "isPartOf": {
          "@id": "{{ Config('constants.MainDomain')}}/#website"
        },
        "primaryImageOfPage": {
          "@id": "{{$ogimage}}"
        },
        "inLanguage": "en-IN",
        "breadcrumb": {
          "@id": "{{$newsUrl}}/#breadcrumb"
        }
      },
      {
        "@type": "Person",
        "@id": "{{$authorUrl}}",
        "name": "{{ $author_details->title }}",
        "description": "{{ strip_tags($author_details->text) }}",
        "url": "{{$authorUrl}}",
        "image": {
          "@type": "ImageObject",
          "@id": "{{$authorImage}}",
          "url": "{{$authorImage}}",
          "caption": "{{$author_details->title}}",
          "inLanguage": "en-IN"
        },
        "sameAs": [
          "{{$author_details->facebook_profile}}",
          "{{$author_details->linkedin_profile}}",
          "{{$author_details->twitter_profile}}",
          "{{$author_details->insta_profile}}"
        ],
        "worksFor": {
          "@id": "{{ Config('constants.MainDomain')}}/#organization"
        }
      },
      {
        "@type": "Article",
        "headline": "{{$newsDetails->title}} - FranchiseIndia",
        "description": "{{strip_tags($newsDetails->description)}}",
        "datePublished": "{{$newsDetails->created_at}}",
        "dateModified": "{{isset($newsDetails->published_date) ? $newsDetails->published_date : $newsDetails->created_at}}",
        "image": {
          "@id": "{{$ogimage}}"
        },
        "author": {
          "@id": "{{$authorUrl}}",
          "name": "{{$author_details->title}}"
        },
        "copyrightYear": "{{date('Y')}}",
        "name": "{{$newsDetails->title}} - FranchiseIndia",
        "@id": "{{$newsUrl}}/#schema-75109",
        "isPartOf": {
          "@id": "{{$newsUrl}}/#webpage"
        },
        "publisher": {
          "@id": "{{ Config('constants.MainDomain')}}/#organization"
        },
        "inLanguage": "en-IN",
        "mainEntityOfPage": {
          "@id": "{{$newsUrl}}/#webpage"
        }
      }
    ]
  }
</script>
@endif