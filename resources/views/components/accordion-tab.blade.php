<div class="accordion-item">
    <h2 class="accordion-header" id="flush-heading-{{str_replace(' ', '', $title)}}">
        <button class="accordion-button collapsed text-blue" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-{{str_replace(' ', '', $title)}}" aria-expanded="false" aria-controls="flush-collapse-{{$title}}">
            {{$title}}
        </button>
    </h2>
    <div id="flush-collapse-{{str_replace(' ', '', $title)}}" class="accordion-collapse collapse" aria-labelledby="flush-heading-{{str_replace(' ', '', $title)}}" data-bs-parent="#accordionFlushExample">
        <div class="accordion-body d-flex justify-content-between">
            {{$slot}}
        </div>
    </div>
</div>
