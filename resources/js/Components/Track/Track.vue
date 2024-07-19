<template>
  <div class="rounded shadow-lg p-4 transition hover:bg-gray-100 flex justify-between" :class="{ 'border border-blue-500': active }">
    <div class="flex items-center">
      <div class="w-[75px] h-[75px]">
        <img :src="`/storage/app/public/${track.image}`" />
      </div>
      <div class="px-6 py-4 ">
        <div class="font-bold text-xl mb-2">{{ track.title }}</div>
        <small class="text-gray-700 text-base">{{ track.artist }}</small>
      </div>
    </div>

    <div v-if="$page.props.isAdmin" class="w-full flex flex-col gap-2 justify-center w-[20%]">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded w-full" @click="handleClick">
        Lire
      </button>
      <Link :href="route('tracks.edit', { track: track })"
        class="bg-lime-600 hover:bg-lime-700 text-white text-center font-bold rounded py-2 px-4">
      Modifier
      </Link>
      <Link :href="route('tracks.destroy', { track: track })"
        class="bg-red-600 hover:bg-red-700 text-white font-bold text-center rounded py-2 px-4">
      Supprimer
      </Link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Track',
  emits: ['played'],
  props: {
    active: {
      type: Boolean,
      default: false,
    },
    track: Object,
  },
  methods: {
    handleClick() {
      this.$emit('played', this.track);
    }
  }
}
</script>
