<label for="{{$id}}">{{$label}}</label>
<input type="{{$type}}" name="{{$name}}"
       id="{{$id}}" {{$attributes->merge(['class' => 'form-control'])}}
       @if($disabled) disabled @endif />
