<template>
  <div 
    class="embla" 
    ref="viewport" 
    @wheel.prevent="onWheel"
  >
    <div class="embla__container">
      <div
        class="embla__slide"
        v-for="product in products"
        :key="product.id"
      >
        <ProductCard :product="product" />
      </div>
    </div>
    <!-- Большие кнопки -->
    <button class="embla__button prev" @click="scrollPrev" aria-label="Назад">
      <ArrowLeftIcon />
    </button>
    <button class="embla__button next" @click="scrollNext" aria-label="Вперед">
      <ArrowRightIcon />
    </button>
  </div>
</template>

<script>
import axios from 'axios'
import EmblaCarousel from 'embla-carousel'
import ProductCard from './ProductCard.vue'

import ArrowLeftIcon from '@/assets/icons/arrow-left.svg'
import ArrowRightIcon from '@/assets/icons/arrow-right.svg'

export default {
  name: 'ProductCarousel',
  components: {
    ProductCard,
    ArrowLeftIcon,
    ArrowRightIcon
  },
  data() {
    return {
      embla: null,
      productIds: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
      products: []
    }
  },
  async mounted() {
    try {
      const response = await axios.get('/products/by-ids', {
        params: { 'ids[]': this.productIds }
      })
      const fetched = response.data
      const idToProduct = {}
      fetched.forEach(prod => {
        idToProduct[prod.id] = prod
      })
      const ordered = this.productIds
        .map(id => idToProduct[id])
        .filter(Boolean)

      this.products = ordered

      this.$nextTick(() => {
        const viewport = this.$refs.viewport
        this.embla = EmblaCarousel(viewport, {
          loop: false,
          slidesToScroll: 1,
          align: 'start'
        })
      })
    } catch (error) {
      console.error('Ошибка при загрузке товаров или инициализации карусели:', error)
    }
  },
  methods: {
    scrollNext() {
      this.embla && this.embla.scrollNext()
    },
    scrollPrev() {
      this.embla && this.embla.scrollPrev()
    },
    onWheel(event) {
      if (!this.embla) return
      if (event.deltaY > 0) {
        this.embla.scrollNext()
      } else if (event.deltaY < 0) {
        this.embla.scrollPrev()
      }
    }
  }
}
</script>

<style scoped>
.embla {
  position: relative;
  overflow: hidden;
  width: 100%;
  overscroll-behavior: contain;
  touch-action: pan-x;
}

.embla__container {
  display: flex;
  gap: 20px;
}

.embla__slide {
  flex: 0 0 calc((100% / 8) - 20px);
}

/* Большие кнопки */
.embla__button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 48px; /* Ширина кнопки */
  height: 48px; /* Высота кнопки */
  border: none;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  cursor: pointer;
  z-index: 2;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
  transition: background-color 0.2s ease, transform 0.2s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.embla__button:hover {
  background-color: rgba(0, 0, 0, 0.7);
  transform: translateY(-50%) scale(1.1);
}

.embla__button:active {
  transform: translateY(-50%) scale(0.95);
}

.embla__button.prev {
  left: 10px;
}

.embla__button.next {
  right: 10px;
}

/* SVG размер увеличен! */
.embla__button svg {
  width: 48px;
  height: 48px;
  stroke: white; /* или fill: white; в зависимости от иконки */
  fill: white;
}
</style>
