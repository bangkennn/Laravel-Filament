<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Banners - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .banner-container {
            margin-bottom: 2rem;
        }
        .banner-item {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }
        .banner-item img {
            width: 100%;
            height: auto;
            display: block;
        }
        .banner-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);
            color: white;
            padding: 1.5rem;
        }
        .banner-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .banner-subtitle {
            font-size: 1rem;
            opacity: 0.9;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Banners</h1>

        @if(isset($banners['top']) && $banners['top']->count() > 0)
            <div class="banner-container">
                <h2 class="text-2xl font-semibold mb-4">Banner Top</h2>
                @foreach($banners['top'] as $banner)
                    @include('banners.partials.item', ['banner' => $banner])
                @endforeach
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @if(isset($banners['sidebar']) && $banners['sidebar']->count() > 0)
                <div class="banner-container">
                    <h2 class="text-2xl font-semibold mb-4">Banner Sidebar</h2>
                    @foreach($banners['sidebar'] as $banner)
                        @include('banners.partials.item', ['banner' => $banner])
                    @endforeach
                </div>
            @endif

            <div class="md:col-span-2">
                <!-- Konten utama bisa ditempatkan di sini -->
            </div>
        </div>

        @if(isset($banners['footer']) && $banners['footer']->count() > 0)
            <div class="banner-container mt-8">
                <h2 class="text-2xl font-semibold mb-4">Banner Footer</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($banners['footer'] as $banner)
                        @include('banners.partials.item', ['banner' => $banner])
                    @endforeach
                </div>
            </div>
        @endif

        @if(isset($banners['popup']) && $banners['popup']->count() > 0)
            @foreach($banners['popup'] as $banner)
                @include('banners.partials.popup', ['banner' => $banner])
            @endforeach
        @endif
    </div>
</body>
</html>




