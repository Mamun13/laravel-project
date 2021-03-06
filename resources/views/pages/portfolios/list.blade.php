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
                    <th scope="col">Title</th>
                    <th scope="col">Sub_Title</th>
                    <th scope="col">Big_img</th>
                    <th scope="col">Small_img</th>
                    <th scope="col">Description</th>
                    <th scope="col">Client</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($portfolios) > 0)
                    @foreach ($portfolios as $key => $portfolio)
                        <tr>
                            <th scope="row">{{$key +1}}</th>
                            <td>{{$portfolio->title}}</td>
                            <td>{{$portfolio->sub_title}}</td>
                            <td>
                                <img style="height: 10vh" src="{{url($portfolio->big_img)}}" alt="big_img">
                            </td>
                            <td>
                                <img style="height: 10vh" src="{{url($portfolio->small_img)}}" alt="big_img">
                            </td>
                            <td>{!!Str::limit(strip_tags($portfolio->description),25)!!}</td>
                            <td>{{$portfolio->client}}</td>
                            <td>{{$portfolio->category}}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <a href="{{route('admin.portfolios.edit', $portfolio->id)}}" class="btn btn-primary">Edit</a>
                                    </div>
                                    <div class="col-lg-2">
                                        <form action="{{route('admin.portfolios.destroy', $portfolio->id)}}" method="POST">
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
            
