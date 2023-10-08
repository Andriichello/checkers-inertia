<template>
  <div class="navbar bg-base-100 px-2">
    <div class="flex-1">
      <a class="btn btn-ghost normal-case text-xl">Checkers</a>
    </div>
    <div class="flex-none" v-if="user">
      <button class="btn btn-square btn-ghost" @click="onOpenDrawer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </button>
    </div>
  </div>
</template>

<script setup>
import {computed} from "vue";
import {usePage} from "@inertiajs/vue3";
import {defineEmits} from 'vue';

const emit = defineEmits(['open-drawer']);
const user = computed(() => usePage().props.user);
function onOpenDrawer() {
  emit('open-drawer');
}
</script>

<style scoped>

</style>
