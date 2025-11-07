@if($banner->image_url)
    <div id="banner-popup-{{ $banner->id }}" 
         class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-2xl w-full relative">
            <button onclick="closePopup({{ $banner->id }})" 
                    class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-2xl font-bold">
                &times;
            </button>
            
            @if($banner->link_url)
                <a href="{{ $banner->link_url }}" target="_blank" rel="noopener noreferrer">
            @endif
            
            <img src="{{ asset('storage/' . $banner->image_url) }}" 
                 alt="{{ $banner->title }}"
                 class="w-full h-auto rounded-t-lg">
            
            @if($banner->title || $banner->subtitle)
                <div class="p-4">
                    @if($banner->title)
                        <h3 class="text-xl font-bold mb-2">{{ $banner->title }}</h3>
                    @endif
                    @if($banner->subtitle)
                        <p class="text-gray-600">{{ $banner->subtitle }}</p>
                    @endif
                </div>
            @endif
            
            @if($banner->link_url)
                </a>
            @endif
        </div>
    </div>

    <script>
        // Tampilkan popup saat halaman dimuat (hanya sekali per session)
        document.addEventListener('DOMContentLoaded', function() {
            const popupId = 'banner-popup-{{ $banner->id }}';
            const popupShown = sessionStorage.getItem(popupId);
            
            if (!popupShown) {
                const popup = document.getElementById(popupId);
                if (popup) {
                    popup.classList.remove('hidden');
                    sessionStorage.setItem(popupId, 'shown');
                }
            }
        });

        function closePopup(bannerId) {
            const popup = document.getElementById('banner-popup-' + bannerId);
            if (popup) {
                popup.classList.add('hidden');
            }
        }
    </script>
@endif

