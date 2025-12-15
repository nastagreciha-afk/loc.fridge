<template>
    <div class="flex space-x-6">
        <!-- Sidebar -->
        <div class="w-1/4 bg-gray-100 dark:bg-gray-900 p-4 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-200">Меню</h3>
            <ul class="space-y-2">
                <li>
                    <button
                        @click="selectedTab = 'fridges'"
                        :class="['w-full text-left px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-800',
                     selectedTab === 'fridges' ? 'bg-gray-300 dark:bg-gray-700 font-semibold' : '']">
                        Холодильники
                    </button>
                </li>
                <li>
                    <button
                        @click="selectedTab = 'products'"
                        :class="['w-full text-left px-3 py-2 rounded hover:bg-gray-200 dark:hover:bg-gray-800',
                     selectedTab === 'products' ? 'bg-gray-300 dark:bg-gray-700 font-semibold' : '']">
                        Продукты
                    </button>
                </li>
            </ul>
        </div>

        <!-- Content -->
        <div class="w-3/4 bg-white dark:bg-gray-800 p-6 rounded-lg shadow">
            <!-- Если выбрана вкладка "Холодильники" -->
            <div v-if="selectedTab === 'fridges'">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Информация о холодильниках</h3>
                <div v-if="fridges.length">
                    <ul class="space-y-2">
                        <li v-for="fridge in fridges" :key="fridge.id" class="border p-2 rounded">
                            <p><strong>Название:</strong> {{ fridge.name }}</p>
                            <p><strong>Модель:</strong> {{ fridge.model }}</p>
                            <p><strong>Объем:</strong> {{ fridge.capacity }} л</p>
                            <p><strong>Статус:</strong> {{ fridge.status }}</p>
                        </li>
                    </ul>
                </div>
                <div v-else>
                    <p>Холодильники отсутствуют.</p>
                </div>
            </div>

            <!-- Если выбрана вкладка "Продукты" -->
            <div v-if="selectedTab === 'products'">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Продукты</h3>
                <div v-if="products.length">
                    <ul class="space-y-2">
                        <li v-for="product in products" :key="product.id" class="border p-2 rounded">
                            <p><strong>Название:</strong> {{ product.name }}</p>
                            <p><strong>Категория:</strong> {{ product.category }}</p>
                            <p><strong>Срок годности:</strong> {{ product.expiry_date }}</p>
                        </li>
                    </ul>
                </div>
                <div v-else>
                    <p>Продукты отсутствуют.</p>
                </div>
            </div>

            <!-- Статистика пользователя всегда видна -->
            <div class="mt-6 border-t pt-4">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-2">Статистика пользователя</h4>
                <p><strong>Всего холодильников:</strong> {{ fridges.length }}</p>
                <p><strong>Активные:</strong> {{ activeFridges }}</p>
                <p><strong>Неактивные:</strong> {{ inactiveFridges }}</p>
                <p><strong>Всего продуктов:</strong> {{ products.length }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        fridges: { type: Array, default: () => [] },
        products: { type: Array, default: () => [] }
    },
    data() {
        return {
            selectedTab: null
        };
    },
    computed: {
        activeFridges() {
            return this.fridges.filter(f => f.status === 'active').length;
        },
        inactiveFridges() {
            return this.fridges.filter(f => f.status === 'inactive').length;
        }
    }
}
</script>
