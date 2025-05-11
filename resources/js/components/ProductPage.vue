<template>
  <div class="product-page" v-if="product">
    <!-- Breadcrumbs -->
    <nav class="breadcrumbs">
      <ul>
        <li><a href="/catalog">Каталог</a></li>
        <li v-for="(crumb, i) in product.categoryTrail" :key="i">
          <a :href="crumb.url">{{ crumb.name }}</a>
        </li>
        <li>{{ product.title }}</li>
      </ul>
    </nav>

    <!-- Заголовок -->
    <h2 class="page-path-title">{{ product.title }}</h2>

    <!-- Кнопка "избранное" -->
    <button class="favorite-btn" @click="toggleFavorite">
      <svg v-if="!favorite" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path :d="heartOutline" fill="none" stroke="#ff756b" stroke-width="2"/>
      </svg>
      <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="filled">
        <path :d="heartFilled" fill="#ff756b"/>
      </svg>
    </button>

    <!-- Основной контент -->
    <div class="content-grid">
      <div class="left">
        <div class="main-image">
          <img :src="product.images[activeImageIndex].url" alt="Product" />
        </div>
        <div class="thumbnails">
          <div
            v-for="(img, idx) in product.images"
            :key="idx"
            class="thumb"
            :class="{ selected: idx === activeImageIndex }"
            @click="setActiveImage(idx)"
          >
            <img :src="img.url" alt="Thumb" />
          </div>
        </div>
      </div>

      <div class="right">
        <p class="desc">{{ product.longDescription }}</p>

        <div class="price-block">
          <span class="price">{{ formatPrice(product.price) }}</span>
          <span v-if="product.oldPrice" class="old-price">{{ formatPrice(product.oldPrice) }}</span>
        </div>

        <div class="rating">
          <span v-for="n in 5" :key="n">
            {{ n <= product.averageRating ? '★' : '☆' }}
          </span>
          ({{ product.reviews.length }} отзывов)
        </div>

        <div class="colors" v-if="product.colors.length">
          <span class="label">Цвета:</span>
          <button
            v-for="(c, idx) in product.colors"
            :key="idx"
            class="color-btn"
            :style="{ background: c.color }"
            @click="setColorImage(c.image_url)"
          ></button>
        </div>

        <div class="actions">
          <button class="btn-buy">Купить</button>
          <button class="btn-basket">В корзину</button>
        </div>

        <!-- <div class="info">
          <p>Отправка: <strong>{{ product.shipping.min }}–{{ product.shipping.max }} {{ product.shipping.unit }}</strong> <a href="#">Почему?</a></p>
          <p>Доставка на дом — {{ formatPrice(product.shipping.cost) }}</p>
        </div> -->
      </div>
    </div>

    <!-- Характеристики -->
    <section class="section-box">
      <h2 class="section-title">Характеристики</h2>
      <div class="characteristics-grid">
        <div class="char-item" v-for="(char, i) in product.characteristics" :key="i">
          <span class="char-name">{{ char.name }}</span>
          <span class="char-value">{{ char.value }}</span>
        </div>
      </div>
    </section>

    <!-- Отзывы -->
    <section class="section-box">
      <h2 class="section-title">Отзывы</h2>
      <p>Средний рейтинг: <strong>{{ product.averageRating }}/5</strong>. Последние отзывы:</p>
      <ul class="reviews-list">
        <li v-for="(rev, i) in product.recentReviews" :key="i">
          <div class="review-author">{{ rev.author }}</div>
          <div class="review-rating">{{ rev.rating }} ⭐</div>
          <div class="review-text">"{{ rev.text }}"</div>
        </li>
      </ul>
    </section>
  </div>
</template>

<script>
export default {
  name: 'ProductPage',
  props: {
    product: { type: Object, required: true }
  },
  data() {
    return {
      activeImageIndex: 0,
      favorite: false,
      heartOutline: 'M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z',
      heartFilled: 'M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z'
    }
  },
  methods: {
    setActiveImage(i) {
      this.activeImageIndex = i;
    },
    setColorImage(url) {
      const idx = this.product.images.indexOf(url);
      if (idx !== -1) this.activeImageIndex = idx;
    },
    toggleFavorite() {
      this.favorite = !this.favorite;
    },
    formatPrice(val) {
      return Number(val).toLocaleString('ru-RU');
    }
  }
};
</script>


