<template>
  <div class="dbord">
    <div class="container">
      <div><h2>Резюме</h2></div>
      <div class="info">
        <div class="col-md-4 col-md-offset-4">
          <div class="photo">
            <img class="personPhoto" v-bind:src="users.photo"/>
          </div>
          <div>Меня зовут {{users.fio}}</div>
          <div>Я специалист в области "{{users.prof}}"</div>
          <div>Ищу работу в городе {{users.city}}</div>
          <div>Дата рождения: {{users.date}}</div>
        </div>
        <div class="col-md">
          <div>Статус: {{users.status}}</div> 
          <div>Связаться со мной можно по номеру телефона: {{users.phone}} <br/> или Email: {{users.email}}</div>
          <br/>
          <resumeEdu
            v-for="education in users.education" :key="education.id"
            v-bind:education="education"
          />
          <br/>
          <div>Желаемая зарплата: {{users.money}}</div>
          <br/>
          <div>Мои дополнительные навыки: {{users.skills}}</div>
          <br/>
          <div>О себе: {{users.about}}</div>
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
  props:['users'],
  
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