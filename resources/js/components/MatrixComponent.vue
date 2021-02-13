<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Матрица</div>

                    <div class="card-body">
                        Размер матрицы
                        <input type="number" v-model.number="size" />
                        <div v-for="i in size" :key="i">
                            <span v-for="j in size" :key="j">
                                <input size="2" type="number" v-model.number="matrix[i-1][j-1]" />
                            </span>
                        </div>
                        Сумма главной: {{ summa.main }}
                        Сумма побочной: {{ summa.second }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { debounce } from 'lodash'
    import * as axios from 'axios';

    export default {
        data() {
            return {
                size: 5,
                matrix: [],
                summa: {
                    main: 0,
                    second: 0,
                }
            }
        },
        created() {
            this.matrix = [...Array(this.size)].map(e => Array(this.size).fill(this.getRandomInt(10)));
        },
        watch: {
            size(val) {
                this.matrix = [...Array(this.size)].map(e => Array(this.size).fill(this.getRandomInt(10)));
            },
            async matrix() {
                await window.axios.post('/matrix', { data: this.matrix })
                .then((response) => {
                    this.summa = response.data
                })
            }
        },
        methods: {
            getRandomInt(max) {
                return Math.floor(Math.random() * Math.floor(max))
            }
        }
    }
</script>
