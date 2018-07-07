
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app',
    data: {
        msg: 'Pesan Baru:',
        content: '',
        posts: [],
    },

    ready: function(){
        this.created();
    },
    created(){
        axios.get('http://ruangpangan.dev/index.php/posts')
            .then(response=>{
                console.log(response); //kalau sukses, muncul
                this.posts = response.data; //taruh data ke post array
            })
            .catch(function(error){
                console.log(error); //kalau error, muncul
            });
    },

    methods:{
        addPost(){
            //allert('TestFunction');
            axios.get('http://ruangpangan.dev/index.php/addPost',{
                content: this.content
            })
            .then(function(response){
                console.log('saves succesfully'); //kalau sukses, muncul
                if(response.status==200){
                    alert('Post baru saja ditambahkan');
                    app.posts = response.data;
                }
            })
            .catch(function(error){
                console.log(error); //kalau error, muncul
            });
        }
    }
});
