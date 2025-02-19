import './bootstrap';
import { createApp } from 'vue';

const app = createApp({});
import '../css/app.css';
import '../css/index.css';
import '../css/product-card.css';
import '../css/catalog.css';
import '../css/categories-slider.css';


import ExampleComponent from './components/ExampleComponent.vue';
import Header from './components/Header.vue';
import CategoriesList from './components/CategoriesList.vue';
import IndexSlider from './components/IndexSlider.vue';
import LoginBlock from './components/LoginBlock.vue';
import IndexVerticalSlider from './components/IndexVerticalSlider.vue';
import ProductCard from './components/ProductCard.vue';
import Carousel4Items from './components/Carousel4Items.vue';
import IndexGrid from './components/IndexGrid.vue';
import Carousel8Items from './components/Carousel8Items.vue';
import AdvantagesGrid from './components/AdvantagesGrid.vue';
import LoginModal from './components/LoginModal.vue';

app.component('example-component', ExampleComponent);
app.component('header-component', Header);
app.component('categories-list', CategoriesList);
app.component('index-slider', IndexSlider);
app.component('login-block', LoginBlock);
app.component('verical-slider', IndexVerticalSlider)
app.component('product-card', ProductCard)
app.component('carousel', Carousel4Items)
app.component('index-grid', IndexGrid)
app.component('carousel8', Carousel8Items)
app.component('advantages-grid', AdvantagesGrid)
app.component('login-modal', LoginModal)
app.mount('#app');