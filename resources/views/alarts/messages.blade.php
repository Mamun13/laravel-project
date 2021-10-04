@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alart alart-danger alart-dismissible">
            <button type="button" class="close" data-dismiss="alart">&times;</button>
            <strong>Error!</strong>{{session('error')}}
        </div>
    @endforeach
@endif

@if (session('error'))
    @foreach ($errors->all() as $error)
        <div class="alart alart-danger alart-dismissible">
            <button type="button" class="close" data-dismiss="alart">&times;</button>
            <strong>Error!</strong>{{session('error')}}
        </div>
    @endforeach
@endif

@if (session('success'))
    @foreach ($errors->all() as $error)
        <div class="alart alart-danger alart-dismissible">
            <button type="button" class="close" data-dismiss="alart">&times;</button>
            <strong>success!</strong>{{session('success')}}
        </div>
    @endforeach
@endif

