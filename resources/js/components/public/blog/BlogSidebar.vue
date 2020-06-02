<template>
    <span id="sidebar">
          <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input placeholder="Type something" type="text" class="input-medium search-query">
                  <button type="submit" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                  <li v-for="category in allcategories"><i class="icon-angle-right"></i><a href="#">{{category.category_name}}</a><span> (20)</span></li>
                 
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  <li v-for="(post,index) in blogpost">
                    <img :src="`uploadimage/${post.image}`" class="pull-left" alt="" style="height:90px;width:75px" />
                    <h6><a href="#">{{post.title}}</a></h6>
                    <p>
                     {{post.description |shortlenght(70,"......")}}
                    </p>
                  </li>
                 
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                  <li><a href="#">Web design</a></li>
                  <li><a href="#">Trends</a></li>
                  <li><a href="#">Technology</a></li>
                  <li><a href="#">Internet</a></li>
                  <li><a href="#">Tutorial</a></li>
                  <li><a href="#">Development</a></li>
                </ul>
              </div>
            </aside>
          </div>
    </span>
</template>
<script>
    export default{
        name:"New",
        computed:
        {
           allcategories()
           {
               return this.$store.getters.allcategories
           },
            blogpost()
            {
              return this.$store.getters.getblogPost
            }
        },
        mounted()
        {
             this.$store.dispatch("allcategories")
        }
    }
</script>  
<style scoped>
 </style>      