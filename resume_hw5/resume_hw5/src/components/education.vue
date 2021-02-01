<template>
  <div id="education">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" >Образование</label>
      <div class="col-lg-5">
        <select class="form-control" v-model="education.educationlevel">
          <option disabled value="">Выберите один из вариантов</option>
          <option>Среднее</option>
          <option>Среднее специальное</option>
          <option>Высшее</option>
          <option>Неоконченное высшее</option>
        </select>
      </div>
      <div class="col-lg-4" v-if="index!=0" v-on:click="deleteEdu">  
        <div class="cl-btn-del"></div>
      </div>
    </div>
    <div class="edu" v-if="(education.educationlevel!='Среднее')&&(education.educationlevel)">
      <div class="blockEdy">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Учебное заведение</label>
          <div class="col-lg-7">
             <input v-model="education.university" class="form-control" v-on:input="getUniversity" list="ListUni" >
            <datalist id="ListUni">
                <option v-for="Uni in resultsUni" v-bind:key="Uni.title">{{Uni.title}}</option>
            </datalist>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Факультет</label>
          <div class="col-lg-7">
            <input v-model = "education.faculty" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Специализация</label>
          <div class="col-lg-7">
            <input  v-model = "education.spiciality" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Год окончания</label>
          <div class="col-lg-7">
            <input  v-model = "education.eduyear" class="form-control" placeholder="">
          </div>
        </div>
      </div>    
    </div>
  </div>
</template>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>

<script>
  export default {
    name: "education",
    props:['education','index','cityApi'],
    data () {
      return {
        resultsUni: [],
        idCity: ""
      }
    },
    methods:{
      deleteEdu(){
        this.$emit('deleteEducation',this.education);       
      },
      getUniversity(){
        $.ajax({
          url: 'https://api.vk.com/method/database.getCities?country_id=1&offset=0&need_all=10&count=1&v=5.126&access_token=0bddad2c476c8de84658a88f263ddd18b85271a392d03278ae41b5cbc8c8daa709fe0b2980355a06d4e09&q='+this.cityApi,
          type: "GET",
          dataType: "jsonp",
          data: {},
          success: response =>
          {
            this.idCity = response.response.items[0].id;
          }
        });
        $.ajax({
          url: 'https://api.vk.com/method/database.getUniversities?city_id='+this.idCity+'&country_id=1&q='+this.education.university+'&count=20&v=5.126&access_token=0bddad2c476c8de84658a88f263ddd18b85271a392d03278ae41b5cbc8c8daa709fe0b2980355a06d4e09',
          type: "GET",
          dataType: "jsonp",
          data: {},
          success: response =>
          {
            this.resultsUni = response.response.items;
          }
        });
      }
    }
  }
</script>
<style>
.edu{
    background-color: antiquewhite;
    width: 500px;
    margin: auto;
}
.blockEdy{
    width: 450px;
    margin: auto;
    margin-top: 10px;
} 
.cl-btn-del {
    width: 40px;
    height: 40px;
    border-radius: 40px;
    position: relative;
    z-index: 1;
    margin: 20px auto;
    cursor: pointer;
}
.cl-btn-del:before {
    content: '+';
    color: red;
    position: absolute;
    z-index: 2;
    transform: rotate(45deg);
    font-size: 50px;
    line-height: 1;
    top: -5px;
    left: 6px;
    transition: all 0.3s cubic-bezier(0.77, 0, 0.2, 0.85);
}
.cl-btn-del:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background:black;
    z-index: 1;
    transition: all 0.3s cubic-bezier(0.77, 0, 0.2, 0.85);
    transform: scale(0.01);
}
.cl-btn-del:hover:after {
    transform: scale(1);
}
.cl-btn-del:hover:before {
    transform: scale(0.8) rotate(45deg);
    color: white;
}
</style>
