<template>
    <span>
         <section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span4">
            <div class="inner-heading">
              <h2>Post right sidebar</h2>
            </div>
          </div>
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
              <li class="active">Blog post right sidebar</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{singlepost.title}}</a></h3>
                    </div>
                    <img :src="`uploadimage/${singlepost.image}`" alt="" />
                  </div>
                  <p>
                   {{singlepost.description}}
                  </p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li><i class="icon-user"></i><a href="#"> {{singlepost.user.name}}</a></li>
                      <li><i class="icon-folder-open"></i><a href="#"> {{singlepost.category.category_name}}</a></li>
                   
                    </ul>
                  </div>
                </div>
              </div>
            </article>
           </div>

        <BlogSidebar/>

        </div>
      </div>
    </section>
    </span>
</template>
<script>
import BlogSidebar from "./BlogSidebar.vue"
    export default{
        name:"New",
        components:
        {
            BlogSidebar
        },
        computed:
        {
            singlepost()
            {
                return this.$store.getters.singlepost
            }
        },
        methods:
        {
          singlePost()
          {
            this.$store.dispatch('getpostById',this.$route.params.id)
          }
        },
        mounted()
        {
            this.singlePost();
        },
        
        watch:
        {
          $route(to,from)
          {
            this.singlePost();
          }
        }
    }
</script>  
<style scoped>
 </style>  