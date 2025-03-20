<template>
    <div class="popular-brands">
      <!-- Заголовок -->
      <div class="slider-title">
        Популярные производители
      </div>
      
      <!-- Контейнер для карточек брендов -->
      <div class="brands-container" ref="brandsContainer">
        <slot>
          <div class="brand-card">
            <img src="/images/brand1.png" alt="Brand 1">
          </div>
          <div class="brand-card">
            <img src="/images/brand2.png" alt="Brand 2">
          </div>
          <div class="brand-card">
            <img src="/images/brand3.png" alt="Brand 3">
          </div>
          <div class="brand-card">
            <img src="/images/brand4.png" alt="Brand 4">
          </div>
          <div class="brand-card">
            <img src="/images/brand1.png" alt="Brand 1">
          </div>
          <div class="brand-card">
            <img src="/images/brand2.png" alt="Brand 2">
          </div>
          <div class="brand-card">
            <img src="/images/brand3.png" alt="Brand 3">
          </div>
          <div class="brand-card">
            <img src="/images/brand4.png" alt="Brand 4">
          </div>
          <div class="brand-card">
            <img src="/images/brand1.png" alt="Brand 1">
          </div>
          <div class="brand-card">
            <img src="/images/brand2.png" alt="Brand 2">
          </div>
          <div class="brand-card">
            <img src="/images/brand3.png" alt="Brand 3">
          </div>
          <div class="brand-card">
            <img src="/images/brand4.png" alt="Brand 4">
          </div>
          <div class="brand-card">
            <img src="/images/brand1.png" alt="Brand 1">
          </div>
          <div class="brand-card">
            <img src="/images/brand2.png" alt="Brand 2">
          </div>
          <div class="brand-card">
            <img src="/images/brand3.png" alt="Brand 3">
          </div>
          <div class="brand-card">
            <img src="/images/brand4.png" alt="Brand 4">
          </div>
          <div class="brand-card">
            <img src="/images/brand1.png" alt="Brand 1">
          </div>
          <div class="brand-card">
            <img src="/images/brand2.png" alt="Brand 2">
          </div>
          <div class="brand-card">
            <img src="/images/brand3.png" alt="Brand 3">
          </div>
          <div class="brand-card">
            <img src="/images/brand4.png" alt="Brand 4">
          </div>
          <div class="brand-card">
            <img src="/images/brand1.png" alt="Brand 1">
          </div>
          <div class="brand-card">
            <img src="/images/brand2.png" alt="Brand 2">
          </div>
          <div class="brand-card">
            <img src="/images/brand3.png" alt="Brand 3">
          </div>
          <div class="brand-card">
            <img src="/images/brand4.png" alt="Brand 4">
          </div>
        </slot> <!-- Сюда вставляются ваши карточки брендов -->
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'PopularBrands',
  };
  </script>
  
  <style scoped>
  .popular-brands {
    text-align: center;
    background-color: #f9f9f9;
    border-radius: 12px;
    margin: 0 auto;
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden; /* Скрыть элементы, выходящие за пределы родительского контейнера */
  }
  
  .slider-title {
    font-size: 16px;
    font-weight: 500;
    color: #333;
    flex: 0 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px;
  }
  
  .brands-container {
    flex: 1 1 auto;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    padding: 16px;
    overflow-y: auto; /* Включаем вертикальную прокрутку */
    scroll-behavior: smooth; /* Плавная прокрутка */
    border: 1px solid #ddd;
    border-radius: 12px;
    background-color: #fff;
  }
  
  /* Стили для карточек брендов */
  .brand-card {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #e0e0e0;
    border-radius: 12px;
    padding: 16px;
    height: 111px
  }
  
  .brand-card img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 12px;
  }
  
  /* Стили для скроллбара */
  .brands-container::-webkit-scrollbar {
    width: 8px;
  }
  
  .brands-container::-webkit-scrollbar-thumb {
    background-color: #007bff;
    border-radius: 12px;
  }
  
  .brands-container::-webkit-scrollbar-thumb:hover {
    background-color: #0056b3;
  }
  
  .brands-container::-webkit-scrollbar-track {
    background-color: #f9f9f9;
    border-radius: 12px;
  }
  </style>