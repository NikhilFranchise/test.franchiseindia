@extends('layout.crre.master')
@section('content')
<div class="maininnver">
  <div class="container">
    <h1 class="cathead pd47">{{ app()->getLocale() === 'hi' ? 'धन्यवाद' : 'THANK YOU' }}</h1>
  </div>

  <div class="listblk">
    <div class="container">
      <p>{{ app()->getLocale() === 'hi' ? 'हमारी ग्राहक सेवा टीम शीघ्र ही आपसे संपर्क करेगी।' : 'Our customer care executives will get in touch with you shortly.' }}</p>
    </div>
  </div>
  <!-- mag block strat  -->
  @include("layout.crre.magblock")
</div>

@stop