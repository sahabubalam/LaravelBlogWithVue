<template>
    <div>
   <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Add New Post</h3></div>
                            <div class="card-body">
                                <form role="form" enctype="multipart/form-data" @submit.prevent="AddNewPost()">
                                    <div class="form-group">
                                        <label class="small mb-1" for="categoryId">Add Title</label>
                                        <input class="form-control py-3" id="postId" type="text" placeholder="Title" :class="{ 'is-invalid': form.errors.has('title') }" v-model="form.title" name="title" />
                                        <has-error :form="form" field="title"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label class="small mb-1" for="descriptionId">Add Description</label>
                                        <textarea class="form-control py-3" id="descriptionId" type="text" placeholder="Description" :class="{ 'is-invalid': form.errors.has('description') }" v-model="form.description" name="description" />
                                        </textarea>
                                        <has-error :form="form" field="description"></has-error>
                                    </div>
                                     <div class="form-group">
                                        <label>Select Category</label>
                                            <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id" name="cat_id">
                                                <option disabled value="">Select One</option>
                                                <option :value="category.id" v-for="category in getallCategory">option {{category.category_name}}</option>
                                                
                                            </select>
                                        
                                        <has-error :form="form" field="cat_id"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Add Image</label>
                                           <input @change="changeImage($event)" type="file" class="form-control" :class="{ 'is-invalid': form.errors.has('image') }" name="image">
                                            <img :src="form.image" style="width:80px">
                                        <has-error :form="form" field="image"></has-error>
                                    </div>
                                  
                                   
                                    <div class="form-group mt-4 mb-0">
                                     <button class="btn btn-primary btn-block" type="submit">Submit</button>
                                    </div>
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
                form: new Form({
                    title:'',
                    description:'',
                    cat_id:'',
                    image:'',
                       
                })
            }
        },
        mounted()
        {
             this.$store.dispatch("allcategory")
        },
        computed:
        {
         getallCategory()
           {
             return this.$store.getters.getCategory
           }
        },
        methods:
        {
            changeImage(event){
                let file = event.target.files[0];

                 if(file.size>1048576){
                     swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.image = event.target.result
                         console.log(event.target.result)
                     };
                     reader.readAsDataURL(file);
                 }
            },
            AddNewPost()
            {
               this.form.post('/savepost')
               .then(()=>{
                   this.$router.push('/post-list')
                    Toast.fire({
                    icon: 'success',
                    title: 'Post inserted successfully'
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