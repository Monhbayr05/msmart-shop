@extends('layouts.admin')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-2 mb-0">All Brands</h6>

                            <a href="{{route('admin.brands.create')}}" class="btn bg-gradient-primary btn-sm mb-0 me-3">
                                +&nbsp; New Category
                            </a>
                        </div>
                    </div>

                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Slug</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-secondary opacity-7">Created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if ($item->image)
                                                        <img src="{{asset($item->image)}}" alt="Post Image" class="avatar avatar-sm me-3 border-radius-lg" width="100">
                                                    @else
                                                        no image
                                                    @endif
                                                </div>

                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            @if($item->status==0)
                                                <span class="badge badge-sm bg-gradient-success">Public</span>
                                            @elseif($item->status==1)
                                                <span class="badge badge-sm bg-gradient-primary">Private</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-warning">Other</span>
                                            @endif
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold">{{$item->created_at}}</span>
                                        </td>
                                        <td class="align-middle">
                                            <div class="btn">
                                                <a href="{{route('admin.brands.edit',$item->id)}}" class="editbtn">
                                                    EDIT
                                                </a>

                                                <form action="{{ route('admin.brands.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dltbtn">
                                                        DELETE
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
