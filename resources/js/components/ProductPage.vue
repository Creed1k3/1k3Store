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
          <img
            :src="product.images[activeImageIndex]?.url || 'default_image.jpg'"
            alt="Product"
            key="main-image"
          />
        </div>

        <div class="thumbnails" ref="thumbsContainer">
          <div
            v-for="(img, idx) in product.images"
            :key="idx"
            class="thumb"
            :class="{ selected: idx === activeImageIndex }"
            @click="setActiveImage(idx)"
          >
            <img :src="img?.url" alt="Thumb" />
          </div>
        </div>
      </div>

      <div class="right">
        <p class="desc">{{ product.longDescription }}</p>

        <div class="price-block">
          <span class="price">{{ formatPrice(product.price) }} ₽</span>
          <span v-if="product.oldPrice" class="old-price">{{ formatPrice(product.oldPrice) }}</span>
        </div>

        <!-- Вкладки -->
         

        <!-- Блок кнопок / счётчик -->
<!-- В шаблоне -->
<div class="actions">
  <!-- Левая часть: «Купить сейчас» или счётчик -->
  <div class="purchase-control">
    <!-- если ещё нет в корзине -->
    <template v-if="cartQuantity === 0">
      <button class="btn-buy-now" @click="buyNow">Купить сейчас</button>
    </template>
    <!-- если уже добавили -->
    <div v-else class="counter-wrapper">
      <button class="counter-btn" @click="decrease">–</button>
      <span class="counter">{{ cartQuantity }}</span>
      <button class="counter-btn" @click="increase">+</button>
    </div>
  </div>

  <!-- Правая часть: «В корзину» или «→ В корзину» -->
  <div class="cart-control">
    <!-- кнопка добавления -->
    <button
      v-if="cartQuantity === 0"
      class="btn-add-cart"
      @click="addToCart"
    >
      В корзину
    </button>
    <!-- ссылка, когда товар уже в корзине -->
    <!-- Правая часть: вместо текста со стрелкой -->
<a
  v-else
  href="/cart"
  class="btn-go-cart"
>
  <i class="fas fa-arrow-right" aria-hidden="true"></i>
  <span class="btn-go-cart__text">В корзину</span>
</a>
  </div>
  
</div>
            <!-- Цвета -->
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
        <!-- Блок рейтинга -->
        <div class="rating" style="display: flex; align-items: center; gap: 0.5rem;">
          <span v-for="n in 5" :key="n">
            <i
              v-if="n <= Math.floor(product.averageRating)"
              class="fas fa-star filled"
              style="color: #e76f51;"
            ></i>
            <i
              v-else-if="n === Math.floor(product.averageRating) + 1 && product.averageRating % 1 >= 0.5"
              class="fas fa-star-half-alt filled"
              style="color: #e76f51;"
            ></i>
            <i
              v-else
              class="far fa-star"
              style="color: #e76f51;"
            ></i>
          </span>
          <span style="font-weight: 600; color: #264653;">
            {{ product.averageRating.toFixed(1) }}
          </span>
          <span>
            ({{ product.reviews.length }} отзыв{{ product.reviews.length === 1 ? '' : 'ов' }})
          </span>
        </div>
  <div class="tabs">
          <button
            v-for="tab in tabs"
            :key="tab.key"
            :class="{ active: activeTab === tab.key }"
            @click="setTab(tab.key)"
          >
            {{ tab.label }}
          </button>
        </div>

        <!-- Контент вкладки -->
        <div class="tab-content" ref="tabContent">
          <div v-if="activeTab === 'description'">
            <p class="desc">{{ product.description }}</p>
          </div>

          <div v-if="activeTab === 'characteristics'" class="characteristics-grid">
            <div
              class="char-item"
              v-for="(char, i) in product.characteristics"
              :key="i"
            >
              <span class="char-name">{{ char.name }}</span>
              <span class="char-value">{{ char.value }}</span>
            </div>
          </div>

          <div v-if="activeTab === 'reviews'" class="reviews-list">
            <div class="review-filter">
              <label>Фильтровать по оценке:</label>
              <select v-model="selectedRating">
                <option :value="null">Все</option>
                <option v-for="n in 5" :key="n" :value="n">{{ n }} ⭐</option>
              </select>
            </div>

            <ul ref="reviewsList">
              <li
                v-for="(rev, i) in filteredReviews"
                :key="i"
                class="review-item"
              >
                <div class="review-author">{{ rev.author || 'Аноним' }}</div>
                <div class="review-rating">
                  <span v-for="star in 5" :key="star">
                    <i :class="star <= rev.rating ? 'fas fa-star filled' : 'far fa-star'"></i>
                  </span>
                </div>
                <div class="review-text">{{ rev.text }}</div>
              </li>
            </ul>
          </div>
        </div>

