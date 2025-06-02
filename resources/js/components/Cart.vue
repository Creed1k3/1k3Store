<template>
  <div class="max-w-[1380px] w-[1380px] mx-auto">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-bold text-left">Корзина</h1>
      <button
        v-if="cartItems.length > 0"
        @click="openDeleteModal(null)"
        class="text-sm text-red-600 hover:text-red-800 bg-red-100 px-4 py-2 rounded-lg"
      >
        Очистить корзину
      </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <!-- Левая часть: товары или пустая корзина -->
      <div class="md:col-span-2 space-y-4">
        <!-- Если есть товары -->
        <template v-if="cartItems.length > 0">
          <div class="flex justify-between text-gray-500 font-medium px-4">
            <span class="w-3/4 text-left">Продукт</span>
            <span class="w-1/4 text-right">Действия</span>
          </div>

          <div
            v-for="item in cartItems"
            :key="item.id"
            class="flex border rounded-xl shadow w-full overflow-hidden transition duration-300 ease-in-out"
            :class="{'bg-gray-100': !item.isActive, 'opacity-50': !item.isActive}"
          >
            <div class="flex items-center justify-between p-4 flex-1">
              <div class="flex items-center gap-4 relative">
                <input 
                  type="checkbox" 
                  v-model="item.isActive" 
                  class="form-checkbox h-5 w-5 text-blue-600 absolute top-0 left-0 z-10"
                  @change="saveCart"
                />
                <img 
                  :src="item.image" 
                  class="w-20 h-20 rounded-lg object-cover transform transition-all duration-300" 
                  :class="{'scale-105': item.isActive}" 
                />
              </div>
              <div class="flex-1 pl-6">
                <div class="font-semibold text-left">{{ item.name }}</div>
                <div class="text-sm text-gray-500 text-left">Набор: Цвет {{ item.color }}</div>
              </div>
              <div class="flex items-center gap-4">
                <div class="flex items-center justify-center border border-black rounded-full w-28 h-10">
                  <button
                    class="text-lg font-bold text-gray-700 hover:text-black px-3"
                    @click="handleMinus(item)"
                  >
                    −
                  </button>
                  <span class="w-6 text-center font-medium">{{ item.quantity }}</span>
                  <button
                    class="text-lg font-bold text-gray-700 hover:text-black px-3"
                    @click="changeQty(item, item.quantity + 1)"
                  >
                    +
                  </button>
                </div>
                <div class="font-semibold whitespace-nowrap w-24 text-right">
                  {{ item.isActive ? formatNumber(item.quantity * item.price) : '0' }} ₽
                </div>
              </div>
            </div>

            <div class="w-[80px] flex items-center justify-center gap-3 px-2 border-l">
              <button
                v-if="item.isActive"
                class="text-red-500 hover:text-red-700"
                @click="openDeleteModal(item)"
              >
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
              <button
                class="text-pink-500 hover:text-pink-700"
                @click="$emit('toggle-favorite', item)"
              >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 18.343l-6.828-6.829a4 4 0 010-5.656z"/>
                </svg>
              </button>
            </div>
          </div>
        </template>

        <!-- Если корзина пуста -->
<template v-else>
  <div class="flex flex-col items-center justify-center py-20">
    <EmptyCartIcon class="w-[20%] h-auto text-gray-400" />
    <p class="text-gray-500 text-xl">Корзина пуста</p>
  </div>
