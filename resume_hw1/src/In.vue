<template>
  <div id="Inp">
        <div class="row-lg-5" style="background=black">
            
        </div>

    <h2>создание резюме</h2>
      <div class="container">
        <div class="form-group row">
          
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Профессия</label>
          <div class="col-lg-5">
            <input type="text" v-model = "user.prof" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Город</label>
          <div class="col-lg-5">
            <input type="text" v-model = "user.city" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Фото</label>
          <div class="col-lg-5">
            <input v-model = "user.photo" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">ФИО</label>
          <div class="col-lg-5">
            <input type="text" v-model = "user.fio" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Телефон</label>
          <div class="col-lg-5">
            <input v-model = "user.phone" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Email</label>
          <div class="col-lg-5">
            <input type="email" aria-describedby="emailHelp" v-model = "user.email" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Дата рождения</label>
          <div class="col-lg-5">
            <input v-model = "user.date" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Образование</label>
          <div class="col-lg-5">
            <input type="text" v-model = "user.education" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Зарплата</label>
          <div class="col-lg-5">
            <input type="text" v-model = "user.money" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ключевые навыки</label>
          <div class="col-lg-5">
            <input v-model = "user.skills" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">О себе</label>
          <div class="col-lg-5">
          <textarea class="form-control" v-model = "user.about" rows="5"></textarea>
          </div>
        </div>
        
      </div>
      <out :user="user"></out>
  </div>

</template>
<script>
import Output from './components/resume.vue'

export default {
  data () {
    return{
    user:[]
  }
  },
  components :{
  'out':Output
  } 
}
</script>


