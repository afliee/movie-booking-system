function toast({title = '', message = '', type = 'info', duration = 3000}) {
    const main = document.getElementById('toast');
    if (main) {
        const icons = {
            success: 'bi-check-circle',
            info: 'bi-info-circle',
            warning: 'bi-exclamation-circle',
            error: 'bi-exclamation-circle'
        }
        const icon = icons[type];
        const delay = duration / 1000 .toFixed(2);
        const toast = document.createElement('div');
        toast.classList.add('toast', `toast--${type}`);
        toast.style.animation = `fadeInLeft ease 1.2s, fadeOutRight linear 2s ${delay}s forwards`;
        toast.innerHTML = `
            <div class="toast__icon">
                <i class="bi ${icon}"></i>
            </div>
            <div class="toast__body">
                <div class="toast__title">${title}</div>
                <div class="toast__message">${message}</div>
            </div>
            <div class="toast__close">
                <i class="bi bi-x-lg"></i>
            </div>
        `;
        main.appendChild(toast);
        setTimeout(function() {
            main.removeChild(toast);
        }, duration + 1000);
    }
}