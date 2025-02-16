<template>
    <div class="product-card">
      <!-- Изображение товара -->
      <div class="product-image">
        <img src="/images/iphone.png" alt="Product Image" />
      </div>
  
      <!-- Точки (например, для выбора цвета) -->
      <div class="product-dots">
        <div class="dot"></div>
        <div class="dot"></div>
        <div class="dot"></div>
      </div>
  
      <!-- Название товара -->
      <div class="product-title">
        <h2>Беспроводные наушники Nothing CMF Neckband Pro оранжевый [2024, 2.0, внутриканальные, Bluetooth, 5.3]</h2>
      </div>
  
      <!-- Цена и кнопки -->
      <div class="product-bottom">
        <p class="product-price">4 499 ₽</p>
        <div class="button-group">
          <button class="icon-btn addtofavorites">
          <AddtoFavorites />
          </button>
          <button class="icon-btn addtocart">
          <AddtoCart />
          </button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import AddtoFavorites from '@/assets/images/addtofavorites.svg';
  import AddtoCart from '@/assets/images/addtocart.svg';

  export default {
    name: 'ProductCard',
    components: {
    AddtoCart,
    AddtoFavorites,
  },
  };
  </script>
  
  <style scoped>
  .product-card {
    border: 1px solid #ddd;
    border-radius: 12px;
    padding: 16px;
    text-align: center;
    background-color: #fff;
    margin: 0 auto;
  }
  
  .product-image img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
  }
  
  .product-dots {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin: 12px 0;
  }
  
  .dot {
    width: 10px;
    height: 10px;
    background-color: #ccc;
    border-radius: 50%;
  }
  
  .product-title h2 {
    font-size: 12px;
    font-weight: 500;
    color: #333;
  }
  
  .product-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  
  .product-price {
    font-size: 18px;
    font-weight: bold;
    color: #007bff;
  }
  
  .button-group {
    display: flex;
    gap: 8px;
  }
  
  .icon-btn {
    background: none;
    border: none;
    cursor: pointer;
    padding: 8px;
  }
  
  .icon-btn svg {
    width: 24px;
    height: 24px;
  }
  </style>