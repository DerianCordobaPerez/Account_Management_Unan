<label for="{{$id}}" class="control-label d-block fw-bold my-2">{{$label}}</label>

<select name="{{$name}}" id="{{$id}}" {{$attributes->merge(['class' => 'form-select'])}}>
    @foreach($options as $option)
        <option value="{{$option->id}}">{{$option->$key}}</option>
    @endforeach
</select>
