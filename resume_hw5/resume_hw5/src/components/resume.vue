<template>
  <div class="dbord">
    <div class="container">
      <div><h2>Резюме</h2></div>
      <div class="info">
        <div class="col-md-4 col-md-offset-4">
          <div class="photo">
            <div v-if="user.photo">
                <img class="personPhoto" v-bind:src="user.photo"/>
            </div>
            <div v-if="user.photo==''|| !user.photo">
                <img class="personPhoto" src="../assets/logo.png"/>
            </div>
          </div>
          <div>Меня зовут {{user.fio}}</div>
          <div>Я специалист в области "{{user.prof}}"</div>
          <div>Ищу работу в городе {{user.city}}</div>
          <div>Дата рождения: {{user.date_born}}</div>
        </div>
        <div class="col-md">
          <div>Статус: {{user.status}}</div> 
          <div>Связаться со мной можно по номеру телефона: {{user.phone}} <br/> или Email: {{user.email}}</div>
          <br/>
          <resumeEdu
            v-for="edu in education" :key="edu.id"
            v-bind:education="edu"
          />
          <br/>
          <div>Желаемая зарплата: {{user.money}}</div>
          <br/>
          <div>Мои дополнительные навыки: {{user.skills}}</div>
          <br/>
          <div>О себе: {{user.about}}</div>
        </div>
     </div>      
    </div>
  </div>
</template>

<script>

import resumeEdu from "./resumeEdu";

export default {
  components:{
  resumeEdu
  },
  props:['user','education'],
  
}
</script>

<style>
.photo {
  width: 132px;
  height: 132px;
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
.info{
  display: flex;
}
h2{
  text-align: center;
}
.dbord{
  background-color: #f2dfdf;
}
div{
  margin-bottom: 10px;
}
</style>