@extends('site.master')
@section('title','Testimonial')
@section('content')
@include('site.parts.benner',['item'=>'Testimonials','title'=>'Testimonials'])



<section id="main-container" class="main-container">
   <div class="container">
      <div class="row text-center">
         <div class="col-12">
            <h3 class="section-sub-title mb-4">What People Said</h3>
         </div>
      </div>
      <!--/ Title row end -->

      <div class="row">
        @foreach ($testimonials as $testimonial)
        <div class="col-lg-4 col-md-6">
            <div class="quote-item quote-border mt-5">
               <div class="quote-text-border">{{ $testimonial->text }} </div>

               <div class="quote-item-footer">
                  <img loading="lazy" class="testimonial-thumb" src="{{ asset('image/testimonials/'.$testimonial->image )}}" alt="testimonial">
                  <div class="quote-item-info">
                     <h3 class="quote-author">{{ $testimonial->author }}</h3>
                     <span class="quote-subtext">{{ $testimonial->subText }}</span>
                  </div>
               </div>
            </div><!-- Quote item end -->
         </div><!-- End col md 4 -->
        @endforeach




      </div><!-- Content row end -->

   </div><!-- Container end -->
</section><!-- Main container end -->
@stop
