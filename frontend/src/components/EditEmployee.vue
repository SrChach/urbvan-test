<script setup>
  import { onMounted, ref } from 'vue';

  import {
    updateEmployee as requestUpdateEmployee,
    createEmployee as requestCreateEmployee
  } from '../requests/employee';

  const props = defineProps({
    id: { type: Number },
    name: { type: String },
    last_name: { type: String },
  })

  const emit = defineEmits(['updated-employee', 'cancel']);

  let employeeName = ref(props.name);
  let employeeLastName = ref(props.last_name);

  onMounted(() => {
    setOriginalData();
  })

  function setOriginalData() {
    employeeName.value = props.name;
    employeeLastName.value = props.last_name;
  }

  async function createOrUpdateEmployee() {
    let status = 0;
    if (!props.id) {
      status = await requestCreateEmployee(employeeName.value, employeeLastName.value);
    } else {
      status = await requestUpdateEmployee(props.id, employeeName.value, employeeLastName.value);
    }

    if(status === 200) emit('updated-employee');
  }
</script>

<template>
  <header>
    <div class="wrapper">
      <div class="green">
        <h1 v-if="id">Update Employee: {{ props.name }}</h1>
        <h1 v-else>Create new Employee</h1>
      </div>

      <div>
        <p>Name: {{ props.name }}</p>
        <input v-model="employeeName" placeholder="edit me" maxlength="30" />
      </div>

      <div>
        <p>Last Name: {{ props.last_name }}</p>
        <input v-model="employeeLastName" placeholder="edit me" maxlength="30" />
      </div>

      <button @click="createOrUpdateEmployee">{{ id ? 'Update' : 'Create' }}</button>
      <button v-if="id" @click="setOriginalData">Restore</button>
      <button v-if="id" @click="emit('cancel')">Cancel</button>
    </div>
  </header>
</template>
