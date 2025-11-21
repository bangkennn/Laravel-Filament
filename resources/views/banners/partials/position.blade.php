@if($banners->count() > 0)
    <div class="banners-{{ $position }}">
        @foreach($banners as $banner)
            @include('banners.partials.item', ['banner' => $banner])
        @endforeach
    </div>
@endif




