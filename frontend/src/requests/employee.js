import axios from "./custom-axios";

async function getEmployees() {
  const employees = await axios.get('/employees');

  return employees.data;
};

async function createEmployee(name, last_name) {
  const { status } = await axios
    .post(`/employees`, { name, last_name });

  return status;
};

async function updateEmployee(id, name, last_name) {
  const { status } = await axios
    .put(`/employees/${id}`, { name, last_name });

  return status;
};

export { getEmployees, createEmployee, updateEmployee };
