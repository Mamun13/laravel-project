@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">List Of Services</h1>
                 <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                     <li class="breadcrumb-item active">List Of Services</li>
                </ol>
                    <table class="table">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($services) > 0)
                    @foreach ($services as $key => $service)
                        <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td>{{$service->icon}}</td>
                            <td>{{$service->title}}</td>
                            <td>{!!Str::limit(strip_tags($service->description),25)!!}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a href="{{route('admin.services.edit', $service->id)}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-lg-2">
                                        <form action="{{route('admin.services.destroy', $service->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" name="submit" class="btn btn-danger mt-10" value="Delete">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            </table>
        </div>
    </main>
@endsection
            
