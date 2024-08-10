
<template>
<button class="btn btn-primary ms-4" @click="followUser" v-text="buttonText"></button>        
</template>

<script>

import "bootstrap/dist/css/bootstrap.min.css";


export default {
  props: {
    userId: {},
    follows:{},
  },
  mounted() {
    console.log('Component mounted.');
  },


  data: function(){
    return{
      status:this.follows,
    }
  },

  methods: {
    followUser() {
      axios.post('/follow/' + this.userId)
        .then(response => {
          console.log(response.data);
          this.status = ! this.status;
        })
        .catch(error => {
          if(error.response.status == 401){

            window.location ='/login';

          }
        });
    },
  },

  computed:{
    buttonText(){
      return (this.status) ? 'Unfollow' : 'Follow';
    }
  }
}


</script>