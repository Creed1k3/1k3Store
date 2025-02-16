<template>
    <div class="categories-list">
      <h3>Категории</h3>
      <ul>
        <li v-for="category in categories" :key="category.id" class="category-item">
          {{ category.name }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    name: 'CategoriesList',
    data() {
      return {
        categories: [
          { id: 1, name: 'Электроника' },
          { id: 2, name: 'Одежда' },
          { id: 3, name: 'Дом и сад' },
          { id: 4, name: 'Красота и здоровье' },
          { id: 5, name: 'Спорт и отдых' },
        ],
      };
    },
  };
  </script>
  
  <style scoped>
  .categories-list {
    padding: 10px;
    background-color: #f9f9f9;
    width: 100%;
    height: 100%;
  }
  
  .categories-list h3 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #333;
  }
  
  .category-item {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
    font-size: 16px;
    color: #555;
  }
  
  .category-item:last-child {
    border-bottom: none;
  }
  </style>