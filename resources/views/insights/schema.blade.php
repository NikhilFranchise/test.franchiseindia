@php

    $ogimage = !empty($newsDetails->image)
        ? \App\Http\Controllers\InsightsController::createimgurl($newsDetails->image)
        : 'https://franchiseindia.s3.ap-south-1.amazonaws.com/uploads/content/fi/int/5ff40e6aaa3da.jpeg';
    // dd($ogimage);
    $imageDetails = @getimagesize($ogimage);

    $width = $imageDetails[0] ? $imageDetails[0] : 0;
    $height = $imageDetails[1] ? $imageDetails[1] : 0;

    $locale = App::getLocale();
    $baseUrl = Config('constants.MainDomain') . "/insights/$locale/";
    $newsUrl =
        $baseUrl . strtolower($newsDetails->insight_type) . '/' . $newsDetails->slug . '.' . $newsDetails->news_id;
    //$author_details
    $authorSlug = $author_details->slug ?? strtolower(str_replace(' ', '-', $author_details->title));
    //dd($authorSlug);
    $authorUrl =
        Config('constants.MainDomain') . "/insights/$locale/author/" . $authorSlug . '-' . $author_details->author_id;

    $authorImage = !empty($author_details->image)
        ? \App\Http\Controllers\InsightsController::authorImageurl($author_details->image)
        : url('images/defaultuser.png');
@endphp
@if ($newsDetails->insight_type == 'News')
    <script type="application/ld+json" class="rank-math-schema-pro">
        {
          "@context": "https://schema.org",
          "@graph": [
            {
              "@type": "Organization",
              "@id": "https://franchiseindia.com/#organization",
              "name": "FranchiseIndia.com",
              "logo": {
                "@type": "ImageObject",
                "@id": "https://www.franchiseindia.com/#logo",
                "url": "https://www.franchiseindia.com/insight-new/images/logo.png",
                "contentUrl": "https://www.franchiseindia.com/insight-new/images/logo.png",
                "caption": "FranchiseIndia.com",
                "inLanguage": "en-IN",
                "width": 320,
                "height": 46
              }
            },
            {
              "@type": "WebSite",
              "@id": "https://www.franchiseindia.com/#website",
              "url": "https://www.franchiseindia.com",
              "name": "FranchiseIndia.com",
              "alternateName": "FranchiseIndia",
              "publisher": { "@id": "https://www.franchiseindia.com/#organization" },
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
              "itemListElement": [
                {
                  "@type": "ListItem",
                  "position": 1,
                  "item": { "@id": "{{ url('/insights') }}", "name": "Home" }
                },
                {
                  "@type": "ListItem",
                  "position": 2,
                  "item": { "@id": "{{ url('/insights') }}", "name": "{{ $newsDetails->insight_type }}" }
                },
                @php
                  $position = 3;
                @endphp
                @foreach ($newsDetails->category as $category)
                  {
                    "@type": "ListItem",
                    "position": "{{ $position++ }}",
                    "item": { "@id": "{{ $baseUrl . $category->slug }}", "name": "{{ $category->catname }}" }
                  },
                @endforeach
                @foreach ($newsDetails->Subcategory as $subcat)
                  {
                    "@type": "ListItem",
                    "position": "{{ $position++ }}",
                    "item": { "@id": "{{ $baseUrl . $category->slug . '/' . $subcat->slug }}", "name": "{{ $subcat->subcat_name }}" }
                  },
                @endforeach
                {
                  "@type": "ListItem",
                  "position": "{{ $position }}",
                  "item": { "@id": "{{ $newsUrl }}", "name": "{{ $newsDetails->title }}" }
                }
              ]
            },
            {
              "@type": "WebPage",
              "@id": "{{$newsUrl}}/#webpage",
              "url": "{{$newsUrl}}",
              "name": "{{$newsDetails->title}} - FranchiseIndia",
              "datePublished": "{{$newsDetails->created_at}}",
              "dateModified": "{{$newsDetails->updated_at}}",
              "isPartOf": { "@id": "https://www.franchiseindia.com/#website" },
              "primaryImageOfPage": { "@id": "{{$ogimage}}" },
              "inLanguage": "en-IN",
              "breadcrumb": { "@id": "{{$newsUrl}}/#breadcrumb" }
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
              "worksFor": { "@id": "https://www.franchiseindia.com/#organization" }
            },
            {
              "@type": "NewsArticle",
              "headline": "{{$newsDetails->title}} - FranchiseIndia",
              "description": "{{strip_tags($newsDetails->description)}}",
              "datePublished": "{{$newsDetails->created_at}}",
              "dateModified": "{{$newsDetails->updated_at}}",
              "image": { "@id": "{{$ogimage}}" },
              "author": { "@id": "{{$authorUrl}}", "name": "{{$author_details->title}}" },
              "copyrightYear": "{{date('Y')}}",
              "name": "{{$newsDetails->title}} - FranchiseIndia",
              "@id": "{{$newsUrl}}/#schema-75109",
              "isPartOf": { "@id": "{{$newsUrl}}/#webpage" },
              "publisher": { "@id": "https://www.franchiseindia.com/#organization" },
              "inLanguage": "en-IN",
              "mainEntityOfPage": { "@id": "{{$newsUrl}}/#webpage" }
            }
          ]
        }
      </script>
