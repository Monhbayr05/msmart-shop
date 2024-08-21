@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products
                        <a href="{{route('admin.products.index')}}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                        Home
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                        Details
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="image-tab" data-bs-target="tab" data-bs-toggle="tab" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                        Product Image
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledhy="home-tab" tabinex="0">
                                    <div class="mb-3">
                                        <select name="category_id" class="form-control" id="category_id" required>
                                            <option>
                                                Select Category
                                            </option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <select name="brand_id" class="form-control" id="brand" required>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group input-groupdynamic">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" name="name" class="multisteps-form__input form-control" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group input-groupdynamic">
                                            <label for="slug" class="form-label">Product Slug</label>
                                            <input type="text" name="slug" class="multisteps-form__input form-control" value="{{old('slug')}}">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="input-group input-groupdynamic">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea name="description" rows="4" class="multisteps-form__input form-control">{{old('description')}}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                                        aria-labelledby="details-tab" tabindex="0">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-3">
                                                    <div class="input-group input-group-dynamic">
                                                        <label for="sale_percent" class="form-label">Sale Percent</label>
                                                        <input type="number" name="sale_percent" mac="100"
                                                            class="multisteps-form__input form-control"
                                                            value="{{old('sale_percent')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
@endsection
