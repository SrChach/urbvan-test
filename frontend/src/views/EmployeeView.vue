<script setup>
  import { ref, onMounted } from 'vue';

  const props = defineProps({
    id: {
      type: Number,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
    last_name: {
      type: String,
      required: true,
    },
  })

  const employeeName = ref(props.name);
  const employeeLastName = ref(props.last_name);
</script>

<template>
  <div v-if="id" class="about">
    <div>
      <h1>Update Employee: {{ employeeName }}</h1>
    </div>

    <div>
      <p>Name is: {{ employeeName }}</p>
      <input v-model="employeeName" placeholder="edit me" maxlength="30" />
    </div>

    <div>
      <p>Name is: {{ employeeLastName }}</p>
      <input v-model="employeeLastName" placeholder="edit me" maxlength="30" />
    </div>
  </div>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    max-width: 50vw;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
  }
}
</style>
