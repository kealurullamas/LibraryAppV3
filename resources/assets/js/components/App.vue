<template>
    <div>
        <h1>Book Controls</h1>
        <h3><router-link to="/BooksGetAll">Books</router-link></h3>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
    export default{
        
    }
</script>