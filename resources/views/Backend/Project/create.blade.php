@extends('Backend.layout.app')
@section('title') Project @endsection
@section('project_create_active','mm-active')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div class="icon-gradient bg-mean-fruit"> Project Create </div>
            </div>
        </div>
    </div>


    <div class="container mt-3">
        <div class="row">
            <div class="col-xl-8 m-auto ">
                <div class="card">
                    <div class="card-body">
                        <form class=" mt-2 " id="createForm" action="{{ route('project.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row ">
                                <div class="form-group col-6">
                                    <label class="form-label  icon-gradient bg-mean-fruit h6 ">Project Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control icon-gradient bg-mean-fruit">
                                    @error('name')
                                    <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                    @enderror
                                </div>
                                <div class="form-group col-6 ">
                                    <label class="form-label  icon-gradient bg-mean-fruit h6">Client Name</label>
                                    <input type="text" name="client_name" value="{{ old('client_name') }}" class="form-control icon-gradient bg-mean-fruit">
                                    @error('client_name')
                                    <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                    @enderror
                                </div>
                                <div class="form-group col-6 ">
                                    <label class="form-label  icon-gradient bg-mean-fruit h6">Photo</label>
                                    <input type="file" name="photo" value="{{ old('photo') }}"  class="form-control"   accept="image/jpeg,image/png">
                                    @error('photo')
                                    <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                    @enderror

                                </div>
                                <div class="form-group col-6 ">
                                    <label class="form-label  icon-gradient bg-mean-fruit h6">Hosting date</label>
                                    <input type="date" name="uploaded_at" value="{{ old('uploaded_at') }}"  class="form-control"   >
                                    @error('uploaded_at')
                                    <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                    @enderror
                                </div>
                                <div class="form-group col-12 ">
                                    <label class="form-label  icon-gradient bg-mean-fruit h6">Project Link</label>
                                    <input type="text" name="link" value="{{ old('link') }}"  class="form-control"   >
                                    @error('link')
                                    <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group   ">
                                <label class="form-label  icon-gradient bg-mean-fruit h6">Project Category</label>
                                <br>
                                <div class="d-flex flex-wrap ">
                                    @foreach(\App\Models\ProjectCategory::all() as $category)
                                        <div class="form-check form-check-inline  ">
                                            <input
                                                class="form-check-input text-lowercase "
                                                type="checkbox"
                                                {{ in_array($category->id,old('categories',[])) ? 'checked' : '' }}
                                                name="categories[]" value="{{ $category->id }}" id="feature{{ $category->id }}">
                                            <label class="form-check-label  icon-gradient bg-mean-fruit h6  " for="feature{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>

                                @error('categories')
                                <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                @enderror
                                @error('categories.*')
                                <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                @enderror
                            </div>
                            <div class="form-group animate__animated animate__lightSpeedInLeft animate__delay-1s " >
                                <label class="h6 fw-bolder icon-gradient bg-mean-fruit mb-3 " for="">Description</label>
                                <textarea id="summernote" name="description" cols="30" rows="8" >
                                     {{ old('description') }}
                                </textarea>
                                @error('description')
                                <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                @enderror
                            </div>



                        </form>
                    </div>
                </div>
            </div>

            <div class="col-xl-3  ">
                <div class="card  ">
                    <div class="card-body text-center p-0 mt-2  ">
                        <div class="form-group">
                            <input type="file" form="createForm" onchange="document.getElementById('createForm').onsubmit()" id="photoAdd" hidden name="photos[]" value="{{ old('photos') }}"  class="form-control" multiple  accept="image/jpeg,image/png">
                        </div>
                        @error('photos')
                        <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                        @enderror
                        <div class="">
                            <span class="pe-7s-plus h1" onclick="document.getElementById('photoAdd').click()"></span>
                        </div>
                        <div class="form-group my-2   ">
                            <input type="submit" form="createForm" class="btn btn-secondary  mt-2  icon-gradient bg-mean-fruit ">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    {{--    <script>--}}
    {{--        function allow(name,id){--}}
    {{--            $.ajaxSetup({--}}
    {{--                headers: {--}}
    {{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--                }--}}
    {{--            });--}}
    {{--            Swal.fire({--}}
    {{--                title: name,--}}
    {{--                text: 'Are you sure?',--}}
    {{--                icon: 'warning',--}}
    {{--                showCancelButton: true,--}}
    {{--                confirmButtonColor: '#3085d6',--}}
    {{--                cancelButtonColor: '#d33',--}}
    {{--                confirmButtonText: 'Yes, delete it!'--}}
    {{--            }).then((result) => {--}}
    {{--                if (result.isConfirmed) {--}}
    {{--                    $('#deleteGenre').submit();--}}
    {{--                }--}}
    {{--            })--}}
    {{--        }--}}
    {{--    </script>--}}

@endsection
