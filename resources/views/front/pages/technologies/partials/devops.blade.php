<section id="team" class="section">
    <div class="wrap">
        <h2 class="title line-after mb-12">Devops stack</h2>
    </div>
    <div class="wrap wrap-6 items-start">

        @foreach([0, 1,] as $technology)
            @include('front.pages.technologies.partials.technology')
        @endforeach
    </div>
</section>
