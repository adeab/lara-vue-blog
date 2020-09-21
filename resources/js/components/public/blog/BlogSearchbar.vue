<template>


    <div class="sticker2">

        <input type="text" name="Search" value="Search" placeholder="Search Blogs" v-model="searchQuery" @keyup="filterPosts"
            onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">

    </div>


</template>
<script>
    export default {
        name: "BlogSearchbar",
        data() {
            return {
                searchQuery: '',
            }
        },
        methods: {
            filterPosts() {
                this.$store.dispatch('SearchPost',
                    this.searchQuery);
            }
        }


    }

</script>
<style scoped>
input[type=text] {
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 3px;
  background-color: #ffffff00;
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  transition: width 0.4s ease-in-out;
  margin-bottom: 4px;
}

input[type=text]:focus {
  width: 100%;
background-color: white;
   
}
</style>
