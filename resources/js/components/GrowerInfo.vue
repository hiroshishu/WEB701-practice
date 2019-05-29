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

        <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" @click="refresh">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Information Updated!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="refresh">Close</button>
                    </div>
                </div>
            </div>
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
            evt.preventDefault();

            if(!this.contactPhone) {
                this.errors.push('Phone field is required.')
            }else if(this.contactPhone.length > 100){
                this.errors.push('The length of Phone field must less than 100 letters.')
            }

            if(!this.contactAddress) {
                this.errors.push('Address field is required.')
            }else if(this.contactAddress.length > 100){
                this.errors.push('The length of Address field must less than 100 letters.')
            }

            if(!this.intro) {
                this.errors.push('Introduction field is required.')
            }else if(this.intro.length > 250){
                this.errors.push('The length of Introduction field must less than 250 letters.')
            }

            if(!this.errors.length) {
                this.submitClick = true;
                this.$http.post('updateInfo', {
                    phone:      this.contactPhone,
                    address:    this.contactAddress,
                    intro:      this.intro,
                    is_grower:  1
                }).then(()=>{
                    $('#myModal').modal({
                        show: true,
                        backdrop: 'static'
                    });
                    this.submitClick = false
                }, ()=>{
                    this.submitClick = false;
                }).catch(e=>{
                    console.log(e);
                })
            }

        },
        refresh() {
            setTimeout(()=>{location.reload()}, 300);
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
