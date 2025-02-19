<template>
    <div class="modal-overlay" @click="closeModal">
      <div class="modal-content" @click.stop>
        <button class="close-button" @click="closeModal">X</button>
        <div class="toggle-buttons">
          <button :class="{ active: isLoginMode }" @click="isLoginMode = true">Войти</button>
          <button :class="{ active: !isLoginMode }" @click="isLoginMode = false">Зарегистрироваться</button>
        </div>
        <h2>{{ isLoginMode ? 'Войти' : 'Зарегистрироваться' }}</h2>
        <form @submit.prevent="handleSubmit">
          <label for="username">{{ isLoginMode ? 'Имя пользователя' : 'Имя пользователя (регистрация)' }}</label>
          <input type="text" id="username" v-model="username" required />
  
          <label for="password">{{ isLoginMode ? 'Пароль' : 'Пароль (регистрация)' }}</label>
          <input type="password" id="password" v-model="password" required />
  
          <button type="submit">{{ isLoginMode ? 'Войти' : 'Зарегистрироваться' }}</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'LoginModal',
    data() {
      return {
        username: '',
        password: '',
        isLoginMode: true,
      };
    },
    methods: {
      closeModal() {
        this.$emit('close');
      },
      handleSubmit() {
        if (this.isLoginMode) {
          console.log('Вход:', this.username, this.password);
        } else {
          console.log('Регистрация:', this.username, this.password);
        }
        this.closeModal();
      },
    },
  };
  </script>
  
  <style scoped>
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7); /* Darkened background */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  
  .modal-content {
    background: white;
    padding: 20px;
    border-radius: 8px;
    position: relative;
    width: 400px;
    max-width: 90%;
  }
  
  .close-button {
    position: absolute;
    top: 10px;
    right: 10px;
    background: none;
    border: none;
    font-size: 16px;
    cursor: pointer;
  }
  
  .toggle-buttons {
    display: flex;
    justify-content: space-around;
    margin-bottom: 20px;
  }
  
  .toggle-buttons button {
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    background: #e0e0e0;
    border-radius: 4px;
  }
  
  .toggle-buttons button.active {
    background: #24A7DC;
    color: white;
  }
  
  form {
    display: flex;
    flex-direction: column;
  }
  
  label {
    margin: 10px 0 5px;
  }
  
  input {
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  button {
    padding: 10px;
    background: #24A7DC;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  button:hover {
    background: #1d779b;
  }
  </style>