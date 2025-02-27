<template>
  <header class="header">
    <div class="logo-catalog">
      <button class="home-button" @click="backtohome"></button>
      <button class="catalog-btn" @click="openCatalogModal">Каталог</button>
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
    <LoginModal v-if="isLoginModalOpen" @close="isLoginModalOpen = false" />
    <CatalogModal :isOpen="isCatalogModalOpen" @close="isCatalogModalOpen = false" />

  </header>
</template>

<script>
import FavoritesIcon from '@/assets/images/headerfavorites.svg';
import CartIcon from '@/assets/images/headercart.svg';
import AvatarIcon from '@/assets/images/defaultavatar.svg';
import LoginModal from './modals/LoginModal.vue'; // Adjust the path as needed
import CatalogModal from './modals/CatalogModal.vue';

export default {
  name: 'AppHeader',
  components: {
    FavoritesIcon,
    CartIcon,
    AvatarIcon,
    LoginModal,
    CatalogModal
  },
  data() {
    return {
      searchQuery: '',
      isLoginModalOpen: false,
      isCatalogModalOpen: false,
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
    openCatalogModal(){
      this.isCatalogModalOpen = true;
    }
  },
};
</script>

<style scoped>
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
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* 0.125rem = 2px, 0.25rem = 4px */
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
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* 0.125rem = 2px, 0.25rem = 4px */
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