<template>
  <div id="resumeForm">
    <h2>Создание резюме</h2>
    <div v-if="(errors.length!=0)">
      <div class="errorBlock">
        <div class="errorPrint">
          <div v-for="error in errors" :key="error">{{error}}</div>
        </div>
      </div>
    </div>
    <div class="container">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" >Профессия</label>
          <div class="col-lg-5">
            <input v-model = "user.prof"  class="form-control" placeholder="">
          </div><!-- v-bind:class="{ 'error': (error==1) }" -->
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Город</label>
          <div class="col-lg-5">
            <input  v-model = "user.city"  class="form-control" placeholder="">
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
            <input  v-model = "user.fio" class="form-control" placeholder="">
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
            <input  aria-describedby="emailHelp" v-model = "user.email" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Дата рождения</label>
          <div class="col-lg-5">
            <input type="date" v-model = "user.date" class="form-control" placeholder="">
          </div>
        </div>
        <education
          :user="user"
        />

<!--           <div class="form-group row">
          <label class="col-sm-2 col-form-label">Образование</label>
          <div class="col-lg-5">
            <input v-model = "user.education" class="form-control" placeholder="">
          </div>
        </div> -->
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Зарплата</label>
          <div class="col-lg-5">
            <input  v-model = "user.money" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Ключевые навыки</label>
          <div class="col-lg-5">
            <input v-model = "user.skills"  class="form-control"  placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" >О себе</label>
          <div class="col-lg-5">
          <textarea class="form-control" v-model = "user.about" rows="5" ></textarea>
          </div>
        </div>
        <div class="col-md-3 mx-auto">
          <input type="submit" class="btn btn-primary btn-lg" value="Сформировать" v-on:click="Enter">
        </div>
        
    </div>
  </div>
</template>

<script>

import education from "./education";

  export default {
    el: '#resumeForm',
    name: "main_Info",
    data () {
      return {
        user:[],
        errors:[],
        /*error:0*/
      }
    },
    components :{
      education
    },
    methods:{
      Enter() {
        this.errors=[];
        var flag=1;

        if(!this.user.prof){
          this.errors.push('Заполните поле (Профессия)!');
          flag=0;
          /*this.error=1;*/
        } 
        if(!this.user.city){
          this.errors.push('Заполните поле (Город)!');
          flag=0;
        } 
        if(!this.user.fio){      
          this.errors.push('Заполните поле (ФИО)!');
          flag=0;
        } 
        var valid = /^(\+7|8)(\(\d{3}\)|\d{3})\d{7}$/;
        if(!valid.test(this.user.phone)){
          this.errors.push('Заполните корректно поле (Телефон)!');
          flag=0;
        }     
        if(!this.user.date){      
          this.errors.push('Заполните поле (Дата рождения)!');
          flag=0;
        } 
        if(!this.user.skills){      
          this.errors.push('Заполните поле (Ключевые навыки)!');
          flag=0;
        } 
        if(flag==1){
          this.$emit('SaveEnter',this.user);

        }
      },

    }
  }

</script>
<style>
.error{
  border-color: red;
}
.errorPrint{
  text-align: center;
}
.errorBlock{
    width: 400px;
    margin: auto;
    border: 3px solid red;
  }
</style>