<template>
  <aside class="filter-sidebar p-4 bg-white rounded-lg shadow">
    <h3 class="font-semibold mb-2">Фильтры</h3>
    <!-- Категории -->
    <div class="mb-4">
<label class="block mb-1">Категория</label>
<select v-model="localFilters.category" @change="emitFilters" class="w-full border rounded p-2">
  <option value="">Все</option>
  <option v-for="cat in categories" :key="cat.id" :value="cat.id">
    {{ cat.name }} <!-- или cat.name, что удобнее -->
  </option>
</select>

    </div>
    <!-- Диапазон цен -->
    <div class="mb-4">
      <label class="block mb-1">Цена от</label>
      <input type="number" v-model.number="localFilters.price_from" @input="emitFilters" class="w-full border rounded p-2" />
      <label class="block mt-2 mb-1">Цена до</label>
      <input type="number" v-model.number="localFilters.price_to" @input="emitFilters" class="w-full border rounded p-2" />
    </div>
    <!-- Особенности -->
    <div class="mb-4">
      <label class="block mb-1">Особенности</label>
      <div class="flex flex-col">
        <label><input type="checkbox" value="new" v-model="localFilters.features" @change="emitFilters" /> Новинки</label>
        <label><input type="checkbox" value="sale" v-model="localFilters.features" @change="emitFilters" /> Распродажа</label>
        <label><input type="checkbox" value="in-stock" v-model="localFilters.features" @change="emitFilters" /> В наличии</label>
      </div>
    </div>
    <!-- Кнопка сброса -->
    <button @click="resetFilters" class="mt-2 px-4 py-2 bg-gray-200 rounded">Сбросить</button>
  </aside>
</template>

<script>
export default {
  name: 'FilterSidebar',
  props: {
    initialFilters: {
      type: Object,
      default: () => ({ category: '', price_from: null, price_to: null, features: [] })
    },
    categories: {
      type: Array,
      default: () => []
    }
  },
  data() {
    return {
      localFilters: { ...this.initialFilters }
    }
  },
  methods: {
    emitFilters() {
      // Копируем, чтобы не мутировать пропсы
      this.$emit('filter-changed', { ...this.localFilters });
    },
    resetFilters() {
      this.localFilters = { category: '', price_from: null, price_to: null, features: [] };
      this.emitFilters();
    }
  },
  watch: {
    initialFilters: {
      handler(newVal) {
        this.localFilters = { ...newVal };
      },
      deep: true
    }
  }
}
</script>

<style scoped>
.filter-sidebar {
  width: 250px;
}
</style>