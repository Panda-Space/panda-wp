<script setup lang="ts">
import { ref } from 'vue'

const products = ref([
  {
    code: 'A1',
    name: 'Panda Vertical',
    category: 'pandaria',
    quantity: '10'
  },
  {
    code: 'A2',
    name: 'Panda Horizontal',
    category: 'pandaria',
    quantity: '20'
  }
])
</script>

<template>
  <section class="c-app">
    <section class="c-section c-section--home">
      <div class="container-fluid py-5">
        <h1 class="fs-30 w-bold mb-3">Example dashboard view</h1>

        <div class="flex gap-2 mb-3">
          <a href="#" class="block">All</a>
          <a href="#" class="block">Pending</a>
        </div>

        <DataTableUI
          :value="products"
          paginator
          :rows="5"
          :rowsPerPageOptions="[5, 10, 20, 50]"
          class="p-datatable-sm"
        >
          <ColumnUI field="code" sortable header="Code"></ColumnUI>
          <ColumnUI field="name" sortable header="Name"></ColumnUI>
          <ColumnUI field="category" sortable header="Category"></ColumnUI>
          <ColumnUI field="quantity" sortable header="Quantity"></ColumnUI>
        </DataTableUI>

        <div class="grid">
          <div class="col-12 md:col-6">
            <ExampleUI />
          </div>
          <div class="col-12 md:col-6">
            <ExampleUI />
          </div>
        </div>
      </div>
    </section>
  </section>
</template>
