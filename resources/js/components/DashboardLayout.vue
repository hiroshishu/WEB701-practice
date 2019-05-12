<template>
    <div class="container dashboard-wrap">
        <div class="row my-4">
            <dl class="col-2 bg-light border border-grey p-4 h-50">
                <dd>
                    <router-link to="/dashboard">Dashboard</router-link>
                </dd>
                <dt class="border-bottom border-grey mt-4 mb-2"><h6>Growers</h6></dt>
                <dd>
                    <router-link to="/addnew">Add Auction</router-link>
                </dd>
                <dd>
                    <router-link to="/actions">Auctions</router-link>
                </dd>
                <dt class="border-bottom border-grey mb-2 mt-4"><h6>Buyers</h6></dt>
                <dd>
                    <router-link to="/orders">Orders</router-link>
                </dd>
            </dl>

            <div class="col main px-5">
                <slot></slot>
            </div>
        </div>
    </div>
</template>
