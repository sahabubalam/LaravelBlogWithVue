<template>
    <div>
       <main>
                    <div class="container-fluid">                                             
                        <div class="card">
                            <div class="card-header">                           
                            <h3 class="card-title">Post-List</h3>
                             <div class="text-right">
                                <button class="btn btn-primary">
                                 <router-link to="/add-post" style="color:white;text-decoration:none">Add Post</router-link>
                                </button>
                            </div>
                           
                        </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>User</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                          <tr v-for="(post,index) in allpost">
                                                <td>{{index+1}}</td>
                                                <td>{{post.user.name}}</td>
                                                <td>{{post.category.category_name}}</td>
                                                <td>{{post.title}}</td>
                                                <td>{{post.description | shortlenght(30,"....")}}</td>
                                                <td><img :src="PostImage(post.image)" style="width:80px"></td>
                                                <td>
                                                    <router-link :to="`/edit-post/${post.id}`" class="btn btn-sm btn-info">Edit</router-link>
                                                    <a class="btn btn-sm btn-danger" @click.prevent="deletePost(post.id)" id="delete">Delete</a>
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
         this.$store.dispatch('getallPost')
     },
     computed:
     {
         allpost()
         {
             return this.$store.getters.getAllPost
         }
     },
     methods:
     {
         PostImage(img)
         {
             return "uploadimage/"+img;
         },
         
        deletePost(id)
        {
            axios.get('/delete/'+id)
            this.$store.dispatch('getallPost')
            .then(()=>{
                 Toast.fire({
                    icon: 'success',
                    title: 'Post deleted successfully'
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