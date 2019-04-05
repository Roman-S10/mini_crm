@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <button type="button" class="close" data-dismiss="alert">×</button>
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        <ul>
            <button type="button" class="close" data-dismiss="alert">×</button>
            <li>{{session('success')}}</li>
        </ul>
    </div>
@endif

@if(session('error'))
    {{session('error')}}
@endif