<div class="ts-team-wrapper">
    <div class="team-img-wrapper">
      <img loading="lazy" class="w-100" src="{{ asset('image/teams/'.$team->image) }}" alt="team-img">
    </div>
    <div class="ts-team-content">
      <h3 class="ts-name">{{ $team->name }}</h3>
      <p class="ts-designation">{{ $team->job }}</p>
      <p class="ts-description">{{ $team->content }}</p>
      <div class="team-social-icons">
          <a target="_blank" href="#"><i class="fab fa-facebook-f"></i></a>
          <a target="_blank" href="#"><i class="fab fa-twitter"></i></a>
          <a target="_blank" href="#"><i class="fab fa-google-plus"></i></a>
          <a target="_blank" href="#"><i class="fab fa-linkedin"></i></a>
      </div><!--/ social-icons-->
    </div>
</div><!--/ Team wrapper end -->
