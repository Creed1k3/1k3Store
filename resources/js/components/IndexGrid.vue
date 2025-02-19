<template>
    <div class="grid-container">
      <div class="grid-item" v-for="(image, index) in images" :key="index">
        <img :src="image" alt="Image" />
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ImageGrid',
    props: {
      images: {
        type: Array,
        required: true,
        default: () => [
          'https://picsum.photos/200/300?random=1',
          'https://picsum.photos/200/300?random=2',
          'https://picsum.photos/200/300?random=3',
          'https://picsum.photos/200/300?random=4',
          'https://picsum.photos/200/300?random=5',
          'https://picsum.photos/200/300?random=6',
          'https://picsum.photos/200/300?random=7',
          'https://picsum.photos/200/300?random=8',
        ],
      },
    },
  };
  </script>
  
  <style scoped>
.grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* 4 колонки, каждая занимает 25% ширины */
  gap: 10px; /* Отступы между элементами */
}

.grid-item {
  width: 100%; /* Ширина элемента — 100% от своей колонки */
  max-height: 295px; /* Максимальная высота элемента */
  overflow: hidden; /* Обрезаем содержимое, если оно превышает высоту */
}

.grid-item img {
  width: 100%; /* Ширина изображения — 100% от родителя */
  height: 100%; /* Высота изображения — 100% от родителя */
  object-fit: cover; /* Сохраняет пропорции изображения, обрезая лишнее */
  display: block;
}
  </style>