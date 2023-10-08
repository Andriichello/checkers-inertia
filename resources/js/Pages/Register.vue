<template>
  <BaseLayout>
    <div class="flex flex-col justify-center items-center gap-3 mt-4">
      <h3 class="text-3xl font-bold underline">Register page</h3>
      <p class="max-w-sm text-xl font-light px-3">
        This is a register page of the Checkers app, written using
        Laravel and Vue.js with Inertia.js
      </p>

      <div @submit.prevent="onRegister" class="w-full flex justify-center items-center mt-2">
        <form class="form-control w-full max-w-xs">
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Name</span>
            </label>
            <input v-model="form.name" name="name" type="name" required placeholder="Name..." class="input input-bordered w-full max-w-xs" :class="{ 'input-error' : form.errors?.name }"/>
            <label class="label flex-col items-start" v-if="form.errors?.name">
              <span class="label-text-alt text-error text-sm">
                {{ form.errors?.name }}
              </span>
            </label>
          </div>
          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Email</span>
            </label>
            <input v-model="form.email" name="email" type="email" required placeholder="Email..." class="input input-bordered w-full max-w-xs" :class="{ 'input-error' : form.errors?.email }"/>
            <label class="label flex-col items-start" v-if="form.errors?.email">
              <span class="label-text-alt text-error text-sm">
                {{ form.errors?.email }}
              </span>
            </label>
          </div>

          <div class="form-control w-full max-w-xs">
            <label class="label">
              <span class="label-text">Password</span>
            </label>
            <input v-model="form.password" name="password" type="password" required placeholder="Password..." class="input input-bordered w-full max-w-xs" :class="{ 'input-error' : form.errors?.password }"/>
            <label class="label flex-col items-start" v-if="form.errors?.password">
              <span class="label-text-alt text-error text-sm">
                {{ form.errors?.password }}
              </span>
            </label>
          </div>

          <button class="btn btn-primary max-w-xs mt-5">
            Register
          </button>

          <div class="flex justify-end items-center p-2 mt-2">
            <Link href="/login" class="link">
              Already have an account?
            </Link>
          </div>
        </form>
      </div>

    </div>
  </BaseLayout>
</template>

<script setup>
import {Link, useForm} from "@inertiajs/vue3";
import BaseLayout from "../Layouts/BaseLayout.vue";

const form = useForm({
  name: null,
  email: null,
  password: null,
});

function onRegister() {
  form.post('/register');
}
</script>
