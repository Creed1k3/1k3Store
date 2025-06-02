<template>
  <div class="headbg" @click="handleOutsideClick">
    <div class="headwrapper">
      <header class="header">
        <div class="logo-catalog" ref="logoCatalog">
          <!-- Кнопка домашней страницы (без анимации) -->
          <button class="home-icon-button" @click="backtohome">
            <div class="home-icon-wrapper">
              <HomeIcon class="home-icon" />
              <div class="home-brand-text">
                <span class="vireon">Vireon</span>
                <span class="market">Market</span>
              </div>
            </div>
          </button>

          <!-- Кнопка каталога с анимацией autoAnimate -->
          <button
            class="catalog-icon-button"
            @click="toggleCatalog"
            ref="catalogIconButton"
          >
            <div class="catalog-icon-wrapper" >
              <div class="catalog-brand-text">
                <span class="catalog-label">Каталог</span>
              </div>
              <div class="catalog-icon-clickable">
                <!-- Здесь иконка меняется с анимацией -->
                <component
                  :is="isCatalogOpen ? 'OpenCatalogIcon' : 'CloseCatalogIcon'"
                  class="catalog-icon"
                  key="catalog-icon"
                />
              </div>
            </div>
          </button>

          <div
            class="catalog-dropdown"
            v-if="isCatalogOpen"
            ref="catalogDropdown"
          >
            <ul>
              <li
                v-for="category in categories"
                :key="category.id"
                @mouseenter="showSubMenu(category.id)"
                @mouseleave="hideSubMenu"
              >
                {{ category.name }}
                <div
                  class="submenu"
                  v-if="activeCategoryId === category.id"
                  @mouseenter="keepSubMenuVisible(category.id)"
                  @mouseleave="hideSubMenu"
                >
                  <ul>
                    <li
                      v-for="subCategory in category.subCategories"
                      :key="subCategory.id"
                      @click="selectSubCategory(subCategory)"
                    >
                      {{ subCategory.name }}
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>

        <div class="search">
          <input
            type="text"
            placeholder="Поиск..."
            v-model="searchQuery"
            @input="handleSearch"
          />
        </div>

        <div class="nav-buttons">
          <div class="nav-button" @click="openfavorites">
            <FavoritesIcon />
            <span>Избранное</span>
          </div>
          <div class="nav-button cart-button" @click="openCart">
            <CartIcon />
            <span>Корзина</span>
            <span v-if="cartCount > 0" class="cart-badge">
              {{ cartCount > 99 ? '99+' : cartCount }}
            </span>
          </div>
          <div class="nav-button" @click="openLoginModal">
            <AvatarIcon />
            <span>Войти</span>
          </div>
        </div>

        <LoginModal
          v-if="isLoginModalOpen"
          @close="closeLoginModal"
        />
      </header>
    </div>
  </div>
</template>

<script>
import autoAnimate from '@formkit/auto-animate';

import FavoritesIcon from '@/assets/images/headerfavorites.svg';
import CartIcon from '@/assets/images/headercart.svg';
import AvatarIcon from '@/assets/images/defaultavatar.svg';
import HomeIcon from '@/assets/images/HomeIcon.svg';
import LoginModal from './modals/LoginModal.vue';
import OpenCatalogIcon from '@/assets/images/OpenCatalogIcon.svg';
import CloseCatalogIcon from '@/assets/images/CloseCatalogIcon.svg';
import Cookies from 'js-cookie';

