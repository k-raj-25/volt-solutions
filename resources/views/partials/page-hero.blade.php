@props([])
<section class="ph">
    <div class="container ph-layout {{ ! empty($image) ? 'has-photo' : '' }}">
        <div class="ph-text">
            <div class="breadcrumb"><a href="{{ route('home') }}">Home</a> / {{ $crumb }}</div>
            <h1>{!! $title !!}</h1>
            <p class="lead">{{ $lead }}</p>
            @if (! empty($facts))
                <div class="contact-lines ph-facts">
                    @foreach ($facts as [$label, $value])
                        <div><small>{{ $label }}</small><span>{{ $value }}</span></div>
                    @endforeach
                </div>
            @endif
        </div>
        @if (! empty($image))
            <div class="ph-photo" style="--img:url('{{ asset('images/photos/'.$image.'.jpg') }}')" role="img" aria-label="{{ $alt ?? '' }}">
                @if (! empty($tag))<span class="tag-white">{{ $tag }}</span>@endif
            </div>
        @endif
    </div>
</section>
