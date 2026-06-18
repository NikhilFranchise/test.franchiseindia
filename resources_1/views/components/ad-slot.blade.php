{{-- resources/views/components/ad-slot.blade.php --}}
@props(['id', 'slotPath' => null, 'sizes' => [[300, 250]]])

<div id="{{ $id }}" class="gpt-ad" data-slot="{{ $slotPath }}" data-sizes="{{ json_encode($sizes) }}"></div>

@once
    @push('scripts')
        <script>
            window.googletag = window.googletag || {
                cmd: []
            };
            googletag = window.googletag;
        </script>
    @endpush
@endonce

@push('scripts')
    <script>
        // Ensure slot is defined and displayed on DOM ready or when component is injected
        (function initAdSlot(id) {
            const el = document.getElementById(id);
            if (!el) return;
            const slotPath = el.dataset.slot;
            let sizes;
            try {
                sizes = JSON.parse(el.dataset.sizes || '[]');
            } catch (e) {
                sizes = [];
            }

            if (!slotPath || !sizes.length) return;

            googletag.cmd.push(function() {
                googletag.defineSlot(slotPath, sizes, id).addService(googletag.pubads());
                googletag.display(id);
            });
        })('{{ $id }}');
    </script>
@endpush
