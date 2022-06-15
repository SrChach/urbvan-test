<script setup>
import EcosystemIcon from '@/components/icons/IconEcosystem.vue';
import axios from '../requests/custom-axios';

defineProps({
  employee: {
    type: Object,
    required: true,
    default: () => ({}),
  }
})

const emit = defineEmits(['deleted-employee', 'select-employee']);

function deletedEmployee() {
  emit('deleted-employee');
}

function selectEmployee(employeeId) {
  emit('select-employee', employeeId);
}

async function deleteEmployee(employeeId) {
  let { status } = await axios.delete(`/employees/${employeeId}`);

  if (status == 200) deletedEmployee();
}
</script>

<template>
  <div class="item">
    <i>
      <EcosystemIcon />
    </i>
    <div class="details">
      <h3>
        Employee Number: {{ employee.id }}
      </h3>

      <b>{{ employee.name }} {{ employee.last_name }}</b> is a good employee from the Urbvan company <br>

      <button @click="deleteEmployee(employee.id)">delete</button>
      <button @click="selectEmployee(employee.id)">Update</button>
    </div>
  </div>
</template>

<style scoped>
.item {
  margin-top: 2rem;
  display: flex;
}

.details {
  flex: 1;
  margin-left: 1rem;
}

i {
  display: flex;
  place-items: center;
  place-content: center;
  width: 32px;
  height: 32px;

  color: var(--color-text);
}

h3 {
  font-size: 1.2rem;
  font-weight: 500;
  margin-bottom: 0.4rem;
  color: var(--color-heading);
}

@media (min-width: 1024px) {
  .item {
    margin-top: 0;
    padding: 0.4rem 0 1rem calc(var(--section-gap) / 2);
  }

  i {
    top: calc(50% - 25px);
    left: -26px;
    position: absolute;
    border: 1px solid var(--color-border);
    background: var(--color-background);
    border-radius: 8px;
    width: 50px;
    height: 50px;
  }

  .item:before {
    content: ' ';
    border-left: 1px solid var(--color-border);
    position: absolute;
    left: 0;
    bottom: calc(50% + 25px);
    height: calc(50% - 25px);
  }

  .item:after {
    content: ' ';
    border-left: 1px solid var(--color-border);
    position: absolute;
    left: 0;
    top: calc(50% + 25px);
    height: calc(50% - 25px);
  }

  .item:first-of-type:before {
    display: none;
  }

  .item:last-of-type:after {
    display: none;
  }
}
</style>