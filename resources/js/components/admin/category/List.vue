<template>
    <div>
       <main>
                    <div class="container-fluid">                       
                        
                        <div class="card">
                            <div class="card-header">
                            
                            <h3 class="card-title">Category-List</h3>
                             <div class="text-right">
                                <button class="btn btn-primary">
                                
                                <router-link to="/add-category" style="color:white;text-decoration:none">Add Category</router-link>
                                </button>
                            </div>
                           
                        </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Category Name</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                          <tr v-for="(category,index) in getallCategory" :key="category.id">
                                                <td>{{index}}</td>
                                                <td>{{category.category_name}}</td>
                                                <td>{{category.created_at | timeformat}}</td>
                                                <td>
                                                    <router-link :to="`/edit-category/${category.id}`" class="btn btn-sm btn-info">Edit</router-link>
                                                    <a @click.prevent="deleteCategory(category.id)"  class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                </td>                        
                                         </tr>                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
       
    </div>
</template>
<script>
export default{
    name:"List",
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
        deleteCategory(id)
        {
            axios.get('/category/'+id)
            .then(()=>{
                 this.$store.dispatch("allcategory")
                 Toast.fire({
                    icon: 'success',
                    title: 'Category deleted successfully'
                    })
            })
        }
    }
}
   
</script>
 <style scoped>
 </style>