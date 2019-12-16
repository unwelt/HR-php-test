<template>
    <form >
        <fieldset :disabled="requestExecuting">
            <div class="form-group row justify-content-center align-items-center">
                <div class="col-4">
                    <input type="number" class="text-center form-control" v-model="price"/>
                </div>

                <div class="col-auto">
                    <div class="spinner-border text-primary" role="status" v-if="requestExecuting">
                        <span class="sr-only">Loading...</span>
                    </div>

                    <a class="bnt btn-link" href="#" title="Сохранить изменения" @click.prevent="saveChanges"
                       v-if="updateRoute !== '' && !requestExecuting">
                        <i class="material-icons">
                            save
                        </i>
                    </a>
                </div>
            </div>
        </fieldset>
    </form>
</template>

<script>
  import axios from 'axios'
  export default {
    name: 'price-controller',
    props: {
      currentPrice: {
        type: Number,
        default: 0,
      },
      updateRoute: {
        type: String,
        default: '',
      },
    },
    data () {
      return {
        price: this.currentPrice,
        isEdit: false,
        requestExecuting: false,
      }
    },

    mounted () {
      if (Vue.config.devtools) {
        console.log('component mounted')
      }
    },

    methods: {
      saveChanges () {
        let vm = this
        vm.requestExecuting = true
        axios.put(vm.updateRoute, {
          'price': vm.price
        }).then(function (response) {
          vm.requestExecuting = false
        }).catch(function (error) {
          if (Vue.config.devtools) {
            console.error(error)
          }
          vm.requestExecuting = false
        })
      },
    },
  }
</script>

<style scoped>

</style>