import AdminHome from './components/admin/AdminHome.vue'
import CategoryList from './components/admin/category/List.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/edit.vue'

//post
import PostList from './components/admin/post/List.vue'
import AddPost from './components/admin/post/New.vue'
import EditPost from './components/admin/post/Edit.vue'

//frontend

import PublicHome from './components/public/PublicHome.vue'
import Blogpost from './components/public/blog/BlogPost.vue'
import SingleBlogPost from './components/public/blog/Singleblog.vue'


export const routes=[
    {
     path : '/home',
     component : AdminHome
    },
    {
      path : '/category-list',
      component : CategoryList
     },
     {
      path : '/add-category',
      component : AddCategory
     },
     {
      path : '/edit-category/:id',
      component : EditCategory
     },
     //post
     {
      path : '/post-list',
      component : PostList
     },
     {
      path : '/add-post',
      component : AddPost
     },
     {
      path : '/edit-post/:id',
      component : EditPost
     },

     //forntend
     {
      path : '/',
      component : PublicHome
     },
     {
      path : '/blog',
      component : Blogpost
     },
     {
      path : '/blog/:id',
      component : SingleBlogPost
     }
     

  ];