<div class="product-extras">
  <div class="extra-item">
    <i class="fas fa-shipping-fast"></i>
    <span>Доставка от 1 дня</span>
  </div>
  <div class="extra-item">
    <i class="fas fa-truck"></i>
    <span>Бесплатный самовывоз</span>
  </div>
  <div class="extra-item">
    <i class="fas fa-shield-alt"></i>
    <span>Гарантия 1 год</span>
  </div>
  <div class="extra-item">
    <i class="fas fa-undo"></i>
    <span>Возврат 14 дней</span>
  </div>
  <!-- Добавляем новые пункты -->
  <div class="extra-item">
    <i class="fas fa-credit-card"></i>
    <span>Оплата картой онлайн и при получении</span>
  </div>
  <div class="extra-item">
    <i class="fas fa-lock"></i>
    <span>Безопасная оплата</span>
  </div>
  <div class="extra-item">
    <i class="fas fa-certificate"></i>
    <span>Сертифицированный товар</span>
  </div>
</div>

</div>

</div>

</div>

</template>

<script>
import { nextTick } from 'vue'
import autoAnimate from '@formkit/auto-animate'
import Cookies from 'js-cookie'
import Toastify from 'toastify-js'
import 'toastify-js/src/toastify.css'

export default {
  name: 'ProductPage',
  props: {
    product: { type: Object, required: true }
  },
  data() {
    return {
      activeImageIndex: 0,
      favorite: false,
      activeTab: 'description',
      selectedRating: null,
      tabs: [
        { key: 'description', label: 'Описание' },
        { key: 'characteristics', label: 'Характеристики' },
        { key: 'reviews', label: 'Отзывы' }
      ],
      cartQuantity: 0,
      heartOutline:
        'M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z',
      heartFilled:
        'M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z'
    }
  },
  computed: {
    filteredReviews() {
      if (!this.selectedRating) return this.product.reviews
      return this.product.reviews.filter(r => r.rating === this.selectedRating)
    }
  },
  methods: {
    // === Логика корзины ===
    syncQuantity() {
      let cart = []
      try {
        cart = JSON.parse(Cookies.get('cart') || '[]')
      } catch {}
      const found = cart.find(i => i.id === this.product.id)
      this.cartQuantity = found ? found.quantity : 0
    },
    saveCart(cart) {
      Cookies.set('cart', JSON.stringify(cart), { expires: 7 })
      this.syncQuantity()
      window.dispatchEvent(new CustomEvent('cart-updated'))
    },
    showToast(message) {
      Toastify({
        text: message,
        duration: 1000,
        gravity: 'bottom',
        position: 'right',
        style: { background: '#21273c', color: '#fff' }
      }).showToast()
    },
    addToCart() {
      let cart = []
      try { cart = JSON.parse(Cookies.get('cart') || '[]') } catch {}
      const idx = cart.findIndex(i => i.id === this.product.id)
      const color = this.product.colors?.[0]?.color || 'Не указан'
      const image = this.product.colors?.[0]?.image_url || this.product.images[0]?.url
      if (idx !== -1) {
        cart[idx].quantity += 1
      } else {
        cart.push({
          id: this.product.id,
          name: this.product.title,
          price: this.product.price,
          color,
          image,
          quantity: 1
        })
      }
      this.saveCart(cart)
      this.showToast('Товар добавлен в корзину')
    },
    increase() {
      let cart = []
      try { cart = JSON.parse(Cookies.get('cart') || '[]') } catch {}
      const idx = cart.findIndex(i => i.id === this.product.id)
      if (idx !== -1) {
        cart[idx].quantity += 1
        this.saveCart(cart)
        this.showToast('Количество увеличено')
      }
    },
    decrease() {
      let cart = []
      try { cart = JSON.parse(Cookies.get('cart') || '[]') } catch {}
      const idx = cart.findIndex(i => i.id === this.product.id)
      if (idx !== -1) {
        cart[idx].quantity -= 1
        if (cart[idx].quantity <= 0) {
          cart.splice(idx, 1)
          this.showToast('Товар удалён из корзины')
        } else {
          this.showToast('Количество уменьшено')
        }
        this.saveCart(cart)
      }
    },
    // === Прочие методы ===
    setActiveImage(i) { this.activeImageIndex = i },
    setColorImage(url) {
      const idx = this.product.images.findIndex(img => img.url === url)
      if (idx !== -1) this.activeImageIndex = idx
    },
    toggleFavorite() { this.favorite = !this.favorite },
    formatPrice(val) { return Number(val).toLocaleString('ru-RU') },
    setTab(key) { this.activeTab = key },
    initAutoAnimate() {
      nextTick(() => {
        [this.$refs.tabContent, this.$refs.reviewsList, this.$refs.thumbsContainer]
          .forEach(el => el && autoAnimate(el))
      })
    }
  },
  mounted() {
    this.syncQuantity()
    this.initAutoAnimate()
  },
  watch: {
    activeTab() { this.initAutoAnimate() }
  }
}
</script>

