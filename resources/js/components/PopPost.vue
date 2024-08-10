<template>
  <div class="show-post">
    <div class="back-post" @click="$emit('close')"></div>

        <div class="wrapper-post container"> 
          <div class="post row">
              <div class="wrapper-img col-8">
                <img :src="'/storage/' + post.image" alt="Post Image" v-if="post.image" class="w-100">
              </div>

              <div class="wrapper-caption col-4 ">
                <div class="align-items-center">
                  <div class="pt-4 d-flex align-items-center">
                    <img :src="'/storage/' + user.image" class="w-100 rounded-circle " >

                    <div class="fw-bold ps-3 h5">
                      <a :href="'/profile/'+ post.user_id" class="href">
                        <span class="text-dark">
                          {{ username }}
                        </span>
                      </a>
                    </div>


                  </div>

                  <hr>

                  <p>
                    <span class="fw-bold pe-1">
                      <a :href="'/profile/'+ post.user_id" class="href">
                        <span class="text-dark">
                          {{ username }}
                        </span>
                      </a>
                    </span>
                       <span class="text-dark ps-3">{{ post.caption }}</span>
                  </p>
                
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {

  props: ['postId','userId','userNM'],

  data() {
    return {
      post: {},
      user: {},
      username:{},
    };
  },  
  
  watch: {
    postId: {
      immediate: true,
      handler(newVal) {
        this.fetchData(newVal)
      }
    }
  },

  methods: {
    fetchData(postId) {
      this.isLoading = true;
      axios.get(`/post-data/${postId}`)
        .then(response => {
          this.post = response.data.post;
          this.user = response.data.user.profile;
          this.username = response.data.username;
         
        })
        .catch(error => {
          console.error("There was an error fetching the data: ", error);
          console.log('Post:', this.post);
          console.log('User:', this.user);
          console.log('Username:', this.username);
        })
        .finally(() => {
          this.isLoading = false;
        });
    }
  }
};
</script>

<style>



.show-post{
  z-index:999;
  position: absolute
}

.back-post {
  background-color: rgba(0, 0, 0, 0.65);
  width: 100vw;
  height: 100vh;
  left: 0;
  top: 0;
  position: fixed;
}

.wrapper-post {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: aliceblue;
  border-radius: 10px;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
}
.wrapper-img{
  display: flex;
  justify-content: flex-start;
  align-items: center;
}

.wrapper-img > img {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  width: 100%;
  left:0;
}

.wrapper-caption div div >img{
  max-width: 60px;
  
}
</style>
