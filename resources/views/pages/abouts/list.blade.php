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
                    <th scope="col">Title1</th>
                    <th scope="col">Title2</th>
                    <th scope="col">image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($abouts) > 0)
                    @foreach ($abouts as $key => $about)
                        <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td>{{$about->title1}}</td>
                            <td>{{$about->title2}}</td>
                            <td>
                                <img style="height: 10vh" src="{{url($about->image)}}" alt="image">
                            </td>
                            <td>{!!Str::limit(strip_tags($about->description),25)!!}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a href="{{route('admin.abouts.edit', $about->id)}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-lg-2">
                                        <form action="{{route('admin.abouts.destroy', $about->id)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" name="submit" class="btn btn-danger " value="Delete">
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
            
