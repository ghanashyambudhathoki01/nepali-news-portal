@php
    use App\Models\Advertise;
    $popupAd = Advertise::where('ad_position', 'popup')
        ->where('expire_date', '>=', date('Y-m-d'))
        ->first();
@endphp

@if($popupAd)
<style>
    #popup-ad-overlay {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.65);
        z-index: 99999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 16px;
    }

    #popup-ad-wrapper {
        position: relative;
        width: 90%;
        max-width: 480px;
        border-radius: 10px;
        overflow: visible;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
    }

    #popup-ad-close {
        position: absolute;
        top: -16px;
        right: -16px;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #ffffff;
        border: 2px solid #e0e0e0;
        color: #333;
        font-size: 18px;
        line-height: 1;
        cursor: pointer;
        z-index: 100010;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
        transition: background 0.2s, color 0.2s, transform 0.15s;
        padding: 0;
    }

    #popup-ad-close:hover {
        background: #222;
        color: #fff;
        border-color: #222;
        transform: scale(1.1);
    }

    #popup-ad-box {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
    }

    #popup-ad-box img {
        width: 100%;
        height: auto;
        display: block;
    }
</style>

<div id="popup-ad-overlay" onclick="return false;">
    <div id="popup-ad-wrapper" onclick="event.stopPropagation();">

        {{-- Close button (floated outside top-right corner) --}}
        <button id="popup-ad-close" type="button" title="बन्द गर्नुहोस्"
            onclick="document.getElementById('popup-ad-overlay').style.display='none'">
            &times;
        </button>

        {{-- Ad Image --}}
        <div id="popup-ad-box">
            <a href="{{ $popupAd->redirect_link }}" target="_blank" rel="noopener noreferrer">
                <img src="{{ asset($popupAd->image) }}" alt="{{ $popupAd->company_name }}">
            </a>
        </div>

    </div>
</div>

<script>
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            e.preventDefault();
            e.stopPropagation();
        }
    }, true);
</script>
@endif