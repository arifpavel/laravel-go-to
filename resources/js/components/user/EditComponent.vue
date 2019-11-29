<template>
  <div>
      <div class="text-center">
            <img class="profile-user-img img-fluid img-square" v-bind:src="url(form.image)" v-bind:alt="form.first_nane">
     </div><br>
      <alert-success v-if="showSuccess" :form="form">Your changes have been saved!</alert-success>
                        <form class="form-horizontal" @submit.prevent="updateUser" @keydown="form.onKeydown($event)">
                        <!-- <div class="form-group row">
                                    <label for="inputProfilePicture" class="col-sm-2 col-form-label">Upload DP</label>
                                    <div class="col-sm-10">
                                    <input type="file" @change="updateImage" class="form-control" id="inputProfilePicture" placeholder="file" enctype="multipart/form-data">
                                    </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Firstname</label>
                            <div class="col-sm-10">
                            <input class="form-control" v-model="form.first_name" :class="{ 'is-invalid': form.errors.has('first_name') }">
                            <has-error :form="form" field="first_name"></has-error>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Lastname</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" v-model="form.last_name" :class="{ 'is-invalid': form.errors.has('last_name') }">
                            <has-error :form="form" field="last_name"></has-error>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Bio</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="" cols="30" rows="5" v-model="form.bio" :class="{ 'is-invalid': form.errors.has('bio') }"></textarea>
                            <has-error :form="form" field="bio"></has-error>
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button :disabled="form.busy" type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        </form>
  </div>
</template>

<script>
export default {
    props: {
        userid: {
            type: Number,
            default: null
        },
    },
    data() {
        return {
            form: new Form({
                first_name: '',
                last_name: '',
                bio: '',
                image: ''
            }),
            showSuccess: false,
            provider: null
        }
    },
    mounted () {
        this.form.get('/api/user/'+this.userid).then( res => {
            //console.log(res)
            this.form.first_name = res.data.first_name
            this.form.last_name = res.data.last_name
            this.form.bio = res.data.bio
            this.form.image = res.data.image
            this.provider = res.data.provider
        })
    },
    methods: {
        updateUser() {
            this.form.post('/api/user/'+this.userid).then( res => {
                Toast.fire({
                    position: 'center',
                    type: 'success',
                    title: 'Your profile has been updated.'
                })
            })
        },
        url(img){
            //console.log(window.baseUrl)
            if(this.provider == null){
                return window.baseUrl+'/'+img;
            }else{
                return img;
            }
        },
            updateImage(e){
                let file = e.target.files[0];
                console.log('file array'+ e.target.files)
                let reader = new FileReader();
                //Check file size is greater than 2MB
                console.log(file)
                if(file['size'] < 2111775){
                reader.onload = (file) => {
                //this.isTempImage = true
                this.form.image = reader.result
                this.url()
                }
                reader.onloadend = (file) => {
                    this.form.image = reader.result
                }
                reader.readAsDataURL(file);
                }else{
                   Swal.fire({
                       type: 'error',
                       title: 'Ooops!!',
                       text: 'Your file is larger than 2 MB'
                   })
                }
            },
    },
}
</script>

<style>

</style>