<div class="form-group @if($type === 'checkbox') row mt-2 mb-5 @endif">
    @if($type !== 'checkbox')
        <label class="col-md-4 col-form-label text-md-right" for="{{$name}}">{{$label}}</label>
    @endif

    <div class="{{$type !== 'checkbox' ? 'col-md-12' : 'form-check'}}">
        <input id="{{$name}}" type="{{$type}}" class="{{($type !== 'checkbox') ? "form-control" : 'form-check-input'}} @error($name) is-invalid @enderror"
           name="{{$name}}" @if($type !== 'checkbox') autocomplete="{{$name}}" autofocus required @endif
           {{$attributes}}
        />

        @if($type === 'checkbox')
            <label class="form-check-label" for="{{$name}}">{{$label}}</label>
        @endif

        @error($name)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