<style scoped>
.product-page {
  width: 100%;
  position: relative;
  padding: 1.5rem;
  background: #fff;
  border-radius: 0.8rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

.breadcrumbs ul {
  display: flex;
  flex-wrap: wrap;
  gap: 0.5rem;
  font-size: 0.9rem;
  margin-bottom: 0.5rem;
  color: #555;
}
.breadcrumbs li + li::before {
  content: '›';
  margin: 0 0.5rem;
  color: #999;
}
.breadcrumbs a {
  color: #264653;
  text-decoration: none;
}
.breadcrumbs a:hover {
  text-decoration: underline;
}

.page-path-title {
  font-size: 1.5rem;
  font-weight: 600;
  margin-bottom: 1.5rem;
  color: #333;
}

.favorite-btn {
  position: absolute;
  top: 1.2rem;
  right: 1.2rem;
  background: none;
  border: none;
  cursor: pointer;
}
.favorite-btn svg {
  width: 2rem;
  height: 2rem;
  transition: transform 0.2s;
}
.favorite-btn:hover svg {
  transform: scale(1.3);
}

.content-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
}

.left .main-image img {
  width: 100%;
  max-height: 600px;
  object-fit: cover;
  border-radius: 0.8rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
}

.thumbnails {
  display: flex;
  gap: 0.5rem;
  margin-top: 1rem;
}
.thumb {
  width: 80px;
  height: 80px;
  border-radius: 0.5rem;
  overflow: hidden;
  cursor: pointer;
  border: 2px solid transparent;
  transition: border-color 0.2s;
}
.thumb.selected {
  border-color: #264653;
}
.thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.right .desc {
  font-size: 1.1rem;
  color: rgba(34,34,34,0.9);
  line-height: 1.6;
  margin-bottom: 1.5rem;
}

.price-block {
  display: flex;
  align-items: baseline;
  gap: 1rem;
  margin-bottom: 1rem;
}
.price {
  font-size: 1.8rem;
  font-weight: 700;
  color: #e76f51;
}
.old-price {
  font-size: 1.1rem;
  color: #999;
  text-decoration: line-through;
}

.rating {
  font-size: 1rem;
  color: #444;
  margin-bottom: 1.5rem;
}

.colors {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  margin-bottom: 1.5rem;
}
.colors .label {
  font-weight: 600;
  color: #333;
}
.color-btn {
  width: 1.5rem;
  height: 1.5rem;
  border-radius: 50%;
  border: 2px solid transparent;
  cursor: pointer;
  transition: transform 0.2s;
}
.color-btn:hover {
  transform: scale(1.2);
  border-color: #264653;
}

.actions {
  display: flex;
  gap: 1rem;
  margin-bottom: 1.5rem;
}
.btn-buy {
  flex: 1;
  padding: 0.8rem;
  background: #e76f51;
  color: #fff;
  border: none;
  border-radius: 2rem;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s;
}
.btn-buy:hover {
  background: #d65a3f;
}
.btn-basket {
  flex: 1;
  padding: 0.8rem;
  background: transparent;
  color: #264653;
  border: 2px solid #264653;
  border-radius: 2rem;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s, color 0.3s;
}
.btn-basket:hover {
  background: #264653;
  color: #fff;
}

.info p {
  margin: 0.4rem 0;
  font-size: 0.9rem;
  color: #555;
}
.info a {
  color: #e76f51;
  text-decoration: none;
}
.info a:hover {
  text-decoration: underline;
}

/* Отдельные контейнеры на всю ширину */
.section-box {
  width: 100%;
  padding: 2rem;
  background: #fff;
  border-radius: 1rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  margin: 2rem 0;
}

/* Новый сеточный вывод характеристик */
.characteristics {
  padding: 0;
}
.characteristics-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 1.5rem;
}
.char-item {
  display: flex;
  flex-direction: column;
}
.char-name {
  font-weight: 600;
  color: #264653;
  margin-bottom: 0.3rem;
}
.char-value {
  color: #444;
}

/* Стили для отзывов */
.large-section {
  padding: 0;
  font-size: 1.1rem;
}
.reviews-list {
  list-style: none;
  padding: 0;
  margin-top: 1rem;
}
.reviews-list li {
  background: #fff;
  border: 1px solid #e0e0e0;
  border-radius: 0.8rem;
  padding: 1rem;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  margin-bottom: 1rem;
}
.review-author {
  font-weight: 600;
  color: #264653;
  margin-bottom: 0.3rem;
}
.review-rating {
  color: #e76f51;
  margin-bottom: 0.5rem;
}
.review-text {
  font-style: italic;
}
.section-title {
  margin: 1.5rem 0 1rem;
}
.section-title h2 {
  font-size: 1.8rem;
  color: #264653;
  border-left: 4px solid #e76f51;
  padding-left: 0.5rem;
}
</style>
