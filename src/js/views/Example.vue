<template>
  <section class="c-section c-section--404">
    <div class="grid-container padding-vertical-2">
      <h1 class="c-section__title margin-bottom-1">Pagina de ejemplo</h1>
      <div class="grid-x grid-margin-x grid-margin-y">
        <div v-for="image of images" :key="image.id" class="cell medium-4 large-3">
          <div class="c-card-image overflow-hidden">
            <v-lazy-image class="width-100 height-100 of--cover" :src="image" />
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import VLazyImage from "v-lazy-image";

export default {
  data() {
    return {
      context: {...panda},

      images: [
        'https://images.pexels.com/photos/1770809/pexels-photo-1770809.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
        'https://images.pexels.com/photos/5409751/pexels-photo-5409751.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/4275889/pexels-photo-4275889.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/4101555/pexels-photo-4101555.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/5117913/pexels-photo-5117913.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/2922672/pexels-photo-2922672.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/5282269/pexels-photo-5282269.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'https://images.pexels.com/photos/3850526/pexels-photo-3850526.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/3876407/pexels-photo-3876407.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/3225517/pexels-photo-3225517.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/1144687/pexels-photo-1144687.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'https://images.pexels.com/photos/3571551/pexels-photo-3571551.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'https://images.pexels.com/photos/2469122/pexels-photo-2469122.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/1770809/pexels-photo-1770809.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260',
        'https://images.pexels.com/photos/3621344/pexels-photo-3621344.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/4064432/pexels-photo-4064432.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/33041/antelope-canyon-lower-canyon-arizona.jpg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/1755243/pexels-photo-1755243.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
        'https://images.pexels.com/photos/1995730/pexels-photo-1995730.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/4319752/pexels-photo-4319752.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/2365457/pexels-photo-2365457.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
        'https://images.pexels.com/photos/1894350/pexels-photo-1894350.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940',
      ]
    }
  },
  components: {
    VLazyImage,
  },
}
</script>
