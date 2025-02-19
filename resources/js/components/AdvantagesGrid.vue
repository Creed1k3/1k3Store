<template>
    <div class="grid-container">
      <div class="grid-item" v-for="(image, index) in images" :key="index">
        <img :src="image" alt="Image"/>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        images: [
          // Добавьте сюда ссылки на ваши изображения
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64',
          'https://picsum.photos/128/64'

        ]
      };
    }
  };
  </script>
  
  <style scoped>
  .grid-container {
    display: grid;
    grid-template-columns: repeat(8, 1fr);
    gap: 10px;
  }
  
  .grid-item img {
    width: 100%;
    height: 64px;
    object-fit: cover;
  }
  </style>