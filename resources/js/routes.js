/*
 |-------------------------------------------------------------------------------
 | routes.js
 |-------------------------------------------------------------------------------
 | Contains all of the routes for the application
 */

/*
 Imports Vue and VueRouter to extend with the routes.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use( VueRouter );

export default new VueRouter({

    mode: 'history',

    routes: [
        {
            path: '/',
            name: 'layout',
            component: Vue.component('Layout', require('./layouts/Admin.vue').default),
            children: [
                {
                    path: '/',
                    name: 'all-tasks',
                    component: Vue.component('Layout', require('./pages/tasks/Index.vue').default),
                },
                {
                    path: 'view-task/:id',
                    name: 'view-task',
                    component: Vue.component('Layout', require('./pages/tasks/ViewTask.vue').default)
                },
                {
                    path: 'add-task',
                    name: 'add-task',
                    component: Vue.component('AddTasks', require('./pages/tasks/AddTask.vue').default),
                },
                {
                    path: 'edit-task/:id',
                    name: 'edit-task',
                    component: Vue.component('EditTask', require('./pages/tasks/EditTask.vue').default),
                },
            ]
        }
    ]
});
