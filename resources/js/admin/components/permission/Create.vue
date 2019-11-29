<template>
  <div>
      <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="card border-success">
                    <div class="card-body">
                        <alert-success :form="form">Permission has been created!</alert-success>
                        <form class="form-horizontal" @submit.prevent="create" @keydown="form.onKeydown($event)">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Permission Name</label>
                                <div class="col-sm-10">
                                <input class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button :disabled="form.busy" type="submit" class="btn btn-primary">Create</button>
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
    data() {
        return {
            form: new Form({
                name: ''
            }),
        }
    },
    methods: {
        create() {
            this.form.post('/api/permission/').then(res => {
                console.log(res)
                this.form.reset();
            })
        }
    },
}
</script>

<style>

</style>