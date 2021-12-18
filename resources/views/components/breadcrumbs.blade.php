@unless ($breadcrumbs->isEmpty())
    <nav aria-label="breadcrumb" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);">
        <ol class="breadcrumb p-2 bg-blue-gradient shadow rounded">
            @foreach ($breadcrumbs as $breadcrumb)

                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class="breadcrumb-item"><a class="text-white text-decoration-underline" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li class="breadcrumb-item text-white">{{ $breadcrumb->title }}</li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
