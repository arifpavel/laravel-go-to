<template>
  <div>
      <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="card border-success">
                    <div class="card-body">
                        <form class="form-horizontal" @submit.prevent="update" @keydown="form.onKeydown($event)">
                            
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Settings</label>
                                <div class="col-sm-10">
                                <div class="form-check">
                                  <label class="form-check-label">
                                      <div v-for="(value, key) in settings" :key="key">
                                          {{key}}
                                          {{value}}
                                          <input v-bind:id="key" v-bind:placeholder="value" v-model="form.settings"  type="text" class="form-control" :key="key">
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
            settings: {},
            form: new Form({
                settings: []
            })
        }
    },
    mounted () {
        this.form.get('/api/settings').then( res=> {
            this.settings = res.data
            console.log(this.settings)
        })
    },
}
</script>

<style>

</style>