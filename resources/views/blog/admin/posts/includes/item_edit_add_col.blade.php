@php /**@var \App\Models\BlogPost $item */ @endphp
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if($item->is_published)
                    опубликовано
                @else
                    черновик
                @endif
            </div>

            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="list-unstyled">
                    <li>ID: {{ $item->id }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<br>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label for="title">Создано</label>
                    <input name="title" value="{{ $item->created_at }}" type="text" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Изменено</label>
                    <input name="title" value="{{ $item->updated_at }}" type="text" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="title">Удалено</label>
                    <input name="title" value="{{ $item->deleted_at }}" type="text" class="form-control" disabled>
                </div>
            </div>
        </div>
    </div>
</div>



