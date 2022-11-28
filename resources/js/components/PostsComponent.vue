<template>
    <div>
        <div v-if="loading">...Loading...</div>

        <div v-else-if="errorMessage.length > 0">
            {{ errorMessage }}
        </div>

        <div v-else-if="posts.length > 0">
            <div v-for="post in posts" :key="post.id">
                {{ post.title }}
            </div>
        </div>

        <div v-else>No posts available...</div>
    </div>
</template>

<script>
export default {
    name: "PostsComponent",
    data() {
        return {
            posts: [],
            errorMessage: "",
            loading: true,
        };
    },
    mounted() {
        console.log("PostComponent exists");

        axios.get("/api/posts").then(({ data }) => {
            if (data.success) {
                this.posts = data.results;
            } else {
                this.errorMessage = data.error;
            }
        });
    },
};
</script>

<style lang="scss" scoped></style>
