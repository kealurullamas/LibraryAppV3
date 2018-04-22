<template>
  <div>
      <h1>Books</h1>
      <div class="container">
          <router-link to="/create" class="btn btn-success">Create</router-link>
      </div>
      <div class="card card-body mb-2" v-for="book in books" :key="book.id">
          <img :src="`http://localhost/LibraryApp/public/storage/images/${book.image}`"  alt=""><h3>{{book.title}}</h3>
          <button @click="deleteBooks(book.id)" class="btn btn-danger">Delete</button>
      </div>
      <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item" v-bind:class="[{disabled:!pagination.prev_page_url}]" ><a class="page-link" href="#"
        @click="fetchBooks(pagination.prev_page_url)">Previous</a></li>

        <li class="page-item" v-bind:class="[{disabled:!pagination.next_page_url}]"><a class="page-link" href="#"
        @click="fetchBooks(pagination.next_page_url)">Next</a></li>
      </ul>
    </nav>
  </div>
</template>
<script>
    export default {
        name:'',
        data(){
            return{
                books:[],
                book:{
                    bookTitle:'',
                    bookAuthor:'',
                    bookPublisher:'',
                    bookReference:'',
                    bookDescription:'',
                    bookSupply:'',
                    bookImage:''
                },
                bookId:'',
                pagination:{}
            }
        },
        mounted(){
           this.fetchBooks();
        },  
        methods:{
            fetchBooks(page_url){
                // let vm=this;
                // page_url=page_url||'/LibraryApp/public/api/BooksGetAll';
                // axios.get(page_url)
                //     .then(res=>{
                //         this.books=res.data;
                //     })
                //         .catch(err=>console.log(err));
                page_url=page_url||'http://localhost/LibraryApp/public/api/BooksGetAll';
                fetch(page_url)
                    .then(res=>res.json())
                        .then(res=>{
                            this.books=res.data;
                            this.makePagination(res.meta,res.links);
                        })
                            .catch(err=>console.log(err));
            },
            makePagination(meta,links){
            let pagination={
                current_page:meta.current_page,
                last_page:meta.last_page,
                next_page_url:links.next,
                prev_page_url:links.prev
            }
            this.pagination=pagination;
            },
            deleteBooks(id){
                fetch(`api/BookDelete/${id}`,{
                    method:'delete'
                })
                .then(res=>res.json)
                    .then(res=>{
                        alert('Book Deleted');
                        this.fetchBooks();
                    })
                        .catch(err=>console.log(err));
            }
        },
       
    }
</script>