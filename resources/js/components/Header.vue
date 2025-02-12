<template>
  <header class="header">
    <div class="logo-catalog">
      <a class="logo-container" href="/" data-cy="test-header-logo">
        <div class="logo">
          <img :src='"/images/logo.png"' alt="Логотип" width="50" height="50">
        </div>
        <div class="tooltip" data-cy="test-header-tooltip">Вернуться на главную</div>
      </a>
      <button class="catalog-btn" @click="openCatalog">Каталог</button>
    </div>
    <div class="search">
      <input type="text" placeholder="Поиск..." v-model="searchQuery" @input="handleSearch">
    </div>
    <div class="nav-buttons">
      <div class="nav-button" @click="navigateTo('/favorites')">
        <FavoritesIcon />
        <span>Избранное</span>
      </div>
      <div class="nav-button" @click="navigateTo('/cart')">
        <CartIcon />
        <span>Корзина</span>
      </div>
      <div class="nav-button" @click="openLoginModal">
        <AvatarIcon />
        <span>Войти</span>
      </div>
    </div>
  </header>
</template>

<script>
import FavoritesIcon from '@/assets/images/headerfavorites.svg';
import CartIcon from '@/assets/images/headercart.svg';
import AvatarIcon from '@/assets/images/defaultavatar.svg';

export default {
  name: 'AppHeader',
  components: {
    FavoritesIcon,
    CartIcon,
    AvatarIcon,
  },
  data() {
    return {
      searchQuery: '',
    };
  },
  methods: {
    openCatalog() {
      console.log('Каталог открыт');
    },
    handleSearch() {
      console.log('Поисковый запрос:', this.searchQuery);
    },
    navigateTo(route) {
      this.$router.push(route);
    },
    openLoginModal() {
      console.log('Открыть модальное окно входа');
    },
  },
};
</script>

<style scoped>
:root {
  --primary-color: #219ccc;
  --primary-dark: rgb(30, 139, 182);
  --primary-darker: rgb(25, 116, 152);
  --primary-light: rgb(150, 210, 235);
  --primary-lighter: rgb(200, 230, 245);
  --accent-color: #F25A07;
  --accent-color-2: rgb(220, 36, 167);
  --accent-color-3: rgb(167, 220, 36);
  --neutral-white: rgb(255, 255, 255);
  --neutral-light-gray: #FFFFFF;
  --neutral-gray: #F7F7F7;
  --neutral-dark-gray: rgb(100, 100, 100);
  --neutral-black: #2E2E2E;
  --mishanka: #f2f2f2;
}

/* Reset and Box Sizing */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Body Styling */
body {
  background-color: var(--neutral-light-gray);
  color: var(--neutral-dark-gray);
  font-family: Arial, sans-serif;
}

/* Header Styling */
.header {
  display: flex;
  align-items: center;
  width: 100%;
  justify-content: space-between;
  gap: 20px; /* Отступ между элементами */
  background-color: var(--neutral-light-gray);
  color: var(--neutral-white);
  height: 76px; /* 4.75rem = 76px */

}

/* Logo and Catalog Styling */
.logo-catalog {
  width: 304px; /* Фиксированная ширина */
  display: flex;
  align-items: center;
  height: 60px; /* 3.75rem = 60px */
  background-color: var(--primary-color);
  border-radius: 16px; /* 1rem = 16px */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* 0.25rem = 4px, 0.5rem = 8px */
}

.logo-container {
  display: flex;
  align-items: center;
  justify-content: center;
  max-height: 60px; /* 3.75rem = 60px */
  width: 100%;
  text-decoration: none;
  overflow: hidden;
  background-color: var(--primary-color); 
  border-radius: 12px; /* 0.75rem = 12px */
}

.logo-container:hover {
  background-color: var(--primary-dark);
}

.logo-container img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  border-radius: 5px; /* 0.3125rem = 5px */
}

/* Catalog Button Styling */
.catalog-btn {
  flex: 0 0 45%;
  padding: 5px 10px; /* 0.3125rem = 5px, 0.625rem = 10px */
  border: none;
  background-color: var(--primary-color);
  color: var(--neutral-white);
  cursor: pointer;
  height: 100%;
  align-self: center;
  text-align: center;
  border-radius: 12px; /* 0.75rem = 12px */
  margin-left: 5%;
  position: relative;
}

.catalog-btn::after {
  content: '▼';
  font-size: 16px; /* 1rem = 16px */
  color: var(--neutral-white);
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
}

.catalog-btn:hover {
  background-color: var(--primary-darker);
  margin-top: 0;
  margin-bottom: 0;
}

/* Tooltip Styling */
.tooltip {
  display: none;
}

.logo-container:hover .tooltip {
  display: block;
  position: absolute;
  top: 70px; /* 4.375rem = 70px */
  left: 0;
  background: #333;
  color: var(--neutral-white);
  padding: 5px 10px; /* 0.3125rem = 5px, 0.625rem = 10px */
  border-radius: 4px; /* 0.25rem = 4px */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* 0.125rem = 2px, 0.25rem = 4px */
}

/* Search Bar Styling */
.search {
  width: 600px; /* Фиксированная ширина */
  display: flex;
  align-items: center;
  height: 56px; /* 3.5rem = 56px */
}

.search input {
  width: 100%;
  padding: 5px; /* 0.3125rem = 5px */
  border: 1px solid var(--neutral-gray);
  background-color: var(--neutral-gray);
  height: 100%;
}

.search input:hover {
  background-color: var(--neutral-gray);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* 0.125rem = 2px, 0.25rem = 4px */
  border-color: var(--neutral-dark-gray);
}

/* Navigation Buttons Styling */
.nav-buttons {
  width: 200px; /* Фиксированная ширина */
  display: flex;
  align-items: center;
  justify-content: flex-end;
  gap: 24px; /* 1.5rem = 24px */
}

.nav-button {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  width: 64px; /* 4rem = 64px */
  height: 48px; /* 3rem = 48px */
  cursor: pointer;
  background-color: var(--neutral-light-gray);
  border-radius: 5px; /* 0.3125rem = 5px */
  text-align: center;
}

.nav-button:hover {
  background-color: var(--neutral-gray);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* 0.125rem = 2px, 0.25rem = 4px */
}

.nav-button svg {
  width: 24px; /* 1.5rem = 24px */
  height: 24px; /* 1.5rem = 24px */
  margin-bottom: 5px; /* 0.3125rem = 5px */
}

.nav-button span {
  font-size: 12px; /* 0.75rem = 12px */
  color: var(--neutral-dark-gray);
}
</style>