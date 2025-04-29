<template>
  <footer class="footer-with-left-padding bg-gray-800 text-white py-8">
    <div class="max-w-[1380px] w-[1380px] mx-auto">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <!-- О компании -->
        <div>
          <h3 class="text-lg font-semibold mb-4">О компании</h3>
          <p class="text-sm text-gray-400">1k3 Store — это магазин электроники с широким ассортиментом, который помогает вам всегда быть в тренде технологий. Мы предлагаем только проверенные и качественные товары.</p>
        </div>

        <!-- Контакты -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Контакты</h3>
          <ul class="space-y-2">
            <li><span class="text-sm text-gray-400">Телефон: +1 234 567 890</span></li>
            <li><span class="text-sm text-gray-400">Email: support@1k3store.com</span></li>
            <li><span class="text-sm text-gray-400">Адрес: 123 Электронная улица, Город, Страна</span></li>
          </ul>
        </div>

        <!-- Быстрые ссылки -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Быстрые ссылки</h3>
          <ul class="space-y-2">
            <li><a href="/" class="text-sm text-gray-400 hover:text-white">Главная</a></li>
            <li><a href="/catalog" class="text-sm text-gray-400 hover:text-white">Каталог</a></li>
            <li><a href="/about" class="text-sm text-gray-400 hover:text-white">О нас</a></li>
            <li><a href="/contact" class="text-sm text-gray-400 hover:text-white">Контакты</a></li>
          </ul>
        </div>

        <!-- Социальные сети -->
        <div>
          <h3 class="text-lg font-semibold mb-4">Следите за нами</h3>
          <div class="flex space-x-4">
            <a href="#" class="text-gray-400 hover:text-white">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 12c0 3.314-2.686 6-6 6s-6-2.686-6-6 2.686-6 6-6 6 2.686 6 6z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 10V4m4 6l-4 4-4-4" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.828 8.828a4 4 0 11-5.656 5.656A5.992 5.992 0 0120 12a5.992 5.992 0 01-5.172-3.172z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 6v3a6 6 0 00-6 6 6 6 0 0010 0 6 6 0 00-6-6V6" />
              </svg>
            </a>
            <a href="#" class="text-gray-400 hover:text-white">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7h-6l2-2H7l2 2H5l-1 5h16l-1-5z" />
              </svg>
            </a>
          </div>
        </div>
      </div>

      <div class="mt-8 text-center text-sm text-gray-400">
        <p>&copy; 2025 1k3 Store. Все права защищены.</p>
      </div>
    </div>
  </footer>
</template>

<script setup>
// Здесь можно добавить любые дополнительные скрипты или данные, если необходимо.
</script>

<style scoped>
.footer-with-left-padding {
  padding-left: 20px; /* Отступ слева */
}
.footer-with-left-padding {
  position: absolute; /* Убираем футер из потока документа */
  left: 0; /* Убираем отступ слева */
  right: 0; /* Растягиваем на всю ширину */
  width: 100%; /* Задаем ширину 100% для всего футера */
  background-color: #1f293a; /* Цвет фона футера */
  color: white;
  padding: 20px 0;
  z-index: 10; /* Убедитесь, что футер будет поверх других элементов, если необходимо */
}
</style>
