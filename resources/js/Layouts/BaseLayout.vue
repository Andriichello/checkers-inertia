<template>
  <main class="min-w-screen min-h-screen flex flex-col justify-start items-center bg-base-300">
    <div class="drawer drawer-end min-w-screen min-h-screen ">
      <input id="base-drawer" type="checkbox" class="drawer-toggle" />

      <div class="drawer-content">
        <Navbar @open-drawer="onOpenDrawer"/>

        <div class="py-3 px-2">
          <slot></slot>
        </div>
      </div>

      <div class="drawer-side">
        <label for="base-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 min-h-full bg-base-100 text-base-content">
          <li><span class="text-lg font-semibold">Home</span></li>
          <li><span class="text-lg font-semibold">Games</span></li>

          <li class="grow opacity-0"></li>

          <li @click="onLogout">
            <span class="text-lg font-semibold">Logout</span>
          </li>

          <li class="mt-4 justify-self-end" v-if="user?.name">
            <span class="text-lg font-semibold text-end">
              <span class="font-light">Logged in as: </span>
              {{ user?.name }}
            </span>
          </li>
        </ul>
      </div>
    </div>
  </main>
</template>

<script setup>
import {computed} from "vue";
import {usePage, useForm} from "@inertiajs/vue3";
import Navbar from "../Components/Navbar.vue";

const user = computed(() => usePage().props.user);
const form = useForm('logout', {});

function onOpenDrawer() {
  const drawer = document.getElementById('base-drawer');
  drawer.checked = !drawer.checked;
}

function onLogout() {
  form.post('/logout');
}
</script>
