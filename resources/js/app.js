import './bootstrap';

import Alpine from 'alpinejs';
// toastr
import toastr from 'toastr';

import 'toastr/build/toastr.min.css';

window.toastr = toastr;

window.Alpine = Alpine;

Alpine.start();
