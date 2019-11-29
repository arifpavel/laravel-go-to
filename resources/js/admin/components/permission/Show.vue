<template>
  <div>
      <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="card border-success">
                    <div class="card-body">
                        <alert-success v-if="showSuccess" :form="form">Permission has been updated!</alert-success>
                        <form class="form-horizontal" @submit.prevent="update" @keydown="form.onKeydown($event)">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Permission Name</label>
                                <div class="col-sm-10">
                                <input class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button :disabled="form.busy" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
      </div>
  </div>
</template>

<script>
export default {
    props: {
        permissionid: {
            type: Number,
            default: null
        }
    },
    data() {
        return {
            form: new Form({
                name: ''
            }),
            showSuccess: false
        }
    },
    created () {
        this.form.get('/api/permission/'+this.permissionid).then(res => {
            this.form.name = res.data.name
            console.log(res)
        });
    },
    methods: {
        update() {
            this.form.post('/api/permission/'+this.permissionid).then(res => {
                console.log(res)
                this.showSuccess = true;
            })
        }
    },
}
</script>

<style>

</style>