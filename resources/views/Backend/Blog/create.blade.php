@extends('Backend.layout.app')
@section('title') Blog @endsection
@section('blog_create_active','mm-active')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-video icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div class="icon-gradient bg-mean-fruit"> Blog Create </div>
            </div>
        </div>
    </div>


    <div class="container mt-3">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <form class=" mt-2 " id="createFormBlog" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label  icon-gradient bg-mean-fruit h6 ">Blog Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control icon-gradient bg-mean-fruit">
                                @error('name')
                                <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                @enderror
                            </div>
                            <div class="form-group ">
                                <label class="form-label  icon-gradient bg-mean-fruit h6">Photo</label>
                                <input type="file" name="photo" value="{{ old('photo') }}"  class="form-control"   accept="image/jpeg,image/png">
                                @error('photo')
                                <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                @enderror

                            </div>


                            <div class="form-group   ">
                                <label class="form-label  icon-gradient bg-mean-fruit h6">Blog Category</label>
                                <br>
                                <div class="d-flex flex-wrap ">
                                        <select name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option selected>Open this select menu</option>
                                            @foreach(\App\Models\BlogCategory::all() as $category)
                                            <option {{ old('category_id') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    @error('category_id')
                                    <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                                    @enderror
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 m-auto ">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group animate__animated animate__lightSpeedInLeft animate__delay-1s " >
                            <label class="h6 fw-bolder icon-gradient bg-mean-fruit mb-3 " for="">Description</label>
                            <textarea id="summernote" form="createFormBlog" name="description" cols="30" rows="8" >
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                            <x-alert error="{{ $message }}" css="danger my-4 "> </x-alert>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-light" form="createFormBlog">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreBlogRequest', '#createFormBlog'); !!}

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
