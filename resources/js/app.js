import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import { createApp } from 'vue';
import UserFridges from './Components/UserFridges.vue';

const app = createApp({});
app.component('user-fridges', UserFridges);
app.mount('#app');
