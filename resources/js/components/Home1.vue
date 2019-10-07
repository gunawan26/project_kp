<template>
    <div id="home">
        <div>
            <Navi />
        </div>
        <div id="top-box">
            <div class="d-none d-lg-block">
                <img style="margin-right:10%; margin-left:20%;" id="top-img"
                    src="@/images/undraw_complete_task_u2c3.svg" alt="">
            </div>
            <v-row justify="center" style="margin-top:2%;">
                <v-col>
                    <div id="top-text1">Let's Start Create Something ...</div>
                </v-col>
                <v-col>
                    <create-file />
                </v-col>
            </v-row>
        </div>
        <v-container>
            <h6 style="margin-top:50px; margin-bottom: 20px;">Recent</h6>
            <div class="row">
                <div class="col-md-4">
                    <!-- pagination links -->
                    <nav v-cloak>
                        <ul class="pagination">
                            <li v-if="docs.prev_page_url">
                                <a @click.prevent="getUsers(docs.prev_page_url)"
                                    :href="docs.prev_page_url">@lang('pagination.previous')</a>
                            </li>
                            <li v-if="docs.next_page_url">
                                <a @click.prevent="getUsers(docs.next_page_url)"
                                    :href="docs.next_page_url">@lang('pagination.next')</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-md-8 text-right">
                    Display from @{{ docs.from }} to @{{ docs.to }} of @{{ docs.total }} data.
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" v-cloak>
                    <thead>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        <tr v-for="(doc, index) in docs.data" v-bind:key="index">
                            <td>{{ doc.offername }}</td>
                            <td>{{ doc.created_at }}</td>
                            <td>{{ doc.updated_at }}</td>
                            <td>
                                <button class="btn btn-info btn-xs">Edit</button>
                                <button class="btn btn-danger btn-xs">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <nav v-cloak>
                <ul class="pagination">
                    <li v-if="docs.prev_page_url">
                        <a @click.prevent="getUsers(docs.prev_page_url)"
                            :href="docs.prev_page_url">@lang('pagination.previous')</a>
                    </li>
                    <li v-if="docs.next_page_url">
                        <a @click.prevent="getUsers(docs.next_page_url)"
                            :href="docs.next_page_url">@lang('pagination.next')</a>
                    </li>
                </ul>
            </nav>
        </v-container>
        <v-overlay opacity="1" color="white" light :value="overlay">
            <v-progress-circular indeterminate size="64" color="primary"></v-progress-circular>
        </v-overlay>
    </div>
</template>

<script>
    import Navi from "@/js/components/Navi.vue";
    import CreateFile from "@/js/components/dialog/CreateFile.vue";
    import store from "@/js/store";

    export default {
        name: "home",
        data() {
            return {
                overlay: false,
                api: {
                    userIndex: '/api/auth/data'
                },
                docs: null
            };
        },
        components: {
            Navi,
            CreateFile
        },
        computed: {
            curentUser() {
                //   return store.getters.currentUser;
                return store.state.currentUser;
            }
        },
        created() {
            this.overlay = true;
        },
        mounted() {
            console.log('Home is ready!')
            this.getUsers(this.api.userIndex);
        },
        watch: {
            overlay(val) {
                val &&
                    setTimeout(() => {
                        this.overlay = false;
                    }, 3000);
            }
        },
        methods: {
            getUsers(url) {
                axios.get(url).then(response => {
                    this.docs = response.data;
                }).catch(errors => {
                    console.error(errors);
                })
            }
        }
    };

</script>

<style lang="scss">
    #top-box {
        background-color: #f1f0ee;
        padding: 15px;
        height: 130px;
        margin-top: 5%;
    }

    #top-img {
        width: 10%;
        margin-left: 10%;
        float: left;
    }

    #top-text {
        // height: 100px;
        margin-top: 40px;
        margin-left: 10%;
        float: left;
    }

</style>
