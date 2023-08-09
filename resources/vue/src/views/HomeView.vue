<script setup lang="ts">
import { onMounted } from 'vue'
import { useAppStore } from '@/stores/app'
import { useRoute } from 'vue-router'
import { useToast } from "primevue/usetoast";

const route = useRoute()
const store = useAppStore()
const toast = useToast();

onMounted(() => {
  store.updateLoader({
    status: false,
    route: route.path
  })
})

const shows = () => {
  toast.add({ severity: 'info', summary: 'Info', detail: 'Message Content', life: 3000 });
};
</script>

<template>
  <section class="c-section c-section--home">
    <div class="container">
      <section class="py-5 h-100 text-center">
        <h1 data-aos="zoom-in" class="fs-30 w-bold mb-5">
          <IconUI icon="line-md:github" />
          Welcome to Panda WP
          <IconUI icon="line-md:beer-twotone-loop" />
        </h1>

        <router-link to="example" class="inline-block mb-5">Go to example view</router-link>

        <Image
          class="mb-5"
          src="https://primefaces.org/cdn/primevue/images/galleria/galleria10.jpg"
          alt="Image"
          width="250"
          preview
        />

        <figure data-aos="zoom-in" class="mb-5">
          <img alt="Vue logo" src="@/assets/images/logo.png" />
        </figure>

        <button @click="shows()" class="c-button c-button--primary">
          Show notification
        </button>
      </section>

      <section class="p-4">
        <h2 class="fs-21 mb-3 text-center">Basic Panda WP Form</h2>
        <!-- <form @submit.prevent="submit">
        <div class="c-form-group mb-4" :class="{ 'c-form-group--error': $v.name.$error }">
          <label class="c-form-group__label">Name</label>
          <input class="c-form-group__input" v-model.trim="$v.name.$model"/>

          <span class="c-form-group__error" v-if="!$v.name.required">Field is required</span>
          <span class="c-form-group__error" v-if="!$v.name.minLength">
            Name must have at least {{$v.name.$params.minLength.min}} letters.
          </span>
        </div>

        <div class="c-form-group mb-4" :class="{ 'c-form-group--error': $v.email.$error }">
          <label class="c-form-group__label">Email</label>
          <input class="c-form-group__input" v-model.trim="$v.email.$model"/>

          <div class="c-form-group__error" v-if="!$v.email.required">Field is required</div>
          <div class="c-form-group__error" v-if="!$v.email.alpha">
            No es un email
          </div>
        </div>

        <div class="c-form-group" :class="{ 'c-form-group--error': $v.attachment.$error }">
          <label class="c-form-group__label">Archivo</label>
          <input
            class="c-form-group__input"
            type="file"
            @change="attachmentFileChanged($event)"
          />

          <div class="c-form-group__error" v-if="!$v.attachment.file.required">
            Field is required
          </div>
        </div>

        <button class="c-button c-button--primary mt-4">Enviar</button>
      </form> -->
      </section>
    </div>

    <ToastUI position="bottom-left" />
  </section>
</template>
