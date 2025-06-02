<template>
  <div v-if="products.length" class="carousel-container" @wheel="handleScroll">
    <button class="carousel-control prev" @click="prevSlide">&#10094;</button>

    <div class="carousel-wrapper">
      <div class="carousel" :style="carouselStyle">
        <div
          class="carousel-item"
          v-for="product in visibleProducts"
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
import axios from 'axios'
import ProductCard from './ProductCard.vue'

export default {
  name: 'ProductCarousel',
  components: { ProductCard },
  props: {
    productIds: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      products: [],
      currentIndex: 0,
      itemsToShow: 4,
      gap: 20
    }
  },
  computed: {
    visibleProducts() {
      return this.products.slice(this.currentIndex, this.currentIndex + this.itemsToShow)
    },
    carouselStyle() {
      return {
        display: 'flex',
        transition: 'transform 0.5s ease-in-out',
        gap: `${this.gap}px`
      }
    },
    carouselItemStyle() {
      return {
        minWidth: `calc((100% / ${this.itemsToShow}) - ${this.gap}px)`
      }
    }
  },
  methods: {
    async fetchProducts() {
      try {
        const response = await axios.get('/api/products/by-ids', {
          params: { ids: this.productIds }
        })
        this.products = response.data
      } catch (error) {
        console.error('Ошибка при загрузке товаров:', error)
      }
    },
    nextSlide() {
      if (this.currentIndex < this.products.length - this.itemsToShow) {
        this.currentIndex++
      }
    },
    prevSlide() {
      if (this.currentIndex > 0) {
        this.currentIndex--
      }
    },
    handleScroll(event) {
      event.preventDefault()
      event.deltaY > 0 ? this.nextSlide() : this.prevSlide()
    }
  },
  mounted() {
    this.fetchProducts()
  }
}
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

.carousel-item {
  box-sizing: border-box;
  flex: 0 0 auto;
  padding-right: 20px;
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
  padding: 0 10px;
  border-radius: 4px;
}

.carousel-control.prev {
  left: 10px;
}

.carousel-control.next {
  right: 10px;
}
</style>
