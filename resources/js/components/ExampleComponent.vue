<template>
    <div class="notice">
      <h1 style="color: red; font-size: 2rem; text-align: center;">
        Внимание! Это Vue-компонент!
      </h1>
      <p style="color: blue; font-size: 1.2rem; text-align: center;">
        Если вы видите это сообщение, значит Vue работает!
      </p>
    </div>
  </template>
  
  <script>
  export default {
    name: 'NoticeComponent',
    mounted() {
      console.log('NoticeComponent mounted!');
    }
  }
  </script>
  
  <style scoped>
  .notice {
    border: 2px solid green;
    padding: 20px;
    margin: 20px auto;
    max-width: 600px;
    background-color: #f0f8ff;
  }
  </style>