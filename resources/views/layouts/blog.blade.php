<div class="section pp-scrollable ">
    <div class="container">

        <!--style secton-->
        <div id="box" class="box"></div>
        <div class="boxTwo" id="boxTwo"></div>
        <!--style section end-->
        <div class="text-center mb-md-5 mb-2 mt-5 text-white">
            <h1 class="display-4 fw-bold ">My Blog</h1>
            <p class="">I wanna share my some knowledges that can help some beginner like me</p>
        </div>

        <div class="row aos-init aos-animate" data-aos="fade-up">
            <div class="col-lg-12 d-flex justify-content-center ">
                <ul id="blog-filters">
                    <li data-filter="*" class="filter-active btn btn-outline-light">All</li>
                    @forelse(\App\Models\BlogCategory::all() as $c)
                        <li blog-filter=".{{ $c->name }}" class=" btn btn-outline-light">{{ $c->name }}</li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>


        <div class="row blog-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100" style="position: relative; height: 2976.75px;">
            @forelse($blogs as $b)

                <div  class=" col-lg-3 mb-3 col-md-6 blog-item {{ $b->category->name }}  " style="position: absolute; left: 0px; top: 0px;">
                    <a href="{{ route('blogShow',$b->slug) }}" target="_blank" class="portfolio-wrap text-decoration-none text-white">
                        <div class="card">
                            <img style="border-radius: 10px;" src="{{ asset('storage/blogPhoto/'.$b->photo) }}" class="card-img-top" alt="">
                            <div class="card-body  fw-bolder  ">
                                <div> {{ $b->name }}</div>
                                <div class="mt-2 badge-pill badge badge-primary ">
                                    # {{ $b->category->name }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            @empty
            @endforelse
        </div>



    </div>
</div>
