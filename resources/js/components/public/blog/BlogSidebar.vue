<template>
    <span id="sidebar">
          <div class="span4">
            <aside class="right-sidebar">
              <div class="widget">
                <form class="form-search">
                  <input @keyup="RealSearch " placeholder="Type something" type="text" v-model="keyword"  class="input-medium search-query">
                  <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
                </form>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                  <li v-for="category in allcategories"><i class="icon-angle-right"></i><router-link :to="`/categories/${category.id}`">{{category.category_name}}</router-link><span> (20)</span></li>
                 
                </ul>
              </div>
              <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                  <li v-for="(post,index) in blogpost">
                    <img :src="`uploadimage/${post.image}`" class="pull-left" alt="" style="height:90px;width:75px" />
                    <h6><router-link :to="`/blog/${post.id}`">{{post.title}}</router-link></h6>
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
import _ from 'lodash'
    export default{
        name:"New",
        data()
        {
          return{
            keyword:''
          }
        },
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
             this.$store.dispatch("getblogPost")
             this.$store.dispatch("allcategories")
        },
        methods:
        {
          
          RealSearch:_.debounce(function(){
            this.$store.dispatch("searchpost",this.keyword)
          },1000)
        },
        watch:
        {
          $route(to,from)
          {
             this.RealSearch();
          }
          
        }
        
    }
</script>  
<style scoped>
 </style>      