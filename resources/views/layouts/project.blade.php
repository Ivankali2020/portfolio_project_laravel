<div class="section pp-scrollable ">
    <div class="container">

        <!--style secton-->
        <div id="box" class="box"></div>
        <div class="boxTwo" id="boxTwo"></div>
        <!--style section end-->
        <div class="text-center mb-md-5 mb-2 mt-5 ">
            <h1 class="display-4 fw-bold ">My Projects</h1>
            <p class="">Below projects are when I start learn web development and still now.</p>
        </div>


        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center ">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active btn btn-outline-light">All</li>
                    @forelse(\App\Models\ProjectCategory::all() as $c)
                    <li data-filter=".{{ $c->name }}" class=" btn btn-outline-light">{{ $c->name }}</li>
                    @empty
                    @endforelse
{{--                    <li data-filter=".filter-card" class=" btn btn-outline-light">Card</li>--}}
{{--                    <li data-filter=".filter-web" class=" btn btn-outline-light">Web</li>--}}
                </ul>
            </div>
        </div>

        <div class="row portfolio-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="position: relative; height: 2976.75px;">

            @forelse($projects as $p)

                    <div  class="col-lg-4 mb-3 col-md-6 portfolio-item @foreach($p->projectCategories as $c) {{ $c->name }}  @endforeach  " style="position: absolute; left: 0px; top: 0px;">
                        <a href="https://github.com/Ivankali2020/bootstrab_blog-" target="_blank" class="portfolio-wrap">
                            <img style="border-radius: 10px;" src="{{ asset('storage/projectPhotoOne/'.$p->photo) }}" class="img-fluid" alt="">
                        </a>
                    </div>

                @empty
            @endforelse

        </div>

    </div>
</div>


{{--<div  class="col-lg-4 mb-3 col-md-6 portfolio-item filter-web" style="position: absolute; left: 0px; top: 330.75px;">--}}
{{--    <a href="detail.html" class="portfolio-wrap">--}}
{{--        <img style="border-radius: 10px;" src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">--}}
{{--    </a>--}}
{{--</div>--}}

{{--<div  class="col-lg-4 mb-3 col-md-6 portfolio-item filter-app" style="position: absolute; left: 0px; top: 661.5px;">--}}
{{--    <a href="detail.html" class="portfolio-wrap">--}}
{{--        <img style="border-radius: 10px;" src="assets/img/portfolio/portfolio-3.jpg" class="img-fluid" alt="">--}}

{{--    </a>--}}
{{--</div>--}}

{{--<div  class="col-lg-4 mb-3 col-md-6 portfolio-item filter-card" style="position: absolute; left: 0px; top: 992.25px;">--}}
{{--    <a href="detail.html" class="portfolio-wrap">--}}
{{--        <img style="border-radius: 10px;" src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">--}}

{{--    </a>--}}
{{--</div>--}}

{{--<div  class="col-lg-4 mb-3 col-md-6 portfolio-item filter-web" style="position: absolute; left: 0px; top: 1323px;">--}}
{{--    <a href="detail.html" class="portfolio-wrap">--}}
{{--        <img style="border-radius: 10px;" src="assets/img/portfolio/portfolio-5.jpg" class="img-fluid" alt="">--}}

{{--    </a>--}}
{{--</div>--}}

{{--<div  class="col-lg-4 mb-3 col-md-6 portfolio-item filter-app" style="position: absolute; left: 0px; top: 1653.75px;">--}}
{{--    <a href="detail.html" class="portfolio-wrap">--}}
{{--        <img style="border-radius: 10px;" src="assets/img/portfolio/portfolio-6.jpg" class="img-fluid" alt="">--}}

{{--    </a>--}}
{{--</div>--}}

{{--<div  class="col-lg-4 mb-3 col-md-6 portfolio-item filter-card" style="position: absolute; left: 0px; top: 1984.5px;">--}}
{{--    <a href="detail.html" class="portfolio-wrap">--}}
{{--        <img style="border-radius: 10px;" src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="">--}}

{{--    </a>--}}
{{--</div>--}}

{{--<div  class="col-lg-4 mb-3 col-md-6 portfolio-item filter-card" style="position: absolute; left: 0px; top: 2315.25px;">--}}
{{--    <a href="detail.html" class="portfolio-wrap">--}}
{{--        <img style="border-radius: 10px;" src="assets/img/portfolio/portfolio-8.jpg" class="img-fluid" alt="">--}}

{{--    </a>--}}
{{--</div>--}}

{{--<div  class="col-lg-4 mb-3 col-md-6 portfolio-item filter-web" style="position: absolute; left: 0px; top: 2646px;">--}}
{{--    <a href="detail.html" class="portfolio-wrap">--}}
{{--        <img style="border-radius: 10px;" src="assets/img/portfolio/portfolio-9.jpg" class="img-fluid" alt="">--}}
{{--    </a>--}}
{{--</div>--}}
