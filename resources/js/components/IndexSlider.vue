<template>
  <div class="slider" @wheel="handleScroll">
    <div class="slides" :style="slideStyle">
      <div v-for="(slide, index) in slides" :key="index" class="slide">
        <img :src="slide.image" :alt="slide.alt" class="slide-image" />
      </div>
    </div>
    <button class="slider-button prev" @click="prevSlide">&#10094;</button>
    <button class="slider-button next" @click="nextSlide">&#10095;</button>
  </div>
</template>

<script>
export default {
  name: 'SimpleSlider',
  data() {
    return {
      slides: [
        {
          image: '/images/slider1.png',
          alt: 'Slide 1',
        },
        {
          image: '/images/slider2.png',
          alt: 'Slide 2',
        },
        {
          image: '/images/slider3.png',
          alt: 'Slide 3',
        },
        {
          image: '/images/slider3.png',
          alt: 'Slide 3',
        },
        {
          image: '/images/slider4.png',
          alt: 'Slide 4',
        },
        {
          image: '/images/slider5.png',
          alt: 'Slide 5',
        },
        {
          image: '/images/slider6.png',
          alt: 'Slide 6',
        },
      ],
      currentIndex: 0,
    };
  },
  computed: {
    slideStyle() {
      return {
        transform: `translateX(-${this.currentIndex * 100}%)`,
      };
    },
  },
  methods: {
    nextSlide() {
      this.currentIndex = (this.currentIndex + 1) % this.slides.length;
    },
    prevSlide() {
      this.currentIndex =
        (this.currentIndex - 1 + this.slides.length) % this.slides.length;
    },
    handleScroll(event) {
        event.preventDefault();
        if (event.deltaY > 0) {
          this.nextSlide();
        } else {
          this.prevSlide();
        }
      }
  },
};
   
</script>

<style scoped>
.slider {
  position: relative;
  margin: 0 auto;
  overflow: hidden;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.slides {
  display: flex;
  transition: transform 0.5s ease-in-out;
}

.slide {
  min-width: 100%;
  box-sizing: border-box;
}

.slide-image {
  width: 100%;
  display: block;
  border-radius: 12px;
}

.slider-button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background-color: rgba(0, 0, 0, 0.5);
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  border-radius: 50%;
  font-size: 18px;
  transition: background-color 0.3s ease;
}

.slider-button:hover {
  background-color: rgba(0, 0, 0, 0.8);
}

.prev {
  left: 10px;
}

.next {
  right: 10px;
}
</style>