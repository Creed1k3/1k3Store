<template>
  <div id="app">
    <h1>Hello Vue!</h1>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style scoped>
/* Подключаем шрифт GTEestiPro локально */
@font-face {
  font-family: 'GTEestiPro';
  src: url('@/assets/fonts/GTEestiPro.woff2') format('woff2');
  font-weight: normal;
  font-style: normal;
  font-display: swap;
}

#app {
  /* Задаем глобальную для компонента */
  font-family: 'GTEestiPro', Arial, sans-serif;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
