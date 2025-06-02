<template>
  <div class="carousel-container" @wheel="handleScroll">
    <button class="carousel-control prev" @click="prevSlide">&#10094;</button>
    <div class="carousel-wrapper">
      <div class="carousel" :style="carouselStyle">
        <div
          class="carousel-item"
          v-for="product in products"
          :key="product.id"
          :style="carouselItemStyle"
        >
          <ProductCard :product="product" />
        </div>
      </div>
    </div>
    <button class="carousel-control next" @click="nextSlide">&#10095;</button>
  </div>
</template>

<script>
import axios from 'axios';
import ProductCard from './ProductCard.vue';

export default {
  name: "Carousel",
  components: { ProductCard },
  data() {
    return {
      currentIndex: 0,
      itemsToShow: 8,
      gap: 20,
      productIds: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], // нужные ID товаров
      products: []
    };
  },
  computed: {
    carouselStyle() {
      return {
        transform: `translateX(-${this.currentIndex * (100 / this.itemsToShow)}%)`,
        gap: `${this.gap}px`
      };
    },
    carouselItemStyle() {
      return {
        minWidth: `calc((100% / ${this.itemsToShow}) - ${this.gap}px)`
      };
    }
  },
  methods: {
    nextSlide() {
      if (this.currentIndex < this.products.length - this.itemsToShow) {
        this.currentIndex++;
      }
    },
    prevSlide() {
      if (this.currentIndex > 0) {
        this.currentIndex--;
      }
    },
    handleScroll(event) {
      event.preventDefault();
      if (event.deltaY > 0) {
        this.nextSlide();
      } else {
        this.prevSlide();
      }
    },
    async fetchProducts() {
      try {
        const response = await axios.get('/products/by-ids', {
          params: { ids: this.productIds }
        });
        this.products = response.data;
      } catch (error) {
        console.error('Ошибка при загрузке товаров:', error);
      }
    }
  },
  mounted() {
    this.fetchProducts();
  }
};
</script>

<style scoped>
.carousel-container {
  position: relative;
  width: 100%;
  overflow: hidden;
}

.carousel-wrapper {
  overflow: hidden;
  width: 100%;
}

.carousel {
  display: flex;
  transition: transform 0.5s ease-in-out;
  gap: 20px; /* фиксированное расстояние между элементами */
}

.carousel-item {
  flex-shrink: 0;
  display: flex;
  flex-direction: column;
}


.carousel img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.carousel-control {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  font-size: 2rem;
  cursor: pointer;
  z-index: 1;
}

.carousel-control.prev {
  left: 10px;
}

.carousel-control.next {
  right: 10px;
}
</style>