<style scoped>
.product-extras {
  display: flex;
  flex-wrap: wrap;
  gap: 1.5rem;
  margin-top: 2rem;
  padding-top: 1rem;
  border-top: 1px solid #e0e0e0;
}
.extra-item {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.9rem;
  color: #444;
}
.extra-item i {
  color: #e76f51;
  font-size: 1.2rem;
}

.review-filter {
  margin-bottom: 10px;
}

.review-filter select {
  padding: 4px 8px;
  border-radius: 6px;
}

.product-page {
  width: 100%;
  position: relative;
  padding: 1.5rem;
  background: #fff;
  border-radius: 0.8rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
}

/* breadcrumbs */
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

/* title */
.page-path-title {
  font-size: 1.5rem;
  font-weight: 600;
  margin-bottom: 1.5rem;
  color: #333;
}

/* favorite button */
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

/* layout grid */
.content-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 2rem;
}

/* main image */
.left .main-image {
  width: 100%;
  max-width: 608px;
  height: 500px;
  border-radius: 0.8rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  overflow: hidden;
}
.left .main-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  border-radius: 0.8rem;
}

/* thumbnails */
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

/* descriptions */
.right .desc {
  font-size: 1.1rem;
  color: rgba(34,34,34,0.9);
  line-height: 1.6;
  margin-bottom: 1.5rem;
}

/* price block */
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

/* tabs */
.tabs {
  display: flex;
  gap: 1rem;
  margin-bottom: 1.5rem;
}
.tabs button {
  padding: 0.6rem 1.2rem;
  border: 1px solid #ccc;
  background: #f9f9f9;
  border-radius: 2rem;
  cursor: pointer;
  font-weight: 500;
  transition: background 0.2s;
}
.tabs button.active {
  background: #264653;
  color: #fff;
  border-color: #264653;
}
.tabs button:hover {
  background: #eee;
}

/* tab content */
.tab-content .characteristics-grid {
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

/* reviews */
.review-filter {
  margin-bottom: 10px;
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

/* rating summary */
.rating {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  font-size: 1rem;
  color: #444;
  margin-bottom: 1.5rem;
}

/* colors */
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
.color-btn[style*="background: white"] {
  background: #ddd !important;
}

/* actions block */
.actions {
  display: flex;
  gap: 1rem;
  margin-bottom: 1.5rem;
  align-items: center;
}
.purchase-control,
.cart-control {
  flex: 1;
  min-width: 0;
}

/* "Купить сейчас" button */
.btn-buy-now {
  width: 100%;
  height: 3.2rem;
  background: #e76f51;
  color: #fff;
  border: none;
  border-radius: 2rem;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s;
}
.btn-buy-now:hover {
  background: #d65a3f;
}

/* "В корзину" add-to-cart button */
.btn-add-cart {
  width: 100%;
  height: 3.2rem;
  background: transparent;
  color: #264653;
  border: 2px solid #264653;
  border-radius: 2rem;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s, color 0.3s;
}
.btn-add-cart:hover {
  background: #264653;
  color: #fff;
}

/* counter instead of "Купить сейчас" */
.counter-wrapper {
  width: 100%;
  height: 3.2rem;
  background: #20293a;
  color: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 2rem;
  padding: 0 0.5rem;
}
.counter-btn {
  width: 2.4rem;
  height: 2.4rem;
  background: transparent;
  border: none;
  font-size: 1.4rem;
  color: #fff;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}
.counter {
  flex: 1;
  text-align: center;
  font-size: 1.2rem;
}

/* link to cart after adding */
.btn-go-cart {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 3.2rem;
  text-decoration: none;
  color: #264653;
  border: 2px solid #264653;
  border-radius: 2rem;
  font-size: 1rem;
  transition: background 0.3s, color 0.3s;
  gap: 0.5rem; /* пространство между иконкой и текстом */
}

.btn-go-cart:hover {
  background: #264653;
  color: #fff;
}

/* info links */
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

/* full width section box */
.section-box {
  width: 100%;
  padding: 2rem;
  background: #fff;
  border-radius: 1rem;
  box-shadow: 0 8px 20px rgba(0,0,0,0.05);
  margin: 2rem 0;
}
</style>