@elseif($newsDetails->insight_type == 'Article')
    <script type="application/ld+json" class="rank-math-schema-pro">
  {
      "@context": "https://schema.org",
      "@graph": [
          {
              "@type": "Organization",
              "@id": "https://www.franchiseindia.com/#organization",
              "name": "FranchiseIndia.com",
              "logo": {
                  "@type": "ImageObject",
                  "@id": "https://www.franchiseindia.com/#logo",
                  "url": "https://www.franchiseindia.com/insight-new/images/logo.png",
                  "contentUrl": "https://www.franchiseindia.com/insight-new/images/logo.png",
                  "caption": "FranchiseIndia.com",
                  "inLanguage": "en-IN",
                  "width": "320",
                  "height": "46"
              }
          },
          {
              "@type": "WebSite",
              "@id": "https://www.franchiseindia.com/#website",
              "url": "https://www.franchiseindia.com",
              "name": "FranchiseIndia.com",
              "alternateName": "FranchiseIndia",
              "publisher": { "@id": "https://www.franchiseindia.com/#organization" },
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
            "itemListElement": [
              {
                "@type": "ListItem",
                "position": 1,
                "item": { "@id": "{{ url('/insights') }}", "name": "Home" }
              },
              {
                "@type": "ListItem",
                "position": 2,
                "item": { "@id": "{{ url('/insights') }}", "name": "{{ $newsDetails->insight_type }}" }
              },
              @php
                $position = 3;
              @endphp
              @foreach ($newsDetails->category as $category)
                {
                  "@type": "ListItem",
                  "position": "{{ $position++ }}",
                  "item": { "@id": "{{ $baseUrl . $category->slug }}", "name": "{{ $category->catname }}" }
                },
              @endforeach
              @foreach ($newsDetails->Subcategory as $subcat)
                {
                  "@type": "ListItem",
                  "position": "{{ $position++ }}",
                  "item": { "@id": "{{ $baseUrl . $category->slug . '/' . $subcat->slug }}", "name": "{{ $subcat->subcat_name }}" }
                },
              @endforeach
              {
                "@type": "ListItem",
                "position": "{{ $position }}",
                "item": { "@id": "{{ $newsUrl }}", "name": "{{ $newsDetails->title }}" }
              }
            ]
          },
          {
            "@type": "WebPage",
            "@id": "{{$newsUrl}}/#webpage",
            "url": "{{$newsUrl}}",
            "name": "{{$newsDetails->title}} - FranchiseIndia",
            "datePublished": "{{$newsDetails->created_at}}",
            "dateModified": "{{$newsDetails->updated_at}}",
            "isPartOf": { "@id": "https://www.franchiseindia.com/#website" },
            "primaryImageOfPage": { "@id": "{{$ogimage}}" },
            "inLanguage": "en-IN",
            "breadcrumb": { "@id": "{{$newsUrl}}/#breadcrumb" }
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
            "worksFor": { "@id": "https://www.franchiseindia.com/#organization" }
          },
          {
            "@type": "Article",
            "headline": "{{$newsDetails->title}} - FranchiseIndia",
            "description": "{{strip_tags($newsDetails->description)}}",
            "datePublished": "{{$newsDetails->created_at}}",
            "dateModified": "{{$newsDetails->updated_at}}",
            "image": { "@id": "{{$ogimage}}" },
            "author": { "@id": "{{$authorUrl}}", "name": "{{$author_details->title}}" },
            "copyrightYear": "{{date('Y')}}",
            "name": "{{$newsDetails->title}} - FranchiseIndia",
            "@id": "{{$newsUrl}}/#schema-75109",
            "isPartOf": { "@id": "{{$newsUrl}}/#webpage" },
            "publisher": { "@id": "https://www.franchiseindia.com/#organization" },
            "inLanguage": "en-IN",
            "mainEntityOfPage": { "@id": "{{$newsUrl}}/#webpage" }
          }
      ]
  }
</script>
@endif
