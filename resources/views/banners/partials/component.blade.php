{{-- 
    Komponen Banner yang bisa digunakan di halaman lain
    Usage: @include('banners.partials.component', ['position' => 'top'])
--}}
@php
    $banners = \App\Models\Banner::active()
        ->byPosition($position ?? 'top')
        ->currentlyActive()
        ->orderBy('order_index', 'asc')
        ->get();
@endphp

@if($banners->count() > 0)
    <div class="banners-{{ $position ?? 'top' }} mb-4">
        @foreach($banners as $banner)
            @include('banners.partials.item', ['banner' => $banner])
        @endforeach
    </div>
@endif

