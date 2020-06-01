<template>
    <div>
   <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                            <div class="card-body">
                                <form role="form" @click.prevent="addCategory()">
                                    <div class="form-group">
                                        <label class="small mb-1" for="categoryId">Add Category</label>
                                        <input class="form-control py-3" id="categoryId" type="text" placeholder="Category" :class="{ 'is-invalid': form.errors.has('category_name') }" v-model="form.category_name" name="category_name" />
                                        <has-error :form="form" field="category_name"></has-error>
                                    </div>
                                  
                                   
                                    <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="login.html">Submit</a></div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>     
    </div>
</template>
<script>
export default{
    name:"New",
    data()
    {
        return{
            form:new Form({
                category_name:'',
            })
        }

    },
    methods:{
        addCategory(){
            this.form.post('/add-category')
            .then((response)=>{
                this.$router.push('/category-list')
                Toast.fire({
                    icon: 'success',
                    title: 'Category inserted successfully'
                    })


            })
            .catch(()=>{

            })
        }
    }
}
   
</script>
 <style scoped>
 </style>