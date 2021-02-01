<template>
  <div id="Add">
    <resumeForm 
      :user="user"
      :education="education"

    />
    <resume
      :education="education"
      :user="user"
    /> 
  </div>
</template>

<script>

import axios from 'axios'
import resumeForm from './resumeForm.vue'
import resume from './resume.vue'

export default {
  name: 'Add',
  components :{
  resumeForm,
  resume
  },
  data () {
    return {
        user:{
          id_resume:"",
          prof:"",
          city:"",
          photo:"",
          fio:"",
          phone:"",
          email:"",
          skills:"",
          about:"",
          status:"",
          money_:"",
          date_born:"",
          fixed :"",

        },
        education:[
        {
          id_edu:"",
          id_resume:"",
          educationlevel:"",
          university:"",
          faculty:"",
          spiciality:"",
          eduyear:"",
        }
        ],
    }
  },
   mounted() {

        if (typeof this.$route.params.id !== "undefined") {
            axios.post('http://resume/GET/api/cv/'+this.$route.params.id)
            .then((response) => {
              this.user=response.data.user[0];
              this.education=response.data.educations;
              console.log('u1', this.user);
              console.log('u2',this.education);
            })
            .catch((error) => {
              console.log(error);
            });


        }
      },
}
</script>


