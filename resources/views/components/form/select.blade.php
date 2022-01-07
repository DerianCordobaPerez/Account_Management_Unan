<label for="{{$id}}" class="control-label d-block fw-bold my-2">{{$label}}</label>

<select name="{{$name}}" id="{{$id}}" {{$attributes->merge(['class' => 'form-select'])}} required>
    @foreach($options as $option)
        <option value="{{$option->$key}}">{{$option->$key}}</option>
    @endforeach
</select>
