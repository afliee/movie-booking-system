<style>
    .dot-spin {
        position: relative;
        width: 10px;
        height: 10px;
        border-radius: 5px;
        background-color: transparent;
        color: transparent;
        box-shadow: 0 -18px 0 0 #9880ff, 12.727926px -12.727926px 0 0 #9880ff, 18px 0 0 0 #9880ff, 12.727926px 12.727926px 0 0 rgba(152, 128, 255, 0), 0 18px 0 0 rgba(152, 128, 255, 0), -12.727926px 12.727926px 0 0 rgba(152, 128, 255, 0), -18px 0 0 0 rgba(152, 128, 255, 0), -12.727926px -12.727926px 0 0 rgba(152, 128, 255, 0);
        animation: dot-spin 1.5s infinite linear;
    }
    .snippet {
        display: none;
    }
    @keyframes dot-spin {
        0%, 100% {
            box-shadow: 0 -18px 0 0 #9880ff, 12.727926px -12.727926px 0 0 #9880ff, 18px 0 0 0 #9880ff, 12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), 0 18px 0 -5px rgba(152, 128, 255, 0), -12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), -18px 0 0 -5px rgba(152, 128, 255, 0), -12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0);
        }
        12.5% {
            box-shadow: 0 -18px 0 -5px rgba(152, 128, 255, 0), 12.727926px -12.727926px 0 0 #9880ff, 18px 0 0 0 #9880ff, 12.727926px 12.727926px 0 0 #9880ff, 0 18px 0 -5px rgba(152, 128, 255, 0), -12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), -18px 0 0 -5px rgba(152, 128, 255, 0), -12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0);
        }
        25% {
            box-shadow: 0 -18px 0 -5px rgba(152, 128, 255, 0), 12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0), 18px 0 0 0 #9880ff, 12.727926px 12.727926px 0 0 #9880ff, 0 18px 0 0 #9880ff, -12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), -18px 0 0 -5px rgba(152, 128, 255, 0), -12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0);
        }
        37.5% {
            box-shadow: 0 -18px 0 -5px rgba(152, 128, 255, 0), 12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0), 18px 0 0 -5px rgba(152, 128, 255, 0), 12.727926px 12.727926px 0 0 #9880ff, 0 18px 0 0 #9880ff, -12.727926px 12.727926px 0 0 #9880ff, -18px 0 0 -5px rgba(152, 128, 255, 0), -12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0);
        }
        50% {
            box-shadow: 0 -18px 0 -5px rgba(152, 128, 255, 0), 12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0), 18px 0 0 -5px rgba(152, 128, 255, 0), 12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), 0 18px 0 0 #9880ff, -12.727926px 12.727926px 0 0 #9880ff, -18px 0 0 0 #9880ff, -12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0);
        }
        62.5% {
            box-shadow: 0 -18px 0 -5px rgba(152, 128, 255, 0), 12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0), 18px 0 0 -5px rgba(152, 128, 255, 0), 12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), 0 18px 0 -5px rgba(152, 128, 255, 0), -12.727926px 12.727926px 0 0 #9880ff, -18px 0 0 0 #9880ff, -12.727926px -12.727926px 0 0 #9880ff;
        }
        75% {
            box-shadow: 0 -18px 0 0 #9880ff, 12.727926px -12.727926px 0 -5px rgba(152, 128, 255, 0), 18px 0 0 -5px rgba(152, 128, 255, 0), 12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), 0 18px 0 -5px rgba(152, 128, 255, 0), -12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), -18px 0 0 0 #9880ff, -12.727926px -12.727926px 0 0 #9880ff;
        }
        87.5% {
            box-shadow: 0 -18px 0 0 #9880ff, 12.727926px -12.727926px 0 0 #9880ff, 18px 0 0 -5px rgba(152, 128, 255, 0), 12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), 0 18px 0 -5px rgba(152, 128, 255, 0), -12.727926px 12.727926px 0 -5px rgba(152, 128, 255, 0), -18px 0 0 -5px rgba(152, 128, 255, 0), -12.727926px -12.727926px 0 0 #9880ff;
        }
    }
</style>
<div class="snippet" data-title="dot-spin">
    <div class="stage">
        <div class="dot-spin"></div>
    </div>
</div>
<script>
    const snippets = $('.snippet');

</script>