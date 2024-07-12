<template>
    <div>
      <h1>API Keys</h1>
      <form @submit.prevent="createKey">
        <input v-model="form.name" type="text" placeholder="Name">
        <button type="submit">Create</button>
      </form>
      <ul>
        <li v-for="key in apiKeys" :key="key.id">
          {{ key.name }} ({{ key.key }})
          <button @click="deleteKey(key.id)">Delete</button>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useForm } from '@inertiajs/vue3';
  
  export default {
    props: {
      apiKeys: Array,
    },
    setup() {
      const form = useForm({
        name: '',
      });
  
      function createKey() {
        form.post(route('api-keys.store'));
      }
  
      function deleteKey(id) {
        if (confirm('Are you sure?')) {
          this.$inertia.delete(route('api-keys.destroy', id));
        }
      }
  
      return { form, createKey, deleteKey };
    },
  };
  </script>
  