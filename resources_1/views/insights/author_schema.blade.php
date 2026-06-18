@php
    $authorName = $author->title;
    $authorUrl = url('/insights/author/' . $author->slug . '-' . $author->author_id);
    $authorDescription = strip_tags($author->text);
    $authorJobTitle = $author->designation;
    $authorLinkedin = $author->linkedin_profile;
    $authorTwitter = $author->twitter_profile;
    $authorFacebook = $author->facebook_profile;
    $authorInstagram = $author->insta_profile;
@endphp

<script type="application/ld+json" class="rank-math-schema-pro">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "Person",
      "name": "{{ $authorName }}",
      "url": "{{ $authorUrl }}",
      "description": "{{ $authorDescription }}",
      "jobTitle": "{{ $authorJobTitle }}",
      "sameAs": [
        "{{ $authorLinkedin }}",
        "{{ $authorTwitter }}",
        "{{ $authorFacebook }}",
        "{{ $authorInstagram }}"
      ]
    }
  ]
}
</script>
