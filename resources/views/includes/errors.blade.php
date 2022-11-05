@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
@if ($errors->isNotEmpty())
    @foreach($errors->all() AS $error)
        <div class="alert alert-danger">
            {{ $error}}
        </div>
    @endforeach
@endif
