<template>
  <div id="resumeForm">
    <div v-if="this.$route.name=='Add'">
      <h2>Создание резюме</h2>
    </div>
    <div v-if="this.$route.name=='Edit'">
      <h2>Изменить резюме</h2>
    </div>
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
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Город</label>
          <div class="col-lg-5">
            <input v-model="user.city" class="form-control" v-on:input="getCity" list="ListCity" >
            <datalist id="ListCity">
                <option v-for="city in resultsCity" v-bind:key="city.title">{{city.title}}</option>
            </datalist>
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
            <input type="date" v-model = "user.date_born" class="form-control" placeholder="">
          </div>
        </div>
        <educations
          v-for="(edu, index) in education" :key="edu.id"
            v-bind:education="edu"
            v-bind:index="index"
            v-bind:cityApi="user.city"
           @deleteEducation='deleteEducation($event)'      
        />
        <div class="col-md-5 mx-auto">
          <input type="submit" class="btn btn-primary btn-lg" value="Указать еще одно место обучения" v-on:click="addEdu">
        </div>
        <br/>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Зарплата</label>
          <div class="col-lg-5">
            <input  v-model = "user.money_" class="form-control" placeholder="">
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
        <div class="form-group row">
          <label class="col-sm-2 col-form-label" >Статус</label>
          <div class="col-lg-5">
            <select class="form-control" v-model="user.status">
              <option disabled value="">Выберите один из вариантов</option>
              <option>Новый</option>
              <option>Назначено собеседование</option>
              <option>Принят</option>
              <option>Отказ</option>
            </select>
          </div>
        </div>
        <div class="col-md-3 mx-auto">
          <div v-if="this.$route.name=='Add'">
            <input type="submit" class="btn btn-primary btn-lg" value="Сформировать" v-on:click="Enter">
          </div>
          <div v-if="this.$route.name=='Edit'">
            <input type="submit" class="btn btn-primary btn-lg" value="Изменить" v-on:click="Enter">
          </div>
        </div>
    </div>
  </div>


</template>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>

<script>

import educations from "./education";

  export default {
    name: "main_Info",
    props:['user','education'],
    data () {
      return {
        resultsCity:[],
        user:[],
        education:[{}],
        mass:{
          user:[],
          education:[],
        },
        errors:[],
      }
    },
    components :{
      educations
    },
    methods:{
      getCity(){
        $.ajax({
          url: 'https://api.vk.com/method/database.getCities?country_id=1&offset=0&need_all=10&count=10&v=5.126&access_token=0bddad2c476c8de84658a88f263ddd18b85271a392d03278ae41b5cbc8c8daa709fe0b2980355a06d4e09&q='+this.user.city,
          type: "GET",
          dataType: "jsonp",
          data: {},
          success: response =>
          {
            this.resultsCity = response.response.items;
          },
          error: error =>
          {
            console.log(error);
          }
        });
      },
      deleteEducation(education){
        console.log('par',education);        
        if(this.$route.name == 'Edit' && this.$route.params.id){
          axios.post('http://resume/POST/api/cv/'+education.id_edu+'/delEdu');
        }
        this.education.splice(this.education.indexOf(education), 1);
      },
      addEdu(){
        if(this.$route.name == 'Edit' && this.$route.params.id){
          axios.post('http://resume/POST/api/cv/'+this.user.id_resume+'/addEdu')
          .then((response) => {
            this.education.push(
            {
              id_edu: response.data.id,
              id_resume: response.data.id_resume,
              educationlevel:"",
              university:"",
              faculty:"",
              spiciality:"",
              eduyear:"",
            });
          });
        } else {
         this.education.push(
          {
            id_edu:"",
            id_resume:"",
            educationlevel:"",
            university:"",
            faculty:"",
            spiciality:"",
            eduyear:"",
          });
        };
      },
      Enter (){
        this.errors=[];
        var flag=1;
        if(!this.user.prof){
          this.errors.push('Заполните поле (Профессия)!');
          flag=0;
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
        if(!this.user.date_born){      
          this.errors.push('Заполните поле (Дата рождения)!');
          flag=0;
        } 
        if(!this.user.skills){      
          this.errors.push('Заполните поле (Ключевые навыки)!');
          flag=0;
        } 
        if(flag==1){
          if(this.$route.name == 'Edit' && this.$route.params.id){         
            this.mass.user=this.user;
            this.mass.education=this.education;
            console.log('this.mass',this.mass);
            axios.post('http://resume/POST/api/cv/'+this.$route.params.id+'/edit', this.mass)
              .then((response) => {
                console.log(response);
              })
              .catch((error) => {
                console.log(error);
              });
          }else if(this.$route.name=='Add' && !this.$route.params.id){
            this.mass.user=this.user;
            this.mass.education=this.education;
            console.log('this.mass',this.mass);
            axios.post('http://resume/POST/api/cv/0/add', this.mass)
              .then((response) => {
                console.log(response);
              })
              .catch((error) => {
                console.log(error);
              });
          }
        }
      }
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