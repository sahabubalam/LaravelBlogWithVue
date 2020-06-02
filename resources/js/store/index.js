export default{
    state:{
        category:[],
        post:[],
        blogpost:[],
        singlepost:[],
        allcategories:[],
    },
    getters:{
        getCategory(state)
        {
            return state.category
        },
        getAllPost(state)
        {
            return state.post
        },
        getblogPost(state)
        {
            return state.blogpost
        },
        singlepost(state)
        {
            return state.singlepost
        },
        allcategories(state)
        {
            return state.allcategories
        }
    },
    actions:{
        allcategory(context)
        {
            axios.get('/category')
            .then((response)=>{
               // console.log(response.data)
            context.commit('categories',response.data.categories)
                
            })
        },
        getallPost(context)
        {
            axios.get('/post')
            .then((response)=>{
                console.log(response.data)
                context.commit('allpost',response.data.posts)
            })
        },
        getblogPost(context)
        {
            axios.get('/blogpost')
            .then((response)=>{
                console.log(response.data)
                context.commit('getblogPost',response.data.posts)
            })
        },
        getpostById(context,payload)
        {
            axios.get('/singleblogpost/'+payload)
            .then((response)=>{
                context.commit('singlePost',response.data.post)
            })
        },
        allcategories(context)
        {
            axios.get('/categories')
            .then((response)=>{
                context.commit('AllCategories',response.data.categories)
            })
        }
    },
    mutations:{
        categories(state,data)
        {
            return state.category=data
        },
        allpost(state,payload)
        {
            return state.post=payload
        },
        getblogPost(state,payload)
        {
            return state.blogpost=payload
        },
        singlePost(state,payload)
        {
            return state.singlepost=payload
        },
        AllCategories(state,payload)
        {
            return state.allcategories=payload
        }
    }
}