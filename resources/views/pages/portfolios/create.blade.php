@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create</h1>
                 <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                     <li class="breadcrumb-item active">Create</li>
                </ol>
                 <form action="{{route('admin.portfolios.store')}}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    {{@method_field('PUT')}}
                    <div class="row">
                        <div class="form-group col-md-3 mt-3">
                            <h2>Big image</h2>
                            <img style="height: 30vh" src="{{asset('assets/img/big_img.jpg')}}" class="img-thumbnail">
                            <input type="file" class="mt-3" name="big_img">
                        </div>
                        <div class="form-group col-md-3 mt-3">
                            <h2>Small image</h2>
                            <img style="height: 20vh" src="{{asset('assets/img/small_img.jpg')}}" class="img-thumbnail">
                            <input type="file" class="mt-3" name="small_img">
                        </div>
                        <div class="form-group col-md-4 mt-3">
                            <div>
                                <label for="title"><h4>Title</h4></label>
                                <input type="text" class="form-control" id="title" name="title" value="">
                            </div>
                            <div class="mt-3"> 
                                <label for="sub_title"><h4>Sub_Title</h4></label>
                                <input type="text" class="form-control" id="sub_title" name="sub_title" value="">
                            </div>
                            <div>
                                <label for="client"><h4>Client</h4></label>
                                <input type="text" class="form-control" id="client" name="client" value="">
                            </div>
                            <div class="mt-3"> 
                                <label for="category"><h4>Category</h4></label>
                                <input type="text" class="form-control" id="category" name="category" value="">
                            </div>
                        </div>
                            <div class="form-group col-md-6 mt-3">
                                <h2>Description</h2>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
                            </div>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary mt-3">
                </form>
        </div>
    </main>
@endsection
            
