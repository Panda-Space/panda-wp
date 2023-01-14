<template>
  <section class="c-section c-section--home">
    <div class="container">
      <section class="py-5 h-100 text-center">
        <h1 data-aos="zoom-in" class="w-bold">
          <Icon icon="line-md:github" />
          Welcome to Panda WP
          <Icon icon="line-md:beer-twotone-loop" />
        </h1>
        <router-link to="example">Example</router-link>
        <figure data-aos="zoom-in">
          <img alt="Vue logo" src="@/assets/images/logo.png">
        </figure>
      </section>

      <section class="p-4">
        <h2 class="fs-21 mb-3 text-center">Basic Panda WP Form</h2>
        <form @submit.prevent="submit">
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
        </form>
      </section>
    </div>
  </section>
</template>

<script>
import {
  required,
  requiredIf,
  minLength,
  helpers,
} from 'vuelidate/lib/validators';

export default {
  data() {
    return {
      name: '',
      email: '',
      attachment: '',

      submitStatus: '',
    };
  },
  validations: {
    name: {
      required,
      minLength: minLength(4),
    },
    email: {
      required,
      alpha: helpers.regex('alpha', /.+@.+\..+/),
    },
    attachment: {
      file: {
        required: requiredIf(function file() {
          return this.attachment.length === 0;
        }),
      },
    },
  },
  methods: {
    asd() {
      return this.attachment.length !== 0;
    },
    attachmentFileChanged(event) {
      const files = event.target.files || event.dataTransfer.files;

      if (!files.length) {
        this.attachment = '';

        return;
      }

      [this.attachment] = files;
    },

    submit() {
      this.$v.$touch();

      if (this.$v.$invalid) {
        this.submitStatus = 'ERROR';
      } else {
        this.submitStatus = 'PENDING';
        /* OK code here!!! */
      }
    },
  },
};
</script>
