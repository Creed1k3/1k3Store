import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import Header from './components/Header.vue';
import CategoriesList from './components/CategoriesList.vue';
import IndexSlider from './components/IndexSlider.vue';
import '../css/app.css';
import '../css/index.css';
import '../css/product-card.css';
import '../css/catalog.css';
import '../css/categories-slider.css';

app.component('example-component', ExampleComponent);
app.component('header-component', Header);
app.component('categories-list', CategoriesList);
app.component('index-slider', IndexSlider);

app.mount('#app');