export default {
  name: 'AppHeader',
  components: {
    FavoritesIcon,
    CartIcon,
    AvatarIcon,
    HomeIcon,
    LoginModal,
    OpenCatalogIcon,
    CloseCatalogIcon
  },
  data() {
    return {
      searchQuery: '',
      isLoginModalOpen: false,
      isCatalogOpen: false,
      activeCategoryId: null,
      cartCount: 0,
      categories: [
        {
          id: 1,
          name: 'Электроника',
          subCategories: [
            { id: 11, name: 'Смартфоны' },
            { id: 12, name: 'Ноутбуки' },
            { id: 13, name: 'Телевизоры' }
          ]
        },
        {
          id: 2,
          name: 'Одежда',
          subCategories: [
            { id: 21, name: 'Мужская одежда' },
            { id: 22, name: 'Женская одежда' },
            { id: 23, name: 'Детская одежда' }
          ]
        },
        {
          id: 3,
          name: 'Дом и сад',
          subCategories: [
            { id: 31, name: 'Мебель' },
            { id: 32, name: 'Текстиль' },
            { id: 33, name: 'Освещение' }
          ]
        }
      ]
    };
  },
  methods: {
    backtohome() {
      window.location.href = '/';
    },
    handleSearch() {
      console.log('Поисковый запрос:', this.searchQuery);
    },
    openCart() {
      window.location.href = '/cart';
    },
    openfavorites() {
      window.location.href = '/favorites';
    },
    openLoginModal() {
      this.isLoginModalOpen = true;
    },
    closeLoginModal() {
      this.isLoginModalOpen = false;
    },
    toggleCatalog() {
      this.isCatalogOpen = !this.isCatalogOpen;
    },
    showSubMenu(categoryId) {
      this.activeCategoryId = categoryId;
    },
    hideSubMenu() {
      this.activeCategoryId = null;
    },
    keepSubMenuVisible(categoryId) {
      this.activeCategoryId = categoryId;
    },
    selectSubCategory(subCategory) {
      console.log('Выбрана подкатегория:', subCategory.name);
      this.isCatalogOpen = false;
    },
    handleOutsideClick(event) {
      const catalogDropdown = this.$refs.catalogDropdown;
      const catalogBtn = this.$refs.logoCatalog;
      if (
        catalogDropdown &&
        catalogBtn &&
        !catalogBtn.contains(event.target) &&
        !catalogDropdown.contains(event.target)
      ) {
        this.isCatalogOpen = false;
      }
    },
    updateCartCount() {
      let cart = [];
      try {
        cart = JSON.parse(Cookies.get('cart') || '[]');
      } catch {}
      this.cartCount = cart.reduce((sum, i) => sum + (i.quantity || 0), 0);
    }
  },
  mounted() {
    // Подключаем autoAnimate к элементу кнопки каталога
    if (this.$refs.catalogIconButton) {
      autoAnimate(this.$refs.catalogIconButton, { duration: 300, easing: 'ease-in-out' });
    }

    document.addEventListener('click', this.handleOutsideClick);
    this.updateCartCount();
    window.addEventListener('cart-updated', this.updateCartCount);
  },
  beforeDestroy() {
    document.removeEventListener('click', this.handleOutsideClick);
    window.removeEventListener('cart-updated', this.updateCartCount);
  }
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&display=swap');

.headbg {
  background-color: #f7f7f7;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  display: flex;
  justify-content: center;
  padding: 10px 0;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
}

.home-icon-wrapper {
  display: flex;
  align-items: center;
  gap: 6px;
}

.home-brand-text .market {
  font-size: 14px;
  font-weight: 500;
  color: #4a4a4a;
}

.home-icon-button:hover .home-brand-text .vireon,
.home-icon-button:hover .home-brand-text .market {
  color: #1a1a2e;
}

.home-brand-text {
  display: flex;
  flex-direction: column;
  font-family: 'Poppins', sans-serif;
  line-height: 1;
  text-align: left;
  transform: translateY(-1px); /* Чуть выше для баланса */

}
.catalog-icon-clickable {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 56px;
  height: 56px;
}
.catalog-icon {
  pointer-events: none; /* чтобы клик не "застревал" на иконке */
}
.home-brand-text .vireon {
  font-size: 18px;
  font-weight: 600;
  color: #20293a;
}

.headwrapper {
  max-width: 1380px;
  width: 100%;
}

.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 20px;
  height: 80px;
  padding: 0 40px;
  background-color: #ffffff;
  border-radius: 16px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  transition: box-shadow 0.3s ease;
}

