<template>

          <div class="pe-5"><strong>{{ $followersCount }}</strong> followers</div>
          <div class="pe-5"><strong>{{ $followingCount }}</strong> following</div>

</template>

<script>

  import axios from 'axios';

  export default{

    props: ['postsCN','followersCN','followingCN'],

    data(){
      return{
        followersCount:{},
        //followingCount:{},

      }
    },

    watch:{

      follow:{
        immediate: true,
        handler(newVal){
          this.fetchFollowers(newVal)
        }
      }

    },

    methods:{
      fetchFollowers(follow){
        axios.get(`/{$follow}`)

      }
    }


  }

</script>
