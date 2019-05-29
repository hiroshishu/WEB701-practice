<template>
    <dashboard-layout>
        <h3>Auctions</h3>
        <ul class="nav nav-tabs my-3">
            <li class="nav-item">
                <a class="nav-link" :class="{'active': !hasExpired}" href="javascript:;" @click="fetchItems(1,0)">Live Auctions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" :class="{'active': hasExpired}" href="javascript:;" @click="fetchItems(1,1)">Expired Auctions</a>
            </li>
        </ul>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="20%">Title</th>
                    <th scope="col">Creation Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Starting/Current Price</th>
                    <th scope="col">Current Bidder</th>
                    <th v-if="!hasExpired"></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in itemList.data" v-bind:key="item.id">
                    <td scope="row"><a :href="'./#/item/'+item.id">{{item.title}}</a></td>
                    <td>{{item.created_at|dateOffset}}</td>
                    <td>{{item.end_time|dateOffset}}</td>
                    <td>{{'$'+item.price + ' / $'+item.currentBid}}</td>
                    <td>{{item.highBidder}}</td>
                    <td v-if="!hasExpired">
                        <a href="javascript:;" @click="endAuction(item.id)">End</a>
                    </td>
                </tr>
            </tbody>
        </table>

        <Pagination :item-list="itemList" v-if="itemList.last_page>1"></Pagination>
    </dashboard-layout>
</template>

<script>

import dashboardLayout from './DashboardLayout';
import Pagination from './Pagination.vue';

export default {

    data() {
        return {
            hasExpired: 0,
            itemList: [],
            currPage: this.$route.query.page
        }
    },

    components: {
        dashboardLayout, Pagination
    },

    filters: {
        
    },

    watch: {
        $route(nVal){
            this.currPage = nVal.query.page
            this.fetchItems(this.currPage, this.currCat)
            $("html, body").stop().animate({scrollTop: 0});
        }
    },

    created() {
        this.fetchItems(this.currPage)
    },

    methods: {
        fetchItems(page=1, hasExpired=0){
            this.hasExpired = hasExpired;
            this.$http.get('items?page=' + page + '&user_id='+ USER_ID + '&hasExpired='+ hasExpired)
                .then(res => {
                    this.itemList = res.data
                })
        },

        endAuction(id){
            this.$http.post('endAuction/'+id)
                .then(res => {
                    location.reload();
                })
        }
    }
}
</script>
