<template>
  <div>
      <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="card border-success">
                    <div class="card-body">
                        <alert-success v-if="showSuccess" :form="form">Role has been updated!</alert-success>
                        <form class="form-horizontal" @submit.prevent="update" @keydown="form.onKeydown($event)">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Role Name</label>
                                <div class="col-sm-10">
                                <input class="form-control" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Permissions</label>
                                <div class="col-sm-10">
                                <div class="form-check">
                                  <label class="form-check-label">
                                      <div v-for="permission in permissions" :key="permission.id">
                                          <input v-bind:id="permission.id" v-bind:value="permission" v-model="form.permissions" type="checkbox" class="form-check-input" v-if="form.permissions[permission.id] == permission" checked >
                                          <input v-bind:id="permission.id" v-bind:value="permission" v-model="form.permissions" type="checkbox" class="form-check-input" v-else>
                                            {{permission}}
                                      </div>
                                  </label>
                                </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button :disabled="form.busy" type="submit" class="btn btn-sm btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                        <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                <button class="btn btn-sm btn-primary" @click="toggle">{{selectAll}}</button>
                                </div>
                            </div>
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
        roleid: {
            type: Number,
            default: null
        }
    },
    data() {
        return {
            form: new Form({
                name: '',
                permissions: []
            }),
            permissions: [],
            selectAll: '',
            showSuccess: false
        }
    },
    created () {
        this.form.get('/api/role/'+this.roleid).then(res => {
            this.form.name = res.data.role.name
            this.permissions = res.data.permissions
            this.form.permissions = res.data.rolePermissions
            console.log(this.form.permissions)
            console.log(this.permissions)
        });
        this.toggle();
    },
    methods: {
        update() {
            console.log(this.form)
            this.form.post('/api/role/'+this.roleid).then(res => {
                console.log(res)
                this.showSuccess = true
            })
        },
        toggle() {
            if(this.selectAll == 'Select All'){
                this.form.permissions = this.permissions
                this.selectAll = 'Deselect All'
            }else if(this.selectAll == 'Deselect All'){
                this.selectAll = 'Select All'
                this.form.permissions = []
            }else{
                this.selectAll = 'Select All'
            }
            
        }
    },
}
</script>

<style>

</style>