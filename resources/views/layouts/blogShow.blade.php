@extends('layouts.projectFrame')

@section('content')

    <div class="container">
        <div class="row mt-5 ">
            <div class="col-xl-9">
                <div class="card ">
                    <div class="card-body">
                        <div class="row  ">
                            <div class="col-md-7 mb-4 ">
                                <img src="{{ asset('storage/blogPhoto/'.$blog->photo) }}" class="rounded m-auto " width="100%" alt="">
                            </div>
                            <div class="col-md-5 d-none d-md-block ">
                                <div class=" my-3 ">
                                    <h4 class="text-center"> ဆောင်းပါးအကြောင်းအရာများ {{ $blog->id }}</h4>
                                    <table class="table table-borderless mt-4 ">
                                        <tr>
                                            <td class=" ">စာရေးသူ</td>
                                            <td class="text-lg-end "> {{ $blog->user->name }} </td>
                                        </tr>

                                        <tr>
                                            <td class=" ">အစိတ်အပိုင်း</td>
                                            <td class="text-lg-end "> {{ $blog->category->name }} </td>
                                        </tr>
                                        <tr>
                                            <td class=" ">ဆောင်းပါးတင်နေ့</td>
                                            <td class="text-lg-end "> {{ $blog->created_at->format('d M Y') }} </td>
                                        </tr>

                                    </table>

                                </div>
                            </div>
                        </div>
                        {!! $blog->description !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                @forelse($related as $r)
                    <a href="{{ route('blogShow',$r->slug) }}" class="text-decoration-none text-dark ">
                        <div class="card overflow-hidden mb-3 ">
                            <img src="{{ asset('storage/blogPhoto/'.$r->photo) }}" class="card-img-top" alt="">
                            <div class="card-body d-flex justify-content-between ">
                                <div>{{$r->name}}</div> {{ $r->id }}
                                <div class="">
                                    #{{ $r->category->name }}
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                @endforelse
            </div>
        </div>
    </div>

@endsection
