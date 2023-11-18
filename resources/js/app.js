import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
import jQuery from 'jquery';
import * as cropperjs from "cropperjs";
window.$ = jQuery;
window.Cp = cropperjs;
