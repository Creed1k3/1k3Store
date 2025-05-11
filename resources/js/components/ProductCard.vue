<template>
  <div class="product-page" v-if="product">
    <!-- Breadcrumbs -->
    <nav class="breadcrumbs">
      <ul>
        <li><a href="/catalog">Каталог</a></li>
        <li v-for="(crumb, i) in categoryTrail" :key="i">
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
        <!-- Path незакрашенного сердечка -->
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 ... Z" fill="none" stroke="#ff756b" stroke-width="2"/>
      </svg>
      <svg v-else xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <!-- Path закрашенного сердечка -->
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 ... Z" fill="#ff756b"/>
      </svg>
    </button>

    <!-- Контент -->
    <div class="content-grid">
      <div class="left">
        <div class="main-image">
          <img :src="activeImage" alt="Product" />
        </div>
        <div class="thumbnails">
          <div
            v-for="(img, idx) in imageUrls"
            :key="img.id"
            class="thumb"
            :class="{ selected: idx === activeImageIndex }"
            @click="activeImageIndex = idx"
          >
            <img :src="img.url" alt="Thumb" />
          </div>
        </div>
      </div>

      <div class="right">
        <p class="desc">{{ product.long_description }}</p>

        <div class="price-block">
          <span class="price">{{ formattedPrice }} ₽</span>
          <span v-if="product.old_price" class="old-price">{{ formattedOldPrice }} ₽</span>
        </div>

        <div class="rating">
          <span v-for="n in 5" :key="n">  
            {{ n <= averageRating ? '★' : '☆' }}
          </span>
          ({{ reviews.length }} отзывов)
        </div>

        <div class="colors">
          <span class="label">Цвета:</span>
          <button
            v-for="c in colorList"
            :key="c.id"
            class="color-btn"
            :style="{ background: c.color }"
            @click="selectColor(c)"
          ></button>
        </div>

        <div class="actions">
          <button class="btn-buy">Купить</button>
          <button class="btn-basket" @click="addToCart">В корзину</button>
        </div>

        <div class="info">
          <p>Отправка: <strong>5–7 недель</strong> <a href="#">Почему?</a></p>
          <p>Доставка на дом — {{ shippingCost }} ₽</p>
        </div>
      </div>
    </div>

    <!-- Характеристики -->
    <section class="section-box">
      <h2 class="section-title">Характеристики</h2>
      <div class="characteristics-grid">
        <div class="char-item" v-for="attr in product.characteristics" :key="attr.id">
          <span class="char-name">{{ attr.name }}</span>
          <span class="char-value">{{ attr.value }}</span>
        </div>
      </div>
    </section>

    <!-- Отзывы -->
    <section class="section-box">
      <h2 class="section-title">Отзывы</h2>
      <p>Средний рейтинг: <strong>{{ averageRating }}/5</strong>. Последние отзывы:</p>
      <ul class="reviews-list">
        <li v-for="rev in recentReviews" :key="rev.id">
          <div class="review-author">{{ rev.author }}</div>
          <div class="review-rating">{{ rev.rating }} ⭐</div>
          <div class="review-text">"{{ rev.text }}"</div>
        </li>
      </ul>
    </section>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'ProductPage',
  data() {
    return {
      product: null,
      activeImageIndex: 0,
      favorite: false,
      shippingCost: 1000,
    }
  },
  computed: {
    imageUrls() {
      return this.product.images || []
    },
    activeImage() {
      return this.imageUrls[this.activeImageIndex]?.url || ''
    },
    formattedPrice() {
      return Number(this.product.price).toLocaleString('ru-RU')
    },
    formattedOldPrice() {
      return Number(this.product.old_price).toLocaleString('ru-RU')
    },
    averageRating() {
      if (!this.product.reviews.length) return 0
      const sum = this.product.reviews.reduce((acc, r) => acc + r.rating, 0)
      return Math.round((sum / this.product.reviews.length) * 10) / 10
    },
    reviews() {
      return this.product.reviews || []
    },
    recentReviews() {
      return this.reviews.slice(-3).reverse()
    },
    colorList() {
      return this.product.colors || []
    },
    categoryTrail() {
      const trail = []
      let cat = this.product.category
      while (cat) {
        trail.unshift({
          name: cat.name,
          url: `/catalog/${cat.slug}`
        })
        cat = cat.parent
      }
      return trail
    }
  },
  methods: {
    toggleFavorite() {
      this.favorite = !this.favorite
    },
    selectColor(c) {
      const idx = this.imageUrls.findIndex(img => img.url === c.image_url)
      if (idx >= 0) this.activeImageIndex = idx
    },
    addToCart() {
      // Пример добавления в корзину через событие
      this.$emit('added-to-cart', {
        id: this.product.id,
        title: this.product.title,
        price: this.product.price,
        image: this.activeImage,
        color: this.colorList[0]?.color || null,
        quantity: 1
      })
    }
  },
