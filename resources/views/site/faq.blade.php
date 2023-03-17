@extends('site.master')
@section('title','About')
@section('content')
@include('site.parts.benner',['item'=>'Faq','title'=>'Faq'])


<section id="main-container" class="main-container">
  <div class="container">

    <div class="row">
      <div class="col-lg-8">
        <h3 class="border-title border-left mar-t0">Construction general</h3>

        <div class="accordion accordion-group accordion-classic" id="construction-accordion">
       @foreach ($faqs as $faq)
      @include('site.parts.card',['number'=>$faq->id.'1'])
       @endforeach


        </div>
        <!--/ Accordion end -->

        <div class="gap-40"></div>

        <h3 class="border-title border-left">Safety</h3>

        <div class="accordion accordion-group accordion-classic" id="safety-accordion">
            @foreach ($faqs as $faq)
            @include('site.parts.card',['number'=>$faq->id.'2'])
             @endforeach

        </div>
        <!--/ Accordion end -->

      </div><!-- Col end -->

      <div class="col-lg-4 mt-5 mt-lg-0">

        <div class="sidebar sidebar-right">
          <div class="widget recent-posts">
            <h3 class="widget-title">Recent Posts</h3>
            <ul class="list-unstyled">
              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="#"><img loading="lazy" alt="news-image" src="images/news/news1.jpg"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="#">We Just Completes $17.6 Million Medical Clinic In Mid-missouri</a>
                  </h4>
                </div>
              </li><!-- 1st post end-->

              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="#"><img loading="lazy" alt="news-img" src="images/news/news2.jpg"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="#">Thandler Airport Water Reclamation Facility Expansion Project Named</a>
                  </h4>
                </div>
              </li><!-- 2nd post end-->

              <li class="d-flex align-items-center">
                <div class="posts-thumb">
                  <a href="#"><img loading="lazy" alt="news-img" src="images/news/news3.jpg"></a>
                </div>
                <div class="post-info">
                  <h4 class="entry-title">
                    <a href="#">Silicon Bench And Cornike Begin Construction Solar Facilities</a>
                  </h4>
                </div>
              </li><!-- 3rd post end-->

            </ul>

          </div><!-- Recent post end -->
        </div><!-- Sidebar end -->

      </div><!-- Col end -->

    </div><!-- Content row end -->

  </div><!-- Container end -->
</section><!-- Main container end -->
@stop
