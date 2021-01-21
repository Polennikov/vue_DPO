<template>
  <div id="app">
    <resumeForm
            
            @SaveEnter='OnEnter($event)'
    />
    <resume

            :users="users"
    />
  </div>
</template>

<script>

import resumeForm from './components/resumeForm.vue'
import resume from './components/resume.vue'

export default {
  name: 'App',
  components :{
  resumeForm,
  resume
  },
  data () {
    return {
        users:[]
    }
  },
  
  methods:{
    OnEnter(user){        
/*      console.log('user',user);
      console.log('users',this.users);*/
      this.users=user;
    },
    
  }
  
}
</script>


