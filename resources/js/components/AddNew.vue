<template>
    <dashboard-layout>
        <div class="add-new">
            <h3 class="mb-4">Add Auction</h3>
            <form @submit="checkForm">
                <div class="form-group row bg-light p-3 my-1">
                    <label for="selectCat" class="col-sm-2 col-form-label border-left border-info">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="selectCat" v-model="itemCat">
                            <option v-for="cat in categories" v-bind:key="cat.id" :value="cat.id" v-text="cat.name"></option>
                        </select>
                    </div>
                </div>

                <div class="form-group row bg-light p-3 my-1">
                    <label for="inputPassword" class="col-sm-2 col-form-label border-left border-info">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword" placeholder="" v-model="itemTitle" maxlength="100">
                    </div>
                </div>

                <div class="form-group row bg-light p-3 my-1">
                    <label for="inputQuantiti" class="col-sm-2 col-form-label border-left border-info">Quantiti (KG)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputQuantiti" placeholder="eg. 300" v-model="itemQuantiti" maxlength="10">
                    </div>
                </div>

                <div class="form-group row bg-light p-3 my-1">
                    <label for="inputDesc" class="col-sm-2 col-form-label border-left border-info">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="inputDesc" v-model="itemDesc" maxlength="250"></textarea>
                    </div>
                </div>

                <!-- Price Calculator -->
                <div class="form-group bg-light p-3 my-1 quality">
                    <div class="row">
                        <p class="px-3"><label class="col col-form-label border-left border-info">Price Calculator</label></p>
                    </div>
                    <div class="row mb-2">
                        <label for="rangeSize" class="col-sm-2 col-form-label pl-5">Size</label>
                        <div class="col-sm-9">
                            <input type="range" class="form-control" max=5 min=1 v-model="itemSize">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control text-center" id="rangeSize"  v-model="itemSize" disabled>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label for="rangeColor" class="col-sm-2 col-form-label pl-5">Color</label>
                        <div class="col-sm-9">
                            <input type="range" class="form-control" max=5 min=1 v-model="itemColor">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control text-center" id="rangeColor"  v-model="itemColor" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <label for="rangeFlavor" class="col-sm-2 col-form-label pl-5">Flavor</label>
                        <div class="col-sm-9">
                            <input type="range" class="form-control" max=5 min=1 v-model="itemFlavor">
                        </div>
                        <div class="col-sm-1">
                            <input type="text" class="form-control text-center" id="rangeFlavor"  v-model="itemFlavor" disabled>
                        </div>
                    </div>
                    <div class="text-right mt-4">
                        <h2 class="inline-block">
                            <small style="font-size:1rem" class="mr-4">Approximate Price</small>   $<span>364</span></h2>
                    </div>
                </div>
                <!-- Price Calculator -->

                <div class="form-group row bg-light p-3 my-1">
                    <label for="inputPrice" class="col-sm-2 col-form-label border-left border-info">Start Price ($)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" v-model="itemPrice"  maxlength="50">
                    </div>
                </div>

                <div class="form-group row bg-light p-3 my-1">
                    <label for="selectDuration" class="col-sm-2 col-form-label border-left border-info">Duration (Days)</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="selectDuration" v-model="itemDur">
                            <option v-for="i in 7" v-bind:key="i" :value="i" v-text="i"></option>
                        </select>
                    </div>
                </div>

                <div class="form-group bg-light p-3 my-1 quality">
                    <div class="row">
                        <p class="px-3"><label class="col-sm-2 col-form-label border-left border-info">Contact</label></p>
                    </div>
                    <div class="row mb-2">
                        <label for="inputPhone" class="col-sm-2 col-form-label pl-5">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPhone" placeholder="eg. 021-392-2345" v-model="contactPhone" maxlength="100">
                        </div>
                    </div>
                    <div class="row">
                        <label for="inputAddress" class="col-sm-2 col-form-label pl-5">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputAddress" placeholder="eg. 19608 Alejandra Via Suite 861 Port Rogelioview " v-model="contactAddress" maxlength="100">
                        </div>
                    </div>

                    <div class="error-msg bg-danger text-white pl-5 my-3 py-2 rounded" v-if="errors.length">
                        <li v-for="err in errors" v-bind:key="err" v-text="err" class="py-1"></li>
                    </div>

                    <div class="text-right my-3">
                        <button type="submit" class="btn btn-primary" v-if="!submitClick">Submit</button>
                        <button class="btn btn-primary" disabled v-else>Wait...</button>
                    </div>

                </div>

            </form>

        </div>
    </dashboard-layout>
</template>

<script>

import dashboardLayout from './DashboardLayout';

export default {

    data: function(){
        return {
            categories:[],
            errors: [],
            submitClick: false,

            itemCat: 3, 
            itemTitle: 'Corrupti illo sunt optio occaecati dolor',
            itemDesc: 'Rerum ad voluptas dolor non sunt exercitationem. Placeat nemo molestiae dolores. Voluptas consequatur eaque sunt nihil placeat. Et quis autem rerum autem eius non similique nisi.',
            itemPrice: 2348,
            itemQuantiti: 251,
            itemDur: 1,
            itemSize: 3,
            itemColor: 3,
            itemFlavor: 3,

            contactPhone: '367-230-1710',
            contactAddress:'70104 McDermott Falls Apt. 902 Purdyshire, ND 41267'
        }
    },
    created() {
        this.fetchCategories() 
    },
    methods: {
        fetchCategories(){
            return this.$http.get('/api/categories')
                .then( res => {
                    this.categories = res.data
                })
        },
        checkForm(e){
            this.errors = [];
            this.submitClick = true;
            e.preventDefault();

            if(!this.itemTitle) {
                this.errors.push('Title field is required.')
            }else if(this.itemTitle.length > 100){
                this.errors.push('The length of title field must less than 100 letters.')
            }

            if(!this.itemDesc) {
                this.errors.push('Description field is required.')
            }else if(this.itemDesc.length > 250){
                this.errors.push('The length of description field must less than 250 letters.')
            }

            if(!this.itemQuantiti) {
                this.errors.push('Quantiti field is required.')
            }else if( isNaN(+this.itemQuantiti) ){
                this.errors.push('The value of quantiti field must be a number.')
            }

            if(!this.itemPrice) {
                this.errors.push('Price field is required.')
            }else if( isNaN(+this.itemPrice) ){
                this.errors.push('The value of price field must be a number.')
            }

            if(!this.contactPhone) {
                this.errors.push('Phone field is required.')
            }

            if(!this.contactAddress) {
                this.errors.push('Address field is required.')
            }

            if(!this.errors.length) {
                this.$http.post('/api/items', {
                    user_id:        USER_ID,
                    category_id:    this.itemCat, 
                    title:          this.itemTitle,
                    description:    this.itemDesc,
                    price:          this.itemPrice,
                    quantiti:       this.itemQuantiti,
                    end_time:       this.itemDur,

                    size:           this.itemSize,
                    color:          this.itemColor,
                    flavor:         this.itemFlavor,

                    phone:          this.contactPhone,
                    address:        this.contactAddress
                }).then(()=>{
                    this.$router.push('/marketplace');
                    this.submitClick = false;
                }, ()=>{
                    this.submitClick = false;
                })
            }
        }
    },

    components: {
        dashboardLayout
    }
}
</script>

<style lang="scss">
    .add-new {
        .form-group label {
            border-left-width: 4px !important;
        }
        .quality {
            margin-left: -15px;
            margin-right: -15px;
        }
    }
</style>
