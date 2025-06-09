<template>
  <div class="embla" ref="emblaRef" @wheel.prevent="onWheel">
    <div class="embla__container">
      <div
        class="embla__slide"
        v-for="(slide, index) in slides"
        :key="index"
      >
        <img :src="slide.image" :alt="slide.alt" class="embla__slide__img" />
      </div>
    </div>
     <button class="embla__button prev" @click="scrollPrev" aria-label="Назад">
      <ArrowLeftIcon />
    </button>
    <button class="embla__button next" @click="scrollNext" aria-label="Вперед">
      <ArrowRightIcon />
    </button>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import EmblaCarousel from 'embla-carousel'

import ArrowLeftIcon from '@/assets/icons/arrow-left.svg'
import ArrowRightIcon from '@/assets/icons/arrow-right.svg'

const emblaRef = ref(null)
let embla = null

const slides = ref([
  { image: '/images/slider1.png', alt: 'Slide 1' },
  { image: '/images/slider2.png', alt: 'Slide 2' },
  { image: '/images/slider3.png', alt: 'Slide 3' },
  { image: '/images/slider4.png', alt: 'Slide 4' },
  { image: '/images/slider5.png', alt: 'Slide 5' },
  { image: '/images/slider6.png', alt: 'Slide 6' },
])

const scrollNext = () => embla?.scrollNext()
const scrollPrev = () => embla?.scrollPrev()

const onWheel = (event) => {
  if (!embla) return
  event.deltaY > 0 ? scrollNext() : scrollPrev()
}

onMounted(() => {
  embla = EmblaCarousel(emblaRef.value, {
    loop: true,
    align: 'start',
    skipSnaps: false,
  })
})
</script>


<style scoped>
.embla {
  position: relative;
  overflow: hidden;
  width: 100%;
  border-radius: 12px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.embla__container {
  display: flex;
}
.embla__slide {
  position: relative;
  min-width: 100%;
  padding: 10px;
  box-sizing: border-box;
}
.embla__slide__img {
  display: block;
  width: 100%;
  border-radius: 12px;
}

.embla__button {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  width: 48px;
  height: 48px;
  border: none;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.5);
  color: #fff;
  cursor: pointer;
  z-index: 2;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
  transition: background-color 0.2s ease, transform 0.2s ease;
  display: flex;
  align-items: center;
  justify-content: center;
}

.embla__button:hover {
  background-color: rgba(0, 0, 0, 0.7);
  transform: translateY(-50%) scale(1.1);
}

.embla__button:active {
  transform: translateY(-50%) scale(0.95);
}

.embla__button.prev {
  left: 10px;
}

.embla__button.next {
  right: 10px;
}

.embla__button svg {
  width: 48px;
  height: 48px;
  fill: white;
}

</style>