</template>

      </div>

      <!-- Правая часть: сводка заказа -->
      <div class="p-6 border rounded-xl shadow">
        <h2 class="text-xl font-semibold mb-4 text-left">Сводка заказа</h2>
        <div class="space-y-2">
          <input
            v-model="discountCode"
            placeholder="Промокод"
            class="w-full px-3 py-2 border rounded text-left"
          />
          <button @click="applyDiscount" class="bg-gray-800 text-white px-4 py-2 rounded">
            Применить
          </button>
        </div>
        <div class="mt-4 space-y-2 text-sm">
          <div class="flex justify-between">
            <span class="text-left">Промежуточный итог</span>
            <span>{{ formatNumber(subTotal) }} ₽</span>
          </div>
          <div class="flex justify-between">
            <span class="text-left">Скидка (10%)</span>
            <span>-{{ formatNumber(discount) }} ₽</span>
          </div>
          <div class="flex justify-between">
            <span class="text-left">Стоимость доставки</span>
            <span>0 ₽</span>
          </div>
          <div class="flex justify-between font-semibold text-lg">
            <span class="text-left">Итого</span>
            <span>{{ formatNumber(total) }} ₽</span>
          </div>
        </div>
        <div class="mt-4 text-xs text-gray-500 text-left">
          <p>Ограниченная гарантия 30 дней от дефектов производителя</p>
        </div>
        <button class="mt-4 w-full bg-black text-white py-2 rounded-lg">
          Оформить заказ
        </button>
      </div>
    </div>

    <!-- Модалка -->
    <div
      v-if="showModal"
      @click.self="closeModal"
      class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    >
      <div
        class="bg-gray-800 p-6 rounded-lg w-96 transition-transform duration-500 ease-in-out transform shadow-xl"
        :class="{ 'scale-95': !showModal, 'scale-100': showModal }"
      >
        <h2 class="text-xl font-semibold mb-4 text-center text-white">
          {{ itemToDelete === null ? 'Очистить корзину' : 'Удалить товар' }}
        </h2>
        <p class="text-center mb-4 text-gray-300">
          {{ itemToDelete === null
            ? 'Вы точно хотите очистить корзину? Все товары будут удалены без возможности восстановления.'
            : 'Вы точно хотите удалить выбранный товар? Отменить данное действие будет невозможно.' }}
        </p>
        <div class="flex justify-around">
          <button
            class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600"
            @click="closeModal"
          >
            Отмена
          </button>
          <button
            class="px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700"
            @click="confirmDelete"
          >
            {{ itemToDelete === null ? 'Очистить' : 'Удалить' }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue';
import Cookies from 'js-cookie';
// Если храните SVG в src/assets, раскомментируйте и укажите путь:
import EmptyCartIcon from '@/assets/images/Emptycart.svg';

const cartItems = ref([]);
const discountCode = ref('');
const validDiscount = ref(false);
const showModal = ref(false);
const itemToDelete = ref(null);

function loadCart() {
  try {
    const raw = Cookies.get('cart');
    const parsed = raw ? JSON.parse(raw) : [];
    cartItems.value = parsed.map(item => ({
      ...item,
      isActive: item.isActive === undefined ? true : item.isActive
    }));
  } catch {
    cartItems.value = [];
  }
}

function saveCart() {
  Cookies.set('cart', JSON.stringify(cartItems.value), { expires: 7 });
  window.dispatchEvent(new CustomEvent('cart-updated'));
}

function changeQty(item, qty) {
  item.quantity = Math.max(1, qty);
  saveCart();
}

function handleMinus(item) {
  if (item.quantity <= 1) {
    openDeleteModal(item);
  } else {
    changeQty(item, item.quantity - 1);
  }
}

function applyDiscount() {
  validDiscount.value = discountCode.value.trim().toLowerCase() === 'save10';
}

function formatNumber(value) {
  return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
}

const subTotal = computed(() =>
  cartItems.value.reduce((sum, i) => sum + (i.isActive ? i.quantity * i.price : 0), 0)
);
const discount = computed(() =>
  validDiscount.value ? Math.round(subTotal.value * 0.1) : 0
);
const total = computed(() => subTotal.value - discount.value);

onMounted(() => {
  loadCart();
  window.addEventListener('cart-updated', loadCart);
});

function openDeleteModal(item) {
  itemToDelete.value = item;
  showModal.value = true;
}

function closeModal() {
  showModal.value = false;
  itemToDelete.value = null;
}

function confirmDelete() {
  if (itemToDelete.value === null) {
    cartItems.value = [];
  } else {
    const idx = cartItems.value.findIndex(i => i.id === itemToDelete.value.id);
    if (idx !== -1) {
      cartItems.value.splice(idx, 1);
    }
  }
  saveCart();
  closeModal();
}
</script>

<style scoped>
.bg-gray-800 {
  background-color: #333333;
}
.shadow-xl {
  box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.1);
}
</style>
