<template>
    <dashboard-layout>
        <div class="container dashboard">
            <h3>Dashboard</h3>
            <dl class="my-5">
                <dt class="border-bottom mb-3"><h5><i class="fas fa-user-ninja mr-2"></i>As a Grower</h5></dt>
                <dd v-if="!userInfo.is_grower">You are not a grower. <router-link to="/info"> Want to become a grower?</router-link></dd>
                <dd v-else>You have 
                    <span v-if="!auction_num">no auction.</span>
                    <span v-if="auction_num==1"><a href="./#/auctions">1 auction</a>.</span>
                    <span v-if="auction_num>1"><a href="./#/auctions">{{auction_num}} auctions</a>.</span>
                </dd>
            </dl>
            <dl class="my-5">
                <dt class="border-bottom mb-3"><h5><i class="fas fa-shopping-bag mr-2"></i>As a Buyer</h5></dt>
                <dd>You have no order.</dd>
            </dl>
        </div>
        
    </dashboard-layout>
</template>

<script>

import dashboardLayout from './DashboardLayout';

export default {

    data() {
        return {
            userInfo: USER_INFO,
            auction_num: 0
        }
    },

    components: {
        dashboardLayout
    },

    created() {
        this.$http.get('items?page=1&user_id='+ USER_ID)
            .then(res => {
                this.auction_num = res.data.total
            })
    }
}
</script>
