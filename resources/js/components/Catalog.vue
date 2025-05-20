<template>
  <div class="flex gap-6 mt-8 mb-12 catalog-container">
    <!-- Sidebar -->
    <FilterSidebar
      :initial-filters="filters"
      :categories="categories"
      @filter-changed="applyFilters"
    />

    <!-- Product Grid -->
    <div ref="productGrid" class="product-grid-container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
      <ProductCard
        v-for="product in filteredProducts"
        :key="product.id"
        :product="product"
      />
    </div>
  </div>
</template>

<script>
import ProductCard from './ProductCard.vue'
import FilterSidebar from './FilterSidebar.vue'
import autoAnimate from '@formkit/auto-animate'

export default {
  name: 'Catalog',
  components: {
    ProductCard,
    FilterSidebar
  },
  props: {
    products: {
      type: Array,
      required: true
    },
    categories: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      filters: {
        category: '',
        price_from: null,
        price_to: null,
        features: []
      }
    }
  },
computed: {
  filteredProducts() {
    const { category, price_from, price_to, features } = this.filters

    // Получаем массив id категорий, по которым надо фильтровать
    let categoryIds = []

    if (category) {
      // Проверяем — это родительская категория или нет
      const selectedCategory = this.categories.find(cat => cat.id === category)
      if (selectedCategory) {
        if (this.categories.some(cat => cat.parent_id === selectedCategory.id)) {
          // Это родительская категория — добавляем её и все дочерние id
          categoryIds = [selectedCategory.id, 
            ...this.categories
              .filter(cat => cat.parent_id === selectedCategory.id)
              .map(cat => cat.id)
          ]
        } else {
          // Просто одна категория — фильтруем по ней
          categoryIds = [selectedCategory.id]
        }
      }
    }

    return this.products.filter(product => {
      // Фильтр по категориям с учетом дочерних
      const byCategory = categoryIds.length ? categoryIds.includes(product.category_id) : true

              const byPriceFrom = price_from != null ? product.price >= price_from : true
const byPriceTo = price_to ? product.price <= price_to : true

      const byFeatures = features.length
        ? features.every(feature => {
            if (feature === 'new') return product.is_new
            if (feature === 'sale') return product.is_on_sale
            if (feature === 'in-stock') return product.in_stock
            return true
          })
        : true

      return byCategory && byPriceFrom && byPriceTo && byFeatures
    })
  }
},
  mounted() {
    if (this.$refs.productGrid) {
      autoAnimate(this.$refs.productGrid)
    }
  },
  methods: {
    applyFilters(newFilters) {
      this.filters = { ...newFilters }
    }
  }
}
</script>

<style scoped>
.catalog-container {
  margin-top: 20px;
  display: flex; /* Горизонтальное расположение */
}

.product-grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 10px;
  flex: 1;
}
</style>
