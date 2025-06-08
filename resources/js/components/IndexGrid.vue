<template>
  <div class="grid-container">
    <div
      class="category-card"
      v-for="(category, index) in categories"
      :key="index"
    >
      <img :src="category.image" :alt="category.title" />
      <div class="overlay-bottom">
        <span class="title">{{ category.title }}</span>
      </div>
    </div>
  </div>
</template>

<script>
import fen1 from '@/assets/images/fen1.jpg';
import camera1 from '@/assets/images/camera1.jpg';
import keyboard1 from '@/assets/images/keyboard1.jpg';
import kofe1 from '@/assets/images/kofe1.jpg';
import phone1 from '@/assets/images/phone1.jpg';
import sos1 from '@/assets/images/sos1.jpg';
import tele1 from '@/assets/images/tele1.jpg';
import video1 from '@/assets/images/video1.jpg';

export default {
  name: 'PopularCategories',
  data() {
    return {
      categories: [
        { title: 'Уход за собой', image: fen1 },
        { title: 'ФотоТехника', image: camera1 },
        { title: 'Компьютерная периферия', image: keyboard1 },
        { title: 'Техника для дома', image: kofe1 },
        { title: 'Смартфоны', image: phone1 },
        { title: 'Бытовая электроника', image: sos1 },
        { title: 'Телевизоры', image: tele1 },
        { title: 'Комплектующие для ПК', image: video1 },
      ],
    };
  },
};
</script>

<style scoped>
.grid-container {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
}

.category-card {
  position: relative;
  overflow: hidden;
  border-radius: 12px;
  cursor: pointer;
  transition: transform 0.3s ease;
}

.category-card:hover {
  transform: scale(1.03);
}

.category-card img {
  width: 100%;
  height: 300px;
  object-fit: cover;
  display: block;
  transition: transform 0.3s ease;
}

.overlay-bottom {
  position: absolute;
  bottom: 0;
  width: 100%;
  background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
  padding: 12px;
  text-align: center;
}

.title {
  color: #fff;
  font-size: 1.2rem;
  font-weight: 600;
}
</style>
