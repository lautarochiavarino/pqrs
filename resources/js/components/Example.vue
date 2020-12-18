<template>
    <div class="form-group">
        <div class="form-row">
            <div class="col-md-4">
                <label for="">Pais</label>
                <div class="form-label-group">
                    <select2 :options="paises" v-model="Pais" @input="getProvincias" name="pais_id" required>

                    </select2>
                </div>
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-4">
                <label for="">Provincia</label>
                <div class="form-label-group">
                    <select2 :options="provincias" v-model="Provincia" name="provincia_id" required>

                    </select2>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import axios from 'axios';
    import VueAxios from 'vue-axios';

    Vue.use(VueAxios, axios);
    export default {
        mounted() {

            Vue.axios.get('GetPaises')
                .then((response)=>{
                    this.paises = response.data;
                })
        },
        data: function(){
            return {
                Pais: '0',
                Provincia: '0',
                paises:[],
                provincias : [],
            }
        },
        methods:
            {
                getProvincias()
                {

                    Vue.axios.get('GetProvincias/'+this.Pais)
                        .then((response)=>{
                            this.provincias = response.data;
                        })


                }
            }
    }
</script>