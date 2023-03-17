<div class="card">
    <div class="card-header p-0 bg-transparent" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $number }}"
          aria-expanded="true" aria-controls="collapseOne">
         {{ $faq->question }}
        </button>
      </h2>
    </div>

    <div id="collapse{{ $number}}" class="collapse show" aria-labelledby="headingOne"
      data-parent="#construction-accordion">
      <div class="card-body">
      {{ $faq->answer }}
      </div>
    </div>
  </div>
