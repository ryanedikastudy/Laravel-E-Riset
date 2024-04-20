import './bootstrap';

import Alpine from 'alpinejs';
import mask from '@alpinejs/mask'
import persist from '@alpinejs/persist'

window.Alpine = Alpine;
Alpine.plugin(mask);
Alpine.plugin(persist);

Alpine.start();