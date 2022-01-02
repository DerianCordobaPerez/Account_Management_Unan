<div id="{{$id}}" {{$attributes->merge(['class' => 'modal'])}} tabindex="-1" aria-labelledby="{{$id}}-label" aria-hidden="true">
    <div class="modal-dialog modal-lg @if($scrollable) modal-dialog-scrollable @endif modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="{{$id}}-label">
                    {{$title}}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            @isset($body)
                <div class="modal-body">
                    {{$body}}
                </div>
            @endisset

            @isset($footer)
                <div class="modal-footer">
                    {{$footer}}
                </div>
            @endisset
        </div>
    </div>
</div>
