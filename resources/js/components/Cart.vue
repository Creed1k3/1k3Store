<template>
  <div class="max-w-[1380px] w-[1380px] mx-auto">
    <h1 class="text-3xl font-bold mb-6">Корзина</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Товары в корзине -->
      <div class="md:col-span-2 space-y-4">
        <div class="flex justify-between text-gray-500 font-medium px-4">
          <span class="w-3/4">Продукт</span>
          <span class="w-1/4 text-right">Действия</span>
        </div>

        <div
          v-for="item in cartItems"
          :key="item.id"
          class="flex border rounded-xl shadow w-full overflow-hidden transition duration-300 ease-in-out"
          :class="{'bg-gray-100': !item.isActive, 'opacity-50': !item.isActive}"
        >
          <!-- Информация о продукте -->
          <div class="flex items-center justify-between p-4 flex-1">
            <div class="flex items-center gap-4 relative">
              <!-- Галочка в левом верхнем углу -->
              <input 
                type="checkbox" 
                v-model="item.isActive" 
                class="form-checkbox h-5 w-5 text-blue-600 absolute top-0 left-0 z-10"
                :title="item.isActive ? 'Активный' : 'Неактивный'"
              />
              <img :src="item.image" class="w-20 h-20 rounded-lg object-cover transform transition-all duration-300" 
                :class="{'scale-105': item.isActive}" />
            </div>
            <div>
              <div class="font-semibold">{{ item.name }}</div>
              <div class="text-sm text-gray-500">Набор: Цвет {{ item.color }}</div>
            </div>
            <div class="flex items-center gap-6">
              <div class="flex items-center border px-2 py-1 rounded-full">
                <button @click="item.quantity = Math.max(1, item.quantity - 1)">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 12H4" />
                  </svg>
                </button>
                <span class="px-3">{{ item.quantity }}</span>
                <button @click="item.quantity++">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                  </svg>
                </button>
              </div>
              <div class="font-semibold">
                ${{ item.isActive ? item.quantity * item.price : 0 }}
              </div>
            </div>
          </div>

          <!-- Кнопки действий -->
          <div class="w-[80px] flex items-center justify-center gap-3 px-2 border-l">
            <button class="text-red-500 hover:text-red-700" title="Удалить">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
            <button class="text-yellow-500 hover:text-yellow-600" title="Свернуть">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Сводка заказа -->
      <div class="p-6 border rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4">Сводка заказа</h2>
        <div class="space-y-2">
          <input v-model="discountCode" placeholder="Промокод" class="w-full px-3 py-2 border rounded" />
          <button @click="applyDiscount" class="bg-gray-800 text-white px-4 py-2 rounded">Применить</button>
        </div>
        <div class="mt-4 space-y-2 text-sm">
          <div class="flex justify-between"><span>Промежуточный итог</span><span>${{ subTotal }}</span></div>
          <div class="flex justify-between"><span>Скидка (10%)</span><span>-${{ discount }}</span></div>
          <div class="flex justify-between"><span>Стоимость доставки</span><span>$0.00</span></div>
          <div class="flex justify-between font-semibold text-lg"><span>Итого</span><span>${{ total }}</span></div>
        </div>
        <div class="mt-4 text-xs text-gray-500">
          <p>Ограниченная гарантия 30 дней от дефектов производителя</p>
        </div>
        <button class="mt-4 w-full bg-black text-white py-2 rounded-lg">Оформить заказ</button>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const cartItems = ref([
  {
    id: 1,
    name: 'Современный диван',
    color: 'Бежевый',
    price: 500,
    quantity: 1,
    image: 'https://picsum.photos/seed/sofa/100',
    isActive: true // По умолчанию включен
  },
  {
    id: 2,
    name: 'Деревянный стол',
    color: 'Естественный дуб',
    price: 945,
    quantity: 1,
    image: 'https://picsum.photos/seed/table/100',
    isActive: true // По умолчанию включен
  },
  {
    id: 3,
    name: 'Эргономичное кресло',
    color: 'Черный',
    price: 597,
    quantity: 1,
    image: 'https://picsum.photos/seed/chair/100',
    isActive: true // По умолчанию включен
  },
]);

const discountCode = ref('');
const validDiscount = ref(false);

const subTotal = computed(() => {
  return cartItems.value.reduce((sum, item) => {
    return sum + (item.isActive ? item.quantity * item.price : 0); // Учитываем только активные товары
  }, 0);
});

const discount = computed(() => {
  return validDiscount.value ? Math.round(subTotal.value * 0.1) : 0;
});

const total = computed(() => {
  return subTotal.value - discount.value;
});

function applyDiscount() {
  validDiscount.value = discountCode.value.trim().toLowerCase() === 'save10';
}
</script>

<style scoped>
input:focus {
  outline: none;
  border-color: #000;
}

.form-checkbox {
  margin-right: 10px;
}

/* Плавный переход фона */
.transition {
  transition: background-color 0.3s ease, opacity 0.3s ease;
}
</style>
