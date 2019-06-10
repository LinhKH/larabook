

require('./bootstrap');
import $ from 'jquery';

const app = new Vue({
  el: '#app',
  data: {
    msg: 'Make Post:',
    content: '', updatedContent: '',
    posts: [],
    qry:'',
    results: [],
    postId: '',
    successMsg: '',
    commentData: {},
    commentSeen: false,
    image: '',
    bUrl: 'http://localhost:8000/larabook',
  },

  ready: function () {
    this.created();
  },

  created() {
    axios.get(this.bUrl + '/posts')
      .then(response => {
        console.log(response); // show if success
        this.posts = response.data; //we are putting data into our posts array
        this.results = [];
        Vue.filter('myOwnTime', function (value) {
          return moment(value).fromNow();
        });
      })
      .catch(function (error) {
        console.log(error); // run if we have error
      });
  },

  methods: {

    addPost() {

      axios.post(this.bUrl + '/addPost', {
        content: this.content
      })
        .then((response) => {
          this.content = "";
          console.log('saved successfully'); // show if success
          if (response.status === 200) {
            this.posts = response.data;
          }
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
    },
    openModal(id) {
      //console.log(id);
      axios.get(this.bUrl + '/posts/' + id)
        .then(response => {
          console.log(response); // show if success
          this.updatedContent = response.data; //we are putting data into our posts array
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
    },
    updatePost(id) {
      axios.post(this.bUrl + '/updatePost/' + id, {
        updatedContent: this.updatedContent
      })
        .then((response) => {
          this.content = "";
          console.log('Changes saved successfully'); // show if success
          if (response.status === 200) {
            app.posts = response.data;
          }
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
    },

    deletePost(id) {
      //alert(id);
      axios.get(this.bUrl + '/deletePost/' + id)
        .then(response => {
          console.log(response); // show if success
          this.posts = response.data; //we are putting data into our posts array
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });

    },
    likePost(id) {
      axios.get(this.bUrl + '/likePost/' + id)
        .then(response => {
          console.log(response); // show if success
          this.posts = response.data; //we are putting data into our posts array
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
    },
    addComment(post, key) {

      axios.post(this.bUrl + '/addComment', {
        comment: this.commentData[key],
        id: post.id
      })
        .then(function (response) {
          console.log('saved successfully'); // show if success
          if (response.status === 200) {
            app.posts = response.data;
          }
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });

    },

    onFileChange(e) {
      var files = e.target.files || e.dataTransfer.files;
      this.createImg(files[0]); // files the image/ file value to our function

    },
    createImg(file) {
      // we will preview our image before upload
      var image = new Image;
      var reader = new FileReader;

      reader.onload = (e) => {
        this.image = e.target.result;
      };
      reader.readAsDataURL(file);
    },

    uploadImg() {
      axios.post('http://localhost:8000/larabook/saveImg', {
        image: this.image,
        content: this.content
      })
        .then((response) => {
          console.log('saved successfully'); // show if success
          this.image = "";
          this.content = "";
          if (response.status === 200) {
            app.posts = response.data;
          }
        })
        .catch(function (error) {
          console.log(error); // run if we have error
        });
    },
    removeImg() {
      this.image = ""
    }
  }
});
