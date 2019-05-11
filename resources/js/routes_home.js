
import VueRouter from 'vue-router'

import Home from './components/Home'
import Marketplace from './components/Marketplace'
import Item from './components/Item'


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
        }
    ]
})

export default router;