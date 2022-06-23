<script setup>
import { ref } from 'vue'

const emit = defineEmits(['delete'])
const confirmationDialog = ref(null)

const doDelete = () => {
  confirmationDialog.value?.showModal()
}

const closed = () => {
  if (confirmationDialog.value.returnValue !== 'confirm') {
    return
  }

  emit('delete')
}
</script>

<template>
  <button
    type="button"
    class="ml-2 hidden text-red-500 hover:text-red-800 group-hover:inline-block"
    @click="doDelete()"
  >
    <slot>Delete</slot>
  </button>
  <dialog
    ref="confirmationDialog"
    @keydown.enter="confirm"
    class="rounded-xl p-6 backdrop-blur-2xl backdrop:bg-gray-400/75"
    @close="closed"
  >
    <form method="dialog">
      <h1 class="text-lg font-bold">Are you sure?</h1>
      <p class="pr-12 text-gray-700">This action can not be undone.</p>
      <div class="mt-8 flex justify-end">
        <button
          class="rounded-full px-2 text-gray-600 hover:text-gray-900 focus:bg-gray-100 focus:outline-none"
          value="cancel"
        >
          Cancel
        </button>
        <button
          class="rounded-full px-2 font-medium text-red-500 hover:text-red-700 focus:bg-red-50 focus:outline-none"
          autofocus
          ref="confirmButton"
          value="confirm"
        >
          Confirm
        </button>
      </div>
    </form>
  </dialog>
</template>
