<template>
    <MusicLayout/>
        <div class="flex-col p-4 mt-[-50px]">
            <h1 class="text-3xl font-bold my-6">Api Keys</h1>
            <div class="p-4 flex flex-col gap-4">
            <form @submit.prevent="createKey">
                <input v-model="form.name" type="text" placeholder="Nom de la clef" class="w-full rounded-md my-2">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded w-full mb-2" type="submit">Créer</button>
            </form>
            <table class="table-auto w-full">
                <thead class="text-left">
                    <tr>
                    <th>Nom</th>
                    <th>Valeur</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="key in apiKeys" :key="key.id">
                    <td>{{ key.name }}</td>
                    <td>{{ key.key }}</td>
                    <td>
                        <Link @click="deleteKey(key.id)" class="bg-red-600 hover:bg-red-700 text-white font-bold rounded py-2 px-4"  as="button" method="delete">Supprimer</Link></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
  </template>
  
  <script>
  import MusicLayout from '@/Layouts/MusicLayout.vue';
import { useForm } from '@inertiajs/vue3';
  
  export default {
    name: 'Index',
    components: {
        MusicLayout
    },
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
          form.delete(route('api-keys.destroy', id));
        
      }
  
      return { form, createKey, deleteKey };
    },
  };
  </script>
  