
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">


    <title>Portfolio</title>
    <style>
        .lds-facebook {
            display: inline-block;
            position: relative;
            width: 80px;
            height: 80px;
        }
        .lds-facebook div {
            display: inline-block;
            position: absolute;
            left: 8px;
            width: 16px;
            background: #fff;
            animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
        }
        .lds-facebook div:nth-child(1) {
            left: 8px;
            animation-delay: -0.24s;
        }
        .lds-facebook div:nth-child(2) {
            left: 32px;
            animation-delay: -0.12s;
        }
        .lds-facebook div:nth-child(3) {
            left: 56px;
            animation-delay: 0;
        }
        @keyframes lds-facebook {
            0% {
                top: 8px;
                height: 64px;
            }
            50%, 100% {
                top: 24px;
                height: 32px;
            }
        }
        .loader{
            width: 100%;
            height: 100vh;
            position: absolute;
            background-color: black;
            z-index: 90;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .loader.close{
            display: none;
        }


    </style>
</head>
<body>

<div class="loader">
    <div class="lds-facebook"><div></div><div></div><div></div></div>
    <div class="fw-bolder " style="letter-spacing: 8px;"> <span class="text-white fs-1 ">L</span>oading ........</div>
</div>
<!--<nav class="navbar navbar-expand-lg   shadow-sm   ">-->
<!--    <div class="container d-flex">-->
<!--        <a class="navbar-brand" href="#firstPage">Portfolio</a>-->
<!--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"-->
<!--                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">-->
<!--            <ul id="" class="list-unstyled navbar-nav me-auto mb-2 mb-lg-0">-->
<!--                <li data-menuanchor="firstPage" class="nav-item active "><a href="#firstPage">Home</a></li>-->
<!--                <li data-menuanchor="secondPage" class="nav-item"><a href="#secondPage">About</a></li>-->
<!--                <li data-menuanchor="thirdPage" class="nav-item"><a href="#thirdPage">Service</a></li>-->
<!--                <li data-menuanchor="fourthPage" class="nav-item"><a href="#fourthPage">Contact</a></li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<div id="pagepiling">
    @include('layouts.profile')
    @include('layouts.resume')
    @include('layouts.project')
    @include('layouts.blog')
    @include('layouts.contact')
</div>
<script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('assets/vendor/typed.js/typed.js') }}"></script>

<script src="{{ asset('js/forstyle.js') }}"></script>
<script src="{{ asset('assets/vendor/WOW/dist/wow.min.js') }}"></script>

<script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>



<script type="text/javascript">


    $(document).ready(function () {
        $('#pagepiling').pagepiling({
            direction: 'horizontal',
            navigation: {
                'textColor': '#C9ADA7',
                'bulletsColor': '#ffffff',
                'position': 'right',
                'tooltips': ['Home', 'About', 'Project','Blog','Contact']
            },
            sectionsColor: ['#22223B', '#4A4E69', '#C9ADA7', '#22223B', '#4A4E69'],
            anchors: ['firstPage', 'secondPage', 'thirdPage', 'fourthPage', 'lastPage'],
            menu: '#myMenu',
            scrollingSpeed:1000,
            afterRender: function(index){
                // wow = new WOW(
                //     {
                //         boxClass:     'wow',      // default
                //         animateClass: 'animate__animated', // default
                //         offset:       0,          // default
                //         mobile:       true,       // default
                //         live:         true        // default
                //     }
                // );
                // wow.init();
                window.scrollTo({
                    top:0,
                    behavior:"smooth"
                });
            },
            afterLoad: function(anchorLink, index, slideAnchor, slideIndex){
                window.scrollTo({
                    top:0,
                    behavior:"smooth"
                });

                if ( index != 0 ) {
                    wow = new WOW(
                        {
                            boxClass:     'wow',      // default
                            animateClass: 'animate__animated', // default
                            offset:       0,          // default
                            mobile:       true,       // default
                            live:         true        // default
                        }
                    );
                    wow.init();
                }

            },
            onLeave: function(anchorLink, index, slideIndex, direction){
                if ( index !== 0 ) {
                    $('.section').find('.wow').css('visibility', 'hidden');
                }
            }


        });

        // let detactScrollBar = document.querySelector('.secondPage');
        // // console.log(detactScrollBar);
        // detactScrollBar.addEventListener("scroll",function (){
        //     console.log('hello');
        //
        //     $('.section').find('.wow').css('visibility', 'revert');
        //
        // })

    });

</script>

<!-- Template Main JS File -->
</body>
</html>
