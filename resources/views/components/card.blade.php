<div {{$attributes->merge(['class' => 'card shadow'])}}>
    @isset($title)
        <div class="card-header">
            <h5 class="fw-bold text-blue text-center">
                {{ $title }}
            </h5>
        </div>
    @endisset
    <div class="card-body">
        {{$slot}}
    </div>
    @isset($footer)
        <div class="card-footer text-center text-blue">
            {{$footer}}
        </div>
    @endisset
</div>
