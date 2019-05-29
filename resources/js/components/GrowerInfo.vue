<template>
    <dashboard-layout>
        <div class="grower-info">
            <h3 class="mb-4">Grower Information</h3>
            <form @submit="checkForm">
                <div class="form-group row bg-light p-3 my-1">
                    <label for="inputPhone" class="col-sm-2 col-form-label border-left border-info">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPhone" placeholder="eg. 021-392-2345" v-model="contactPhone" maxlength="100">
                    </div>
                </div>
                <div class="form-group row bg-light p-3 my-1">
                    <label for="inputAddress" class="col-sm-2 col-form-label border-left border-info">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputAddress" placeholder="eg. 19608 Alejandra Via Suite 861 Port Rogelioview " v-model="contactAddress" maxlength="100">
                    </div>
                </div>
                <div class="form-group row bg-light p-3 my-1">
                    <label for="inputDesc" class="col-sm-2 col-form-label border-left border-info">Introduction</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="inputDesc" v-model="intro" maxlength="250"></textarea>
                    </div>
                </div>

                <div class="error-msg bg-danger text-white pl-5 my-3 py-2 rounded" v-if="errors.length">
                    <li v-for="err in errors" v-bind:key="err" v-text="err" class="py-1"></li>
                </div>

                <div class="text-right my-3">
                    <button type="submit" class="btn btn-primary" v-if="!submitClick">Submit</button>
                    <button class="btn btn-primary" disabled v-else>Wait...</button>
                </div>
            </form>
        </div>

    </dashboard-layout>
</template>

<script>

import dashboardLayout from './DashboardLayout';

export default {

    data() {
        return {
            errors: [],
            contactPhone: USER_INFO.is_grower ? USER_INFO.phone : '',
            contactAddress: USER_INFO.is_grower ? USER_INFO.address : '',
            intro: USER_INFO.is_grower ? USER_INFO.intro : '',
            submitClick: 0
        }
    },

    components: {
        dashboardLayout
    },

    methods: {
        checkForm(evt){
            this.errors = [];
            this.submitClick = true;
            evt.preventDefault();

            if(!this.contactPhone) {
                this.errors.push('Phone field is required.')
            }

            if(!this.contactAddress) {
                this.errors.push('Address field is required.')
            }

            if(!this.intro) {
                this.errors.push('Introduction field is required.')
            }

            if(!this.errors.length) {
                this.$http.post('updateInfo', {
                    phone:      this.contactPhone,
                    address:    this.contactAddress,
                    intro:      this.intro,
                    is_grower:  1
                }).then(()=>{
                    location.reload();
                    this.submitClick = false;
                }, ()=>{
                    this.submitClick = false;
                }).catch(e=>{
                    console.log(e);
                })
            }

        }
    }
}
</script>


<style lang="scss">
    .grower-info {
        .form-group label {
            border-left-width: 4px !important;
        }
    }
</style>
