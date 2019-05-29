
import VueRouter from 'vue-router'

import Home from './components/Home'
import Marketplace from './components/Marketplace'
import Berries from './components/Berries'
import Growers from './components/Growers'
import Item from './components/Item'

import Dashboard from './components/Dashboard'
import AddNew from './components/AddNew'
import Auctions from './components/Auctions'
import Orders from './components/Orders'
import Info from './components/GrowerInfo'

const router = new VueRouter({
    // mode:'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/berries',
            name: 'berries',
            component: Berries
        },
        {
            path: '/marketplace',
            name: 'marketplace',
            component: Marketplace
        },
        {
            path: '/growers',
            name: 'growers',
            component: Growers
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
        },
        {
            path: '/auctions',
            name: 'auctions',
            component: Auctions,
            beforeEnter(to, from, next){
                API_TOKEN ? next() : (location.href="/login");
            }
        },
        {
            path: '/orders',
            name: 'orders',
            component: Orders,
            beforeEnter(to, from, next){
                API_TOKEN ? next() : (location.href="/login");
            }
        },
        {
            path: '/info',
            name: 'info',
            component: Info,
            beforeEnter(to, from, next){
                API_TOKEN ? next() : (location.href="/login");
            }
        }
    ]
})

export default router;