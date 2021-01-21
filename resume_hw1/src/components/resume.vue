<template>
  <div class="dbord">
    <div class="container">
      <div><h2>Резюме</h2></div>      
      <div class="info">
        <div class="left">
          <div class="photo">
            <img class="personPhoto" v-bind:src="user.photo"/>
          </div>
          <div>Здравствуйте специалист в области "{{user.prof}}"</div>
          <div>Меня зовут {{user.fio}}</div>
          <div>Ищу работу в городе {{user.city}}</div>
          <div>Дата рождения: {{user.date}}</div>
        </div>

        <div class="right">
          <div>Связаться со мной можно по номеру телефона: {{user.phone}} <br/> или Email: {{user.email}}</div>
          <div>Образование: {{user.education}}</div>
          <div>Желаемая зарплата: {{user.money}}</div>
          <div>Мои дополнительные навыки: {{user.skills}}</div>
          <div>О себе: {{user.about}}</div>
        </div>
     </div>      
    </div>
  </div>
</template>

<script>

export default {
	props:['user'],
  data () {
    return {

    }
  }
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
.left{
flex-basis: 40%;
flex-grow: 1;
}
.right{
  flex-basis: 40%;
  flex-grow: 4;
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