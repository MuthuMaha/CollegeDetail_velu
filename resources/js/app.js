
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import CompaniesIndex from './components/students/CompaniesIndex.vue';
import CompaniesCreate from './components/students/CompaniesCreate.vue';
import CompaniesEdit from './components/students/CompaniesEdit.vue';

import CompaniesIndex1 from './components/staffs/CompaniesIndex.vue';
import CompaniesCreate1 from './components/staffs/CompaniesCreate.vue';
import CompaniesEdit1 from './components/staffs/CompaniesEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            companiesIndex: CompaniesIndex,
            companiesIndex1: CompaniesIndex1
        }
    },
    {path: '/admin/students/create', component: CompaniesCreate, name: 'createCompany'},
    {path: '/admin/students/edit/:id', component: CompaniesEdit, name: 'editCompany'}, 
    {path: '/admin/staffs/create', component: CompaniesCreate1, name: 'createCompany1'},
    {path: '/admin/staffs/edit/:id', component: CompaniesEdit1, name: 'editCompany1'},
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
