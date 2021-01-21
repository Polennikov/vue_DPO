<template>
  <div id="education">
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" >Образование</label>
      <div class="col-lg-5">
        <select class="form-control" v-model="user.education">
          <option disabled value="">Выберите один из вариантов</option>
          <option>Среднее</option>
          <option>Среднее специальное</option>
          <option>Высшее</option>
          <option>Неоконченное высшее</option>
        </select>
      </div>
    </div>
    <div class="edu" v-if="(user.education!='Среднее')&&(user.education)">
      <div class="blockEdy">
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Учебное заведение</label>
          <div class="col-lg-7">
            <input  v-model = "user.university" v-bind:class="{ 'error': (error==2) }" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Факультет</label>
          <div class="col-lg-7">
            <input v-model = "user.faculty" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Специализация</label>
          <div class="col-lg-7">
            <input  v-model = "user.spiciality" class="form-control" placeholder="">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Год окончания</label>
          <div class="col-lg-7">
            <input  v-model = "user.eduYear" class="form-control" placeholder="">
          </div>
        </div>
      </div>    
    </div>
  </div>
</template>

<script>
  export default {
    name: "education",
    props:['user'],
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
</style>
