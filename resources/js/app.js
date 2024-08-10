import './bootstrap';
import { createApp } from 'vue';
import PopPost from './components/PopPost.vue';
import FollowButton from './components/FollowButton.vue';


const app = createApp({
  data() {
    return {
      showPopup: false,
      postId: null
    };
  },
  methods: {
    showPost(id) {
      this.postId = id;
      this.showPopup = true;
    },
    closePopup(){
      this.showPopup = false;
      this.postId = null;
    }
  }
});

app.component('pop-post', PopPost);
app.component('follow-button', FollowButton);


app.mount('#nigga');