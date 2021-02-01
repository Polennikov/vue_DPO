<template>
    <div>
        <h4 class="text-center" >{{title}}</h4>
        <draggable :list="list" group="user" @change="Statuschange" >
            <div v-for="(element, index) in list" :key="index">          
                    <field_item 
                        v-bind:photo="element.photo"
                        v-bind:name="element.fio" 
                        v-bind:prof="element.prof" 
                        v-bind:date_born="element.date_born" 
                        v-on:click.native="edit(element.id_resume)">
                    </field_item>
            </div>
        </draggable>
    </div>
</template>
<script>

    import axios from 'axios'
    import draggable from "vuedraggable/src/vuedraggable";
    import field_item from "./resumeFieldItem";
    export default {
        name: "draggableItem",
        components: {field_item, draggable},
        props:['title', 'list', 'newResume', 'assigned', 'accept', 'fault'],
        methods: {
            Statuschange: function(e) {
                let add = e.added;
                if (typeof add !== "undefined") {
                    let new_status = null;
                    let el = this.newResume.find(x=> x.id_resume === add.element.id_resume);
                    if(typeof el !== "undefined"){
                        new_status = 'Новый';
                    }
                    el = this.assigned.find(x=> x.id_resume === add.element.id_resume);
                    if(typeof el !== "undefined"){
                        new_status = 'Назначено собеседование';
                    }
                    el = this.accept.find(x=> x.id_resume === add.element.id_resume);
                    if(typeof el !== "undefined"){
                        new_status = 'Принят';
                    }
                    el = this.fault.find(x=> x.id_resume === add.element.id_resume);
                    if(typeof el !== "undefined"){
                        new_status = 'Отказ';
                    }                 
                    axios.post('http://resume/POST/api/cv/'+add.element.id_resume+'/status/update', new_status);
                }
            },
            edit(id_resume){
                this.$router.push({ name: 'Edit', params: { id: id_resume }});
            }
        },       
    }
</script>
