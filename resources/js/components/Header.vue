<template>
  <div class="headbg" @click="handleOutsideClick">
    <div class="headwrapper">
      <header class="header">
        <div class="logo-catalog" ref="logoCatalog">
          <button class="home-button" @click="backtohome">
            <!-- Simplified 1k3 text logo -->
            <svg class="home-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
              <text
                x="50"
                y="60"
                font-family="Montserrat, sans-serif"
                font-size="48"
                fill="#ffffff"
                text-anchor="middle"
                font-weight="700"
              >
                1k3
              </text>
            </svg>
          </button>
          <button class="catalog-btn" @click="toggleCatalog">
            Каталог
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
import FavoritesIcon from '@/assets/images/headerfavorites.svg';
import CartIcon from '@/assets/images/headercart.svg';
import AvatarIcon from '@/assets/images/defaultavatar.svg';
import LoginModal from './modals/LoginModal.vue';
import Cookies from 'js-cookie';

export default {
  name: 'AppHeader',
  components: {
    FavoritesIcon,
    CartIcon,
    AvatarIcon,
    LoginModal
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
  gap: 12px;
}

.home-button, .catalog-btn {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 56px;
  padding: 0 20px;
  background-color: #20293a;
  color: #ffffff;
  border: none;
  border-radius: 28px;
  cursor: pointer;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s ease, transform 0.3s ease;
}

.home-button {
  width: 56px;
 	padding: 0;
}

.home-button:hover, .catalog-btn:hover {
  background-color: #1b2532;
 	transform: translateY(-2px);
}

.home-icon {
  width: 60%; height: auto;
}

.catalog-btn {
  font-size: 16px;
 	font-weight: 600;
}

.catalog-dropdown {
  position: absolute;
  top: calc(100% + 8px);
  left: 0;
  background-color: #ffffff;
  border-radius: 12px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
  width: 260px;
  padding: 8px 0;
}

.catalog-dropdown ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.catalog-dropdown li {
  padding: 12px 20px;
  cursor: pointer;
  font-weight: 500;
  transition: background-color 0.2s ease;
}

.catalog-dropdown li:hover {
  background-color: #f7f7f7;
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
  /* Размещаем над иконкой, не перекрывая */
  top: -4px;
  right: -4px;
  min-width: 22px;
  height: 22px;
  padding: 0 6px;
  background-color: #21273c;
  /* Числа белые и контрастные */
  color: #ffffff !important;
  font-size: 12px;
  font-weight: 600;
  line-height: 22px;
  text-align: center;
  border-radius: 11px;
  border: 1px solid #ffffff;
  /* лёгкая тень для текста */
  text-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
}
</style>