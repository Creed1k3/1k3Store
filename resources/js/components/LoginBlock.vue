<template>
    <div class="login-block">
      <h1 class="login-block__title">Личный кабинет</h1>
      <p class="login-block__description">
        Получайте бонусы, отслеживайте заказы и делитесь мнением
      </p>
      <div class="login-block__buttons">
        <button class="login-block__button">Войти</button>
        <button class="login-block__button">Личный Кабинет</button>
    </div>
</div>
  </template>
  
  <script>
  export default {
    name: 'LoginBlock',
  };
  </script>
  
  <style scoped>
.login-block {
  display: flex;
  flex-direction: column;
  height: 100%;
  text-align: left;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 12px;
  background-color: #f9f9f9;
  position: relative; /* Для позиционирования псевдоэлемента */
  overflow: hidden; /* Чтобы размытие не выходило за границы */
}

.login-block::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-image: url(/images/login-block.png); /* Фоновая картинка */
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  filter: blur(2px); /* Размытие фона */
  z-index: 1; /* Псевдоэлемент находится под контентом */
}

.login-block__title,
.login-block__description,
.login-block__buttons {
  position: relative; /* Поднимаем контент над размытым фоном */
  z-index: 2; /* Контент поверх псевдоэлемента */
}

.login-block__title {
  font-size: 28px;
  text-align: left;
  margin-bottom: 10px;
  color: #fff;
  font-weight: 500;
}

.login-block__description {
  font-size: 16px;
  color: #fff;
  font-weight: 400;
}

.login-block__buttons {
  display: flex;
  flex-direction: column;
  gap: 10px;
  margin-top: auto;
}

.login-block__button {
  padding: 10px;
  font-size: 16px;
  color: #fff;
  background-color: #24A7DC;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.login-block__button:hover {
  background-color: #0056b3;
}
  </style>