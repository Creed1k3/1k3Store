<template>
  <div class="product-card">
    <div class="image-wrapper">
      <img :src="product.image" alt="Product Image" />
      <button class="favorite-btn" @click="$emit('toggle-favorite', product)">
        <svg viewBox="0 0 24 24" aria-hidden="true">
          <path
            d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
               2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09
               C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5
               c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"
          />
        </svg>
      </button>
    </div>

    <div class="content">
      <div class="dot-list">
        <span
          v-for="(color, i) in product.colors"
          :key="i"
          class="dot"
          :style="{ backgroundColor: color }"
        />
      </div>

      <h2
        @click="toggleExpanded"
        :class="{ expanded: isExpanded }"
        title="Нажмите, чтобы увидеть полностью"
      >
        {{ product.title }}
      </h2>

      <hr class="separator" />

      <div class="actions">
        <div class="price-wrapper">
          <span class="product-price">{{ formattedPrice }}</span>
          <span class="currency">₽</span>
        </div>

        <button
          v-if="cartQuantity === 0"
          class="add-cart-btn"
          @click="addToCart"
        >
          <span class="btn-icon">🛒</span>
          <span class="btn-text">В корзину</span>
        </button>

        <div v-else class="counter-wrapper">
          <button class="counter-btn" @click="decrease">–</button>
          <span class="counter">{{ cartQuantity }}</span>
          <button class="counter-btn" @click="increase">+</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Cookies from 'js-cookie';
import Toastify from 'toastify-js';
import 'toastify-js/src/toastify.css';

export default {
  name: 'ProductCard',
  props: {
    product: { type: Object, required: true }
  },
  data() {
    return {
      isExpanded: false,
      cartQuantity: 0
    };
  },
  computed: {
    formattedPrice() {
      return Number(this.product.price).toLocaleString('ru-RU');
    }
  },
  mounted() {
    this.syncQuantity();
  },
  methods: {
    toggleExpanded() {
      this.isExpanded = !this.isExpanded;
    },

    syncQuantity() {
      let cart = [];
      try {
        cart = JSON.parse(Cookies.get('cart') || '[]');
      } catch {}
      const found = cart.find(i => i.id === this.product.id);
      this.cartQuantity = found ? found.quantity : 0;
    },

    saveCart(cart) {
      Cookies.set('cart', JSON.stringify(cart), { expires: 7 });
      this.syncQuantity();
      window.dispatchEvent(new CustomEvent('cart-updated'));
    },

    showToast(message) {
      Toastify({
        text: message,
        duration: 1000,
        gravity: 'bottom',
        position: 'right',
        style: {
          background: '#21273c',
          color: '#fff'
        }
      }).showToast();
    },

    addToCart() {
      let cart = [];
      try {
        cart = JSON.parse(Cookies.get('cart') || '[]');
      } catch {}
      const idx = cart.findIndex(i => i.id === this.product.id);
      if (idx !== -1) {
        cart[idx].quantity += 1;
      } else {
        cart.push({
          id: this.product.id,
          name: this.product.title,
          image: this.product.image,
          price: this.product.price,
          color: this.product.colors[0] || 'Не указан',
          quantity: 1
        });
      }
      this.saveCart(cart);
      this.showToast('Товар добавлен в корзину');
      this.$emit('added-to-cart', cart);
    },

    increase() {
      let cart = [];
      try {
        cart = JSON.parse(Cookies.get('cart') || '[]');
      } catch {}
      const idx = cart.findIndex(i => i.id === this.product.id);
      if (idx !== -1) {
        cart[idx].quantity += 1;
        this.saveCart(cart);
        this.showToast('Количество увеличено');
      }
    },

    decrease() {
      let cart = [];
      try {
        cart = JSON.parse(Cookies.get('cart') || '[]');
      } catch {}
      const idx = cart.findIndex(i => i.id === this.product.id);
      if (idx !== -1) {
        cart[idx].quantity -= 1;
        if (cart[idx].quantity <= 0) {
          cart.splice(idx, 1);
          this.showToast('Товар удалён из корзины');
        } else {
          this.showToast('Количество уменьшено');
        }
        this.saveCart(cart);
      }
    }
  }
};
</script>

<style scoped>
.product-card {
  width: 260px;
  background: #ffffff;
  border-radius: 16px;
  overflow: hidden;
  font-family: 'Helvetica Neue', Arial, sans-serif;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
  border: 1px solid #e4e8f0;
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
  box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.03);
}

.favorite-btn {
  position: absolute;
  top: 8px;
  right: 8px;
  width: 32px;
  height: 32px;
  border: none;
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
  line-height: 1.4;
  margin: 8px 0;
  height: 3em;
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: normal;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  cursor: pointer;
  transition: all 0.3s ease;
}
h2.expanded {
  -webkit-line-clamp: unset;
  height: unset;
}

.separator {
  border: none;
  height: 1.5px;
  background: rgba(0, 0, 0, 0.12);
  margin: 12px 0;
}

.actions {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top: 12px;
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
  color: #000;
  line-height: 1;
}
.currency {
  font-size: 12px;
  color: #000;
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
  box-shadow: 0 2px 4px rgba(32, 41, 58, 0.3);
  text-transform: none;
}
.add-cart-btn:hover {
  background: #1a2132;
}

.counter-wrapper {
  display: flex;
  align-items: center;
  background: #20293a;
  color: #fff;
  border-radius: 6px;
  overflow: hidden;
}
.counter-btn {
  width: 28px;
  height: 28px;
  border: none;
  background: #1a2132;
  color: #fff;
  font-size: 18px;
  line-height: 1;
  cursor: pointer;
}
.counter-btn:hover {
  background: #161f2a;
}
.counter {
  padding: 0 12px;
  font-size: 14px;
}

.btn-icon {
  font-size: 16px;
}
.btn-text {
  line-height: 1;
}
</style>
