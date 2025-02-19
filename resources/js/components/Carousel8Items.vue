<template>
    <div class="carousel-container" @wheel="handleScroll">
      <button class="carousel-control prev" @click="prevSlide">&#10094;</button>
      <div class="carousel-wrapper">
        <div class="carousel" :style="carouselStyle">
          <div class="carousel-item" v-for="(item, index) in items" :key="index" :style="carouselItemStyle">
            <a :href="item.link">
              <img :src="item.image" :alt="item.alt" />
            </a>
          </div>
        </div>
      </div>
      <button class="carousel-control next" @click="nextSlide">&#10095;</button>
    </div>
  </template>
  
  <script>
  export default {
    name: "Carousel",
    data() {
      return {
        currentIndex: 1,
        itemsToShow: 8, // Количество видимых элементов
        gap: 20, // Отступ между элементами
        items: [
          { image: "https://picsum.photos/200/200", link: "/page1", alt: "Image 1" },
          { image: "https://picsum.photos/200/200", link: "/page2", alt: "Image 2" },
          { image: "https://picsum.photos/200/200", link: "/page3", alt: "Image 3" },
          { image: "https://picsum.photos/200/200", link: "/page4", alt: "Image 4" },
          { image: "https://picsum.photos/200/200", link: "/page5", alt: "Image 5" },
          { image: "https://picsum.photos/200/200", link: "/page6", alt: "Image 6" },
          { image: "https://picsum.photos/200/200", link: "/page7", alt: "Image 7" },
          { image: "https://picsum.photos/200/200", link: "/page8", alt: "Image 8" },
          { image: "https://picsum.photos/200/200", link: "/page9", alt: "Image 9" },
          { image: "https://picsum.photos/200/200", link: "/page10", alt: "Image 10" },
          { image: "https://picsum.photos/200/200", link: "/page11", alt: "Image 11" },
          { image: "https://picsum.photos/200/200", link: "/page12", alt: "Image 12" }
        ]
      };
    },
    computed: {
      carouselStyle() {
        return {
          transform: `translateX(-${this.currentIndex * (50 / this.itemsToShow)}%)`,
          gap: `${this.gap}px`
        };
      },
      carouselItemStyle() {
        return {
          minWidth: `calc((100% / ${this.itemsToShow}) - ${this.gap}px)`,
        };
      }
    },
    methods: {
      nextSlide() {
        if (this.currentIndex < this.items.length - this.itemsToShow) {
          this.currentIndex++;
        }
      },
      prevSlide() {
        if (this.currentIndex > 0) {
          this.currentIndex--;
        }
      },
      handleScroll(event) {
        event.preventDefault();
        if (event.deltaY > 0) {
          this.nextSlide();
        } else {
          this.prevSlide();
        }
      }
    }
  };
  </script>
  
  <style scoped>
  .carousel-container {
    position: relative;
    width: 100%;
    overflow: hidden;
  }
  
  .carousel-wrapper {
    overflow: hidden;
    width: 100%;
  }
  
  .carousel {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }
  
  .carousel-item {
    box-sizing: border-box;
    flex: 0 0 calc((100% / 8) - 20px); /* Ширина элемента: 12.5% минус отступы */
    height: 200px;
  }
  
  .carousel img {
    width: 100%;
    height: 100%;
  }
  
  .carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    font-size: 2rem;
    cursor: pointer;
    z-index: 1;
  }
  
  .carousel-control.prev {
    left: 10px;
  }
  
  .carousel-control.next {
    right: 10px;
  }
  </style>