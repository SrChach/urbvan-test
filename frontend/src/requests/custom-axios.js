import axios from 'axios';

const axiosConfig = {
    baseURL: 'http://localhost:8000/v1',
    timeout: 30000,
};

let axiosInstance = axios.create(axiosConfig);

export default axiosInstance;
