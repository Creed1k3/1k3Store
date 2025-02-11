<template>
    <div>
      <button @click="decrement">-</button>
      <span>{{ count }}</span>
      <button @click="increment">+</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        count: 0
      };
    },
    methods: {
      increment() {
        this.count++;
      },
      decrement() {
        this.count--;
      }
    }
  };
  </script>
  
  <style scoped>
  button {
    font-size: 1.5rem;
    margin: 0 1rem;
  }
  span {
    font-size: 1.5rem;
  }
  </style>