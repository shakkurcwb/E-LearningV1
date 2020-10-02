import axios from 'axios';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = window['Laravel'].csrfToken;
axios.defaults.headers.common['Authorization'] = "Bearer " + window['Laravel'].apiToken;

export default axios;