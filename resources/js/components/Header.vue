<template>
  <div class="headbg">
    <div class="headwrapper">
      <header class="header">
        <div class="logo-catalog" ref="logoCatalog">
          <button class="home-button" @click="backtohome"></button>
          <button class="catalog-btn" @click="toggleCatalog">Каталог</button>
          <div class="catalog-dropdown" v-if="isCatalogOpen">
            <ul>
              <li
                v-for="category in categories"
                :key="category.id"
                @mouseenter="showSubMenu(category.id)"
                @mouseleave="hideSubMenu(category.id)"
              >
                {{ category.name }}
                <div
                  class="submenu"
                  v-if="activeCategoryId === category.id"
                  @mouseenter="keepSubMenuVisible(category.id)"
                  @mouseleave="hideSubMenu(category.id)"
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
          <input type="text" placeholder="Поиск..." v-model="searchQuery" @input="handleSearch">
        </div>
        <div class="nav-buttons">
          <div class="nav-button" @click="openfavorites">
            <FavoritesIcon />
            <span>Избранное</span>
          </div>
          <div class="nav-button" @click="openCart">
            <CartIcon />
            <span>Корзина</span>
          </div>
          <div class="nav-button" @click="openLoginModal">
            <AvatarIcon />
            <span>Войти</span>
          </div>
        </div>
        <LoginModal v-if="isLoginModalOpen" @close="closeLoginModal" />
      </header>
    </div>
  </div>
</template>

<script>
import FavoritesIcon from '@/assets/images/headerfavorites.svg';
import CartIcon from '@/assets/images/headercart.svg';
import AvatarIcon from '@/assets/images/defaultavatar.svg';
import LoginModal from './modals/LoginModal.vue';

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
      categories: [
        {
          id: 1,
          name: 'Электроника',
          subCategories: [
            { id: 11, name: 'Смартфоны' },
            { id: 12, name: 'Ноутбуки' },
            { id: 13, name: 'Телевизоры' },
          ],
        },
        {
          id: 2,
          name: 'Одежда',
          subCategories: [
            { id: 21, name: 'Мужская одежда' },
            { id: 22, name: 'Женская одежда' },
            { id: 23, name: 'Детская одежда' },
          ],
        },
        {
          id: 3,
          name: 'Дом и сад',
          subCategories: [
            { id: 31, name: 'Мебель' },
            { id: 32, name: 'Текстиль' },
            { id: 33, name: 'Освещение' },
          ],
        },
      ],
    };
  },
  methods: {
    backtohome() {
      window.location.replace('/');
    },
    handleSearch() {
      console.log('Поисковый запрос:', this.searchQuery);
    },
    openCart() {
      window.location.replace('/cart');
    },
    openfavorites() {
      window.location.replace('/favorites');
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
      // Здесь можно добавить логику для перехода на страницу подкатегории
      this.isCatalogOpen = false; // Закрываем выпадающий список после выбора
    },
  },
};
</script>

<style scoped>
.headbg {
  background-color: #f6f6f6;
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  display: flex;
  justify-content: center;
}

.headwrapper {
  max-width: 1380px;
  width: 100%;
}

.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  color: var(--neutral-white);
  height: 96px;
}

.logo-catalog {
  height: 64px;
  border-radius: 16px;
  display: flex;
  background-color: #24A7DC;
  flex: 1;
  position: relative;
}

.home-button {
  flex: 1;
  background-image: url(/images/logo.png);
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  border-radius: inherit; 
  border-top-right-radius: 0;
  border-bottom-right-radius: 0;
}

.home-button:hover {
  background-color: #1d779b;
}

.catalog-btn {
  flex: 1;
  cursor: pointer;
  color: #FFFFFF;
  font-size: 16px;
  border-radius: inherit;
  position: relative;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;
}

.catalog-btn:hover {
  background-color: #1d779b;
}

.catalog-dropdown {
  position: absolute;
  top: 100%;
  left: 0;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  width: 250px;
}

.catalog-dropdown ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.catalog-dropdown li {
  padding: 10px;
  cursor: pointer;
  position: relative;
}

.catalog-dropdown li:hover {
  background-color: #f0f0f0;
}

.submenu {
  position: absolute;
  top: 0;
  left: 100%;
  background-color: white;
  border: 1px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  width: 250px;
  margin-left: 0; /* Убираем отступ между уровнями */
}

.submenu ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.submenu li {
  padding: 10px;
  cursor: pointer;
}

.submenu li:hover {
  background-color: #f0f0f0;
}

.search {
  flex: 3;
  display: flex;
  align-items: center;
  height: 64px;
}

.search input {
  width: 100%;
  padding: 12px; 
  border-radius: 12px;
  height: 100%;
  background-color: #e0e0e0;
}

.search input:hover {
  background-color: var(--neutral-gray);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
  border-color: var(--neutral-dark-gray);
}

.nav-buttons {
  flex: 1;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.nav-button {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  width: 64px;
  height: 48px;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.nav-button:hover {
  background-color: var(--neutral-gray);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); 
}

.nav-button svg {
  width: 24px; 
  height: 24px; 
  margin-bottom: 5px;
}

.nav-button span {
  font-size: 12px;
  color: var(--neutral-dark-gray);
}
</style>