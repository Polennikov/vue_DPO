<template>
    <div >
        <div>
            <div class="field">
                <div class="photo">
                    <div v-if="photo">
                        <img class="personPhoto" v-bind:src="photo"/>
                    </div>
                    <div v-if="photo==''|| !photo">
                        <img class="personPhoto" src="../assets/logo.png"/>
                    </div>
                </div>
                <div>{{name}}</div>
                <div>{{prof}}</div>
                <div>дата рождения: {{date_born}}</div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "resumeFieldItem",
        props:['name', 'prof', 'date_born','photo'],
    }
</script>

<style scoped>
.field
{
        border: groove;
}
.photo {
  width: 60px;
  height: 60px;
  margin: 0 auto;
  overflow: hidden;
}
.personPhoto {
  border-radius: 50%;
  width: 100%;
  max-width: 100%;
  height: 100%;
  margin: 0 auto;
}
</style>
