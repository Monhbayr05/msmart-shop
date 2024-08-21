@extends('layouts.admin')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-2 mb-0">Edit Brand</h6>

                            <a href="{{route('admin.brands.index')}}" class="btn bg-gradient-primary btn-sm mb-0 me-3">
                                <&nbsp; BACK
                            </a>

                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content">
                                    <div class="content-body">
                                        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3 inputs">
                                                <label>Name</label>
                                                <input type="text" name="name" class="form-control" value="{{$brand->name}}">
                                                @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 inputs">
                                                <label>Upload Image</label>
                                                <input type="file" name="image" class="form-control">
                                                <img src="{{asset($brand->image)}}" alt="Here is image" width="200px">
                                                @error( 'image' )
                                                <small class="text-danger"> {{ $message }} </small>
                                                @enderror
                                            </div>
                                            <div class="mb-3 inputs">
                                                <label>Is Public or Private</label>
                                                <input type="checkbox" name="status" {{ $brand->status ?? false ? 'checked' : '' }}>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    Update Category
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

