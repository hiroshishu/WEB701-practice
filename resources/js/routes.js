
import VueRouter from 'vue-router'

import Home from './components/Home'
import Marketplace from './components/Marketplace'
import Item from './components/Item'

import Dashboard from './components/Dashboard'
import AddNew from './components/AddNew'

const router = new VueRouter({
    // mode:'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/marketplace',
            name: 'marketplace',
            component: Marketplace
        },
        {
            path: '/item/:id',
            name: 'item',
            component: Item
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            beforeEnter(to, from, next){
                API_TOKEN ? next() : (location.href="/login");
                
            }
        },
        {
            path: '/addnew',
            name: 'addnew',
            component: AddNew,
            beforeEnter(to, from, next){
                API_TOKEN ? next() : (location.href="/login");
            }
        }
    ]
})

export default router;