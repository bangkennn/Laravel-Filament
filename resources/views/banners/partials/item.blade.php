@if($banner->image_url)
    <div class="banner-item">
        @if($banner->link_url)
            <a href="{{ $banner->link_url }}" target="_blank" rel="noopener noreferrer">
        @endif
        
        <img src="{{ asset('storage/' . $banner->image_url) }}" 
             alt="{{ $banner->title }}"
             class="w-full h-auto">
        
        @if($banner->title || $banner->subtitle)
            <div class="banner-content">
                @if($banner->title)
                    <div class="banner-title">{{ $banner->title }}</div>
                @endif
                @if($banner->subtitle)
                    <div class="banner-subtitle">{{ $banner->subtitle }}</div>
                @endif
            </div>
        @endif
        
        @if($banner->link_url)
            </a>
        @endif
    </div>
@endif




