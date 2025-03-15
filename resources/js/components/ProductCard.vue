<template>
  <div class="product-card">
    <!-- Изображение товара -->
    <div class="product-image">
      <img :src="product.image" alt="Product Image" />
    </div>

    <!-- Точки (например, для выбора цвета) -->
    <div class="product-dots">
      <div
        v-for="(color, index) in product.colors"
        :key="index"
        class="dot"
        :style="{ backgroundColor: color }"
      ></div>
    </div>

    <!-- Название товара -->
    <div class="product-title">
      <h2>{{ product.title }}</h2>
    </div>

    <!-- Цена и кнопки -->
    <div class="product-bottom">
      <p class="product-price">{{ product.price }} ₽</p>
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
  props: {
    product: {
      type: Object,
      required: true,
    },
  },
};
</script>

<style scoped>
.product-card {
  width: 352px;
  border: 1px solid #ddd;
  border-radius: 12px;
  padding: 16px;
  text-align: center;
  background-color: #fff;
  margin: 0 auto;
}

.product-image img {
  width: 200px;
  height: 200px;
  border-radius: 8px;
  margin: 0 auto;
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