<template>
  <div class="container addbook-container">
        <h1>Add Book</h1>
        <div class="add-book-form">
            <form @submit.prevent="addBook">
                <div class="form-group addbook-formgroup">
                    <!-- {{Form::label('title','Title')}}
                    {{Form::text('bookTitle','',['class'=>'form-control addbook-textbox','placeholder'=>'Enter Book Title'])}} -->
                    <label>Book Title</label><br>
                    <input type="text" v-model="book.bookTitle" placeholder="Book Title">
                </div>
                <div class="form-group addbook-formgroup">
                      <!-- {{Form::label('author','Author')}}
                      {{Form::text('bookAuthor','',['class'=>'form-control addbook-textbox','placeholder'=>'Enter Book Author'])}} -->
                    <label>Book Author</label><br>
                    <input type="text" v-model="book.bookAuthor" placeholder="Book Author">
                </div>
                <div class="form-group addbook-formgroup">
                    <!-- {{Form::label('publisher','Publisher')}}
                    {{Form::text('bookPublisher','',['class'=>'form-control addbook-textbox','placeholder'=>'Enter Book Author'])}} -->
                    <label>Publisher</label><br>
                    <input type="text" v-model="book.bookPublisher" placeholder="Publisher">
                </div>
                <div class="form-group addbook-formgroup">
                    <!-- {{Form::label('reference','Reference Number')}}
                    {{Form::text('bookReference','',['class'=>'form-control addbook-textbox','placeholder'=>'Enter Book Author'])}} -->
                    <label>Reference</label><br>
                    <input type="text" v-model="book.bookReference" placeholder="Publisher">
                </div>
                <div class="form-group addbook-formgroup">
                    <!-- {{Form::label('description','Description')}}
                    {{Form::textarea('bookDescription','',['class'=>'form-control addbook-desc','placeholder'=>'Enter Book Author'])}} -->
                    <label>Description</label><br>
                    <textarea v-model="book.bookDescription" placeholder="Description"></textarea>
                </div>
                <div class="form-group">
                    <!-- {{Form::label('number','Number of Books')}}
                    {{Form::number('bookSupply','',['class'=>'form-control','min'=>'1','max'=>'5s'])}} -->
                    <label>Number of Booksss</label><br>
                    <input type="number" min="1" max="5" v-model="book.bookSupply">
                </div>
                <div class="form-group addbook-formgroup">
                    <!-- {{Form::file('bookImage')}} -->
                    <input type="file" ref="file" @change="addFile">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <!-- {{Form::submit('submit',['class'=>'btn btn-primary'])}}
            {!!Form::close()!!} -->
            </form>
        </div>
    </div>
</template>
<script>
    export default {
        name:'',
        data(){
          return{
            book:{
                    bookTitle:'',
                    bookAuthor:'',
                    bookPublisher:'',
                    bookReference:'',
                    bookDescription:'',
                    bookSupply:'',
                    bookImage:''
                },
          }
        },
        methods:{
          addFile(){
            this.book.bookImage=this.$refs.file.files[0];
          },
          onFileChange(e){
            let files=e.target.files||e.dataTransfer.files;
            if(!files.length){
              return;
            }
            this.createImage(files[0]);
          },
          createImage(file){
            let reader= new FileReader();
            let vm=this;
            reader.onload=(e)=>{
              vm.book.bookImage=e.target.result;
            }
            reader.readAsDataURL(file);
          },
          addBook(){
            fetch('http://localhost/LibraryApp/public/api/BookCreate',{
              method:'post',
              body:JSON.stringify(this.book),
              headers:{
                // 'content-type':'application/json'
                'content-type':'multipart/form-data'
              }
            })
              .then(res=>res.json)
                .then(res=>{
                  alert('Book '+this.book.bookImage+' is added');
                })
                  .catch(err=>console.log(err));
          }
        }
    }
</script>