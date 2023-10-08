<template>
  <BaseLayout>
    <div class="flex flex-col justify-center items-center gap-3 mt-4">
      <h3 class="text-3xl font-bold underline">Game page</h3>
      <p class="text-xl font-light px-3">
        This is a game page of the Checkers app, written using
        Laravel and Vue.js with Inertia.js
      </p>
    </div>
  </BaseLayout>
</template>

<script setup>
import BaseLayout from "../Layouts/BaseLayout.vue";
import {usePage} from "@inertiajs/vue3";

const id = usePage().props?.id;
console.log('id: ', id);
</script>
