<template>
    <div>
        <div class="container">

            <div class="row">
                <div class="col-3">
                    <draggable_item v-bind:title="'Новый'" v-bind:list="newResume" v-bind:accept="accept"
                            v-bind:fault="fault" v-bind:assigned="assigned" v-bind:newResume="newResume"
                    ></draggable_item>
                </div>
                <div class="col-3">
                    <draggable_item v-bind:title="'Назначено собеседование'" v-bind:list="assigned" v-bind:accept="accept"        v-bind:fault="fault" v-bind:assigned="assigned" v-bind:newResume="newResume" 
                    ></draggable_item>
                </div>
                <div class="col-3">
                    <draggable_item v-bind:title="'Принят'" v-bind:list="accept" v-bind:accept="accept" 
                            v-bind:fault="fault" v-bind:assigned="assigned" v-bind:newResume="newResume"
                    ></draggable_item>
                </div>
                <div class="col-3">
                    <draggable_item v-bind:title="'Отказ'" v-bind:list="fault" v-bind:accept="accept"
                            v-bind:fault="fault" v-bind:assigned="assigned" v-bind:newResume="newResume"
                    ></draggable_item>
                </div>               
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios'
    import draggable_item from "./draggableItem";

    export default {
        name: "mainForm",
        components: {draggable_item},
        data(){
            return{
                newResume: [],
                assigned: [],
                accept: [],
                fault: [],
            }
        },
        watch: {
            newResume() {
               axios.get('http://resume/GET/api/cv/')
                .then(response => (this.newResume = this.checkResume(response.data,'Новый')));
            },
            assigned() {
                axios.get('http://resume/GET/api/cv/')
                .then(response => (this.assigned = this.checkResume(response.data,'Назначено собеседование')));
            },
            accept() {
                axios.get('http://resume/GET/api/cv/')
                .then(response => (this.accept = this.checkResume(response.data,'Принят')));
            },
            fault() {
                axios.get('http://resume/GET/api/cv/')
                .then(response => (this.fault = this.checkResume(response.data,'Отказ')));
            }
        },
        mounted() {
            axios.get('http://resume/GET/api/cv/')
            .then(response => (this.newResume = this.checkResume(response.data,'Новый')));
            axios.get('http://resume/GET/api/cv/')
            .then(response => (this.assigned = this.checkResume(response.data,'Назначено собеседование')));
            axios.get('http://resume/GET/api/cv/')
            .then(response => (this.accept = this.checkResume(response.data,'Принят')));
            axios.get('http://resume/GET/api/cv/')
            .then(response => (this.fault = this.checkResume(response.data,'Отказ')));
        },
        methods: {           
            checkResume:function (resume,tmp) {
                function check(value) {
                    var result = false;
                    if (value.status == tmp) {
                        result = true;
                    }
                    return result;
                }
                return  resume.filter(check);
            }         
        }
    }
</script>

<style scoped>

</style>
