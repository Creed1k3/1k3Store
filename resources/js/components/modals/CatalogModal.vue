<template>
    <div class="modal" v-if="isOpen">
    <div class="modal-content">
    <span class="close" @click="closeModal">&times;</span>
    <div class="modal-body">
    <div class="catalog-menu">
    <ul>
    <li v-for="category in categories" :key="category.id">
    <a href="#" @click.prevent="selectCategory(category)">
    {{ category.name }}
    </a>
    </li>
    </ul>
    </div>
    <div class="catalog-content">
    <h3 v-if="selectedCategory">
    Подбор {{ selectedCategory.name }}
    </h3>
    <div v-if="selectedCategory">
    <button>Собрать свою кухню</button>
  
    <div v-if="selectedCategory.subcategories">
    <h4>Встраиваемая техника</h4>
    <ul>
    <li v-for="subcategory in selectedCategory.subcategories" :key="subcategory.id">
    <a href="#">
    {{ subcategory.name }} {{ subcategory.count }} >
    </a>
    </li>
    </ul>
    </div>
  
    <div v-if="selectedCategory.kitchenAppliances">
    <h4>Техника для кухни</h4>
    <ul>
    <li v-for="appliance in selectedCategory.kitchenAppliances" :key="appliance.id">
    <a href="#">
    {{ appliance.name }} {{ appliance.count }} >
    </a>
    </li>
    </ul>
    </div>
  
    <div v-if="selectedCategory.homeAppliances">
    <h4>Техника для дома</h4>
    <ul>
    <li v-for="homeAppliance in selectedCategory.homeAppliances" :key="homeAppliance.id">
    <a href="#">
    {{ homeAppliance.name }} {{ homeAppliance.count }} >
    </a>
    </li>
    </ul>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
   </template>
  
   <script>
   export default {
    name: 'CatalogModal',
    props: {
    isOpen: Boolean
    },
    data() {
    return {
    categories: [
    {
    id: 1,
    name: 'Бытовая техника',
    subcategories: [
    { id: 101, name: 'Варочные панели', count: 1423 },
    { id: 102, name: 'Духовые шкафы', count: 944 },
    { id: 103, name: 'Вытяжки', count: 1088 },
    { id: 104, name: 'Встраиваемые микроволновые печи', count: 139 }
    ],
    kitchenAppliances: [
    { id: 105, name: 'Плиты и печи', count: 1873 },
    { id: 106, name: 'Холодильное оборудование', count: 2029 },
    { id: 107, name: 'Посудомоечные машины', count: 626 },
    { id: 108, name: 'Приготовление напитков', count: 4275 }
    ],
    homeAppliances: [
    { id: 109, name: 'Стирка и сушка', count: 1145 },
    { id: 110, name: 'Глаженье', count: 1015 },
    { id: 111, name: 'Уборка', count: 2609 },
    { id: 112, name: 'Водонагреватели и котлы отопления', count: 1215 }
    ]
    },
    { id: 2, name: 'Красота и здоровье' },
    { id: 3, name: 'Смартфоны и фототехника' },
    { id: 4, name: 'ТВ, консоли и аудио' },
    // Другие категории
    ],
    selectedCategory: null
    };
    },
    methods: {
    closeModal() {
    this.$emit('close');
    },
    selectCategory(category) {
    this.selectedCategory = category;
    }
    }
   };
   </script>
  
   <style scoped>
   /* Стили для модального окна */
   .modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
   }
  
   .modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    width: 80%;
    max-width: 900px;
    position: relative;
   }
  
   .close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 20px;
    cursor: pointer;
    color: #aaa;
   }
  
   .close:hover {
    color: black;
   }
  
   .modal-body {
    display: flex;
   }
  
   .catalog-menu {
    width: 30%;
   }
  
   .catalog-menu ul {
    list-style: none;
    padding: 0;
   }
  
   .catalog-menu li a {
    display: block;
    padding: 10px;
    text-decoration: none;
    color: #333;
    border-bottom: 1px solid #eee;
   }
  
   .catalog-menu li a:hover {
    background-color: #f5f5f5;
   }
  
   .catalog-content {
    width: 70%;
    padding-left: 20px;
   }
  
   /* Дополнительные стили по необходимости */
   </style>
  