@extends('site.master')
@section('title','Team')
@section('content')
@include('site.parts.benner',['item'=>'Our Team ','title'=>'Our Team'])



<section id="main-container" class="main-container pb-4">
  <div class="container">
    <div class="row text-center">
      <div class="col-lg-12">
        <h3 class="section-sub-title">Our Leaderships</h3>
      </div>
    </div>
    <!--/ Title row end -->

    <div class="row justify-content-center">
        @foreach ($teams as $team)
        <div class="col-lg-3 col-sm-6 mb-5">
         @include('site.parts.team')
            <!--/ Team wrapper 1 end -->
          </div><!-- Col end -->
        @endforeach



    </div><!-- Content row 1 end -->

    <div class="row">
        @foreach ($teams as $team)

      <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
        @include('site.parts.team')

        <!--/ Team wrapper 3 end -->
      </div><!-- Col end -->

      @endforeach

    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->
@stop
