{{-- partials/accent-title.blade.php --}}
@php
    $title = $title ?? '';
    $words = explode(' ', trim($title));
    $totalWords = count($words);

    // 1 শব্দের বেশি হলে অর্ধেক অংশ accent হবে (বিজোড় হলে শেষের দিকে বেশি থাকবে)
    // 3 শব্দ হলে: ceil(3 / 2) = 2টি শব্দ accent
    $accentCount = $totalWords > 1 ? (int) ceil($totalWords / 2) : 0;

    $accentText = $accentCount > 0 ? implode(' ', array_splice($words, -$accentCount)) : '';
    $mainText = implode(' ', $words);
@endphp

{{ $mainText }}@if($accentText) <span class="text-theme-accent">{{ $accentText }}</span>@endif
