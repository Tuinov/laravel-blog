@php /**@var \App\Models\BlogCategory $item */ @endphp


<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="">Основные данные</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input name="title" value="{{ $item->title }}"
                               id="title"
                               type="text"
                               class="form-control"
                               minlength="3"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="slug">Идентификатор</label>
                        <input name="slug" value="{{ $item->slug }}"
                               id="slug"
                               type="text"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Родитель</label>
                        <select name="parent_id"
                               id="parent_id"
                               type="text"
                               class="form-control"
                            placeholder="Выберите категорию"
                                required>
                            @foreach($categoryList as $categoryOption)
                                <option value="{{$categoryOption->id}}"
                                    @if($categoryOption->id == $item->parent_id) selected @endif>
                                        {{$categoryOption->id_title}}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description"
                               id="description"
                               class="form-control"
                               rows="3">{{ old('description', $item->description) }}
                            </textarea>
                    </div>
                </div>
            </div>
</div>


