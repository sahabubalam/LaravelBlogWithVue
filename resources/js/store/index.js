export default{
    state:{
        category:[],
        post:[],
    },
    getters:{
        getCategory(state)
        {
            return state.category
        },
        getAllPost(state)
        {
            return state.post
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
        }
    }
}