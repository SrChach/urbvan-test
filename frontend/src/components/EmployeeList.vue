<script setup>
  import EmployeeData from '@/components/EmployeeData.vue'
</script>

<script>
export default {
  data() {
    return {
      employees: [],
    };
  },
  mounted() {
    this.getEmployees();
  },
  methods: {
    async getEmployees() {
      const response = await fetch('http://localhost:8000/v1/employees');
      const employees = await response.json();
      
      this.employees = employees;
      return employees;
    }
  }
}
</script>

<template>
  <div class="greetings">
    <h1 class="green">Employees Management</h1>
    <h3>
      <div v-for="(employee, index) in employees">
        <EmployeeData :employee="employee"/>
      </div>
    </h3>
  </div>
</template>

<style scoped>
h1 {
  font-weight: 500;
  font-size: 2.6rem;
  top: -10px;
}

h3 {
  font-size: 1.2rem;
}

.greetings h1,
.greetings h3 {
  text-align: center;
}

@media (min-width: 1024px) {
  .greetings h1,
  .greetings h3 {
    text-align: left;
  }
}
</style>
