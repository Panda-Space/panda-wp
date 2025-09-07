<script setup lang="ts">
import { useForm, Field, configure } from 'vee-validate'
import * as yup from 'yup'

configure({
  validateOnInput: true
})

const schema = yup.object({
  email: yup.string().email().required(),
  password: yup.string().min(6).required(),
  file: yup.mixed().required('Debe seleccionar un archivo.')
})

const { errors, handleSubmit } = useForm({
  validationSchema: schema
})

const onSubmit = handleSubmit((values) => {
  console.log(values)
})
</script>
<template>
  <form @submit="onSubmit">
    <div class="c-form-group mb-4" :class="{ 'c-form-group--error': errors.email }">
      <label class="c-form-group__label">Email</label>
      <Field class="c-form-group__input" name="email" type="email" />
      <span class="c-form-group__error">{{ errors.email }}</span>
    </div>

    <div class="c-form-group mb-4" :class="{ 'c-form-group--error': errors.password }">
      <label class="c-form-group__label">Password</label>
      <Field class="c-form-group__input" name="password" type="password" />
      <span class="c-form-group__error">{{ errors.password }}</span>
    </div>

    <div class="c-form-group mb-4" :class="{ 'c-form-group--error': errors.file }">
      <label class="c-form-group__label">File</label>
      <Field name="file" type="file" />
      <span class="c-form-group__error">{{ errors.file }}</span>
    </div>

    <button class="c-button c-button--primary mt-4 w-full">Enviar</button>
  </form>
</template>
