import './bootstrap';
import Alpine from 'alpinejs';
import { createIcons, icons } from 'lucide';

window.Alpine = Alpine;
Alpine.start();

// Initialize Lucide icons on DOM ready and whenever dynamic DOM changes
document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
});

window.refreshIcons = () => {
    createIcons({ icons });
};
