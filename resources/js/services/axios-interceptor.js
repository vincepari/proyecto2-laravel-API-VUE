import axios from "axios";

const urlbase = "http://172.0.0.1:8000/api"

const axiosInstance = axios.create({
    baseURL: urlbase,
    timeout: 30000
});

// interceptar  error  (401, 403)

axiosInstance.interceptors.response.use(
    (response) => {
        return response;
    },
    (error) => {
        // procesamos error 401. 4.03

        return Promise.reject(error);
    }
);

export default axiosInstance;