.header:hover {
  box-shadow: 0 6px 24px rgba(0, 0, 0, 0.12);
}

.logo-catalog {
  display: flex;
  align-items: center;
  position: relative;
  gap: 16px;
}

.home-icon-button {
  display: flex;
  align-items: center;
  justify-content: center;
  background: transparent;
  border: none;
  padding: 8px;
  cursor: pointer;
  transition: transform 0.3s ease, background-color 0.3s ease;
}

.home-icon-button:hover {
  background-color: #f2f3f5;
  border-radius: 12px;
  transform: translateY(-1px);
}
.home-link {
  display: flex;
  align-items: center;
  gap: 10px;
  background: transparent;
  color: #20293a;
  border: none;
  font-size: 17px;
  font-weight: 600;
  cursor: pointer;
  padding: 12px 16px;
  border-radius: 12px;
  transition: all 0.25s ease;
}

.home-link:hover {
  background-color: #f0f2f5;
  transform: translateY(-1px);
}

.home-link span {
  transition: color 0.3s ease;
}

.home-link:hover span {
  color: #1e1e2f;
}


.home-icon {
  width: 56px;
  height: 56x;
}

.catalog-icon-button {
  display: flex;
  align-items: center;
  justify-content: center;
  background: transparent;
  border: none;
  padding: 8px;
  cursor: pointer;
  transition: transform 0.3s ease, background-color 0.3s ease;
  border-radius: 12px;
  height: 56px; /* Добавлено */
}

.catalog-icon-button:hover {
  background-color: #f2f3f5;
  transform: translateY(-1px);
}

.catalog-icon-wrapper {
  display: flex;
  align-items: center;
  gap: 6px;
}

.catalog-brand-text {
  display: flex;
  flex-direction: column;
  font-family: 'Poppins', sans-serif;
  line-height: 1;
  text-align: left;
  transform: translateY(-1px);
}

.catalog-label {
  font-size: 18px; /* Было 16px */
  font-weight: 600;
  color: #20293a;
}

.catalog-icon {
  width: 56px;
  height: 56px;
}

.submenu {
  position: absolute;
  top: 0;
  left: 100%;
  background-color: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  width: 240px;
  padding: 8px 0;
}

.submenu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.submenu li {
  padding: 10px 16px;
  cursor: pointer;
  font-weight: 400;
  transition: background-color 0.2s ease;
}

.submenu li:hover {
  background-color: #f7f9fc;
}

.search {
  flex: 1;
}

.search input {
  width: 100%;
  padding: 12px 16px;
  border: 1px solid #ddd;
  border-radius: 20px;
  font-size: 14px;
  outline: none;
  transition: border-color 0.3s ease;
}

.search input:focus {
  border-color: #20293a;
}

.nav-buttons {
  display: flex;
  gap: 16px;
}

.nav-button {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 56px;
  height: 56px;
  background-color: transparent;
  border: none;
  cursor: pointer;
  border-radius: 8px;
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.nav-button:hover {
  background-color: #f7f7f7;
  transform: translateY(-2px);
}

.nav-button svg {
  width: 24px;
  height: 24px;
  margin-bottom: 4px;
}

.nav-button span {
  font-size: 12px;
  color: #20293a;
}

.cart-button {
  position: relative;
}

.cart-badge {
  position: absolute;
  top: -4px;
  right: -4px;
  min-width: 22px;
  height: 22px;
  padding: 0 6px;
  background-color: #21273c;
  color: #ffffff !important;
  font-size: 12px;
  font-weight: 600;
  line-height: 22px;
  text-align: center;
  border-radius: 11px;
  border: 1px solid #ffffff;
  text-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
}
</style>
