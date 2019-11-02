<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{msg}}</div>
                    <div class="card-body" v-for="user in users" :key="user.id">
                        <h3>{{user.username}}</h3>
                        <!-- <p>{{item.email}}</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                users: [],
                msg: 'Hello World'
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('/users').then(res => {
                this.users = res.data;
                console.log(this.users)
            })
        },
        created(){
            
        }
    }
</script>
