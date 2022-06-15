<script setup>
import EditEmployee from '@/components/EditEmployee.vue';
import EmployeeData from '@/components/EmployeeData.vue';

import { getEmployees as requestEmployees } from './requests/employee';
</script>

<script>
export default {
  data() {
    return {
      employees: [],
      employeeToUpdate: null,
      isAddingEmployee: false
    };
  },
  mounted() {
    this.getEmployees();
  },
  methods: {
    async getEmployees() {
      this.employees = await requestEmployees();
      this.employeeToUpdate = null;
      this.isAddingEmployee = false;
    },
    selectEmployeeToUpdate(employeeId) {
      this.employeeToUpdate = this.employees.find(employee => employee.id === employeeId);
      this.isAddingEmployee = false;
    },
    showAddEmployeeForm() {
      this.employeeToUpdate = null;
      this.isAddingEmployee = true;
    }
  }
}
</script>

<template>
  <header>
    <div class="wrapper">
      <div class="greetings">
        <br><br><br><br><br>
        <h1 class="green">
          Employees Management
          <button @click="showAddEmployeeForm">Add</button>
        </h1>
        <div>
          <div v-for="(employee, index) in employees">
            <EmployeeData
              :employee="employee"
              @deleted-employee="getEmployees"
              @select-employee="selectEmployeeToUpdate"
            />
          </div>
        </div>
      </div>
    </div>
  </header>

  <header>
    <div v-if="employeeToUpdate">
      <EditEmployee
        :id="employeeToUpdate.id"
        :name="employeeToUpdate.name"
        :last_name="employeeToUpdate.last_name"
        @updated-employee="getEmployees"
        @cancel="employeeToUpdate = null"
      />
    </div>
    <div v-if="isAddingEmployee">
      <EditEmployee
        @updated-employee="getEmployees"
        @cancel="isAddingEmployee = false"
      />
    </div>
  </header>
</template>

<style>
@import '@/assets/base.css';

#app {
  max-width: 1280px;
  margin: 0 auto;
  padding: 2rem;

  font-weight: normal;
}

header {
  line-height: 1.5;
  max-height: 80vh;
  overflow-y: scroll;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

a,
.green {
  text-decoration: none;
  color: hsla(160, 100%, 37%, 1);
  transition: 0.4s;
}

@media (hover: hover) {
  a:hover {
    background-color: hsla(160, 100%, 37%, 0.2);
  }
}

nav {
  width: 100%;
  font-size: 12px;
  text-align: center;
  margin-top: 2rem;
}

nav a.router-link-exact-active {
  color: var(--color-text);
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline-block;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
}

nav a:first-of-type {
  border: 0;
}

@media (min-width: 1024px) {
  body {
    display: flex;
    place-items: center;
  }

  #app {
    display: grid;
    grid-template-columns: 1fr 1fr;
    padding: 0 2rem;
  }

  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  nav {
    text-align: left;
    margin-left: -1rem;
    font-size: 1rem;

    padding: 1rem 0;
    margin-top: 1rem;
  }
}
</style>
