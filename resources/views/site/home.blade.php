@extends('layouts.master')
@section('content')
   <div id="posts">
       <div class="row mt-5">
           <div class="card">
               <div class="card-body">
                   <div class="form-group">
                       <label for="search">Search</label>
                       <input v-model="term" @keyup="fetchPosts" type="text" id="search" class="form-control">
                   </div>
               </div>
           </div>
       </div>
       <div class="row mt-5">
           <div v-for="post in posts">
               <div class="card card-plain card-blog">
                   <div class="row">
                       <div class="col-md-5">
                           <div class="card-header card-header-image">
                               <a href="#pablito">
                                   <img class="img" :src="post.image">
                               </a>
                               <div class="colored-shadow"
                                    style="background-image: url(&quot;./assets/img/examples/card-blog4.jpg&quot;); opacity: 1;"></div>
                           </div>
                       </div>
                       <div class="col-md-7">
                           <h6 class="card-category text-info">Enterprise</h6>
                           <h3 class="card-title">
                               <a href="#pablo">@{{post.title}}</a>
                           </h3>
                           <p class="card-description">
                               @{{post.content}}
                               <a :href="`/posts/${post.id}`"> Read More </a>
                           </p>
                           <p class="author">
                               by
                               <a :href="`/writers/${post.writer.id}/posts`">
                                   <b>@{{post.writer.name}}</b>
                               </a>, @{{ post.created_at }}
                           </p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

    <script>
        vue = new Vue({
            el: "#posts",
            data: {
                posts: [],
                term: ""
            },
            methods: {
                fetchPosts() {
                    axios.get('/posts', {
                        params: {
                            term: this.term
                        }
                    }).then(response => {
                        this.posts = response.data.posts.data;
                    })
                }
            },
            mounted() {
                axios.get("/posts").then(response => {
                    this.posts = response.data.posts.data;
                })
            }
        })
    </script>
@endsection