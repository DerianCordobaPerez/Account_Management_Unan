@unless ($breadcrumbs->isEmpty())
    <nav aria-label="breadcrumb" >
        <ul class="breadcrumbs list-unstyled">
            @foreach ($breadcrumbs as $breadcrumb)

                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class="breadcrumbs__item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="breadcrumbs__item is-active">{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </ul>
    </nav>
@endunless
