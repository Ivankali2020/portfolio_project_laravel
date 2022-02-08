@extends('layouts.projectFrame')

@section('content')

    <div class="container">
        <div class="row mt-5 ">
            <div class="col-md-3  ">
                @forelse($id->photos as $key=>$p)
                    @if($key<3)
                        <img src="{{ asset('storage/projectPhotoOne/'.$id->photo) }}" class="mb-3 rounded-3  " width="100%" alt="">
                    @endif
                @empty
                    <h5>no photos</h5>
                @endforelse
            </div>
            <div class="col-md-9">
                <div class="row align-items-center ">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        asfsds
                                    </div>
                                    <div class="col-md-5">
                                        <div class=" my-3 ">
                                                <h4 class="text-center"> Blog Project Detail </h4>
                                                <table class="table table-borderless mt-4 ">
                                                    <tr>
                                                        <td class=" ">Name</td>
                                                        <td class="text-lg-end "> {{ $id->name }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" ">Client</td>
                                                        <td class="text-lg-end ">{{ $id->client_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" ">Features</td>
                                                        <td class="text-lg-end ">Co-main events </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" ">Created At</td>
                                                        <td class="text-lg-end "> {{ date('d M Y',strtotime($id->uploaded_at)) }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td class=" ">Manintainment </td>
                                                        <td class="text-lg-end "> Now </td>
                                                    </tr>

                                                </table>

                                                <div class="text-end mt-5 ">
                                                    <a class="btn btn-primary text-white">Show Live Demo</a>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-4">

            </div>
        </div>
    </div>

@endsection
