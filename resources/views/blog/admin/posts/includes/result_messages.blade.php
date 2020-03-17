@php /**@var \Illuminate\Support\ViewErrorBag $errors */ @endphp
@if($errors->any())
    <div class="row">
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>

    </div>
@endif

@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="alert alert-success">
                {{ session()->get('success')  }}
            </div>
        </div>
    </div>
@endif
