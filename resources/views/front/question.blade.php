<section id="faq" class="faq section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      @foreach ($question_title as $title)
      <h2>Frequently Asked Questions</h2>
      <p>{{$title->title}}</p>
      @endforeach
    </div>

    <div class="faq-list">
      <ul>
        @foreach ($questions as $question )
        <li data-aos="fade-up" data-aos-delay="100">
          <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-{{$question->id}}">{{$question->question}} <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
          <div id="faq-list-{{$question->id}}" class="collapse show" data-bs-parent=".faq-list">
            <p>
              {{$question->answer}}
            </p>
          </div>
        </li>
        @endforeach
      </ul>
    </div>

  </div>
</section>