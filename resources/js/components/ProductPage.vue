<template>
  <div class="product-page">
    <!-- Breadcrumbs -->
    <nav class="breadcrumbs">
      <ul>
        <li><a href="/catalog">Каталог</a></li>
        <li><a href="/catalog/beauty">Красота и здоровье</a></li>
        <li><a href="/catalog/beauty/shaving">Бритье, стрижка и эпиляция</a></li>
        <li>Электробритва {{ product.title }}</li>
      </ul>
    </nav>

    <!-- Заголовок -->
    <h2 class="page-path-title">{{ product.title }}</h2>

    <!-- Кнопка "избранное" -->
    <button class="favorite-btn" @click="toggleFavorite">
      <svg v-if="!favorite" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="none" stroke="#ff756b" stroke-width="2"/>
      </svg>
      <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="filled">
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" fill="#ff756b"/>
      </svg>
    </button>

    <!-- Контент -->
    <div class="content-grid">
      <div class="left">
        <div class="main-image">
          <img :src="product.images[activeImageIndex]" alt="Product" />
        </div>
        <div class="thumbnails">
          <div
            v-for="(img, idx) in product.images"
            :key="idx"
            class="thumb"
            :class="{ selected: idx === activeImageIndex }"
            @click="setActiveImage(idx)"
          >
            <img :src="img" alt="Thumb" />
          </div>
        </div>
      </div>
      <div class="right">
        <p class="desc">{{ longDescription }}</p>
        <div class="price-block">
          <span class="price">$ {{ product.price.toFixed(2) }}</span>
          <span v-if="product.oldPrice" class="old-price">$ {{ product.oldPrice.toFixed(2) }}</span>
        </div>
        <div class="rating">⭐⭐⭐⭐☆ ({{ product.reviews.length }} отзывов)</div>
        <div class="colors">
          <span class="label">Цвета:</span>
          <button
            v-for="(c, i) in product.colors"
            :key="i"
            class="color-btn"
            :style="{ background: c }"
          ></button>
        </div>
        <div class="actions">
          <button class="btn-buy">Купить</button>
          <button class="btn-basket">В корзину</button>
        </div>
        <div class="info">
          <p>Отправка: <strong>5–7 недель</strong> <a href="#">Почему?</a></p>
          <p>Доставка на дом — $10</p>
        </div>
      </div>
    </div>

    <!-- Название секции Характеристики -->
    <div class="section-title">
      <h2>Характеристики</h2>
    </div>

    <!-- Характеристики -->
    <div class="section-box">
      <div class="section characteristics">
        <div class="characteristics-grid">
          <div class="char-item" v-for="char in characteristics" :key="char.name">
            <span class="char-name">{{ char.name }}</span>
            <span class="char-value">{{ char.value }}</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Название секции Отзывы -->
    <div class="section-title">
      <h2>Отзывы</h2>
    </div>

    <!-- Отзывы -->
    <div class="section-box">
      <div class="section reviews large-section">
        <p>Средний рейтинг: <strong>{{ averageRating }}/5</strong>. Последние отзывы от реальных покупателей:</p>
        <ul class="reviews-list">
          <li v-for="(review, index) in recentReviews" :key="index">
            <div class="review-author">{{ review.author }}</div>
            <div class="review-rating">{{ review.rating }} ⭐</div>
            <div class="review-text">"{{ review.text }}"</div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'ProductPage',
  data() {
    return {
      activeImageIndex: 0,
      favorite: false,
      product: {
        title: 'Polaris PMR 0304R PRO 5',
        price: 149.99,
        oldPrice: 179.99,
        images: [
          'https://picsum.photos/700/500?random=21',
          'https://picsum.photos/700/500?random=22',
          'https://picsum.photos/700/500?random=23',
        ],
        colors: ['#000000', '#ffffff', '#a9a9a9'],
        reviews: [
          { author: 'Алексей С.', rating: 5, text: 'Бритва отлично бреет, дергания нет, держит заряд как заявлено.' },
          { author: 'Марина П.', rating: 4, text: 'Подарила мужу, доволен. Удобная и водонепроницаемая.' },
          { author: 'Игорь Т.', rating: 5, text: 'Быстрая зарядка, простая чистка. Рекомендую.' },
        ],
      },
      longDescription: 'Электробритва Polaris PMR 0304R PRO 5 оснащена 4D системой повторения контуров...',
      characteristics: [
        { name: 'Тип электробритвы', value: 'Роторная' },
        { name: 'Система бритья', value: 'PRO 5 BLADES, 3 плавающие головки' },
        { name: 'Повторение контуров', value: '4D адаптация к лицу' },
        { name: 'Сухое/влажное', value: 'Да' },
        { name: 'Батарея', value: 'Литиевая, 2000 mAh' },
        { name: 'Время работы', value: 'до 75 мин' },
        { name: 'Время зарядки', value: '1.5 ч' },
        { name: 'Мощность', value: '4 Вт' },
        { name: 'Нагрев мотора', value: 'Автоотключение при перегреве' },
        { name: 'Уровень шума', value: '≤ 70 дБ' },
        { name: 'Индикатор заряда', value: 'LED-дисплей' },
        { name: 'Водозащита', value: 'IPx6 (мыть под струей воды)' },
        { name: 'Вес', value: '195 г' },
        { name: 'Габариты', value: '165×52×50 мм' },
        { name: 'Гарантия', value: '2 года' },
        { name: 'Страна производства', value: 'Китай' },
      ],
    };
  },
  computed: {
    averageRating() {
      const sum = this.product.reviews.reduce((acc, r) => acc + r.rating, 0);
      return (sum / this.product.reviews.length).toFixed(1);
    },
    recentReviews() {
      return this.product.reviews.slice(0, 3);
    },
  },
  methods: {
    setActiveImage(i) {
      this.activeImageIndex = i;
    },
    toggleFavorite() {
      this.favorite = !this.favorite;
    },
  },
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