async created() {
  if (this.$route && this.$route.params && this.$route.params.slug) {
    try {
      const slug = this.$route.params.slug;
      const resp = await axios.get(`/api/product/${slug}`);
      console.log(resp.data); // Для отладки
      this.product = resp.data.product;
    } catch (error) {
      console.error('Ошибка загрузки товара:', error);
    }
  } else {
    console.error('Slug не найден в маршруте');
  }
}


}
</script>

<style scoped>
.product-card {
  width: 260px;
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  font-family: 'Helvetica Neue', Arial, sans-serif;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  border: 1px solid #e4e8f0;
  position: relative;
}

.card-clickable {
  cursor: pointer;
}

.image-wrapper {
  position: relative;
  display: flex;
  justify-content: center;
  padding: 16px 0 8px;
}
.image-wrapper img {
  width: 200px;
  height: 200px;
  border-radius: 12px;
  object-fit: cover;
}

.favorite-btn {
  position: absolute;
  top: 8px;
  right: 8px;
  width: 32px;
  height: 32px;
  border: 1px solid black;
  background: inherit;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}
.favorite-btn svg {
  width: 18px;
  height: 18px;
  fill: #ff3366;
}

.content {
  padding: 0 16px 16px;
}

.dot-list {
  display: flex;
  justify-content: center;
  gap: 8px;
  margin: 8px 0;
}
.dot {
  width: 10px;
  height: 10px;
  border-radius: 50%;
  border: 1px solid #ccc;
}

h2 {
  font-size: 16px;
  font-weight: 500;
  color: #000;
  margin: 8px 0;
  height: 3em;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}
h2.expanded {
  -webkit-line-clamp: unset;
  height: auto;
}

.separator {
  height: 1.5px;
  background: rgba(0, 0, 0, 0.12);
  margin: 12px 0;
}

.actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.price-wrapper {
  display: inline-flex;
  align-items: baseline;
  background: #f3f6fa;
  padding: 4px 8px;
  border-radius: 6px;
}

.product-price {
  font-size: 20px;
  font-weight: 700;
}
.currency {
  font-size: 12px;
  vertical-align: super;
  margin-left: 2px;
}

.add-cart-btn {
  display: flex;
  align-items: center;
  gap: 4px;
  background: #20293a;
  color: #fff;
  border: none;
  padding: 6px 12px;
  font-size: 12px;
  font-weight: 500;
  border-radius: 6px;
}
.add-cart-btn:hover {
  background: #1a2132;
}

.counter-wrapper {
  display: flex;
  align-items: center;
  border: 1px solid black;
  border-radius: 50px;
  overflow: hidden;
}
.counter-btn {
  width: 28px;
  height: 28px;
  background: none;
  color: #000;
  border: none;
  font-size: 18px;
  cursor: pointer;
}
.counter {
  padding: 0 12px;
  font-size: 14px;
}
</style>
