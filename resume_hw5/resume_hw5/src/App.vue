<template>
  <div id="app">
    <div class="container">
      <header class="mt-2 mb-2" role="banner">
        <div class="block" >
          <div class="blockText">
            <div>hhhhh.ru</div>    
          </div>
          <div class="menuItem1"><router-link to="/">Главная</router-link></div>
          <div class="menuItem2"><router-link to="/add">Добавить резюме</router-link></div>
        </div> 
      </header>     
      <router-view />
      <footer>
        <div style=" height: 65px;background: black;"/>
      </footer>
    </div>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
.block{
  height: 65px;
  background: black;
  display: flex;
}
.blockText{
  padding-left: 10px; 
  padding-top: 20px; 
  font-size: 18px; 
  color: white;
}
.menuItem1{
  font-size: 20px; 
  margin-left: auto;
  margin-block: auto;
}
.menuItem2{
  font-size: 20px; 
  margin-block: auto;
      margin-left: 25px;
    margin-right: 25px;
}
</style>


