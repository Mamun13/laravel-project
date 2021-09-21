@extends('layouts.admin_layout')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Contacts</h1>
                 <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                     <li class="breadcrumb-item active">Contacts</li>
                </ol>
            <h2>Hey, Nice to meet you, Welcome to Contacts page.</h2>
        </div>
    </main>
@endsection
            
        