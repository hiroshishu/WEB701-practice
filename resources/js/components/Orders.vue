<template>
    <dashboard-layout>
        <h3>Orders</h3>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                <th scope="col" width="20%">Product</th>
                <th scope="col">Closing Date</th>
                <th scope="col">Total Price</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                
                </tr>
            </tbody>
        </table>

       
    </dashboard-layout>
</template>

<script>

import dashboardLayout from './DashboardLayout';

export default {

    data() {
        return {
            image: 'https://i.imgur.com/HhqxVCW.jpg',
            name: 'Shut up and take my money!',
            description: 'Cats are the best dog!',
            currency: 'NZD',
            amount: 9999
        }
    },

    components: {
        dashboardLayout
    },

    methods: {
        async checkout () {
        // token - is the token object
        // args - is an object containing the billing and shipping address if enabled
        const { token, args } = await this.$refs.checkoutRef.open();
        },
    }
    
}
</script>
