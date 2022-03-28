<template>
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <span>Links</span>
                            <span class="badge badge-pill badge-primary">{{ maxLinks }}</span>

                        </div>
                    </div>

                    <div class="card-body">

                        <ul class="list-group">
                            <li class="list-group-item" v-for="link in links" :key="link.short">
                                <div class="row">
                                    <div class="col-4">{{ link.short }}</div>
                                    <div class="col-8">{{ link.external }}</div>
                                </div>
                            </li>

                            <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <div class="form-group w-100">
                                        <input type="text" class="form-control" placeholder="Enter link" v-model="link">
                                    </div>
                                    <button type="button" class="btn btn-success ml-2" @click="generateShortLink">+
                                    </button>
                                </div>

                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Home",

    data() {
        return {
            links: [
                {
                    short: "http://localhost:8002/l5",
                    external: "https://google.com"
                }

            ],
            link: '',
        }
    },

    computed: {
        maxLinks() {
            return this.links.length
        }
    },

    methods: {
        async generateShortLink() {
            try{
                let response = await axios.post('api/short-link/generate', {"link":this.link})
                let shortLink = response.data.shortLink
                this.links.push(
                    {
                        short: shortLink,
                        external: this.link
                    }
                )
                this.link = '';

            }catch(e){

            }

        }
    }
}
</script>

<style scoped>

</style>
